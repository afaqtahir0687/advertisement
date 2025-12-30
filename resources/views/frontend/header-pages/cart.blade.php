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
                                    <th class="qty-col" style="font-weight: bold; font-size: 15px;">Quantity</th>
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
                                                    <a href="#" class="btn-remove" title="Remove Product"><span>×</span></a>
                                                </figure>
                                            </td>
                                            <td class="product-col">
                                                <h5 class="product-title">
                                                    <a href="{{ route('product.show', $details['slug']) }}" style="color: #e91d8e">{{ $details['name'] }}</a>
                                                </h5>
                                            </td>
                                            <td>{{ format_price($details['price']) }}</td>
                                            <td>
                                                <div class="product-single-qty">
                                                    <input class="horizontal-quantity form-control" type="text" value="{{ $details['quantity'] }}">
                                                </div>
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
                                @php $subtotal = 0; @endphp
                                @foreach((array) session('cart') as $id => $details)
                                    @php $subtotal += $details['price'] * $details['quantity']; @endphp
                                @endforeach
                                <tr>
                                    <td>Subtotal</td>
                                    <td>{{ format_price($subtotal) }}</td>
                                </tr>

                                <tr>
                                    <td colspan="2" class="text-left">
                                        <h4>Shipping</h4>

                                        <div class="form-group form-group-custom-control">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="shipping" checked>
                                                <label class="custom-control-label">Free Local Delivery</label>
                                            </div>
                                        </div>

                                        <div class="form-group form-group-custom-control mb-0">
                                            <div class="custom-control custom-radio mb-0">
                                                <input type="radio" name="shipping" class="custom-control-input">
                                                <label class="custom-control-label">Standard Shipping</label>
                                            </div>
                                        </div>

                                        <form action="#">
                                            <div class="form-group form-group-sm">
                                                <label>Shipping to <strong>Saudi Arabia</strong></label>
                                                <div class="select-custom">
                                                    <select class="form-control form-control-sm">
                                                        <option value="SA" selected>Saudi Arabia</option>
                                                        <option value="UAE">United Arab Emirates</option>
                                                        <option value="KW">Kuwait</option>
                                                        <option value="BH">Bahrain</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group form-group-sm">
                                                <div class="select-custom">
                                                    <select class="form-control form-control-sm">
                                                        <option value="Riyadh">Riyadh</option>
                                                        <option value="Jeddah">Jeddah</option>
                                                        <option value="Dammam">Dammam</option>
                                                        <option value="Makkah">Makkah</option>
                                                        <option value="Madinah">Madinah</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group form-group-sm">
                                                <input type="text" class="form-control form-control-sm"
                                                    placeholder="District / City Area">
                                            </div>

                                            <div class="form-group form-group-sm">
                                                <input type="text" class="form-control form-control-sm"
                                                    placeholder="Postal Code">
                                            </div>

                                            <button type="submit" class="btn btn-shop btn-update-total">
                                                Update Totals
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>

                            <tfoot>
                                <tr>
                                    <td>Total</td>
                                    <td><strong>{{ format_price($subtotal) }}</strong></td>
                                </tr>
                            </tfoot>
                        </table>

                        <div class="checkout-methods">
                            <a href="{{ route('checkout.index') }}" class="btn btn-block btn-dark">
                                Proceed to Checkout
                                <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

            </div><!-- End .row -->
        </div><!-- End .container -->

        <div class="mb-6"></div><!-- margin -->
    </main><!-- End .main -->
@endsection
