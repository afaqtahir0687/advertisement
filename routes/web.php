<?php

use App\Http\Controllers\Frontend\CategoryController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\ProductController;
use Illuminate\Support\Facades\Route;


// Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');


// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'store'])->name('login.store');
    Route::get('/register', [AuthController::class, 'create'])->name('register');
    Route::post('/register', [AuthController::class, 'storeRegistration'])->name('register.store');
});

// Protected Routes
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Wishlist
    Route::get('/wishlist', [HomeController::class, 'wishlist'])->name('wishlist.index');
    Route::get('/add-to-wishlist/{id}', [App\Http\Controllers\Frontend\WishlistController::class, 'add'])->name('wishlist.add');
    Route::get('/remove-from-wishlist/{id}', [App\Http\Controllers\Frontend\WishlistController::class, 'remove'])->name('wishlist.remove');

// Cart Routes
    // Route::resource('carts', CartController::class); // I WILL REMOVE THIS FROM HERE and move to admin.php or fix it.
    Route::get('/cart', [HomeController::class, 'cart'])->name('cart.index');
    Route::get('/add-to-cart/{id}', [App\Http\Controllers\Frontend\CartController::class, 'add'])->name('cart.add');
    Route::patch('/update-cart', [App\Http\Controllers\Frontend\CartController::class, 'update'])->name('cart.update');
    Route::get('/remove-from-cart/{id}', [App\Http\Controllers\Frontend\CartController::class, 'remove'])->name('cart.remove');

    // Checkout & Orders
    Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout.index');
    Route::get('/order-complete', [HomeController::class, 'orderComplete'])->name('order.complete');
    Route::get('/track-order', [HomeController::class, 'trackOrder'])->name('track.order');
});

// Public Routes (Restored)
Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/categories/banner-slider', [CategoryController::class, 'bannerBoxSlider'])->name('category.bannerBoxSlider');
Route::get('/categories/banner-box-image', [CategoryController::class, 'bannerBoxImg'])->name('category.bannerBoxImg');
Route::get('/categories/right-sidebar', [CategoryController::class, 'rightSidebar'])->name('category.rightSidebar');
Route::get('/categories/off-canvas', [CategoryController::class, 'offCanvas'])->name('category.offCanvas');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/product/{slug}', [ProductController::class, 'show'])->name('product.show');

Route::get('/about-us', [HomeController::class, 'aboutUs'])->name('about.index');
Route::get('/blogs', [HomeController::class, 'blogs'])->name('blogs.index');
Route::get('/single', [HomeController::class, 'single'])->name('single.index');
Route::get('/contact-us', [HomeController::class, 'contactUs'])->name('contact.index');

// Currency Switching
Route::get('currency-switch/{currency}', [App\Http\Controllers\Frontend\CurrencyController::class, 'switch'])->name('currency.switch');



/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Admin routes are now defined in routes/admin.php
|
*/
