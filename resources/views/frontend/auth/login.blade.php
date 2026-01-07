@extends('frontend.layouts.master')

@section('content')
    <div class="page-header">
        <div class="container d-flex flex-column align-items-center">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Login
                        </li>
                    </ol>
                </div>
            </nav>
            <h1>Login to Your Account</h1>
        </div>
    </div>

    <div class="container login-container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <div class="heading mb-4">
                            <h2 class="title text-center mb-3">Welcome Back</h2>
                            <p class="text-center">Sign in to access your account</p>
                        </div>

                        <form method="POST" action="{{ route('login.store') }}">
                            @csrf
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
                                       autocomplete="email"
                                       autofocus />
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="d-flex justify-content-between">
                                    <label for="password">
                                        Password
                                        <span class="text-danger">*</span>
                                    </label>
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="text-primary small">
                                            Forgot Password?
                                        </a>
                                    @endif
                                </div>
                                <input type="password"
                                       class="form-control form-control-lg @error('password') is-invalid @enderror"
                                       id="password"
                                       name="password"
                                       required
                                       autocomplete="current-password" />
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group form-check">
                                <input type="checkbox"
                                       class="form-check-input"
                                       id="remember"
                                       name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    Remember me
                                </label>
                            </div>

                            <div class="form-group mt-4">
                                <button type="submit" class="btn btn-dark btn-lg btn-block">
                                    Sign In
                                </button>
                            </div>

                            <div class="text-center mt-3">
                                <p class="mb-0">
                                    Don't have an account?
                                    <a href="{{ route('register') }}" class="text-primary font-weight-bold">Sign Up</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
