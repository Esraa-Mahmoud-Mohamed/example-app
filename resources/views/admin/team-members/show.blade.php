<x-app-layout>
    <x-slot name="header">
        <h1 class="page-title">{{ $teamMember->name }}</h1>
    </x-slot>
    <x-slot name="extra">

    </x-slot>
    <x-slot name="content">
        <div class="card shadow border-0">

            <div class="card-header bg-white">
                <h4 class="mb-0">
                    <i class="fas fa-user text-primary me-2"></i>
                    Team Member Details
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

                            <!-- Profile Image -->
                            <div class="col-md-3 text-center">
                                @if ($teamMember->user->images->isNotEmpty())
                                <img
                                    src="{{ asset('storage/' . $teamMember->user->images->first()->path) }}"
                                    alt="{{ $teamMember->user->name }}"
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
                                    <p class="form-control bg-light">{{ $teamMember->user->name }}</p>
                                </div>

                                <div class="mb-3">
                                    <label class="fw-bold">Email</label>
                                    <p class="form-control bg-light">{{ $teamMember->user->email }}</p>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="fw-bold">Role</label>
                                            <p class="form-control bg-light">
                                                {{ $teamMember->user->roles->pluck('name')->join(', ') }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="fw-bold">Position</label>
                                            <p class="form-control bg-light">
                                                {{ $teamMember->position }}
                                            </p>
                                        </div>
                                    </div>
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
                            Bio
                        </strong>
                    </div>

                    <div class="card-body">
                        {{ $teamMember->bio }}
                    </div>
                </div>

                <div class="text-end">

                    <a href="{{ route('team-members.edit', $teamMember) }}"
                        class="btn btn-warning">
                        <i class="fas fa-edit me-2"></i>
                        Edit Team Member
                    </a>

                    <a href="{{ route('team-members.index') }}"
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