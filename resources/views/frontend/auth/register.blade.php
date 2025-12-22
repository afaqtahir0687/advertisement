@extends('frontend.layouts.master')
@section('content')
    <div class="page-header">
        <div class="container d-flex flex-column align-items-center">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('messages.home') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('login') }}">{{ __('messages.login') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ __('messages.register') }}
                        </li>
                    </ol>
                </div>
            </nav>
            <h1>{{ __('messages.create_account') }}</h1>
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
                            <h2 class="title text-center mb-3">{{ __('messages.register') }}</h2>
                            <p class="text-center">{{ __('messages.create_account_intro') }}</p>
                        </div>

                        <form method="POST" action="{{ route('register.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">
                                    {{ __('messages.full_name') }}
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
                                    {{ __('messages.email_address') }}
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
                                    {{ __('messages.password') }}
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
                                    {{ __('messages.confirm_password') }}
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
                                    {{ __('messages.create_account') }}
                                </button>
                            </div>

                            <div class="text-center mt-3">
                                <p class="mb-0">
                                    {{ __('messages.already_have_account') }} 
                                    <a href="{{ route('login') }}" class="text-primary font-weight-bold">{{ __('messages.sign_in') }}</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
