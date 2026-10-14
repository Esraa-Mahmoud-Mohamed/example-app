<x-app-layout>
    <x-slot name="header">
        <h1 class="page-title"> Edit Post</h1>
    </x-slot>

    <x-slot name="content">
        <div class="card shadow mb-4">
            <div class="card-body">
                <!-- <div class="row"> -->
                    <form action="{{ route('posts.update', $post) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-3 ">
                                    <label for="title">Title</label>
                                    <input type="text" id="title" class="form-control" name="title" value="{{ $post->title }}">
                                    @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> <!-- /.col -->
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="content">Content</label>
                                    <textarea id="content" name="content" class="form-control">{{ $post->content }}</textarea>
                                    @error('content')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> <!-- /.col -->
                            <div class="col-md-6 mb-4">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <p class="mb-2"><strong>Categories</strong></p>
                                        @forelse($categories as $category)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="{{ $category->id }}" id="check-{{ $category->name }}" name="categories[]"
                                                {{ $post->categories->contains($category->id) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="check-{{ $category->name }}">
                                                    {{ $category->name }}
                                                </label>
                                            </div>
                                        @empty
                                            <p>Add at least one category to create a post.</p>
                                        @endforelse
                                        @error('categories')
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