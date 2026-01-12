@extends('frontend.layouts.master')

@section('title', $category->name)
@section('meta_description', 'Explore our ' . $category->name . ' collection. High-quality professional printing services for ' . $category->name . ' and more at Crelogics.')
@section('meta_keywords', $category->name . ', printing, advertisement, customized ' . $category->name . ', professional printing')

@section('content')
    <main class="main">
        <div class="category-banner-container bg-gray">
            <div class="category-banner banner text-uppercase"
                style="background: no-repeat 60%/cover url('{{ $category->image ? asset('storage/' . $category->image) : asset('assets/images/banners/banner-top.jpg') }}');">
                <div class="container position-relative">
                    <div class="row">
                        <div class="pl-lg-5 pb-5 pb-md-0 col-sm-5 col-xl-4 col-lg-4 offset-1">
                            <h3>{{ $category->name }}</h3>
                            <a href="#products-grid" class="btn btn-dark">Get Yours</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Categories</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
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
                            </div>
                        </div>

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
                            </div>

                            <div class="toolbox-item layout-modes">
                                <a href="#" class="layout-btn btn-grid active" title="Grid">
                                    <i class="icon-mode-grid"></i>
                                </a>
                                <a href="#" class="layout-btn btn-list" title="List">
                                    <i class="icon-mode-list"></i>
                                </a>
                            </div>
                        </div>
                    </nav>

                    @if($subcategories->count() > 0)
                        <div class="subcategories-section mb-4">
                            <h3 class="section-title mb-3">Subcategories</h3>
                            <div class="row">
                                @foreach($subcategories as $subcategory)
                                    <div class="col-6 col-md-4 col-lg-3 mb-3">
                                        <a href="{{ route('subcategory.show', [$category->slug, $subcategory->slug]) }}" class="subcategory-card">
                                            <div class="card h-100 text-center">
                                                @if($subcategory->image)
                                                    <img src="{{ asset('storage/' . $subcategory->image) }}" class="card-img-top" alt="{{ $subcategory->name }}" style="height: 150px; object-fit: cover;">
                                                @else
                                                    <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 150px;">
                                                        <i class="icon-category" style="font-size: 3rem; color: #ccc;"></i>
                                                    </div>
                                                @endif
                                                <div class="card-body">
                                                    <h5 class="card-title mb-1">{{ $subcategory->name }}</h5>
                                                    <p class="text-muted mb-0"><small>{{ $subcategory->products_count }} Products</small></p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <div class="products-header mb-3">
                        <h3 class="section-title">
                            @if($subcategories->count() > 0)
                                All Products
                            @else
                                Products
                            @endif
                        </h3>
                    </div>

                    <div class="row" id="products-grid">
                        @forelse($products as $product)
                            <div class="col-6 col-sm-4">
                                <div class="product-default">
                                        <figure>
                                        <a href="{{ route('product.show', [$category->slug, $product->subcategory ? $product->subcategory->slug : 'no-sub', $product->slug]) }}">
                                            @if($product->image)
                                                <img src="{{ asset('storage/' . $product->image) }}" width="280" height="280" alt="{{ $product->name }}" />
                                            @else
                                                <img src="{{ asset('assets/images/products/product-1.jpg') }}" width="280" height="280" alt="{{ $product->name }}" />
                                            @endif
                                            
                                            @if($product->images && count($product->images) > 0)
                                                <img src="{{ asset('storage/' . $product->images[0]) }}" width="280" height="280" alt="{{ $product->name }}" />
                                            @endif
                                        </a>

                                        <div class="label-group">
                                            @if($product->is_featured)
                                                <div class="product-label label-hot">HOT</div>
                                            @endif
                                            @if($product->discount_percent)
                                                <div class="product-label label-sale">-{{ $product->discount_percent }}%</div>
                                            @endif
                                        </div>
                                    </figure>

                                    <div class="product-details">
                                        <div class="category-list">
                                            <a href="{{ route('category.show', $category->slug) }}" class="product-category">{{ $category->name }}</a>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="{{ route('product.show', [$category->slug, $product->subcategory ? $product->subcategory->slug : 'no-sub', $product->slug]) }}">{{ $product->name }}</a>
                                        </h3>
                                        <div class="ratings-container">
                                            <div class="product-ratings">
                                                <span class="ratings" style="width:0%"></span> <!-- Placeholder for ratings -->
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                        </div>
                                        <div class="price-box">
                                            @if($product->old_price)
                                                <del class="old-price">{{ format_price($product->old_price) }}</del>
                                            @endif
                                            <span class="product-price">{{ format_price($product->price) }}</span>
                                        </div>
                                        <div class="product-action">
                                            <a href="#" class="btn-icon-wish" title="wishlist"><i class="icon-heart"></i></a>
                                            <a href="{{ route('product.show', [$category->slug, $product->subcategory ? $product->subcategory->slug : 'no-sub', $product->slug]) }}" class="btn-icon btn-add-cart"><i class="fa fa-arrow-right"></i><span>SELECT OPTIONS</span></a>
                                            <a href="#" class="btn-quickview" title="Quick View"><i class="fas fa-external-link-alt"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <div class="alert alert-info">
                                    No products found in this category.
                                </div>
                            </div>
                        @endforelse
                    </div>

                    <!-- Pagination (if applicable in future, for now just placeholder or remove) -->
                    <!-- 
                    <nav class="toolbox toolbox-pagination">
                        ...
                    </nav> 
                    -->
                </div>

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
                                        <!-- Show all categories -->
                                        @foreach(\App\Models\Category::where('status', 'active')->get() as $cat)
                                            <li class="{{ $cat->id == $category->id ? 'active' : '' }}">
                                                <a href="{{ route('category.show', $cat->slug) }}">
                                                    {{ $cat->name }} <span class="products-count">({{ $cat->getAllProducts()->count() }})</span>
                                                </a>
                                                @if($cat->subcategories()->where('status', 'active')->count() > 0)
                                                    <ul class="cat-sublist">
                                                        @foreach($cat->subcategories()->where('status', 'active')->get() as $subcat)
                                                            <li>
                                                                <a href="{{ route('subcategory.show', [$cat->slug, $subcat->slug]) }}">
                                                                    {{ $subcat->name }} <span class="products-count">({{ $subcat->products()->count() }})</span>
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="widget widget-block">
                            <h3 class="widget-title">Printing Services</h3>
                            <h5>Professional & Reliable Print Solutions</h5>
                            <p>
                                We offer high-quality printing services including business cards, flyers,
                                postcards, banners, and corporate stationery. Premium materials, sharp
                                finishing, and fast turnaround to support your business branding needs.
                            </p>
                        </div>
                    </div>
                </aside>
            </div>
        </div>

        <div class="mb-4"></div>
    </main>
@endsection
