<x-app-layout>
    <x-slot name="header">
        <h1 class="page-name"> Edit Team Member</h1>
    </x-slot>

    <x-slot name="content">
        <div class="card shadow border-0">

            <div class="card-header bg-white">
                <h4 class="mb-0">
                    <i class="fas fa-edit text-primary me-2"></i>
                    Edit Team Member
                </h4>
            </div>

            <div class="card-body">

                <form action="{{ route('team-members.update', $teamMember) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

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
                                <div class="col-md-6">

                                    <label>Email</label>

                                    <input
                                        type="text"
                                        class="form-control"
                                        name="email"
                                        value="{{ old('email',$teamMember->user->email) }}">

                                    @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                </div>

                                <div class="col-md-6">

                                    <label>Position</label>

                                    <input
                                        type="text"
                                        class="form-control"
                                        name="position"
                                        value="{{ old('position',$teamMember->position) }}">

                                    @error('position')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                </div>

                            </div>

                            <div class="mt-4">

                                <label>Bio</label>

                                <textarea
                                    id="bio"
                                    class="form-control"
                                    rows="5"
                                    name="bio">{{ old('bio',$teamMember->bio) }}</textarea>

                                <small class="text-muted">
                                    <span id="counter">0</span> characters
                                </small>

                                @error('bio')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror

                            </div>

                        </div>

                    </div>

                    <div class="text-end">

                        <input type="submit" class="btn btn-primary" value="Submit">

                        <a href="{{ route('team-members.index') }}"
                            class="btn btn-outline-secondary btn-lg">
                            Cancel
                        </a>

                    </div>

                </form>
            </div>
        </div>

        <script>
            const textarea = document.getElementById('bio');
            const counter = document.getElementById('counter');


            function updateCounter() {
                counter.innerText = textarea.value.length;
            }

            if (textarea && counter) {
                updateCounter();
                textarea.addEventListener('input', updateCounter);
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