@extends('frontend.layouts.master')
@section('title', 'Track Order')

@section('content')
    <div class="page-header">
        <div class="container d-flex flex-column align-items-center">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Track Order
                        </li>
                    </ol>
                </div>
            </nav>
            <h1>Track Your Order</h1>
        </div>
    </div>

    <div class="container login-container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <div class="heading mb-4">
                            <h2 class="title text-center mb-3">Track Your Order</h2>
                            <p class="text-center">Enter your order details to check the status</p>
                        </div>

                        <form method="POST" action="{{ route('track.order') }}">
                            @csrf
                            <div class="form-group">
                                <label for="order_number">
                                    Order Number
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" 
                                       class="form-control form-control-lg @error('order_number') is-invalid @enderror" 
                                       id="order_number" 
                                       name="order_number" 
                                       value="{{ old('order_number') }}" 
                                       required 
                                       autocomplete="off" 
                                       autofocus  placeholder="CL-0001"/>
                                @error('order_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">
                                    Email Address
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="email" 
                                       class="form-control form-control-lg @error('email') is-invalid @enderror" 
                                       id="email" 
                                       name="email" 
                                       value="{{ old('email') }}" 
                                       required 
                                       autocomplete="email" placeholder="Email"/>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mt-4">
                                <button type="submit" class="btn btn-dark btn-lg btn-block">
                                    Track Order
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Order Details Section -->
        <div class="row justify-content-center mt-5">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <div class="heading mb-4">
                            <h2 class="title text-center mb-3">Order Details</h2>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Products</th>
                                        <th>Order Date</th>
                                        <th>Shipped To</th>
                                        <th>Order Number</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="4" class="text-center py-4">
                                            <i class="icon-info-circle mr-2"></i>
                                            Enter your order details to track
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
