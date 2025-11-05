<?php

namespace App\Enums\Payment;

use App\Enums\Traits\ToArray;

enum PaymentStatus: string
{
    use ToArray;

    case Unpaid = 'unpaid';
    case Paid = 'paid';
    case Refunded = 'refunded';
    case Failed = 'failed';
}
