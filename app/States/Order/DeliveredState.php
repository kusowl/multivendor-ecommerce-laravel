<?php

namespace App\States\Order;

use App\Enums\Order\OrderStatus;

class DeliveredState extends BaseOrderState
{
    public function return(): void
    {
        $this->order->update(['status' => OrderStatus::Returned]);
    }
}
