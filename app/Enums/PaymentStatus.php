<?php

namespace App\Enums;

use App\Enums\Traits\ToArray;

enum PaymentStatus: string
{
    use ToArray;

    case Unpaid = 'unpaid';
    case Paid = 'paid';
    case Refunded = 'refunded';
    case Failed = 'failed';
}
