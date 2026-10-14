<x-app-layout>
    <x-slot name="header">
        <h1 class="page-title"> {{ $user->name }} info</h1>
    </x-slot>

    <x-slot name="content">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="row mb-4 align-items-center">

                            <!-- Profile Image -->
                            <div class="col-md-3 text-center">
                                @if ($user->images->isNotEmpty())
                                <img
                                    src="{{ asset('storage/' . $user->images->first()->path) }}"
                                    alt="{{ $user->name }}"
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

                            <!-- User Information -->
                            <div class="col-md-9">
                                <div class="mb-3">
                                    <label class="fw-bold">Username</label>
                                    <p class="form-control">{{ $user->name }}</p>
                                </div>

                                <div class="mb-3">
                                    <label class="fw-bold">Email</label>
                                    <p class="form-control">{{ $user->email }}</p>
                                </div>

                                <div class="mb-0">
                                    <label class="fw-bold">Role</label>
                                    <p class="form-control">
                                        {{ $user->roles->pluck('name')->join(', ') }}
                                    </p>
                                </div>
                            </div>

                        </div>
                        <div class="form-group mb-3">
                            <!-- <div class="card-body"> -->
                                <div class="card shadow-sm mt-4">
                                    <div class="card-header">
                                        <h5 class="mb-0">Posts by {{ $user->name }}</h5>
                                    </div>

                                    <div class="card-body">
                                        @forelse($user->posts as $post)
                                        <div class="border rounded p-3 mb-3">
                                            <h5>{{ $post->title }}</h5>
                                            <p class="text-muted mb-0">
                                                {{ $post->content }}
                                            </p>
                                        </div>
                                        @empty
                                        <p class="text-muted mb-0">This user has no posts.</p>
                                        @endforelse
                                    </div>
                                </div>
                            <!-- </div> -->
                        </div>

                    </div> <!-- /.col -->
                    <div class="col-md-6">
                        <!-- <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-primary">Edit</a> -->
                        <a href="{{ route('users.index') }}" class="btn btn-lg btn-dark">Back</a>
                    </div>
                </div>
            </div>



        </div> <!-- / .card -->
    </x-slot>
</x-app-layout>