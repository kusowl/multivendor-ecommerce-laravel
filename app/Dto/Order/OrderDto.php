<?php

namespace App\Dto\Order;

use App\Dto\Base\PaginationLinksDto;

class OrderDto
{
    /** @param OrderItemDto[] $orders */
    public function __construct(
        public readonly ?array $items,
        public readonly ?PaginationLinksDto $links,
    ) {}
}
