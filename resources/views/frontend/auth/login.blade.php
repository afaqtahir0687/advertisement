@extends('frontend.layouts.master')
@section('title', 'Login')

@section('content')
    <style>
        .login-page-header {
            background-color: #f8f9fa;
            padding: 40px 0;
            margin-bottom: 0;
            border-bottom: 1px solid #e9ecef;
        }
        .login-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            transition: transform 0.3s ease;
        }
        .login-card:hover {
            transform: translateY(-5px);
        }
        .login-card .card-body {
            padding: 3rem;
        }
        .login-title {
            font-weight: 700;
            color: #333;
            margin-bottom: 10px;
            letter-spacing: -0.5px;
        }
        .login-subtitle {
            color: #6c757d;
            margin-bottom: 30px;
            font-size: 0.95rem;
        }
        .form-control-custom {
            height: 50px;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
            padding-left: 15px;
            font-size: 15px;
            transition: all 0.2s;
        }
        .form-control-custom:focus {
            border-color: #e91d8e;
            box-shadow: 0 0 0 3px rgba(233, 29, 142, 0.1);
        }
        .btn-custom-primary {
            background-color: #e91d8e;
            border-color: #e91d8e;
            color: white;
            height: 50px;
            border-radius: 8px;
            font-weight: 600;
            letter-spacing: 0.5px;
            font-size: 16px;
            box-shadow: 0 4px 6px rgba(233, 29, 142, 0.2);
            transition: all 0.3s;
        }
        .btn-custom-primary:hover {
            background-color: #d61c84;
            border-color: #d61c84;
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(233, 29, 142, 0.3);
            color: white;
        }
        .form-label-custom {
            font-weight: 600;
            color: #4a5568;
            margin-bottom: 8px;
            font-size: 14px;
        }
        .required-asterisk {
            color: #e53e3e;
        }
        .forgot-link {
            color: #718096;
            font-size: 13px;
            text-decoration: none;
            transition: color 0.2s;
        }
        .forgot-link:hover {
            color: #e91d8e;
            text-decoration: underline;
        }
        .register-link-group {
            margin-top: 25px;
            text-align: center;
            font-size: 14px;
            color: #718096;
        }
        .register-link {
            color: #e91d8e;
            font-weight: 600;
            text-decoration: none;
        }
        .register-link:hover {
            text-decoration: underline;
        }
    </style>

    <div class="page-header login-page-header">
        <div class="container d-flex flex-column align-items-center">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Login</li>
                    </ol>
                </div>
            </nav>
            <h1>Login to Your Account</h1>
        </div>
    </div>

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8">
                <div class="card login-card">
                    <div class="card-body">
                        <div class="text-center">
                            <h2 class="login-title">Welcome Back</h2>
                            <p class="login-subtitle">Please enter your details to sign in</p>
                        </div>

                        <form method="POST" action="{{ route('login.store') }}">
                            @csrf
                            <div class="form-group mb-4">
                                <label for="email" class="form-label-custom">
                                    Email Address <span class="required-asterisk">*</span>
                                </label>
                                <input type="email"
                                       class="form-control form-control-custom @error('email') is-invalid @enderror"
                                       id="email"
                                       name="email"
                                       value="{{ old('email') }}"
                                       required
                                       autocomplete="email"
                                       placeholder="Enter your email"
                                       autofocus />
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <label for="password" class="form-label-custom mb-0">
                                        Password <span class="required-asterisk">*</span>
                                    </label>
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="forgot-link">
                                            Forgot Password?
                                        </a>
                                    @endif
                                </div>
                                <input type="password"
                                       class="form-control form-control-custom mt-2 @error('password') is-invalid @enderror"
                                       id="password"
                                       name="password"
                                       required
                                       placeholder="Enter your password"
                                       autocomplete="current-password" />
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group form-check mb-4">
                                <input type="checkbox"
                                       class="form-check-input"
                                       id="remember"
                                       name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label text-muted small" for="remember">
                                    Remember me on this device
                                </label>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-custom-primary btn-block">
                                    Sign In
                                </button>
                            </div>

                            <div class="register-link-group">
                                <p class="mb-0">
                                    Don't have an account?
                                    <a href="{{ route('register') }}" class="register-link">Create Account</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
