<?php

namespace App\Services;

use App\Models\Cart;
use App\Services\CouponService;

class CartCalculatorService
{
    public function __construct(
        protected CouponService $couponService
    ) {}

    public function subtotal(Cart $cart): float
    {
        return $cart->items->sum(function ($item) {
            return $item->price * $item->quantity;
        });
    }

    public function discount(Cart $cart): float
    {
        if (!$cart->coupon) {
            return 0;
        }

        return $this->couponService->calculateDiscount(
            $cart->coupon,
            $this->subtotal($cart)
        );
    }

    public function total(Cart $cart): float
    {
        return $this->subtotal($cart)
            - $this->discount($cart);
    }
}
