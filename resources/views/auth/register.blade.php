@extends('layouts.app')

@section('content')
    <div class="container" style="max-width: 28rem">
        <div class="card border-0">
            <div class="text-center">
                <a href="{{ route('home') }}">
                    <img src="/storage/images/assets/logo_neo_complete.png" alt="NEO" width="50%">
                </a>
                <h2 class="mt-3 text-primary">{{ __('Create an account') }}</h3>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">{{ __('Name') }}</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('Email Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email">
                        <div class="form-text">We'll send information about your registration to this email</div>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        {{ __('Create account') }}
                    </button>
                </form>

                <div class="mt-4 text-center">
                    Already have an account?
                    <a class="text-decoration-none fw-semibold" href="{{ route('login') }}">
                        {{ __('Back to login') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
