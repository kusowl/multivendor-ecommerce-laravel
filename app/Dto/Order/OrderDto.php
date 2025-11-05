<?php

namespace App\Dto\Order;

use App\Dto\Traits\ToArray;
use App\Dto\Traits\ToModelArray;
use App\Enums\Order\OrderStatus;
use App\Enums\Payment\PaymentMethod;
use App\Enums\Payment\PaymentStatus;

class OrderDto
{
    use ToArray, ToModelArray;

    public function __construct(
        public readonly int $userId,
        public readonly int $orderNo,
        public readonly int $totalAmount,
        public readonly int $subTotal,
        public readonly int $shippingFee,
        public readonly int $discount,
        public readonly OrderStatus $status,
        public readonly PaymentStatus $paymentStatus,
        public readonly PaymentMethod $paymentMethod,
    ) {}

}
