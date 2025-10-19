<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $fillable = ['name', 'slug', 'price', 'stock', 'description', 'category_id', 'vendor_id'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
