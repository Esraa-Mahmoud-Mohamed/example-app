<x-app-layout>
    <x-slot name="header">
        <h1 class="page-title"> Edit Testimonial</h1>
    </x-slot>

    <x-slot name="content">
        <div class="card shadow mb-4">
            <div class="card-body">
                <!-- <div class="row"> -->
                    <form action="{{ route('testimonials.update', $testimonial) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-3 ">
                                    <label for="message">Message</label>
                                    <textarea id="message" name="message" class="form-control">{{ $testimonial->message }}</textarea>
                                    @error('message')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> <!-- /.col -->
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