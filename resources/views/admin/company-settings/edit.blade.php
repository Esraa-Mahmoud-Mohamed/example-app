<x-app-layout>
        <x-slot name="header">
        <h1 class="page-title"> Edit Company Settings</h1>
    </x-slot>
    <x-slot name="content">

        <div class="card shadow border-0">

            <div class="card-header bg-white">
                <h4 class="mb-0">
                    <i class="fas fa-building text-primary me-2"></i>
                    Edit Company Settings
                </h4>
            </div>

            <div class="card-body">

                <form action="{{ route('company-settings.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Branding --}}
                    <div class="card shadow-sm mb-4">

                        <div class="card-header bg-light">
                            <strong>
                                <i class="fas fa-image me-2"></i>
                                Branding
                            </strong>
                        </div>

                        <div class="card-body">

                            <div class="row">

                                {{-- Logo --}}
                                <div class="col-md-6">

                                    <label class="form-label fw-bold">
                                        Company Logo
                                    </label>

                                    @if($companySetting->logo)
                                    <div class="mb-3">
                                        <img
                                            src="{{ asset('storage/'.$companySetting->logo) }}"
                                            class="img-thumbnail shadow"
                                            style="max-height:180px;">
                                    </div>
                                    @endif

                                    <input
                                        type="file"
                                        name="logo"
                                        class="form-control">

                                    @error('logo')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror

                                </div>

                                {{-- Favicon --}}
                                <div class="col-md-6">

                                    <label class="form-label fw-bold">
                                        Favicon
                                    </label>

                                    @if($companySetting->favicon)
                                    <div class="mb-3">
                                        <img
                                            src="{{ asset($companySetting->favicon) }}"
                                            class="img-thumbnail shadow"
                                            style="width:80px;height:80px;">
                                    </div>
                                    @endif

                                    <input
                                        type="file"
                                        name="favicon"
                                        class="form-control">

                                    @error('favicon')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror

                                </div>

                            </div>

                        </div>

                    </div>

                    {{-- Company Information --}}
                    <div class="card shadow-sm mb-4">

                        <div class="card-header bg-light">
                            <strong>
                                <i class="fas fa-building me-2"></i>
                                Company Information
                            </strong>
                        </div>

                        <div class="card-body">

                            <div class="row">

                                <div class="col-md-6 mb-3">

                                    <label class="form-label">
                                        Company Name
                                    </label>

                                    <input
                                        type="text"
                                        name="name"
                                        value="{{ old('name',$companySetting->name) }}"
                                        class="form-control">

                                    @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                </div>

                                <div class="col-md-6 mb-3">

                                    <label class="form-label">
                                        Company Email
                                    </label>

                                    <input
                                        type="email"
                                        name="email"
                                        value="{{ old('email',$companySetting->email) }}"
                                        class="form-control">

                                    @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                </div>

                                <div class="col-md-6 mb-3">

                                    <label class="form-label">
                                        Phone
                                    </label>

                                    <input
                                        type="text"
                                        name="phone"
                                        value="{{ old('phone',$companySetting->phone) }}"
                                        class="form-control">

                                    @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                </div>

                                <div class="col-md-6 mb-3">

                                    <label class="form-label">
                                        Address
                                    </label>

                                    <input
                                        type="text"
                                        name="address"
                                        value="{{ old('address',$companySetting->address) }}"
                                        class="form-control">

                                    @error('address')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                </div>

                            </div>

                        </div>

                    </div>

                    {{-- Social Media --}}
                    <div class="card shadow-sm mb-4">

                        <div class="card-header bg-light">
                            <strong>
                                <i class="fas fa-share-alt me-2"></i>
                                Social Media
                            </strong>
                        </div>

                        <div class="card-body">

                            <div class="row">

                                <div class="col-md-6 mb-3">

                                    <label>Facebook</label>

                                    <input
                                        type="url"
                                        name="facebook"
                                        value="{{ old('facebook',$companySetting->facebook) }}"
                                        class="form-control">

                                </div>

                                <div class="col-md-6 mb-3">

                                    <label>Instagram</label>

                                    <input
                                        type="url"
                                        name="instagram"
                                        value="{{ old('instagram',$companySetting->instagram) }}"
                                        class="form-control">

                                </div>

                                <div class="col-md-6 mb-3">

                                    <label>Twitter / X</label>

                                    <input
                                        type="url"
                                        name="twitter"
                                        value="{{ old('twitter',$companySetting->twitter) }}"
                                        class="form-control">

                                </div>

                                <div class="col-md-6 mb-3">

                                    <label>LinkedIn</label>

                                    <input
                                        type="url"
                                        name="linkedin"
                                        value="{{ old('linkedin',$companySetting->linkedin) }}"
                                        class="form-control">

                                </div>

                            </div>

                        </div>

                    </div>

                    {{-- Footer --}}
                    <div class="card shadow-sm mb-4">

                        <div class="card-header bg-light">
                            <strong>
                                <i class="fas fa-window-maximize me-2"></i>
                                Footer
                            </strong>
                        </div>

                        <div class="card-body">

                            <div class="mb-4">

                                <label>
                                    Footer Description
                                </label>

                                <textarea
                                    id="footer_description"
                                    name="footer_description"
                                    rows="5"
                                    maxlength="500"
                                    class="form-control">{{ old('footer_description',$companySetting->footer_description) }}</textarea>

                                <small class="text-muted">
                                    <span id="counter">0</span>/500 characters
                                </small>

                            </div>

                            <div>

                                <label>
                                    Copyright
                                </label>

                                <input
                                    type="text"
                                    name="copyright"
                                    value="{{ old('copyright',$companySetting->copyright) }}"
                                    class="form-control">

                            </div>

                        </div>

                    </div>

                    <div class="text-end">

                        <button class="btn btn-primary btn-lg">
                            <i class="fas fa-save me-2"></i>
                            Save Changes
                        </button>

                        <a href="{{ route('company-settings.show') }}"
                            class="btn btn-outline-secondary btn-lg">
                            Cancel
                        </a>

                    </div>

                </form>

            </div>

        </div>

        <script>
            const textarea = document.getElementById('footer_description');
            const counter = document.getElementById('counter');

            function updateCounter() {
                counter.innerText = textarea.value.length;
            }

            updateCounter();

            textarea.addEventListener('input', updateCounter);
        </script>

    </x-slot>
</x-app-layout>