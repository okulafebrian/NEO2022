@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password</title>
</head>
<body>
    @section('content')
<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100" style="margin-top: 100px">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card shadow-2-strong" style="border-radius: 1rem;">
                <div class="card-body p-5 align-items-center">
                    <h3 class="text-center fw-bold">Forgot Password?</h3>
                    <h6 class="text-muted text-center">No worries, we'll send you reset instructions</h6>
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="form-outline mb-4 mt-4">
                        <label for="email" class="col-md-4 col-form-label text-md-start">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    
                    <button type="submit" class="btn btn-primary btn-lg btn-block" style="background-color: rgb(255, 132, 0); border: 0px; width: 100%;">
                                {{ __('Send Email') }}
                    </button>
                    
                    <div class="mt-4 text-center">
                        <a href="{{ route('login') }}" style="color: #393f81;">Back to login</a>
                    </div>
                    
                </form>
                </div>
            </div>
        </div>
            
                

                
                    
                
          
        
    </div>
</div>
@endsection
</body>
</html>


