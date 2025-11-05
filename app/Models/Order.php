<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $fillable = ['user_id', 'order_no', 'total_amount', 'sub_total', 'shipping_fee', 'discount', 'status', 'payment_status', 'payment_method'];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
