<x-app title="Manage Registrations | NEO 2022">

    <x-slot name="navbarAdmin"></x-slot>
    <x-slot name="sidebarAdmin"></x-slot>

    <div class="container p-5">
        <h4 class="mb-4 fw-semibold text-primary">Registration List</h4>

        <div class="card card-custom p-0 px-4 mb-3">
            <ul class="nav nav-tabs border-0" id="registrationTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#to-pay" type="button"
                        role="tab">
                        To pay
                        {{ count($pendingPayments) > 0 ? '(' . count($pendingPayments) . ')' : '' }}
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#to-verify" type="button"
                        role="tab">
                        To verify
                        {{ count($unverifiedRegistrations) > 0 ? '(' . count($unverifiedRegistrations) . ')' : '' }}
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#verified" type="button"
                        role="tab">Verified</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#expired" type="button"
                        role="tab">Expired</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#refund" type="button"
                        role="tab">
                        Refund
                        {{ $newRefund > 0 ? '(' . $newRefund . ')' : '' }}
                    </button>
                </li>
            </ul>
        </div>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="to-pay" role="tabpanel" tabindex="0">
                @forelse ($pendingPayments as $registration)
                    <x-modal-confirmation action="destroy" title="Remove Registration" name="registrations" :model='$registration'>
                        Are you sure want to remove REG ID – {{ str_pad($registration->id, 3, '0', STR_PAD_LEFT) }}?
                    </x-modal-confirmation>
                    <x-card-registration :registration='$registration' status='to-pay' />
                    <x-modal-registration-details status='to-pay' :registration='$registration' :competitionSummaries='$competitionSummaries' />
                @empty
                    <div class="card card-custom">
                        <div class="text-center mb-4">
                            <img src="/storage/images/assets/empty.webp" alt="No Registration Yet" width="20%">
                            <h5 class="fw-semibold">No Registration Yet</h5>
                        </div>
                    </div>
                @endforelse
            </div>

            <div class="tab-pane fade" id="to-verify" role="tabpanel" tabindex="0">
                @forelse ($unverifiedRegistrations as $registration)
                    <x-modal-confirmation action="destroy" title="Remove Registration" name="registrations" :model='$registration'>
                        Are you sure want to remove REG ID – {{ str_pad($registration->id, 3, '0', STR_PAD_LEFT) }}?
                    </x-modal-confirmation>
                    <x-card-registration :registration='$registration' status='to-verify' />
                    <x-modal-registration-details status='to-verify' :registration='$registration' :competitionSummaries='$competitionSummaries' />

                    {{-- VERIFY MODAL --}}
                    <div class="modal fade" id="verifyPayment{{ $registration->id }}" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content border-0">
                                <div class="d-flex justify-content-between align-items-center p-4 border-bottom">
                                    <h5 class="m-auto">Payment Verification</h5>
                                    <i class="fa-solid fa-xmark fa-xl" role="button" data-bs-dismiss="modal"></i>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <img src="/storage/images/payment_proofs/{{ $registration->payment->proof }}"
                                                alt="{{ $registration->payment->proof }}" width="100%">
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <small class="text-muted">Payment Method</small>
                                                <h6>{{ $registration->payment->method }}</h6>
                                            </div>
                                            <div class="mb-3">
                                                <small class="text-muted">Account Number</small>
                                                <h6>{{ $registration->payment->account_number }}</h6>
                                            </div>
                                            <div class="mb-3">
                                                <small class="text-muted">Account Holder Name</small>
                                                <h6>{{ $registration->payment->account_name }}</h6>
                                            </div>
                                            <div class="mb-4">
                                                <small class="text-muted">Payment Amount</small>
                                                <h6>
                                                    Rp {{ number_format($registration->payment->amount, 0, '.', '.') }}
                                                </h6>
                                            </div>

                                            <hr style="border-style: dashed">

                                            <div class="d-flex gap-2">
                                                <form action="{{ route('payments.reject', $registration->payment) }}"
                                                    method="POST" class="w-50">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-outline-primary w-100"
                                                        type="submit">Reject</button>
                                                </form>

                                                <form action="{{ route('payments.accept', $registration->payment) }}"
                                                    method="POST" class="w-50">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-primary w-100"
                                                        type="submit">Accept</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="card card-custom">
                        <div class="text-center mb-4">
                            <img src="/storage/images/assets/empty.webp" alt="No Registration Yet" width="20%">
                            <h5 class="fw-semibold">No Registration Yet</h5>
                        </div>
                    </div>
                @endforelse
            </div>

            <div class="tab-pane fade" id="verified" role="tabpanel" tabindex="0">
                @forelse ($verifiedRegistrations as $registration)
                    <x-modal-confirmation action="destroy" title="Remove Registration" name="registrations" :model='$registration'>
                        Are you sure want to remove REG ID – {{ str_pad($registration->id, 3, '0', STR_PAD_LEFT) }}?
                    </x-modal-confirmation>
                    <x-modal-confirmation action="resend-invoice" title="Resend Invoice" name="payments" :model='$registration->payment'>
                        The invoice will be sent to {{ $registration->user->email }}
                    </x-modal-confirmation>
                    <x-card-registration :registration='$registration' status='verified' />
                    <x-modal-registration-details status='verified' :registration='$registration' :competitionSummaries='$competitionSummaries' />
                @empty
                    <div class="card card-custom">
                        <div class="text-center mb-4">
                            <img src="/storage/images/assets/empty.webp" alt="No Registration Yet" width="20%">
                            <h5 class="fw-semibold">No Registration Yet</h5>
                        </div>
                    </div>
                @endforelse
            </div>

            <div class="tab-pane fade" id="expired" role="tabpanel" tabindex="0">
                @forelse ($expiredRegistrations as $registration)
                    <x-modal-confirmation action="destroy" title="Remove Registration" name="registrations" :model='$registration'>
                        Are you sure want to remove REG ID – {{ str_pad($registration->id, 3, '0', STR_PAD_LEFT) }}?
                    </x-modal-confirmation>
                    <x-card-registration :registration='$registration' status='expired' />
                    <x-modal-registration-details status='expired' :registration='$registration' :competitionSummaries='$competitionSummaries' />
                @empty
                    <div class="card card-custom">
                        <div class="text-center mb-4">
                            <img src="/storage/images/assets/empty.webp" alt="No Registration Yet" width="20%">
                            <h5 class="fw-semibold">No Registration Yet</h5>
                        </div>
                    </div>
                @endforelse
            </div>

            <div class="tab-pane fade" id="refund" role="tabpanel" tabindex="0">
                @forelse ($refunds as $refund)
                    <x-card-registration :refund='$refund' status='refund' />
                    <x-modal-registration-details status='refund' :registration='$refund->registration' :competitionSummaries='$competitionSummaries' />

                    @if (!$refund->deleted_at)
                        {{-- VERIFY MODAL --}}
                        <div class="modal fade" id="verifyRefund{{ $refund->id }}" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content border-0">
                                    <div class="d-flex justify-content-between align-items-center p-4 border-bottom">
                                        <h5 class="m-auto">Refund Request Details</h5>
                                        <i class="fa-solid fa-xmark fa-xl" role="button"
                                            data-bs-dismiss="modal"></i>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <img src="/storage/images/refund_proofs/{{ $registration->refund->payment_proof }}"
                                                    alt="{{ $registration->refund->payment_proof }}" width="100%">
                                            </div>
                                            <div class="col">
                                                <div class="mb-3">
                                                    <small class="text-muted">Payment Method</small>
                                                    <h6>{{ $registration->refund->payment_method }}</h6>
                                                </div>
                                                <div class="mb-3">
                                                    <small class="text-muted">Account Number</small>
                                                    <h6>{{ $registration->refund->account_number }}</h6>
                                                </div>
                                                <div class="mb-3">
                                                    <small class="text-muted">Account Holder Name</small>
                                                    <h6>{{ $registration->refund->account_name }}</h6>
                                                </div>
                                                <div class="mb-4">
                                                    <small class="text-muted">Payment Amount</small>
                                                    <h6>
                                                        Rp
                                                        {{ number_format($registration->refund->payment_amount, 0, '.', '.') }}
                                                    </h6>
                                                </div>

                                                <hr style="border-style: dashed">

                                                <div class="d-flex gap-2">
                                                    <div class="col">
                                                        <form
                                                            action="{{ route('refunds.reject', $registration->refund) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit"
                                                                class="btn btn-outline-primary w-100 py-2"
                                                                type="submit">Reject</button>
                                                        </form>
                                                    </div>
                                                    <div class="col">
                                                        <button type="submit" class="btn btn-primary w-100 py-2"
                                                            type="submit"
                                                            data-bs-target="#confirmRefund{{ $registration->refund->id }}"
                                                            data-bs-toggle="modal">Accept</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="confirmRefund{{ $refund->id }}" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content border-0">
                                    <div class="modal-header d-flex justify-content-start">
                                        <a type="button" class="text-dark px-2"
                                            data-bs-target="#verifyRefund{{ $registration->refund->id }}"
                                            data-bs-toggle="modal">
                                            <i class="fa-solid fa-chevron-left"></i>
                                        </a>
                                        <h5 class="modal-title ms-2">
                                            Refund Confirmation
                                        </h5>
                                    </div>
                                    <div class="modal-body">
                                        <h6>Transfer <span class="fw-semibold text-primary">Rp
                                                {{ number_format($registration->refund->payment_amount, 0, '.', '.') }}</span>
                                            to the account below:</h6>
                                        <div class="alert alert-purple-200 border-0 py-2">
                                            <p class="mb-1 text-muted">{{ $registration->refund->dest_account_name }}
                                            </p>
                                            <p class="m-0">{{ $registration->refund->bank_name }}
                                                {{ $registration->refund->dest_account_number }}</p>
                                        </div>

                                        <form action="{{ route('refunds.accept', $registration->refund) }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-4">
                                                <label class="form-label">Upload Refund Transfer Proof</label>
                                                <input class="form-control" type="file" name="proof" required>
                                            </div>
                                            <div class="text-end">
                                                <button type="button" class="btn btn-outline-light py-2 px-5"
                                                    data-bs-target="#verifyRefund{{ $registration->refund->id }}"
                                                    data-bs-toggle="modal">
                                                    Cancel
                                                </button>
                                                @method('PUT')
                                                <button type="submit"
                                                    class="btn btn-primary py-2 px-5">Confirm</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @empty
                    <div class="card card-custom">
                        <div class="text-center mb-4">
                            <img src="/storage/images/assets/empty.webp" alt="No Refund Yet" width="20%">
                            <h5 class="fw-semibold">No Refund Yet</h5>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>

    </div>
</x-app>
