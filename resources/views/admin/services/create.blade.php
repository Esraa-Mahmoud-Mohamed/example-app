<x-app-layout>
    <x-slot name="header">
        <h1 class="page-title"> Create Service</h1>
    </x-slot>

    <x-slot name="content">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row">
                    <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-3 ">
                                    <label for="customFile">Upload Image</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="image">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                    @error('image')
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
                            </div>

                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="details">Details</label>
                                    <textarea id="details" name="details" class="form-control">{{ old('details') }}</textarea>
                                    @error('details')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
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