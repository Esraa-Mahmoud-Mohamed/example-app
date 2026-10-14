<x-app-layout>
    <x-slot name="header">
        <h1 class="page-title"> Edit Service</h1>
    </x-slot>

    <x-slot name="content">
        <div class="card shadow mb-4">
            <div class="card-body">
                <!-- <div class="row"> -->
                <form action="{{ route('services.update', $service) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-3 ">
                                <label for="title">Title</label>
                                <input type="text" id="title" class="form-control" name="title" value="{{ $service->title }}">
                                @error('title')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div> <!-- /.col -->
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="details">Details</label>
                                <textarea id="details" name="details" class="form-control">{{ $service->details }}</textarea>
                                @error('details')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div> <!-- /.col -->
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                @if ($service->images->isNotEmpty())
                                <img src="{{  asset('storage/' . $service->images->first()->path) }}" alt="No Image Found" class="img-thumbnail mb-2" style="max-width: 200px;">
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="customFile">Upload or Replace Image</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile" name="image">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                                @error('image')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
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