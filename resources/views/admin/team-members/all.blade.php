<x-app-layout>
    <x-slot name="header">
        <h1 class="page-title"> All Team Members</h1>
    </x-slot>

    <x-slot name="extra">
        @can('create-team-member')
        <a href="{{ route('team-members.create') }}" class="btn btn-dark"> Create Team Member</a>
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
                            <th>Position</th>
                            <th>Email</th>
                            <th>Created at</th>
                            <th>Controls</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($teamMembers as $index => $teamMember)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $teamMember->user->name }}</td>
                            <td>{{ $teamMember->position }}</td>
                            <td>{{ $teamMember->user->email }}</td>
                            <td>{{ $teamMember->created_at }}</td>
                            <td>
                                @can('view-team-member')
                                <a href="{{ route('team-members.show', $teamMember) }}" class="btn btn-sm btn-{{ App\Enums\ActionButtonEnum::SHOW->color() }}" title="{{ App\Enums\ActionButtonEnum::SHOW->label() }}">
                                    <!-- {{ App\Enums\ActionButtonEnum::SHOW->value }} -->
                                    <i class="{{ App\Enums\ActionButtonEnum::SHOW->icon() }}"></i>
                                </a>
                                @endcan
                                @can('edit-team-member')
                                <a href="{{ route('team-members.edit', $teamMember) }}" class="btn btn-sm btn-{{ App\Enums\ActionButtonEnum::EDIT->color() }}" title="{{ App\Enums\ActionButtonEnum::EDIT->label() }}">
                                    <!-- {{ App\Enums\ActionButtonEnum::EDIT->value }} -->
                                    <i class="{{ App\Enums\ActionButtonEnum::EDIT->icon() }}"></i>
                                </a>
                                @endcan
                                @can('delete-team-member')
                                <form action="{{ route('team-members.destroy', $teamMember) }}" method="post" style="display: inline;">
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
                        @empty
                        <tr>
                            <td colspan="5" class="text-center">No team members found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </x-slot>
</x-app-layout>