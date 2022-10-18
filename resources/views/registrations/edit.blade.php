<x-app title="Edit Registration | NEO 2022">

    <x-slot name="navbarUser"></x-slot>

    <div class="container my-5" style="max-width: 55rem">
        <h3 class="mb-4 text-center">Edit Participants</h3>

        <form method="POST" action="{{ route('registrations.update', $registration) }}" enctype="multipart/form-data"
            novalidate>
            @csrf

            @foreach ($registration->registrationDetails as $key => $registrationDetail)
                <div class="card card-custom mb-3">
                    <div class="card-body">
                        <h5 class="mb-4">
                            <span class="title-bar"></span>
                            {{ $registrationDetail->competition->name == 'Speech' ? $registrationDetail->competition->name . ' ' . $registrationDetail->competition->category : $registrationDetail->competition->name }}
                            {{ $key + 1 }}
                        </h5>

                        @if ($registrationDetail->competition->name == 'Debate')
                            <ul class="nav nav-tabs mb-4" id="tabs-tab" role="tablist">
                                @foreach ($registrationDetail->participants as $key => $participant)
                                    @if ($key == 0)
                                        <li class="nav-item me-2" role="presentation">
                                            <button class="nav-link active" id="speakerA-tab" data-bs-toggle="pill"
                                                data-bs-target="#speakerA{{ $participant->id }}" type="button"
                                                role="tab">Speaker A</button>
                                        </li>
                                    @else
                                        <li class="nav-item me-2" role="presentation">
                                            <button class="nav-link" id="speakerB-tab" data-bs-toggle="pill"
                                                data-bs-target="#speakerB{{ $participant->id }}" type="button"
                                                role="tab">Speaker B</button>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>

                            <div class="tab-content" id="tabs-tabContent">
                                @foreach ($registrationDetail->participants as $key => $participant)
                                    @if ($key == 0)
                                        <div class="tab-pane fade show active" id="speakerA{{ $participant->id }}"
                                            role="tabpanel">
                                            <x-form-edit :participant='$participant' :registrationDetail='$registrationDetail' />
                                        </div>
                                    @else
                                        <div class="tab-pane fade" id="speakerB{{ $participant->id }}" role="tabpanel">
                                            <x-form-edit :participant='$participant' :registrationDetail='$registrationDetail' />
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        @else
                            @foreach ($registrationDetail->participants as $participant)
                                <x-form-edit :participant='$participant' :registrationDetail='$registrationDetail' />
                            @endforeach
                        @endif
                    </div>
                </div>
            @endforeach

            <div class="text-end">
                @method('PUT')
                <button type="submit" class="btn btn-primary px-5">Save Changes</button>
            </div>
        </form>
    </div>
</x-app>
