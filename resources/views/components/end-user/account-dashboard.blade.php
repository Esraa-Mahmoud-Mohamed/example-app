

{{-- <div class="card shadow-sm mb-4">

    <div class="card-body">

        <h4>Hello {{ $user->name }}</h4>

        <p>

            Welcome back.

        </p>

    </div>

</div> --}}

<div class="row">

    <div class="col-md-4">

        <div class="card">

            <div class="card-body">

                <h5>Total Orders</h5>

                <h3>{{ $orders->total() }}</h3>

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card">

            <div class="card-body">

                <h5>Email</h5>

                {{ $user->email }}

            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="card">

            <div class="card-body">

                <h5>Joined</h5>

                {{ $user->created_at->format('d M Y') }}

            </div>

        </div>

    </div>

</div>