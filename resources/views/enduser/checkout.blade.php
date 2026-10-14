<x-enduser-layout>
    <x-slot name="content">
        <x-end-user.hero-section pageName="Checkout" description="" :haveButtons="false" :haveImage="false" />

        <div class="untree_co-section">
		    <div class="container">
		      <div class="row mb-5">
		        <div class="col-md-12">
		          <div class="border p-4 rounded" role="alert">
		            Returning customer? <a href="#">Click here</a> to login
		          </div>
		        </div>
		      </div>
		      <div class="row">
                <x-end-user.checkout-billing-form />
                <x-end-user.checkout-order-summary :cart="$cart" :subtotal="$subtotal" :discount="$discount" :total="$total"/>
		      </div>
		    </div>
		  </div>

    </x-slot>
</x-enduser-layout>