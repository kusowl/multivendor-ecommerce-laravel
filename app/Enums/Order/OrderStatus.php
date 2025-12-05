<?php

namespace App\Enums\Order;

use App\Enums\Traits\ToArray;

enum OrderStatus: string
{
    use ToArray;

    case Pending = 'pending';
    case Confirmed = 'confirmed';
    case Shipped = 'shipped';
    case Delivered = 'delivered';
    case Cancelled = 'cancelled';
    case Returned = 'returned';

}
