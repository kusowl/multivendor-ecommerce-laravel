<?php

namespace App\States\Order;

interface OrderStateInterface
{
    public function confirm(): void;

    public function ship(): void;

    public function deliver(): void;

    public function cancel(): void;

    public function return(): void;
}
