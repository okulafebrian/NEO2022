<div class="modal fade" id="regDetails{{ $registration->id }}" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header px-4">
                <div class="d-flex align-items-center">
                    <h5 class="modal-title">
                        REG {{ str_pad($registration->id, 3, '0', STR_PAD_LEFT) }}
                    </h5>
                    @if (strtotime($registration->payment_due) < time() && !$registration->payment)
                        <span class="badge text-bg-secondary ms-1">Registration expired</span>
                    @elseif (strtotime($registration->payment_due) > time() && !$registration->payment)
                        <span class="badge text-bg-danger ms-1">Waiting for Payment</span>
                    @elseif ($registration->payment->is_verified == false)
                        <span class="badge text-bg-orange-400 ms-1">Payment in Verification</span>
                    @else
                        <span class="badge text-bg-success ms-1">Payment Verified</span>
                    @endif
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-0">
                <div class="header p-4 p-custom">
                    <div class="d-flex justify-content-between">
                        <p class="text-muted">Invoice</p>
                        <p>{{ $registration->payment ? $registration->payment->id : '-' }}</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="text-muted">Registration Date</p>
                        <p>{{ date('j F, H:i', strtotime($registration->created_at)) }}</p>
                    </div>
                </div>

                <div class="border-5 border-bottom"></div>

                <div class="payment p-4 p-custom">
                    <h6 class="mb-3">Payment Details</h6>
                    <div class="d-flex justify-content-between">
                        <p class="text-muted">Payment Method</p>
                        <p>{{ $registration->payment ? $registration->payment->payment_type : '-' }}</p>
                    </div>
                    <hr style="border-style: dashed">
                    @foreach ($competitionSummaries[$registration->id] as $competitionSummary)
                        <div class="d-flex justify-content-between">
                            <p class="text-muted">
                                {{ $competitionSummary->registrations_count }}x
                                {{ $competitionSummary->name == 'Speech' ? $competitionSummary->name . ' ' . $competitionSummary->category : $competitionSummary->name }}
                            </p>
                            <p>
                                Rp
                                {{ number_format($competitionSummary->registrations_count * $competitionSummary->price, 0, '.', '.') }}
                            </p>
                        </div>
                    @endforeach
                    <hr style="border-style: dashed">
                    <div class="d-flex justify-content-between">
                        <h6>Total Payment</h6>
                        <h6>
                            Rp {{ number_format($registration->competitions->sum('price'), 0, '.', '.') }}
                        </h6>
                    </div>
                </div>

                <div class="border-5 border-bottom"></div>

                <div class="participant p-4 p-custom">
                    <h6>Participant Details</h6>
                    @foreach ($registration->registrationDetails as $registrationDetail)
                        <div class="card mt-3">
                            <div class="card-body">
                                @foreach ($registrationDetail->participants as $participant)
                                    <table class="table table-borderless m-0 participant-details-table">
                                        <h6>{{ $participant->name }}</h6>
                                        <tbody>
                                            <tr>
                                                <td class="col-3 text-muted">Competition</td>
                                                <td class="col-1 text-muted">:</td>
                                                <td>
                                                    {{ $registrationDetail->competition->name }}
                                                    {{ $registrationDetail->competition->name == 'Speech' ? $registrationDetail->competition->category : null }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-muted">Gender</td>
                                                <td>:</td>
                                                <td>{{ $participant->gender }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-muted">Level</td>
                                                <td>:</td>
                                                <td>{{ $participant->level }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-muted">Address</td>
                                                <td>:</td>
                                                <td>{{ $participant->address }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-muted">Email</td>
                                                <td>:</td>
                                                <td>{{ $participant->email }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-muted">LINE ID</td>
                                                <td>:</td>
                                                <td>{{ $participant->line_id }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-muted">Phone Number</td>
                                                <td>:</td>
                                                <td>{{ $participant->phone_num }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-muted">Institution</td>
                                                <td>:</td>
                                                <td>{{ $participant->institution }}</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    @if (!$loop->last)
                                        <hr class="border-0">
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>

                @if ((strtotime($registration->payment_due) > time() && !$registration->payment) || $registration->payment)
                    <div class="border-5 border-bottom"></div>

                    <div class="d-flex p-4 gap-2">
                        <a type="button" href="{{ route('registrations.edit', $registration) }}"
                            class="btn btn-outline-primary w-50" target="_blank">Edit Participant</a>
                        @if ($registration->payment)
                            <a type="button" href="{{ route('payments.edit', $registration->payment) }}"
                                class="btn btn-outline-primary w-50" target="_blank">Edit Payment Proof</a>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
