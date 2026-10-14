<x-app-layout>
    <x-slot name="header">
        <h1 class="page-title"> All Posts</h1>
    </x-slot>

    <x-slot name="extra">
        @can('create-post')
            <a href="{{ route('posts.create') }}" class="btn btn-dark"> Create Post</a>
        @endcan
    </x-slot>

    <x-slot name="content">
        <div class="card shadow">
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Added by</th>
                            <th>Created at</th>
                            <th>Controls</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($posts as $index => $post)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ str()->limit($post->content, 40) }}</td>
                            <td>{{ $post->user->name }}</td>
                            <td>{{ $post->created_at }}</td>
                            <td>
                                @can('view-post')
                                <a href="{{ route('posts.show', $post) }}" class="btn btn-sm btn-{{ App\Enums\ActionButtonEnum::SHOW->color() }}" title="{{ App\Enums\ActionButtonEnum::SHOW->label() }}">
                                    <!-- {{ App\Enums\ActionButtonEnum::SHOW->value }} -->
                                    <i class="{{ App\Enums\ActionButtonEnum::SHOW->icon() }}"></i>
                                </a>
                                @endcan
                                @can('edit-post')
                                <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-{{ App\Enums\ActionButtonEnum::EDIT->color() }}" title="{{ App\Enums\ActionButtonEnum::EDIT->label() }}">
                                    <!-- {{ App\Enums\ActionButtonEnum::EDIT->value }} -->
                                    <i class="{{ App\Enums\ActionButtonEnum::EDIT->icon() }}"></i>
                                </a>
                                @endcan
                                @can('delete-post')
                                <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display: inline;">
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
                            <td colspan="5" class="text-center">No posts found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </x-slot>
</x-app-layout>