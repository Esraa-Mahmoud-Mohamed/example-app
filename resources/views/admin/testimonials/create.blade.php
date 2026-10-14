<x-app-layout>
    <x-slot name="header">
        <h1 class="page-title"> Create Testimonial</h1>
    </x-slot>

    <x-slot name="content">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row">
                    <form action="{{ route('testimonials.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label for="message">Message</label>
                                    <textarea id="message" name="message" class="form-control">{{ old('message') }}</textarea>
                                    @error('message')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                        </div> <!-- /.col -->
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- / .card -->
    </x-slot>
</x-app-layout>