@extends('client.layouts.master')

@section('slide')
<section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="breadcrumb_iner">
                    <div class="breadcrumb_iner_item">
                        <h2>Producta Checkout</h2>
                        <p>Home <span>-</span> Shop Single</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('content')
    <div class="container">
        <br>
        <br>
        <div class="billing_details">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Billing Details</h3>
                    <form class="row contact_form" action="#" method="post" novalidate="novalidate">
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="first" name="name" />
                            <span class="placeholder" data-placeholder="First name"></span>
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="last" name="name" />
                            <span class="placeholder" data-placeholder="Last name"></span>
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="company" name="company"
                                placeholder="Company name" />
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="number" name="number" />
                            <span class="placeholder" data-placeholder="Phone number"></span>
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="email" name="compemailany" />
                            <span class="placeholder" data-placeholder="Email Address"></span>
                        </div>
                        
                        <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control" id="add1" name="add1" />
                            <span class="placeholder" data-placeholder="Address line 01"></span>
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control" id="add2" name="add2" />
                            <span class="placeholder" data-placeholder="Address line 02"></span>
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control" id="city" name="city" />
                            <span class="placeholder" data-placeholder="Town/City"></span>
                        </div>
                       
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="zip" name="zip"
                                placeholder="Postcode/ZIP" />
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="creat_account">
                                <input type="checkbox" id="f-option2" name="selector" />
                                <label for="f-option2">Create an account?</label>
                            </div>
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="creat_account">
                                <h3>Shipping Details</h3>
                                <input type="checkbox" id="f-option3" name="selector" />
                                <label for="f-option3">Ship to a different address?</label>
                            </div>
                            <textarea class="form-control" name="message" id="message" rows="1" placeholder="Order Notes"></textarea>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="order_box">
                        <h2>Your Order</h2>
                        <ul class="list">
                            <li>
                                <a href="#">Product
                                    <span>Total</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">Fresh Blackberry
                                    <span class="middle">x 02</span>
                                    <span class="last">$720.00</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">Fresh Tomatoes
                                    <span class="middle">x 02</span>
                                    <span class="last">$720.00</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">Fresh Brocoli
                                    <span class="middle">x 02</span>
                                    <span class="last">$720.00</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="list list_2">
                            <li>
                                <a href="#">Subtotal
                                    <span>$2160.00</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">Shipping
                                    <span>Flat rate: $50.00</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">Total
                                    <span>$2210.00</span>
                                </a>
                            </li>
                        </ul>
                        <div class="payment_item">
                            <div class="radion_btn">
                                <input type="radio" id="f-option5" name="selector" />
                                <label for="f-option5">Check payments</label>
                                <div class="check"></div>
                            </div>
                            <p>
                                Please send a check to Store Name, Store Street, Store Town,
                                Store State / County, Store Postcode.
                            </p>
                        </div>
                        <div class="payment_item active">
                            <div class="radion_btn">
                                <input type="radio" id="f-option6" name="selector" />
                                <label for="f-option6">Paypal </label>
                                <img src="img/product/single-product/card.jpg" alt="" />
                                <div class="check"></div>
                            </div>
                            <p>
                                Please send a check to Store Name, Store Street, Store Town,
                                Store State / County, Store Postcode.
                            </p>
                        </div>
                        <div class="creat_account">
                            <input type="checkbox" id="f-option4" name="selector" />
                            <label for="f-option4">I’ve read and accept the </label>
                            <a href="#">terms & conditions*</a>
                        </div>
                        <a class="btn_3" href="#">Proceed to Paypal</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
