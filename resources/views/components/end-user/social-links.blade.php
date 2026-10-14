		            <div class="col-lg-4">
		                <div class="mb-4 footer-logo-wrap"><a href="{{ route('enduser.home') }}" class="footer-logo">{{ $companySetting->name }}</a></div>
		                <p class="mb-4">{{ Str::limit($companySetting->footer_description, 100) }}</p>

		                <ul class="list-unstyled custom-social">
		                    <li><a href="{{ $companySetting->facebook }}" target="_blank"><span class="fa fa-brands fa-facebook-f"></span></a></li>
		                    <li><a href="{{ $companySetting->twitter }}" target="_blank"><span class="fa fa-brands fa-twitter"></span></a></li>
		                    <li><a href="{{ $companySetting->instagram }}" target="_blank"><span class="fa fa-brands fa-instagram"></span></a></li>
		                    <li><a href="{{ $companySetting->linkedin }}" target="_blank"><span class="fa fa-brands fa-linkedin"></span></a></li>
		                </ul>
		            </div>