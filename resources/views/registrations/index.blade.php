<x-app title="My Registrations | NEO 2022">
    <x-slot name="navbarUser"></x-slot>

    <div class="container-lg my-5">
        <h3 class="text-center mb-4">My Registration</h3>

        <div class="m-auto" style="max-width:600px">
            @forelse ($registrations as $registration)

                <x-modal-registration-details :registration='$registration' :competitionSummaries='$competitionSummaries' />

                <div class="card card-custom rounded-4 mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-10">
                                <h6 class="text-muted">
                                    REG {{ str_pad($registration->id, 3, '0', STR_PAD_LEFT) }}
                                    @if (strtotime($registration->payment_due) < time() && !$registration->payment)
                                        <span class="badge text-bg-secondary ms-1">Registration expired</span>
                                    @elseif (strtotime($registration->payment_due) > time() && !$registration->payment)
                                        <span class="badge text-bg-danger ms-1">Waiting for payment</span>
                                    @elseif ($registration->payment->is_verified == false)
                                        <span class="badge text-bg-orange-400 ms-1">Payment in verification</span>
                                    @else
                                        <span class="badge text-bg-success ms-1">Payment verified</span>
                                    @endif
                                </h6>
                                <h5 class="text-truncate mt-2">
                                    @foreach ($registration->competitions->unique() as $competition)
                                        {{ $competition->name == 'Speech' ? $competition->name . ' ' . $competition->category_init : $competition->name }}
                                        @if (!$loop->last)
                                            <i class="bi bi-dot"></i>
                                        @endif
                                    @endforeach
                                </h5>
                                <p class="m-0 text-muted">
                                    {{ date('j F, H:i', strtotime($registration->created_at)) }}
                                </p>
                            </div>

                            <div class="col-2">
                                <div class="dropdown text-end">
                                    <button class="btn btn-outline-light btn-sm rounded-3" type="button"
                                        data-bs-toggle="dropdown">
                                        <i class="bi bi-three-dots-vertical text-muted"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end p-1 border-0 shadow-sm rounded-3">
                                        @if (strtotime($registration->payment_due) > time() && !$registration->payment)
                                            <li>
                                                <form method="POST"
                                                    action="{{ route('registrations.destroy', $registration) }}">
                                                    @csrf
                                                    <input type="hidden" name="_method" value='DELETE'>
                                                    <button type="submit" class="dropdown-item p-2 rounded-3">Cancel
                                                        Registration</button>
                                                </form>
                                            </li>
                                        @endif
                                        <li>
                                            <button type="button" class="dropdown-item p-2 rounded-3"
                                                data-bs-toggle="modal"
                                                data-bs-target="#regDetails{{ $registration->id }}">
                                                View Details
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

                        @if (strtotime($registration->payment_due) > time() && !$registration->payment)
                            <hr>
                            <div class="row">
                                <div class="col-6">
                                    <small>Total Payment</small>
                                    <h5>Rp {{ number_format($registration->competitions->sum('price'), 0, '.', '.') }}
                                    </h5>
                                </div>
                                <div class="col-6 my-auto text-end">
                                    <a type="button" href="{{ route('payments.create', $registration) }}"
                                        class="btn btn-danger rounded-3">
                                        Pay Now <i class="fa-solid fa-circle-arrow-right ms-2"></i>
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            @empty
                <div class="text-center">
                    <img src="/storage/images/assets/no-results.png" alt="NEO" width="35%">
                    <h4>No competitions registered...yet!</h4>
                    <p class="text-muted">It's time to show your talent and win the competition</p>
                </div>
            @endforelse
        </div>
    </div>
</x-app>
