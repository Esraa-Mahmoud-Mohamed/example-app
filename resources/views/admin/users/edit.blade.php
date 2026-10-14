<x-app-layout>
    <x-slot name="header">
        <h1 class="page-title"> Edit User</h1>
    </x-slot>

    <x-slot name="content">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row">
                    <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-12">
                            <div class="form-group mb-3 ">
                                <label for="simpleinput">Username</label>
                                <input type="text" id="simpleinput" class="form-control" name="name" value="{{ $user->name }}">
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="example-email">Email</label>
                                <input type="email" id="example-email" name="email" class="form-control" placeholder="Email" value="{{ $user->email }}">
                                @error('email')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="role">Role</label>
                                <select class="form-control" name="role" id="role">
                                    <option value="">Select Role</option>
                                    @foreach ($roles as $role)
                                    <option value="{{ $role->id }}" {{ $user->roles->contains($role->id) ? 'selected' : '' }}>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                @error('role_id')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                @if ($user->images->isNotEmpty())
                                <img src="{{  asset('storage/' . $user->images->first()->path) }}" alt="No Image Found" class="img-thumbnail mb-2" style="max-width: 200px;">
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label for="customFile">Upload or Replace Image</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="image">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                                @error('image')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div> <!-- /.col -->
                        <div class="col-md-6">
                            <input type="submit" class="btn btn-primary" value="Submit">
                        </div>


                    </form>

                </div>
            </div>
        </div> <!-- / .card -->
    </x-slot>
</x-app-layout>