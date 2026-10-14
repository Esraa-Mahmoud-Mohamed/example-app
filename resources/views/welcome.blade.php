<x-end-user-layout>
    <x-slot name="content">
        <!-- Start Hero Section -->
        <x-end-user.hero-section pageName="Interior Design" description="Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique." />
        <!-- End Hero Section -->

        <!-- Start Product Section -->
        <x-end-user.product-section />
        <!-- End Product Section -->

        <!-- Start Why Choose Us Section -->
        <x-end-user.service-component page="home" />
        <!-- End Why Choose Us Section -->

        <!-- Start We Help Section -->
        <div class="we-help-section">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-7 mb-5 mb-lg-0">
                        <div class="imgs-grid">
                            <div class="grid grid-1"><img src="{{ asset('enduser') }}/images/img-grid-1.jpg" alt="Untree.co"></div>
                            <div class="grid grid-2"><img src="{{ asset('enduser') }}/images/img-grid-2.jpg" alt="Untree.co"></div>
                            <div class="grid grid-3"><img src="{{ asset('enduser') }}/images/img-grid-3.jpg" alt="Untree.co"></div>
                        </div>
                    </div>
                    <div class="col-lg-5 ps-lg-5">
                        <h2 class="section-title mb-4">We Help You Make Modern Interior Design</h2>
                        <p>Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. Pellentesque habitant morbi tristique senectus et netus et malesuada</p>

                        <ul class="list-unstyled custom-list my-4">
                            <li>Donec vitae odio quis nisl dapibus malesuada</li>
                            <li>Donec vitae odio quis nisl dapibus malesuada</li>
                            <li>Donec vitae odio quis nisl dapibus malesuada</li>
                            <li>Donec vitae odio quis nisl dapibus malesuada</li>
                        </ul>
                        <p><a herf="#" class="btn">Explore</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- End We Help Section -->

        <!-- Start Popular Product -->
        <div class="popular-product">
            <div class="container">
                <div class="row">
                    <x-end-user.product-component :limit="3" />
                </div>
            </div>
        </div>
        <!-- End Popular Product -->

        <!-- Start Testimonial Slider -->
        <x-end-user.testimonial-component />
        <!-- End Testimonial Slider -->

        <!-- Start Blog Section -->
        <x-end-user.blog-component :limit="3" />
        <!-- End Blog Section -->
    </x-slot>
</x-end-user-layout>