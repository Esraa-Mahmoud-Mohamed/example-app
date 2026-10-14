<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Http\Requests\EndUser\CouponRequest;
use App\Models\Coupon;
use App\Services\CartCalculatorService;
use App\Services\CartService;
use App\Services\CouponService;

class CouponController extends Controller
{
    public function __construct(
        protected CartService $cartService,
        protected CouponService $couponService,
        protected CartCalculatorService $cartCalculatorService
    ) {}

    public function store(CouponRequest $request)
    {
        $request->validated();

        $this->cartService->applyCoupon(
            $request->code
        );

        $cart = $this->cartService->cart();

        $coupon = Coupon::where('code', trim($request->code))
            ->first();

        if (!$coupon) {

            return response()->json([
                'success' => false,
                'message' => 'Coupon not found.'
            ], 404);
        }

        if (!$this->couponService->validate($coupon, $this->cartCalculatorService->subtotal($cart))) {

            return response()->json([
                'success' => false,
                'message' => 'Coupon is not valid.'
            ], 422);
        }

        $cart->coupon()->associate($coupon);
        $cart->save();

        return response()->json([

            'success' => true,

            'message' => 'Coupon applied successfully.',

            'subtotal' => $this->cartCalculatorService->subtotal($cart),

            'discount' => $this->cartCalculatorService->discount($cart),

            'total' => $this->cartCalculatorService->total($cart)

        ]);



        // return back();
    }

    public function destroy()
    {
        $this->cartService->removeCoupon();

        return back();
    }
}
