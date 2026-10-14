@props([
'coupon' => null,
])
<div class="col-md-6">
	<div class="row mb-5">
		<div class="col-md-6 mb-3 mb-md-0">
			<button class="btn btn-black btn-sm btn-block">Update Cart</button>
		</div>
		<div class="col-md-6">
			<button class="btn btn-outline-black btn-sm btn-block" href="{{ route('enduser.shop') }}">Continue
				Shopping</button>
		</div>
	</div>
	{{-- <form id="coupon-form" action="{{ route('enduser.cart.coupon') }}">
		@csrf

		<div class="row">
			<div class="col-md-12">
				<label class="text-black h4" for="coupon">
					Coupon
				</label>

				<p>Enter your coupon code if you have one.</p>
			</div>

			<div class="col-md-8 mb-3 mb-md-0">
				<input type="text" class="form-control py-3" id="coupon" name="code" placeholder="Coupon Code">
			</div>

			<div class="col-md-4">
				<button type="submit" class="btn btn-black">
					Apply Coupon
				</button>
			</div>

			<div class="col-12 mt-3">
				<small id="coupon-message" class="text-danger">
				</small>
			</div>

		</div>
	</form> --}}
	<form @submit.prevent="applyCoupon">
		@csrf

		<div class="row">

			<div class="col-md-12">
				<label class="text-black h4">
					Coupon
				</label>
				<p>Enter your coupon code if you have one.</p>
			</div>

			<div class="col-md-8 mb-3 mb-md-0">

				<input class="form-control py-3" placeholder="Coupon Code" x-model="coupon">

			</div>

			<div class="col-md-4">

				<button class="btn btn-black" type="submit">

					Apply Coupon

				</button>

			</div>

			{{-- <div class="col-12 mt-3">

				<small x-show="couponMessage" x-text="couponMessage"
					:class="couponSuccess ? 'text-success' : 'text-danger'">
				</small>

			</div> --}}

		</div>

	</form>
</div>