<x-app title="Sign Up | NEO 2022">
    <div class="container" style="height: 100vh; max-width: 40rem;">

        <div class="card card-custom shadow-custom rounded-0 m-auto h-100">
            <div class="card-body px-md-5 d-flex justify-content-center align-items-center">
                <div class="width-custom">
                    <div class="text-center mb-4">
                        <h3 class="text-primary text-center fw-semibold">{{ __('Sign Up') }}</h3>
                        <p class="text-purple-muted">
                            Let's create an account first before you register for the competition
                        </p>
                    </div>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('Name') }}</label>
                            <input id="name" type="text"
                                class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>
                            <input id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email">
                            <div class="form-text">We will send your registration confirmation to this email.</div>

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
                                autocomplete="password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary py-2 w-100">
                            {{ __('Sign up') }}
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
    </div>
</x-app>
