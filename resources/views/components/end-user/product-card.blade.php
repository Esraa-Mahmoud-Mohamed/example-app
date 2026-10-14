
<form action="{{ route('enduser.cart.item.store', $product) }}" method="POST">

    @csrf

    <button type="submit" class="product-item border-0 bg-transparent">

        @if($product->images->isNotEmpty())

            <img
                src="{{ asset('storage/'.$product->images->first()->path) }}"
                class="img-fluid product-thumbnail"
                alt="Product Image">

        @endif

        <h3 class="product-title">{{ $product->name }}</h3>

        <strong class="product-price">
            ${{ $product->price }}
        </strong>

        <span class="icon-cross">
            <img src="{{ asset('enduser/images/cross.svg') }}" class="img-fluid">
        </span>

    </button>

</form>
