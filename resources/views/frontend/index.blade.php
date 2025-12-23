@extends('frontend.layouts.master')
@section('content')
    <div class="home-slider slide-animate owl-carousel owl-theme show-nav-hover nav-big mb-2 text-uppercase"
        data-owl-options="{
                    'loop': false
                }">
        <div class="home-slide home-slide1 banner">
            <img class="slide-bg" src="{{ asset('assets/images/demoes/demo4/slider/slide-1.jpeg') }}" width="1903"
                height="499" alt="slider image">
            <div class="container d-flex align-items-center">
                <div class="banner-layer appear-animate" data-animation-name="fadeInUpShorter">
                    <h4 class="text-transform-none m-b-3">Find the Boundaries. Push Through!</h4>
                    <h2 class="text-transform-none mb-0">Summer Sale</h2>
                    <h3 class="m-b-3">70% Off</h3>
                    <h5 class="d-inline-block mb-0">
                        <span>Starting At</span>
                        <b class="coupon-sale-text text-white bg-secondary align-middle"><sup>$</sup><em
                                class="align-text-top">199</em><sup>99</sup></b>
                    </h5>
                    <a href="{{ route('category.index') }}" class="btn btn-dark btn-lg">Shop Now!</a>
                </div>
            </div>
        </div>

        <div class="home-slide home-slide2 banner banner-md-vw">
            <img class="slide-bg" style="background-color: #ccc;" width="1903" height="499"
                src="{{ asset('assets/images/demoes/demo4/slider/slide-2.jpeg') }}" alt="slider image">
            <div class="container d-flex align-items-center">
                <div class="banner-layer d-flex justify-content-center appear-animate"
                    data-animation-name="fadeInUpShorter">
                    <div class="mx-auto">
                        <h4 class="m-b-1">Extra</h4>
                        <h3 class="m-b-2">20% off</h3>
                        <h3 class="mb-2 heading-border">Accessories</h3>
                        <h2 class="text-transform-none m-b-4">Summer Sale</h2>
                        <a href="{{ route('category.index') }}" class="btn btn-block btn-dark">Shop All Sale</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- <div class="home-slider slide-animate owl-carousel owl-theme show-nav-hover nav-big mb-2 text-uppercase"
        data-owl-options="{
                    'loop': false
                }">
        @foreach($sliders as $slider)
        <div class="home-slide home-slide1 banner">
            <img class="slide-bg" src="{{ asset('storage/' . $slider->image) }}" width="1903"
                height="499" alt="slider image">
            <div class="container d-flex align-items-center">
                <div class="banner-layer appear-animate" data-animation-name="fadeInUpShorter">
                    <h4 class="text-transform-none m-b-3">{{ $slider->title }}</h4>
                    <h2 class="text-transform-none mb-0">{{ $slider->subtitle }}</h2>
                    <h3 class="m-b-3">{{ $slider->offer_text }}</h3>
                    @if($slider->link)
                    <a href="{{ $slider->link }}" target="" class="btn btn-dark btn-lg">Shop Now!</a>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div> -->



    <div class="container">
        <h2 style="text-align: center;">From Concept to Delivery</h2>
        <p style="text-align: center;">Fuel Your Business with Flexible Credit, Design Services, and Lightning-Quick
            Delivery!</p>
        <div class="info-boxes-slider owl-carousel owl-theme mb-2"
            data-owl-options="{
                        'dots': false,
                        'loop': false,
                        'responsive': {
                            '576': {
                                'items': 2
                            },
                            '992': {
                                'items': 3
                            }
                        }
                    }">
            <div class="info-box info-box-icon-left">
                <i class="icon-shipping"></i>

                <div class="info-box-content">
                    <h4>FREE SHIPPING &amp; RETURN</h4>
                    <p class="text-body">Free shipping on all orders over $99.</p>
                </div>
            </div>

            <div class="info-box info-box-icon-left">
                <i class="icon-money"></i>

                <div class="info-box-content">
                    <h4>MONEY BACK GUARANTEE</h4>
                    <p class="text-body">100% money back guarantee</p>
                </div>
            </div>

            <div class="info-box info-box-icon-left">
                <i class="icon-support"></i>

                <div class="info-box-content">
                    <h4>ONLINE SUPPORT 24/7</h4>
                    <p class="text-body">Lorem ipsum dolor sit amet.</p>
                </div>
            </div>
        </div>

        <div class="banners-container mb-2">
            <div class="banners-slider owl-carousel owl-theme"
                data-owl-options="{
                            'dots': false
                        }">
                @forelse($conceptBanners as $banner)
                @php
                    $animation = 'fadeInUpShorter';
                    if($loop->first) $animation = 'fadeInLeftShorter';
                    if($loop->last) $animation = 'fadeInRightShorter';
                    $delay = 200 + ($loop->index * 150);
                @endphp
                <div class="banner banner{{ $loop->iteration }} banner-sm-vw d-flex align-items-center appear-animate"
                    style="background-color: #ccc;" data-animation-name="{{ $animation }}" data-animation-delay="{{ $delay }}">
                    <figure class="w-100">
                        <img src="{{ asset('storage/' . $banner->image) }}" alt="{{ $banner->title }}"
                            width="380" height="175" />
                    </figure>
                    <div class="banner-layer {{ $loop->remaining == 1 ? 'text-center' : ($loop->last ? 'text-right' : '') }}">
                        @if($loop->remaining == 1)
                            <div class="row align-items-lg-center">
                                <div class="col-lg-7 text-lg-right">
                                    <h3>{{ $banner->title }}</h3>
                                </div>
                                <div class="col-lg-5 text-lg-left px-0 px-xl-3">
                                    <a href="{{ $banner->link ?? route('category.index') }}" class="btn btn-sm btn-dark">Order Now</a>
                                </div>
                            </div>
                        @else
                            <h3 class="m-b-2">{{ $banner->title }}</h3>
                            <a href="{{ $banner->link ?? route('category.index') }}" class="btn btn-sm btn-dark">
                                {{ $loop->first ? 'Check Credit' : 'See Products' }}
                            </a>
                        @endif
                    </div>
                </div>
                @empty
                <!-- Fallback to static if no banners found -->
                <div class="banner banner1 banner-sm-vw d-flex align-items-center appear-animate"
                    style="background-color: #ccc;" data-animation-name="fadeInLeftShorter" data-animation-delay="500">
                    <figure class="w-100">
                        <img src="{{ asset('assets/images/demoes/demo4/banners/banner-1.jpg') }}" alt="banner"
                            width="380" height="175" />
                    </figure>
                    <div class="banner-layer">
                        <h3 class="m-b-2">Credit Terms</h3>
                        <a href="{{ route('category.index') }}" class="btn btn-sm btn-dark">Check Credit</a>
                    </div>
                </div>

                <div class="banner banner2 banner-sm-vw text-uppercase d-flex align-items-center appear-animate"
                    data-animation-name="fadeInUpShorter" data-animation-delay="200">
                    <figure class="w-100">
                        <img src="{{ asset('assets/images/demoes/demo4/banners/banner-2.jpg') }}"
                            style="background-color: #ccc;" alt="banner" width="380" height="175" />
                    </figure>
                    <div class="banner-layer text-center">
                        <div class="row align-items-lg-center">
                            <div class="col-lg-7 text-lg-right">
                                <h3>Design Services</h3>
                            </div>
                            <div class="col-lg-5 text-lg-left px-0 px-xl-3">
                                <a href="{{ route('category.index') }}" class="btn btn-sm btn-dark">Order Now</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="banner banner3 banner-sm-vw d-flex align-items-center appear-animate"
                    style="background-color: #ccc;" data-animation-name="fadeInRightShorter" data-animation-delay="500">
                    <figure class="w-100">
                        <img src="{{ asset('assets/images/demoes/demo4/banners/banner-3.jpg') }}" alt="banner"
                            width="380" height="175" />
                    </figure>
                    <div class="banner-layer text-right">
                        <h3 class="m-b-2">Express Delivery</h3>
                        <a href="{{ route('category.index') }}" class="btn btn-sm btn-dark">See Produts</a>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </div>

    <section class="featured-products-section">
        <div class="container">
            <h2 class="section-title heading-border ls-20 border-0">Featured Products</h2>

            <div class="products-slider custom-products owl-carousel owl-theme nav-outer show-nav-hover nav-image-center"
                data-owl-options="{
                            'dots': false,
                            'nav': true
                        }">
                @foreach($featuredProducts as $product)
                <div class="product-default appear-animate" data-animation-name="fadeInRightShorter">
                    <figure>
                        <a href="{{ route('product.show', $product->slug) }}">
                            <img src="{{ asset('storage/' . $product->image) }}" width="280" height="280"
                                alt="{{ $product->name }}">
                            @php
                                $secondImage = null;
                                if(is_array($product->images) && count($product->images) > 0) {
                                    $secondImage = $product->images[0];
                                }
                            @endphp
                            @if($secondImage)
                            <img src="{{ asset('storage/' . $secondImage) }}" width="280"
                                height="280" alt="{{ $product->name }}">
                            @endif
                        </a>
                        <div class="label-group">
                            @if($product->is_new_arrival)
                            <div class="product-label label-hot">HOT</div>
                            @endif
                            @if($product->discount_price)
                            @php
                                $percent = round((($product->price - $product->discount_price) / $product->price) * 100);
                            @endphp
                            <div class="product-label label-sale">-{{ $percent }}%</div>
                            @endif
                        </div>
                    </figure>
                    <div class="product-details">
                        <div class="category-list">
                            <a href="{{ route('category.show', $product->category->slug ?? '#') }}" class="product-category">{{ $product->category->name ?? 'Category' }}</a>
                        </div>
                        <h3 class="product-title">
                            <a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a>
                        </h3>
                        <div class="ratings-container">
                            <div class="product-ratings">
                                <span class="ratings" style="width:80%"></span>
                                <span class="tooltiptext tooltip-top"></span>
                            </div>
                        </div>
                        <div class="price-box">
                            @if($product->discount_price)
                            <del class="old-price">SAR {{ number_format($product->price, 2) }}</del>
                            <span class="product-price">SAR {{ number_format($product->discount_price, 2) }}</span>
                            @else
                            <span class="product-price">SAR {{ number_format($product->price, 2) }}</span>
                            @endif
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-icon-wish" title="wishlist"><i
                                    class="icon-heart"></i></a>
                            <a href="{{ route('product.show', $product->slug) }}" class="btn-icon btn-add-cart"><i class="fa fa-arrow-right"></i><span>SELECT
                                    OPTIONS</span></a>
                            <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i
                                    class="fas fa-external-link-alt"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="new-products-section">
        <div class="container">
            <h2 class="section-title heading-border ls-20 border-0">New Arrivals</h2>

            <div class="products-slider custom-products owl-carousel owl-theme nav-outer show-nav-hover nav-image-center mb-2"
                data-owl-options="{
                            'dots': false,
                            'nav': true,
                            'responsive': {
                                '992': {
                                    'items': 4
                                },
                                '1200': {
                                    'items': 5
                                }
                            }
                        }">
                @foreach($newArrivals as $product)
                <div class="product-default appear-animate" data-animation-name="fadeInRightShorter">
                    <figure>
                        <a href="{{ route('product.show', $product->slug) }}">
                            <img src="{{ asset('storage/' . $product->image) }}" width="220" height="220"
                                alt="{{ $product->name }}">
                            @php
                                $secondImage = null;
                                if(is_array($product->images) && count($product->images) > 0) {
                                    $secondImage = $product->images[0];
                                }
                            @endphp
                            @if($secondImage)
                            <img src="{{ asset('storage/' . $secondImage) }}" width="220"
                                height="220" alt="{{ $product->name }}">
                            @endif
                        </a>
                        <div class="label-group">
                            <div class="product-label label-hot">HOT</div>
                        </div>
                    </figure>
                    <div class="product-details">
                        <div class="category-list">
                            <a href="{{ route('category.show', $product->category->slug ?? '#') }}" class="product-category">{{ $product->category->name ?? 'Category' }}</a>
                        </div>
                        <h3 class="product-title">
                            <a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a>
                        </h3>
                        <div class="ratings-container">
                            <div class="product-ratings">
                                <span class="ratings" style="width:80%"></span>
                                <span class="tooltiptext tooltip-top"></span>
                            </div>
                        </div>
                        <div class="price-box">
                            @if($product->discount_price)
                            <del class="old-price">SAR {{ number_format($product->price, 2) }}</del>
                            <span class="product-price">SAR {{ number_format($product->discount_price, 2) }}</span>
                            @else
                            <span class="product-price">SAR {{ number_format($product->price, 2) }}</span>
                            @endif
                        </div>
                        <div class="product-action">
                            <a href="#" class="btn-icon-wish" title="wishlist"><i
                                    class="icon-heart"></i></a>
                            <a href="{{ route('product.show', $product->slug) }}" class="btn-icon btn-add-cart product-type-simple"><i
                                    class="icon-shopping-cart"></i><span>ADD TO CART</span></a>
                            <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i
                                    class="fas fa-external-link-alt"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="banner banner-big-sale appear-animate" data-animation-delay="200"
                data-animation-name="fadeInUpShorter"
                style="background: #2A95CB center/cover url({{ asset('assets/images/demoes/demo4/banners/banner-4.jpg') }});">
                <div class="banner-content row align-items-center mx-0">
                    <div class="col-md-9 col-sm-8">
                        <h2 class="text-white text-uppercase text-center text-sm-left ls-n-20 mb-md-0 px-4">
                            <b class="d-inline-block mr-3 mb-1 mb-md-0">Big Sale</b> All new fashion brands items up to 70%
                            off
                            <small class="text-transform-none align-middle">Online Purchases Only</small>
                        </h2>
                    </div>
                    <div class="col-md-3 col-sm-4 text-center text-sm-right">
                        <a class="btn btn-light btn-white btn-lg" href="{{ route('category.index') }}">View Sale</a>
                    </div>
                </div>
            </div>

            <h2 class="section-title categories-section-title heading-border border-0 ls-0 appear-animate"
                data-animation-delay="100" data-animation-name="fadeInUpShorter">Browse Our Categories
            </h2>

            <div class="categories-slider owl-carousel owl-theme show-nav-hover nav-outer">
                @foreach($categories as $category)
                <div class="product-category appear-animate" data-animation-name="fadeInUpShorter">
                    <a href="{{ route('category.show', $category->slug) }}">
                        <figure>
                            <img src="{{ asset('storage/' . $category->image) }}"
                                alt="{{ $category->name }}" width="280" height="240" />
                        </figure>
                        <div class="category-content">
                            <h3>{{ $category->name }}</h3>
                            <span><mark class="count">{{ $category->products_count }}</mark> products</span>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="feature-boxes-container">
        <div class="container appear-animate" data-animation-name="fadeInUpShorter">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2>It's Simpler than You Think!</h2>
                    <p>Curious About the Ease of Ordering with Us?</p>
                </div>
                <div class="col-md-3">
                    <div class="feature-box px-sm-5 feature-box-simple text-center">
                        <div class="feature-box-icon">
                            <i class="icon-earphones-alt"></i>
                        </div>

                        <div class="feature-box-content p-0">
                            <h3>Select the product</h3>

                        </div>
                        <!-- End .feature-box-content -->
                    </div>
                    <!-- End .feature-box -->
                </div>
                <!-- End .col-md-4 -->

                <div class="col-md-3">
                    <div class="feature-box px-sm-5 feature-box-simple text-center">
                        <div class="feature-box-icon">
                            <i class="icon-credit-card"></i>
                        </div>

                        <div class="feature-box-content p-0">
                            <h3>Upload your design</h3>

                        </div>
                        <!-- End .feature-box-content -->
                    </div>
                    <!-- End .feature-box -->
                </div>
                <!-- End .col-md-4 -->

                <div class="col-md-3">
                    <div class="feature-box px-sm-5 feature-box-simple text-center">
                        <div class="feature-box-icon">
                            <i class="icon-credit-card"></i>
                        </div>
                        <div class="feature-box-content p-0">
                            <h3>Pay Online</h3>

                        </div>
                        <!-- End .feature-box-content -->
                    </div>
                    <!-- End .feature-box -->
                </div>
                <!-- End .col-md-4 -->

                <div class="col-md-3">
                    <div class="feature-box px-sm-5 feature-box-simple text-center">
                        <div class="feature-box-icon">
                            <i class="icon-action-undo"></i>
                        </div>
                        <div class="feature-box-content p-0">
                            <h3>Collect / Receive</h3>

                        </div>
                        <!-- End .feature-box-content -->
                    </div>
                    <!-- End .feature-box -->
                </div>
                <!-- End .col-md-4 -->
            </div>
            <!-- End .row -->
        </div>
        <!-- End .container-->
    </section>

    <section class="promo-section bg-dark" data-parallax="{'speed': 2, 'enableOnMobile': true}"
        data-image-src="assets/images/demoes/demo4/banners/banner-5.jpg">
        <div class="promo-banner banner container text-uppercase">
            <div class="banner-content row align-items-center text-center">
                <div class="col-md-4 ml-xl-auto text-md-right appear-animate" data-animation-name="fadeInRightShorter"
                    data-animation-delay="600">
                    <h2 class="mb-md-0 text-white">Can't find what you<br>need?</h2>
                </div>
                <div class="col-md-4 col-xl-3 pb-4 pb-md-0 appear-animate" data-animation-name="fadeIn"
                    data-animation-delay="300">
                    <a href="{{ route('category.index') }}" class="btn btn-dark btn-black ls-10">Get A Quote</a>
                </div>
                <div class="col-md-4 mr-xl-auto text-md-left appear-animate" data-animation-name="fadeInLeftShorter"
                    data-animation-delay="600">
                    <h4 class="mb-1 mt-1 font1 coupon-sale-text p-0 d-block ls-n-10 text-transform-none">
                        <b>Exclusive
                            COUPON</b>
                    </h4>
                    <h5 class="mb-1 coupon-sale-text text-white ls-10 p-0"><i class="ls-0">UP TO</i><b
                            class="text-white bg-secondary ls-n-10">$100</b> OFF</h5>
                </div>
            </div>
        </div>
    </section>
@endsection
