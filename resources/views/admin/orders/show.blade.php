@extends('admin.layouts.master')

@section('content')
    <div class="pagetitle">
        <h1>List categoriess</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">categories</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <h3>Order Details</h3>
                <p><strong>Customer:</strong> {{ $order->user->name ?? 'Guest' }}</p>
                <p><strong>Status:</strong> {{ ucfirst($order->status->name ?? 'Unknown') }}</p>
                <p><strong>Coupon:</strong> {{ $order->coupon->code ?? 'None' }}</p>

                <h4>Items:</h4>
                <table>
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->items as $item)
                            <tr>
                                <td>{{ $item->product_name }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>${{ number_format($item->price, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </section>
@endsection
