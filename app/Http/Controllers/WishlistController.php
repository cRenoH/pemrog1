<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function wishlist()
    {
        $user = Auth::user();
        $wishlist = [];
        $wishlistProductIds = [];

        if ($user) {
        $wishlist = \App\Models\Wishlist::with('product.variants', 'product.images', 'product.primaryImage')->where('user_id', $user->id)->get();
        $wishlistProductIds = \App\Models\Wishlist::where('user_id', $user->id)->pluck('product_id')->toArray();
    }
        return view('wishlist', [
            'wishlist' => $wishlist,
            'wishlistProductIds' => $wishlistProductIds,
    ]);
    }
    // Wishlist add
    public function addToWishlist(Request $request)
    {$user = Auth::user();
    if (!$user) {
        return redirect()->route('login');
    }
    $validated = $request->validate([
        'product_id' => 'required|exists:products,id',
    ]);
    \App\Models\Wishlist::firstOrCreate([
        'user_id' => $user->id,
        'product_id' => $validated['product_id'],
    ]);
    return redirect()->back();}

    // Wishlist remove
    public function removeFromWishlist(Request $request)
    {
        $user = Auth::user();
    if (!$user) {
        return redirect()->route('login');
    }
    $validated = $request->validate([
        'product_id' => 'required|exists:products,id',
    ]);
    \App\Models\Wishlist::where([
        'user_id' => $user->id,
        'product_id' => $validated['product_id'],
    ])->delete();
    return redirect()->back();
    }
}
