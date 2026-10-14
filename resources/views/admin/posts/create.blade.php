<x-app-layout>
    <x-slot name="header">
        <h1 class="page-title"> Create Post</h1>
    </x-slot>

    <x-slot name="content">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row">
                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-3 ">
                                    <label for="customFile">Upload Image</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="images[]" multiple>
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>

                                    @error('images')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                    @error('images.*')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3 ">
                                    <label for="title">Title</label>
                                    <input type="text" id="title" class="form-control" name="title" value="{{ old('title') }}">
                                    @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                                                <div class="form-group mb-3 ">
                                    <label for="title">Title_ar</label>
                                    <input type="text" id="title" class="form-control" name="title_ar" value="{{ old('title_ar') }}">
                                    @error('title_ar')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="content">Content</label>
                                    <textarea id="content" name="content" class="form-control">{{ old('content') }}</textarea>
                                    @error('content')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                                                <div class="form-group mb-3">
                                    <label for="content">Content_ar</label>
                                    <textarea id="content" name="content_ar" class="form-control">{{ old('content_ar') }}</textarea>
                                    @error('content_ar')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 mb-4">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <p class="mb-2"><strong>Categories</strong></p>
                                        <div class="row">
                                            @forelse($categories as $category)
                                            <div class="form-check col-md-3">
                                                <input class="form-check-input" type="checkbox" value="{{ $category->id }}" id="check-{{ $category->name }}" name="categories[]">
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
                            </div>
                        </div> 
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- / .card -->
    </x-slot>
</x-app-layout>