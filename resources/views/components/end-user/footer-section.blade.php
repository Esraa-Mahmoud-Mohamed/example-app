		<footer class="footer-section">
		    <div class="container relative">

		        <div class="sofa-img">
		            <img src="{{ asset('enduser') }}/images/sofa.png" alt="Image" class="img-fluid">
		        </div>

				<x-end-user.newsletter />

		        <div class="row g-5 mb-5">
                    <x-end-user.social-links />

                    <x-end-user.footer-links />
		        </div>

		        <div class="border-top copyright">
		            <div class="row pt-4">
		                <div class="col-lg-6">
		                    <p class="mb-2 text-center text-lg-start">Copyright &copy;<script>
		                            document.write(new Date().getFullYear());
		                        </script>. {{ $companySetting->copyright }}.
		                    </p>
		                </div>

		                <div class="col-lg-6 text-center text-lg-end">
		                    <ul class="list-unstyled d-inline-flex ms-auto">
		                        <li class="me-4"><a href="#">Terms &amp; Conditions</a></li>
		                        <li><a href="#">Privacy Policy</a></li>
		                    </ul>
		                </div>

		            </div>
		        </div>

		    </div>
		</footer>