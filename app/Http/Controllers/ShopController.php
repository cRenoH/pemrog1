<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Models\ProductImages;
use Illuminate\Support\Facades\Auth;
use App\Models\Categories; // Asumsi nama modelnya jamak

class ShopController extends Controller
{
    public function filterPrice(Request $request)
    {
        
    }
    public function index(Request $request)
    {
        // 1. Ambil semua kategori untuk ditampilkan di sidebar filter
        $categories = Categories::all();

        // 2. Query dasar dengan eager loading untuk relasi yang dibutuhkan
        // PERBAIKAN: Gunakan 'primaryImage' (camelCase)
        $query = Products::with(['primaryImage', 'category', 'variants']);

        // 3. Terapkan filter jika ada parameter 'category' di URL
        if ($request->filled('category')) {
            // Gunakan whereHas untuk memfilter berdasarkan relasi kategori
            $query->whereHas('category', function($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }
        // Tambahkan filter search nama produk
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
        
        // 4. (Opsional) Tambahkan filter lain jika ada, misalnya harga
        if ($request->filled('max_price')) {
            $query->whereHas('variants', function($q) use ($request) {
                $q->where('price', '<=', $request->max_price);
            });
        }

        // 5. Eksekusi query untuk mendapatkan produk dan urutkan dari yang terbaru
        $products = $query->latest()->paginate(6);

        // 6. Kirim data yang sudah bersih ke view
        $wishlistProductIds = [];
        if (auth()->check()) {
            $wishlistProductIds = Wishlist::where('user_id', auth()->id())->pluck('product_id')->toArray();
        }

        

        // 1. Filter berdasarkan Kategori (Contoh tambahan)
        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category); // Asumsi kategori difilter via slug
            });
        }

        // 2. Filter berdasarkan Rentang Harga (Fungsi Utama)
        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');

        if ($minPrice && $maxPrice) {
            $query->whereHas('variants', function ($q) use ($minPrice, $maxPrice) {
                // Filter produk yang memiliki varian dengan harga di antara min dan max
                $q->whereBetween('price', [(int)$minPrice, (int)$maxPrice]);
            });
        }

        return view('shop2', [
            'products' => $products,
            'categories' => $categories,
            'wishlistProductIds' => $wishlistProductIds,
        ]);
    }

    // Product details with related products
    public function show(Products $products)
    {
        // Muat semua relasi yang dibutuhkan: variants dan semua images
        $relatedProducts = Products::where('id', '!=', $products->id)->with(['primaryImage', 'variants'])->inRandomOrder()->take(4)->get();
        $products->load('variants', 'images');
        // Ambil review yang sudah di-approve beserta user, PAGINATE 5 per halaman
        $reviews = $products->reviews()->where('status', 'Approved')->with('user')->latest()->paginate(5);
        $wishlistProductIds = [];
        if (Auth::check()) {
            $wishlistProductIds = \App\Models\Wishlist::where('user_id', Auth::id())->pluck('product_id')->toArray();
        }
        return view('product-details', [
            'title'   => 'Product Details',
            'product' => $products,
            'relatedProducts' => $relatedProducts, // Produk terkait untuk rekomendasi
            'reviews' => $reviews,
            'wishlistProductIds' => $wishlistProductIds,
        ]);
    }
}