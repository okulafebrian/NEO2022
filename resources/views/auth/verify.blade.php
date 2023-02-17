<x-app title="Email Verification | NEO 2022">
    <div class="container" style="height: 100vh; max-width: 40rem;">

        <div class="card card-custom rounded-0 m-auto h-100">
            <div class="card-body px-md-5 d-flex justify-content-center align-items-center">
                <div class="width-custom text-center">
                    <img src="/storage/images/assets/email.webp" class="img-size mb-3" alt="Email">

                    <h4 class="text-primary text-center fw-semibold">{{ __('Verify Your Email Address') }}</h4>

                    @if (session('resent'))
                        <div class="alert alert-primary" role="alert">
                            <small>
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </small>
                        </div>
                    @endif

                    <p class="text-purple-muted">
                        Before proceeding, please check your email for a verification link. If you did not receive the
                        email, please click the button below to resend the email.
                    </p>

                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-outline-primary py-2">
                            {{ __('Resend Email Verification') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app>
