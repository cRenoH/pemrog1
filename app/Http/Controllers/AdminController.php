<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Products;
use App\Models\Categories;
use App\Models\ActivityLog;
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
        $products = Products::with(['primaryImage', 'category', 'variants'])->latest()->paginate(10);
        $orders = Order::with(['user', 'items'])->latest()->paginate(10);
        $users = User::latest()->paginate(10);
        $categories = Categories::all();
        $activities = ActivityLog::with('user')->latest()->take(10)->get();

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
            'product_stock' => 'required|integer',
            'product_category' => 'required|string',
            'product_tags' => 'nullable|string',
            'product_sizes' => 'nullable|string',
            'product_status' => 'required|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'product_main_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'product_gallery_images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
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

        // Simpan variant (harga, stock, sku)
        ProductVariants::create([
            'product_id' => $product->id,
            'sku' => $validated['product_sku'] ?? null,
            'price' => $validated['product_price'],
            'sale_price' => $validated['product_sale_price'] ?? null,
            'stock' => $validated['product_stock'],
            'size' => $validated['product_sizes'] ?? null,
        ]);

        // Simpan gambar utama
        if ($request->hasFile('product_main_image')) {
            $mainImage = $request->file('product_main_image')->store('products', 'public');
            ProductImages::create([
                'product_id' => $product->id,
                'image_path' => $mainImage,
                'is_primary' => true,
            ]);
        }

        // Simpan gallery images
        if ($request->hasFile('product_gallery_images')) {
            foreach ($request->file('product_gallery_images') as $galleryImage) {
                $galleryPath = $galleryImage->store('products', 'public');
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

    public function dashboard()
    {
        $landingImages = \App\Models\LandingImage::all();
        return view('admin', [
            'landingImages' => $landingImages,
        ]);
    }

    /**
     * Daftar produk dengan paginasi.
     */
    public function products()
    {
        $products = Products::with(['variants', 'primaryImage', 'category'])->latest()->paginate(10);
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
        $orders = Order::with(['user', 'items'])->latest()->paginate(10);
        return view('admin.tabs.orders', compact('orders'));
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
            'product_stock' => 'required|integer',
            'product_category' => 'required|string',
            'product_tags' => 'nullable|string',
            'product_sizes' => 'nullable|string',
            'product_status' => 'required|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'product_main_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'product_gallery_images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
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

        // Update atau buat variant
        $variant = ProductVariants::where('product_id', $product->id)->first();
        if ($variant) {
            $variant->update([
                'sku' => $validated['product_sku'] ?? null,
                'price' => $validated['product_price'],
                'sale_price' => $validated['product_sale_price'] ?? null,
                'stock' => $validated['product_stock'],
                'size' => $validated['product_sizes'] ?? null,
            ]);
        } else {
            ProductVariants::create([
                'product_id' => $product->id,
                'sku' => $validated['product_sku'] ?? null,
                'price' => $validated['product_price'],
                'sale_price' => $validated['product_sale_price'] ?? null,
                'stock' => $validated['product_stock'],
                'size' => $validated['product_sizes'] ?? null,
            ]);
        }

        // Update gambar utama jika ada
        if ($request->hasFile('product_main_image')) {
            $mainImage = $request->file('product_main_image')->store('products', 'public');
            // Hapus gambar utama lama
            $old = ProductImages::where('product_id', $product->id)->where('is_primary', true)->first();
            if ($old) {
                Storage::disk('public')->delete($old->image_path);
                $old->delete();
            }
            ProductImages::create([
                'product_id' => $product->id,
                'image_path' => $mainImage,
                'is_primary' => true,
            ]);
        }

        // Tambah gallery images jika ada
        if ($request->hasFile('product_gallery_images')) {
            foreach ($request->file('product_gallery_images') as $galleryImage) {
                $galleryPath = $galleryImage->store('products', 'public');
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
}