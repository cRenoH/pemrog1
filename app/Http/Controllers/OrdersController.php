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

class OrdersController extends Controller
{
    // Fungsi untuk MENAMBAH item ke keranjang
    public function add(Request $request)
    {
        // Jika request mengirim size dan product_id, cari variant_id
        if ($request->filled('size') && $request->filled('product_id')) {
            $variant = ProductVariants::where('product_id', $request->product_id)
                ->where('size', $request->size)
                ->first();
            if (!$variant) {
                return back()->with('error', 'Varian produk tidak ditemukan!');
            }
            $variantId = $variant->id;
        } else {
            // Fallback: tetap support variant_id langsung
            $request->validate([
                'variant_id' => 'required|exists:product_variants,id',
            ]);
            $variantId = $request->input('variant_id');
        }
        $userId = Auth::id();
        $cartItem = Carts::where('user_id', $userId)
            ->where('product_variant_id', $variantId)
            ->first();
        if ($cartItem) {
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
            Carts::create([
                'user_id' => $userId,
                'product_variant_id' => $variantId,
                'quantity' => 1,
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
        // 1. Cek otorisasi
        if (auth()->id() !== $cart->user_id) {
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
        $qty = $request->query('qty', 1);
        $items = [];
        if ($productId && $variantId) {
            $variant = ProductVariants::with('product.primaryImage')->find($variantId);
            if ($variant && $variant->product_id == $productId) {
                $items[] = [
                    'product' => $variant->product,
                    'variant' => $variant,
                    'quantity' => $qty,
                ];
                // Simpan referensi ke session (ID saja, bukan objek)
                session(['buy_now' => [
                    ['variant_id' => $variant->id, 'quantity' => (int)$qty],
                ]]);
            }
        } else {
            // Cart logic
            $cartItems = Carts::where('user_id', $user->id)
                ->with('productVariant.product.primaryImage')
                ->get();
            foreach ($cartItems as $cart) {
                $items[] = [
                    'product' => $cart->productVariant->product,
                    'variant' => $cart->productVariant,
                    'quantity' => $cart->quantity,
                ];
            }
            // Hapus session buy_now jika checkout dari cart
            session()->forget('buy_now');
        }
        return view('checkout', [
            'items' => $items,
            'addresses' => $addresses,
            'couriers' => $couriers,
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
        session(['checkout' => [
            'item_refs' => $itemRefs,
            'address_id' => $address->id,
            'courier' => $validated['courier'],
            'paymentMethod' => $validated['paymentMethod'],
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

        // Query ulang varian dari ID referensi
        $variantIds = collect($checkout['item_refs'])->pluck('variant_id')->toArray();
        $variants = ProductVariants::whereIn('id', $variantIds)->get()->keyBy('id');

        // Hitung subtotal
        $subtotal = 0;
        $orderItemsData = [];
        foreach ($checkout['item_refs'] as $ref) {
            $variant = $variants[$ref['variant_id']] ?? null;
            if ($variant) {
                $price = $variant->sale_price ?? $variant->price;
                $subtotal += $price * $ref['quantity'];
                $orderItemsData[] = [
                    'variant_id' => $variant->id,
                    'quantity' => $ref['quantity'],
                    'price' => $price,
                ];
            }
        }

        $shipping = 18000;
        $total = $subtotal + $shipping;

        // Buat order number unik
        $orderNumber = 'ORD-' . date('Ymd-His') . '-' . strtoupper(substr(uniqid(), -5));

        // Simpan order
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

        // Simpan order items menggunakan bulk insert (1 query)
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

        // Generate nomor resi otomatis
        $order->resi = 'RESI-' . $order->id . '-' . strtoupper(substr(uniqid(), -4));
        $order->save();

        // Jika checkout dari cart (bukan buy now), kosongkan cart user
        if (!session('buy_now')) {
            Carts::where('user_id', $user->id)->delete();
        }

        // Hapus session checkout
        session()->forget('checkout');
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
        // TODO: Implement product rating logic
        return back()->with('success', 'Terima kasih atas rating Anda!');
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
    public function invoice($orderId)
    {
        $order = Order::with(['items.variant', 'user'])->findOrFail($orderId);

        // Pastikan hanya pemilik order yang bisa melihat invoice
        if ($order->user_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki akses ke invoice ini.');
        }

        return view('invoice', [
            'order' => $order,
        ]);
    }
}