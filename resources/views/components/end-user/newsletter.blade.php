		        <div class="row">
		            <div class="col-lg-8">
		                <div class="subscription-form">
		                    <h3 class="d-flex align-items-center"><span class="me-1"><img src="{{ asset('enduser') }}/images/envelope-outline.svg" alt="Image" class="img-fluid"></span><span>Subscribe to Newsletter</span></h3>

		                    <form action="{{ route('enduser.newsletter.store') }}" class="row g-3" method="POST">
		                        @csrf
		                        <div class="col-auto">
		                            <!-- <input type="text" class="form-control" placeholder="Enter your name"> -->
		                            <input
		                                type="text"
		                                name="name"
		                                class="form-control"
		                                value="{{ old('name') }}"
		                                placeholder="Enter Your name">
		                            @error('name')
		                            <div class="text-danger">{{ $message }}</div>
		                            @enderror
		                        </div>
		                        <div class="col-auto">
		                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Enter your email">
		                            @error('email')
		                            <div class="text-danger">{{ $message }}</div>
		                            @enderror
		                        </div>
		                        <div class="col-auto">
		                            <button class="btn btn-primary" type="submit">
		                                <span class="fa fa-paper-plane"></span>
		                            </button>
		                        </div>
		                    </form>

		                </div>
		            </div>
		        </div>