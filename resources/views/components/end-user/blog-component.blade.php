		<!-- Start Blog Section -->
		<div class="blog-section">
			<div class="container">

				<div class="row">
					@foreach($blogs as $blog)

					<div class="col-12 col-sm-6 col-md-4 mb-5">
						<div class="post-entry">
							<a href="#" class="post-thumbnail">
								@if($blog->images->isNotEmpty())
								<img src="{{ asset('storage/' . $blog->images->first()->path) }}"
									alt="Image"
									class="img-fluid">
								@else
								<img src="{{ asset('enduser/images/post-3.jpg') }}"
									alt="Default Image"
									class="img-fluid">
								@endif
							</a>
							<div class="post-content-entry">
								<h3><a href="#">{{ $blog->title }}</a></h3>
								<p>{{ Str::limit($blog->content, 100) }}</p>
								<div class="meta">
									<span>by <a href="#">{{ $blog->user->name }}</a></span> <span>on <a href="#">{{ $blog->created_at->format('M j, Y') }}</a></span>
								</div>
							</div>
						</div>
					</div>
					@endforeach

				</div>
			</div>
		</div>
		<!-- End Blog Section -->