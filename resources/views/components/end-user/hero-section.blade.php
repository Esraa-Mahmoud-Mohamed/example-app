@props([
    'pageName',
    'description',
    'haveButtons' => true,
	'haveImage' => true,
])
<!-- Start Hero Section -->
			<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>{{ $pageName }}</h1>
								<p class="mb-4">{{ $description }}</p>
                                @if ($haveButtons)
									<p><a href="{{ route('enduser.shop') }}" class="btn btn-secondary me-2">Shop Now</a><a href="#" class="btn btn-white-outline">Explore</a></p>
								@endif
							</div>
						</div>
						@if($haveImage)
						<div class="col-lg-7">
							<div class="hero-img-wrap">
								<img src="{{ asset('enduser') }}/images/couch.png" class="img-fluid">
							</div>
						</div>
						@endif
					</div>
				</div>
			</div>
		<!-- End Hero Section -->