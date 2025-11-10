<?php

use App\Http\Controllers\Store\StoreOrderController;
use Illuminate\Support\Facades\Route;

Route::resource('orders', StoreOrderController::class)->only(['index', 'show']);
