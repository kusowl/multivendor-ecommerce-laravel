<?php

namespace App\States\Order;

use App\Models\Order;
use Exception;

/**
 * @property Order $order
 */
abstract class BaseOrderState implements OrderStateInterface
{
    public function __construct(Order $order) {}

    /**
     * @throws Exception
     */
    public function confirm(): void
    {
        throw new Exception('You cannot confirm this order.');
    }

    /**
     * @throws Exception
     */
    public function ship(): void
    {
        throw new Exception('You cannot ship this order.');
    }

    /**
     * @throws Exception
     */
    public function deliver(): void
    {
        throw new Exception('You cannot deliver this order.');
    }

    /**
     * @throws Exception
     */
    public function cancel(): void
    {
        throw new Exception('You cannot cancel this order.');
    }

    /**
     * @throws Exception
     */
    public function return(): void
    {
        throw new Exception('You cannot refund this order.');
    }
}
