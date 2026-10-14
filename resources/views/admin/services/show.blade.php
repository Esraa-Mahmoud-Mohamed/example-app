<x-app-layout>
    <x-slot name="header">
        <!-- <h1 class="page-title"></h1> -->
    </x-slot>
    <x-slot name="extra">

    </x-slot>
    <x-slot name="content">
        <div class="card shadow mb-4 border-0">
            <div class="card-body p-4">
                <div class="row g-4">
                    <!-- Profile Image -->
                    <div class="col-md-3 text-center">
                        @if ($service->images->isNotEmpty())
                        <img
                            src="{{ asset('storage/' . $service->images->first()->path) }}"
                            alt="{{ $service->title }}"
                            class="img-fluid rounded-circle shadow"
                            style="width: 180px; height: 180px; object-fit: cover;">
                        @else
                        <img
                            src="{{ asset('images/default-avatar.png') }}"
                            alt="Default Avatar"
                            class="img-fluid rounded-circle shadow"
                            style="width: 180px; height: 180px; object-fit: cover;">
                        @endif
                    </div>
                    <!-- Message -->
                    <div class="col-md-9">
                        <div class="mb-3">
                            <h5 class="text-muted">Title</h5>
                            <div class="p-3 bg-light rounded">
                                <p class="mb-0">
                                    {{ $service->title }}
                                </p>
                            </div>
                        </div>
                        <h5 class="mb-3 text-muted">Details</h5>
                        <div class="p-3 bg-light rounded">
                            <p class="mb-0">
                                {{ $service->details }}
                            </p>
                        </div>
                    </div>
                    <!-- Back Button -->
                    <div class="col-md-12">
                        <a href="{{ route('services.index') }}" class="btn btn-primary">
                            ← Back
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>