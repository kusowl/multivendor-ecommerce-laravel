<?php

namespace App\Dto\Cart;

use App\Dto\Traits\ToArray;
use App\Dto\Traits\ToModelArray;
use Illuminate\Support\Collection;

class CartDto
{
    use ToArray, ToModelArray;

    /** @param CartProductItemDto[]|null|Collection $products*/
    public function __construct(
        public ?int $id = null,
        public null|array|Collection $products = null,
        public ?CartPricesDto $cartPrices = null,
    ) {}

    public function count()
    {
        return $this->products ? count($this->products) : 0;
    }
}
