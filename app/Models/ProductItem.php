<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductItem extends Model
{
    protected $guarded = [];

    public function productCategory(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function getProductCategoryNameAttribute(): string
    {
        return $this->productCategory->name ?? '';
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
