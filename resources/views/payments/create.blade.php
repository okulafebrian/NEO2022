<x-user title="Confirm Payment - NEO 2022">

    <div class="alert alert-danger rounded-0 border-0 m-0">
        <div class="container-lg px-md-5">
            <div class="row">
                <div class="col-md-10 col-8">
                    <small class="d-none d-md-block">
                        Complete your payment before
                        <span class="fw-bold">{{ $registration->payment_due->format('d M, H:i') }} WIB</span>
                    </small>
                    <small class="d-md-none">
                        Complete your payment before <br>
                        <span class="fw-bold">{{ $registration->payment_due->format('d M, H:i') }} WIB</span>
                    </small>
                </div>
                <div class="col-md-2 col-4 mt-auto fw-bold text-end">
                    <small>
                        <i class="bi bi-clock me-1"></i>
                        <span id="countdown"></span>
                    </small>
                </div>
            </div>
        </div>
        <script>
            var time = "{{ $registration->payment_due }}"
            $('#countdown').countdown(time, function(event) {
                $(this).html(event.strftime('%H:%M:%S'))
            })
        </script>
    </div>

    <form method="POST" action="{{ route('payments.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="container-lg p-md-5 p-4">
            <div class="row g-md-5 g-4">
                <div class="col-lg-7">
                    <div class="mb-4">
                        <h3>Payment</h3>
                        <p class="bd-lead">Transfer your payment to the account below and upload the payment proof.</p>
                    </div>

                    <div class="card border-0 rounded-4 bg-light-grey mb-3">
                        <div class="card-body px-4">
                            <div class="row">
                                <div class="col">
                                    <p class="mb-1 text-muted">Destination Bank</p>
                                    <h5 class="m-0">BCA</h5>
                                </div>
                                <div class="col-md-2 col-4 m-auto text-end">
                                    <img src="/storage/images/assets/Logo_BCA.svg" alt="BNEC" width="100%">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card border-0 rounded-4 bg-light-grey mb-3">
                        <div class="card-body px-4">
                            <div class="row">
                                <div class="col">
                                    <p class="mb-1 text-muted">Vincent Febrien</p>
                                    <h5 class="m-0">4231 0087 33</h5>
                                </div>
                                <div class="col-5 m-auto text-end">
                                    <button type="button" class="btn btn-outline-secondary">
                                        Copy
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card border-0 rounded-4 bg-light-grey mb-3">
                        <div class="card-body px-4">
                            <div class="row">
                                <div class="col">
                                    <p class="mb-1 text-muted">Transfer Amount</p>
                                    <h5 class="m-0">Rp {{ number_format($totalPayment, 0, '.', '.') }}</h5>
                                </div>
                                <div class="col-6 m-auto text-end">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-toggle="offcanvas"
                                        data-bs-target="#paymentSummary">
                                        See Details
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- PAYMENT SUMMARY --}}
                    <div class="offcanvas offcanvas-start" tabindex="-1" id="paymentSummary">
                        <div class="offcanvas-header p-4">
                            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Payment Summary</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body px-4">
                            @foreach ($paymentSummaries as $paymentSummary)
                                <div class="row text-muted">
                                    <p class="col mb-1 text-truncate">
                                        {{ $paymentSummary->total }}x
                                        {{ $paymentSummary->name == 'Speech' ? $paymentSummary->name . ' ' . $paymentSummary->category : $paymentSummary->name }}
                                    </p>
                                    <p class="col-4 mb-1 text-end">
                                        Rp {{ number_format($paymentSummary->price, 0, '.', '.') }}
                                    </p>
                                </div>
                            @endforeach

                            <hr>

                            <div class="d-flex justify-content-between">
                                <h5>Total Price</h5>
                                <h5>Rp {{ number_format($totalPayment, 0, '.', '.') }}</h5>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- UPLOAD PAYMENT PROOF --}}
                <div class="col-lg-5">
                    <div class="card rounded-4">
                        <div class="card-body p-4">
                            <h4 class="mb-4">Upload Payment Proof</h4>

                            <input type="hidden" name="registration_id" value="{{ $registration->id }}">
                            <input type="hidden" name="payment_due" value="{{ $registration->payment_due }}">

                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="account_number" class="form-label">Payment Method <span
                                            style="color: red">*</span></label>
                                    <button type="button"
                                        class="btn btn-outline-light w-100 d-flex justify-content-between"
                                        data-bs-toggle="modal" data-bs-target="#paymentMethodModal">
                                        <p id="paymentProviderName" class="m-0">Select</p>
                                        <i class="bi bi-chevron-right"></i>
                                    </button>

                                    <input type="hidden" name="payment_type">
                                    <input type="hidden" name="provider_name">

                                    <small id="invalid-1" class="invalid-message">
                                        Please choose your payment method.
                                    </small>
                                </div>

                                <div class="col-12">
                                    <label for="account_number" class="form-label">Account Number <span
                                            style="color: red">*</span></label>
                                    <input type="text" class="form-control" id="account_number" name="account_number"
                                        required>
                                </div>

                                <div class="col-12">
                                    <label for="account_name" class="form-label">Account Holder Name <span
                                            style="color: red">*</span></label>
                                    <input type="text" class="form-control" id="account_name" name="account_name"
                                        required>
                                </div>

                                <div class="col-12">
                                    <label for="payment_proof" class="form-label">Payment Proof <span
                                            style="color: red">*</span></label>
                                    <input type="file" class="form-control" id="payment_proof"
                                        name="payment_proof" required>
                                </div>
                            </div>

                            <div class="col-12 d-none d-md-block mt-4">
                                <button id="submitPayment" class="btn btn-primary btn-lg w-100" type="submit">
                                    <i class="bi bi-shield-check me-2"></i>
                                    Compelete Payment
                                </button>
                            </div>
                        </div>

                        {{-- PAYMENT METHOD MODAL --}}
                        <div class="modal fade" id="paymentMethodModal" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content border-0 rounded-4 shadow-sm">
                                    <div class="modal-header px-4">
                                        <div>
                                            <h5 class="modal-title" id="exampleModalLabel">Payment Method</h5>
                                            <small id="invalid-2" class="invalid-message text-danger">
                                                Please choose your payment method.
                                            </small>
                                        </div>
                                        <button type="button" id="savePaymentMethod"
                                            class="btn btn-primary">Save</button>
                                    </div>
                                    <div class="modal-body p-4">
                                        <ul class="list-group">
                                            @foreach ($paymentProviders as $index => $paymentProvider)
                                                @if ($loop->first)
                                                    <h5>Bank Transfers</h5>
                                                @endif

                                                @if ($index == $bankCount)
                                                    <h5 class="mt-4">E-Wallets</h5>
                                                @endif

                                                <li class="list-group-item list-group-item-action border-0 rounded-3">
                                                    <div class="row">
                                                        @if ($paymentProvider->name != 'Other')
                                                            <div class="col-12">
                                                                <input class="form-check-input me-1" type="radio"
                                                                    id="provider{{ $paymentProvider->id }}"
                                                                    name="provider_list"
                                                                    value="{{ $paymentProvider->type }} {{ $paymentProvider->name }}">
                                                                <label class="form-check-label stretched-link"
                                                                    for="provider{{ $paymentProvider->id }}">{{ $paymentProvider->name }}</label>
                                                            </div>
                                                        @else
                                                            <div class="col-1 my-auto">
                                                                <input class="form-check-input me-1" type="radio"
                                                                    id="provider{{ $paymentProvider->id }}"
                                                                    name="provider_list"
                                                                    value="{{ $paymentProvider->type }} {{ $paymentProvider->name }}">
                                                            </div>
                                                            <div class="col-11 ps-md-0">
                                                                <input type="text"
                                                                    id="other{{ $paymentProvider->type }}Provider"
                                                                    class="form-control form-control-sm"
                                                                    placeholder="Other {{ $paymentProvider->type }}" />
                                                            </div>
                                                        @endif
                                                    </div>

                                                    @if ($paymentProvider->type == 'BANK' && $paymentProvider->name == 'Other')
                                                        <small id="invalid-3" class="invalid-message mt-1">
                                                            Please fill out the bank name.
                                                        </small>
                                                    @elseif($paymentProvider->type == 'EWALLET' && $paymentProvider->name == 'Other')
                                                        <small id="invalid-4" class="invalid-message mt-1">
                                                            Please fill out the e-wallet name.
                                                        </small>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card d-block d-sm-none border-0 rounded-0 shadow-sm sticky-bottom">
            <div class="card-body">
                <button id="submitPayment" class="btn btn-primary btn-lg w-100" type="submit">
                    <i class="bi bi-shield-check me-2"></i>
                    Compelete Payment
                </button>
            </div>
        </div>
    </form>
</x-user>
