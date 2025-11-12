<?php

namespace App\Dto\Order;

use App\Dto\Cart\CartProductItemDto;
use App\Dto\Product\ProductItemDto;

class OrderProductItemDto extends CartProductItemDto
{
    public function __construct(
        public ProductItemDto $product,
        public int $quantity = 1,
        public int $total = 0,
    ) {
        parent::__construct($this->product, $this->quantity, $this->total);
    }
}
