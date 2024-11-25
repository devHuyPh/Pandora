<?php

use App\Http\Controllers\AttibuteController;
use App\Http\Controllers\AttributeValueController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VariantController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('client.index');
})->name('/');

Route::get('/products/{product}/detail', [ProductController::class, 'show'])
    ->name('products.detail');

Route::get('/cart', function () {
    return view('client.cart');
})->name('cart');

Route::get('/check_out', function () {
    return view('client.check_out');
});
Route::get('/category', [ProductController::class, 'show_all'])
    ->name('category');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/forget-password', function () {
    return view('account.forget-password');
});
Route::get('/reset-password', function () {
    return view('account.reset-password');
});
Route::get('/dashboard', function () {
    return view('admin.dashboard');
});

Route::resource('products', ProductController::class);

Route::resource('attributes', AttibuteController::class);
Route::resource('categories', CategoryController::class);
Route::resource('variants', VariantController::class);
Route::resource('attributes.values', AttributeValueController::class);


Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::delete('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');