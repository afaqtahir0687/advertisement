@extends('frontend.layouts.master')
@section('content')

    <div class="home-slider slide-animate owl-carousel owl-theme show-nav-hover nav-big mb-2 text-uppercase"
        data-owl-options="{
            'loop': false
         }">

        @if(isset($sliders) && $sliders->count() > 0)

            {{-- ✅ Dynamic sliders --}}
            @foreach($sliders as $slider)
                <div class="home-slide home-slide1 banner">
                    <img class="slide-bg" src="{{ asset('storage/' . $slider->image) }}" width="1903" height="499"
                        alt="slider image">

                    <div class="container d-flex align-items-center">
                        <div class="banner-layer appear-animate" data-animation-name="fadeInUpShorter">
                            <h4 class="text-transform-none m-b-3">{{ $slider->title }}</h4>
                            <h2 class="text-transform-none mb-0">{{ $slider->subtitle }}</h2>
                            <h3 class="m-b-3">{{ $slider->offer_text }}</h3>

                            @if($slider->link)
                                <a href="{{ $slider->link }}" class="btn btn-dark btn-lg">
                                    Shop Now!
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach

        @else

            {{-- ❌ Static sliders (unchanged HTML) --}}
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
                            <b class="coupon-sale-text text-white bg-secondary align-middle">
                                {!! format_price(199.99) !!}
                            </b>
                        </h5>
                        <a href="{{ route('category.index') }}" class="btn btn-dark btn-lg">
                            Shop Now!
                        </a>
                    </div>
                </div>
            </div>

            <div class="home-slide home-slide2 banner banner-md-vw">
                <img class="slide-bg" src="{{ asset('assets/images/demoes/demo4/slider/slide-2.jpeg') }}" width="1903"
                    height="499" alt="slider image">

                <div class="container d-flex align-items-center">
                    <div class="banner-layer d-flex justify-content-center appear-animate"
                        data-animation-name="fadeInUpShorter">
                        <div class="mx-auto">
                            <h4 class="m-b-1">Extra</h4>
                            <h3 class="m-b-2">20% off</h3>
                            <h3 class="mb-2 heading-border">Accessories</h3>
                            <h2 class="text-transform-none m-b-4">Summer Sale</h2>
                            <a href="{{ route('category.index') }}" class="btn btn-block btn-dark">
                                Shop All Sale
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        @endif
    </div>



    <div class="container">
        <h2 style="text-align: center;">From Concept to Delivery</h2>
        <p style="text-align: center;">Fuel Your Business with Flexible Credit, Design Services, and Lightning-Quick
            Delivery!</p>
        <div class="info-boxes-slider owl-carousel owl-theme mb-2" data-owl-options="{
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
                    <p class="text-body">Free shipping on all orders over {{ format_price(99) }}.</p>
                </div>
            </div>

            <div class="info-box info-box-icon-left" style="align-items: center;">
                <span class="info-box-icon"
                    style="width: 50px; min-width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                    
                    <img src="{{ asset('assets/images/demoes/demo4/banners/rial.jpg') }}"
                        alt="Money Back"
                        style="width: 40px; height: 40px; object-fit: contain; display: block;">
                </span>

                <div class="info-box-content" style="padding-left: 12px;">
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
            <div class="banners-slider owl-carousel owl-theme" data-owl-options="{
                                'dots': false
                            }">
                <div class="banner banner1 banner-sm-vw d-flex align-items-center appear-animate"
                    style="background-color: #ccc;" data-animation-name="fadeInLeftShorter" data-animation-delay="500">
                    <figure class="w-100">
                        <img src="{{ asset('assets/images/demoes/demo4/banners/banner-1.jpg') }}" alt="banner" width="380"
                            height="175" />
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
                        <img src="{{ asset('assets/images/demoes/demo4/banners/banner-3.jpg') }}" alt="banner" width="380"
                            height="175" />
                    </figure>
                    <div class="banner-layer text-right">
                        <h3 class="m-b-2">Express Delivery</h3>
                        <a href="{{ route('category.index') }}" class="btn btn-sm btn-dark">See Produts</a>
                    </div>
                </div>
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
                @if(isset($featuredProducts) && $featuredProducts->count() > 0)
                    @foreach($featuredProducts as $product)
                        <div class="product-default appear-animate" data-animation-name="fadeInRightShorter">
                            <figure>
                                <a href="{{ route('product.show', $product->slug) }}">
                                    <img src="{{ asset('storage/' . $product->image) }}" width="280" height="280"
                                        alt="{{ $product->name }}">
                                    @if($product->images && count($product->images) > 0)
                                        <img src="{{ asset('storage/' . $product->images[0]) }}" width="280" height="280"
                                            alt="{{ $product->name }}">
                                    @endif
                                </a>
                                <div class="label-group">
                                    @if($product->is_featured)
                                        <div class="product-label label-hot">HOT</div>
                                    @endif
                                    @if($product->discount_price)
                                        @php
                                            $discount = round((($product->price - $product->discount_price) / $product->price) * 100);
                                        @endphp
                                        <div class="product-label label-sale">-{{ $discount }}%</div>
                                    @endif
                                </div>
                            </figure>
                            <div class="product-details">
                                <div class="category-list">
                                    @if($product->category)
                                        <a href="{{ route('category.show', $product->category->slug) }}" class="product-category">{{ $product->category->name }}</a>
                                    @else
                                        <a href="#" class="product-category">Uncategorized</a>
                                    @endif
                                </div>
                                <h3 class="product-title">
                                    <a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                </div>
                                <div class="price-box">
                                    @if($product->discount_price)
                                        <del class="old-price">{{ format_price($product->price) }}</del>
                                        <span class="product-price">{{ format_price($product->discount_price) }}</span>
                                    @else
                                        <span class="product-price">{{ format_price($product->price) }}</span>
                                    @endif
                                </div>
                                <div class="product-action">
                                    <a href="#" class="btn-icon-wish" title="wishlist"><i class="icon-heart"></i></a>
                                    <a href="{{ route('cart.add', $product->id) }}" class="btn-icon btn-add-cart"><i class="fa fa-arrow-right"></i><span>ADD TO CART</span></a>
                                    <a href="javascript:void(0);" class="btn-quickview" title="Quick View"><i
                                            class="fas fa-external-link-alt"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="product-default appear-animate" data-animation-name="fadeInRightShorter">
                        <figure>
                            <a href="{{ route('products.index') }}">
                                <img src="{{ asset('assets/images/products/product-1.jpg') }}" width="280" height="280"
                                    alt="product">
                                <img src="{{ asset('assets/images/products/product-1-2.jpg') }}" width="280" height="280"
                                    alt="product">
                            </a>
                            <div class="label-group">
                                <div class="product-label label-hot">HOT</div>
                                <div class="product-label label-sale">-20%</div>
                            </div>
                        </figure>
                        <div class="product-details">
                            <div class="category-list">
                                <a href="#" class="product-category">Category</a>
                            </div>
                            <h3 class="product-title">
                                <a href="#">Business Card Front & Back</a>
                            </h3>
                            <div class="ratings-container">
                                <div class="product-ratings">
                                    <span class="ratings" style="width:80%"></span>
                                    <!-- End .ratings -->
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <!-- End .product-ratings -->
                            </div>
                            <!-- End .product-container -->
                            <div class="price-box">
                                <del class="old-price">{{ format_price(200.00) }}</del>
                                <span class="product-price">{{ format_price(150.00) }}</span>
                            </div>
                            <!-- End .price-box -->
                            <div class="product-action">
                                <a href="#" class="btn-icon-wish" title="wishlist"><i class="icon-heart"></i></a>
                                <a href="#" class="btn-icon btn-add-cart"><i class="fa fa-arrow-right"></i><span>SELECT
                                        OPTIONS</span></a>
                                <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i
                                        class="fas fa-external-link-alt"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="product-default appear-animate" data-animation-name="fadeInRightShorter">
                        <figure>
                            <a href="{{ route('products.index') }}">
                                <img src="{{ asset('assets/images/products/product-2.jpg') }}" width="280" height="280"
                                    alt="product">
                                <img src="{{ asset('assets/images/products/product-2-3.jpg') }}" width="280" height="280"
                                    alt="product">
                            </a>
                            <div class="label-group">
                                <div class="product-label label-hot">HOT</div>
                                <div class="product-label label-sale">-30%</div>
                            </div>
                        </figure>
                        <div class="product-details">
                            <div class="category-list">
                                <a href="#" class="product-category">Category</a>
                            </div>
                            <h3 class="product-title">
                                <a href="#">Professional Roll up Banner Design</a>
                            </h3>
                            <div class="ratings-container">
                                <div class="product-ratings">
                                    <span class="ratings" style="width:80%"></span>
                                    <!-- End .ratings -->
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <!-- End .product-ratings -->
                            </div>
                            <!-- End .product-container -->
                            <div class="price-box">
                                <del class="old-price">{{ format_price(175.00) }}</del>
                                <span class="product-price">{{ format_price(150.00) }}</span>
                            </div>
                            <!-- End .price-box -->
                            <div class="product-action">
                                <a href="#" class="btn-icon-wish" title="wishlist"><i class="icon-heart"></i></a>
                                <a href="#" class="btn-icon btn-add-cart"><i class="fa fa-arrow-right"></i><span>SELECT
                                        OPTIONS</span></a>
                                <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i
                                        class="fas fa-external-link-alt"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="product-default appear-animate" data-animation-name="fadeInRightShorter">
                        <figure>
                            <a href="{{ route('products.index') }}">
                                <img src="{{ asset('assets/images/products/product-3.jpg') }}" width="280" height="280"
                                    alt="product">
                                <img src="{{ asset('assets/images/products/product-3-2.jpg') }}" width="280" height="280"
                                    alt="product">
                            </a>
                        </figure>
                        <div class="product-details">
                            <div class="category-list">
                                <a href="#" class="product-category">Category</a>
                            </div>
                            <h3 class="product-title">
                                <a href="#">Postcard Printing</a>
                            </h3>
                            <div class="ratings-container">
                                <div class="product-ratings">
                                    <span class="ratings" style="width:80%"></span>
                                    <!-- End .ratings -->
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <!-- End .product-ratings -->
                            </div>
                            <!-- End .product-container -->
                            <div class="price-box">
                                <del class="old-price">{{ format_price(159.00) }}</del>
                                <span class="product-price">{{ format_price(149.00) }}</span>
                            </div>
                            <!-- End .price-box -->
                            <div class="product-action">
                                <a href="#" class="btn-icon-wish" title="wishlist"><i class="icon-heart"></i></a>
                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                        class="icon-shopping-cart"></i><span>ADD TO CART</span></a>
                                <a href="#" class="btn-quickview" title="Quick View"><i
                                        class="fas fa-external-link-alt"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="product-default appear-animate" data-animation-name="fadeInRightShorter">
                        <figure>
                            <a href="{{ route('products.index') }}">
                                <img src="{{ asset('assets/images/products/product-4.jpg') }}" width="280" height="280"
                                    alt="product">
                                <img src="{{ asset('assets/images/products/product-4-2.jpg') }}" width="280" height="280"
                                    alt="product">
                            </a>
                            <div class="label-group">
                                <div class="product-label label-hot">HOT</div>
                                <div class="product-label label-sale">-40%</div>
                            </div>
                        </figure>
                        <div class="product-details">
                            <div class="category-list">
                                <a href="#" class="product-category">Category</a>
                            </div>
                            <h3 class="product-title">
                                <a href="#">Folder Flyer Printing</a>
                            </h3>
                            <div class="ratings-container">
                                <div class="product-ratings">
                                    <span class="ratings" style="width:80%"></span>
                                    <!-- End .ratings -->
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <!-- End .product-ratings -->
                            </div>
                            <!-- End .product-container -->
                            <div class="price-box">
                                <del class="old-price">{{ format_price(159.00) }}</del>
                                <span class="product-price">{{ format_price(149.00) }}</span>
                            </div>
                            <!-- End .price-box -->
                            <div class="product-action">
                                <a href="#" class="btn-icon-wish" title="wishlist"><i class="icon-heart"></i></a>
                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                        class="icon-shopping-cart"></i><span>ADD TO CART</span></a>
                                <a href="#" class="btn-quickview" title="Quick View"><i
                                        class="fas fa-external-link-alt"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="product-default appear-animate" data-animation-name="fadeInRightShorter">
                        <figure>
                            <a href="{{ route('products.index') }}">
                                <img src="{{ asset('assets/images/products/product-5.jpg') }}" width="280" height="280"
                                    alt="product">
                                <img src="{{ asset('assets/images/products/product-5-2.jpg') }}" width="280" height="280"
                                    alt="product">
                            </a>
                            <div class="label-group">
                                <div class="product-label label-hot">HOT</div>
                                <div class="product-label label-sale">-15%</div>
                            </div>
                        </figure>
                        <div class="product-details">
                            <div class="category-list">
                                <a href="{{ route('category.index') }}" class="product-category">Category</a>
                            </div>
                            <h3 class="product-title">
                                <a href="{{ route('products.index') }}">Casual Spring Blue Shoes</a>
                            </h3>
                            <div class="ratings-container">
                                <div class="product-ratings">
                                    <span class="ratings" style="width:80%"></span>

                                    <span class="tooltiptext tooltip-top"></span>
                                </div>

                            </div>

                            <div class="price-box">
                                <del class="old-price">{{ format_price(59.00) }}</del>
                                <span class="product-price">{{ format_price(49.00) }}</span>
                            </div>

                            <div class="product-action">
                                <a href="#" class="btn-icon-wish" title="wishlist"><i class="icon-heart"></i></a>
                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                        class="icon-shopping-cart"></i><span>ADD TO CART</span></a>
                                <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i
                                        class="fas fa-external-link-alt"></i></a>
                            </div>
                        </div>
                    </div>
                @endif
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
                @if(isset($newArrivals) && $newArrivals->count() > 0)
                    @foreach($newArrivals as $product)
                        <div class="product-default appear-animate" data-animation-name="fadeInRightShorter">
                            <figure>
                                <a href="{{ route('product.show', $product->slug) }}">
                                    <img src="{{ asset('storage/' . $product->image) }}" width="220" height="220"
                                        alt="{{ $product->name }}">
                                    @if($product->images && count($product->images) > 0)
                                        <img src="{{ asset('storage/' . $product->images[0]) }}" width="220" height="220"
                                            alt="{{ $product->name }}">
                                    @endif
                                </a>
                                <div class="label-group">
                                    @if($product->is_featured || $product->is_new_arrival)
                                        <div class="product-label label-hot">HOT</div>
                                    @endif
                                    @if($product->discount_price)
                                        @php
                                            $discount = round((($product->price - $product->discount_price) / $product->price) * 100);
                                        @endphp
                                        <div class="product-label label-sale">-{{ $discount }}%</div>
                                    @endif
                                </div>
                            </figure>
                            <div class="product-details">
                                <div class="category-list">
                                    @if($product->category)
                                        <a href="{{ route('category.show', $product->category->slug) }}" class="product-category">{{ $product->category->name }}</a>
                                    @else
                                        <a href="#" class="product-category">Uncategorized</a>
                                    @endif
                                </div>
                                <h3 class="product-title">
                                    <a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a>
                                </h3>
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:100%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                </div>
                                <div class="price-box">
                                    @if($product->discount_price)
                                        <del class="old-price">{{ format_price($product->price) }}</del>
                                        <span class="product-price">{{ format_price($product->discount_price) }}</span>
                                    @else
                                        <span class="product-price">{{ format_price($product->price) }}</span>
                                    @endif
                                </div>
                                <div class="product-action">
                                    <a href="#" class="btn-icon-wish" title="wishlist"><i class="icon-heart"></i></a>
                                    <a href="{{ route('cart.add', $product->id) }}" class="btn-icon btn-add-cart"><i class="fa fa-arrow-right"></i><span>ADD TO CART</span></a>
                                    <a href="javascript:void(0);" class="btn-quickview" title="Quick View"><i
                                            class="fas fa-external-link-alt"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="product-default appear-animate" data-animation-name="fadeInRightShorter">
                        <figure>
                            <a href="{{ route('products.index') }}">
                                <img src="{{ asset('assets/images/products/product-6.jpg') }}" width="220" height="220"
                                    alt="product">
                                <img src="{{ asset('assets/images/products/product-6-2.jpg') }}" width="220" height="220"
                                    alt="product">
                            </a>
                            <div class="label-group">
                                <div class="product-label label-hot">HOT</div>
                            </div>
                        </figure>
                        <div class="product-details">
                            <div class="category-list">
                                <a href="#" class="product-category">Category</a>
                            </div>
                            <h3 class="product-title">
                                <a href="#">Award Shields Hand Made</a>
                            </h3>
                            <div class="ratings-container">
                                <div class="product-ratings">
                                    <span class="ratings" style="width:80%"></span>
                                    <!-- End .ratings -->
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <!-- End .product-ratings -->
                            </div>
                            <!-- End .product-container -->
                            <div class="price-box">
                                <del class="old-price">{{ format_price(159.00) }}</del>
                                <span class="product-price">{{ format_price(149.00) }}</span>
                            </div>
                            <!-- End .price-box -->
                            <div class="product-action">
                                <a href="#" class="btn-icon-wish" title="wishlist"><i class="icon-heart"></i></a>
                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                        class="icon-shopping-cart"></i><span>ADD TO CART</span></a>
                                <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i
                                        class="fas fa-external-link-alt"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="product-default appear-animate" data-animation-name="fadeInRightShorter">
                        <figure>
                            <a href="{{ route('products.index') }}">
                                <img src="{{ asset('assets/images/products/product-7.jpg') }}" width="220" height="220"
                                    alt="product">
                                <img src="{{ asset('assets/images/products/product-7-2.jpg') }}" width="220" height="220"
                                    alt="product">
                            </a>
                            <div class="label-group">
                                <div class="product-label label-hot">HOT</div>
                            </div>
                        </figure>
                        <div class="product-details">
                            <div class="category-list">
                                <a href="#" class="product-category">Category</a>
                            </div>
                            <h3 class="product-title">
                                <a href="#">Signal Sign Board</a>
                            </h3>
                            <div class="ratings-container">
                                <div class="product-ratings">
                                    <span class="ratings" style="width:80%"></span>
                                    <!-- End .ratings -->
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <!-- End .product-ratings -->
                            </div>
                            <!-- End .product-container -->
                            <div class="price-box">
                                <del class="old-price">{{ format_price(159.00) }}</del>
                                <span class="product-price">{{ format_price(149.00) }}</span>
                            </div>
                            <!-- End .price-box -->
                            <div class="product-action">
                                <a href="#" class="btn-icon-wish" title="wishlist"><i class="icon-heart"></i></a>
                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                        class="icon-shopping-cart"></i><span>ADD TO CART</span></a>
                                <a href="#" class="btn-quickview" title="Quick View"><i
                                        class="fas fa-external-link-alt"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="product-default appear-animate" data-animation-name="fadeInRightShorter">
                        <figure>
                            <a href="{{ route('products.index') }}">
                                <img src="{{ asset('assets/images/products/product-8.jpg') }}" width="220" height="220"
                                    alt="product">
                                <img src="{{ asset('assets/images/products/product-8-2.jpg') }}" width="220" height="220"
                                    alt="product">
                            </a>
                            <div class="label-group">
                                <div class="product-label label-sale">-20%</div>
                            </div>
                        </figure>
                        <div class="product-details">
                            <div class="category-list">
                                <a href="#" class="product-category">Category</a>
                            </div>
                            <h3 class="product-title">
                                <a href="#">Shop Sign Board</a>
                            </h3>
                            <div class="ratings-container">
                                <div class="product-ratings">
                                    <span class="ratings" style="width:80%"></span>
                                    <!-- End .ratings -->
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <!-- End .product-ratings -->
                            </div>
                            <!-- End .product-container -->
                            <div class="price-box">
                                <del class="old-price">{{ format_price(159.00) }}</del>
                                <span class="product-price">{{ format_price(149.00) }}</span>
                            </div>
                            <!-- End .price-box -->
                            <div class="product-action">
                                <a href="#" class="btn-icon-wish" title="wishlist"><i class="icon-heart"></i></a>
                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                        class="icon-shopping-cart"></i><span>ADD TO CART</span></a>
                                <a href="#" class="btn-quickview" title="Quick View"><i
                                        class="fas fa-external-link-alt"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="product-default appear-animate" data-animation-name="fadeInRightShorter">
                        <figure>
                            <a href="{{ route('products.index') }}">
                                <img src="{{ asset('assets/images/products/product-9.jpg') }}" width="220" height="220"
                                    alt="product">
                                <img src="{{ asset('assets/images/products/product-9-2.jpg') }}" width="220" height="220"
                                    alt="product">
                            </a>
                            <div class="label-group">
                                <div class="product-label label-sale">-30%</div>
                            </div>
                        </figure>
                        <div class="product-details">
                            <div class="category-list">
                                <a href="#" class="product-category">Category</a>
                            </div>
                            <h3 class="product-title">
                                <a href="#">Signage</a>
                            </h3>
                            <div class="ratings-container">
                                <div class="product-ratings">
                                    <span class="ratings" style="width:80%"></span>
                                    <!-- End .ratings -->
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <!-- End .product-ratings -->
                            </div>
                            <!-- End .product-container -->
                            <div class="price-box">
                                <del class="old-price">{{ format_price(159.00) }}</del>
                                <span class="product-price">{{ format_price(149.00) }}</span>
                            </div>
                            <!-- End .price-box -->
                            <div class="product-action">
                                <a href="#" class="btn-icon-wish" title="wishlist"><i class="icon-heart"></i></a>
                                <a href="#" class="btn-icon btn-add-cart"><i class="fa fa-arrow-right"></i><span>SELECT
                                        OPTIONS</span></a>
                                <a href="#" class="btn-quickview" title="Quick View"><i
                                        class="fas fa-external-link-alt"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="product-default appear-animate" data-animation-name="fadeInRightShorter">
                        <figure>
                            <a href="{{ route('products.index') }}">
                                <img src="{{ asset('assets/images/products/product-10.jpg') }}" width="220" height="220"
                                    alt="product">
                                <img src="{{ asset('assets/images/products/product-10-2.jpg') }}" width="220" height="220"
                                    alt="product">
                            </a>
                            <div class="label-group">
                                <div class="product-label label-hot">HOT</div>
                            </div>
                        </figure>
                        <div class="product-details">
                            <div class="category-list">
                                <a href="#" class="product-category">Category</a>
                            </div>
                            <h3 class="product-title">
                                <a href="#">Die Cut Business Cards</a>
                            </h3>
                            <div class="ratings-container">
                                <div class="product-ratings">
                                    <span class="ratings" style="width:80%"></span>
                                    <!-- End .ratings -->
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <!-- End .product-ratings -->
                            </div>
                            <!-- End .product-container -->
                            <div class="price-box">
                                <del class="old-price">{{ format_price(159.00) }}</del>
                                <span class="product-price">{{ format_price(149.00) }}</span>
                            </div>
                            <!-- End .price-box -->
                            <div class="product-action">
                                <a href="#" class="btn-icon-wish" title="wishlist"><i class="icon-heart"></i></a>
                                <a href="#" class="btn-icon btn-add-cart product-type-simple"><i
                                        class="icon-shopping-cart"></i><span>ADD TO CART</span></a>
                                <a href="#" class="btn-quickview" title="Quick View"><i
                                        class="fas fa-external-link-alt"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="product-default appear-animate" data-animation-name="fadeInRightShorter">
                        <figure>
                            <a href="{{ route('products.index') }}">
                                <img src="{{ asset('assets/images/products/product-11.jpg') }}" width="220" height="220"
                                    alt="product">
                                <img src="{{ asset('assets/images/products/product-11-2.jpg') }}" width="220" height="220"
                                    alt="product">
                            </a>
                            <div class="label-group">
                                <div class="product-label label-sale">-20%</div>
                            </div>
                        </figure>
                        <div class="product-details">
                            <div class="category-list">
                                <a href="#" class="product-category">Category</a>
                            </div>
                            <h3 class="product-title">
                                <a href="#">Men Sports Travel Bag</a>
                            </h3>
                            <div class="ratings-container">
                                <div class="product-ratings">
                                    <span class="ratings" style="width:80%"></span>
                                    <!-- End .ratings -->
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <!-- End .product-ratings -->
                            </div>
                            <!-- End .product-container -->
                            <div class="price-box">
                                <del class="old-price">{{ format_price(59.00) }}</del>
                                <span class="product-price">{{ format_price(49.00) }}</span>
                            </div>
                            <!-- End .price-box -->
                            <div class="product-action">
                                <a href="#" class="btn-icon-wish" title="wishlist"><i class="icon-heart"></i></a>
                                <a href="#" class="btn-icon btn-add-cart"><i class="fa fa-arrow-right"></i><span>SELECT
                                        OPTIONS</span></a>
                                <a href="ajax/product-quick-view.html" class="btn-quickview" title="Quick View"><i
                                        class="fas fa-external-link-alt"></i></a>
                            </div>
                        </div>
                    </div>
                @endif
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
                data-animation-delay="100" data-animation-name="fadeInUpShorter">
                Browse Our Categories
            </h2>

            <div class="categories-slider owl-carousel owl-theme show-nav-hover nav-outer">

                @if(isset($categories) && $categories->count() > 0)

                    {{-- ✅ Dynamic Categories --}}
                    @foreach($categories as $category)
                        <div class="product-category appear-animate" data-animation-name="fadeInUpShorter">
                            <a href="{{ route('category.show', $category->slug) }}">
                                <figure>
                                    <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" width="280"
                                        height="240" />
                                </figure>
                                <div class="category-content">
                                    <h3>{{ $category->name }}</h3>
                                    <span>
                                        <mark class="count">{{ $category->products_count }}</mark> products
                                    </span>
                                </div>
                            </a>
                        </div>
                    @endforeach

                @else

                    {{-- ❌ Static Categories (UNCHANGED HTML) --}}
                    <div class="product-category appear-animate" data-animation-name="fadeInUpShorter">
                        <a href="{{ route('category.index') }}">
                            <figure>
                                <img src="{{ asset('assets/images/demoes/demo4/products/categories/category-1.jpg') }}"
                                    alt="category" width="280" height="240" />
                            </figure>
                            <div class="category-content">
                                <h3>Stationery</h3>
                                <span><mark class="count">3</mark> products</span>
                            </div>
                        </a>
                    </div>

                    <div class="product-category appear-animate" data-animation-name="fadeInUpShorter">
                        <a href="{{ route('category.index') }}">
                            <figure>
                                <img src="{{ asset('assets/images/demoes/demo4/products/categories/category-2.jpg') }}"
                                    alt="category" width="220" height="220" />
                            </figure>
                            <div class="category-content">
                                <h3>Promotional</h3>
                                <span><mark class="count">3</mark> products</span>
                            </div>
                        </a>
                    </div>

                    <div class="product-category appear-animate" data-animation-name="fadeInUpShorter">
                        <a href="{{ route('category.index') }}">
                            <figure>
                                <img src="{{ asset('assets/images/demoes/demo4/products/categories/category-3.jpg') }}"
                                    alt="category" width="220" height="220" />
                            </figure>
                            <div class="category-content">
                                <h3>Packaging & Boxes</h3>
                                <span><mark class="count">3</mark> products</span>
                            </div>
                        </a>
                    </div>

                    <div class="product-category appear-animate" data-animation-name="fadeInUpShorter">
                        <a href="{{ route('category.index') }}">
                            <figure>
                                <img src="{{ asset('assets/images/demoes/demo4/products/categories/category-4.jpg') }}"
                                    alt="category" width="220" height="220" />
                            </figure>
                            <div class="category-content">
                                <h3>Event Branding</h3>
                                <span><mark class="count">3</mark> products</span>
                            </div>
                        </a>
                    </div>

                    <div class="product-category appear-animate" data-animation-name="fadeInUpShorter">
                        <a href="{{ route('category.index') }}">
                            <figure>
                                <img src="{{ asset('assets/images/demoes/demo4/products/categories/category-6.jpg') }}"
                                    alt="category" width="220" height="220" />
                            </figure>
                            <div class="category-content">
                                <h3>Large Printing</h3>
                                <span><mark class="count">3</mark> products</span>
                            </div>
                        </a>
                    </div>

                    <div class="product-category appear-animate" data-animation-name="fadeInUpShorter">
                        <a href="{{ route('category.index') }}">
                            <figure>
                                <img src="{{ asset('assets/images/demoes/demo4/products/categories/category-5.jpg') }}"
                                    alt="category" width="220" height="220" />
                            </figure>
                            <div class="category-content">
                                <h3>Marketing Materials</h3>
                                <span><mark class="count">3</mark> products</span>
                            </div>
                        </a>
                    </div>

                @endif

            </div>

        </div>
    </section>

    <section class="feature-boxes-container">
        <div class="container appear-animate" data-animation-name="fadeInUpShorter">
            <div class="row">
                <div class="col-md-4">
                    <div class="feature-box px-sm-5 feature-box-simple text-center">
                        <div class="feature-box-icon">
                            <i class="icon-earphones-alt"></i>
                        </div>

                        <div class="feature-box-content p-0">
                            <h3>Customer Support</h3>
                            <h5>You Won't Be Alone</h5>

                            <p>We really care about you and your website as much as you do. Purchasing Porto or any other
                                theme from us you get 100% free support.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-box px-sm-5 feature-box-simple text-center">
                        <div class="feature-box-icon">
                            <i class="icon-credit-card"></i>
                        </div>

                        <div class="feature-box-content p-0">
                            <h3>Fully Customizable</h3>
                            <h5>Tons Of Options</h5>

                            <p>With Porto you can customize the layout, colors and styles within only a few minutes. Start
                                creating an amazing website right now!</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box px-sm-5 feature-box-simple text-center">
                        <div class="feature-box-icon">
                            <i class="icon-action-undo"></i>
                        </div>
                        <div class="feature-box-content p-0">
                            <h3>Powerful Admin</h3>
                            <h5>Made To Help You</h5>

                            <p>Porto has very powerful admin features to help customer to build their own shop in minutes
                                without any special skills in web development.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="promo-section bg-dark" data-parallax="{'speed': 2, 'enableOnMobile': true}"
        data-image-src="assets/images/demoes/demo4/banners/banner-5.jpg">
        <div class="promo-banner banner container text-uppercase">
            <div class="banner-content row align-items-center text-center">
                <div class="col-md-4 ml-xl-auto text-md-right appear-animate" data-animation-name="fadeInRightShorter"
                    data-animation-delay="600">
                    <h2 class="mb-md-0 text-white">Top Fashion<br>Deals</h2>
                </div>
                <div class="col-md-4 col-xl-3 pb-4 pb-md-0 appear-animate" data-animation-name="fadeIn"
                    data-animation-delay="300">
                    <a href="{{ route('category.index') }}" class="btn btn-dark btn-black ls-10">View Sale</a>
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