<?php

namespace App\Services;

use App\Dto\Cart\CartDto;
use App\Dto\Cart\CartProductItemDto;
use Illuminate\Support\Facades\Auth;

class CartService
{
    /**
     * Returns Currently logged in User's Cart instance as a DTO.
     * Creates and Returns a cart is user do not have one.
     * Returns an empty cart if no user is logged in.
     */
    public function getCartDto(?int $limit = null): CartDto
    {
        if (! Auth::check()) {
            return new CartDto;
        }
        $userCart = Auth::user()->cart()->firstOrCreate();

        $productsQuery = $userCart->products()->withPivot('quantity');
        if ($limit && $limit > 0) {
            $productsQuery->take($limit);
        }
        $productsDto = $productsQuery->get()->map(fn ($item) => CartProductItemDto::fromModel(
            $item,
            $item->pivot->quantity,
        ));

        return new CartDto(
            id: $userCart->id,
            products: $productsDto,
            cartPrices: $userCart->getPrices(),
        );
    }
}
