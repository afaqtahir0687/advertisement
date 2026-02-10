@extends('frontend.layouts.master')
@section('title', 'My Dashboard')
@section('content')
    <main class="main">
        <div class="page-header">
            <div class="container d-flex flex-column align-items-center">
                <nav aria-label="breadcrumb" class="breadcrumb-nav">
                    <div class="container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                My Account
                            </li>
                        </ol>
                    </div>
                </nav>

                <h1>My Account</h1>
            </div>
        </div>

        <div class="container account-container custom-account-container mt-5">
            <div class="row">
                <div class="sidebar widget widget-dashboard mb-lg-0 mb-3 col-lg-3 order-0">
                    <h2 class="text-uppercase">My Account</h2>
                    <ul class="nav nav-tabs list flex-column mb-0" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="dashboard-tab" data-toggle="tab" href="#dashboard"
                                role="tab" aria-controls="dashboard" aria-selected="true">Dashboard</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="order-tab" data-toggle="tab" href="#order" role="tab"
                                aria-controls="order" aria-selected="true">Orders</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="download-tab" data-toggle="tab" href="#download" role="tab"
                                aria-controls="download" aria-selected="false">Downloads</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="address-tab" data-toggle="tab" href="#address" role="tab"
                                aria-controls="address" aria-selected="false">Addresses</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="edit-tab" data-toggle="tab" href="#edit" role="tab"
                                aria-controls="edit" aria-selected="false">Account details</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="wishlist-tab" data-toggle="tab" href="#wishlist" role="tab"
                                aria-controls="wishlist" aria-selected="false">Wishlist</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>

                    </ul>
                </div>
                <div class="col-lg-9 order-lg-last order-1 tab-content">
                    <div class="tab-pane fade show active" id="dashboard" role="tabpanel">
                        <div class="dashboard-content">
                            <p>
                                Hello <strong class="text-dark">{{ $user->name }}</strong> (not
                                <strong class="text-dark">{{ $user->name }}</strong>?
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    class="btn btn-link ">Log out</a>)
                            </p>

                            <p>
                                From your account dashboard you can view your
                                <a class="link-to-tab" href="#order">recent orders</a>,
                                manage your
                                <a class="link-to-tab" href="#address">shipping and billing addresses</a>, and
                                <a class="link-to-tab" href="#edit">edit your password and account details.</a>
                            </p>

                            <div class="mb-4"></div>

                            <div class="row row-lg">
                                <div class="col-6 col-md-4">
                                    <div class="feature-box text-center pb-4">
                                        <a href="#order" class="link-to-tab"><i class="fab fa-first-order"></i></a>
                                        <div class="feature-box-content">
                                            <h3>ORDERS</h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6 col-md-4">
                                    <div class="feature-box text-center pb-4">
                                        <a href="#download" class="link-to-tab"><i
                                                class="fas fa-cloud-download-alt"></i></a>
                                        <div class=" feature-box-content">
                                            <h3>DOWNLOADS</h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6 col-md-4">
                                    <div class="feature-box text-center pb-4">
                                        <a href="#address" class="link-to-tab"><i class="icon-location"></i></a>
                                        <div class="feature-box-content">
                                            <h3>ADDRESSES</h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6 col-md-4">
                                    <div class="feature-box text-center pb-4">
                                        <a href="#edit" class="link-to-tab"><i class="icon-user-2"></i></a>
                                        <div class="feature-box-content p-0">
                                            <h3>ACCOUNT DETAILS</h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6 col-md-4">
                                    <div class="feature-box text-center pb-4">
                                        <a href="#wishlist" class="link-to-tab"><i class="far fa-heart"></i></a>
                                        <div class="feature-box-content">
                                            <h3>WISHLIST</h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6 col-md-4">
                                    <div class="feature-box text-center pb-4">
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i></a>
                                        <div class="feature-box-content">
                                            <h3>LOGOUT</h3>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- End .row -->
                        </div>
                    </div><!-- End .tab-pane -->

                    <div class="tab-pane fade" id="order" role="tabpanel">
                        <div class="order-content">
                            <h3 class="account-sub-title d-none d-md-block"><i
                                    class="sicon-social-dropbox align-middle mr-3"></i>Orders</h3>
                            <div class="order-table-container text-center">
                                <table class="table table-order text-left">
                                    <thead>
                                        <tr>
                                            <th class="order-id">ORDER</th>
                                            <th class="order-date">DATE</th>
                                            <th class="order-status">STATUS</th>
                                            <th class="order-price">TOTAL</th>
                                            <th class="order-action">ACTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($orders as $order)
                                            <tr>
                                                <td class="text-left">#{{ $order->order_number }}</td>
                                                <td>{{ $order->created_at->format('M d, Y') }}</td>
                                                <td>{{ $order->order_status }}</td>
                                                <td>{{ $order->grand_total }}</td>
                                                <td class="d-flex align-items-center">
                                                    <a href="#" class="btn btn-dark mr-2">View</a>
                                                    @if ($order->order_status === 'pending')
                                                        <form action="{{ route('order.cancel', $order->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to cancel this order?')">
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger">Cancel</button>
                                                        </form>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td class="text-center p-0" colspan="5">
                                                    <p class="mb-5 mt-5">
                                                        No Order has been made yet.
                                                    </p>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <hr class="mt-0 mb-3 pb-2" />

                                <a href="{{ route('home') }}" class="btn btn-dark">Go Shop</a>
                            </div>
                        </div>
                    </div><!-- End .tab-pane -->

                    <div class="tab-pane fade" id="download" role="tabpanel">
                        <div class="download-content">
                            <h3 class="account-sub-title d-none d-md-block"><i
                                    class="sicon-cloud-download align-middle mr-3"></i>Downloads</h3>
                            <div class="download-table-container">
                                <p>No downloads available yet.</p> <a href="{{ route('home') }}"
                                    class="btn btn-primary text-transform-none mb-2">GO SHOP</a>
                            </div>
                        </div>
                    </div><!-- End .tab-pane -->

                    <div class="tab-pane fade" id="address" role="tabpanel">
                        <h3 class="account-sub-title d-none d-md-block mb-1"><i
                                class="sicon-location-pin align-middle mr-3"></i>Addresses</h3>
                        <div class="addresses-content">
                            <p class="mb-4">
                                The following addresses will be used on the checkout page by
                                default.
                            </p>

                            <div class="row">
                                <div class="address col-md-6">
                                    <div class="heading d-flex">
                                        <h4 class="text-dark mb-0">Billing address</h4>
                                    </div>

                                    <div class="address-box">
                                        @if($user->address)
                                            {{ $user->address }}<br>
                                            {{ $user->city }}, {{ $user->state }} <br>
                                            {{ $user->zip_code }}<br>
                                            {{ $user->country }}
                                        @else
                                            You have not set up this type of address yet.
                                        @endif
                                    </div>

                                    <a href="#edit" class="btn btn-default address-action link-to-tab">Edit
                                        Address</a>
                                </div>

                                <div class="address col-md-6 mt-5 mt-md-0">
                                    <div class="heading d-flex">
                                        <h4 class="text-dark mb-0">
                                            Shipping address
                                        </h4>
                                    </div>

                                    <div class="address-box">
                                         @if($user->address)
                                            {{ $user->address }}<br>
                                            {{ $user->city }}, {{ $user->state }} <br>
                                            {{ $user->zip_code }}<br>
                                            {{ $user->country }}
                                        @else
                                            You have not set up this type of address yet.
                                        @endif
                                    </div>

                                    <a href="#edit" class="btn btn-default address-action link-to-tab">Edit
                                        Address</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- End .tab-pane -->

                    <div class="tab-pane fade" id="edit" role="tabpanel">
                        <h3 class="account-sub-title d-none d-md-block mt-0 pt-1 ml-1"><i
                                class="icon-user-2 align-middle mr-3 pr-1"></i>Account Details</h3>
                        <div class="account-content">
                            <form action="#">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="acc-name">First name <span class="required">*</span></label>
                                            <input type="text" class="form-control" placeholder="First Name"
                                                id="acc-name" name="first_name" value="{{ $user->first_name }}" required />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="acc-lastname">Last name <span
                                                    class="required">*</span></label>
                                            <input type="text" class="form-control" id="acc-lastname"
                                                name="last_name" value="{{ $user->last_name }}" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-2">
                                    <label for="acc-text">Display name <span class="required">*</span></label>
                                    <input type="text" class="form-control" id="acc-text" name="name"
                                        placeholder="Display Name" value="{{ $user->name }}" required />
                                    <p>This will be how your name will be displayed in the account section and
                                        in
                                        reviews</p>
                                </div>


                                <div class="form-group mb-4">
                                    <label for="acc-email">Email address <span class="required">*</span></label>
                                    <input type="email" class="form-control" id="acc-email" name="email"
                                        placeholder="email@example.com" value="{{ $user->email }}" required />
                                </div>

                                <div class="change-password">
                                    <h3 class="text-uppercase mb-2">Password Change</h3>

                                    <div class="form-group">
                                        <label for="acc-password">Current Password (leave blank to leave
                                            unchanged)</label>
                                        <input type="password" class="form-control" id="acc-password"
                                            name="current_password" />
                                    </div>

                                    <div class="form-group">
                                        <label for="acc-password">New Password (leave blank to leave
                                            unchanged)</label>
                                        <input type="password" class="form-control" id="acc-new-password"
                                            name="new_password" />
                                    </div>

                                    <div class="form-group">
                                        <label for="acc-password">Confirm New Password</label>
                                        <input type="password" class="form-control" id="acc-confirm-password"
                                            name="new_password_confirmation" />
                                    </div>
                                </div>

                                <div class="form-footer mt-3 mb-0">
                                    <button type="button" class="btn btn-dark mr-0">
                                        Save changes
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div><!-- End .tab-pane -->

                    <div class="tab-pane fade" id="wishlist" role="tabpanel">
                        <div class="order-content">
                            <h3 class="account-sub-title d-none d-md-block"><i
                                    class="sicon-heart align-middle mr-3"></i>Wishlist</h3>
                             <div class="order-table-container text-center">
                                <table class="table table-order text-left">
                                    <thead>
                                        <tr>
                                            <th class="order-id">PRODUCT</th>
                                            <th class="order-price">PRICE</th>
                                            <th class="order-status">STOCK STATUS</th>
                                            <th class="order-action">ACTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($wishlist as $item)
                                            <tr>
                                                <td class="text-left">
                                                    <a href="{{ route('product.show', ['category_slug' => $item->product->category->slug, 'subcategory_slug' => $item->product->subcategory->slug, 'product_slug' => $item->product->slug]) }}">{{ $item->product->name }}</a>
                                                </td>
                                                <td>{{ $item->product->price }}</td>
                                                <td>{{ $item->product->stock_status ?? 'In Stock' }}</td>
                                                <td>
                                                    {{-- <a href="#" class="btn btn-dark">Add to Cart</a> --}}
                                                    <a href="{{ route('product.show', ['category_slug' => $item->product->category->slug, 'subcategory_slug' => $item->product->subcategory->slug, 'product_slug' => $item->product->slug]) }}" class="btn btn-dark">View Product</a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td class="text-center p-0" colspan="4">
                                                    <p class="mb-5 mt-5">
                                                        No items in wishlist.
                                                    </p>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <hr class="mt-0 mb-3 pb-2" />
                            </div>
                        </div>
                    </div><!-- End .tab-pane -->

                </div><!-- End .tab-content -->
            </div><!-- End .row -->
        </div><!-- End .container -->

        <div class="mb-5"></div><!-- margin -->
    </main><!-- End .main -->
@endsection
