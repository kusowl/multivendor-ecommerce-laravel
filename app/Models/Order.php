<?php

namespace App\Models;

use App\Enums\Order\OrderStatus;
use App\States\Order\CancelledState;
use App\States\Order\ConfirmedState;
use App\States\Order\DeliveredState;
use App\States\Order\OrderStateInterface;
use App\States\Order\PendingState;
use App\States\Order\ReturnedState;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    protected $attributes = [
        'status' => OrderStatus::Pending,
    ];

    protected $fillable = [
        'user_id',
        'order_no',
        'total_amount',
        'sub_total',
        'shipping_fee',
        'discount',
        'status',
        'payment_status',
        'payment_method',
    ];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @throws Exception
     */
    public function state(): OrderStateInterface
    {
        return match ($this->status) {
            OrderStatus::Confirmed->value => new ConfirmedState($this),
            OrderStatus::Pending->value => new PendingState($this),
            OrderStatus::Delivered->value => new DeliveredState($this),
            OrderStatus::Cancelled->value => new CancelledState($this),
            OrderStatus::Returned->value => new ReturnedState($this),
            default => throw new Exception('Invalid order state')
        };
    }
}
