<x-app-layout>
    <x-slot name="header">
        <h1 class="page-name"> Create Team Member</h1>
    </x-slot>

    <x-slot name="content">
        <div class="card shadow border-0">
            <div class="card-header bg-white">
                <h4 class="mb-0">
                    <i class="fas fa-user me-2 text-primary"></i>
                    Create Team Member
                </h4>
            </div>

            <div class="card-body">

                <form action="{{ route('team-members.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

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
                                    <label class="form-label">Team Member Email</label>

                                    <input
                                        type="email"
                                        name="email"
                                        class="form-control"
                                        value="{{ old('email') }}">

                                    @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Team Member Position</label>

                                    <input
                                        type="text"
                                        name="position"
                                        class="form-control"
                                        value="{{ old('position') }}">

                                    @error('position')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>



                            <div class="mt-4">

                                <label class="form-label">
                                    Bio
                                </label>

                                <textarea
                                    id="bio"
                                    name="bio"
                                    rows="5"
                                    class="form-control">{{ old('bio') }}</textarea>
                                <small class="text-muted">
                                    <span id="counter">0</span>/500 characters
                                </small>

                                @error('bio')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror

                            </div>
                        </div>

                    </div>
            </div>

            <div class="text-end">

                <button class="btn btn-primary btn-lg">
                    <i class="fas fa-save me-2"></i>
                    Save Team Member
                </button>

                <a href="{{ route('team-members.index') }}" class="btn btn-outline-secondary btn-lg">
                    Cancel
                </a>

            </div>

            </form>

        </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {

                // Character counter
                const textarea = document.getElementById('bio');
                const counter = document.getElementById('counter');

                if (textarea && counter) {
                    function updateCounter() {
                        counter.innerText = textarea.value.length;
                    }

                    updateCounter();
                    textarea.addEventListener('input', updateCounter);
                }


            });
        </script>
    </x-slot>
</x-app-layout>