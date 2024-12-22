<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


use App\Http\Controllers\CartController;

use App\Http\Controllers\OrderController;
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart');
Route::post('/cart/add', [CartController::class, 'addToCart']);
Route::delete('/cart/remove/{id}', [CartController::class, 'removeFromCart']);
Route::post('/cart/place-order', [CartController::class, 'placeOrderFromCart']);

Route::get('orders', [OrderController::class, 'viewOrders']);
Route::post('orders/place', [OrderController::class, 'placeOrder']);
