<?php

namespace App\Dto\SubCategory;

class SubCategoryDto
{
    public function __construct(
        public readonly int $id,
        public readonly string $slug,
        public readonly string $name,
        public readonly ?string $link = null,
    ) {}
}
