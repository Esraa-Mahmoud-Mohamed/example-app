@props([
    'cart' => null,
    'subtotal' => 0,
    'discount' => 0,
    'total' => 0,
])

<div class="col-md-6">
    <div class="row mb-5">
        <div class="col-md-12">
            <h2 class="h3 mb-3 text-black">Your Order</h2>
            <div class="p-3 p-lg-5 border bg-white">
                <table class="table site-block-order-table mb-5">
                    <thead>
                        <th>Product</th>
                        <th>Total</th>
                    </thead>
                    <tbody>
                        @forelse($cart->items as $item)
                        <tr>
                            <td>{{ $item->product->name }} <strong class="mx-2">x</strong> {{ $item->quantity }}</td>
                            <td>${{ number_format($item->price * $item->quantity, 2) }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="2">Your cart is empty.</td>
                        </tr>
                        @endforelse
                        <tr>
                            <td class="text-black font-weight-bold"><strong>Cart Subtotal</strong></td>
                            <td class="text-black">${{ number_format($subtotal, 2) }}</td>
                        </tr>
                        @if ($discount > 0)
                        <tr>
                            <td class="text-black font-weight-bold"><strong>Discount</strong></td>
                            <td class="text-black">${{ number_format($discount, 2) }}</td>
                        </tr>
                        @endif

                        <tr>
                            <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                            <td class="text-black font-weight-bold"><strong>${{ number_format($total, 2) }}</strong></td>
                        </tr>
                    </tbody>
                </table>

                <div class="border p-3 mb-3">
                    <h3 class="h6 mb-0"><a class="d-block" data-bs-toggle="collapse" href="#collapsebank" role="button"
                            aria-expanded="false" aria-controls="collapsebank">Direct Bank Transfer</a></h3>

                    <div class="collapse" id="collapsebank">
                        <div class="py-2">
                            <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID
                                as the payment reference. Your order won’t be shipped until the funds have cleared in
                                our account.</p>
                        </div>
                    </div>
                </div>

                <div class="border p-3 mb-3">
                    <h3 class="h6 mb-0"><a class="d-block" data-bs-toggle="collapse" href="#collapsecheque"
                            role="button" aria-expanded="false" aria-controls="collapsecheque">Cheque Payment</a></h3>

                    <div class="collapse" id="collapsecheque">
                        <div class="py-2">
                            <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID
                                as the payment reference. Your order won’t be shipped until the funds have cleared in
                                our account.</p>
                        </div>
                    </div>
                </div>

                <div class="border p-3 mb-5">
                    <h3 class="h6 mb-0"><a class="d-block" data-bs-toggle="collapse" href="#collapsepaypal"
                            role="button" aria-expanded="false" aria-controls="collapsepaypal">Paypal</a></h3>

                    <div class="collapse" id="collapsepaypal">
                        <div class="py-2">
                            <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID
                                as the payment reference. Your order won’t be shipped until the funds have cleared in
                                our account.</p>
                        </div>
                    </div>
                </div>

                {{-- <div class="form-group">    

                    <button type="submit" class="btn btn-black btn-lg py-3 btn-block">
                        Place Order
                    </button>
                    
                </div> --}}

            </div>
        </div>
    </div>

</div>
