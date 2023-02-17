<x-app title="Dashboard | NEO 2022">

    <x-slot name="navbarParticipant"></x-slot>

    <div class="container my-4">
        @if (count($qualifications) > 0)
            <div class="card card-custom rounded-4 bg-purple-700">
                <div class="card-body">
                    <div class="mb-5 text-light">
                        <h4>Attendance</h4>
                        <p>Make sure to check in when attending the event</p>
                    </div>
                    <button type="submit" class="btn btn-light py-2 rounded-3">Check In</button>
                </div>
            </div>

            <div class="row row-cols-md-2 row-cols-1 g-4 px-1">
                @foreach ($qualifications as $qualification)
                    @if (($qualification->registrationDetail->competition->name == 'Short Story Writing' &&
                        ($qualification->round->name == 'Preliminary' || $qualification->round->name == 'Final')) ||
                        ($qualification->registrationDetail->competition->name == 'Speech' && $qualification->round->name == 'Preliminary'))
                        <div class="col">
                            <div class="card card-custom bg-purple-100 rounded-4" style="min-height: 12rem;">
                                <div class="card-body">
                                    <div class="mb-5 text-primary">
                                        <h4 style="font-size: 20px">
                                            {{ $qualification->registrationDetail->competition->name }}
                                            {{ $qualification->round->name }} Submission
                                        </h4>
                                        <p>
                                            @if ($submissions[$qualification->id] == 0)
                                                Submission closed
                                            @elseif ($qualification->submission)
                                                File submitted successful on
                                                {{ date('j M, H:i', strtotime($qualification->submission->created_at)) }}
                                            @else
                                                Upload your work before the deadline
                                            @endif
                                        </p>
                                    </div>
                                    <div class="text-end">
                                        @if ($submissions[$qualification->id] == 1 && !$qualification->submission)
                                            <button type="button" class="btn btn-light text-primary py-2 rounded-3"
                                                data-bs-toggle="modal"
                                                data-bs-target="#submission{{ $qualification->id }}">Upload</button>
                                        @endif
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
                                        <input type="hidden" name="round" value="{{ $qualification->round->name }}">
                                        <input type="hidden" name="competition"
                                            value="{{ $qualification->registrationDetail->competition->name }}">

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
                                                        File name format: <b>{{ $qualification->round->name }}
                                                            Round_Title of Story_Author’s
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
                                                <button type="submit"
                                                    class="btn btn-primary py-2 w-100">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        @else
            <div class="text-center" style="margin-top: 5rem;">
                <h3 class="fw-semibold text-primary">No Upcoming Activity</h3>
                <p class="text-purple-muted">The scheduled activity will be listed here</p>
            </div>
        @endif
    </div>
</x-app>
