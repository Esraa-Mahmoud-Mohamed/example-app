<x-end-user-layout>
    <x-slot name="content">
        <x-end-user.hero-section pageName="Cart" description="" :haveButtons="false" :haveImage="false" />

        <div class="untree_co-section before-footer-section">
            <div class="container">
                <div x-data="cartPage({
                    subtotal: {{ $subtotal }},
                    discount: {{ $discount }},
                    total: {{ $total }},
                    coupon: @js($cart->coupon?->code),
                })">
                    <x-end-user.cart-items :cart="$cart" />

                    <div class="row">

                        <x-end-user.cart-coupon :coupon="$cart->coupon?->code" />
                        <x-end-user.cart-summary subtotal="{{ $subtotal }}" discount="{{ $discount }}"
                            total="{{ $total }}" />


                    </div>
                </div>

            </div>
        </div>

    </x-slot>
</x-end-user-layout>