<x-app-layout>
    <x-slot name="header">
        <h1 class="page-title"> All Products</h1>
    </x-slot>

    <x-slot name="extra">
        @can('create-product')
        <a href="{{ route('products.create') }}" class="btn btn-dark"> Create product</a>
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
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Created at</th>
                            <th>Controls</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $index => $product)
                        <tr class="{{ $product->is_featured ? 'table-success' : '' }}">
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $product->name }}
                                @if($product->is_featured)
                                <span class="badge bg-success ms-2">
                                    Featured
                                </span>
                                @endif
                            </td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>{{ $product->created_at }}</td>
                            <td>
                                @can('view-product')
                                <a href="{{ route('products.show', $product) }}" class="btn btn-sm btn-{{ App\Enums\ActionButtonEnum::SHOW->color() }}" title="{{ App\Enums\ActionButtonEnum::SHOW->label() }}">
                                    <!-- {{ App\Enums\ActionButtonEnum::SHOW->value }} -->
                                    <i class="{{ App\Enums\ActionButtonEnum::SHOW->icon() }}"></i>
                                </a>
                                @endcan
                                @can('edit-product')
                                <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-{{ App\Enums\ActionButtonEnum::EDIT->color() }}" title="{{ App\Enums\ActionButtonEnum::EDIT->label() }}">
                                    <!-- {{ App\Enums\ActionButtonEnum::EDIT->value }} -->
                                    <i class="{{ App\Enums\ActionButtonEnum::EDIT->icon() }}"></i>
                                </a>
                                @endcan
                                @can('delete-product')
                                <form action="{{ route('products.destroy', $product) }}" method="post" style="display: inline;">
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
                            <td colspan="5" class="text-center">No products found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </x-slot>
</x-app-layout>