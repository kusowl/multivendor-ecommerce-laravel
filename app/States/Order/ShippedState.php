<?php

namespace App\States\Order;

use App\Enums\Order\OrderStatus;

class ShippedState extends BaseOrderState
{
    public function deliver(): void
    {
        $this->order->update(['status' => OrderStatus::Shipped]);
    }

    public function cancel(): void
    {
        $this->order->update(['status' => OrderStatus::Returned]);
    }
}
