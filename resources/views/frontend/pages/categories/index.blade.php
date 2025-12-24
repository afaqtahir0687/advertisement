@extends('frontend.layouts.master')
@section('content')
    <main class="main">
        <div class="category-banner-container bg-gray">
            <div class="category-banner banner text-uppercase"
                style="background: no-repeat 60%/cover url('assets/images/banners/banner-top.jpg');">
                <div class="container position-relative">
                    <div class="row">
                        <div class="pl-lg-5 pb-5 pb-md-0 col-sm-5 col-xl-4 col-lg-4 offset-1">
                            <h3>Printing Deals</h3>
                            <a href="{{ route('products.index') }}" class="btn btn-dark">Get Yours</a>
                        </div>
                        <div class="pl-lg-3 col-sm-4 offset-sm-0 offset-1 pt-3">
                            <div class="coupon-sale-content">
                                <h4 class="m-b-1 coupon-sale-text bg-white text-transform-none">Exclusive Coupon</h4>
                                <h5 class="mb-2 coupon-sale-text d-block ls-10 p-0">
                                    <i class="ls-0">Up to</i><b class="text-dark">SAR 100</b> Off
                                </h5>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="#">Business Cards</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Categories</li>
                </ol>
            </nav>

            <div class="row">
                <div class="col-lg-9 main-content">
                    <nav class="toolbox sticky-header" data-sticky-options="{'mobile': true}">
                        <div class="toolbox-left">
                            <a href="#" class="sidebar-toggle">
                                <svg data-name="Layer 3" id="Layer_3" viewBox="0 0 32 32"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <line x1="15" x2="26" y1="9" y2="9" class="cls-1"></line>
                                    <line x1="6" x2="9" y1="9" y2="9" class="cls-1"></line>
                                    <line x1="23" x2="26" y1="16" y2="16" class="cls-1"></line>
                                    <line x1="6" x2="17" y1="16" y2="16" class="cls-1"></line>
                                    <line x1="17" x2="26" y1="23" y2="23" class="cls-1"></line>
                                    <line x1="6" x2="11" y1="23" y2="23" class="cls-1"></line>
                                    <path d="M14.5,8.92A2.6,2.6,0,0,1,12,11.5,2.6,2.6,0,0,1,9.5,8.92a2.5,2.5,0,0,1,5,0Z"
                                        class="cls-2"></path>
                                    <path d="M22.5,15.92a2.5,2.5,0,1,1-5,0,2.5,2.5,0,0,1,5,0Z" class="cls-2"></path>
                                    <path d="M21,16a1,1,0,1,1-2,0,1,1,0,0,1,2,0Z" class="cls-3"></path>
                                    <path d="M16.5,22.92A2.6,2.6,0,0,1,14,25.5a2.6,2.6,0,0,1-2.5-2.58,2.5,2.5,0,0,1,5,0Z"
                                        class="cls-2"></path>
                                </svg>
                                <span>Filter</span>
                            </a>

                            <div class="toolbox-item toolbox-sort">
                                <label>Sort by</label>

                                <div class="select-custom">
                                    <select name="orderby" class="form-control">
                                        <option value="menu_order" selected="selected">Default sorting</option>
                                        <option value="popularity">Sort by popularity</option>
                                        <option value="rating">Sort by average rating</option>
                                        <option value="date">Sort by newness</option>
                                        <option value="price">Sort by price: low to high</option>
                                        <option value="price-desc">Sort by price: high to low</option>
                                    </select>
                                </div>
                                <!-- End .select-custom -->


                            </div>
                            <!-- End .toolbox-item -->
                        </div>
                        <!-- End .toolbox-left -->

                        <div class="toolbox-right">
                            <div class="toolbox-item toolbox-show">
                                <label>Show</label>

                                <div class="select-custom">
                                    <select name="count" class="form-control">
                                        <option value="12">12</option>
                                        <option value="24">24</option>
                                        <option value="36">36</option>
                                    </select>
                                </div>
                                <!-- End .select-custom -->
                            </div>
                            <!-- End .toolbox-item -->

                            <div class="toolbox-item layout-modes">
                                <a href="#" class="layout-btn btn-grid active" title="Grid">
                                    <i class="icon-mode-grid"></i>
                                </a>
                                <a href="#" class="layout-btn btn-list" title="List">
                                    <i class="icon-mode-list"></i>
                                </a>
                            </div>
                            <!-- End .layout-modes -->
                        </div>
                        <!-- End .toolbox-right -->
                    </nav>

                    <div class="row" id="products-grid">
                        @forelse($products as $product)
                            <div class="col-6 col-sm-4">
                                <div class="product-default">
                                    <figure>
                                        <a href="{{ route('product.show', $product->slug) }}">
                                            @if($product->image)
                                                <img src="{{ Storage::url($product->image) }}" width="280" height="280" alt="{{ $product->name }}" />
                                            @else
                                                <img src="{{ asset('assets/images/products/product-1.jpg') }}" width="280" height="280" alt="{{ $product->name }}" />
                                            @endif
                                        </a>
                                        <div class="label-group">
                                            @if($product->discount_price)
                                                @php
                                                    $percentage = round((($product->price - $product->discount_price) / $product->price) * 100);
                                                @endphp
                                                <div class="product-label label-sale">-{{ $percentage }}%</div>
                                            @endif
                                        </div>
                                    </figure>

                                    <div class="product-details">
                                        <h3 class="product-title">
                                            <a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a>
                                        </h3>
                                        <div class="price-box">
                                            @if($product->discount_price)
                                                <del class="old-price">SAR {{ $product->price }}</del>
                                                <span class="product-price">SAR {{ $product->discount_price }}</span>
                                            @else
                                                <span class="product-price">SAR {{ $product->price }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <div class="alert alert-info">
                                    No products found.
                                </div>
                            </div>
                        @endforelse
                    </div>
                    <!-- End .row -->
                    <nav class="toolbox toolbox-pagination">
                        {{ $products->links('pagination::bootstrap-4') }}
                    </nav>
                </div>
                <!-- End .col-lg-9 -->

                <div class="sidebar-overlay"></div>
                <aside class="sidebar-shop col-lg-3 order-lg-first mobile-sidebar">
                    <div class="sidebar-wrapper">
                        <div class="widget">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-body-2" role="button" aria-expanded="true"
                                    aria-controls="widget-body-2">Categories</a>
                            </h3>

                            <div class="collapse show" id="widget-body-2">
                                <div class="widget-body">
                                    <ul class="cat-list">
                                        @foreach($categories as $category)
                                            <li>
                                                @if($category->subcategories->count() > 0)
                                                    <a href="#widget-category-{{ $category->id }}" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="widget-category-{{ $category->id }}">
                                                        {{ $category->name }} <span class="products-count">({{ $category->subcategories->count() }})</span>
                                                        <span class="toggle"></span>
                                                    </a>
                                                    <div class="collapse" id="widget-category-{{ $category->id }}">
                                                        <ul class="cat-sublist">
                                                            @foreach($category->subcategories as $subcategory)
                                                                <li><a href="{{ route('category.show', $subcategory->slug) }}">{{ $subcategory->name }}</a> <span class="products-count">({{ $subcategory->products->count() }})</span></li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @else
                                                    <a href="{{ route('category.show', $category->slug) }}">
                                                        {{ $category->name }} <span class="products-count">({{ $category->products->count() }})</span>
                                                    </a>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>

                                </div>
                                <!-- End .widget-body -->
                            </div>
                            <!-- End .collapse -->
                        </div>

                        <!-- End .widget -->

                        {{-- <div class="widget">
                        <h3 class="widget-title">
                            <a data-toggle="collapse" href="#widget-body-3" role="button" aria-expanded="true" aria-controls="widget-body-3">Price</a>
                        </h3>

                        <div class="collapse show" id="widget-body-3">
                            <div class="widget-body pb-0">
                                <form action="#">
                                    <div class="price-slider-wrapper">
                                        <div id="price-slider"></div>
                                        <!-- End #price-slider -->
                                    </div>
                                    <!-- End .price-slider-wrapper -->

                                    <div class="filter-price-action d-flex align-items-center justify-content-between flex-wrap">
                                        <div class="filter-price-text">
                                            Price:
                                            <span id="filter-price-range"></span>
                                        </div>
                                        <!-- End .filter-price-text -->

                                        <button type="submit" class="btn btn-primary">Filter</button>
                                    </div>
                                    <!-- End .filter-price-action -->
                                </form>
                            </div>
                            <!-- End .widget-body -->
                        </div>
                        <!-- End .collapse -->
                    </div> --}}
                        <!-- End .widget -->

                        {{-- <div class="widget widget-color">
                        <h3 class="widget-title">
                            <a data-toggle="collapse" href="#widget-body-4" role="button" aria-expanded="true" aria-controls="widget-body-4">Color</a>
                        </h3>

                        <div class="collapse show" id="widget-body-4">
                            <div class="widget-body pb-0">
                                <ul class="config-swatch-list">
                                    <li class="active">
                                        <a href="#" style="background-color: #000;"></a>
                                    </li>
                                    <li>
                                        <a href="#" style="background-color: #0188cc;"></a>
                                    </li>
                                    <li>
                                        <a href="#" style="background-color: #81d742;"></a>
                                    </li>
                                    <li>
                                        <a href="#" style="background-color: #6085a5;"></a>
                                    </li>
                                    <li>
                                        <a href="#" style="background-color: #ab6e6e;"></a>
                                    </li>
                                </ul>
                            </div>
                            <!-- End .widget-body -->
                        </div>
                        <!-- End .collapse -->
                    </div> --}}
                        <!-- End .widget -->

                        {{-- <div class="widget widget-size">
                        <h3 class="widget-title">
                            <a data-toggle="collapse" href="#widget-body-5" role="button" aria-expanded="true" aria-controls="widget-body-5">Sizes</a>
                        </h3>

                        <div class="collapse show" id="widget-body-5">
                            <div class="widget-body pb-0">
                                <ul class="config-size-list">
                                    <li class="active"><a href="#">XL</a></li>
                                    <li><a href="#">L</a></li>
                                    <li><a href="#">M</a></li>
                                    <li><a href="#">S</a></li>
                                </ul>
                            </div>
                            <!-- End .widget-body -->
                        </div>
                        <!-- End .collapse -->
                    </div> --}}
                        <!-- End .widget -->

                        <div class="widget widget-featured">
                            <h3 class="widget-title">Featured</h3>

                            <div class="widget-body">
                                <div class="owl-carousel widget-featured-products">
                                    <div class="featured-col">
                                        <div class="product-default left-details product-widget">
                                            <figure>
                                                <a href="{{ route('products.index') }}">

                                                    <img src="{{ asset('assets/images/products/product-1.jpg') }}"
                                                        width="75" height="74" alt="product">
                                                    <img src="{{ asset('assets/images/products/product-1-2.jpg') }}"
                                                        width="75" height="75" alt="product">
                                                </a>
                                            </figure>
                                            <div class="product-details">
                                                <h3 class="product-title"> <a
                                                        href="{{ route('products.index') }}">Business Card Front &
                                                        Back</a> </h3>
                                                <div class="ratings-container">
                                                    <div class="product-ratings">
                                                        <span class="ratings" style="width:100%"></span>
                                                        <!-- End .ratings -->
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <!-- End .product-ratings -->
                                                </div>
                                                <!-- End .product-container -->
                                                <div class="price-box">
                                                    <span class="product-price">$150.00</span>
                                                </div>
                                                <!-- End .price-box -->
                                            </div>
                                            <!-- End .product-details -->
                                        </div>
                                        <div class="product-default left-details product-widget">
                                            <figure>
                                                <a href="{{ route('products.index') }}">
                                                    <img src="{{ asset('assets/images/products/product-2.jpg') }}"
                                                        width="75" height="75" alt="product">
                                                    <img src="{{ asset('assets/images/products/product-2-3.jpg') }}"
                                                        width="75" height="75" alt="product">
                                                </a>
                                            </figure>
                                            <div class="product-details">
                                                <h3 class="product-title"> <a href="{{ route('products.index') }}">Brown
                                                        Women Casual
                                                        HandBag</a> </h3>
                                                <div class="ratings-container">
                                                    <div class="product-ratings">
                                                        <span class="ratings" style="width:100%"></span>
                                                        <!-- End .ratings -->
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <!-- End .product-ratings -->
                                                </div>
                                                <!-- End .product-container -->
                                                <div class="price-box">
                                                    <span class="product-price">$150.00</span>
                                                </div>
                                                <!-- End .price-box -->
                                            </div>
                                            <!-- End .product-details -->
                                        </div>
                                        <div class="product-default left-details product-widget">
                                            <figure>
                                                <a href="{{ route('products.index') }}">
                                                    <img src="{{ asset('assets/images/products/product-3.jpg') }}"
                                                        width="75" height="75" alt="product">
                                                    <img src="{{ asset('assets/images/products/product-3-2.jpg') }}"
                                                        width="75" height="75" alt="product">
                                                </a>
                                            </figure>
                                            <div class="product-details">
                                                <h3 class="product-title"> <a
                                                        href="{{ route('products.index') }}">Postcard Printing</a> </h3>
                                                <div class="ratings-container">
                                                    <div class="product-ratings">
                                                        <span class="ratings" style="width:100%"></span>
                                                        <!-- End .ratings -->
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <!-- End .product-ratings -->
                                                </div>
                                                <!-- End .product-container -->
                                                <div class="price-box">
                                                    <span class="product-price">$149.00</span>
                                                </div>
                                                <!-- End .price-box -->
                                            </div>
                                            <!-- End .product-details -->
                                        </div>
                                    </div>
                                    <!-- End .featured-col -->

                                    <div class="featured-col">
                                        <div class="product-default left-details product-widget">
                                            <figure>
                                                <a href="{{ route('products.index') }}">

                                                    <img src="{{ asset('assets/images/products/product-1.jpg') }}"
                                                        width="75" height="74" alt="product">
                                                    <img src="{{ asset('assets/images/products/product-1-2.jpg') }}"
                                                        width="75" height="75" alt="product">
                                                </a>
                                            </figure>
                                            <div class="product-details">
                                                <h3 class="product-title"> <a
                                                        href="{{ route('products.index') }}">Business Card Front &
                                                        Back</a> </h3>
                                                <div class="ratings-container">
                                                    <div class="product-ratings">
                                                        <span class="ratings" style="width:100%"></span>
                                                        <!-- End .ratings -->
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <!-- End .product-ratings -->
                                                </div>
                                                <!-- End .product-container -->
                                                <div class="price-box">
                                                    <span class="product-price">$150.00</span>
                                                </div>
                                                <!-- End .price-box -->
                                            </div>
                                            <!-- End .product-details -->
                                        </div>
                                        <div class="product-default left-details product-widget">
                                            <figure>
                                                <a href="{{ route('products.index') }}">
                                                    <img src="{{ asset('assets/images/products/product-2.jpg') }}"
                                                        width="75" height="75" alt="product">
                                                    <img src="{{ asset('assets/images/products/product-2-3.jpg') }}"
                                                        width="75" height="75" alt="product">
                                                </a>
                                            </figure>
                                            <div class="product-details">
                                                <h3 class="product-title"> <a href="{{ route('products.index') }}">Brown
                                                        Women Casual
                                                        HandBag</a> </h3>
                                                <div class="ratings-container">
                                                    <div class="product-ratings">
                                                        <span class="ratings" style="width:100%"></span>
                                                        <!-- End .ratings -->
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <!-- End .product-ratings -->
                                                </div>
                                                <!-- End .product-container -->
                                                <div class="price-box">
                                                    <span class="product-price">$150.00</span>
                                                </div>
                                                <!-- End .price-box -->
                                            </div>
                                            <!-- End .product-details -->
                                        </div>
                                        <div class="product-default left-details product-widget">
                                            <figure>
                                                <a href="{{ route('products.index') }}">
                                                    <img src="{{ asset('assets/images/products/product-3.jpg') }}"
                                                        width="75" height="75" alt="product">
                                                    <img src="{{ asset('assets/images/products/product-3-2.jpg') }}"
                                                        width="75" height="75" alt="product">
                                                </a>
                                            </figure>
                                            <div class="product-details">
                                                <h3 class="product-title"> <a
                                                        href="{{ route('products.index') }}">Postcard Printing</a> </h3>
                                                <div class="ratings-container">
                                                    <div class="product-ratings">
                                                        <span class="ratings" style="width:100%"></span>
                                                        <!-- End .ratings -->
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <!-- End .product-ratings -->
                                                </div>
                                                <!-- End .product-container -->
                                                <div class="price-box">
                                                    <span class="product-price">$149.00</span>
                                                </div>
                                                <!-- End .price-box -->
                                            </div>
                                            <!-- End .product-details -->
                                        </div>
                                    </div>
                                    <!-- End .featured-col -->
                                </div>
                                <!-- End .widget-featured-slider -->
                            </div>
                            <!-- End .widget-body -->
                        </div>
                        <!-- End .widget -->

                        <div class="widget widget-block">
                            <h3 class="widget-title">Printing Services</h3>
                            <h5>Professional & Reliable Print Solutions</h5>
                            <p>
                                We offer high-quality printing services including business cards, flyers,
                                postcards, banners, and corporate stationery. Premium materials, sharp
                                finishing, and fast turnaround to support your business branding needs.
                            </p>
                        </div>

                        <!-- End .widget -->
                    </div>
                    <!-- End .sidebar-wrapper -->
                </aside>
                <!-- End .col-lg-3 -->
            </div>
            <!-- End .row -->
        </div>
        <!-- End .container -->

        <div class="mb-4"></div>
        <!-- margin -->
    </main>
@endsection
