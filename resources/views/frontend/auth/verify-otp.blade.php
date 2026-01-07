@extends('frontend.layouts.master')

@section('content')
    <div class="page-header">
        <div class="container d-flex flex-column align-items-center">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Verify OTP
                        </li>
                    </ol>
                </div>
            </nav>
            <h1>Verify Your Email</h1>
        </div>
    </div>

    <div class="container login-container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <div class="heading mb-4">
                            <h2 class="title text-center mb-3">OTP Verification</h2>
                            <p class="text-center">Enter the 6-digit code sent to your email</p>
                        </div>

                        <form method="POST" action="{{ route('otp.verify.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="otp">
                                    6-Digit OTP Code
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text"
                                       class="form-control form-control-lg @error('otp') is-invalid @enderror"
                                       id="otp"
                                       name="otp"
                                       required
                                       maxlength="6"
                                       placeholder="123456"
                                       pattern="\d{6}"
                                       autofocus />
                                @error('otp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mt-4">
                                <button type="submit" class="btn btn-dark btn-lg btn-block">
                                    Verify OTP
                                </button>
                            </div>

                            <div class="text-center mt-3">
                                <p class="mb-0">
                                    Didn't receive the code?
                                </p>
                            </div>
                        </form>
                        
                        <form method="POST" action="{{ route('otp.resend') }}" class="text-center">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 text-primary font-weight-bold">
                                Resend OTP
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
