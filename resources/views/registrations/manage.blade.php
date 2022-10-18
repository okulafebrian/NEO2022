<x-app title="Registrations | NEO 2022">

    <x-slot name="navbarAdmin"></x-slot>
    <x-slot name="sidebarAdmin"></x-slot>

    <div class="container p-5">
        <h3 class="mb-4">Registration List</h3>

        <div class="card card-custom p-0">
            <ul class="nav nav-tabs px-4 pt-2" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link-custom active" data-bs-toggle="tab" data-bs-target="#to-pay" type="button"
                        role="tab">To Pay</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link-custom" data-bs-toggle="tab" data-bs-target="#to-verify" type="button"
                        role="tab">To Verify</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link-custom" data-bs-toggle="tab" data-bs-target="#completed" type="button"
                        role="tab">Completed</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link-custom" data-bs-toggle="tab" data-bs-target="#expired" type="button"
                        role="tab">Expired</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link-custom" data-bs-toggle="tab" data-bs-target="#refund" type="button"
                        role="tab">Refund</button>
                </li>
            </ul>

            <div class="card-body px-4">
                <div class="tab-content" id="pills-tabContent">

                    <div class="tab-pane fade show active" id="to-pay" role="tabpanel" tabindex="0">
                        <div class="text-center mb-4">
                            <img src="/storage/images/assets/empty-cart.png" alt="" width="20%">
                            <h4>No Registration Yet</h4>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="to-verify" role="tabpanel" tabindex="0">
                        @forelse ($unverifiedRegistrations as $key => $registration)
                            <div class="card border-0 shadow-sm rounded-4 mb-4">
                                <div class="d-flex justify-content-between bg-light px-4 py-3"
                                    style="border-radius: 1rem 1rem 0 0;">
                                    <h6 class="m-0">{{ $registration->user->name }}</h6>
                                    {{-- <span class="badge bg-secondary">{{ $registration-> }}</span> --}}
                                </div>

                                <div class="card-body px-4">
                                    <div class="row">
                                        <div class="col-2">
                                            <p class="fw-bold fs-sm mb-1 text-muted">REG DATE</p>
                                            <p class="m-0">
                                                {{ date('j M, h:i', strtotime($registration->created_at)) }}
                                            </p>
                                        </div>
                                        <div class="col">
                                            <p class="fw-bold fs-sm mb-1 text-muted">COMPETITION
                                                ({{ $registration->competitions->count() }})
                                            </p>
                                            <p class="m-0">
                                                @foreach ($registration->competitions->unique() as $competition)
                                                    {{ $competition->name == 'Speech' ? $competition->name . ' ' . $competition->category_init : $competition->name }}
                                                    @if (!$loop->last)
                                                        <span class="text-muted mx-1">|</span>
                                                    @endif
                                                @endforeach
                                            </p>
                                        </div>
                                        <div class="col-2">
                                            <p class="fw-bold fs-sm mb-1 text-muted">TOTAL PAYMENT</p>
                                            <p class="m-0">Rp
                                                {{ number_format($registration->payment->payment_amount, 0, '.', '.') }}
                                            </p>
                                        </div>
                                        <div class="col-2 m-auto text-end">
                                            <button type="button" class="btn btn-primary"
                                                data-bs-target="#verify{{ $key }}"
                                                data-bs-toggle="modal">Verify</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- 
                            <x-modal-registration action='verify' :registration='$registration' :key='$key' :paymentSummaries='$paymentSummaries'
                                :totalPayment='$totalPayment' /> --}}
                        @empty
                            <div class="text-center mb-4">
                                <img src="/storage/images/assets/empty-cart.png" alt="" width="20%">
                                <h4>No Registration Yet</h4>
                            </div>
                        @endforelse
                    </div>

                    <div class="tab-pane fade" id="completed" role="tabpanel" tabindex="0">
                        @forelse ($verifiedRegistrations as $key => $verifiedRegistration)
                            <div class="card border-0 shadow-sm rounded-4 mb-4">
                                <div class="d-flex justify-content-between bg-light px-4 py-3"
                                    style="border-radius: 1rem 1rem 0 0;">
                                    <h6 class="m-0">{{ $verifiedRegistration->user->name }}</h6>
                                    {{-- <span class="badge bg-secondary">{{ $verifiedRegistration->offer->type }}</span> --}}
                                </div>

                                <div class="card-body px-4">
                                    <div class="row">
                                        <div class="col-2">
                                            <p class="fw-bold fs-sm mb-1 text-muted">REG DATE</p>
                                            <p class="m-0">
                                                {{ date('j M, h:i', strtotime($verifiedRegistration->created_at)) }}
                                            </p>
                                        </div>
                                        <div class="col">
                                            <p class="fw-bold fs-sm mb-1 text-muted">COMPETITION
                                                ({{ $verifiedRegistration->competitions->count() }})
                                            </p>
                                            <p class="m-0">
                                                @foreach ($verifiedRegistration->competitions->unique() as $competition)
                                                    {{ $competition->name == 'Speech' ? $competition->name . ' ' . $competition->category_init : $competition->name }}
                                                    @if (!$loop->last)
                                                        <span class="text-muted mx-1">|</span>
                                                    @endif
                                                @endforeach
                                            </p>
                                        </div>
                                        <div class="col-2">
                                            <p class="fw-bold fs-sm mb-1 text-muted">TOTAL PAYMENT</p>
                                            <p class="m-0">Rp
                                                {{ number_format($verifiedRegistration->payment->payment_amount, 0, '.', '.') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="border-top px-4 py-3">
                                    <button type="button" class="btn btn-outline-light">
                                        <i class="bi bi-file-earmark-arrow-down"></i>
                                        Download Invoice
                                    </button>
                                    <button type="button" class="btn btn-outline-light"
                                        data-bs-target="#admin-show{{ $key }}" data-bs-toggle="modal">
                                        <i class="bi bi-eye"></i>
                                        View Details
                                    </button>
                                    <button type="button" class="btn btn-primary float-end">Send Invoice</button>
                                </div>
                            </div>

                            {{-- <x-modal-registration action='admin-show' :registration='$verifiedRegistration' :key='$key'
                                :paymentSummaries='$paymentSummaries' :totalPayment='$totalPayment' /> --}}
                        @empty
                            <div class="text-center mb-4">
                                <img src="/storage/images/assets/empty-cart.png" alt="" width="20%">
                                <h4>No Registration Yet</h4>
                            </div>
                        @endforelse
                    </div>

                    <div class="tab-pane fade" id="expired" role="tabpanel" tabindex="0">
                        @forelse ($expiredRegistrations as $expiredRegistration)
                            <div class="col">
                                <div class="card border-0 shadow-sm rounded-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <p class="mb-1 text-muted">REG ID</p>
                                                <h5>{{ $expiredRegistration->id }}</h5>
                                            </div>
                                            <div class="col">
                                                <p class="mb-1 text-muted">Registrant</p>
                                                <h5>{{ explode(' ', trim($expiredRegistration->user->name))[0] }}
                                                </h5>
                                            </div>
                                            <div class="col">
                                                <p class="mb-1 text-muted">Offer Type</p>
                                                {{-- <h5>{{ $expiredRegistration->offer->type }}</h5> --}}
                                            </div>
                                            <div class="col">
                                                <p class="mb-1 text-muted">REG Date</p>
                                                <h5>{{ date('j M, H:i', strtotime($expiredRegistration->created_at)) }}
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center mb-4">
                                <img src="/storage/images/assets/empty-cart.png" alt="" width="20%">
                                <h4>No Registration Yet</h4>
                            </div>
                        @endforelse
                    </div>

                    <div class="tab-pane fade" id="refund" role="tabpanel" tabindex="0">
                        <div class="text-center mb-4">
                            <img src="/storage/images/assets/empty-cart.png" alt="" width="20%">
                            <h4>No Registration Yet</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="pendingPayments" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content rounded-4">
                    <div class="modal-header p-4 text-center border-0 ">
                        <h5 class="modal-title col">Pending Payment List</h5>
                        <button type="button" class="btn-close col-1" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body p-4 pt-0">
                        <div class="row row-cols-1 g-3">
                            @foreach ($pendingPayments as $pendingPayment)
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <h6 class="fs-sm text-muted mb-2">{{ $pendingPayment->user->name }}</h6>
                                            <div class="row g-0 fs-sm">
                                                <div class="col-4">
                                                    <p class="fw-bold mb-1">REG DATE</p>
                                                    <p class="m-0 ">
                                                        {{ date('j M', strtotime($pendingPayment->created_at)) }}
                                                    </p>
                                                </div>
                                                <div class="col-5">
                                                    <p class="fw-bold mb-1">COMPETITION</p>
                                                    @foreach ($pendingPayment->competitions->unique() as $competition)
                                                        <p class="m-0">
                                                            {{ $competition->name == 'Speech' ? $competition->name . ' ' . $competition->category_init : $competition->name }}
                                                        </p>
                                                    @endforeach
                                                </div>

                                                <div class="col-3">
                                                    <p class="fw-bold mb-1">PAYMENT DUE</p>
                                                    <p class="m-0 ">
                                                        {{ date('j M, H:i', strtotime($pendingPayment->payment_due)) }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app>
