<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Models\ProductImages;
use Illuminate\Support\Facades\Auth;
use App\Models\Categories;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        // 1. Ambil semua kategori untuk ditampilkan di sidebar filter
        $categories = Categories::all();

        // 2. Query dasar dengan eager loading untuk relasi yang dibutuhkan
        $query = Products::with(['primaryImage', 'category', 'variants']);

        // 3. Filter berdasarkan kategori (via slug)
        if ($request->filled('category')) {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        // 4. Filter berdasarkan pencarian nama produk
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
        
        // 5. Filter berdasarkan rentang harga
        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');

        if ($minPrice && $maxPrice) {
            // Filter produk yang memiliki varian dengan harga di antara min dan max
            $query->whereHas('variants', function ($q) use ($minPrice, $maxPrice) {
                $q->whereBetween('price', [(int)$minPrice, (int)$maxPrice]);
            });
        } elseif ($maxPrice) {
            // Hanya filter max_price jika min_price tidak ada
            $query->whereHas('variants', function($q) use ($maxPrice) {
                $q->where('price', '<=', (int)$maxPrice);
            });
        }

        // 6. Eksekusi query: urutkan dari yang terbaru, paginasi 6 per halaman
        $products = $query->latest()->paginate(6);

        // 7. Ambil wishlist user jika sudah login
        $wishlistProductIds = [];
        if (auth()->check()) {
            $wishlistProductIds = Wishlist::where('user_id', auth()->id())->pluck('product_id')->toArray();
        }

        return view('shop2', [
            'products' => $products,
            'categories' => $categories,
            'wishlistProductIds' => $wishlistProductIds,
        ]);
    }

    /**
     * Product details with related products.
     */
    public function show(Products $products)
    {
        // Muat semua relasi yang dibutuhkan: variants dan semua images
        $products->load('variants', 'images');

        // Ambil produk terkait (acak, maks 4)
        $relatedProducts = Products::where('id', '!=', $products->id)
            ->with(['primaryImage', 'variants'])
            ->inRandomOrder()
            ->take(4)
            ->get();

        // Ambil review yang sudah di-approve beserta user, PAGINATE 5 per halaman
        $reviews = $products->reviews()->where('status', 'Approved')->with('user')->latest()->paginate(5);

        $wishlistProductIds = [];
        if (Auth::check()) {
            $wishlistProductIds = Wishlist::where('user_id', Auth::id())->pluck('product_id')->toArray();
        }

        return view('product-details', [
            'title'   => 'Product Details',
            'product' => $products,
            'relatedProducts' => $relatedProducts,
            'reviews' => $reviews,
            'wishlistProductIds' => $wishlistProductIds,
        ]);
    }
}