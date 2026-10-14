<?php

namespace App\Http\Controllers\EndUser;

use App\Helpers\Notify;
use App\Http\Controllers\Controller;
use App\Http\Requests\EndUser\CheckoutRequest;
use App\Models\Order;
use App\Models\OrderItem;
use App\Services\CartCalculatorService;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function __construct(
        protected CartService $cartService,
        protected CartCalculatorService $cartCalculatorService
    ) {}
    public function index()
    {
        $cart = $this->cartService->cart();
        $subtotal = $this->cartCalculatorService->subtotal($cart);
        $discount = $this->cartCalculatorService->discount($cart);
        $total = $this->cartCalculatorService->total($cart);
        return view('enduser.checkout', compact('cart', 'subtotal', 'discount', 'total'));
    }

    public function store(CheckoutRequest $request)
    {
        $data = $request->validated();

        $cart = $this->cartService->cart()->load([
            'items.product',
            'coupon'
        ]);

        if ($cart->items->isEmpty()) {

            Notify::error('Your cart is empty.');

            return back();
        }

        DB::transaction(function () use ($cart, $data) {

            $order = Order::create([
                'user_id'      => Auth::id(),

                'status'       => 'pending',

                'subtotal'     => $this->cartCalculatorService->subtotal($cart),

                'discount'     => $this->cartCalculatorService->discount($cart),

                'total'        => $this->cartCalculatorService->total($cart),

                'coupon_id'    => $cart->coupon_id,

                'billing_first_name' => $data['billing_first_name'],

                'billing_last_name' => $data['billing_last_name'],

                'billing_company_name' => $data['billing_company_name'] ?? null,

                'billing_address'      => $data['billing_address'],

                'billing_country'      => $data['billing_country'],

                'billing_city'        => $data['billing_city'],

                'billing_postal_code'  => $data['billing_postal_code'],

                'billing_email'        => $data['billing_email'],

                'billing_phone'        => $data['billing_phone'],

                'notes'        => $data['notes'] ?? null,
            ]);

            foreach ($cart->items as $item) {

                OrderItem::create([

                    'order_id'   => $order->id,

                    'product_id' => $item->product_id,

                    'price'      => $item->price,

                    'quantity'   => $item->quantity,

                ]);

                // Optional
                $item->product->decrement('stock', $item->quantity);
            }

            if ($cart->coupon) {

                $cart->coupon->increment('used_count');
            }

            $cart->items()->delete();

            $cart->delete();
        });

        Notify::success('Checkout completed successfully.');

        return to_route('enduser.thankyou');
    }
}
