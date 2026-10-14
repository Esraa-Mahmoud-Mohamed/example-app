@props([
    'subtotal',
    'discount',
    'total'
])
                <div class="col-md-6 pl-5">
				    <div class="row justify-content-end">
				        <div class="col-md-7">
				            <div class="row">
				                <div class="col-md-12 text-right border-bottom mb-5">
				                    <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
				                </div>
				            </div>
				            <div class="row mb-3">
				                <div class="col-md-6">
				                    <span class="text-black">Subtotal</span>
				                </div>
				                <div class="col-md-6 text-right">
				                    {{-- <strong class="text-black" id="subtotal">${{ number_format($subtotal,2) }}</strong> --}}
									<strong class="text-black" x-text="'$'+subtotal.toFixed(2)" id="subtotal"></strong>
				                </div>
				            </div>
				            <div class="row mb-3">
				                <div class="col-md-6">
				                    <span class="text-black">Discount</span>
				                </div>
				                <div class="col-md-6 text-right">
				                    {{-- <strong class="text-black discount" id="discount">${{ number_format($discount,2) }}</strong> --}}
									<strong class="text-black" x-text="'$'+discount.toFixed(2)" id="discount"></strong>

				                </div>
				            </div>
				            <div class="row mb-5">
				                <div class="col-md-6">
				                    <span class="text-black total">Total</span>
				                </div>
				                <div class="col-md-6 text-right">
				                    {{-- <strong class="text-black" id="total">${{ number_format($total,2) }}</strong> --}}
									<strong class="text-black" x-text="'$'+total.toFixed(2)" id="total"></strong>

				                </div>
				            </div>

				            <div class="row">
				                <div class="col-md-12">
				                    <button class="btn btn-black btn-lg py-3 btn-block"
				                        onclick="window.location='{{ route('enduser.checkout') }}'">Proceed To Checkout</button>
				                </div>
				            </div>
				        </div>
				    </div>
				</div>