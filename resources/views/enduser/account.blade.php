<x-enduser-layout>
    <x-slot name="content">
        <x-end-user.hero-section pageName="Hello {{ $user->name }}" description="Manage your account settings" :haveButtons="false" :haveImage="false" />

        <div class="untree_co-section">

            <div class="container">

                <div class="row">

                    <div class="col-md-3">

                        <x-end-user.account-sidebar />

                    </div>

                    <div class="col-md-9">

                        @if (route('enduser.account.orders') == request()->url())
                            <x-end-user.account-orders :orders="$orders" />
                        @elseif (route('enduser.account.profile') == request()->url())
                            <x-end-user.account-profile :user="$user" />
                        @else
                            <x-end-user.account-dashboard :user="$user" :orders="$orders" />
                        @endif

                    </div>

                </div>

            </div>

        </div>
    </x-slot>
</x-enduser-layout>