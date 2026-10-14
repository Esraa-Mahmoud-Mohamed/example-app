<x-app-layout>
    <x-slot name="header">
        <!-- <h1 class="page-title"></h1> -->
    </x-slot>
    <x-slot name="extra">
        <p class="text-muted"> Created by: {{ $testimonial->user->name }} </p>
    </x-slot>
    <x-slot name="content">
        <div class="card shadow mb-4 border-0">
            <div class="card-body p-4">
                <div class="row g-4">
                    <!-- Profile Image -->
                    <div class="col-md-3 text-center">
                        @if ($testimonial->user->images->isNotEmpty())
                        <img
                            src="{{ asset('storage/' . $testimonial->user->images->first()->path) }}"
                            alt="{{ $testimonial->user->name }}"
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
                        <h5 class="mb-3 text-muted">Testimonial Message</h5>
                        <div class="p-3 bg-light rounded">
                            <p class="mb-0">
                                {{ $testimonial->message }}
                            </p>
                        </div>
                    </div>
                    <!-- Created At -->
                    <div class="col-md-12">
                        <hr>
                        <p class="text-muted mb-0">
                            Created at: {{ $testimonial->created_at->format('d M Y - h:i A') }}
                        </p>
                    </div>
                    <!-- Back Button -->
                    <div class="col-md-12">
                        <a href="{{ route('testimonials.index') }}" class="btn btn-primary">
                            ← Back
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>