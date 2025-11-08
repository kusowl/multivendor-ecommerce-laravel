<?php

namespace App\Dto\Product;

use App\Dto\Traits\ToArray;
use App\Models\Product;

class ProductItemDto
{
    use ToArray;

    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly string $slug,
        public readonly string $image,
        public readonly string $description,
        public readonly int $price,
        public readonly int $stock = 0,
    ) {}

    public function images()
    {
        return new class(explode(',', $this->image))
        {
            public function __construct(
                private array $images
            ) {}

            public function first()
            {
                return $this->images[0] ?? '';
            }

            public function all()
            {
                return $this->images;
            }

            public function count()
            {
                return \count($this->images);
            }
        };
    }

    public static function fromModel(Product $product)
    {
        return new self(
            id: $product->id,
            name: $product->name,
            slug: $product->slug,
            description: $product->description,
            stock: $product->stock,
            price: $product->price,
            image: $product->image,
        );
    }
}
