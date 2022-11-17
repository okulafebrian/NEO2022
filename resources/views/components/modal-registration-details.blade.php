<div class="modal fade" id="show{{ $status }}{{ $registration->id }}" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0">
            <div class="modal-header d-flex justify-content-between align-items-center p-4">
                <h5 class="m-auto fw-semibold">Registration Details</h5>
                <i class="fa-solid fa-xmark fa-xl" role="button" data-bs-dismiss="modal"></i>
            </div>
            <div class="modal-body p-0">
                <div class="row g-0">
                    <div class="col">
                        <section class="p-lg-4 p-3" style="border-bottom: 8px solid #F3F4F5">
                            @if ($registration->payment)
                                <div class="table-custom fs-sm">
                                    <span class="text-muted">Invoice ID</span>
                                    <span>{{ str_pad($registration->payment->id, 3, '0', STR_PAD_LEFT) }}</span>
                                </div>
                            @endif
                            <div class="table-custom fs-sm">
                                <span class="text-muted">Registration Date</span>
                                <span
                                    class="text-end">{{ date('j F Y, H:i', strtotime($registration->created_at)) }}</span>
                            </div>
                        </section>

                        <section class="p-lg-4 p-3" style="border-bottom: 8px solid #F3F4F5">
                            <h6 class="mb-4">Payment Details</h6>

                            @if ($registration->payment)
                                <div class="table-custom fs-sm">
                                    <span class="text-muted">Payment Method</span>
                                    <span class="text-end">{{ $registration->payment->method }}</span>
                                </div>
                            @endif

                            <hr style="border-style:dashed;">

                            <table class="table table-borderless m-0 td-custom">
                                <tbody>
                                    @foreach ($competitionSummaries[$registration->id] as $competitionSummary)
                                        <tr class="fs-sm">
                                            <td>
                                                {{ $competitionSummary->registrations_count }}x
                                                {{ $competitionSummary->name == 'Speech' ? $competitionSummary->name . ' ' . $competitionSummary->category : $competitionSummary->name }}
                                            </td>
                                            <td class="text-end">Rp
                                                {{ number_format($competitionSummary->registrations_count * $competitionSummary->price, 0, '.', '.') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <hr style="border-style:dashed;">

                            <div class="table-custom fs-sm">
                                <h6>Total Payment</h6>
                                <h6>
                                    Rp {{ number_format($registration->competitions->sum('pivot.price'), 0, '.', '.') }}
                                </h6>
                            </div>
                        </section>

                        @if ($registration->companion)
                            <section class="p-lg-4 p-3" style="border-bottom: 8px solid #F3F4F5">
                                <h6 class="mb-4">Companion Details</h6>

                                <table class="table table-borderless m-0 td-custom">
                                    <tbody class="fs-sm">
                                        <tr>
                                            <td class="col-4 text-muted">Name</td>
                                            <td>{{ $registration->companion->name }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">Phone No</td>
                                            <td>{{ $registration->companion->phone_number }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </section>
                        @endif

                        <section class="p-lg-4 p-3">
                            <h6 class="mb-4">Participant Details</h6>

                            @foreach ($registration->registrationDetails as $index => $registrationDetail)
                                <div class="card {{ !$loop->last ? 'mb-3' : '' }} border-0 bg-light">
                                    <div class="card-body">
                                        <h6>
                                            {{ $registrationDetail->competition->name == 'Speech' ? $registrationDetail->competition->name . ' ' . $registrationDetail->competition->category : $registrationDetail->competition->name }}
                                        </h6>

                                        @if ($registrationDetail->competition->name == 'Debate')
                                            <table class="table table-borderless td-custom m-0">
                                                <tbody class="fs-sm">
                                                    <tr>
                                                        <td class="col-4 text-muted">Team Name</td>
                                                        <td>{{ $registrationDetail->debateTeam->name }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <hr style="border-style: dashed">
                                        @endif

                                        @foreach ($registrationDetail->participants as $participant)
                                            <table class="table table-borderless td-custom m-0">
                                                <tbody class="fs-sm">
                                                    <tr>
                                                        <td class="col-4 text-muted">Name</td>
                                                        <td>{{ $participant->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted">Gender</td>
                                                        <td>{{ $participant->gender }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted">Level</td>
                                                        <td>{{ $participant->grade }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted">Address</td>
                                                        <td>
                                                            {{ $participant->address }}<br>
                                                            {{ $participant->district->name }}<br>
                                                            {{ $participant->province->name }}

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted">Email</td>
                                                        <td>{{ $participant->email }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted">LINE ID</td>
                                                        <td>{{ $participant->line_id }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted">Phone No</td>
                                                        <td>{{ $participant->phone_number }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted">Institution</td>
                                                        <td>{{ $participant->institution }}</td>
                                                    </tr>
                                                    @if ($participant->binusian)
                                                        <tr>
                                                            <td class="text-muted">NIM</td>
                                                            <td>{{ $participant->binusian->nim }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted">Region</td>
                                                            <td>{{ $participant->binusian->region }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted">Major</td>
                                                            <td>{{ $participant->binusian->major->name }}</td>
                                                        </tr>
                                                    @endif
                                                    <tr>
                                                        <td class="text-muted">Vaccination</td>
                                                        <td>
                                                            <a href="/storage/images/vaccinations/{{ $participant->vaccination }}"
                                                                target="_blank">
                                                                View here
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-muted">Allergy</td>
                                                        <td>{{ $participant->allergy }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            @if (!$loop->last)
                                                <hr style="border-style: dashed">
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </section>
                    </div>

                    @if (auth()->user()->role != 'ADMIN')
                        <div class="col-lg-4 border-custom">
                            <section class="p-4 sticky-top">
                                <div class="fst-italic mb-3" style="font-size: 12px; line-height: 19px">
                                    If there is an incorrect data, please contact the committee.
                                </div>

                                <button type="button" class="btn btn-outline-light py-2 mb-2 w-100">
                                    Contact Committee
                                </button>
                                @if ($registration->payment)
                                    <a href="/storage/images/payment_proofs/{{ $registration->payment->proof }}"
                                        type="button" target="_blank" class="btn btn-outline-light py-2 mb-2 w-100">
                                        Payment Proof
                                    </a>
                                @endif
                            </section>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
