<?php

namespace App\Dto\Category;

use App\Dto\SubCategory\SubCategoryDto;
use Illuminate\Support\Collection;

class CategoryDto
{
    /** @param  SubCategoryDto[]|Collection| null $subCategories*/
    public function __construct(
        public readonly int $id,
        public readonly string $slug,
        public readonly string $name,
        public readonly ?string $image = null,
        public readonly ?string $link = null,
        public readonly null|array|Collection $subCategories = [],
    ) {}
}
