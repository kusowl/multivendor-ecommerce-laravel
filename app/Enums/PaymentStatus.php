<?php

namespace App\Enums;

use App\Enums\Traits\ToArray;

enum PaymentStatus: string
{
    use ToArray;

    case unpaid = 'Unpaid';
    case paid = 'Paid';
    case refunded = 'refunded';
}
