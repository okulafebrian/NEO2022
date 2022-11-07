<x-app title="My Registrations | NEO 2022">
    <x-slot name="navbarUser"></x-slot>

    <div class="container my-5">
        @if (count($registrations) > 0)
            <h4 class="text-center text-primary fw-semibold mb-4">My Registration</h4>
        @endif

        @forelse ($registrations as $registration)

            <x-modal-registration-details :registration='$registration' :competitionSummaries='$competitionSummaries' />

            <div class="card card-custom mb-3 m-auto" style="max-width: 45rem">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-10">
                            <div class="mb-2 text-muted my-auto">
                                <small class="me-1">
                                    {{ date('j M, H:i', strtotime($registration->created_at)) }}
                                </small>
                                @if (time() > strtotime($registration->payment_due) && !$registration->payment)
                                    <span class="badge text-bg-secondary">Registration expired</span>
                                @elseif (time() <= strtotime($registration->payment_due) && !$registration->payment)
                                    <span class="badge bg-red-100 text-danger">Waiting for payment</span>
                                @elseif ($registration->payment->is_verified == null)
                                    <span class="badge bg-orange-100 text-orange">Proccesed</span>
                                @else
                                    <span class="badge text-bg-success">Success</span>
                                @endif
                            </div>

                            <h6 class="text-truncate">
                                @foreach ($registration->competitions->unique() as $competition)
                                    {{ $competition->name == 'Speech' ? $competition->name . ' ' . $competition->category : $competition->name }}
                                    @if (!$loop->last)
                                        <i class="bi bi-dot"></i>
                                    @endif
                                @endforeach
                            </h6>

                            <span>
                                Rp {{ number_format($registration->competitions->sum('pivot.price'), 0, '.', '.') }}
                            </span>
                        </div>

                        <div class="col-2">
                            <div class="dropdown text-end">
                                <button class="btn btn-outline-light btn-sm rounded-3" type="button"
                                    data-bs-toggle="dropdown">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end p-1 border-0 shadow-sm rounded-3"
                                    style="font-size: 14px">
                                    @if (strtotime($registration->payment_due) >= time() && !$registration->payment)
                                        <li>
                                            <button type="button" class="dropdown-item p-2 rounded-3"
                                                data-bs-toggle="modal" data-bs-target="#cancel">
                                                Cancel Registration
                                            </button>
                                        </li>
                                    @endif
                                    <li>
                                        <button type="button" class="dropdown-item p-2 rounded-3"
                                            data-bs-toggle="modal" data-bs-target="#show{{ $registration->id }}">
                                            Show Details
                                        </button>
                                    </li>
                                    <li>
                                        <a class="dropdown-item p-2 rounded-3" href="#">
                                            Help
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <x-modal-confirmation action="cancel" title="Cancel Registration">
                        Are you sure want to cancel your registration?
                    </x-modal-confirmation>

                    @if (strtotime($registration->payment_due) >= time() && !$registration->payment)
                        <hr style="border-style: dashed">

                        <div class="d-flex justify-content-between">
                            <div>
                                <span class="text-purple-muted" style="font-size: 12px">
                                    Payment Due
                                </span>
                                <h6 class="mb-0 text-primary fw-semibold">
                                    {{ date('j M, H:i', strtotime($registration->payment_due)) }}
                                </h6>
                            </div>
                            <a type="button" href="{{ route('payments.create', $registration) }}"
                                class="btn btn-primary px-4 py-2 rounded-3">
                                <small>Pay Now</small>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        @empty
            <div class="text-center">
                <img src="/storage/images/assets/empty-cart.png" alt="NEO" width="35%">
                <h4>You don't have registration yet!</h4>
                <p class="text-muted">It's time to show your talent and win the competition</p>
            </div>
        @endforelse
    </div>
</x-app>
