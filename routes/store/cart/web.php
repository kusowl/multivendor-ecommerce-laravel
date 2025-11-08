<?php

use App\Http\Controllers\Store\CartController;
use Illuminate\Support\Facades\Route;

Route::resource('cart', CartController::class)->except(['create', 'show']);
