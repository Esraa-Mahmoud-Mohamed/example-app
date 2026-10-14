<x-app-layout>
    <x-slot name="header">
        {{ __('admin.Company Settings') }}
    </x-slot>
    <x-slot name="extra">
        @can('edit-company-setting')
        <a href="{{ route('company-settings.edit') }}" class="btn btn-primary">
            <i class="fas fa-edit me-2"></i>
            Edit Settings
        </a>
        @endcan
        @can('reset-company-setting')
        <a href="{{ route('company-settings.reset') }}" class="btn btn-primary">
            <i class="fas fa-sync-alt me-2"></i>
            Reset Settings
        </a>
        @endcan
    </x-slot>

    <x-slot name="content">

        <div class="card shadow border-0">

            <div class="card-header bg-white">
                <h4 class="mb-0">
                    <i class="fas fa-building text-primary me-2"></i>
                    Company Settings
                </h4>
            </div>

            <div class="card-body">

                {{-- Logo & Favicon --}}
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-light">
                        <strong>
                            <i class="fas fa-image me-2"></i>
                            Branding
                        </strong>
                    </div>

                    <div class="card-body">

                        <div class="row">

                            <div class="col-md-6 text-center">

                                <h6 class="mb-3">Logo</h6>

                                @if($companySetting->logo)
                                <img
                                    src="{{ asset('storage/'.$companySetting->logo) }}"
                                    class="img-fluid rounded shadow"
                                    style="max-height:180px;">
                                @else
                                <div class="alert alert-warning mb-0">
                                    No logo uploaded.
                                </div>
                                @endif

                            </div>

                            <div class="col-md-6 text-center">

                                <h6 class="mb-3">Favicon</h6>

                                @if($companySetting->favicon)
                                <img
                                    src="{{ asset($companySetting->favicon) }}"
                                    class="img-thumbnail shadow"
                                    style="width:80px;height:80px;">
                                @else
                                <div class="alert alert-warning mb-0">
                                    No favicon uploaded.
                                </div>
                                @endif

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
                                <label class="fw-bold">Company Name</label>
                                <p class="form-control bg-light">
                                    {{ $companySetting->name }}
                                </p>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Email</label>
                                <p class="form-control bg-light">
                                    {{ $companySetting->email }}
                                </p>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Phone</label>
                                <p class="form-control bg-light">
                                    {{ $companySetting->phone }}
                                </p>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Address</label>
                                <p class="form-control bg-light">
                                    {{ $companySetting->address }}
                                </p>
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
                                <label class="fw-bold">Facebook</label>

                                <p class="form-control bg-light">
                                    {{ $companySetting->facebook ?: '-' }}
                                </p>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Instagram</label>

                                <p class="form-control bg-light">
                                    {{ $companySetting->instagram ?: '-' }}
                                </p>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">Twitter / X</label>

                                <p class="form-control bg-light">
                                    {{ $companySetting->twitter ?: '-' }}
                                </p>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="fw-bold">LinkedIn</label>

                                <p class="form-control bg-light">
                                    {{ $companySetting->linkedin ?: '-' }}
                                </p>
                            </div>

                        </div>

                    </div>

                </div>

                {{-- Footer --}}
                <div class="card shadow-sm">

                    <div class="card-header bg-light">
                        <strong>
                            <i class="fas fa-window-maximize me-2"></i>
                            Footer
                        </strong>
                    </div>

                    <div class="card-body">

                        <div class="mb-4">

                            <label class="fw-bold">
                                Footer Description
                            </label>

                            <div class="p-3 bg-light rounded">
                                {{ $companySetting->footer_description ?: '-' }}
                            </div>

                        </div>

                        <div>

                            <label class="fw-bold">
                                Copyright
                            </label>

                            <p class="form-control bg-light mb-0">
                                {{ $companySetting->copyright ?: '-' }}
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </x-slot>
</x-app-layout>