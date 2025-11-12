<?php

namespace App\Dto\Order;

use App\Dto\Product\ProductItemDto;
use App\Dto\Traits\ToArray;
use App\Dto\Traits\ToModelArray;
use App\Enums\Order\OrderStatus;
use App\Enums\Payment\PaymentMethod;
use App\Enums\Payment\PaymentStatus;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Collection;

class OrderItemDto
{
    use ToArray, ToModelArray;

    /** @param OrderProductItemDto[]|Collection|null $items */
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
        public readonly array|null|Collection $items = null,
    ) {}

    public static function fromModel(Order $order): self
    {
        return new self(
            userId: $order->user_id,
            orderNo: $order->order_no,
            totalAmount: $order->total_amount,
            subTotal: $order->sub_total,
            shippingFee: $order->shipping_fee,
            discount: $order->discount,
            status: OrderStatus::from($order->status),
            paymentStatus: PaymentStatus::from($order->payment_status),
            paymentMethod: PaymentMethod::from($order->payment_method),
            items: self::productsFromModel($order->products),
        );
    }

    /** @param Product[]|Collection $products
     * @return ProductItemDto[]|Collection
     */
    public static function productsFromModel(array|Collection $products): array|Collection
    {
        return $products->map(function ($item) {
            return new OrderProductItemDto(ProductItemDto::fromModel($item), $item->pivot->quantity);
        });
    }
}
