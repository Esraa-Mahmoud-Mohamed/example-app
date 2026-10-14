<?php
namespace App\Services;

use App\Models\Cart;
use App\Models\Coupon;
use CartCalculatorService;

class CouponService
{
    public function validate(Coupon $coupon, float $subtotal): bool
    {
        if (!$coupon->is_active)
            return false;

        if (
            $coupon->starts_at &&
            now()->lt($coupon->starts_at)
        )
            return false;

        if (
            $coupon->expires_at &&
            now()->gt($coupon->expires_at)
        )
            return false;

        if (
            $coupon->minimum_order_amount &&
            $subtotal < $coupon->minimum_order_amount
        ) {
            return false;
        }

        if (
            $coupon->usage_limit &&
            $coupon->used_count >= $coupon->usage_limit
        )
            return false;

        return true;
    }

    public function calculateDiscount(Coupon $coupon, float $subtotal): float
    {
        if ($coupon->type === 'fixed') {
            return min($coupon->value, $subtotal);
        }

        $discount = $subtotal * ($coupon->value / 100);

        if ($coupon->maximum_discount) {
            $discount = min(
                $discount,
                $coupon->maximum_discount
            );
        }

        return $discount;
    }
}
