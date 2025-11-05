<?php

namespace App\Dto;

use App\Dto\Traits\ToArray;
use App\Dto\Traits\ToModelArray;

class CartPricesDto
{
    use ToArray, ToModelArray;

    public function __construct(
        public int $subTotal,
        public int $fees,
        public int $discount,
        public int $total,
    ) {}

}
