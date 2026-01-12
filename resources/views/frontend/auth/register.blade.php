@extends('frontend.layouts.master')
@section('title', 'Register')
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
                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <div class="heading mb-4">
                            <h2 class="title text-center mb-3">Register</h2>
                            <p class="text-center">Create your account to get started</p>
                        </div>

                        <form method="POST" action="{{ route('register.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="first_name">
                                            First Name
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text"
                                               class="form-control form-control-lg @error('first_name') is-invalid @enderror"
                                               id="first_name"
                                               name="first_name"
                                               value="{{ old('first_name') }}"
                                               required
                                               autocomplete="given-name"
                                               autofocus />
                                        @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="last_name">
                                            Last Name
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text"
                                               class="form-control form-control-lg @error('last_name') is-invalid @enderror"
                                               id="last_name"
                                               name="last_name"
                                               value="{{ old('last_name') }}"
                                               required
                                               autocomplete="family-name" />
                                        @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
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
                                <label for="image">Profile Image (optional)</label>
                                <input type="file"
                                    class="form-control @error('image') is-invalid @enderror"
                                    name="image"
                                    accept="image/*">
                                @error('image')
                                    <span class="invalid-feedback">{{ $message }}</span>
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
