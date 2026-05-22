<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use App\Models\Carts; // Pastikan nama model Carts Anda benar

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Menggunakan View Composer untuk semua view
        View::composer('*', function ($view) {
            $cartQuantity = 0;
            if (Auth::check()) {
                // Jika user login, hitung total kuantitas dari semua item di keranjangnya
                $cartQuantity = Carts::where('user_id', Auth::id())->sum('quantity');
            }
            // Kirim variabel $cartQuantity ke semua view
            $view->with('cartQuantity', $cartQuantity);
        });
    }
}