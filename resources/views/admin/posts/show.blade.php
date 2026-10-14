<x-app-layout>
    <x-slot name="header">
        <h1 class="page-title">@if(LaravelLocalization::getCurrentLocale() === 'en') {{ $post->title }} @else {{ $post->title_ar }} @endif</h1>
    </x-slot>
    <x-slot name="extra">
        <p class="text-muted"> Posted by: {{ $post->user->name }} </p>
    </x-slot>
    <x-slot name="content">
        <div class="card shadow mb-4 border-0">
            <div class="card-body p-4">

                <div class="row g-4">

                    <!-- Content -->
                    <div class="col-md-12">
                        <h5 class="mb-3 text-muted">Post Content</h5>

                        <div class="p-3 bg-light rounded">
                            <p class="mb-0">
                                @if(LaravelLocalization::getCurrentLocale() === 'en')
                                    {{ $post->content }}
                                @else
                                    {{ $post->content_ar }}
                                @endif
                            </p>
                        </div>
                    </div>

                    <!-- Images -->
                    <div class="col-md-12">
                        <h5 class="mb-3 text-muted">Images</h5>

                        <div class="row g-3">
                            @forelse ($post->images as $image)
                            <div class="col-md-3 col-6">
                                <div class="image-box">
                                    <img
                                        src="{{ asset('storage/' . $image->path) }}"
                                        class="img-fluid rounded shadow-sm gallery-img"
                                        alt="Post Image">
                                </div>
                            </div>
                            @empty
                            <p class="text-muted">No images uploaded.</p>
                            @endforelse
                        </div>
                    </div>

                    <div class="col-md-12">

                        <h5 class="mb-3 text-muted">Categories</h5>

                        @forelse($post->categories as $category)
                        <span class="badge bg-success me-2 mb-2 px-4 py-2 fs-10 rounded-pill">
                            {{ $category->name }}
                        </span>
                        @empty
                        <p class="text-muted mb-0">No categories assigned.</p>
                        @endforelse

                    </div>
                    <!-- Created At -->
                    <div class="col-md-12">
                        <hr>
                        <p class="text-muted mb-0">
                            Created at: {{ $post->created_at->format('d M Y - h:i A') }}
                        </p>
                    </div>

                    <!-- Back Button -->
                    <div class="col-md-12">
                        <a href="{{ route('posts.index') }}" class="btn btn-primary">
                            ← Back
                        </a>
                    </div>

                </div>

            </div>
        </div>
        <style>
            .gallery-img {
                height: 180px;
                width: 100%;
                object-fit: cover;
                transition: 0.3s;
                border-radius: 10px;
            }

            .gallery-img:hover {
                transform: scale(1.03);
            }

            .image-box {
                overflow: hidden;
                border-radius: 10px;
            }
        </style>
    </x-slot>
</x-app-layout>