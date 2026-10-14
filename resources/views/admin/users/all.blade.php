<x-app-layout>
    <x-slot name="header">
        <h1 class="page-title"> All Users</h1>
    </x-slot>

    <x-slot name="extra">
        @can('create-user')
        <a href="{{ route('users.create') }}" class="btn btn-dark"> Create User</a>
        @endcan
    </x-slot>

    <x-slot name="content">
        <div class="card shadow">
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Created at</th>
                            <th>Controls</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $index => $user)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->getRoleNames()->implode(', ') }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>
                                @can('view-user')
                                <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm btn-{{ App\Enums\ActionButtonEnum::SHOW->color() }}" title="{{ App\Enums\ActionButtonEnum::SHOW->label() }}">
                                    <!-- {{ App\Enums\ActionButtonEnum::SHOW->value }} -->
                                    <i class="{{ App\Enums\ActionButtonEnum::SHOW->icon() }}"></i>
                                </a>
                                @endcan
                                @can('edit-user')
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-{{ App\Enums\ActionButtonEnum::EDIT->color() }}" title="{{ App\Enums\ActionButtonEnum::EDIT->label() }}">
                                    <!-- {{ App\Enums\ActionButtonEnum::EDIT->value }} -->
                                    <i class="{{ App\Enums\ActionButtonEnum::EDIT->icon() }}"></i>
                                </a>
                                @endcan
                                @can('delete-user')
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-{{ App\Enums\ActionButtonEnum::DELETE->color() }}" title="{{ App\Enums\ActionButtonEnum::DELETE->label() }}">
                                        <!-- {{ App\Enums\ActionButtonEnum::DELETE->value }} -->
                                        <i class="{{ App\Enums\ActionButtonEnum::DELETE->icon() }}"></i>
                                    </button>
                                </form>
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </x-slot>


</x-app-layout>