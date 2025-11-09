<?php

use App\Http\Controllers\Store\CartController;
use Illuminate\Support\Facades\Route;

Route::post('/checkout/entry/buynow', [CartController::class, 'buyNow'])->name('checkout.entry.buynow');
