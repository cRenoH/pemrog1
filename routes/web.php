<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\UserProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Semua route utama aplikasi web
*/

// ========================
// Static Pages (Public)
// ========================
Route::view('/', 'landing')->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');

// ========================
// Shop & Product (Public)
// ========================
Route::get('/shop2', [ShopController::class, 'index'])->name('shop2');
Route::get('/product-details/{products}', [ShopController::class, 'show'])->name('product.details');

// ========================
// Authentication (Guest Only)
// ========================
Route::middleware('guest')->group(function () {
    Route::get('/login', fn () => view('login'))->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
    Route::get('/register', [RegisterController::class, 'registerView'])->name('register.view');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');
});

// Logout (harus sudah login)
Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

// ========================
// Authenticated User Routes
// ========================
Route::middleware('auth')->group(function () {
    // Cart
    Route::get('/cart', [OrdersController::class, 'show'])->name('cart');
    Route::post('/cart/add', [OrdersController::class, 'add'])->name('cart.add');
    Route::post('/cart/remove/{cart}', [OrdersController::class, 'remove'])->name('cart.remove');

    // Wishlist
    Route::get('/wishlist', [WishlistController::class, 'wishlist'])->name('wishlist');
    Route::post('/wishlist/add', [WishlistController::class, 'addToWishlist'])->name('wishlist.add');
    Route::post('/wishlist/remove', [WishlistController::class, 'removeFromWishlist'])->name('wishlist.remove');

    // Checkout & Payment
    Route::get('/checkout', [OrdersController::class, 'checkout'])->name('checkout');
    Route::post('/checkout', [OrdersController::class, 'processCheckout'])->name('checkout.process');
    Route::get('/payment', [OrdersController::class, 'payment'])->name('payment');
    Route::post('/payment', [OrdersController::class, 'processPayment'])->name('payment.process');
    Route::get('/invoice/{order}', [OrdersController::class, 'invoice'])->name('invoice');

    // Order Management
    Route::post('/order/{order}/confirm', [OrdersController::class, 'confirmOrder'])->name('order.confirm');
    Route::post('/order/{order}/rate', [OrdersController::class, 'rateOrder'])->name('order.rate');
    Route::post('/order/{order}/return', [OrdersController::class, 'requestReturn'])->name('order.return');
    Route::get('/order-history', [OrdersController::class, 'orderHistory'])->name('order.history');
    Route::get('/order-returns', [OrdersController::class, 'returnMenu'])->name('order.returns');

    // User Profile
    Route::get('/user-profile', [UserProfileController::class, 'showProfile'])->name('user-profile');
    Route::post('/user-profile/update', [UserProfileController::class, 'updateProfile'])->name('user-profile.update');
    Route::post('/user-profile/password', [UserProfileController::class, 'updatePassword'])->name('user-profile.password');
    Route::post('/user-profile/address', [UserProfileController::class, 'UserProfileAddressesAdd'])->name('user-profile.address.store');
    Route::patch('/user-profile/address/{id}', [UserProfileController::class, 'UserProfileAddresses'])->name('user-profile.address.update');
    Route::delete('/user-profile/address/{id}', [UserProfileController::class, 'deleteAddress'])->name('user-profile.address.delete');

    // Customer Service
    Route::view('/customer-service', 'customer-service(Opsional)')->name('customer.service');

    // Reviews
    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
});

// ========================
// Admin Routes (Auth + Admin Middleware)
// ========================
Route::middleware(['auth', 'is_admin'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'AdminView'])->name('admin.dashboard');
    Route::post('/logout', [AdminController::class, 'logoutAdmin'])->name('admin.logout');
    Route::post('/settings/update', [AdminController::class, 'AdminSetting'])->name('admin.settings.update');

    // Product Management
    Route::post('/products', [AdminController::class, 'store'])->name('admin.products.store');
    Route::patch('/products/{id}', [AdminController::class, 'update'])->name('admin.products.update');
    Route::delete('/products/{id}', [AdminController::class, 'destroy'])->name('admin.products.destroy');

    // Order Management (Admin)
    Route::patch('/orders/{order}/status', [AdminController::class, 'updateOrderStatus'])->name('admin.orders.update-status');

    // User Management
    Route::patch('/users/{user}/lock', [AdminController::class, 'lockUser'])->name('admin.users.lock');
    Route::patch('/users/{user}/ban', [AdminController::class, 'banUser'])->name('admin.users.ban');
    Route::patch('/users/{user}/role', [AdminController::class, 'editUserRole'])->name('admin.users.role');

    // Review Management (Admin)
    Route::post('/reviews/{review}/approve', [AdminController::class, 'reviewApprove'])->name('admin.reviews.approve');
    Route::post('/reviews/{review}/reject', [AdminController::class, 'reviewReject'])->name('admin.reviews.reject');
    Route::delete('/reviews/{review}', [AdminController::class, 'reviewDestroy'])->name('admin.reviews.destroy');
});
