<?php

namespace App\Enums;

use App\Enums\Traits\ToArray;

enum PaymentMethod: string
{
    use ToArray;

    case COD = 'Case On Delivery';
    case RazorPay = 'Razorpay';
    case wallet = 'Wallet';
}
