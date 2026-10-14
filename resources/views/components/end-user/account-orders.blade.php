<div class="card">

    <div class="card-header">

        Recent Orders

    </div>

    <div class="card-body">

        <table class="table">

            <thead>

                <tr>

                    <th>#</th>

                    <th>Status</th>

                    <th>Total</th>

                    <th>Date</th>

                </tr>

            </thead>

            <tbody>

                @forelse($orders as $order)

                    <tr>

                        <td>

                            {{ $order->number }}

                        </td>

                        <td>

                            {{ ucfirst($order->status) }}

                        </td>

                        <td>

                            ${{ number_format($order->total,2) }}

                        </td>

                        <td>

                            {{ $order->created_at->format('d M Y') }}

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="4">

                            No orders yet.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>