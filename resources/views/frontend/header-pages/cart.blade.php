@extends('frontend.layouts.master')
@section('content')
    <main class="main">
        <div class="container">
            <ul class="checkout-progress-bar d-flex justify-content-center flex-wrap">
                <li class="active">
                    <a href="{{ route('cart.index') }}">Shopping Cart</a>
                </li>
                <li>
                    <a href="{{ route('checkout.index') }}">Checkout</a>
                </li>
                <li class="disabled">
                    <a href="{{ route('order.complete') }}">Order Complete</a>
                </li>
            </ul>


            <div class="row">
                <div class="col-lg-8">
                    <div class="cart-table-container">
                        <table class="table table-cart">
                            <thead>
                                <tr>
                                    <th class="thumbnail-col"></th>
                                    <th class="product-col" style="font-weight: bold; font-size: 15px;">Product</th>
                                    <th class="price-col" style="font-weight: bold; font-size: 15px;">Price</th>
                                    <th class="qty-col" style="font-weight: bold; font-size: 15px;">Number of Designs</th>
                                    <th class="text-right" style="font-weight: bold; font-size: 15px;">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(session('cart') && count(session('cart')) > 0)
                                    @foreach(session('cart') as $id => $details)
                                        <tr class="product-row">
                                            <td>
                                                <figure class="product-image-container">
                                                    <a href="{{ route('product.show', $details['slug']) }}" class="product-image">
                                                        @if($details['image'])
                                                            <img src="{{ asset('storage/' . $details['image']) }}" alt="product"
                                                                width="80" height="80">
                                                        @else
                                                            <img src="{{ asset('assets/images/products/product-1.jpg') }}" alt="product"
                                                                width="80" height="80">
                                                        @endif
                                                    </a>
                                                    <a href="{{ route('cart.remove', $id) }}" class="btn-remove icon-cancel" title="Remove Product"></a>
                                                </figure>
                                            </td>
                                            <td class="product-col">
                                                <h5 class="product-title">
                                                    <a href="{{ route('product.show', $details['slug']) }}" style="color: #e91d8e">{{ $details['name'] }}</a>
                                                </h5>
                                                @if(isset($details['options']['print_quantity']))
                                                    <div class="product-specs mt-1">
                                                        <span style="font-weight: 600; color: #555;">Print Quantity: {{ $details['options']['print_quantity'] }}</span>
                                                    </div>
                                                @endif
                                                @if(isset($details['options']['urgency']))
                                                    <div class="product-specs">
                                                        <span style="font-weight: 600; color: #555;">Urgency: {{ ucfirst($details['options']['urgency']) }}</span>
                                                        @if(isset($details['options']['production_days']))
                                                            <br><span style="font-size: 13px; color: #777;">Production: {{ $details['options']['production_days'] }} Days</span>
                                                        @endif
                                                        @if(isset($details['options']['delivery_days']))
                                                            <span style="font-size: 13px; color: #777;"> | Delivery: {{ $details['options']['delivery_days'] }} Day(s)</span>
                                                        @endif
                                                    </div>
                                                @endif
                                            </td>
                                            <td>{{ format_price($details['price']) }}</td>
                                            <td>
                                                <div class="product-single-qty">
                                                    <input class="horizontal-quantity form-control" type="text" value="{{ $details['quantity'] }}">
                                                </div>
                                                <small class="text-muted d-block text-center mt-1">Designs</small>
                                            </td>
                                            <td class="text-right"><span class="subtotal-price">{{ format_price($details['price'] * $details['quantity']) }}</span></td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr class="product-row">
                                        <td colspan="5" class="text-center p-5">
                                            <h4>Your cart is empty.</h4>
                                            <a href="{{ route('home') }}" class="btn btn-primary mt-2">Go Shopping</a>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>


                            <tfoot>
                                <tr>
                                    <td colspan="5" class="clearfix">
                                        <div class="float-left">
                                            <div class="cart-discount">
                                                <form action="#">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control form-control-sm"
                                                            placeholder="Coupon Code" required>
                                                        <div class="input-group-append">
                                                            <button class="btn btn-sm" type="submit">Apply
                                                                Coupon</button>
                                                        </div>
                                                    </div><!-- End .input-group -->
                                                </form>
                                            </div>
                                        </div><!-- End .float-left -->

                                        <div class="float-right">
                                            <button type="submit" class="btn btn-shop btn-update-cart">
                                                Update Cart
                                            </button>
                                        </div><!-- End .float-right -->
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div><!-- End .cart-table-container -->
                </div><!-- End .col-lg-8 -->
                <div class="col-lg-4">
                    <div class="cart-summary">
                        <h3>CART TOTALS</h3>

                        <table class="table table-totals">
                            <tbody>
                                @php 
                                    $subtotal = 0; 
                                    $total_discount = 0;
                                @endphp
                                @foreach((array) session('cart') as $id => $details)
                                    @php 
                                        $item_original_total = ($details['original_price'] ?? $details['price']) * $details['quantity'];
                                        $item_selling_total = $details['price'] * $details['quantity'];
                                        
                                        $subtotal += $item_original_total;
                                        $total_discount += ($item_original_total - $item_selling_total);
                                    @endphp
                                @endforeach

                                @php
                                    $after_discount = $subtotal - $total_discount;
                                    $tax = $after_discount * 0.15; // 15% VAT
                                    $grand_total = $after_discount + $tax;
                                @endphp

                                <tr>
                                    <td>Subtotal (Price)</td>
                                    <td id="cart-subtotal">{{ format_price($subtotal) }}</td>
                                </tr>

                                @if($total_discount > 0)
                                <tr class="text-danger">
                                    <td>Discount</td>
                                    <td id="cart-discount">-{{ format_price($total_discount) }}</td>
                                </tr>
                                @endif

                                <tr>
                                    <td>Tax (15% VAT)</td>
                                    <td id="cart-tax">{{ format_price($tax) }}</td>
                                </tr>
                            </tbody>

                            <tfoot>
                                <tr>
                                    <td>Order Total</td>
                                    <td><strong id="cart-grand-total">{{ format_price($grand_total) }}</strong></td>
                                </tr>
                            </tfoot>
                        </table>

                        <div class="checkout-methods">
                            <a href="{{ route('checkout.index') }}" class="btn btn-block btn-dark">
                                Proceed to Checkout
                                <i class="fa fa-arrow-right"></i>
                            </a>
                            <div class="payment-methods d-flex justify-content-center mt-3">
                                <div class="payment-icon-box border rounded mx-1 d-flex align-items-center justify-content-center" style="width: 24%; height: 42px;">
                                    <img src="{{ asset('assets/images/payments/payment-visa.png') }}" alt="Visa" style="max-width: 100%; max-height: 100%;">
                                </div>
                                <div class="payment-icon-box border rounded mx-1 d-flex align-items-center justify-content-center" style="width: 24%; height: 42px;">
                                    <img src="{{ asset('assets/images/payments/payment-mastercard.png') }}" alt="Mastercard" style="max-width: 100%; max-height: 100%;">
                                </div>
                                <div class="payment-icon-box border rounded mx-1 d-flex align-items-center justify-content-center" style="width: 24%; height: 42px;">
                                    <img src="{{ asset('assets/images/payments/payment-mada.png') }}" alt="Mada" style="max-width: 100%; max-height: 100%;">
                                </div>
                                <div class="payment-icon-box border rounded mx-1 d-flex align-items-center justify-content-center" style="width: 24%; height: 42px;">
                                    <img src="{{ asset('assets/images/payments/payment-applepay.png') }}" alt="Apple Pay" style="max-width: 100%; max-height: 100%;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- End .row -->
        </div><!-- End .container -->

        <div class="mb-6"></div><!-- margin -->
    </main><!-- End .main -->
@endsection
