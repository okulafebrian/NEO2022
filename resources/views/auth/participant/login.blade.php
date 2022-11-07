<x-app title="NEO 2022">
    <div class="container" style="max-width: 28rem">
        <div class="card border-0 bg-transparent mt-5">
            <div class="text-center">
                <a href="{{ route('home') }}">
                    <img src="/storage/images/assets/logo_neo_complete.png" alt="NEO" width="50%">
                </a>
                <h2 class="mt-3 text-primary">{{ __('Welcome Back, Contenders') }}</h3>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('participant.login-auth') }}">
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
                        <label for="password" class="form-label">{{ __('Password') }}</label>
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

                <div class="mt-4 text-center">
                    Not a participant?
                    <a class="text-decoration-none fw-semibold" href="{{ route('login') }}">
                        {{ __('Back to user login') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app>
