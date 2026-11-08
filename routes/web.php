<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\Users\OrderController;
use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\Vendors\VendorController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/login', fn () => view('auth.login'))->middleware('guest')->name('login');
Route::get('/policy', [FrontendController::class, 'policy'])->name('policy');
Route::get('/tos', [FrontendController::class, 'tos'])->name('tos');
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::post('/paypal/payment', [PayPalController::class, 'createPayment'])->name('paypal.create');
Route::get('/paypal/payment/execute', [PayPalController::class, 'executePayment'])->name('paypal.execute');
Route::get('/product', [ProductController::class, 'show'])->name('product.show');
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:5,1')->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->prefix('user')->group(function () {
    Route::get('/profile', [UserController::class, 'index'])->name('user.profile');
    Route::get('/profile/edit/{id}', [UserController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [UserController::class, 'update'])->name('profile.update');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
    Route::post('/cart/remove/{productId}', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/order/{id}', [OrderController::class, 'show'])->name('orders.show');
});

Route::middleware('auth:admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
});

Route::middleware('auth:vendor')->prefix('vendor')->group(function () {
    Route::get('/dashboard', [VendorController::class, 'index'])->name('vendor.dashboard');
    Route::post('/create', [VendorController::class, 'store'])->name('vendor.store');
});
