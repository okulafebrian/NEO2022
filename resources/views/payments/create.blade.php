<x-user title="Confirm Payment - NEO 2022">
    <div class="container py-4">
        <h3 class="mb-4">Payment Confirmation</h3>

        <div class="row">
            <div class="col">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h5 class="mb-3">Registration Summary</h5>
                        <ul class="list-group list-group-horizontal-xxl rounded-0 my-4">
                            @foreach ($registration_details as $key => $registration_detail)
                                <li class="list-group-item border-start-0 border-end-0">
                                    <div class="row">
                                        <div class="col-10">
                                            <p class="mb-0 fw-bold">{{ $registration_detail->name }}</p>
                                            <p class="mb-0 text-muted">{{ $registration_detail->total }} ticket(s)</p>
                                        </div>
                                        <div class="col mt-auto">
                                            <p class="mb-0">IDR {{ number_format($prices[$key], 0, '.', '.') }}</p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <div class="d-flex justify-content-between mx-3">
                            <h5>Total Payment</h5>
                            <h5 class="fw-bold">IDR {{ number_format($totalPayment, 0, '.', '.') }}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <form method="POST" action="{{ route('participants.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4">
                            <h5 class="mb-3">Choose Payment Method</h5>
                            <div class="mb-3">
                                <button class="btn btn-outline-primary w-100 d-flex justify-content-between"
                                    type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight">
                                    Select
                                    <i class="bi bi-chevron-right"></i>
                                </button>
                            </div>
                            <div class="mb-3">
                                <label for="account_number" class="form-label">Account Number</label>
                                <input type="text" class="form-control" id="account_number" name="account_number"
                                    required>
                            </div>
                            <div class="mb-4">
                                <label for="account_name" class="form-label">Account Holder Name
                                </label>
                                <input type="text" class="form-control" id="account_name" name="account_name"
                                    required>
                            </div>
                            <a id="submitPaymentMethod" type="button" class="btn btn-primary btn-lg w-100 fw-bold"
                                data-bs-toggle="modal" data-bs-target="#uploadPaymentModal"><i
                                    class="bi bi-shield-check"></i>
                                Pay</a>
                        </div>
                    </div>

                    <div class="offcanvas offcanvas-end p-2" tabindex="-1" id="offcanvasRight">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasRightLabel">Payment Methods</h5>
                            <button type="button" class="btn" data-bs-dismiss="offcanvas"><i
                                    class="bi bi-arrow-left fs-4"></i></button>
                        </div>
                        <div class="offcanvas-body">
                            <ul class="list-group list-group-flush">
                                @foreach ($paymentProviders as $paymentProvider)
                                    @if ($loop->first && $paymentProvider->type == 'BANK')
                                        <p class="fw-bold">Bank Transfers</p>
                                    @endif

                                    @if ($loop->remaining == $ewalletCount - 1 && $paymentProvider->type == 'EWALLET')
                                        <p class="fw-bold mt-4">E-Wallets</p>
                                    @endif

                                    <li
                                        class="list-group-item list-group-item-action rounded-0 border-start-0 border-end-0">
                                        @if (strtok($paymentProvider->name, ' ') == 'Other')
                                            <div class="form-check form-check-inline d-flex align-items-center">
                                                <input class="form-check-input me-2" type="radio" name="provider"
                                                    value="{{ $paymentProvider->id }}" id="{{ $paymentProvider->id }}"
                                                    required>
                                                <input class="form-control" type="text" name="provider"
                                                    value="" placeholder="{{ $paymentProvider->name }}">
                                            </div>
                                        @else
                                            <input class="form-check-input me-1" type="radio" name="provider"
                                                value="{{ $paymentProvider->id }}" id="{{ $paymentProvider->id }}">
                                            <label class="form-check-label stretched-link"
                                                for="{{ $paymentProvider->id }}">{{ $paymentProvider->name }}</label>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="modal fade" id="uploadPaymentModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content p-3">
                                <div class="modal-header border-0 pb-0 row">
                                    <h4 class="fw-bold">Complete Payment</h4>
                                    <p class="m-0">Transfer your registration payment to the account below</p>
                                </div>
                                <div class="modal-body">
                                    <div class="card">
                                        <div class="card-body m-2">
                                            <div class="mb-4">
                                                <p class="m-0">Destination Bank Account</p>
                                                <img src="/storage/images/assets/Logo_BCA.png" alt="BCA"
                                                    width="50">
                                            </div>
                                            <div class="mb-4 d-flex justify-content-between">
                                                <div>
                                                    <p class="m-0">Account Number</p>
                                                    <p class="m-0 fw-bold" id="destAccountNum">12345 67890</p>
                                                </div>
                                                <div>
                                                    <p class="m-0">Account Name</p>
                                                    <p class="m-0 fw-bold" id="destAccountNum">Vincent Febrien</p>
                                                </div>
                                            </div>
                                            <div class="pb-3 mb-3 border-bottom">
                                                <p class="m-0">Total Payment</p>
                                                <p class="m-0 fw-bold">IDR
                                                    {{ number_format($totalPayment, 0, '.', '.') }}</p>
                                            </div>
                                            <div class="mb-2">
                                                <label class="form-label">Upload Payment Proof <span
                                                        class="text-danger">*</span></label>
                                                <input class="form-control" type="file" name="paymentProof"
                                                    multiple required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer flex-nowrap border-0 pt-0">
                                    <button type="button" class="btn btn-outline-primary btn-lg w-50"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary btn-lg w-50">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-user>
