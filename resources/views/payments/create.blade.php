<x-app title="Payment | NEO 2022">

    <x-slot name="navbarUser"></x-slot>

    <div class="container-lg my-5">
        <div class="text-center mb-4">
            <h2>Payment</h2>
            <p class="text-muted">Transfer your payment to the account below and upload the payment proof.</p>
        </div>

        <div class="m-auto" style="max-width: 35rem">
            <div class="alert alert-danger" role="alert">
                <div class="d-flex justify-content-between">
                    <p class="m-0">
                        Complete your payment before
                        <b>{{ date('j M, H:i', strtotime($registration->payment_due)) }}</b>
                    </p>
                    <div id="timer"></div>
                </div>
            </div>

            <div class="card card-custom rounded-4 mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-end">
                        <div>
                            <p class="mb-1 text-muted">Destination Bank</p>
                            <h5 class="m-0">BCA</h5>
                        </div>
                        <img src="/storage/images/assets/Logo_BCA.svg" alt="BNEC" width="60">
                    </div>

                    <div class="d-flex justify-content-between align-items-end my-4">
                        <div>
                            <p class="mb-1 text-muted">Vincent Febrien</p>
                            <h5 id="destAccountNumber" class="m-0">4231 0087 33</h5>
                        </div>
                        <button type="button" id="copy" class="btn btn-outline-primary rounded-3">
                            Copy
                        </button>
                    </div>

                    <div class="d-flex justify-content-between align-items-end">
                        <div>
                            <p class="mb-1 text-muted">Transfer Amount</p>
                            <h5 class="m-0">
                                Rp {{ number_format($payment_amount, 0, '.', '.') }}
                            </h5>
                        </div>
                        <button type="button" class="btn btn-outline-primary rounded-3" data-bs-toggle="collapse"
                            data-bs-target="#paymentDetails">
                            See Details
                        </button>
                    </div>
                    <div class="collapse mt-3" id="paymentDetails">
                        <div class="card card-body">
                            <div class="mb-3 border-bottom">
                                @foreach ($competitions as $competition)
                                    <div class="row g-0 text-muted">
                                        <div class="col">
                                            <p>
                                                {{ $competition->registrations_count }}x
                                                {{ $competition->name == 'Speech' ? $competition->name . ' ' . $competition->category : $competition->name }}
                                            </p>
                                        </div>
                                        <div class="col-5 text-end">
                                            <p>Rp
                                                {{ number_format($competition->registrations_count * $competition->price, 0, '.', '.') }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="d-flex justify-content-between">
                                <h5>Total Payment</h5>
                                <h5 class="m-0">
                                    Rp {{ number_format($payment_amount, 0, '.', '.') }}
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <form method="POST" action="{{ route('payments.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card card-custom rounded-4">
                    <div class="card-body">
                        <h4 class="mb-4">Upload Payment Proof</h4>

                        <input type="hidden" name="registration_id" value="{{ $registration->id }}">
                        <input type="hidden" name="payment_amount" value="{{ $payment_amount }}">

                        <div class="row g-3">
                            <div class="col-12 payment-method">
                                <label class="form-label">Payment Method</label>
                                <button type="button"
                                    class="btn btn-outline-light w-100 d-flex justify-content-between"
                                    data-bs-toggle="modal" data-bs-target="#paymentMethodModal">
                                    <span id="paymentMethodName">Select the payment method you use</span>
                                    <i class="bi bi-chevron-right"></i>
                                </button>
                                <input type="hidden" name="payment_method"
                                    class="@error('payment_method') is-invalid @enderror"
                                    value="{{ old('payment_method') }}" required>

                                @error('payment_method')
                                    <div class="invalid-feedback">
                                        Please select the payment method you use.
                                    </div>
                                @enderror
                            </div>

                            <script>
                                var paymentMethod = $('input[name="payment_method"]').val()

                                if (paymentMethod) {
                                    $('#paymentMethodName').text(paymentMethod)
                                }
                            </script>

                            {{-- PAYMENT METHOD MODAL --}}
                            <div class="modal fade" id="paymentMethodModal" tabindex="-1">
                                <div class="modal-dialog modal-dialog-scrollable">
                                    <div class="modal-content border-0">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Select Payment</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <ul class="list-group list-group-flush">
                                                @foreach ($paymentProviders as $index => $paymentProvider)
                                                    @if ($loop->first)
                                                        <h6>Bank Transfers</h6>
                                                    @endif

                                                    @if ($index == $bankCount)
                                                        <h6 class="mt-4">E-Wallets</h6>
                                                    @endif

                                                    <li
                                                        class="list-group-item list-group-item-action d-flex justify-content-between">
                                                        <div>
                                                            <input class="form-check-input btn-check me-1"
                                                                type="radio" id="provider{{ $paymentProvider->id }}"
                                                                value="{{ $paymentProvider->type }} {{ $paymentProvider->name }}"
                                                                @if ($paymentProvider->name == 'Other' && $paymentProvider->type == 'BANK') data-bs-target="#otherBankModal" data-bs-toggle="modal"
                                                                @elseif ($paymentProvider->name == 'Other' && $paymentProvider->type == 'EWALLET')
                                                                data-bs-target="#otherEwalletModal" data-bs-toggle="modal" @endif>
                                                            <label class="form-check-label stretched-link"
                                                                for="provider{{ $paymentProvider->id }}">{{ $paymentProvider->name }}</label>
                                                        </div>
                                                        <div><i class="bi bi-chevron-right"></i></div>
                                                    </li>

                                                    <script>
                                                        $(document).on('click', 'input[id="provider{{ $paymentProvider->id }}"]', function() {
                                                            if (!$(this).val().includes("Other")) {
                                                                $('#paymentMethodName').text($(this).val())
                                                                $('input[name="payment_method"]').val($(this).val())
                                                                $('.payment-method button').css('color', 'black')
                                                            }
                                                            $('#paymentMethodModal').modal('toggle')
                                                        })
                                                    </script>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- END - PAYMENT METHOD MODAL --}}

                            {{-- OTHER PAYMENT METHOD MODAL --}}
                            <div class="modal fade" id="otherBankModal" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header d-flex justify-content-start">
                                            <a type="button" class="btn btn-light" data-bs-target="#paymentMethodModal"
                                                data-bs-toggle="modal">
                                                <i class="bi bi-chevron-left"></i>
                                            </a>
                                            <h5 class="modal-title ms-2">
                                                Fill in Bank Name
                                            </h5>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="form-label">Bank Name</label>
                                                <input type="text" class="form-control">
                                                <div class="invalid-feedback">
                                                    Please input your bank provider name.
                                                </div>
                                            </div>
                                            <div class="text-end">
                                                <button type="button" class="btn btn-primary">Confirm</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="otherEwalletModal" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header d-flex justify-content-start">
                                            <a type="button" class="btn btn-light"
                                                data-bs-target="#paymentMethodModal" data-bs-toggle="modal">
                                                <i class="bi bi-chevron-left"></i>
                                            </a>
                                            <h5 class="modal-title ms-2">
                                                Fill in E-Wallet Name
                                            </h5>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="form-label">E-Wallet Name</label>
                                                <input type="text" class="form-control">
                                                <div class="invalid-feedback">
                                                    Please input your e-wallet provider name.
                                                </div>
                                            </div>
                                            <div class="text-end">
                                                <button type="button" class="btn btn-primary">Confirm</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <script>
                                $(document).on('click', '#otherBankModal button', function() {
                                    if (!$('#otherBankModal input').val()) {
                                        $('#otherBankModal .invalid-feedback').show()
                                    } else {
                                        var paymentMethod = "BANK " + $('#otherBankModal input').val()
                                        $('#paymentMethodName').text(paymentMethod)
                                        $('input[name="payment_method"]').val(paymentMethod)
                                        $('.payment-method button').css('color', 'black')
                                        $('#otherBankModal').modal('toggle')
                                    }
                                })

                                $(document).on('click', '#otherEwalletModal button', function() {
                                    if (!$('#otherEwalletModal input').val()) {
                                        $('#otherEwalletModal .invalid-feedback').show()
                                    } else {
                                        var paymentMethod = "BANK " + $('#otherEwalletModal input').val()
                                        $('#paymentMethodName').text(paymentMethod)
                                        $('input[name="payment_method"]').val(paymentMethod)
                                        $('.payment-method button').css('color', 'black')
                                        $('#otherEwalletModal').modal('toggle')
                                    }
                                })
                            </script>
                            {{-- END - OTHER PAYMENT METHOD MODAL --}}

                            <div class="col-md-6 col-12">
                                <label class="form-label">Account Number</label>
                                <input type="text" class="form-control" name="account_number"
                                    value="{{ old('account_number') }}" required>
                            </div>

                            <div class="col-md-6
                                    col-12">
                                <label class="form-label">Account Holder Name</label>
                                <input type="text" class="form-control" name="account_name"
                                    value="{{ old('account_name') }}" required>
                            </div>

                            <div class="col-12 payment-proof">
                                <label class="form-label">Payment Proof</label>
                                <input type="file"
                                    class="form-control @error('payment_proof') is-invalid @enderror"
                                    name="payment_proof" value="{{ old('payment_proof') }}" required>
                                <div class="form-text">
                                    Format: JPG,JPEG,PNG, Max: 1MB
                                </div>

                                @error('payment_proof')
                                    <div class="invalid-feedback">
                                        Maximum payment proof file size is 1 MB.
                                    </div>
                                    <script>
                                        $('.form-text').hide()
                                    </script>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 mt-4">
                            <button type="submit" id="completePayment" class="btn btn-primary btn-lg w-100">
                                <i class="bi bi-shield-check me-2"></i>
                                Compelete Payment
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        var timer, timeleft = {{ strtotime($registration->payment_due) - time() }}

        function time() {
            var hours = Math.floor(timeleft / 3600 % 3600)
            var minutes = Math.floor(timeleft / 60 % 60)
            var seconds = timeleft % 60

            if (timeleft >= 0) {
                $('#timer').text(
                    ("0" + hours).slice(-2) +
                    " : " +
                    ("0" + minutes).slice(-2) +
                    " : " +
                    ("0" + seconds).slice(-2)
                )
            } else {
                clearTimeout(timer)
                location.reload()
                return
            }

            timeleft--
            timer = setTimeout(time, 1000)
        }

        time()
    </script>
</x-app>
