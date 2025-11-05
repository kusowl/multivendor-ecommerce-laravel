<?php

namespace App\Enums\Order;

use App\Enums\Traits\ToArray;

enum OrderStatus: string
{
    use ToArray;

    case Pending = 'pending';
    case Processing = 'processing';
    case Shipped = 'shipped';
    case Delivered = 'delivered';
    case Cancelled = 'cancelled';
    case Refunded = 'refunded';

}
