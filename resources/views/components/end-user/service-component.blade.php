@props(
[
'page'
]
)
@if ($page == 'home')
<div class="why-choose-section">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-6">
                <h2 class="section-title">Why Choose Us</h2>
                <p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique.</p>

                <div class="row my-5">
                    @foreach ($services as $service )
                    <div class="col-6 col-md-6">
                        <x-end-user.service-display :service="$service" />
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="col-lg-5">
                <div class="img-wrap">
                    <img src="{{ asset('enduser') }}/images/why-choose-us-img.jpg" alt="Image" class="img-fluid">
                </div>
            </div>

        </div>
    </div>
</div>
@else
<div class="why-choose-section">
    <div class="container">
        <div class="row my-5">
            @foreach ($services as $service )
            <div class="col-6 col-md-6 col-lg-3 mb-4">
                <x-end-user.service-display :service="$service" />
            </div>
            @endforeach

        </div>

    </div>
</div>
@endif