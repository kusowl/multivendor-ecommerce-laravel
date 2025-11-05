<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }

    public function buyNow(Request $request)
    {
        // Add the product to cart and redirect the user to payment page
        $product = Product::find($request->product_id);
        if ($product && $product->is_active) {
            $user = Auth::user();
            $cart = $user->cart()->create();
            $cart->products()->attach($product->id);

            return response()->json([
                'redirect' => [
                    'url' => route('checkout.address', $cart),
                ],
            ]);
        }

        return response()->json([
            'error' => [
                'product' => 'Product not found or Active',
            ],
        ], 404);
    }
}
