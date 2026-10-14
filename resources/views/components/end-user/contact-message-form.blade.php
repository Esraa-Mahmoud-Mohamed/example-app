<form action="{{ route('enduser.contact-message.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label class="text-black" for="fname">First name</label>
                <input type="text" class="form-control" id="fname" name="firstname">
                @error('firstname')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label class="text-black" for="lname">Last name</label>
                <input type="text" class="form-control" id="lname" name="lastname">
                @error('lastname')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="text-black" for="email">Email address</label>
        <input type="email" class="form-control" id="email" name="email">
        @error('email')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-5">
        <label class="text-black" for="message">Message</label>
        <textarea name="message" class="form-control" id="message" cols="30" rows="5"></textarea>
        @error('message')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary-hover-outline">Send Message</button>
</form>