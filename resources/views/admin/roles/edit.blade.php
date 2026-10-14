<x-app-layout>
    <x-slot name="header">
        <h1 class="page-title"> Edit Role</h1>
    </x-slot>

    <x-slot name="content">
        <div class="card shadow mb-4">
            <div class="card-body">
                <!-- <div class="row"> -->
                    <form action="{{ route('roles.update', $role) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-3 ">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" class="form-control" name="name" value="{{ $role->name }}">
                                    @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> <!-- /.col -->
                            <div class="col-md-6 mb-4">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <p class="mb-2"><strong>Permissions</strong></p>
                                        @forelse($permissions as $permission)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="{{ $permission->id }}" id="check-{{ $permission->id }}" name="permissions[]"
                                                {{ $role->permissions->contains($permission->id) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="check-{{ $permission->id }}">
                                                    {{ $permission->name }}
                                                </label>
                                            </div>
                                        @empty
                                            <p>Add at least one permission to create a role.</p>
                                        @endforelse
                                        @error('permissions')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div> <!-- /.row -->
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary" value="Submit">
                        </div>
                    </form>
                <!-- </div> -->
            </div>
        </div> <!-- / .card -->
    </x-slot>
</x-app-layout>