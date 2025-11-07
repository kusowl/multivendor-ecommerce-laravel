<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderAddressRequest;
use App\Models\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Cart $cart)
    {
        $products = $cart->products;
        $prices = $cart->getPrices();

        return view('store.checkout.checkout', compact('cart', 'products', 'prices'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderAddressRequest $request, Cart $cart)
    {
        if ($request->payment_method === 'razorpay') {
            return to_route('checkout.payment', $cart);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function confirmation()
    {
        $status = session()->pull('paymentStatus', 'doNotExist');

        return view('store.checkout.payment-confirmation', compact('status'));
    }
}
