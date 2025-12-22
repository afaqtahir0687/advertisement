@extends('frontend.layouts.master')
@section('content')
    <main class="main">
        <div class="container">
            <ul class="checkout-progress-bar d-flex justify-content-center flex-wrap">
                <li class="active">
                    <a href="#">{{ __('messages.shopping_cart') }}</a>
                </li>
                <li>
                    <a href="#">{{ __('messages.checkout') }}</a>
                </li>
                <li class="disabled">
                    <a href="#">{{ __('messages.order_complete') }}</a>
                </li>
            </ul>


            <div class="row">
                <div class="col-lg-8">
                    <div class="cart-table-container">
                        <table class="table table-cart">
                            <thead>
                                <tr>
                                    <th class="thumbnail-col"></th>
                                    <th class="product-col" style="font-weight: bold; font-size: 15px;">{{ __('messages.product') }}</th>
                                    <th class="price-col" style="font-weight: bold; font-size: 15px;">{{ __('messages.price') }}</th>
                                    <th class="qty-col" style="font-weight: bold; font-size: 15px;">{{ __('messages.quantity') }}</th>
                                    <th class="text-right" style="font-weight: bold; font-size: 15px;">{{ __('messages.subtotal') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="product-row">
                                    <td>
                                        <figure class="product-image-container">
                                            <a href="{{ route('products.index') }}" class="product-image">
                                                <img src="assets/images/products/product-4.jpg" alt="product">
                                            </a>
                                        </figure>
                                    </td>
                                    <td class="product-col">
                                        <h5 class="product-title">
                                            <a href="{{ route('products.index') }}" style="color: #e91d8e">Men Watch</a>
                                        </h5>
                                    </td>
                                    <td>$17.90</td>
                                    <td>
                                        <div class="product-single-qty">
                                            <input class="horizontal-quantity form-control" type="text">
                                        </div><!-- End .product-single-qty -->
                                    </td>
                                    <td class="text-right"><span class="subtotal-price">$17.90</span></td>
                                </tr>

                                <tr class="product-row">
                                    <td>
                                        <figure class="product-image-container">
                                            <a href="{{ route('products.index') }}" class="product-image">
                                                <img src="assets/images/products/product-3.jpg" alt="product">
                                            </a>

                                        </figure>
                                    </td>
                                    <td class="product-col">
                                        <h5 class="product-title">
                                            <a href="{{ route('products.index') }}" style="color: #e91d8e">Men Watch</a>
                                        </h5>
                                    </td>
                                    <td>$17.90</td>
                                    <td>
                                        <div class="product-single-qty">
                                            <input class="horizontal-quantity form-control" type="text">
                                        </div><!-- End .product-single-qty -->
                                    </td>
                                    <td class="text-right"><span class="subtotal-price">$17.90</span></td>
                                </tr>

                                <tr class="product-row">
                                    <td>
                                        <figure class="product-image-container">
                                            <a href="{{ route('products.index') }}" class="product-image">
                                                <img src="assets/images/products/product-6.jpg" alt="product">
                                            </a>

                                        </figure>
                                    </td>
                                    <td class="product-col">
                                        <h5 class="product-title">
                                            <a href="{{ route('products.index') }}" style="color: #e91d8e">Men Black Gentle Belt</a>
                                        </h5>
                                    </td>
                                    <td>$17.90</td>
                                    <td>
                                        <div class="product-single-qty">
                                            <input class="horizontal-quantity form-control" type="text">
                                        </div><!-- End .product-single-qty -->
                                    </td>
                                    <td class="text-right"><span class="subtotal-price">$17.90</span></td>
                                </tr>
                            </tbody>


                            <tfoot>
                                <tr>
                                    <td colspan="5" class="clearfix">
                                        <div class="float-left">
                                            <div class="cart-discount">
                                                <form action="#">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control form-control-sm"
                                                            placeholder="{{ __('messages.coupon_code') }}" required>
                                                        <div class="input-group-append">
                                                            <button class="btn btn-sm" type="submit">{{ __('messages.apply_coupon') }}</button>
                                                        </div>
                                                    </div><!-- End .input-group -->
                                                </form>
                                            </div>
                                        </div><!-- End .float-left -->

                                        <div class="float-right">
                                            <button type="submit" class="btn btn-shop btn-update-cart">
                                                {{ __('messages.update_cart') }}
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
                        <h3>{{ __('messages.cart_totals') }}</h3>

                        <table class="table table-totals">
                            <tbody>
                                <tr>
                                    <td>{{ __('messages.subtotal') }}</td>
                                    <td>SAR 67.20</td>
                                </tr>

                                <tr>
                                    <td colspan="2" class="text-left">
                                        <h4>{{ __('messages.shipping') }}</h4>

                                        <div class="form-group form-group-custom-control">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" name="shipping" checked>
                                                <label class="custom-control-label">{{ __('messages.free_local_delivery') }}</label>
                                            </div>
                                        </div>

                                        <div class="form-group form-group-custom-control mb-0">
                                            <div class="custom-control custom-radio mb-0">
                                                <input type="radio" name="shipping" class="custom-control-input">
                                                <label class="custom-control-label">{{ __('messages.standard_shipping') }}</label>
                                            </div>
                                        </div>

                                        <form action="#">
                                            <div class="form-group form-group-sm">
                                                <label>{{ __('messages.shipping_to') }} <strong>Saudi Arabia</strong></label>
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
                                                    placeholder="{{ __('messages.district_city') }}">
                                            </div>

                                            <div class="form-group form-group-sm">
                                                <input type="text" class="form-control form-control-sm"
                                                    placeholder="{{ __('messages.postal_code') }}">
                                            </div>

                                            <button type="submit" class="btn btn-shop btn-update-total">
                                                {{ __('messages.update_totals') }}
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>

                            <tfoot>
                                <tr>
                                    <td>{{ __('messages.total') }}</td>
                                    <td><strong>SAR 67.20</strong></td>
                                </tr>
                            </tfoot>
                        </table>

                        <div class="checkout-methods">
                            <a href="{{ route('cart.index') }}" class="btn btn-block btn-dark">
                                {{ __('messages.proceed_to_checkout') }}
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
