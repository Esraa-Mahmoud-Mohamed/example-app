<nav class="topnav navbar navbar-light">
  <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
    <i class="fe fe-menu navbar-toggler-icon"></i>
  </button>
  <form class="form-inline mr-auto searchform text-muted">
    <input class="form-control mr-sm-2 bg-transparent border-0 pl-4 text-muted" type="search" placeholder="Type something..." aria-label="Search">
  </form>
  <ul class="nav">
    <li class="nav-item">
      @if(LaravelLocalization::getCurrentLocale() === 'en')
      <a class="nav-link text-muted my-2" href="{{ LaravelLocalization::getLocalizedURL('ar') }}" >
        العربية
      </a>
      @else
      <a class="nav-link text-muted my-2" href="{{ LaravelLocalization::getLocalizedURL('en') }}" >
        English
      </a>
      @endif
    </li>
        <li class="nav-item">
      <a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="light">
        <i class="fe fe-sun fe-16"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-shortcut">
        <span class="fe fe-grid fe-16"></span>
      </a>
    </li>
    <li class="nav-item nav-notif">
      <a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-notif">
        <span class="fe fe-bell fe-16"></span>
        <span class="dot dot-md bg-success"></span>
      </a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="avatar avatar-sm mt-2">
          @forelse (Auth::user()->images as $image)
          <img src="{{ asset('storage/' . $image->path) }}" alt="..." class="avatar-img rounded-circle">
          @empty
          <p class="text-muted">No images uploaded.</p>
          @endforelse
        </span>
      </a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
        <x-responsive-nav-link :href="route('profile.edit')" class="dropdown-item">
          {{ __('Profile') }}
        </x-responsive-nav-link>
        <a class="dropdown-item" href="#">Settings</a>
        <a class="dropdown-item" href="#">Activities</a>
        <!-- Authentication -->
        <form method="POST" action="{{ route('logout') }}">
          @csrf

          <x-dropdown-link :href="route('logout')" class="dropdown-item"
            onclick="event.preventDefault();
                                                this.closest('form').submit();">
            {{ __('Log Out') }}
          </x-dropdown-link>
        </form>
      </div>
    </li>
  </ul>
</nav>