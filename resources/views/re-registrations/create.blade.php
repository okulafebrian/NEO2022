<x-app title="{{ $round->name }} - {{ $competition->name }} | NEO 2022">
    <x-slot name="navbarAdmin"></x-slot>

    <div class="container" style="padding: 6rem 0; max-width: 40rem">
        <div class="mb-4">
            <h3 class="text-primary">{{ $round->name }} - {{ $competition->name }}</h3>
            <p class="m-0 text-muted">
                Select {{ $competition->name == 'Debate' ? 'teams' : 'participants' }} that qualified to this round
            </p>
        </div>

        <form method="POST" action="{{ route('re-registrations.store') }}" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="round_id" value="{{ $round->id }}">
            <input type="hidden" name="competition_name" value="{{ $competition->name }}">

            <div class="card card-custom mb-3">
                <div class="card-body">
                    <ul class="list-group">
                        @if ($competition->name == 'Debate')
                            @foreach ($competition->registrationDetails as $registrationDetail)
                                <li class="list-group-item">
                                    <input class="form-check-input me-1" type="checkbox" name="registration_detail_id[]"
                                        value="{{ $registrationDetail->id }}" id="T{{ $registrationDetail->id }}">
                                    <label class="form-check-label stretched-link"
                                        for="T{{ $registrationDetail->id }}">{{ $registrationDetail->debateTeam->name }}</label>
                                </li>
                            @endforeach
                        @else
                            @foreach ($competition->participants as $participant)
                                <li class="list-group-item">
                                    <input class="form-check-input me-1" type="checkbox" name="participant_id[]"
                                        value="{{ $participant->id }}" id="P{{ $participant->id }}">
                                    <label class="form-check-label stretched-link"
                                        for="P{{ $participant->id }}">{{ $participant->name }}</label>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>

            <div class="d-grid gap-2 d-flex justify-content-end">
                <a href="{{ route('re-registrations.index') }}" type="button" class="btn btn-outline-primary px-5">
                    Cancel
                </a>
                <button type="submit" class="btn btn-primary px-5">Save</button>
            </div>
        </form>
    </div>

</x-app>
