<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductItem extends Model
{
    /** @use HasFactory<\Database\Factories\ProductItemFactory> */
    use HasFactory;

    protected $guarded = [];

    public function productCategory(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function getProductCategoryNameAttribute(): string
    {
        return $this->productCategory->name ?? '';
    }
}
