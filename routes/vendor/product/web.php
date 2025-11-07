<?php

use App\Http\Controllers\Dashboard\ProductController;

Route::resource('product', ProductController::class)
    ->names('dashboard.product')
    ->parameter('product', 'product:slug')
    ->except('show');
