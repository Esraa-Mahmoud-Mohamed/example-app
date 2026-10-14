<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use App\Http\Requests\EndUser\CartItemRequest;
use App\Models\CartItem;
use App\Models\Product;
use App\Services\CartCalculatorService;
use App\Services\CartService;
use App\Services\CouponService;

class CartItemController extends Controller
{
    public function __construct(
        protected CartService $cartService,
        protected CartCalculatorService $cartCalculatorService
    ) {}

    public function store(Product $product)
    {
        // dd($product);
        $this->cartService->add($product);

        return redirect()->route('enduser.shop');;
    }

    // public function update(CartItemRequest $request, CartItem $item)
    // {
    //     // $this->cartService->updateQuantity(
    //     //     $item,
    //     //     $request->quantity
    //     // );

    // $data = $request->validated();


    // $item->update([
    //     'quantity' => $data['quantity']
    // ]);

    // $cart = $item->cart->fresh('items.product'); //returns new instance from the cart with eager loading the nested relationship

    // return response()->json([

    //     'quantity' => $item->quantity,

    //     'row_total' =>
    //         $item->price * $item->quantity,

    //     'subtotal' =>
    //         $this->cartCalculatorService->subtotal($cart),

    //     'discount' =>
    //         $this->cartCalculatorService->discount($cart),

    //     'total' =>
    //         $this->cartCalculatorService->total($cart)

    // ]);


    //     // return back();
    // }

    public function update(CartItemRequest $request, CartItem $item)
    {
        //dd($request->validated());
        // $request->validate([
        //     'quantity' => 'required|integer|min:1'
        // ]);
        if ($request->quantity > $item->product->stock) {
            return response()->json([
                'success' => false,
                'message' => "Only {$item->product->stock} items are available."
            ], 422);
        }
        $data = $request->validated();

        $item->update([
            'quantity' => $data['quantity'],
        ]);

        $cart = $item->cart->fresh(['items.product', 'coupon']);
        //     dd( $this->cartCalculatorService->subtotal($cart),
        // $this->cartCalculatorService->discount($cart),
        // $this->cartCalculatorService->total($cart),);

        return response()->json([
            'subtotal' => $this->cartCalculatorService->subtotal($cart),
            'discount' => $this->cartCalculatorService->discount($cart),
            'total' => $this->cartCalculatorService->total($cart),
        ]);
    }
    public function destroy(CartItem $item)
    {
        $this->cartService->remove($item);

        return back();
    }
}
