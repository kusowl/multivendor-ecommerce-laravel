<?php

use App\Http\Controllers\Store\CartController;
use Illuminate\Support\Facades\Route;

Route::delete('/cart/{product:slug}', [CartController::class, 'removeProduct'])->name('cart.product.delete');
Route::resource('cart', CartController::class)->except(['create', 'show']);
