<?php

namespace App\Dto\Cart;

use App\Dto\Product\ProductItemDto;
use App\Models\Product;

class CartProductItemDto
{
    public function __construct(
        public ProductItemDto $product,
        public int $quantity = 1,
        public int $total = 0,
    ) {}

    public static function fromProductItemDto(ProductItemDto $productDto, int $quantity = 1)
    {
        return new self(
            product: $productDto,
            quantity: $quantity,
            total: $productDto->price * $quantity,
        );
    }

    public static function fromModel(Product $product, int $quantity = 1)
    {
        $productDto = ProductItemDto::fromModel($product);

        return new self(
            product: $productDto,
            quantity: $quantity,
            total: $productDto->price * $quantity,
        );
    }
}
