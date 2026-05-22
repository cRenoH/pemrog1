<?php

namespace App\Http\Controllers;

use App\Models\Carts;
use App\Models\Order;
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
            $variant = \App\Models\ProductVariants::where('product_id', $request->product_id)
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
        $cartItem = \App\Models\Carts::where('user_id', $userId)
            ->where('product_variant_id', $variantId)
            ->first();
        if ($cartItem) {
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
            \App\Models\Carts::create([
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
        $userId = Auth::id();

        $cartItems = Carts::where('user_id', Auth::id())
            ->with('productVariant.product.primaryImage')
            ->get();

        return view('cart', [
            'cartItems' => $cartItems
        ]);
    }

    public function remove(Carts $cart)
    {
    // 1. Cek otorisasi (tetap sama, ini penting untuk keamanan)
    if (auth()->id() !== $cart->user_id) {
        abort(403, 'Unauthorized action.');
    }

    // 2. Logika baru: Cek kuantitas item
    if ($cart->quantity > 1) {
        // Jika kuantitas lebih dari 1, kurangi saja jumlahnya
        $cart->quantity -= 1;
        $cart->save();
        $message = 'Kuantitas item berhasil diperbarui.';
    } else {
        // Jika kuantitas hanya 1, maka hapus seluruh baris item
        $cart->delete();
        $message = 'Item berhasil dihapus dari keranjang.';
    }

    // 3. Redirect kembali dengan pesan yang sesuai
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
                // Simpan ke session agar tidak hilang saat POST
                session(['buy_now' => $items]);
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
        $courier = $validated['courier'];
        $paymentMethod = $validated['paymentMethod'];

        // Ambil data buy now dari session jika ada
        $items = session('buy_now');
        if (!$items) {
            // Jika tidak ada, fallback ke cart
            $cartItems = Carts::where('user_id', $user->id)
                ->with('productVariant.product.primaryImage')
                ->get();
            $items = [];
            foreach ($cartItems as $cart) {
                $items[] = [
                    'product' => $cart->productVariant->product,
                    
                    'variant' => $cart->productVariant,
                    'quantity' => $cart->quantity,
                ];
            }
        }
        // Store checkout data in session
        session(['checkout' => [
            'items' => $items,
            'address' => $address,
            'courier' => $courier,
            'paymentMethod' => $paymentMethod,
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
        return view('payment', [
            'items' => $checkout['items'],
            'address' => $checkout['address'],
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
        $items = $checkout['items'];
        $address = $checkout['address'];
        $courier = $checkout['courier'];
        $paymentMethod = $checkout['paymentMethod'];
        $subtotal = collect($items)->sum(function($item) {
            return ($item['variant']->sale_price ?? $item['variant']->price) * $item['quantity'];
        });
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
        // Simpan order items
        foreach ($items as $item) {
            $order->items()->create([
                'variant_id' => $item['variant']->id ?? null,
                'quantity' => $item['quantity'],
                'price' => $item['variant']->sale_price ?? $item['variant']->price,
            ]);
        }
        // Generate nomor resi otomatis
        $order->resi = 'RESI-' . $order->id . '-' . strtoupper(substr(uniqid(), -4));
        $order->save();
        // Jika checkout dari cart, kosongkan cart user
        if (!isset($items[0]['buy_now'])) {
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

    public function invoice($orderId)
    {
        $order = Order::with(['items.variant', 'user'])->findOrFail($orderId);
        return view('invoice', [
            'order' => $order,
        ]);
    }
}