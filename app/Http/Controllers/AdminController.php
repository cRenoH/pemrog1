<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Reviews;
use App\Models\Products;
use App\Models\Categories;
use App\Models\ActivityLog;
use App\Helpers\ImageOptimizer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProductImages;
use App\Models\ProductVariants;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Admin Dashboard — menampilkan ringkasan data.
     * Pengecekan admin sudah ditangani middleware 'is_admin'.
     */
    public function AdminView()
    {
        $totalStock = ProductVariants::sum('stock');
        $totalOrder = Order::whereIn('status', ['completed', 'shipped'])->count();
        $pendingOrder = Order::whereIn('status', ['waiting_payment','processing'])->count();
        $totalUsers = User::count();
        $products = Products::query()->with(['primaryImage', 'category', 'variants'])->latest()->paginate(10);
        $orders = Order::query()->with(['user', 'items'])->latest()->paginate(10);
        $users = User::latest()->paginate(10);
        $categories = Categories::all();
        $activities = ActivityLog::query()->with('user')->latest()->take(10)->get();
        // Review management
        $pendingReviews = Reviews::with(['user', 'product'])->where('status', 'Pending')->latest()->paginate(10, ['*'], 'pending_reviews_page');
        $approvedReviews = Reviews::with(['user', 'product'])->where('status', 'Approved')->latest()->paginate(10, ['*'], 'approved_reviews_page');
        $totalPendingReviews = Reviews::where('status', 'Pending')->count();

        return view('admin', [
            'totalStock' => $totalStock,
            'totalOrder' => $totalOrder,
            'pendingOrder' => $pendingOrder,
            'totalUsers' => $totalUsers,
            'products' => $products,
            'orders' => $orders,
            'users' => $users,
            'categories' => $categories,
            'activities' => $activities,
            'pendingReviews' => $pendingReviews,
            'approvedReviews' => $approvedReviews,
            'totalPendingReviews' => $totalPendingReviews,
        ]);
    }

    /**
     * Update admin settings (nama, email, password).
     */
    public function AdminSetting(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'nullable|string|max:100',
            'admin_email' => 'required|email|max:100',
            'admin_password' => 'nullable|string|min:8',
        ]);

        $user->name = $validated['first_name'] . ' ' . ($validated['last_name'] ?? '');
        $user->email = $validated['admin_email'];
        if (!empty($validated['admin_password'])) {
            $user->password = Hash::make($validated['admin_password']);
        }
        $user->save();

        return redirect()->route('admin.dashboard')->with('success', 'Admin settings updated!');
    }

    /**
     * Logout admin.
     */
    public function logoutAdmin(Request $request)
    {
        Auth::logout();
        $request->session()->flush();

        return redirect()->route('login')->with('success', 'Anda telah logout sebagai admin.');
    }


    /**
     * Simpan produk baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_name' => 'required|string|max:100',
            'product_price' => 'required|numeric',
            'product_sale_price' => 'nullable|numeric',
            'product_description' => 'nullable|string',
            'product_sku' => 'nullable|string|max:50',
            'product_category' => 'required|string',
            'product_tags' => 'nullable|string',
            'product_status' => 'required|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'product_main_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'product_gallery_images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            // Variants array
            'variants' => 'required|array|min:1',
            'variants.*.size' => 'required|string|max:50',
            'variants.*.color_name' => 'nullable|string|max:50',
            'variants.*.color_hex' => 'nullable|string|max:7',
            'variants.*.stock' => 'required|integer|min:0',
        ]);

        // Cari atau buat category
        $category = Categories::firstOrCreate([
            'name' => $validated['product_category']
        ]);

        // Buat slug unik dari nama produk
        $slug = $this->generateUniqueSlug($validated['product_name']);

        // Simpan produk
        $product = Products::create([
            'name' => $validated['product_name'],
            'category_id' => $category->id,
            'slug' => $slug,
            'description' => $validated['product_description'] ?? '',
            'status' => $validated['product_status'],
            'meta_title' => $validated['meta_title'] ?? null,
            'meta_description' => $validated['meta_description'] ?? null,
        ]);

        // Simpan semua variant (size + warna + stok)
        foreach ($validated['variants'] as $index => $v) {
            $hex = $v['color_hex'] ?? null;
            if ($hex && !preg_match('/^#[0-9A-Fa-f]{6}$/', $hex)) $hex = null;
            $sku = !empty($validated['product_sku'])
                ? substr($validated['product_sku'] . '-' . $product->id . '-' . Str::slug(($v['size'] ?? '') . '-' . ($v['color_name'] ?? '') . '-' . $index), 0, 100)
                : null;

            ProductVariants::create([
                'product_id' => $product->id,
                'sku' => $sku,
                'price' => $validated['product_price'],
                'sale_price' => $validated['product_sale_price'] ?? null,
                'stock' => $v['stock'],
                'size' => $v['size'],
                'color_name' => $v['color_name'] ?? null,
                'color_hex' => $hex,
            ]);
        }

        // Simpan gambar utama (otomatis dikompres & dikonversi ke WebP)
        if ($request->hasFile('product_main_image')) {
            $mainImagePath = ImageOptimizer::processAndStore($request->file('product_main_image'), 'products');
            ProductImages::create([
                'product_id' => $product->id,
                'image_path' => $mainImagePath,
                'is_primary' => true,
            ]);
        }

        // Simpan gallery images (otomatis dikompres & dikonversi ke WebP)
        if ($request->hasFile('product_gallery_images')) {
            foreach ($request->file('product_gallery_images') as $galleryImage) {
                $galleryPath = ImageOptimizer::processAndStore($galleryImage, 'products');
                ProductImages::create([
                    'product_id' => $product->id,
                    'image_path' => $galleryPath,
                    'is_primary' => false,
                ]);
            }
        }

        ActivityLog::create([
            'type' => 'product',
            'action' => 'created',
            'user_id' => auth()->id(),
            'description' => 'Added product: ' . $product->name,
        ]);

        return redirect()->to(route('admin.dashboard', [], false) . '#products')
            ->with('success', 'Produk berhasil ditambahkan!');
    }


    /**
     * Daftar produk dengan paginasi.
     */
    public function products()
    {
        $products = Products::query()->with(['variants', 'primaryImage', 'category'])->latest()->paginate(10);
        return view('admin.tabs.products', compact('products'));
    }

    /**
     * Daftar users dengan paginasi.
     */
    public function users()
    {
        $users = User::latest()->paginate(10);
        return view('admin.tabs.users', compact('users'));
    }

    /**
     * Daftar orders dengan paginasi.
     */
    public function orders()
    {
        $orders = Order::query()->with(['user', 'items'])->latest()->paginate(10);
        return view('admin.tabs.orders', compact('orders'));
    }

    /**
     * Update status order & resi.
     */
    public function updateOrderStatus(Request $request, Order $order)
    {
        $validated = $request->validate([
            'status' => 'required|in:waiting_payment,processing,shipped,completed,cancelled',
            'resi'   => 'nullable|string|max:100',
        ]);

        $order->status = $validated['status'];
        if (array_key_exists('resi', $validated)) {
            $order->resi = $validated['resi'];
        }
        $order->save();

        ActivityLog::create([
            'type'        => 'order',
            'action'      => 'updated',
            'user_id'     => auth()->id(),
            'description' => 'Updated order #' . $order->order_number . ' to ' . $validated['status'],
        ]);

        return redirect()->to(route('admin.dashboard', [], false) . '#orders')
            ->with('success', 'Status order #' . $order->order_number . ' berhasil diupdate!');
    }

    /**
     * Update produk yang sudah ada.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'product_name' => 'required|string|max:100',
            'product_price' => 'required|numeric',
            'product_sale_price' => 'nullable|numeric',
            'product_description' => 'nullable|string',
            'product_sku' => 'nullable|string|max:50',
            'product_category' => 'required|string',
            'product_tags' => 'nullable|string',
            'product_status' => 'required|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'product_main_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'product_gallery_images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            // Variants array
            'variants' => 'required|array|min:1',
            'variants.*.id' => 'nullable|integer',
            'variants.*.size' => 'required|string|max:50',
            'variants.*.color_name' => 'nullable|string|max:50',
            'variants.*.color_hex' => 'nullable|string|max:7',
            'variants.*.stock' => 'required|integer|min:0',
        ]);

        $product = Products::findOrFail($id);

        // Cari atau buat category
        $category = Categories::firstOrCreate([
            'name' => $validated['product_category']
        ]);

        // Buat slug unik, kecualikan produk ini sendiri agar tidak bentrok
        $slug = $this->generateUniqueSlug($validated['product_name'], $product->id);

        // Update produk
        $product->update([
            'name' => $validated['product_name'],
            'category_id' => $category->id,
            'slug' => $slug,
            'description' => $validated['product_description'] ?? '',
            'status' => $validated['product_status'],
            'meta_title' => $validated['meta_title'] ?? null,
            'meta_description' => $validated['meta_description'] ?? null,
        ]);

        // Sync variants: update existing, create new, delete removed
        $incomingIds = collect($validated['variants'])->pluck('id')->filter()->toArray();

        // Hapus variant yang tidak ada di input lagi (yang tidak direferensi order)
        $product->variants()
            ->whereNotIn('id', $incomingIds)
            ->whereDoesntHave('orderItems')
            ->delete();

        foreach ($validated['variants'] as $index => $v) {
            $hex = $v['color_hex'] ?? null;
            if ($hex && !preg_match('/^#[0-9A-Fa-f]{6}$/', $hex)) $hex = null;
            $sku = !empty($validated['product_sku'])
                ? substr($validated['product_sku'] . '-' . $product->id . '-' . Str::slug(($v['size'] ?? '') . '-' . ($v['color_name'] ?? '') . '-' . $index), 0, 100)
                : null;

            $variantData = [
                'product_id' => $product->id,
                'sku' => $sku,
                'price' => $validated['product_price'],
                'sale_price' => $validated['product_sale_price'] ?? null,
                'stock' => $v['stock'],
                'size' => $v['size'],
                'color_name' => $v['color_name'] ?? null,
                'color_hex' => $hex,
            ];

            if (!empty($v['id'])) {
                // Update existing variant
                ProductVariants::where('id', $v['id'])
                    ->where('product_id', $product->id)
                    ->update($variantData);
            } else {
                // Create new variant
                ProductVariants::create($variantData);
            }
        }

        // Update gambar utama (otomatis dikompres & dikonversi ke WebP)
        if ($request->hasFile('product_main_image')) {
            $mainImagePath = ImageOptimizer::processAndStore($request->file('product_main_image'), 'products');
            // Hapus gambar utama lama
            $old = ProductImages::where('product_id', $product->id)->where('is_primary', true)->first();
            if ($old) {
                ImageOptimizer::delete($old->image_path);
                $old->delete();
            }
            ProductImages::create([
                'product_id' => $product->id,
                'image_path' => $mainImagePath,
                'is_primary' => true,
            ]);
        }

        // Tambah gallery images (otomatis dikompres & dikonversi ke WebP)
        if ($request->hasFile('product_gallery_images')) {
            foreach ($request->file('product_gallery_images') as $galleryImage) {
                $galleryPath = ImageOptimizer::processAndStore($galleryImage, 'products');
                ProductImages::create([
                    'product_id' => $product->id,
                    'image_path' => $galleryPath,
                    'is_primary' => false,
                ]);
            }
        }

        ActivityLog::create([
            'type' => 'product',
            'action' => 'updated',
            'user_id' => auth()->id(),
            'description' => 'Updated product: ' . $product->name,
        ]);

        return redirect()->to(route('admin.dashboard', [], false) . '#products')
            ->with('success', 'Produk berhasil diupdate!');
    }

    /**
     * Hapus produk beserta gambar-gambarnya.
     */
    public function destroy($id)
    {
        $product = Products::findOrFail($id);
        // Hapus semua gambar
        foreach ($product->images as $img) {
            Storage::disk('public')->delete($img->image_path);
            $img->delete();
        }
        $product->delete();
        ActivityLog::create([
            'type' => 'product',
            'action' => 'deleted',
            'user_id' => auth()->id(),
            'description' => 'Deleted product: ' . $product->name,
        ]);
        return redirect()->to(route('admin.dashboard', [], false) . '#products')
            ->with('success', 'Produk berhasil dihapus!');
    }

    public function lockUser(Request $request, User $user)
    {
        $user->is_locked = !$user->is_locked;
        $user->save();
        return response()->json(['success' => true, 'is_locked' => $user->is_locked]);
    }

    public function banUser(Request $request, User $user)
    {
        $user->is_banned = !$user->is_banned;
        $user->save();
        return response()->json(['success' => true, 'is_banned' => $user->is_banned]);
    }

    public function editUserRole(Request $request, User $user)
    {
        $role = $request->input('role');
        if ($role === 'admin') {
            $user->is_admin = true;
        } else {
            $user->is_admin = false;
        }
        $user->save();
        return response()->json(['success' => true, 'is_admin' => $user->is_admin]);
    }

    /**
     * Hapus akun user biasa (non-admin).
     * Proteksi: tidak bisa menghapus akun admin dan tidak bisa menghapus diri sendiri.
     */
    public function deleteUser(User $user)
    {
        // Jangan hapus akun yang sedang login
        if ($user->id === auth()->id()) {
            return redirect()->to(route('admin.dashboard', [], false) . '#users')
                ->with('error', 'Anda tidak dapat menghapus akun Anda sendiri.');
        }

        // Jangan hapus akun admin
        if ($user->is_admin) {
            return redirect()->to(route('admin.dashboard', [], false) . '#users')
                ->with('error', 'Akun admin tidak dapat dihapus melalui fitur ini.');
        }

        $userName = $user->first_name . ' ' . $user->last_name;
        $user->delete();

        ActivityLog::create([
            'type'        => 'user',
            'action'      => 'deleted',
            'user_id'     => auth()->id(),
            'description' => 'Deleted user account: ' . $userName,
        ]);

        return redirect()->to(route('admin.dashboard', [], false) . '#users')
            ->with('success', 'Akun pengguna ' . $userName . ' berhasil dihapus.');
    }

    /**
     * Helper: Generate slug unik untuk produk.
     * @param string $name Nama produk
     * @param int|null $excludeId ID produk yang dikecualikan (untuk update)
     */
    private function generateUniqueSlug(string $name, ?int $excludeId = null): string
    {
        $slug = Str::slug($name);
        $originalSlug = $slug;
        $counter = 1;

        $query = Products::where('slug', $slug);
        if ($excludeId) {
            $query->where('id', '!=', $excludeId);
        }

        while ($query->exists()) {
            $slug = $originalSlug . '-' . $counter++;
            $query = Products::where('slug', $slug);
            if ($excludeId) {
                $query->where('id', '!=', $excludeId);
            }
        }

        return $slug;
    }

    // ========================
    // Review Management
    // ========================

    /**
     * Approve sebuah review.
     */
    public function reviewApprove(Reviews $review)
    {
        $review->status = 'Approved';
        $review->save();
        return back()->with('success', 'Ulasan berhasil diapprove.');
    }

    /**
     * Reject sebuah review.
     */
    public function reviewReject(Reviews $review)
    {
        $review->status = 'Rejected';
        $review->save();
        return back()->with('success', 'Ulasan berhasil ditolak.');
    }

    /**
     * Hapus ulasan dari admin.
     */
    public function reviewDestroy(Reviews $review)
    {
        $review->delete();
        return back()->with('success', 'Ulasan berhasil dihapus.');
    }
}
