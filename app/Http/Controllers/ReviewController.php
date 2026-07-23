<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Reviews;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Submit ulasan baru untuk sebuah produk.
     * Validasi: user harus punya order dengan status 'selesai' yang mengandung produk tersebut.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'rating'     => 'required|integer|min:1|max:5',
            'comment'    => 'nullable|string|max:1000',
        ]);

        $userId    = Auth::id();
        $productId = $request->product_id;

        // Cek apakah user sudah pernah mereview produk ini
        $alreadyReviewed = Reviews::where('user_id', $userId)
            ->where('product_id', $productId)
            ->exists();

        if ($alreadyReviewed) {
            return back()->with('review_error', 'Anda sudah memberikan ulasan untuk produk ini.');
        }

        // Cek apakah user pernah membeli produk ini dengan status 'selesai'
        $hasPurchased = Order::where('user_id', $userId)
            ->where('status', 'selesai')
            ->whereHas('items.variant', function ($q) use ($productId) {
                $q->where('product_id', $productId);
            })
            ->exists();

        if (!$hasPurchased) {
            return back()->with('review_error', 'Anda hanya dapat memberikan ulasan setelah membeli dan menerima produk ini.');
        }

        Reviews::create([
            'user_id'    => $userId,
            'product_id' => $productId,
            'rating'     => $request->rating,
            'comment'    => $request->comment,
            'status'     => 'Pending',
        ]);

        return back()->with('review_success', 'Terima kasih! Ulasan Anda sedang menunggu moderasi admin.');
    }

    /**
     * Hapus ulasan milik user sendiri.
     */
    public function destroy(Reviews $review)
    {
        if ($review->user_id !== Auth::id()) {
            abort(403, 'Anda tidak memiliki akses untuk menghapus ulasan ini.');
        }

        $review->delete();

        return back()->with('review_success', 'Ulasan berhasil dihapus.');
    }
}
