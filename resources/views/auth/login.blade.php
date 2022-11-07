<x-app title="NEO 2022">
    <div class="container" style="max-width: 28rem">
        <div class="card border-0 bg-transparent mt-5">
            <div class="text-center">
                <a href="{{ route('home') }}">
                    <img src="/storage/images/assets/logo_neo_complete.png" alt="NEO" width="50%">
                </a>
                <h2 class="mt-3 text-primary">{{ __('Sign in') }}</h3>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('Email Address') }}</label>
                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <div class="d-flex justify-content-between">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            @if (Route::has('password.request'))
                                <a class="text-decoration-none" href="{{ route('password.request') }}">
                                    {{ __('Forgot password?') }}
                                </a>
                            @endif
                        </div>
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        {{ __('Login') }}
                    </button>
                </form>

                <div class="mt-4">
                    <a class="btn btn-outline-primary w-100" href="{{ route('participant.login') }}">
                        {{ __('Login as participant') }}
                    </a>
                </div>

                <div class="mt-4 text-center">
                    Don't have an account?
                    <a class="text-decoration-none fw-semibold" href="{{ route('register') }}">
                        {{ __('Sign up first') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app>
