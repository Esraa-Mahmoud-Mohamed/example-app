<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cart extends Model
{
    use HasUuids;
    protected $guarded = [];
    protected $with = ['user'];
    public $incrementing = false;
    protected $keyType = 'string';

    public function uniqueIds(): array
    {
        return ['id'];
    }

    public function items(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->select('id', 'name');
    }

    public function itemsCount()
    {
        return $this->items->sum('quantity');
    }

    public function coupon(): BelongsTo
    {
        return $this->belongsTo(Coupon::class);
    }
}
