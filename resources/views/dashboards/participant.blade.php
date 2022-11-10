<x-app title="Dashboard | NEO 2022">

    <x-slot name="navbarParticipant"></x-slot>

    <div class="container my-4">
        @if (count($attendanceQualifications) > 0 || count($submissionQualifications) || count($reRegisterQualifications))
            <div class="row row-cols-md-2 row-cols-1 g-4">
                @foreach ($attendanceQualifications as $qualification)
                    <div class="col">
                        <div class="card card-custom rounded-4 bg-purple-700" style="min-height: 12rem;">
                            <div class="card-body">
                                <div class="mb-5 text-light">
                                    <h4 style="font-size: 20px">
                                        {{ $qualification->round->name }} Attendance
                                    </h4>
                                    <p>
                                        @if ($qualification->attendance)
                                            Check-in successful on
                                            {{ date('j M, H:i', strtotime($qualification->attendance->created_at)) }}
                                        @else
                                            Make sure to check in when attending the event
                                        @endif
                                    </p>
                                </div>
                                <div class="text-end">
                                    @if (!$qualification->attendance)
                                        <form method="POST" action="{{ route('attendances.store') }}">
                                            @csrf
                                            <input type="hidden" name="qualification_id"
                                                value="{{ $qualification->id }}">
                                            <button type="submit" class="btn btn-light py-2 rounded-3">Check
                                                In</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                @foreach ($submissionQualifications as $qualification)
                    <div class="col">
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            <div class="card card-custom bg-primary rounded-4" style="min-height: 12rem;">
                                <div class="card-body">
                                    <div class="mb-5 text-light">
                                        <h4 style="font-size: 20px">
                                            SSW {{ $qualification->round->name }} Submission
                                        </h4>
                                        <p>
                                            @if ($qualification->submission)
                                                File submitted successful on
                                                {{ date('j M, H:i', strtotime($qualification->submission->created_at)) }}
                                            @else
                                                Upload your work before the deadline
                                            @endif
                                        </p>
                                    </div>
                                    <div class="text-end">
                                        @if (!$qualification->submission)
                                            <button type="button" class="btn btn-light text-primary py-2 rounded-3"
                                                data-bs-toggle="modal"
                                                data-bs-target="#submission{{ $qualification->id }}">Upload</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="submission{{ $qualification->id }}" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content border-0">
                                <div class="modal-header d-flex justify-content-between text-primary p-4">
                                    <h5 class="m-0">SSW {{ $qualification->round->name }} Submission</h5>
                                    <i class="fa-solid fa-xmark fa-xl" role="button" data-bs-dismiss="modal"></i>
                                </div>

                                <form method="POST" action="{{ route('submissions.store') }}"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <input type="hidden" name="qualification_id" value="{{ $qualification->id }}">

                                    <div class="modal-body px-4 pb-0">
                                        <div class="mb-3">
                                            <label class="form-label">Upload your work</label>
                                            <input class="form-control" type="file" name="file" required>
                                            <div class="form-text">Format: pdf</div>
                                        </div>
                                        <div class="form-text text-purple-muted">
                                            <ol>
                                                <li>You can only upload once</li>
                                                <li>The story must be written in English</li>
                                                <li>
                                                    The submitted story must not contain violence, pornography, and
                                                    racism
                                                </li>
                                                <li>
                                                    File name format: <b>Preliminary Round_Title of Story_Author’s
                                                        Name</b>
                                                </li>
                                            </ol>
                                        </div>
                                    </div>
                                    <div class="modal-footer row g-0 pt-0 p-4 border-0">
                                        <div class="col">
                                            <button type="button" class="btn btn-outline-light py-2 w-100"
                                                data-bs-dismiss="modal">
                                                Cancel
                                            </button>
                                        </div>
                                        <div class="col">
                                            <button type="submit" class="btn btn-primary py-2 w-100">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach

                @foreach ($reRegisterQualifications as $qualification)
                    <div class="col">
                        <div class="card card-custom bg-purple-100 rounded-4" style="min-height: 12rem;">
                            <div class="card-body">
                                <div class="mb-5">
                                    <h4 class="text-primary" style="font-size: 20px">
                                        Semifinal Re-Registration
                                    </h4>
                                    <p class="text-purple-muted">
                                        @if (Auth::guard('participant')->user()->vaccination)
                                            Re-register successful
                                        @else
                                            You haven't re-registered for the semifinal
                                        @endif
                                    </p>
                                </div>
                                <div class="text-end">
                                    @if (!Auth::guard('participant')->user()->vaccination)
                                        <button type="button" class="btn btn-primary py-2 rounded-3"
                                            data-bs-toggle="modal"
                                            data-bs-target="#reRegister{{ $qualification->id }}">Re-Register</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="reRegister{{ $qualification->id }}" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content border-0">
                                <div class="modal-header d-flex justify-content-between text-primary p-4">
                                    <h5 class="m-0">{{ $qualification->round->name }} Re-Registration</h5>
                                    <i class="fa-solid fa-xmark fa-xl" role="button" data-bs-dismiss="modal"></i>
                                </div>

                                <form method="POST" action="{{ route('re-registrations.store') }}"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <input type="hidden" name="qualification_id" value="{{ $qualification->id }}">
                                    <input type="hidden" name="participant_id"
                                        value="{{ Auth::guard('participant')->user()->id }}">

                                    <div class="modal-body px-4 pb-0">
                                        <div class="mb-3">
                                            <label class="form-label">Upload your vaccination proof (2nd dose or booster
                                                dose)</label>
                                            <input class="form-control" type="file" name="vaccination" required>
                                            <div class="form-text">Format: JPG, JPEG, PNG, PDF</div>
                                        </div>

                                        <hr style="border-style: dashed">

                                        <div class="mb-3">
                                            <label class="form-label">Do you have any food allergies?</label>
                                            <input type="text" class="form-control" id="allergy" name="allergy"
                                                placeholder="E.g. peanuts, seafood">
                                            <div class="form-text">
                                                If you don't have, please leave this field blank.
                                            </div>
                                        </div>

                                        <div class="alert alert-warning" role="alert">
                                            By confirming this re-registration, you are obliged to be present at the
                                            venue for the next round.
                                        </div>
                                    </div>

                                    <div class="modal-footer row g-0 pt-0 p-4 border-0">
                                        <div class="col">
                                            <button type="button" class="btn btn-outline-light py-2 w-100"
                                                data-bs-dismiss="modal">
                                                Cancel
                                            </button>
                                        </div>
                                        <div class="col">
                                            <button type="submit" class="btn btn-primary py-2 w-100">Confirm</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center" style="margin-top: 5rem;">
                <h3 class="text-primary">No Upcoming Activity</h3>
                <p class="text-purple-muted">The scheduled activity will be listed here</p>
            </div>
        @endif
    </div>
</x-app>
