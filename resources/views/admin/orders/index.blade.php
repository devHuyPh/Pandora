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
                <div class="card">
                    <div class="card-body">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Customer</th>
                                    <th>Status</th>
                                    <th>Total Price</th>
                                    <th>Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->user->name ?? 'Guest' }}</td>
                                        <form action="{{ route('admin.orders.update.status', $order->id) }}" method="POST">
                                            @csrf
                                            <select name="status" class="form-control" onchange="this.form.submit()">
                                                @foreach ($statuses as $status)
                                                    <option value="{{ $status->id }}"
                                                        {{ $order->order_status_id == $status->id ? 'selected' : '' }}>
                                                        {{ $status->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </form>
                                        <td>${{ number_format($order->total_price, 2) }}</td>
                                        <td>
                                            <a href="{{ route('admin.orders.show', $order->id) }}">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
