<x-app-layout>
    <x-slot name="header">
        <h1 class="page-title"> Create User</h1>
    </x-slot>

    <x-slot name="content">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row">
                    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-12">
                            <div class="form-group mb-3 ">
                                <label for="simpleinput">Username</label>
                                <input type="text" id="simpleinput" class="form-control" name="name" value="{{ old('name') }}">
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="example-email">Email</label>
                                <input type="email" id="example-email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                                @error('email')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input type="password" id="password" class="form-control" name="password" value="{{ old('password') }}">
                                @error('password')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Confirm Password</label>
                                <input type="password" id="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="role">Role</label>
                                <select class="form-control" name="role" id="role">
                                    <option value="">Select Role</option>
                                    @foreach ($roles as $role)
                                    <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                @error('role_id')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="customFile">Upload Image</label>
                            <div class="custom-file">
                                <input type="file" class="form-control" id="customFile" name="image">
                                <label class="custom-file-label" for="customFile" id="fileLabel">
                                    Choose file
                                </label>
                            </div>
                            @error('image')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {

                                const input = document.getElementById('customFile');
                                const label = document.getElementById('fileLabel');

                                input.addEventListener('change', function() {

                                    const fileName = this.files && this.files.length > 0 ?
                                        this.files[0].name :
                                        'Choose file';

                                    label.innerText = fileName;
                                });

                            });
                        </script>
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