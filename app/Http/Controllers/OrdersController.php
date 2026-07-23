<?php

namespace App\Http\Controllers;

use App\Models\Carts;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderReturn;
use Illuminate\Http\Request;
use App\Models\ProductVariants;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class OrdersController extends Controller
{
    // Fungsi untuk MENAMBAH item ke keranjang
    public function add(Request $request)
    {
        // Resolve variant
        if ($request->filled('size') && $request->filled('product_id')) {
            $variant = ProductVariants::where('product_id', $request->product_id)
                ->where('size', $request->size)
                ->first();
            if (!$variant) {
                return back()->with('error', 'Varian produk tidak ditemukan!');
            }
            $variantId = $variant->id;
        } else {
            $request->validate([
                'variant_id' => 'required|exists:product_variants,id',
            ]);
            $variantId = $request->input('variant_id');
            $variant = ProductVariants::findOrFail($variantId);
        }

        $qty = max(1, (int) $request->input('qty', 1));
        $userId = Auth::id();

        $cartItem = Carts::where('user_id', $userId)
            ->where('product_variant_id', $variantId)
            ->first();

        $currentQty = $cartItem ? $cartItem->quantity : 0;
        $newQty = $currentQty + $qty;

        // Validasi stok: tidak boleh melebihi stok tersedia
        if ($variant->stock <= 0) {
            return back()->with('error', 'Stok produk ini habis!');
        }
        if ($newQty > $variant->stock) {
            return back()->with('error', 'Stok tidak mencukupi. Tersisa ' . $variant->stock . ' item untuk ukuran ' . ($variant->size ?? '') . '.');
        }

        if ($cartItem) {
            $cartItem->quantity = $newQty;
            $cartItem->save();
        } else {
            Carts::create([
                'user_id' => $userId,
                'product_variant_id' => $variantId,
                'quantity' => $newQty,
            ]);
        }
        return back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    // Fungsi untuk MENAMPILKAN isi keranjang
    public function show()
    {
        $cartItems = Carts::where('user_id', Auth::id())
            ->with('productVariant.product.primaryImage')
            ->get();

        return view('cart', [
            'cartItems' => $cartItems
        ]);
    }

    public function remove(Carts $cart)
    {
        // 1. Cek otorisasi — gunakan (int) cast agar aman di semua environment DB driver
        // Di beberapa server hosting, kolom integer dari DB dikembalikan sebagai string,
        // sehingga perbandingan strict (auth()->id() !== $cart->user_id) bisa gagal.
        if ((int) auth()->id() !== (int) $cart->user_id) {
            abort(403, 'Unauthorized action.');
        }

        // 2. Logika: Cek kuantitas item
        if ($cart->quantity > 1) {
            $cart->quantity -= 1;
            $cart->save();
            $message = 'Kuantitas item berhasil diperbarui.';
        } else {
            $cart->delete();
            $message = 'Item berhasil dihapus dari keranjang.';
        }

        return back()->with('success', $message);
    }

    // ========================
    // Checkout & Order Process
    // ========================
    public function checkout(Request $request)
    {
        $user = Auth::user();
        $addresses = $user->addresses()->get();
        $couriers = [
            ['code' => 'jne', 'name' => 'JNE'],
            ['code' => 'jnt', 'name' => 'J&T'],
            ['code' => 'sicepat', 'name' => 'SiCepat'],
        ];

        // Buy now logic
        $productId = $request->query('product_id');
        $variantId = $request->query('variant_id');
        $qty = max(1, (int) $request->query('qty', 1));
        $items = [];
        $stockErrors = [];

        if ($productId && $variantId) {
            $variant = ProductVariants::with('product.primaryImage')->find($variantId);
            if ($variant && $variant->product_id == $productId) {
                // Validasi stok buy now
                if ($qty > $variant->stock) {
                    $qty = $variant->stock;
                }
                $items[] = [
                    'product' => $variant->product,
                    'variant' => $variant,
                    'quantity' => $qty,
                ];
                session(['buy_now' => [
                    ['variant_id' => $variant->id, 'quantity' => $qty],
                ]]);
            }
        } else {
            $cartItems = Carts::where('user_id', $user->id)
                ->with('productVariant.product.primaryImage')
                ->get();
            foreach ($cartItems as $cart) {
                $variant = $cart->productVariant;
                $qty = $cart->quantity;
                // Validasi stok cart
                if ($variant->stock <= 0) {
                    $stockErrors[] = ($variant->product->name ?? 'Produk') . ' ukuran ' . $variant->size . ' stok habis.';
                    continue;
                }
                if ($qty > $variant->stock) {
                    $qty = $variant->stock;
                    $cart->quantity = $qty;
                    $cart->save();
                    $stockErrors[] = ($variant->product->name ?? 'Produk') . ' ukuran ' . $variant->size . ' qty disesuaikan ke ' . $qty . ' (stok tersisa).';
                }
                $items[] = [
                    'product'  => $variant->product,
                    'variant'  => $variant,
                    'quantity' => $qty,
                    'cart_id'  => $cart->id, // Bug 4 Fix: diperlukan untuk tombol hapus di checkout
                ];

            }
            session()->forget('buy_now');
        }

        return view('checkout', [
            'items' => $items,
            'addresses' => $addresses,
            'couriers' => $couriers,
            'stockErrors' => $stockErrors,
        ]);
    }

    public function processCheckout(Request $request)
    {
        $validated = $request->validate([
            'address_id' => 'required|exists:addresses,id',
            'courier' => 'required',
            'paymentMethod' => 'required',
        ]);
        $user = Auth::user();
        $address = $user->addresses()->findOrFail($validated['address_id']);

        // Ambil data buy now dari session jika ada (hanya ID referensi)
        $buyNowSession = session('buy_now');
        $itemRefs = [];

        if ($buyNowSession) {
            // Buy now: session berisi array of [variant_id, quantity]
            $itemRefs = $buyNowSession;
        } else {
            // Fallback ke cart: ambil referensi ID dari database
            $cartItems = Carts::where('user_id', $user->id)->get();
            foreach ($cartItems as $cart) {
                $itemRefs[] = [
                    'variant_id' => $cart->product_variant_id,
                    'quantity' => $cart->quantity,
                ];
            }
        }

        // Simpan hanya ID referensi ke session checkout (bukan objek model)
        // Sertakan flag is_buy_now agar bisa dibaca kembali di processPayment
        session(['checkout' => [
            'item_refs'  => $itemRefs,
            'address_id' => $address->id,
            'courier'    => $validated['courier'],
            'paymentMethod' => $validated['paymentMethod'],
            'is_buy_now' => (bool) $buyNowSession, // flag: apakah ini buy now atau dari cart
        ]]);

        // Hapus session buy_now setelah dipakai
        session()->forget('buy_now');
        return redirect()->route('payment');
    }

    public function payment(Request $request)
    {
        $checkout = session('checkout');
        if (!$checkout) {
            return redirect()->route('checkout')->with('error', 'Data checkout tidak ditemukan.');
        }

        // Query ulang data dari ID referensi
        $user = Auth::user();
        $address = $user->addresses()->findOrFail($checkout['address_id']);

        $variantIds = collect($checkout['item_refs'])->pluck('variant_id')->toArray();
        $variants = ProductVariants::with('product.primaryImage')->whereIn('id', $variantIds)->get()->keyBy('id');

        $items = [];
        foreach ($checkout['item_refs'] as $ref) {
            $variant = $variants[$ref['variant_id']] ?? null;
            if ($variant) {
                $items[] = [
                    'product' => $variant->product,
                    'variant' => $variant,
                    'quantity' => $ref['quantity'],
                ];
            }
        }

        return view('payment', [
            'items' => $items,
            'address' => $address,
            'courier' => $checkout['courier'],
            'paymentMethod' => $checkout['paymentMethod'],
        ]);
    }

    public function processPayment(Request $request)
    {
        $checkout = session('checkout');
        if (!$checkout) {
            return redirect()->route('checkout')->with('error', 'Data checkout tidak ditemukan.');
        }

        $user = Auth::user();
        $address = $user->addresses()->findOrFail($checkout['address_id']);
        $courier = $checkout['courier'];
        $paymentMethod = $checkout['paymentMethod'];

        try {
            $order = DB::transaction(function () use ($checkout, $user, $address, $courier, $paymentMethod) {
                // Lock semua varian yang terlibat untuk mencegah race condition
                $variantIds = collect($checkout['item_refs'])->pluck('variant_id')->toArray();
                /** @var \Illuminate\Database\Eloquent\Collection<int, ProductVariants> $variants */
                $variants = ProductVariants::query()
                    ->whereIn('id', $variantIds)
                    ->lockForUpdate()
                    ->get()
                    ->keyBy('id');

                // Validasi stok sebelum proses
                $stockErrors = [];
                foreach ($checkout['item_refs'] as $ref) {
                    $variant = $variants[$ref['variant_id']] ?? null;
                    if (!$variant) {
                        $stockErrors[] = 'Varian produk tidak ditemukan (ID: ' . $ref['variant_id'] . ').';
                        continue;
                    }
                    if ($ref['quantity'] > $variant->stock) {
                        $stockErrors[] = 'Stok ' . ($variant->size ?? 'produk') . ' tidak mencukupi. Tersisa ' . $variant->stock . ', diminta ' . $ref['quantity'] . '.';
                    }
                }

                if (!empty($stockErrors)) {
                    throw new \Exception(implode(' | ', $stockErrors));
                }

                // Hitung subtotal & kurangi stok
                $subtotal = 0;
                $orderItemsData = [];
                foreach ($checkout['item_refs'] as $ref) {
                    $variant = $variants[$ref['variant_id']];
                    $price = $variant->sale_price ?? $variant->price;
                    $subtotal += $price * $ref['quantity'];
                    $orderItemsData[] = [
                        'variant_id' => $variant->id,
                        'quantity' => $ref['quantity'],
                        'price' => $price,
                    ];
                    // Kurangi stok secara atomic
                    $variant->decrement('stock', $ref['quantity']);
                }

                $shipping = 18000;
                $total = $subtotal + $shipping;
                $orderNumber = 'ORD-' . date('Ymd-His') . '-' . strtoupper(substr(uniqid(), -5));

                $order = Order::create([
                    'user_id' => $user->id,
                    'order_number' => $orderNumber,
                    'subtotal' => $subtotal,
                    'shipping_cost' => $shipping,
                    'discount_amount' => 0,
                    'total_amount' => $total,
                    'shipping_address' => $address->full_address . ', ' . $address->city . ', ' . $address->province . ', ' . $address->postal_code,
                    'payment_method' => $paymentMethod,
                    'status' => 'processing',
                    'courier' => $courier,
                ]);

                $bulkInsertData = [];
                foreach ($orderItemsData as $itemData) {
                    $bulkInsertData[] = [
                        'order_id' => $order->id,
                        'variant_id' => $itemData['variant_id'],
                        'quantity' => $itemData['quantity'],
                        'price' => $itemData['price'],
                    ];
                }
                OrderItem::insert($bulkInsertData);

                $order->resi = 'RESI-' . $order->id . '-' . strtoupper(substr(uniqid(), -4));
                $order->save();

                return $order;
            });

        } catch (\Exception $e) {
            session()->forget('checkout');
            return redirect()->route('checkout')->with('error', 'Gagal memproses pesanan: ' . $e->getMessage());
        }

        // Kosongkan cart hanya jika ini bukan transaksi "buy now"
        // Flag is_buy_now dibaca dari checkout session sebelum dihapus
        $wasBuyNow = session('checkout.is_buy_now', false);
        session()->forget(['checkout', 'buy_now']);
        if (!$wasBuyNow) {
            Carts::where('user_id', $user->id)->delete();
        }

        return redirect()->route('invoice', ['order' => $order->id]);
    }

    public function confirmOrder(Request $request, $orderId)
    {
        $order = Order::findOrFail($orderId);
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }
        if ($order->status === 'sampai') {
            $order->status = 'selesai';
            $order->save();
            return back()->with('success', 'Pesanan dikonfirmasi selesai.');
        }
        return back()->with('error', 'Status pesanan tidak valid untuk konfirmasi.');
    }

    public function rateOrder(Request $request, $order)
    {
        $order = Order::with('items.variant')->findOrFail($order);

        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        if ($order->status !== 'selesai') {
            return back()->with('error', 'Ulasan hanya bisa diberikan pada pesanan yang sudah selesai.');
        }

        $request->validate([
            'ratings'   => 'required|array',
            'ratings.*' => 'integer|min:1|max:5',
            'comments'  => 'nullable|array',
            'comments.*' => 'nullable|string|max:1000',
        ]);

        $savedCount = 0;
        foreach ($order->items as $item) {
            $productId = $item->variant->product_id ?? null;
            if (!$productId) continue;

            $rating  = $request->input("ratings.{$productId}");
            $comment = $request->input("comments.{$productId}");

            if (!$rating) continue;

            // Satu review per user per produk
            $alreadyReviewed = \App\Models\Reviews::where('user_id', Auth::id())
                ->where('product_id', $productId)
                ->exists();

            if ($alreadyReviewed) continue;

            \App\Models\Reviews::create([
                'user_id'    => Auth::id(),
                'product_id' => $productId,
                'rating'     => $rating,
                'comment'    => $comment,
                'status'     => 'Pending',
            ]);
            $savedCount++;
        }

        if ($savedCount > 0) {
            return back()->with('success', 'Terima kasih! ' . $savedCount . ' ulasan berhasil dikirim dan sedang menunggu moderasi.');
        }

        return back()->with('info', 'Tidak ada ulasan baru yang disimpan (mungkin sudah pernah diulas).');
    }


    public function requestReturn(Request $request, $orderId)
    {
        $order = Order::findOrFail($orderId);
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }
        $validated = $request->validate([
            'reason' => 'required|string',
            'photo' => 'nullable|image|max:2048',
        ]);
        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('returns', 'public');
        }
        DB::table('order_returns')->insert([
            'order_id' => $order->id,
            'user_id' => Auth::id(),
            'reason' => $validated['reason'],
            'status' => 'pending',
            'photo' => $photoPath,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $order->status = 'retur';
        $order->return_requested = true;
        $order->save();
        return back()->with('success', 'Permintaan retur diajukan. Menunggu persetujuan admin.');
    }

    // Menampilkan riwayat order user beserta status, retur, dan waktu delivered
    public function orderHistory()
    {
        $user = Auth::user();
        $orders = Order::with(['items.variant', 'orderReturns'])
            ->where('user_id', $user->id)
            ->orderByDesc('created_at')
            ->get();
        return view('order-history', [
            'orders' => $orders,
        ]);
    }

    // Menu retur barang: daftar retur user
    public function returnMenu()
    {
        $user = Auth::user();
        $returns = OrderReturn::with('order')
            ->where('user_id', $user->id)
            ->orderByDesc('created_at')
            ->get();
        return view('order-returns', [
            'returns' => $returns,
        ]);
    }

    /**
     * Halaman invoice — hanya bisa diakses oleh pemilik order.
     */
    public function invoice($order)
    {
        // Eager load items.variant.product agar data produk tersedia di view invoice
        $order = Order::with(['items.variant.product', 'user'])->findOrFail($order);

        // Pastikan hanya pemilik order yang bisa melihat invoice
        // Gunakan (int) cast agar aman — server hosting bisa mengembalikan integer DB sebagai string
        if ((int) $order->user_id !== (int) Auth::id()) {
            abort(403, 'Anda tidak memiliki akses ke invoice ini.');
        }

        return view('invoice', [
            'order' => $order,
        ]);
    }
}
