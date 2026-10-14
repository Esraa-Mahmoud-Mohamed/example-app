@props([

'layout' => 'list', // default layout is 'list'
])


@foreach ($products as $product )
@if ($layout == 'grid')
<div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
    <x-end-user.product-card :product="$product" />
</div>
@else
<div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
    <x-end-user.product-list :product="$product" />
</div>
@endif

@endforeach