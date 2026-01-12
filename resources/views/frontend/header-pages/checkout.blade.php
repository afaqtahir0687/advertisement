@extends('frontend.layouts.master')
@section('title', 'Checkout - Complete Your Printing Order')
@section('meta_description', 'Securely checkout and finalize your order for business cards, flyers, and other professional printing products at Crelogics.')
@section('meta_keywords', 'checkout, place order, printing services checkout, secure payment Crelogics')
@section('content')
    <main class="main">
        <div class="container">
            <ul class="checkout-progress-bar d-flex justify-content-center flex-wrap">
                <li>
                    <a href="{{ route('cart.index') }}">Shopping Cart</a>
                </li>
                <li class="active">
                    <a href="{{ route('checkout.index') }}">Checkout</a>
                </li>
                <li class="disabled">
                    <a href="#">Order Complete</a>
                </li>
            </ul>

            <div class="row">
                <div class="col-lg-7">
                    <ul class="checkout-steps">
                        <li>
                            <h2 class="step-title">Billing Details</h2>

                            <form action="#" id="checkout-form">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>First Name <span class="required">*</span></label>
                                            <input type="text" class="form-control" name="first_name" value="{{ $user->name ?? '' }}" required />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Last Name <span class="required">*</span></label>
                                            <input type="text" class="form-control" name="last_name" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Company Name (Optional)</label>
                                    <input type="text" class="form-control">
                                </div>

                                <div class="select-custom">
                                    <label>Country / Region <span class="required">*</span></label>
                                    <select name="orderby" class="form-control">
                                        <option value="" selected="selected">Saudi Arabia</option>
                                        <option value="1">Pakistan</option>
                                        <option value="2">United States</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Street Address <span class="required">*</span></label>
                                    <input type="text" class="form-control" placeholder="House number and street name" required />
                                    <input type="text" class="form-control" placeholder="Apartment, suite, unit, etc. (optional)" required />
                                </div>

                                <div class="form-group">
                                    <label>Town / City <span class="required">*</span></label>
                                    <input type="text" class="form-control" required />
                                </div>

                                <div class="form-group">
                                    <label>State / County <span class="required">*</span></label>
                                    <input type="text" class="form-control" required />
                                </div>

                                <div class="form-group">
                                    <label>Postcode / ZIP <span class="required">*</span></label>
                                    <input type="text" class="form-control" required />
                                </div>

                                <div class="form-group">
                                    <label>Phone <span class="required">*</span></label>
                                    <input type="tel" class="form-control" required />
                                </div>

                                <div class="form-group">
                                    <label>Email Address <span class="required">*</span></label>
                                    <input type="email" class="form-control" name="email" value="{{ $user->email ?? '' }}" required />
                                </div>

                                <div class="form-group">
                                    <label class="order-comments">Order notes (optional)</label>
                                    <textarea class="form-control" placeholder="Notes about your order, e.g. special notes for delivery." rows="5"></textarea>
                                </div>
                            </form>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-5">
                    <div class="order-summary">
                        <h3>YOUR ORDER</h3>

                        <table class="table table-mini-cart">
                            <thead>
                                <tr>
                                    <th colspan="2">Product</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cart as $id => $details)
                                <tr>
                                    <td class="product-col">
                                        <h3 class="product-title">
                                            {{ $details['name'] }} × {{ $details['quantity'] }}
                                        </h3>
                                    </td>
                                    <td class="price-col">
                                        <span>{{ format_price($details['price'] * $details['quantity']) }}</span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="cart-subtotal">
                                    <td>
                                        <h4>Subtotal</h4>
                                    </td>
                                    <td class="price-col">
                                        <span>{{ format_price($subtotal) }}</span>
                                    </td>
                                </tr>
                                @if($total_discount > 0)
                                <tr class="cart-subtotal text-danger">
                                    <td>
                                        <h4>Discount</h4>
                                    </td>
                                    <td class="price-col">
                                        <span>-{{ format_price($total_discount) }}</span>
                                    </td>
                                </tr>
                                @endif
                                <tr class="cart-subtotal">
                                    <td>
                                        <h4>Tax (15%)</h4>
                                    </td>
                                    <td class="price-col">
                                        <span>{{ format_price($tax) }}</span>
                                    </td>
                                </tr>
                                <tr class="order-shipping">
                                    <td class="text-left" colspan="2">
                                        <h4 class="m-b-sm">Shipping</h4>
                                        <div class="form-group form-group-custom-control">
                                            <div class="custom-control custom-radio d-flex">
                                                <input type="radio" class="custom-control-input" name="shipping" checked />
                                                <label class="custom-control-label">Free Shipping</label>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="order-total">
                                    <td>
                                        <h4>Total</h4>
                                    </td>
                                    <td>
                                        <b class="total-price"><span>{{ format_price($grand_total) }}</span></b>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>

                        <div class="payment-methods">
                            <h4 class="p-b-sm mb-2">Payment Methods</h4>
                            <div class="form-group form-group-custom-control">
                                <div class="custom-control custom-radio d-flex">
                                    <input type="radio" class="custom-control-input" name="payment" checked />
                                    <label class="custom-control-label">Cash on delivery</label>
                                </div>
                            </div>
                            <div class="form-group form-group-custom-control">
                                <div class="custom-control custom-radio d-flex">
                                    <input type="radio" class="custom-control-input" name="payment" />
                                    <label class="custom-control-label">Bank Transfer</label>
                                </div>
                            </div>
                        </div>

                        <button type="submit" form="checkout-form" class="btn btn-dark btn-place-order" onclick="window.location.href='{{ route('order.complete') }}'; return false;">
                            Place Order
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-6"></div>
    </main>
@endsection
