<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Coupon extends Model
{
    use HasUuids, HasFactory;
    protected $guarded = [];

    public function uniqueIds(): array
    {
        return ['id'];
    }
    public function carts(): HasMany
    {
        return $this->hasMany(Cart::class);
    }
        public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
