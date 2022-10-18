<x-app title="Edit Payment Proof | NEO 2022">

    <x-slot name="navbarUser"></x-slot>

    <div class="container-lg my-5" style="max-width: 50rem">
        <h3 class="text-center mb-4">Edit Payment Proof</h3>

        <form method="POST" action="{{ route('payments.update', $payment) }}" enctype="multipart/form-data">
            @csrf
            <div class="card card-custom mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <img src="/storage/images/payment_proofs/{{ $payment->payment_proof }}" alt="NEO"
                                width="100%">
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label">Account Number</label>
                                <input type="text" class="form-control" name="account_number"
                                    value="{{ $payment->account_number }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Account Holder Name</label>
                                <input type="text" class="form-control" name="account_name"
                                    value="{{ $payment->account_name }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Payment Proof</label>
                                <input id="payment_proof" class="form-control" type="file" name="payment_proof"
                                    value="{{ $payment->payment_proof }}" required>
                            </div>
                            @error('payment_proof')
                                <div class="invalid-feedback">
                                    Maximum payment proof file size is 1 MB.
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-end">
                @method('PUT')
                <button type="submit" class="btn btn-primary px-5">Save Changes</button>
            </div>
        </form>
    </div>
</x-app>
