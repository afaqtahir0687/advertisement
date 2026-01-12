@extends('frontend.layouts.master')
@section('title', 'My Wishlist')
@section('content')
    <main class="main">
        <div class="page-header">
            <div class="container d-flex flex-column align-items-center">
                <nav aria-label="breadcrumb" class="breadcrumb-nav">
                    <div class="container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Wishlist
                            </li>
                        </ol>
                    </div>
                </nav>

                <h1>Wishlist</h1>
            </div>
        </div>

        <div class="container">
            <div class="wishlist-title">
                <h2 class="p-2 pt-5 mt-2">My Wishlist: Favorite Printing Services & Products</h2>
            </div>
            <div class="wishlist-table-container">
                <table class="table table-wishlist mb-0">
                    <thead>
                        <tr>
                            <th class="thumbnail-col"></th>
                            <th class="product-col" style="font-weight: bold; font-size: 15px;">Product</th>
                            <th class="price-col" style="font-weight: bold; font-size: 15px;">Price</th>
                            <th class="status-col" style="font-weight: bold; font-size: 15px;">Stock Status</th>
                            <th class="action-col" style="font-weight: bold; font-size: 15px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                            <tr class="product-row">
                                <td>
                                    <figure class="product-image-container">
                                        <a href="{{ route('product.show', $product->slug) }}" class="product-image">
                                            @if($product->image)
                                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                                            @else
                                                <img src="{{ asset('assets/images/products/product-1.jpg') }}" alt="{{ $product->name }}">
                                            @endif
                                        </a>
                                        <a href="{{ route('wishlist.remove', $product->id) }}" class="btn-remove icon-cancel" title="Remove Product"></a>
                                    </figure>
                                </td>
                                <td>
                                    <h5 class="product-title">
                                        <a href="{{ route('product.show', $product->slug) }}"
                                            style="color: #e91d8e">{{ $product->name }}</a>
                                    </h5>
                                </td>
                                <td class="price-box">
                                    @if($product->discount_price)
                                        {{ format_price($product->discount_price) }}
                                    @else
                                        {{ format_price($product->price) }}
                                    @endif
                                </td>
                                <td>
                                    <span
                                        class="stock-status">{{ $product->status == 'active' ? 'In stock' : 'Out of stock' }}</span>
                                </td>
                                <td class="action">
                                    <a href="{{ route('product.show', $product->slug) }}"
                                        class="btn btn-quickview mt-1 mt-md-0" title="View Detail">
                                        View Detail
                                    </a>
                                    <a href="{{ route('cart.add', $product->id) }}"
                                        class="btn btn-dark btn-add-cart btn-shop">
                                        ADD TO CART
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center p-5">
                                    <h4 class="mb-3">Your wishlist is empty.</h4>
                                    <a href="{{ route('home') }}" class="btn btn-dark btn-shop">Go Shopping</a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div><!-- End .cart-table-container -->
        </div><!-- End .container -->
    </main><!-- End .main -->
@endsection
