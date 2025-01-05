@extends('Template.admin')

@section('order')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    $(document).ready(function() {
        // Fade in rows one by one
        $('tbody tr').each(function(index) {
            $(this).delay(200 * index).fadeIn(500);
        });

        // Fade in pagination
        $('.pagination').hide().fadeIn(1000);

        // Enable Bootstrap tooltips
        $('[data-bs-toggle="tooltip"]').tooltip();  // Activates the tooltips
    });
    </script>

    <!-- Summary Section -->
    <div class="mt-5 row mb-4">
        <div class="col-md-4">
            <h4>Total Orders: {{ $orders->count() }}</h4> <!-- Total number of orders -->
        </div>
        <div class="col-md-4">
            <h4>Total Items: 
                @php
                    $totalItems = $orders->sum('quantity'); // Sum up all quantities from orders
                @endphp
                {{ $totalItems }}
            </h4>
        </div>
        <div class="col-md-4">
            <h4>Total Order Value: 
                @php
                    $totalValue = $orders->sum(function($orderitem) {
                        return $orderitem->total; // Sum up the total value of all orders
                    });
                @endphp
                ${{ number_format($totalValue, 2) }}
            </h4>
        </div>
    </div>

    <!-- Orders Table -->
    <table class="mt-5 container table table-bordered" style="text-align: center;">
        <thead>
            <tr>
                <th>Product Image</th>
                <th>Country</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>State</th>
                <th>Pincode</th>
                <th>Quantity</th>
                <th>Total Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $orderitem)
                @php
                    // Fetch the product image and name for the current product_id
                    $productImage = $productImages->where('id', $orderitem->product_id)->first();
                    $productName = $productImage ? $productImage->name : 'Unknown Product';  // Default name if not found
                    $order = $orderData->where('id', $orderitem->orderid)->first();
                @endphp
                <tr>
                    <!-- Product Image with Tooltip -->
                    <td>
                        @if($productImage && $productImage->images->pimg)
                            <img src="{{ asset('uploads/' . $productImage->images->pimg) }}" width="100" height="100" alt="Product Image" style="object-fit: cover;" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $productName }}">
                        @else
                            No Image
                        @endif
                    </td>

                    <!-- Order Details -->
                    @if($order)
                        <td>{{ $order->country }}</td>
                        <td>{{ $order->first_name }}</td>
                        <td>{{ $order->last_name }}</td>
                        <td>{{ $order->email }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ $order->address }}</td>
                        <td>{{ $order->state }}</td>
                        <td>{{ $order->pincode }}</td>
                        <td>{{ $orderitem->quantity }}</td>
                        <td>{{ $orderitem->total }}</td>
                    @else
                        <td colspan="8">Order details not available</td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination Links -->
    <div class="d-flex justify-content-center">
        {{ $orders->links() }}
    </div>

@endsection
