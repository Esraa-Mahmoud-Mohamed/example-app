<div class="list-group shadow-sm">
    <x-end-user.account-sidebar-links route="enduser.account" label="Dashboard" active="enduser.account" />

    <x-end-user.account-sidebar-links route="enduser.account.orders" label="My Orders" active="enduser.account.orders" />

    <x-end-user.account-sidebar-links route="enduser.account.profile" label="Profile" active="enduser.account.profile" />

    <form action="{{ route('logout') }}" method="POST">

        @csrf

        <button class="list-group-item list-group-item-action text-danger w-100 text-start">

            Logout

        </button>

    </form>

</div>