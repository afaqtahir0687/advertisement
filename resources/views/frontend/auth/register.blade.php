@extends('frontend.layouts.master')
@section('content')
    <div class="page-header">
        <div class="container d-flex flex-column align-items-center">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('login') }}">Login</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Register
                        </li>
                    </ol>
                </div>
            </nav>
            <h1>Create an Account</h1>
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
                            <h2 class="title text-center mb-3">Register</h2>
                            <p class="text-center">Create your account to get started</p>
                        </div>

                        <form method="POST" action="{{ route('register.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">
                                    Full Name
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" 
                                       class="form-control form-control-lg @error('name') is-invalid @enderror" 
                                       id="name" 
                                       name="name" 
                                       value="{{ old('name') }}" 
                                       required 
                                       autocomplete="name" 
                                       autofocus />
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">
                                    Email address
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="email" 
                                       class="form-control form-control-lg @error('email') is-invalid @enderror" 
                                       id="email" 
                                       name="email" 
                                       value="{{ old('email') }}" 
                                       required 
                                       autocomplete="email" />
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">
                                    Password
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="password" 
                                       class="form-control form-control-lg @error('password') is-invalid @enderror" 
                                       id="password" 
                                       name="password" 
                                       required 
                                       autocomplete="new-password" />
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password-confirm">
                                    Confirm Password
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="password" 
                                       class="form-control form-control-lg" 
                                       id="password-confirm" 
                                       name="password_confirmation" 
                                       required 
                                       autocomplete="new-password" />
                            </div>

                            <div class="form-group mt-4">
                                <button type="submit" class="btn btn-dark btn-lg btn-block">
                                    Create Account
                                </button>
                            </div>

                            <div class="text-center mt-3">
                                <p class="mb-0">
                                    Already have an account? 
                                    <a href="{{ route('login') }}" class="text-primary font-weight-bold">Sign In</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
