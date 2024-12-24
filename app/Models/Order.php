<?php

namespace App\Models;

use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    //
    protected $guarded = [];

    protected $casts = [
        'status' => OrderStatus::class,
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function getCustomerNameAttribute(): string
    {
        return $this->customer->name ?? '';
    }

    public function getCustomerCodeAttribute(): string
    {
        return $this->customer->code ?? '';
    }

    public function productItem(): BelongsTo
    {
        return $this->belongsTo(ProductItem::class);
    }

    public function getProductItemNameAttribute(): string
    {
        return $this->productItem->name ?? '';
    }

    public function getProductItemShortNameAttribute(): string
    {
        return $this->productItem->short_name ?? '';
    }

    public function getProductCategoryIdAttribute(): string
    {
        return $this->productItem->product_category_id ?? '';
    }

    public function getProductCategoryNameAttribute(): string
    {
        return $this->productItem->productCategory->name ?? '';
    }

    public function getProductCategoryShortNameAttribute(): string
    {
        return $this->productItem->productCategory->short_name ?? '';
    }
}
