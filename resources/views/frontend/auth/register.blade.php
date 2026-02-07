@extends('frontend.layouts.master')
@section('title', 'Register')

@section('content')
    <style>
        .register-page-header {
            background-color: #f8f9fa;
            padding: 40px 0;
            margin-bottom: 0;
            border-bottom: 1px solid #e9ecef;
        }
        .register-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            transition: transform 0.3s ease;
        }
        .register-card:hover {
            transform: translateY(-5px);
        }
        .register-card .card-body {
            padding: 3rem;
        }
        .register-title {
            font-weight: 700;
            color: #333;
            margin-bottom: 10px;
            letter-spacing: -0.5px;
        }
        .register-subtitle {
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
        .login-link-group {
            margin-top: 25px;
            text-align: center;
            font-size: 14px;
            color: #718096;
        }
        .signin-link-custom {
            color: #e91d8e;
            font-weight: 600;
            text-decoration: none;
        }
        .signin-link-custom:hover {
            text-decoration: underline;
        }
        
        /* Password Validation Styles */
        .password-requirements {
            margin-top: 15px;
            padding: 15px;
            background-color: #f8fafc;
            border-radius: 8px;
            border: 1px solid #edf2f7;
        }
        .requirement-item {
            font-size: 13px;
            color: #718096;
            margin-bottom: 5px;
            display: flex;
            align-items: center;
            transition: all 0.2s;
        }
        .requirement-item i {
            margin-right: 8px;
            font-size: 12px;
            width: 15px;
            text-align: center;
        }
        .requirement-item.valid {
            color: #38a169;
            font-weight: 500;
        }
        .requirement-item.valid i {
            color: #38a169;
        }
        .requirement-item.invalid {
            color: #e53e3e;
        }
        .requirement-item.invalid i {
            color: #e53e3e;
        }

        /* Custom File Input Styling Fix */
        .custom-file-label {
            height: 50px;
            display: flex;
            align-items: center;
            padding-left: 15px;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
        }
        .custom-file-label::after {
            height: 100%;
            display: flex;
            align-items: center;
            padding: 0 15px;
            border-top-right-radius: 8px;
            border-bottom-right-radius: 8px;
            background-color: #f8f9fa;
            color: #4a5568;
            content: "Browse";
        }
        .custom-file-input:focus ~ .custom-file-label {
            border-color: #e91d8e;
            box-shadow: 0 0 0 3px rgba(233, 29, 142, 0.1);
        }

        /* Password Toggle */
        .password-toggle-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #718096;
            z-index: 10;
        }
        .password-toggle-icon:hover {
            color: #e91d8e;
        }
    </style>

    <div class="page-header register-page-header">
        <div class="container d-flex flex-column align-items-center">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('login') }}">Login</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Register</li>
                    </ol>
                </div>
            </nav>
            <h1>Create an Account</h1>
        </div>
    </div>

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-9">
                <div class="card register-card">
                    <div class="card-body">
                        <div class="text-center">
                            <h2 class="register-title">Register</h2>
                            <p class="register-subtitle">Create your account to get started</p>
                        </div>

                        <form method="POST" action="{{ route('register.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <label for="first_name" class="form-label-custom">
                                            First Name <span class="required-asterisk">*</span>
                                        </label>
                                        <input type="text"
                                               class="form-control form-control-custom @error('first_name') is-invalid @enderror"
                                               id="first_name"
                                               name="first_name"
                                               value="{{ old('first_name') }}"
                                               required
                                               autocomplete="given-name"
                                               placeholder="First Name"
                                               autofocus />
                                        @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <label for="last_name" class="form-label-custom">
                                            Last Name <span class="required-asterisk">*</span>
                                        </label>
                                        <input type="text"
                                               class="form-control form-control-custom @error('last_name') is-invalid @enderror"
                                               id="last_name"
                                               name="last_name"
                                               value="{{ old('last_name') }}"
                                               required
                                               placeholder="Last Name"
                                               autocomplete="family-name" />
                                        @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

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
                                       placeholder="Enter your email"
                                       autocomplete="email" />
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="image" class="form-label-custom">Profile Image (optional)</label>
                                <div class="custom-file">
                                    <input type="file"
                                           class="custom-file-input @error('image') is-invalid @enderror"
                                           id="image"
                                           name="image"
                                           accept="image/*">
                                    <label class="custom-file-label form-control-custom d-flex align-items-center" for="image" style="padding-top: 0; padding-bottom: 0;">Choose file...</label>
                                </div>
                                @error('image')
                                    <span class="invalid-feedback d-block">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="password" class="form-label-custom">
                                    Password <span class="required-asterisk">*</span>
                                </label>
                                <div class="position-relative">
                                    <input type="password"
                                           class="form-control form-control-custom @error('password') is-invalid @enderror"
                                           id="password"
                                           name="password"
                                           required
                                           placeholder="Create a password"
                                           autocomplete="new-password"
                                           style="padding-right: 40px;" />
                                    <span class="password-toggle-icon" onclick="togglePasswordVisibility('password', this)">
                                        <i class="fas fa-eye"></i>
                                    </span>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <div class="password-requirements">
                                    <p class="mb-2 font-weight-bold" style="font-size: 13px; color: #4a5568;">Password Requirements:</p>
                                    <div class="requirement-item" id="req-length">
                                        <i class="fas fa-circle"></i> At least 8 characters
                                    </div>
                                    <div class="requirement-item" id="req-upper">
                                        <i class="fas fa-circle"></i> At least one uppercase letter (A-Z)
                                    </div>
                                    <div class="requirement-item" id="req-lower">
                                        <i class="fas fa-circle"></i> At least one lowercase letter (a-z)
                                    </div>
                                    <div class="requirement-item" id="req-number">
                                        <i class="fas fa-circle"></i> At least one number (0-9)
                                    </div>
                                    <div class="requirement-item" id="req-special">
                                        <i class="fas fa-circle"></i> At least one special character (!@#$%^&*)
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label for="password-confirm" class="form-label-custom">
                                    Confirm Password <span class="required-asterisk">*</span>
                                </label>
                                <div class="position-relative">
                                    <input type="password"
                                           class="form-control form-control-custom"
                                           id="password-confirm"
                                           name="password_confirmation"
                                           required
                                           placeholder="Confirm your password"
                                           autocomplete="new-password"
                                           style="padding-right: 40px;" />
                                    <span class="password-toggle-icon" onclick="togglePasswordVisibility('password-confirm', this)">
                                        <i class="fas fa-eye"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group mt-5">
                                <button type="submit" class="btn btn-custom-primary btn-block">
                                    Create Account
                                </button>
                            </div>

                            <div class="login-link-group">
                                <p class="mb-0">
                                    Already have an account?
                                    <a href="{{ route('login') }}" class="signin-link-custom">Sign In</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function togglePasswordVisibility(inputId, iconSpan) {
            const input = document.getElementById(inputId);
            const icon = iconSpan.querySelector('i');
            
            if (input.type === "password") {
                input.type = "text";
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = "password";
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            // File input label update
            var fileInput = document.getElementById('image');
            if(fileInput) {
                fileInput.addEventListener('change', function(e) {
                    var fileName = e.target.files[0] ? e.target.files[0].name : 'Choose file...';
                    var nextSibling = e.target.nextElementSibling;
                    nextSibling.innerText = fileName;
                });
            }

            // Password Validation Logic
            const passwordInput = document.getElementById('password');
            const reqLength = document.getElementById('req-length');
            const reqUpper = document.getElementById('req-upper');
            const reqLower = document.getElementById('req-lower');
            const reqNumber = document.getElementById('req-number');
            const reqSpecial = document.getElementById('req-special');

            function updateRequirement(element, isValid) {
                const icon = element.querySelector('i');
                if (isValid) {
                    element.classList.add('valid');
                    element.classList.remove('invalid');
                    icon.classList.remove('fa-circle', 'fa-times-circle');
                    icon.classList.add('fa-check-circle');
                } else {
                    element.classList.remove('valid');
                    // Only add invalid class if user has typed something
                    if(passwordInput.value.length > 0) {
                         element.classList.add('invalid');
                         icon.classList.remove('fa-circle', 'fa-check-circle');
                         icon.classList.add('fa-times-circle');
                    } else {
                        element.classList.remove('invalid');
                        icon.classList.remove('fa-check-circle', 'fa-times-circle');
                        icon.classList.add('fa-circle');
                    }
                }
            }

            if(passwordInput) {
                passwordInput.addEventListener('input', function() {
                    const value = this.value;

                    // Length Check
                    updateRequirement(reqLength, value.length >= 8);

                    // Uppercase Check
                    updateRequirement(reqUpper, /[A-Z]/.test(value));

                    // Lowercase Check
                    updateRequirement(reqLower, /[a-z]/.test(value));

                    // Number Check
                    updateRequirement(reqNumber, /[0-9]/.test(value));

                    // Special Character Check
                    updateRequirement(reqSpecial, /[!@#$%^&*(),.?":{}|<>]/.test(value));
                });
            }
        });
    </script>
    @endpush
@endsection
