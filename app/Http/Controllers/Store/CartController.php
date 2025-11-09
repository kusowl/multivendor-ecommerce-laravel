<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveCartRequest;
use App\Models\Cart;
use App\Models\Product;
use App\Services\CartService;
use App\Utils\TitleBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ItemNotFoundException;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cartDto = app(CartService::class)->getCartDto();

        return view('store.cart.index')
            ->with('title', new TitleBuilder()->add('Cart')->build())
            ->with('cart', $cartDto);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveCartRequest $request)
    {
        $data = $request->validated();
        try {
            $product = Product::where('slug', $data['product_slug'])->firstOrFail();
            DB::transaction(function () use ($product, $data) {
                $userCart = Auth::user()->cart()->firstOrCreate();

                $existingItem = $userCart->products()->where('product_id', $product->id)->first();
                if (! $existingItem) {
                    $userCart->products()->attach($product->id, [
                        'quantity' => $data['product_quantity'],
                    ]);
                } else {
                    $newQuantity = $existingItem->pivot->quantity + $data['product_quantity'];
                    $userCart->products()->updateExistingPivot($product->id, [
                        'quantity' => $newQuantity,
                    ]);
                }
            });
        } catch (ItemNotFoundException $e) {
            return back()->with('error', 'Product Not found');
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong!');
        }

        return back()->with('message', 'Added to cart');
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
        $product = Product::find($request->product_slug);
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
