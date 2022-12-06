<x-app title="Refund | NEO 2022">

    <x-slot name="navbarUser"></x-slot>

    <div class="container" style="padding-top: 6rem; padding-bottom: 4rem;">
        <div class="text-center mb-4">
            <h4 class="text-primary fw-semibold">Refund</h4>
            <p class="text-purple-muted">
                Upload the proof of payment that has been transferred and fill in the details.
            </p>
        </div>

        <div class="row g-4">
            <div class="col">
                <div class="card card-custom">
                    <div class="card-body">
                        <h5>REG ID – {{ str_pad($registration->id, 3, '0', STR_PAD_LEFT) }}</h5>

                        <hr style="border-style:dashed">

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

                        <hr style="border-style:dashed">

                        <div class="table-custom">
                            <h5>Total Payment</h5>
                            <h5>Rp {{ number_format($payment_amount, 0, '.', '.') }}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <form method="POST" action="{{ route('refunds.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card card-custom">
                        <div class="card-body">

                            <input type="hidden" name="registration_id" value="{{ $registration->id }}">
                            <input type="hidden" name="payment_amount" value="{{ $payment_amount }}">

                            <h5 class="mb-4 fw-semibold">Confirm Your Transferred Payment</h5>

                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">Payment Method</label>
                                    <div>
                                        <button type="button" class="btn btn-outline-light w-100 rounded-2"
                                            data-bs-toggle="modal" data-bs-target="#paymentMethod">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span id="paymentMethodName" style="font-weight:400">
                                                    Select the payment method you used
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

                            <hr style="border-style:dashed">

                            <div class="mb-4">
                                <h5 class="mb-1 fw-semibold">Bank Account for Refund</h5>
                                <small class="text-muted">Fill in the details of the bank account that will be used to
                                    receive the refund</small>
                            </div>

                            <div class="row g-3">
                                <div class="col-lg-12">
                                    <label class="form-label">Bank Name</label>
                                    <input type="text" class="form-control" name="bank_name"
                                        value="{{ old('bank_name') }}" required>
                                </div>
                                <div class="col-lg-6">
                                    <label class="form-label">Account Number</label>
                                    <input type="text" class="form-control" name="dest_account_number"
                                        value="{{ old('dest_account_number') }}" required>
                                </div>

                                <div class="col-lg-6">
                                    <label class="form-label">Account Holder Name</label>
                                    <input type="text" class="form-control" name="dest_account_name"
                                        value="{{ old('dest_account_name') }}" required>
                                </div>
                            </div>

                            <div class="col-12 mt-4">
                                <button type="submit" id="requestRefund" class="btn btn-primary py-2 w-100">
                                    Request Refund
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $('#requestRefund').on('click', function() {
            if (!$('input[name="payment_method"]').val()) {
                $('.invalid-feedback').show()
            }
        })
    </script>
</x-app>
