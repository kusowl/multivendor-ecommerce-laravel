<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')
    ->prefix('dashboard')
    ->group(function () {
        require __DIR__.'/category/web.php';
        require __DIR__.'/category/api.php';
        require __DIR__.'/sub_category/web.php';
        require __DIR__.'/product/web.php';
    });
