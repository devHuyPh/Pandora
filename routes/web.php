<?php

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

Route::get('/', function () {
    return view('client.index');
});

Route::get('/detail', function () {
    return view('client.detail_product');
});
Route::get('/cart', function () {
    return view('client.cart');
});

Route::get('/check_out', function () {
    return view('client.check_out');
});
