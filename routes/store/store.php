<?php

use App\Http\Controllers\Store\StoreController;
use Illuminate\Support\Facades\Route;

Route::get('/', [StoreController::class, 'index'])->name('home');
require __DIR__.'/product/web.php';
require __DIR__.'/category/web.php';

Route::middleware('auth')->group(function () {
    require __DIR__.'/cart/web.php';
    require __DIR__.'/checkout/web.php';
    require __DIR__.'/checkout/api.php';
    require __DIR__.'/order/web.php';
});
