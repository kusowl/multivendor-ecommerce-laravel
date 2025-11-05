<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;

class Customer extends User
{
    public function cart(): HasOne
    {
        return $this->hasOne(Cart::class);
    }
}
