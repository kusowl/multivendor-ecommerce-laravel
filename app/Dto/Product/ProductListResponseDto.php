<?php

namespace App\Dto\Product;

class ProductListResponseDto
{
    public function __construct(
        /** @var ProductItemDto[] */
        public readonly array $products
    ) {}
}
