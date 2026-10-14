<x-app-layout>
    <x-slot name="header">
        <h1 class="page-title"> {{ $role->name }} info</h1>
    </x-slot>

    <x-slot name="content">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group mb-3 ">
                            <label>Role Name</label>
                            <p class="form-control">{{ $role->name }}</p>
                        </div>
                        <div class="form-group mb-3">
                            <label class="mb-3">Permissions</label>
                            <div class="row">
                                @forelse($role->permissions as $permission)
                                <span class="badge bg-success me-2 mb-2 px-4 py-2 fs-10 rounded-pill">
                                    {{ $permission->name }}
                                </span>
                                @empty
                                <p class="text-muted mb-0">No permissions assigned.</p>
                                @endforelse
                            </div>
                        </div>
                    </div> <!-- /.col -->
                    <div class="col-md-6">
                        <a href="{{ route('roles.index') }}" class="btn btn-sm btn-dark">Back</a>
                    </div>
                </div>
            </div>
        </div> <!-- / .card -->
    </x-slot>
</x-app-layout>