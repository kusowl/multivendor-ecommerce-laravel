<?php

namespace App\Models;

use App\Dto\Cart\CartPricesDto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Cart extends Model
{
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)
            ->withPivot('quantity');
    }

    public function getPrices(): CartPricesDto
    {
        $subTotal = $this->products->sum(fn ($p) => $p->price * $p->pivot->quantity);
        $fees = 0;
        $discount = $subTotal / 10;
        $total = $subTotal + $fees - $discount;

        return new CartPricesDto($subTotal, $fees, $discount, $total);
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}
