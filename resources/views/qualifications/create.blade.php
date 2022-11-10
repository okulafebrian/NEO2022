<x-app title="{{ $round->name }} - {{ $competition->name }} | NEO 2022">
    <x-slot name="navbarAdmin"></x-slot>

    <div class="container" style="padding: 6rem 0; max-width: 40rem">
        <div class="mb-4">
            <h4 class="text-primary fw-semibold">{{ $round->name }} -
                {{ $competition->name == 'Speech' ? $competition->name . ' ' . $competition->category : $competition->name }}
            </h4>
            <p class="m-0 text-muted">
                Select the {{ $competition->name == 'Debate' ? 'teams' : 'participants' }} that qualify for this round
            </p>
        </div>

        <form method="POST" action="{{ route('qualifications.store') }}" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="round_id" value="{{ $round->id }}">

            <div class="card card-custom p-3 mb-3">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <input class="form-check-input me-1" type="checkbox" id="selectAll">
                        <label class="form-check-label stretched-link fw-semibold" for="selectAll">
                            Select all
                        </label>
                    </li>
                    @foreach ($registrationDetails as $registrationDetail)
                        @if ($competition->name == 'Debate')
                            <li class="list-group-item">
                                <input class="form-check-input me-1" type="checkbox" name="registration_detail_id[]"
                                    value="{{ $registrationDetail->id }}" id="T{{ $registrationDetail->id }}">
                                <label class="form-check-label stretched-link"
                                    for="T{{ $registrationDetail->id }}">{{ $registrationDetail->debateTeam->name }}</label>
                            </li>
                        @else
                            <li class="list-group-item">
                                <input class="form-check-input me-1" type="checkbox" name="registration_detail_id[]"
                                    value="{{ $registrationDetail->id }}"
                                    id="P{{ $registrationDetail->participants[0]->id }}">
                                <label class="form-check-label stretched-link"
                                    for="P{{ $registrationDetail->participants[0]->id }}">
                                    {{ $registrationDetail->participants[0]->name }}
                                </label>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>

            <div class="d-grid gap-2 d-flex justify-content-end">
                <a href="{{ route('qualifications.index') }}" type="button" class="btn btn-outline-primary py-2 px-5">
                    Cancel
                </a>
                <button type="submit" class="btn btn-primary py-2 px-5"
                    {{ count($registrationDetails) < 1 ? 'disabled' : '' }}>Save</button>
            </div>
        </form>
    </div>
</x-app>

<script>
    $('#selectAll').on('click', function() {
        $('input:checkbox').not(this).prop('checked', this.checked);
    })
</script>
