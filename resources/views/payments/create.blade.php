<x-user title="Confirm Payment - NEO 2022">
    <div class="alert alert-danger rounded-0" role="alert">
        <div class="container px-md-5 px-4">
            {{-- <p>Complete your payment before {{ date('j F, H:m', strtotime($registration_detail->payment_due)) }}</p> --}}
            <p class="m-0">Complete your payment before</p>
        </div>
    </div>

    <form method="POST" action="{{ route('registrations.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="container py-4 px-md-5 px-4">
            <div class="page-header">
                <h2>Payment</h2>
                <p class="bd-lead">Transfer your payment to the account below and upload the payment proof.</p>
            </div>

            <div class="row">
                <div class="col-md-7 mb-md-0 mb-4">
                    <div class="card shadow-sm border-1 rounded-4">
                        <div class="card-body p-4">
                            <div class="row mb-4">
                                <div class="col my-auto">
                                    <h6 class="m-0">Bank Central Asia (BCA)</h6>
                                </div>
                                <div class="col-md-2 col-3">
                                    <img src="/storage/images/assets/Logo_BCA.png" alt="BCA" width="90%">
                                </div>
                            </div>
                            <div class="row m-0 mb-4 px-2 py-3 border rounded-4">
                                <div class="col">
                                    <p class="mb-1">Vincent Febrien</p>
                                    <h5 class="m-0">4231 0087 33</h5>
                                </div>
                                <div class="col-md-2 my-auto mt-md-0 mt-3">
                                    <button type="button" class="btn btn-primary w-100">Copy</button>
                                </div>
                            </div>
                            <div class="row m-0 mb-4 px-2 py-3 border rounded-4">
                                <div class="col">
                                    <p class="mb-1">Transfer Amount</p>
                                    <h5 class="m-0">Rp 850.000</h5>
                                </div>
                                <div class="col-md-3 my-auto mt-md-0 mt-3">
                                    <button type="button" class="btn btn-primary w-100">See Details</button>
                                </div>
                            </div>
                            <hr>
                            <h4 class="mb-3">Payment Instructions</h4>
                            <div class="d-flex">
                                <i class="bi bi-1-circle me-2"></i>
                                <p>Make payment according to the amount above and wait until your payment is verified by
                                    the
                                    committee.</p>
                            </div>
                            <div class="d-flex">
                                <i class="bi bi-2-circle me-2"></i>
                                <p>For verification time is 1 x 24 hours.</p>
                            </div>
                            <div class="d-flex">
                                <i class="bi bi-3-circle me-2"></i>
                                <p>Make sure your payment is successful and upload payment proof including account
                                    holder
                                    information.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card shadow-sm rounded-4 ">
                        <div class="card-body p-4">
                            <h4 class="mb-4">Upload Payment Proof</h4>
                            <div class="mb-3">
                                <label for="account_number" class="form-label">Domicile
                                    Account number <span style="color: red">*</span></label>
                                <input type="text" class="form-control" id="account_number" name="account_number"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="account_name" class="form-label">Account holder name <span
                                        style="color: red">*</span></label>
                                <input type="text" class="form-control" id="account_name" name="account_name"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="payment_proof" class="form-label">Payment proof <span
                                        style="color: red">*</span></label>
                                <input class="form-control" type="file" id="payment_proof" name="payment_proof">
                            </div>
                            <div class="d-none d-lg-block mt-4">
                                <button class="btn btn-dark btn-lg w-100" type="submit">
                                    <i class="bi bi-shield-check me-3"></i>
                                    Compelete Payment
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex d-sm-none p-3 mt-2 border-top">
            <button class="btn btn-dark btn-lg w-100" type="submit">
                <i class="bi bi-shield-check me-3"></i>
                Compelete Payment
            </button>
        </div>
    </form>
</x-user>
