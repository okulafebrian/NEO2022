<x-app title="Send Password Reset Link | NEO 2022">
    <div class="container" style="height: 100vh; max-width: 40rem;">

        <div class="card card-custom shadow-custom rounded-0 m-auto h-100">
            <div class="card-body px-md-5 d-flex justify-content-center align-items-center">
                <div class="width-custom">
                    <div class="text-center mb-4">
                        <h3 class="text-primary text-center fw-semibold">{{ __('Reset Password') }}</h3>
                        <p class="text-purple-muted">
                            Enter the email associated with your account and we'll send you a link to reset your
                            password.
                        </p>
                    </div>

                    @if (session('status'))
                        <div class="alert alert-primary" role="alert">
                            <small>
                                {{ session('status') }}
                            </small>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>
                            <input id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary py-2 w-100">
                            {{ __('Send Password Reset Link') }}
                        </button>
                    </form>

                    <div class="mt-4 text-center">
                        <a class="text-decoration-none fw-semibold" href="{{ route('login') }}">
                            {{ __('Back to login') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app>
