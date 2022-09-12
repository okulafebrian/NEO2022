<x-user title="My Registration - NEO 2022">
    <x-slot name="navbarUser"></x-slot>

    <div class="container-lg p-lg-5 px-md-5 p-4">
        <div class="row g-5">
            {{-- USER SIDEBAR --}}
            <div class="col-lg-3">
                <x-sidebar-user current="registration"></x-sidebar-user>
            </div>

            {{-- USER REGISTRATION LIST --}}
            <div class="col-lg-9">
                <h3 class="mb-4">My Registration</h3>
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-md-3 p-0">
                        <div class="row row-cols-1 g-0">
                            @forelse ($registrations as $registration)
                                <div class="col">
                                    @if (strtotime($registration->payment_due) < time() && !$registration->payment)
                                        {{-- REGISTRASI EXPIRED --}}
                                        <div class="text-muted">
                                            <x-status :registration='$registration' status="expired" title="Registration expired" />
                                        </div>
                                    @elseif (strtotime($registration->payment_due) > time() && !$registration->payment)
                                        {{-- MENUNGGU PEMBAYARAN --}}
                                        <x-status :registration='$registration' status="waiting" title="Waiting for payment" />
                                    @elseif ($registration->payment->is_confirmed == false)
                                        {{-- PEMBAYARAN SEDANG DIKONFIRMASI --}}
                                        <x-status :registration='$registration' status="Verification"
                                            title="Payment in verification" />
                                    @else
                                        {{-- PEMBAYARAN SUDAH DIKONFIRMASI --}}
                                        <x-status :registration='$registration' status="Accepted" title="Payment verified" />
                                    @endif

                                    @if (!$loop->last)
                                        <hr class="mx-3">
                                    @endif
                                </div>
                            @empty
                                <div class="col p-3">
                                    <h5>No competitions registered...yet!</h5>
                                    <p class="bd-lead">It's time to show your talent and win the competition</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- REGISTRATION DETAILS MODAL --}}
    @isset($paymentSummaries)
        <div class="modal fade" id="regDetailsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header py-4 text-center">
                        <h5 class="modal-title col">Registration Details</h5>
                        <a type="button" href="{{ route('registrations.index') }}" class="btn-close col-1"></a>
                    </div>

                    <div class="modal-body p-0">
                        <div class="row g-0">
                            <div class="col-md border-end">
                                <div class="row g-0 p-4">
                                    <div class="col-12">
                                        <h6>
                                            @if (strtotime($registration->payment_due) < time() && !$registration->payment)
                                                Expired
                                            @elseif (strtotime($registration->payment_due) > time() && !$registration->payment)
                                                Pending
                                            @elseif ($registration->payment->is_confirmed == false)
                                                Processing
                                            @else
                                                Completed
                                            @endif
                                        </h6>
                                    </div>

                                    <div class="col-12">
                                        <div class="row text-muted">
                                            <p class="col-6 fs-sm">Invoice ID</p>
                                            <p class="col-6 text-end fs-sm">
                                                {{ $registration->payment ? str_pad($registration->payment->id, 3, '0', STR_PAD_LEFT) : '-' }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="row text-muted">
                                            <p class="col-6 fs-sm">Registration Date</p>
                                            <p class="col-6 text-end fs-sm">
                                                {{ date('j F, H:m', strtotime($registration->created_at)) }} WIB
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="border-5 border-bottom"></div>

                                <div class="row g-0 p-4">
                                    <h6 class="col-12">Payment Details</h6>

                                    <div class="col-12">
                                        <div class="row text-muted">
                                            <p class="col-6 fs-sm">Payment Method</p>
                                            <p class="col-6 text-end fs-sm">
                                                {{ $registration->payment ? $registration->payment->payment_type : '-' }}
                                            </p>
                                        </div>
                                    </div>

                                    <hr class="mt-2" style="border-style: dashed">

                                    <div class="col-12">
                                        @foreach ($paymentSummaries as $paymentSummary)
                                            <div class="row text-muted">
                                                <p class="col fs-sm text-truncate">
                                                    {{ $paymentSummary->total }}x
                                                    {{ $paymentSummary->name == 'Speech' ? $paymentSummary->name . ' ' . $paymentSummary->category : $paymentSummary->name }}
                                                </p>
                                                <p class="col-4 text-end fs-sm">
                                                    Rp {{ number_format($paymentSummary->price, 0, '.', '.') }}
                                                </p>
                                            </div>
                                        @endforeach
                                    </div>

                                    <hr class="mt-2" style="border-style: dashed">

                                    <div class="col-12">
                                        <div class="row">
                                            <h6 class="col-6">Total Payment</h6>
                                            <h6 class="col-6 text-end">
                                                Rp {{ number_format($totalPayment, 0, '.', '.') }}
                                            </h6>
                                        </div>
                                    </div>
                                </div>

                                <div class="border-5 border-bottom"></div>

                                <div class="row g-0 p-4">
                                    <h6 class="col-12 mb-3">Participant Details</h6>

                                    <div class="col-12">
                                        <div class="row gx-0 gy-3">
                                            @foreach ($registrationDetails as $key => $registrationDetail)
                                                <div class="card col-12">
                                                    <div class="card-body">
                                                        @foreach ($registrationDetail->participants as $participant)
                                                            <div>
                                                                <h6 class="px-2">{{ $participant->name }}</h6>
                                                                <table
                                                                    class="table table-borderless m-0 participant-details-table">
                                                                    <tbody class="text-muted">
                                                                        <tr>
                                                                            <td class="col-4">Competition</td>
                                                                            <td class="col-1">:</td>
                                                                            <td class="col">
                                                                                {{ $registrationDetail->competition->name }}
                                                                                {{ $registrationDetail->competition->name == 'Speech' ? $registrationDetail->competition->category : null }}
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Gender</td>
                                                                            <td>:</td>
                                                                            <td>{{ $participant->gender }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Grade Level</td>
                                                                            <td>:</td>
                                                                            <td>{{ $participant->grade }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Address</td>
                                                                            <td>:</td>
                                                                            <td>{{ $participant->address }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Email</td>
                                                                            <td>:</td>
                                                                            <td>{{ $participant->email }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>LINE ID</td>
                                                                            <td>:</td>
                                                                            <td>{{ $participant->line_id }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Phone Number</td>
                                                                            <td>:</td>
                                                                            <td>{{ $participant->whatsapp_number }}
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Institute Name</td>
                                                                            <td>:</td>
                                                                            <td>{{ $participant->institute_name }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Institute Address</td>
                                                                            <td>:</td>
                                                                            <td>{{ $participant->institute_address }}
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            @if (!$loop->last)
                                                                <hr class="border-0">
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="d-grid gap-2 p-md-4 px-4 pb-4">
                                    <button class="btn btn-primary" type="button">Invoice</button>
                                    <button class="btn btn-outline-primary" type="button">Edit Payment Proof</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(function() {
                $('#regDetailsModal').modal('show');
            });

            const myModalEl = document.getElementById('regDetailsModal')
            myModalEl.addEventListener('hidden.bs.modal', event => {
                window.location.href = "{{ route('registrations.index') }}"
            })
        </script>
    @endisset
</x-user>