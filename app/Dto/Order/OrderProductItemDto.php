<?php

namespace App\Dto\Order;

use App\Dto\Cart\CartProductItemDto;
use App\Dto\Product\ProductItemDto;

class OrderProductItemDto extends CartProductItemDto
{
    public function __construct(
        public readonly ProductItemDto $product,
        public readonly int $quantity = 1,
        public readonly int $total = 0,
    ) {
        parent::__construct($this->product, $this->quantity, $this->total);
    }
}
