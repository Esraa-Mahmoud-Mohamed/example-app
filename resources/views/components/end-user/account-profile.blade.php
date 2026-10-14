@props([
    'user'
])
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
{{-- <div class="card shadow-sm border-0">
    <div class="card-header bg-white">
        <h4 class="mb-0">
            My Profile
        </h4>
    </div>

    <div class="card-body">

        <form
            action="{{ route('enduser.account.profile.update', $user) }}"
            method="POST">

            @csrf
            @method('PUT')

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="form-label">
                        Name
                    </label>

                    <input
                        type="text"
                        name="name"
                        class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name', $user->name) }}">

                    @error('name')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror
                </div>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email', $user->email) }}">

                @error('email')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror

            </div>
            

            <button
                type="submit"
                class="btn btn-black">

                Save Changes

            </button>

        </form>

    </div>
    <div class="card-body">
        <form action="{{ route('password.update', $user) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">
                    New Password
                </label>
                <input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror">
                @error('new_password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">
                    Confirm Password
                </label>
                <input type="password" name="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror">
                @error('confirm_password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </form>
    </div>

</div> --}}