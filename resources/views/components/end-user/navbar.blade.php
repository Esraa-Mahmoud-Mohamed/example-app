<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

    <div class="container">
        <a class="navbar-brand" href="{{ route('enduser.home') }}">Furni<span>.</span></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsFurni">
            <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                <x-end-user.navbar-links route="enduser.home" label="Home" active="enduser.home" />
                <x-end-user.navbar-links route="enduser.shop" label="Shop" active="enduser.shop" />
                <x-end-user.navbar-links route="enduser.about-us" label="About us" active="enduser.about-us" />
                <x-end-user.navbar-links route="enduser.service" label="Services" active="enduser.service" />
                <x-end-user.navbar-links route="enduser.blogs" label="Blog" active="enduser.blogs" />
                <x-end-user.navbar-links route="enduser.contact-us" label="Contact us" active="enduser.contact-us" />

            </ul>

            <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                <li><a class="nav-link" href="{{ route('enduser.account') }}"><img src="{{ asset('enduser') }}/images/user.svg"></a></li>
                <li class="nav-item position-relative">
                    <a class="nav-link" href="{{ route('enduser.cart') }}">
                        <img src="{{ asset('enduser/images/cart.svg') }}" alt="Cart">
                    </a>

                    @if($productsCount > 0)
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        {{ $productsCount }}
                    </span>
                    @endif
                </li>
            </ul>
        </div>
    </div>

</nav>