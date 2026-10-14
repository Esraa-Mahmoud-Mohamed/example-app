<x-app-layout>
    <x-slot name="header">
        <h1 class="page-title"> Create Role</h1>
    </x-slot>

    <x-slot name="content">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row">
                    <form action="{{ route('roles.store') }}" method="POST" enctype="multipart/form-data" class="col-12">
                        @csrf
                        <div class="col-12 mb-4">
                            <div class="form-group mb-3 ">
                                <label for="simpleinput"><strong>Role Name</strong></label>
                                <input type="text" id="simpleinput" class="form-control" name="name" value="{{ old('name') }}">
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div> <!-- /.col -->
                        <div class="col-md-12 mb-4">
                            <div class="card shadow">
                                <div class="card-body">
                                    <p class="mb-2"><strong>Permissions</strong></p>
                                    <div class="row">
                                        @forelse($permissions as $permission)
                                        <div class="form-check col-md-3">
                                            <input class="form-check-input" type="checkbox" value="{{ $permission->id }}" id="check-{{ $permission->id }}" name="permissions[]">
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
                        </div>
                        <div class="col-md-6">
                            <input type="submit" class="btn btn-primary" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- / .card -->
    </x-slot>
</x-app-layout>