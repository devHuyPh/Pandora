<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('client.index');
})->name('/');

Route::get('/detail', function () {
    return view('client.detail_product');
});
Route::get('/cart', function () {
    return view('client.cart');
})->name('cart');

Route::get('/check_out', function () {
    return view('client.check_out');
});
Route::get('/category', function () {
    return view('client.category');
})->name('category');
Route::get('/login', function () {
    return view('account.login');
})->name('login');
Route::get('/signin', function () {
    return view('account.signin');
})->name('signin');
Route::get('/forget-password', function () {
    return view('account.forget-password');
});
Route::get('/reset-password', function () {
    return view('account.reset-password');
});
Route::get('/dashboard', function () {
    return view('admin.dashboard');
});
