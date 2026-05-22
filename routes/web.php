<?php

use App\Models\Shop;
use App\Models\User;
use App\Models\Order;
use App\Models\Orders;

use App\Models\Products;
use App\Models\Addresses;
use App\Models\Categories;
use App\Models\ActivityLog;
use Illuminate\Support\Arr;
use App\Models\LandingImage;
use Illuminate\Http\Request;
use App\Models\ProductImages;
use App\Models\ProductVariants;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\UserProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Semua route utama aplikasi web
*/

// ========================
// Static Pages
// ========================
Route::view('/', 'landing')->name('home'); // Landing page
Route::view('/about', 'about')->name('about'); // About page
Route::view('/contact', 'contact')->name('contact'); // Contact page

// ========================
// Shop & Product
// ========================
Route::get('/shop2', [ShopController::class, 'index'])->name('shop2'); // Shop page

// Product details with related products
Route::get('/product-details/{products}', [ShopController::class, 'show'])->name('product.details');

// ========================
// Cart, Checkout, Wishlist
// ========================
Route::get('/cart', [OrdersController::class, 'show'])->name('cart'); // Cart page
Route::post('/cart/add', [OrdersController::class, 'add'])->middleware('auth')->name('cart.add'); // Add to cart
Route::post('/cart/remove/{cart}', [OrdersController::class, 'remove'])->middleware('auth')->name('cart.remove'); // Remove from cart


// Route::view('/checkout', 'checkout')->name('checkout'); // Checkout page
Route::view('/payment', 'payment')->name('payment'); // Payment page
Route::get('/invoice/{order}', [OrdersController::class, 'invoice'])->middleware('auth')->name('invoice');


// Wishlist page
Route::get('/wishlist', [WishlistController::class, 'wishlist'])->middleware('auth')->name('wishlist'); // Wishlist page
// Wishlist add
Route::post('/wishlist/add', [WishlistController::class, 'addToWishlist'])->middleware('auth')->name('wishlist.add');
// Wishlist remove
Route::post('/wishlist/remove', [WishlistController::class, 'removeFromWishlist'])->middleware('auth')->name('wishlist.remove');

// ========================
// Authentication (Login, Logout, Register)
// ========================
// Login page (GET)
Route::get('/login', function () {
    // Jika pengguna sudah login, langsung arahkan ke halaman utama.
    if (session()->has('user_email')) {
        return redirect()->route('home');
    }
    return view('login');
})->name('login');

// Login submit (POST)
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

// Logout
Route::get('/logout', [LoginController::class, 'logout'])->name('logout'); 

// Register page (GET)
Route::get('/register', [RegisterController::class, 'registerView'])->name('register.view');

// Register submit (POST)
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

// ========================
// User Profile & Admin Dashboard
// ========================
// User profile page


Route::get('/user-profile', [UserProfileController::class, 'showProfile'])->middleware('auth')->name('user-profile');


// Update user profile (first name, last name, phone number)
Route::post('/user-profile/update', [UserProfileController::class, 'updateProfile'])->middleware('auth')->name('user-profile.update');

// Update user password
Route::post('/user-profile/password', [UserProfileController::class, 'updatePassword'])->middleware('auth')->name('user-profile.password');

// ========================
// Admin Backend (Tampilan Lama)
// ========================
Route::get('/admin', [AdminController::class, 'AdminView' ])->middleware('auth')->name('admin.dashboard'); // Admin dashboard
// ======================== TANDA 
Route::post('/admin/logout', [AdminController::class, 'logoutAdmin'])->middleware('auth')->name('admin.logout'); // Admin logout


Route::post('/admin/settings/update', [AdminController::class, 'updateSettings'])->middleware('auth')->name('admin.settings.update'); // Update admin settings
// ========================
// Admin Product Management
// ========================
Route::post('/admin/products', [AdminController::class, 'store'])->name('admin.products.store');
Route::patch('/admin/products/{id}', [AdminController::class, 'update'])->name('admin.products.update');
Route::delete('/admin/products/{id}', [AdminController::class, 'destroy'])->name('admin.products.destroy');

// ========================
// Customer Service Page
// ========================
Route::view('/customer-service', 'customer-service(Opsional)')->name('customer.service'); // Customer service page
Route::post('/user-profile/address', [UserProfileController::class, 'UserProfileAddressesAdd'])->middleware('auth')->name('user-profile.address.store');

// Edit address
Route::patch('/user-profile/address/{id}', [UserProfileController::class, 'UserProfileAddresses'])->name('user-profile.address.update');



// Delete address
Route::delete('/user-profile/address/{id}',[UserProfileController::class, 'deleteAddress'])->name('user-profile.address.delete');

// ========================
// Checkout & Order Process
// ========================
// Checkout page (cart or buy now)
Route::get('/checkout', [OrdersController::class, 'checkout'])->middleware('auth')->name('checkout');
Route::post('/checkout', [OrdersController::class, 'processCheckout'])->middleware('auth')->name('checkout.process');
// Payment page (no header/footer)
Route::get('/payment', [OrdersController::class, 'payment'])->middleware('auth')->name('payment');
Route::post('/payment', [OrdersController::class, 'processPayment'])->middleware('auth')->name('payment.process');
// Order confirmation (user confirms order received)
Route::post('/order/{order}/confirm', [OrdersController::class, 'confirmOrder'])->middleware('auth')->name('order.confirm');
// Product rating (after order complete)
Route::post('/order/{order}/rate', [OrdersController::class, 'rateOrder'])->middleware('auth')->name('order.rate');
// Return request
Route::post('/order/{order}/return', [OrdersController::class, 'requestReturn'])->middleware('auth')->name('order.return');

// Order history
Route::get('/order-history', [OrdersController::class, 'orderHistory'])->middleware('auth')->name('order.history');
Route::get('/order-returns', [OrdersController::class, 'returnMenu'])->middleware('auth')->name('order.returns');



Route::patch('/admin/users/{user}/lock', [\App\Http\Controllers\AdminController::class, 'lockUser'])->name('admin.users.lock');
Route::patch('/admin/users/{user}/ban', [\App\Http\Controllers\AdminController::class, 'banUser'])->name('admin.users.ban');
Route::patch('/admin/users/{user}/role', [\App\Http\Controllers\AdminController::class, 'editUserRole'])->name('admin.users.role');

