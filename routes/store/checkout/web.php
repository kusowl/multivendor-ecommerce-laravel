<?php

use App\Http\Controllers\Api\RazorPayController;
use App\Http\Controllers\Store\CartController;
use App\Http\Controllers\Store\CheckoutController;
use App\Http\Controllers\Store\PaymentController;
use Illuminate\Support\Facades\Route;

Route::post('/checkout/entry/buynow', [CartController::class, 'buyNow'])->name('checkout.entry.buynow');

Route::get('/checkout/{cart}/address', [CheckoutController::class, 'create'])->name('checkout.address');
Route::post('/checkout/{cart}/address', [CheckoutController::class, 'store']);

Route::get('/checkout/{cart}/payment', [PaymentController::class, 'create'])->name('checkout.payment');
Route::post('/checkout/{cart}/payment/razorpay', [RazorPayController::class, 'create'])->name('checkout.payment.razorpay');
Route::post('/checkout/payment/razorpay/verify', [RazorPayController::class, 'verify'])->name('checkout.payment.razorpay.verify');
Route::get('/checkout/payment/confirmation', [CheckOutController::class, 'confirmation'])->name('checkout.payment.razorpay.verify');
