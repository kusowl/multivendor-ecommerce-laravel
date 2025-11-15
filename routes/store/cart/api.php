<?php

use App\Http\Controllers\Api\CartApiController;
use Illuminate\Support\Facades\Route;

Route::get('api/cart/', [CartApiController::class, 'getCount']);
Route::post('api/cart/', [CartApiController::class, 'store']);
