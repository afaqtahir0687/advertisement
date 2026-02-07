@extends('frontend.layouts.master')
@section('title', 'Verify OTP')

@section('content')
    <style>
        .otp-page-header {
            background-color: #f8f9fa;
            padding: 40px 0;
            margin-bottom: 0;
            border-bottom: 1px solid #e9ecef;
        }
        .otp-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            transition: transform 0.3s ease;
        }
        .otp-card:hover {
            transform: translateY(-5px);
        }
        .otp-card .card-body {
            padding: 3rem;
        }
        .otp-title {
            font-weight: 700;
            color: #333;
            margin-bottom: 10px;
            letter-spacing: -0.5px;
        }
        .otp-subtitle {
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
            text-align: center;
            letter-spacing: 5px;
            font-weight: 700;
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
        .resend-group {
            margin-top: 25px;
            text-align: center;
            font-size: 14px;
            color: #718096;
        }
        .btn-resend-link {
            color: #e91d8e;
            font-weight: 600;
            text-decoration: none;
            background: none;
            border: none;
            padding: 0;
            cursor: pointer;
            transition: all 0.2s;
        }
        .btn-resend-link:hover {
            text-decoration: underline;
            color: #d61c84;
        }
        .btn-resend-link:disabled {
            color: #a0aec0;
            cursor: not-allowed;
            text-decoration: none;
        }
    </style>

    <div class="page-header otp-page-header">
        <div class="container d-flex flex-column align-items-center">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Verify OTP</li>
                    </ol>
                </div>
            </nav>
            <h1>Verify Your Email</h1>
        </div>
    </div>

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8">
                <div class="card otp-card">
                    <div class="card-body">
                        <div class="text-center">
                            <h2 class="otp-title">OTP Verification</h2>
                            <p class="otp-subtitle">Enter the 6-digit code sent to your email</p>
                        </div>

                        <form method="POST" action="{{ route('otp.verify.store') }}">
                            @csrf
                            <div class="form-group mb-4 text-center">
                                <label for="otp" class="form-label-custom">
                                    6-Digit OTP Code <span class="required-asterisk">*</span>
                                </label>
                                <input type="text"
                                       class="form-control form-control-custom @error('otp') is-invalid @enderror"
                                       id="otp"
                                       name="otp"
                                       required
                                       maxlength="6"
                                       placeholder="------"
                                       pattern="\d{6}"
                                       autocomplete="one-time-code"
                                       autofocus />
                                @error('otp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-custom-primary btn-block" id="verify-btn">
                                    <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true" id="verify-spinner"></span>
                                    <span class="btn-text">Verify OTP</span>
                                </button>
                            </div>
                        </form>

                        <div class="resend-group">
                            <p class="mb-0">Didn't receive the code?</p>
                            <form method="POST" action="{{ route('otp.resend') }}">
                                @csrf
                                <button type="submit" class="btn-resend-link" id="resend-btn">
                                    Resend OTP
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Optional: Simple cooldown for resend button to prevent spam
            const resendBtn = document.getElementById('resend-btn');
            if (resendBtn) {
                // You could add a timer here if needed, but for now just basic styling
            }

            // Auto-focus logic for better UX if needed
            const otpInput = document.getElementById('otp');
            if(otpInput) {
                otpInput.addEventListener('input', function() {
                    this.value = this.value.replace(/[^0-9]/g, '');
                });
            }

            // Verify Button Loader
            const verifyForm = document.querySelector('.otp-card form');
            const verifyBtn = document.getElementById('verify-btn');
            const verifySpinner = document.getElementById('verify-spinner');
            const btnText = verifyBtn ? verifyBtn.querySelector('.btn-text') : null;

            if (verifyForm && verifyBtn) {
                verifyForm.addEventListener('submit', function() {
                    if (this.checkValidity()) {
                        verifyBtn.disabled = true;
                        if (verifySpinner) verifySpinner.classList.remove('d-none');
                        if (btnText) btnText.textContent = 'Verifying...';
                    }
                });
            }
        });
    </script>
    @endpush
@endsection
