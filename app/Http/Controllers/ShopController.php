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

        // 6. Terapkan sorting berdasarkan parameter 'sort' dari request
        // Format: 'field:direction' (contoh: 'price:asc', 'price:desc', 'default:asc')
        $sort = $request->input('sort', 'default:asc');
        $sortParts = explode(':', $sort);
        $sortField = $sortParts[0] ?? 'default';
        $sortDirection = $sortParts[1] ?? 'asc';

        if ($sortField === 'price') {
            // Sort berdasarkan harga terendah dari varian produk
            $query->withMin('variants', 'price')
                  ->orderBy('variants_min_price', $sortDirection === 'desc' ? 'desc' : 'asc');
        } else {
            // Default: urutkan dari produk terbaru
            $query->latest();
        }

        // Paginate 6 per halaman, withQueryString() agar filter/sort ikut di link paginasi
        $products = $query->paginate(6)->withQueryString();


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

        // Statistik rating (distribusi per bintang)
        $ratingStats = [];
        $totalApproved = $products->reviews()->where('status', 'Approved')->count();
        for ($i = 5; $i >= 1; $i--) {
            $count = $products->reviews()->where('status', 'Approved')->where('rating', $i)->count();
            $ratingStats[$i] = [
                'count'   => $count,
                'percent' => $totalApproved > 0 ? round(($count / $totalApproved) * 100) : 0,
            ];
        }
        $avgRating = $totalApproved > 0 ? round($products->reviews()->where('status', 'Approved')->avg('rating'), 1) : 0;

        // Apakah user sudah pernah review produk ini?
        $userReview = null;
        $canReview  = false;
        if (\Illuminate\Support\Facades\Auth::check()) {
            $userId = \Illuminate\Support\Facades\Auth::id();
            $userReview = \App\Models\Reviews::where('user_id', $userId)
                ->where('product_id', $products->id)
                ->first();
            // Cek apakah user sudah beli dengan status selesai
            if (!$userReview) {
                $canReview = \App\Models\Order::where('user_id', $userId)
                    ->where('status', 'selesai')
                    ->whereHas('items.variant', function ($q) use ($products) {
                        $q->where('product_id', $products->id);
                    })
                    ->exists();
            }
        }

        $wishlistProductIds = [];
        if (Auth::check()) {
            $wishlistProductIds = Wishlist::where('user_id', Auth::id())->pluck('product_id')->toArray();
        }

        return view('product-details', [
            'title'              => 'Product Details',
            'product'            => $products,
            'relatedProducts'    => $relatedProducts,
            'reviews'            => $reviews,
            'ratingStats'        => $ratingStats,
            'avgRating'          => $avgRating,
            'totalApproved'      => $totalApproved,
            'userReview'         => $userReview,
            'canReview'          => $canReview,
            'wishlistProductIds' => $wishlistProductIds,
        ]);
    }

}