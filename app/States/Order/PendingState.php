<?php

namespace App\States\Order;

use App\Enums\Order\OrderStatus;

class PendingState extends BaseOrderState
{
    public function confirm(): void
    {
        $this->order->update(['status' => OrderStatus::Confirmed]);
    }

    public function cancel(): void
    {
        $this->order->update(['status' => OrderStatus::Cancelled]);
    }
}
