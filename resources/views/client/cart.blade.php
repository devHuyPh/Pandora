@extends('client.layouts.master')
@section('content')
    <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <h2>Cart Products</h2>
                            <p>Home <span>-</span> Cart Products</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb end-->

    <!--================Cart Area =================-->
    <section class="cart_area padding_top">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($cart && count($cart) > 0)
                                @foreach ($cart as $id => $item)
                                    <tr>
                                        <td>
                                            <div class="media">
                                                <div class="d-flex">
                                                    <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" style="width: 80px; height: 80px;" />
                                                </div>
                                                <div class="media-body">
                                                    <p>{{ $item['name'] }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h5>${{ number_format($item['price'], 2) }}</h5>
                                        </td>
                                        <td>
                                            <div class="product_count">
                                                <input class="input-number" type="text" value="{{ $item['quantity'] }}" min="1" max="10" readonly>
                                            </div>
                                        </td>
                                        <td>
                                            <h5>${{ number_format($item['price'] * $item['quantity'], 2) }}</h5>
                                        </td>
                                        <td>
                                            <form action="{{ route('cart.remove', $id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" type="submit">Remove</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td><h5>Subtotal</h5></td>
                                    <td><h5>${{ number_format(array_reduce($cart, function ($carry, $item) {
                                        return $carry + $item['price'] * $item['quantity'];
                                    }, 0), 2) }}</h5></td>
                                    <td></td>
                                </tr>
                            @else
                                <tr>
                                    <td colspan="5" class="text-center">
                                        <h4>Your cart is empty</h4>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    <div class="checkout_btn_inner float-right">
                        <a class="btn_1" href="{{ route('products.index') }}">Continue Shopping</a>
                        @if($cart && count($cart) > 0)
                            <a class="btn_1 checkout_btn_1" href="#">Proceed to checkout</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->
@endsection
