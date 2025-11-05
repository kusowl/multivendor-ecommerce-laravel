<?php

namespace App\Enums;

use App\Enums\Traits\ToArray;

enum PaymentMethod: string
{
    use ToArray;

    case POD = 'pay-on-delivery';
    case RazorPay = 'razorpay';
    case Wallet = 'wallet';
}
