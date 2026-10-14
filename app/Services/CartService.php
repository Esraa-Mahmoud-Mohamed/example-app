<?php

namespace App\Services;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartService
{
    public function cart()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        if (! $user) {
            return null;
        }

        return $user
            ->cart()
            ->with([
                'items.product.images',
                'coupon'
            ])
            ->firstOrCreate([
                'user_id' => $user->id,
                
            ]);
    }

    public function add(Product $product): void
    {
        $cart = $this->cart();

        $item = $cart->items()
            ->where('product_id', $product->id)
            ->first();

        if ($item) {

            $item->increment('quantity');

            return;
        }

        $cart->items()->create([
            'product_id' => $product->id,
            'price'      => $product->price,
            'quantity'   => 1,
        ]);
    }

    public function updateQuantity(CartItem $item, int $quantity)
    {
        //
    }

    public function remove(CartItem $item)
    {
        $item->delete();
    }

    public function applyCoupon(string $code)
    {
        //
    }

    public function removeCoupon()
    {
        //
    }
}
