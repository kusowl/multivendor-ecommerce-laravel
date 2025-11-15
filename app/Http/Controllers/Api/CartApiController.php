<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveCartRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ItemNotFoundException;

class CartApiController extends Controller
{
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
            return response()->json([
                'error' => 'Product not found.',
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Something went wrong',
            ], 500);
        }

        return response()->json([
            'message' => 'Product added to the cart',
        ]);
    }

    public function getCount(Request $request)
    {
        $user = $request->user();
        if (! $user) {
            return response()->json([
                'message' => 'Unauthenticated',
            ], 401);
        }

        try {
            $productCount = $user->cart?->products()->count() ?? 0;

            return response()->json([
                'productCount' => $productCount,
            ]);
        } catch (\Throwable $e) {
            Log::error('Something went wrong when getting product count from cart API.', [
                $e->getMessage(),
                $e->getTraceAsString(),
            ]);

            return response()->json([
                'error' => 'Something went wrong.',
            ], 500);
        }
    }
}
