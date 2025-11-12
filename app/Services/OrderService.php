<?php

namespace App\Services;

use App\Dto\Order\OrderItemDto;
use App\Models\Cart;
use App\Models\Order;
use App\Services\PaymentServices\PaymentService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderService
{
    public function __construct(protected PaymentService $paymentService) {}

    public function createOrderFromCart(Cart $cart, OrderItemDto $orderDto)
    {
        $order = DB::transaction(function () use ($cart, $orderDto) {
            $order = Order::create($orderDto->toModelArray());
            foreach ($cart->products as $product) {
                $order->products()->attach($product->id, ['quantity' => $product->pivot->quantity]);
                $orderLog['order_id'] = $order->id;
                $orderLog['products'][] = [
                    'product_id' => $product->id,
                    'product_name' => substr($product->name, 0, 30).'...',
                    'product_quanity' => $product->pivot->quantity,
                ];
                Log::info('Products added from cart to order.', ['order_log' => $orderLog]);
            }
            $cart->delete();

            return $order;
        });

        if (! $order) {
            throw new \Exception('Order Creation failed');
        }

        return $this->paymentService->handle($order);

    }
}
