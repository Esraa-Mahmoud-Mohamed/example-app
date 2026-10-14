@props([
'cart' => null,
])
<div class="row mb-5">
    <div class="site-blocks-table">
        <table class="table">
            <thead>
                <tr>
                    <th class="product-thumbnail">Image</th>
                    <th class="product-name">Product</th>
                    <th class="product-price">Price</th>
                    <th class="product-quantity">Quantity</th>
                    <th class="product-total">Total</th>
                    <th class="product-remove">Remove</th>
                </tr>
            </thead>
            <tbody>

                @forelse($cart->items as $item)
                <tr data-update-url="{{ route('enduser.cart.item.update',$item) }}">
                

                    <td class="product-thumbnail">
                        <img
                            src="{{ asset('storage/'.$item->product->images->first()->path) }}"
                            class="img-fluid"
                            alt="{{ $item->product->name }}">
                    </td>
                    <td class="product-name">
                        <h2 class="h5 text-black">
                            {{ $item->product->name }}
                        </h2>
                    </td>
                    <td class="unit-price" data-price="{{ $item->price }}">
                        ${{ number_format($item->price,2) }}
                    </td>
                    <td>
                        <div class="input-group mb-3 d-flex align-items-center quantity-container"
                            style="max-width: 120px;">
                            <div class="input-group-prepend">
                                <!-- <button class="btn btn-outline-black decrease"
                                    type="button">&minus;</button> -->
                                <button
                                    class="btn btn-outline-black"
                                    @click="decrease('{{ $item->id }}')"
                                >&minus;</button>
                            </div>
                            <!-- <input type="text" class="form-control text-center quantity-amount"
                                value="{{ $item->quantity }}" placeholder="" aria-label="Example text with button addon"
                                aria-describedby="button-addon1"> -->
                            <input
                                id="qty-{{ $item->id }}"
                                value="{{ $item->quantity }}"
                                name="quantity"
                                readonly
                                class="form-control text-center"
                            >
                            @error('quantity')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="input-group-append">
                                <!-- <button class="btn btn-outline-black increase"
                                    type="button">&plus;</button> -->
                                <button
                                    class="btn btn-outline-black"
                                    @click="increase('{{ $item->id }}', {{ $item->product->stock }})"
                                >&plus;</button>
                            </div>
                        </div>
                    </td>
                    <td class="row-total">
                         ${{ number_format($item->price * $item->quantity,2) }} 
                    </td>
                    <td>
                        <form
                            action="{{ route('enduser.cart.item.remove',$item) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-black btn-sm" type="submit">
                                ×
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">

                        Your cart is empty.

                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>