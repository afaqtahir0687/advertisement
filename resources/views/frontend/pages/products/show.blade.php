@extends('frontend.layouts.master')
@section('content')
    <main class="main">
        <div class="container">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Categories</a></li>
                    @if($product->category)
                        <li class="breadcrumb-item"><a href="{{ route('category.show', $product->category->slug) }}">{{ $product->category->name }}</a></li>
                    @endif
                    <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
                </ol>
            </nav>

            <div class="product-single-container product-single-default">
                <div class="row">
                    <div class="col-lg-5 col-md-6 product-single-gallery">
                        <div class="product-slider-container">
                            <div class="label-group">
                                @if($product->is_new_arrival)
                                    <div class="product-label label-hot">NEW</div>
                                @endif
                                @if($product->discount_price)
                                    <div class="product-label label-sale">SALE</div>
                                @endif
                            </div>

                            <div class="product-single-carousel owl-carousel owl-theme show-nav-hover">
                                @if($product->image)
                                    <div class="product-item">
                                        <img class="product-single-image" src="{{ Storage::url($product->image) }}"
                                            data-zoom-image="{{ Storage::url($product->image) }}" width="468"
                                            height="468" alt="{{ $product->name }}" />
                                    </div>
                                @endif
                                @if($product->images)
                                    @foreach($product->images as $image)
                                        <div class="product-item">
                                            <img class="product-single-image" src="{{ Storage::url($image) }}"
                                                data-zoom-image="{{ Storage::url($image) }}" width="468"
                                                height="468" alt="product" />
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <!-- End .product-single-carousel -->
                            <span class="prod-full-screen">
                                <i class="icon-plus"></i>
                            </span>
                        </div>

                        <div class="prod-thumbnail owl-dots">
                             @if($product->image)
                                <div class="owl-dot">
                                    <img src="{{ Storage::url($product->image) }}" width="110" height="110"
                                        alt="product-thumbnail" />
                                </div>
                            @endif
                            @if($product->images)
                                @foreach($product->images as $image)
                                    <div class="owl-dot">
                                        <img src="{{ Storage::url($image) }}" width="110" height="110"
                                            alt="product-thumbnail" />
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div><!-- End .product-single-gallery -->

                    <div class="col-lg-7 col-md-6 product-single-details">
                        <h1 class="product-title">{{ $product->name }}</h1>

                        <div class="product-nav">
                         
                        </div>

                        <div class="price-box">
                            @if($product->discount_price)
                                <del class="old-price">SAR {{ $product->price }}</del>
                                <span class="product-price">SAR {{ $product->discount_price }}</span>
                            @else
                                <span class="product-price">SAR {{ $product->price }}</span>
                            @endif
                        </div>

                        <div class="product-desc">
                            <p>
                                {{ $product->short_description }}
                            </p>
                        </div>

                         <div class="product-action">
                            <div class="product-single-qty">
                                <input class="horizontal-quantity form-control" type="text">
                            </div><!-- End .product-single-qty -->

                            <a href="#" class="btn btn-dark add-cart icon-shopping-cart" title="Add to Cart">Add to Cart</a>
                        </div><!-- End .product-action -->

                        <hr class="divider mb-0 mt-0">

                        <div class="product-single-share mb-3">
                            <label class="sr-only">Share:</label>

                            <div class="social-icons mr-2">
                                <a href="#" class="social-icon social-facebook icon-facebook" target="_blank" title="Facebook"></a>
                                <a href="#" class="social-icon social-twitter icon-twitter" target="_blank" title="Twitter"></a>
                                <a href="#" class="social-icon social-linkedin fab fa-linkedin-in" target="_blank" title="Linkedin"></a>
                                <a href="#" class="social-icon social-gplus fab fa-google-plus-g" target="_blank" title="Google +"></a>
                                <a href="#" class="social-icon social-mail icon-mail-alt" target="_blank" title="Mail"></a>
                            </div><!-- End .social-icons -->

                            <a href="#" class="add-wishlist" title="Add to Wishlist">Add to Wishlist</a>
                        </div><!-- End .product-single-share -->
                    </div><!-- End .product-single-details -->
                </div><!-- End .row -->
            </div><!-- End .product-single-container -->

            <div class="product-single-tabs">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="product-tab-desc" data-toggle="tab" href="#product-desc-content"
                            role="tab" aria-controls="product-desc-content" aria-selected="true">Description</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="product-desc-content" role="tabpanel"
                        aria-labelledby="product-tab-desc">
                        <div class="product-desc-content">
                           {!! $product->description !!}
                        </div><!-- End .product-desc-content -->
                    </div><!-- End .tab-pane -->
                </div><!-- End .tab-content -->
            </div><!-- End .product-single-tabs -->

            <div class="products-section pt-0">
                <h2 class="section-title">Related Products</h2>

                <div class="products-slider owl-carousel owl-theme dots-top dots-small">
                    @foreach($relatedProducts as $related)
                    <div class="product-default">
                        <figure>
                            <a href="{{ route('product.show', $related->slug) }}">
                                @if($related->image)
                                    <img src="{{ Storage::url($related->image) }}" width="280" height="280" alt="{{ $related->name }}">
                                @else
                                    <img src="{{ asset('assets/images/products/default.jpg') }}" width="280" height="280" alt="default">
                                @endif
                            </a>
                            <div class="label-group">
                                @if($related->is_new_arrival)
                                <div class="product-label label-hot">HOT</div>
                                @endif
                                @if($related->discount_price)
                                <div class="product-label label-sale">SALE</div>
                                @endif
                            </div>
                        </figure>
                        <div class="product-details">
                            <h3 class="product-title"> <a href="{{ route('product.show', $related->slug) }}">{{ $related->name }}</a> </h3>
                            <div class="price-box">
                                @if($related->discount_price)
                                    <del class="old-price">SAR {{ $related->price }}</del>
                                    <span class="product-price">SAR {{ $related->discount_price }}</span>
                                @else
                                    <span class="product-price">SAR {{ $related->price }}</span>
                                @endif
                            </div>
                            <div class="product-action">
                                <a href="{{ route('product.show', $related->slug) }}" class="btn-icon btn-add-cart"><i class="fa fa-arrow-right"></i><span>VIEW DETAILS</span></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- End .products-slider -->
            </div>
            <!-- End .products-section -->

            <div class="mb-4"></div>
        </div>
    </main>
@endsection
