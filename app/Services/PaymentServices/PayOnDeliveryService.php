<?php

namespace App\Services\PaymentServices;

use App\Enums\Payment\PaymentMethod;
use App\Enums\Payment\PaymentStatus;
use App\Models\Order;
use Illuminate\Http\Request;

class PayOnDeliveryService implements PaymentService
{
    public function handle(Order $order): array
    {
        return [
            'method' => PaymentMethod::POD,
            'status' => PaymentStatus::Unpaid,
        ];
    }

    public function verify(Request $request)
    {
        // TODO: Implement verify() method.
    }
}
