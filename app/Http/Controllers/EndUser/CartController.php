<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Services\CartCalculatorService;
use App\Services\CartService;

class CartController extends Controller
{
    public function __construct(
        protected CartService $cartService,
        protected CartCalculatorService $calculator
    ) {}

    public function index()
    {
        $cart = $this->cartService->cart();
        return view('enduser.cart', [

            'cart' => $cart,

            'subtotal' => $this->calculator->subtotal($cart),

            'discount' => $this->calculator->discount($cart),
            
            'total' => $this->calculator->total($cart),

        ]);
    }
}
