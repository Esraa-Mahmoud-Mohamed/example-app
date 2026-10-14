<x-app-layout>
    <x-slot name="header">
        <h1 class="page-name"> Create Product</h1>
    </x-slot>

    <x-slot name="content">
        <div class="card shadow border-0">
            <div class="card-header bg-white">
                <h4 class="mb-0">
                    <i class="fas fa-box-open me-2 text-primary"></i>
                    Create Product
                </h4>
            </div>

            <div class="card-body">

                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf


                    {{-- Images --}}
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-light">
                            <strong>
                                <i class="fas fa-images me-2"></i>
                                Product Images
                            </strong>
                        </div>

                        <div class="card-body">

                            <div id="drop-area"
                                class="border border-2 border-dashed rounded p-5 text-center">

                                <i class="fas fa-cloud-upload-alt fa-3x text-primary mb-3"></i>

                                <h5>Drag & Drop Images Here</h5>

                                <p class="text-muted">
                                    or click the button below to browse
                                </p>

                                <input
                                    type="file"
                                    id="images"
                                    name="images[]"
                                    multiple
                                    hidden>

                                <button
                                    type="button"
                                    class="btn btn-outline-primary"
                                    onclick="document.getElementById('images').click()">
                                    <i class="fas fa-folder-open me-2"></i>
                                    Select Images
                                </button>

                                @error('images')
                                <div class="text-danger mt-3">{{ $message }}</div>
                                @enderror

                                @error('images.*')
                                <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror

                                <div id="preview" class="row g-3 mt-4"></div>

                            </div>

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
                                    <label class="form-label">Product Name</label>

                                    <input
                                        type="text"
                                        name="name"
                                        class="form-control"
                                        value="{{ old('name') }}">

                                    @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4 d-flex align-items-center">

                                    <div class="form-check form-switch mt-4">
                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            id="is_featured"
                                            name="is_featured"
                                            value="1"
                                            {{ old('is_featured') ? 'checked' : '' }}>

                                        <label class="form-check-label fw-bold ms-2" for="is_featured">
                                            ⭐ Featured Product
                                        </label>
                                    </div>

                                </div>

                            </div>

                            <div class="mt-4">

                                <label class="form-label">
                                    Description
                                </label>

                                <textarea
                                    id="description"
                                    name="description"
                                    rows="5"
                                    class="form-control">{{ old('description') }}</textarea>
                                <small class="text-muted">
                                    <span id="counter">0</span>/500 characters
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

                                    <label class="form-label">
                                        Price
                                    </label>

                                    <div class="input-group">

                                        <span class="input-group-text">
                                            $
                                        </span>

                                        <input
                                            type="number"
                                            step="any"
                                            name="price"
                                            value="{{ old('price') }}"
                                            class="form-control">

                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <label class="form-label">
                                        Stock
                                    </label>

                                    <input
                                        type="number"
                                        name="stock"
                                        value="{{ old('stock') }}"
                                        class="form-control">

                                    @error('stock')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="text-end">

                        <button class="btn btn-primary btn-lg">
                            <i class="fas fa-save me-2"></i>
                            Save Product
                        </button>

                        <a href="{{ route('products.index') }}" class="btn btn-outline-secondary btn-lg">
                            Cancel
                        </a>

                    </div>

                </form>

            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {

                // Character counter
                const textarea = document.getElementById('description');
                const counter = document.getElementById('counter');

                if (textarea && counter) {
                    function updateCounter() {
                        counter.innerText = textarea.value.length;
                    }

                    updateCounter();
                    textarea.addEventListener('input', updateCounter);
                }

                // Image preview
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
                                 class="img-fluid rounded shadow">
                        </div>
                    `;

                            };

                            reader.readAsDataURL(file);

                        });

                    });

                }

                const dropArea = document.getElementById('drop-area');

                ['dragenter', 'dragover'].forEach(event => {
                    dropArea.addEventListener(event, e => {
                        e.preventDefault();
                        dropArea.classList.add('border-primary', 'bg-light');
                    });
                });

                ['dragleave', 'drop'].forEach(event => {
                    dropArea.addEventListener(event, e => {
                        e.preventDefault();
                        dropArea.classList.remove('border-primary', 'bg-light');
                    });
                });

                dropArea.addEventListener('drop', e => {

                    input.files = e.dataTransfer.files;

                    input.dispatchEvent(new Event('change'));

                });

            });
        </script>
    </x-slot>
</x-app-layout>