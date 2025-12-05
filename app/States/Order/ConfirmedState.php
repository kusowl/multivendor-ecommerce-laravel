<?php

namespace App\States\Order;

use App\Enums\Order\OrderStatus;

class ConfirmedState extends BaseOrderState
{
    public function ship(): void
    {
        $this->order->update(['status' => OrderStatus::Shipped]);
    }

    public function cancel(): void
    {
        $this->order->update(['status' => OrderStatus::Cancelled]);
    }
}
