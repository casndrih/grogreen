<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Users\OrderController;
use App\Http\Controllers\Users\UserController; // Added OrderController
use App\Http\Controllers\Vendors\VendorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Home route
Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/policy', [FrontendController::class, 'policy'])->name('policy');
Route::get('/tos', [FrontendController::class, 'tos'])->name('tos');
Route::get('/about', [FrontendController::class, 'about'])->name('about');

// Search route
Route::get('/search', [SearchController::class, 'search'])->name('search');

// Payment route
Route::post('/paypal/payment', 'PayPalController@createPayment')->name('paypal.create');
Route::get('/paypal/payment/execute', 'PayPalController@executePayment')->name('paypal.execute');

// Product route
Route::get('/product', [ProductController::class, 'show'])->name('product.show');

// Registration route
Route::post('/register', [RegisterController::class, 'register']);

// Auth route
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// User route
Route::prefix('user')->group(function () {
    Route::get('/profile', [UserController::class, 'index'])->name('user.profile');
    Route::get('/profile/edit/{id}', [UserController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [UserController::class, 'update'])->name('profile.update');

    // Cart routes
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
    Route::post('/cart/remove/{productId}', [CartController::class, 'removeFromCart'])->name('cart.remove');

    // Order routes
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/order/{id}', [OrderController::class, 'show'])->name('orders.show');
});

// Admin route
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

// Vendor route
Route::prefix('vendor')->group(function () {
    Route::get('/dashboard', [VendorController::class, 'index'])->name('vendor.dashboard');
    Route::post('/create', [VendorController::class, 'store'])->name('vendor.store');
});
