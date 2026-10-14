<?php

namespace App\Models;

use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['user_id','coupon_id', 'status', 'subtotal', 'discount', 'total', 'coupon_id', 'billing_first_name', 'billing_last_name', 'billing_country', 'billing_address', 'billing_city', 'billing_postal_code', 'billing_email', 'billing_phone', 'billing_company_name', 'notes'])]
class Order extends Model
{
    use HasUuids;
    protected $with = ['user'];
    public $incrementing = false;
    protected $keyType = 'string';

    public function uniqueIds(): array
    {
        return ['id'];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->select('id', 'name');
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function coupon(): BelongsTo
    {
        return $this->belongsTo(Coupon::class);
    }
}
