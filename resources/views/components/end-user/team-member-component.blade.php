		<!-- Start Team Section -->
		<div class="untree_co-section" id="our-team">
		    <div class="container">

		        <div class="row mb-5">
		            <div class="col-lg-5 mx-auto text-center">
		                <h2 class="section-title">Our Team</h2>
		            </div>
		        </div>

		        <div class="row">

		            @foreach ($teamMembers as $teamMember )
		            <!-- Start Column 1 -->
		            <div class="col-12 col-md-6 col-lg-3 mb-5 mb-md-0">
		                <img src="{{ asset('storage/'.$teamMember->user->images->first()->path) }}" class="img-fluid mb-5">
		                <h3 clas><a href="#">{{ $teamMember->user->name }}</a></h3>
		                <span class="d-block position mb-4">{{ $teamMember->position }}</span>
		                <p>{{ str()->limit($teamMember->bio,80) }}</p>
		                <p class="mb-0"><a href="#" class="more dark">Learn More <span class="icon-arrow_forward"></span></a></p>
		            </div>
		            <!-- End Column 1 -->
		            @endforeach
		        </div>
		    </div>
		</div>
		<!-- End Team Section -->