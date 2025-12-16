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

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Protected Routes
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');
    // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');
Route::get('/categories/banner-slider', [CategoryController::class, 'bannerBoxSlider'])->name('category.bannerBoxSlider');
Route::get('/categories/banner-box-image', [CategoryController::class, 'bannerBoxImg'])->name('category.bannerBoxImg');
Route::get('/categories/right-sidebar', [CategoryController::class, 'rightSidebar'])->name('category.rightSidebar');
Route::get('/categories/off-canvas', [CategoryController::class, 'offCanvas'])->name('category.offCanvas');



Route::get('/products', [ProductController::class, 'index'])->name('products.index');

Route::get('/about-us', [HomeController::class, 'aboutUs'])->name('about.index');

Route::get('/blogs', [HomeController::class, 'blogs'])->name('blogs.index');
Route::get('/single', [HomeController::class, 'single'])->name('single.index');
Route::get('/wishlist', [HomeController::class, 'wishlist'])->name('wishlist.index');
Route::get('/cart', [HomeController::class, 'cart'])->name('cart.index');
Route::get('/contact-us', [HomeController::class, 'contactUs'])->name('contact.index');
Route::get('/track-order', [HomeController::class, 'trackOrder'])->name('track.order');
