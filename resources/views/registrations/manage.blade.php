<x-app title="Registrations | NEO 2022">

    <x-slot name="navbarAdmin"></x-slot>
    <x-slot name="sidebarAdmin"></x-slot>

    <div class="container p-5">
        <h3 class="mb-4 text-primary">Registration List</h3>

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
                        role="tab">Refund</button>
                </li>
            </ul>
        </div>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="to-pay" role="tabpanel" tabindex="0">
                @forelse ($pendingPayments as $registration)
                    <x-card-registration :registration='$registration' status='to-pay' />
                    <x-modal-registration-details :registration='$registration' :competitionSummaries='$competitionSummaries' />
                @empty
                    <div class="card card-custom">
                        <div class="text-center mb-4">
                            <img src="/storage/images/assets/empty-cart.png" alt="" width="20%">
                            <h4>No Registration Yet</h4>
                        </div>
                    </div>
                @endforelse
            </div>

            <div class="tab-pane fade" id="to-verify" role="tabpanel" tabindex="0">
                @forelse ($unverifiedRegistrations as $registration)
                    <x-card-registration :registration='$registration' status='to-verify' />
                    <x-modal-registration-details :registration='$registration' :competitionSummaries='$competitionSummaries' />

                    {{-- VERIFY MODAL --}}
                    <div class="modal fade" id="verify{{ $registration->id }}" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content border-0">
                                <div class="d-flex justify-content-between p-4 border-bottom ">
                                    <h4 class="m-auto ">Registration Details</h4>
                                    <i class="bi bi-x fa-2xl" role="button" data-bs-dismiss="modal"></i>
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
                            <img src="/storage/images/assets/empty-cart.png" alt="" width="20%">
                            <h4>No Registration Yet</h4>
                        </div>
                    </div>
                @endforelse
            </div>

            <div class="tab-pane fade" id="verified" role="tabpanel" tabindex="0">
                @forelse ($verifiedRegistrations as $registration)
                    <x-card-registration :registration='$registration' status='verified' />
                    <x-modal-registration-details :registration='$registration' :competitionSummaries='$competitionSummaries' />
                @empty
                    <div class="card card-custom">
                        <div class="text-center mb-4">
                            <img src="/storage/images/assets/empty-cart.png" alt="" width="20%">
                            <h4>No Registration Yet</h4>
                        </div>
                    </div>
                @endforelse
            </div>

            <div class="tab-pane fade" id="expired" role="tabpanel" tabindex="0">
                @forelse ($expiredRegistrations as $registration)
                    <x-card-registration :registration='$registration' status='expired' />
                    <x-modal-registration-details :registration='$registration' :competitionSummaries='$competitionSummaries' />
                @empty
                    <div class="card card-custom">
                        <div class="text-center mb-4">
                            <img src="/storage/images/assets/empty-cart.png" alt="" width="20%">
                            <h4>No Registration Yet</h4>
                        </div>
                    </div>
                @endforelse
            </div>

            <div class="tab-pane fade" id="refund" role="tabpanel" tabindex="0">
                <div class="card card-custom">
                    <div class="text-center mb-4">
                        <img src="/storage/images/assets/empty-cart.png" alt="" width="20%">
                        <h4>No Registration Yet</h4>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app>
