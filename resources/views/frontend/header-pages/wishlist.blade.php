@extends('frontend.layouts.master')
@section('content')
    <main class="main">
        <div class="page-header">
            <div class="container d-flex flex-column align-items-center">
                <nav aria-label="breadcrumb" class="breadcrumb-nav">
                    <div class="container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ __('messages.wishlist') }}
                            </li>
                        </ol>
                    </div>
                </nav>

                <h1>{{ __('messages.wishlist') }}</h1>
            </div>
        </div>

        <div class="container">
            <div class="wishlist-title">
                <h2 class="p-2 pt-5 mt-2">{{ __('messages.my_wishlist_subtitle') }}</h2>
            </div>
            <div class="wishlist-table-container">
                <table class="table table-wishlist mb-0">
                    <thead>
                        <tr>
                            <th class="thumbnail-col"></th>
                            <th class="product-col" style="font-weight: bold; font-size: 15px;">{{ __('messages.product') }}</th>
                            <th class="price-col" style="font-weight: bold; font-size: 15px;">{{ __('messages.price') }}</th>
                            <th class="status-col" style="font-weight: bold; font-size: 15px;">{{ __('messages.stock_status') }}</th>
                            <th class="action-col" style="font-weight: bold; font-size: 15px;">{{ __('messages.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="product-row">
                            <td>
                                <figure class="product-image-container">
                                    <a href="{{route('products.index')}}" class="product-image">
                                        <img src="assets/images/products/product-4.jpg" alt="product">
                                    </a>

                                    <a href="#" class="btn-remove icon-cancel" title="{{ __('messages.remove_product') }}"></a>
                                </figure>
                            </td>
                            <td>
                                <h5 class="product-title">
                                    <a href="{{route('products.index')}}" style="color: #e91d8e">Men Watch</a>
                                </h5>
                            </td>
                            <td class="price-box">$17.90</td>
                            <td>
                                <span class="stock-status">{{ __('messages.in_stock') }}</span>
                            </td>
                            <td class="action">
                                 <a href="#"
                                    class="btn btn-quickview mt-1 mt-md-0 quickview-btn"
                                    title="{{ __('messages.quick_view') }}">
                                    {{ __('messages.quick_view') }}
                                </a>
                                <button class="btn btn-dark btn-add-cart product-type-simple btn-shop">
                                    {{ __('messages.add_to_cart') }}
                                </button>
                            </td>
                        </tr>

                        <tr class="product-row">
                            <td>
                                <figure class="product-image-container">
                                    <a href="{{route('products.index')}}" class="product-image">
                                        <img src="assets/images/products/product-5.jpg" alt="product">
                                    </a>

                                    <a href="#" class="btn-remove icon-cancel" title="{{ __('messages.remove_product') }}"></a>
                                </figure>
                            </td>
                            <td>
                                <h5 class="product-title">
                                    <a href="{{route('products.index')}}" style="color: #e91d8e">Men Cap</a>
                                </h5>
                            </td>
                            <td class="price-box">$17.90</td>
                            <td>
                                <span class="stock-status">{{ __('messages.in_stock') }}</span>
                            </td>
                            <td class="action">
                                <a href="#"
                                    class="btn btn-quickview mt-1 mt-md-0 quickview-btn"
                                    title="{{ __('messages.quick_view') }}">
                                    {{ __('messages.quick_view') }}
                                </a>
                                <a href="{{route('products.index')}}" class="btn btn-dark btn-add-cart btn-shop">
                                    {{ __('messages.select_option') }}
                                </a>
                            </td>
                        </tr>

                        <tr class="product-row">
                            <td>
                                <figure class="product-image-container">
                                    <a href="{{route('products.index')}}" class="product-image">
                                        <img src="assets/images/products/product-6.jpg" alt="product">
                                    </a>

                                    <a href="#" class="btn-remove icon-cancel" title="{{ __('messages.remove_product') }}"></a>
                                </figure>
                            </td>
                            <td>
                                <h5 class="product-title">
                                    <a href="{{route('products.index')}}" style="color: #e91d8e">Men Black Gentle Belt</a>
                                </h5>
                            </td>
                            <td class="price-box">$17.90</td>
                            <td>
                                <span class="stock-status">{{ __('messages.in_stock') }}</span>
                            </td>
                            <td class="action">
                              <a href="#"
                                    class="btn btn-quickview mt-1 mt-md-0 quickview-btn"
                                    title="{{ __('messages.quick_view') }}">
                                    {{ __('messages.quick_view') }}
                                </a>

                                <a href="{{route('products.index')}}" class="btn btn-dark btn-add-cart btn-shop">
                                    {{ __('messages.select_option') }}
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div><!-- End .cart-table-container -->
        </div><!-- End .container -->
    </main><!-- End .main -->
@endsection
