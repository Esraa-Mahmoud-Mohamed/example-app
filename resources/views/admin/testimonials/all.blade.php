<x-app-layout>
    <x-slot name="header">
        <h1 class="page-title"> All Testimonials</h1>
    </x-slot>

    <x-slot name="extra">
        @can('create-testimonial')
            <a href="{{ route('testimonials.create') }}" class="btn btn-dark"> Create Testimonial</a>
        @endcan
    </x-slot>

    <x-slot name="content">
        <div class="card shadow">
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Message</th>
                            <th>Added by</th>
                            <th>Created at</th>
                            <th>Controls</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($testimonials as $index => $testimonial)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ str()->limit($testimonial->message,40) }}</td>
                            <td>{{ $testimonial->user->name }}</td>
                            <td>{{ $testimonial->created_at }}</td>
                            <td>
                                @can('view-testimonial')
                                <a href="{{ route('testimonials.show', $testimonial) }}" class="btn btn-sm btn-{{ App\Enums\ActionButtonEnum::SHOW->color() }}" title="{{ App\Enums\ActionButtonEnum::SHOW->label() }}">
                                    <!-- {{ App\Enums\ActionButtonEnum::SHOW->value }} -->
                                    <i class="{{ App\Enums\ActionButtonEnum::SHOW->icon() }}"></i>
                                </a>
                                @endcan
                                @can('edit-testimonial')
                                <a href="{{ route('testimonials.edit', $testimonial) }}" class="btn btn-sm btn-{{ App\Enums\ActionButtonEnum::EDIT->color() }}" title="{{ App\Enums\ActionButtonEnum::EDIT->label() }}">
                                    <!-- {{ App\Enums\ActionButtonEnum::EDIT->value }} -->
                                    <i class="{{ App\Enums\ActionButtonEnum::EDIT->icon() }}"></i>
                                </a>
                                @endcan
                                @can('delete-testimonial')
                                <form action="{{ route('testimonials.destroy', $testimonial) }}" method="POST" style="display: inline;">
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
                            <td colspan="5" class="text-center">No testimonials found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </x-slot>
</x-app-layout>