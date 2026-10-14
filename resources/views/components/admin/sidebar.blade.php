<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
  <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
    <i class="fe fe-x"><span class="sr-only"></span></i>
  </a>
  <nav class="vertnav navbar navbar-light">
    <!-- nav bar -->
    <div class="w-100 mb-4 d-flex">
      <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
        <svg version="1.1" id="logo" class="navbar-brand-img brand-sm" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
          <g>
            <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
            <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
            <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
          </g>
        </svg>
      </a>
    </div>
    <ul class="navbar-nav flex-fill w-100 mb-2">
      <li class="nav-item w-100">
        <a class="nav-link" href="{{ route('dashboard') }}">
          <i class="fe fe-home fe-16"></i>
          <span class="ml-3 item-text">Dashboard</span></a>
      </li>
    </ul>
    <p class="text-muted nav-heading mt-4 mb-1">
      <span>Components</span>
    </p>
        <ul class="navbar-nav flex-fill w-100 mb-2">
      <li class="nav-item dropdown">
        <a href="#ui-elements" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
          <i class="fe fe-settings fe-16"></i>
          <span class="ml-3 item-text">{{ __('admin.Company Settings') }}</span>
        </a>
        <ul class="collapse list-unstyled pl-4 w-100" id="ui-elements">
          <li class="nav-item">
            <a class="nav-link pl-3" href="{{ route('company-settings.show') }}">
              <span class="ml-1 item-text">All Settings</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link pl-3" href="{{ route('company-settings.edit') }}">
              <span class="ml-1 item-text">Edit Settings</span>
            </a>
          </li>
        </ul>
      </li>
    </ul>
    <ul class="navbar-nav flex-fill w-100 mb-2">
      <li class="nav-item dropdown">
        <a href="#ui-elements-users" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
          <i class="fe fe-users fe-16"></i>
          <span class="ml-3 item-text">{{ __('admin.users') }}</span>
        </a>
        <ul class="collapse list-unstyled pl-4 w-100" id="ui-elements-users">
          <li class="nav-item">
            <a class="nav-link pl-3" href="{{ route('users.index') }}">
              <span class="ml-1 item-text">All Users</span>
              <span class="badge badge-pill badge-primary">{{ $usersCount }}</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link pl-3" href="{{ route('users.create') }}">
              <span class="ml-1 item-text">Create User</span>
            </a>
          </li>
        </ul>
      </li>
    </ul>
    <ul class="navbar-nav flex-fill w-100 mb-2">
      <li class="nav-item dropdown">
        <a href="#ui-elements-posts" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
          <i class="fe fe-file-text fe-16"></i>
          <span class="ml-3 item-text">Posts</span>
        </a>
        <ul class="collapse list-unstyled pl-4 w-100" id="ui-elements-posts">
          @can(['view-post'])
          <li class="nav-item">
            <a class="nav-link pl-3" href="{{ route('posts.index') }}">
              <span class="ml-1 item-text">All Posts</span>
              <span class="badge badge-pill badge-primary">{{ $postsCount }}</span>
            </a>
          </li>
          @endcan
          @canany(['create-post', 'edit-post', 'delete-post'])
          <li class="nav-item">
            <a class="nav-link pl-3" href="{{ route('posts.create') }}">
              <span class="ml-1 item-text">Create Post</span>
            </a>
          </li>
          @endcanany
        </ul>
      </li>
    </ul>
    <ul class="navbar-nav flex-fill w-100 mb-2">
      <li class="nav-item dropdown">
        <a href="#ui-elements-roles" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
          <i class="fe fe-user-check fe-16"></i>
          <span class="ml-3 item-text">Roles</span>
        </a>
        <ul class="collapse list-unstyled pl-4 w-100" id="ui-elements-roles">
          <li class="nav-item">
            <a class="nav-link pl-3" href="{{ route('roles.index') }}">
              <span class="ml-1 item-text">All Roles</span>
              <span class="badge badge-pill badge-primary">{{ $rolesCount }}</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link pl-3" href="{{ route('roles.create') }}">
              <span class="ml-1 item-text">Create Role</span>
            </a>
          </li>
        </ul>
      </li>
    </ul>
    <ul class="navbar-nav flex-fill w-100 mb-2">
      <li class="nav-item dropdown">
        <a href="#ui-elements-testimonials" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
          <i class="fe fe-message-square fe-16"></i>
          <span class="ml-3 item-text">Testimonials</span>
        </a>
        <ul class="collapse list-unstyled pl-4 w-100" id="ui-elements-testimonials">
          <li class="nav-item">
            <a class="nav-link pl-3" href="{{ route('testimonials.index') }}">
              <span class="ml-1 item-text">All Testimonials</span>
              <span class="badge badge-pill badge-primary">{{ $testimonialsCount }}</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link pl-3" href="{{ route('testimonials.create') }}">
              <span class="ml-1 item-text">Create Testimonial</span>
            </a>
          </li>
        </ul>
      </li>
    </ul>
    <ul class="navbar-nav flex-fill w-100 mb-2">
      <li class="nav-item dropdown">
        <a href="#ui-elements-services" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
          <i class="fe fe-tool fe-16"></i>
          <span class="ml-3 item-text">Services</span>
        </a>
        <ul class="collapse list-unstyled pl-4 w-100" id="ui-elements-services">
          <li class="nav-item">
            <a class="nav-link pl-3" href="{{ route('services.index') }}">
              <span class="ml-1 item-text">All Services</span>
              <span class="badge badge-pill badge-primary">{{ $servicesCount }}</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link pl-3" href="{{ route('services.create') }}">
              <span class="ml-1 item-text">Create Service</span>
            </a>
          </li>
        </ul>
      </li>
    </ul>
    <ul class="navbar-nav flex-fill w-100 mb-2">
      <li class="nav-item dropdown">
        <a href="#ui-elements-products" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
          <i class="fe fe-package fe-16"></i>
          <span class="ml-3 item-text">Products</span>
        </a>
        <ul class="collapse list-unstyled pl-4 w-100" id="ui-elements-products">
          <li class="nav-item">
            <a class="nav-link pl-3" href="{{ route('products.index') }}">
              <span class="ml-1 item-text">All Products</span>
              <span class="badge badge-pill badge-primary">{{ $productsCount }}</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link pl-3" href="{{ route('products.create') }}">
              <span class="ml-1 item-text">Create Product</span>
            </a>
          </li>
        </ul>
      </li>
    </ul>
    <ul class="navbar-nav flex-fill w-100 mb-2">
      <li class="nav-item dropdown">
        <a href="#ui-elements-team-members" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
          <i class="fe fe-award fe-16"></i>
          <span class="ml-3 item-text">Team Members</span>
        </a>
        <ul class="collapse list-unstyled pl-4 w-100" id="ui-elements-team-members">
          <li class="nav-item">
            <a class="nav-link pl-3" href="{{ route('team-members.index') }}">
              <span class="ml-1 item-text">All Team Members</span>
              <span class="badge badge-pill badge-primary">{{ $teamMembersCount }}</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link pl-3" href="{{ route('team-members.create') }}">
              <span class="ml-1 item-text">Create Team Member</span>
            </a>
          </li>
        </ul>
      </li>
    </ul>

  </nav>
</aside>