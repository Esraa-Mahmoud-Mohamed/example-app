<x-app-layout>
    <x-slot name="header">
        <h1 class="page-name"> Edit Product</h1>
    </x-slot>

    <x-slot name="content">
        <div class="card shadow border-0">

            <div class="card-header bg-white">
                <h4 class="mb-0">
                    <i class="fas fa-edit text-primary me-2"></i>
                    Edit Product
                </h4>
            </div>

            <div class="card-body">

                <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Images --}}
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-light">
                            <strong>
                                <i class="fas fa-images me-2"></i>
                                Product Images
                            </strong>
                        </div>

                        <div class="card-body">

                            <h6 class="mb-3">Current Images</h6>

                            <div class="row g-3 mb-4">

                                @foreach($product->images as $image)

                                <div class="col-lg-3 col-md-4 col-6">
                                    <div class="image-card" id="image-{{ $image->id }}">

                                        <img
                                            src="{{ asset('storage/'.$image->path) }}"
                                            class="img-fluid product-image">

                                        <button
                                            type="button"
                                            class="image-action btn btn-danger btn-sm rounded-circle"
                                            onclick="toggleDelete('{{ $image->id }}')">

                                            <i id="icon-{{ $image->id }}" class="fas fa-times"></i>

                                        </button>

                                        <input
                                            type="hidden"
                                            name="delete_images[]"
                                            id="delete-{{ $image->id }}"
                                            value="">
                            @error('delete_images')
                            <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror

                            @error('delete_images.*')
                            <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror

                                    </div>
                                </div>

                                @endforeach

                            </div>

                            <hr>

                            <label class="form-label">
                                Upload More Images
                            </label>

                            <input
                                type="file"
                                id="images"
                                class="form-control"
                                name="images[]"
                                multiple>

                            @error('images')
                            <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror

                            @error('images.*')
                            <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror

                            <div id="preview" class="row mt-4"></div>

                        </div>
                    </div>

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

                                    <label>Name</label>

                                    <input
                                        type="text"
                                        class="form-control"
                                        name="name"
                                        value="{{ old('name',$product->name) }}">

                                    @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                </div>

                                <div class="col-md-4 d-flex align-items-center">

                                    <div class="form-check form-switch mt-4">

                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            name="is_featured"
                                            value="1"
                                            id="featured"
                                            {{ old('is_featured',$product->is_featured) ? 'checked' : '' }}>

                                        <label class="form-check-label ms-2" for="featured">
                                            ⭐ Featured Product
                                        </label>

                                    </div>

                                </div>

                            </div>

                            <div class="mt-4">

                                <label>Description</label>

                                <textarea
                                    id="description"
                                    class="form-control"
                                    rows="5"
                                    name="description">{{ old('description',$product->description) }}</textarea>

                                <small class="text-muted">
                                    <span id="counter">0</span> characters
                                </small>

                                @error('description')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror

                            </div>

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

                                    <label>Price</label>

                                    <div class="input-group">

                                        <span class="input-group-text">$</span>

                                        <input
                                            type="number"
                                            step="0.01"
                                            class="form-control"
                                            name="price"
                                            value="{{ old('price',$product->price) }}">

                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <label>Stock</label>

                                    <input
                                        type="number"
                                        class="form-control"
                                        name="stock"
                                        value="{{ old('stock',$product->stock) }}">

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="text-end">

                        <input type="submit" class="btn btn-primary" value="Submit">

                        <a href="{{ route('products.index') }}"
                            class="btn btn-outline-secondary btn-lg">
                            Cancel
                        </a>

                    </div>

                </form>
            </div>
        </div>

        <script>
            const textarea = document.getElementById('description');
            const counter = document.getElementById('counter');

            function toggleDelete(id) {

                const card = document.getElementById('image-' + id);
                const input = document.getElementById('delete-' + id);
                const icon = document.getElementById('icon-' + id);
                const button = icon.parentElement;

                if (card.classList.contains('deleted')) {

                    card.classList.remove('deleted');
                    input.value = '';

                    button.classList.remove('btn-success');
                    button.classList.add('btn-danger');

                    icon.className = 'fas fa-times';

                } else {

                    card.classList.add('deleted');
                    input.value = id;

                    button.classList.remove('btn-danger');
                    button.classList.add('btn-success');

                    icon.className = 'fas fa-undo';

                }

            }

            function updateCounter() {
                counter.innerText = textarea.value.length;
            }

            if (textarea && counter) {
                updateCounter();
                textarea.addEventListener('input', updateCounter);
            }

            const input = document.getElementById('images');
            const preview = document.getElementById('preview');

            if (input && preview) {

                input.addEventListener('change', function() {
                    

                    preview.innerHTML = '';

                    [...this.files].forEach(file => {

                        const reader = new FileReader();

                        reader.onload = function(e) {

                            preview.innerHTML += `
                    <div class="col-md-3 mb-3">
                        <img src="${e.target.result}"
                             class="img-fluid rounded shadow"
                             style="height:180px;object-fit:cover;">
                    </div>
                `;

                        };

                        reader.readAsDataURL(file);

                    });

                });

            }
            document.querySelector('form').addEventListener('submit', function(e) {
                console.log('Form submitted');
            });
        </script>
        <style>
            .image-card {
                position: relative;
                overflow: hidden;
                border-radius: 12px;
            }

            .product-image {
                width: 100%;
                height: 180px;
                object-fit: cover;
                transition: .3s;
            }

            .image-card.deleted .product-image {
                filter: blur(3px) brightness(.45);
                transform: scale(.97);
            }

            .image-action {
                position: absolute;
                top: 10px;
                right: 10px;
                width: 36px;
                height: 36px;
                display: flex;
                align-items: center;
                justify-content: center;
                z-index: 2;
            }

            .image-action {
                position: absolute;
                top: 10px;
                right: 10px;
                width: 38px;
                height: 38px;
                border: none;
                border-radius: 50%;
                background: rgba(220, 53, 69, .9);
                color: #fff;
                backdrop-filter: blur(6px);
                transition: .25s;
            }

            .image-action:hover {
                transform: scale(1.1);
            }

            .image-card.deleted .image-action {
                background: rgba(25, 135, 84, .95);
            }
        </style>
    </x-slot>
</x-app-layout>