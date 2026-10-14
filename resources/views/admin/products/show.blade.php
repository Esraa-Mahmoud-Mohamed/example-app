<x-app-layout>
    <x-slot name="header">
        <h1 class="page-title">{{ $product->name }}</h1>
    </x-slot>
    <x-slot name="extra">

    </x-slot>
    <x-slot name="content">
        <div class="card shadow border-0">

            <div class="card-header bg-white">
                <h4 class="mb-0">
                    <i class="fas fa-box-open text-primary me-2"></i>
                    Product Details
                </h4>
            </div>

            <div class="card-body">

                {{-- Basic Information --}}
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-light">
                        <strong>
                            <i class="fas fa-info-circle me-2"></i>
                            Basic Information
                        </strong>
                    </div>

                    <div class="card-body">

                        <div class="row">

                            <div class="col-md-8">
                                <label class="text-muted">Product Name</label>

                                <p class="form-control bg-light">
                                    {{ $product->name }}
                                </p>
                            </div>

                            <div class="col-md-4">

                                <label class="text-muted">Featured</label>

                                <div class="mt-2">

                                    @if($product->is_featured)
                                    <span class="badge bg-success px-3 py-2">
                                        ⭐ Featured Product
                                    </span>
                                    @else
                                    <span class="badge bg-secondary px-3 py-2">
                                        Regular Product
                                    </span>
                                    @endif

                                </div>

                            </div>

                        </div>

                    </div>
                </div>

                {{-- Description --}}
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-light">
                        <strong>
                            <i class="fas fa-align-left me-2"></i>
                            Description
                        </strong>
                    </div>

                    <div class="card-body">
                        {{ $product->description }}
                    </div>
                </div>

                {{-- Pricing --}}
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-light">
                        <strong>
                            <i class="fas fa-dollar-sign me-2"></i>
                            Pricing & Inventory
                        </strong>
                    </div>

                    <div class="card-body">

                        <div class="row">

                            <div class="col-md-6">
                                <label class="text-muted">Price</label>

                                <p class="form-control bg-light">
                                    ${{ number_format($product->price, 2) }}
                                </p>
                            </div>

                            <div class="col-md-6">
                                <label class="text-muted">Stock</label>

                                <p class="form-control bg-light">
                                    {{ $product->stock }}
                                </p>
                            </div>

                        </div>

                    </div>
                </div>

                {{-- Images --}}
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-light">
                        <strong>
                            <i class="fas fa-images me-2"></i>
                            Product Images
                        </strong>
                    </div>

                    <div class="card-body">

                        <div class="row g-3">

                            @forelse($product->images as $image)

                            <div class="col-lg-3 col-md-4 col-6">

                                <div class="image-box">

                                    <img
                                        src="{{ asset('storage/' . $image->path) }}"
                                        class="gallery-img"
                                        alt="Product Image">

                                </div>

                            </div>

                            @empty

                            <div class="col-12">
                                <div class="alert alert-warning mb-0">
                                    No images uploaded.
                                </div>
                            </div>

                            @endforelse

                        </div>

                    </div>
                </div>

                {{-- Metadata --}}
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-light">
                        <strong>
                            <i class="fas fa-clock me-2"></i>
                            Information
                        </strong>
                    </div>

                    <div class="card-body">

                        <div class="row">

                            <div class="col-md-6">
                                <strong>Created At</strong>

                                <p class="mb-0">
                                    {{ $product->created_at->format('d M Y - h:i A') }}
                                </p>
                            </div>

                            <div class="col-md-6">
                                <strong>Last Updated</strong>

                                <p class="mb-0">
                                    {{ $product->updated_at->format('d M Y - h:i A') }}
                                </p>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="text-end">

                    <a href="{{ route('products.edit', $product) }}"
                        class="btn btn-warning">
                        <i class="fas fa-edit me-2"></i>
                        Edit Product
                    </a>

                    <a href="{{ route('products.index') }}"
                        class="btn btn-secondary">
                        Back
                    </a>

                </div>

            </div>
        </div>

        <style>
            .gallery-img {
                width: 100%;
                height: 220px;
                object-fit: cover;
                border-radius: 10px;
                transition: .3s;
            }

            .gallery-img:hover {
                transform: scale(1.05);
                box-shadow: 0 10px 25px rgba(0, 0, 0, .15);
            }

            .image-box {
                overflow: hidden;
                border-radius: 10px;
            }
        </style>
    </x-slot>
</x-app-layout>