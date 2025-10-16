<?php

namespace App\Enums;

use App\Enums\Traits\ToArray;

enum OrderStatus: string
{
    use ToArray;

    case pending = 'Pending';
    case processing = 'Processing';
    case shipped = 'Shipped';
    case delivered = 'Delivered';
    case cancelled = 'Cancelled';
    case refunded = 'Refunded';

}
