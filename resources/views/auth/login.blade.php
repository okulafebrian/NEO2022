@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    @section('content')
<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
            <div class="card" style="border-radius: 1rem;">
                <div class="row g-0">
                    <div class="col-md-6 col-lg-5 d-none d-md-block">
                      <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img1.webp"
                        alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                    </div>

                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="d-flex align-items-center mb-3 pb-1">
                                <h5 class="h1 fw-bold mb-0" style="letter-spacing: 1px;">Login</h5>
                            </div>
                            
                            <div class="form-outline mb-4">
                                <label for="email" class="col-md-4 col-form-label text-md-start">{{ __('Email Address') }}</label>
                                    <input id="email" type="email" placeholder="Input your registered email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                
                            </div>
    
                            <div class="form-outline mb-4">
                                <label for="password" class="col-md-4 col-form-label text-md-start">{{ __('Password') }}</label>
                                    <input id="password" type="password" placeholder="Input your password" class="form-control form-control-lg  @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
    
                            <div class="form-outline mb-4">
                                <div class="col-md-6 align-items-start-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
    
                            <div class="form-outline mb-4">
                                <div class="col-md-8 align-items-start-md-4">
                                    <button type="submit" class="btn btn-primary" style="background-color: orange; border:0px; width:150px">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div>

                            <hr>
                            @if (Route::has('password.request'))
                            <a class="medium text-muted" href="{{ route('password.request') }}" style="margin-left: auto; margin-right:auto">
                                {{ __('Forgot Your Password?') }}
                            </a>
                           
                            <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="{{ route('register') }}"
                                style="color: #393f81;">Register here</a></p>
                        @endif
                        </form>
                    </div>
                </div>
                



              
            </div>
            </div>

            
        </div>
    </div>
</div>
@endsection

</body>
</html>



