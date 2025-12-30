@extends('frontend.layouts.master')
@section('content')
    <main class="main">
        <div class="container">
            <ul class="checkout-progress-bar d-flex justify-content-center flex-wrap">
                <li>
                    <a href="{{ route('cart.index') }}">Shopping Cart</a>
                </li>
                <li>
                    <a href="{{ route('checkout.index') }}">Checkout</a>
                </li>
                <li class="active">
                    <a href="{{ route('order.complete') }}">Order Complete</a>
                </li>
            </ul>

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="order-complete-content text-center py-5">
                        <i class="fas fa-check-circle text-success" style="font-size: 80px;"></i>
                        <h2 class="mt-4">Thank You for Your Order!</h2>
                        <p class="lead">Your order has been placed successfully. You will receive an email confirmation shortly.</p>
                        
                        <div class="order-details-box mt-5 p-4 border rounded bg-light">
                            <div class="row text-left">
                                <div class="col-md-3">
                                    <div class="info-box">
                                        <p class="text-muted mb-1">Order Number</p>
                                        <h5 class="mb-0">#AD-{{ rand(10000, 99999) }}</h5>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="info-box">
                                        <p class="text-muted mb-1">Date</p>
                                        <h5 class="mb-0">{{ date('M d, Y') }}</h5>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="info-box">
                                        <p class="text-muted mb-1">Total</p>
                                        <h5 class="mb-0">{{ format_price(53.70) }}</h5>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="info-box">
                                        <p class="text-muted mb-1">Payment Method</p>
                                        <h5 class="mb-0">Cash on delivery</h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-5">
                            <a href="{{ route('home') }}" class="btn btn-dark btn-lg">Back to Home</a>
                            <a href="{{ route('dashboard') }}" class="btn btn-outline-dark btn-lg ml-3">My Account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-6"></div>
    </main>
@endsection
