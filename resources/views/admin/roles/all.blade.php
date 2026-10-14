<x-app-layout>
    <x-slot name="header">
        <h1 class="page-title"> All Roles</h1>
    </x-slot>

    <x-slot name="extra">

        <a href="{{ route('roles.create') }}" class="btn btn-dark"> Create Role</a>

    </x-slot>

    <x-slot name="content">
        <div class="card shadow">
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Created at</th>
                            <th>Controls</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $index => $role)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->created_at }}</td>
                            <td>
                                <a href="{{ route('roles.show', $role->id) }}" class="btn btn-sm btn-{{ App\Enums\ActionButtonEnum::SHOW->color() }}"
                                    title="{{ App\Enums\ActionButtonEnum::SHOW->label() }}">
                                    {{ App\Enums\ActionButtonEnum::SHOW->value }}
                                    <i class="{{ App\Enums\ActionButtonEnum::SHOW->icon() }}"></i>
                                </a>
                                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm btn-{{ App\Enums\ActionButtonEnum::EDIT->color() }}"
                                    title="{{ App\Enums\ActionButtonEnum::EDIT->label() }}">
                                    {{ App\Enums\ActionButtonEnum::EDIT->value }}
                                    <i class="{{ App\Enums\ActionButtonEnum::EDIT->icon() }}"></i>
                                </a>
                                <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-{{ App\Enums\ActionButtonEnum::DELETE->color() }}" title="{{ App\Enums\ActionButtonEnum::DELETE->label() }}">
                                        {{ App\Enums\ActionButtonEnum::DELETE->value }}
                                        <i class="{{ App\Enums\ActionButtonEnum::DELETE->icon() }}"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </x-slot>


</x-app-layout>