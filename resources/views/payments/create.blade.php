<x-app title="Payment | NEO 2022">

    <x-slot name="navbarUser"></x-slot>

    <div class="container" style="padding-top: 6rem; padding-bottom: 4rem;">
        <div class="text-center mb-4">
            <h4 class="text-primary text-primary fw-semibold">Payment</h4>
            <p class="text-purple-muted">Transfer your payment to the account below and upload the payment proof before
                <span class="fw-semibold">{{ date('j M, H:i', strtotime($registration->payment_due)) }}</span>.
            </p>
        </div>

        <div class="row g-4">
            <div class="col-lg">
                <div class="card card-custom">
                    <div class="card-body">
                        <div class="table-custom mb-3">
                            <div>
                                <p class="mb-1 text-muted">Destination Bank</p>
                                <h5 class="mb-0">BCA</h5>
                            </div>
                            <img src="/storage/images/assets/BCA.webp" alt="BCA" width="60" class="mt-auto">
                        </div>

                        <div class="table-custom mb-3">
                            <div>
                                <p class="mb-1 text-muted">Monica Audrey</p>
                                <h5 id="destAccountNumber" class="mb-0">689 106 5016</h5>
                            </div>
                            <button class="btn btn-outline-primary rounded-3 mt-auto" type="button" id="copy">
                                Copy
                            </button>
                        </div>

                        <div class="table-custom mb-3">
                            <div>
                                <p class="mb-1 text-muted">Transfer Amount</p>
                                <h5 class="mb-0 transfer-amount">
                                    Rp {{ number_format($payment_amount + 5, 0, '.', '.') }}
                                </h5>
                            </div>
                            <button type="button" class="btn btn-outline-primary rounded-3 mt-auto"
                                data-bs-toggle="collapse" data-bs-target="#paymentDetails">
                                Show Details
                            </button>
                        </div>

                        <div class="alert alert-warning border-0 py-2">
                            <small>
                                <i class="bi bi-exclamation-circle text-danger me-1"></i>
                                Please transfer the exact amount (including the last 3 digits)
                            </small>
                        </div>

                        <div class="collapse mt-3" id="paymentDetails">
                            <div class="card border-0 bg-light">
                                <div class="card-body">
                                    <table class="table table-borderless m-0 td-custom">
                                        <tbody>
                                            @foreach ($competitions as $competition)
                                                <tr style="font-size: 14px">
                                                    <td>
                                                        {{ $competition->registrations_count }}x
                                                        {{ $competition->name == 'Speech' ? $competition->name . ' ' . $competition->category : $competition->name }}
                                                    </td>
                                                    <td class="text-end">Rp
                                                        {{ number_format($competition->registrations_count * $competition->price, 0, '.', '.') }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <hr style="border-style: dashed">

                                    <div class="table-custom fs-sm">
                                        <h6>Total Payment</h6>
                                        <h6>Rp {{ number_format($payment_amount, 0, '.', '.') }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <form method="POST" action="{{ route('payments.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card card-custom">
                        <div class="card-body">
                            <div class="row g-2 mb-4">
                                <div class="col-md">
                                    <h5 class="m-0 fw-semibold">Confirm Your Payment</h5>
                                </div>
                                <div class="col text-md-end">
                                    <div class="badge bg-red-100 text-danger" style="width: 6rem">
                                        <i class="bi bi-clock me-1"></i>
                                        <span id="timer"></span>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="registration_id" value="{{ $registration->id }}">
                            <input type="hidden" name="payment_amount" value="{{ $payment_amount }}">
                            <input type="hidden" name="payment_due" value="{{ $registration->payment_due }}">

                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">Payment Method</label>
                                    <div>
                                        <button type="button" class="btn btn-outline-light w-100 rounded-2"
                                            data-bs-toggle="modal" data-bs-target="#paymentMethod">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span id="paymentMethodName" style="font-weight:400">
                                                    Select payment method
                                                </span>
                                                <i class="fa-solid fa-chevron-right"></i>
                                            </div>
                                        </button>
                                    </div>

                                    <input type="hidden" name="payment_method" value="{{ old('payment_method') }}"
                                        required>

                                    <div class="invalid-feedback">
                                        Please select the payment method you use.
                                    </div>
                                </div>

                                <script>
                                    var paymentMethod = $('input[name="payment_method"]').val()

                                    if (paymentMethod) $('#paymentMethodName').text(paymentMethod).css('color', 'black')
                                </script>

                                <x-modal-payment-method :paymentProviders='$paymentProviders'></x-modal-payment-method>

                                <div class="col-lg-6">
                                    <label class="form-label">Account Number</label>
                                    <input type="text" class="form-control" name="account_number"
                                        value="{{ old('account_number') }}" required>
                                </div>

                                <div class="col-lg-6">
                                    <label class="form-label">Account Holder Name</label>
                                    <input type="text" class="form-control" name="account_name"
                                        value="{{ old('account_name') }}" required>
                                </div>

                                <div class="col-12 payment-proof">
                                    <label class="form-label">Upload Payment Proof</label>
                                    <input type="file"
                                        class="form-control @error('payment_proof') is-invalid @enderror"
                                        name="payment_proof" value="{{ old('payment_proof') }}" required>
                                    <div class="form-text">
                                        Format: JPG, JPEG, PNG | Max: 1MB
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
                                <button type="submit" id="completePayment" class="btn btn-primary py-2 w-100">
                                    <i class="bi bi-shield-check me-2"></i>
                                    Compelete Payment
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
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

        $('#completePayment').on('click', function() {
            if (!$('input[name="payment_method"]').val()) {
                $('.invalid-feedback').show()
            }
        })
    </script>
</x-app>
