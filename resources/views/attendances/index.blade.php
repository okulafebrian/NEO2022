<x-app title="Attendances | NEO 2022">

    <x-slot name="navbarAdmin"></x-slot>
    <x-slot name="sidebarAdmin"></x-slot>

    <div class="container p-5">
        <h4 class="mb-4 text-primary fw-semibold">Attendance List</h4>

        <div class="card card-custom p-0 px-4 mb-3">
            <ul class="nav nav-tabs border-0" id="participantTab" role="tablist">
                @foreach ($rounds as $round)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link {{ $loop->first ? 'active' : '' }}" data-bs-toggle="tab"
                            data-bs-target="#participantTab{{ $round->id }}" type="button" role="tab">
                            {{ $round->name }}
                        </button>
                    </li>
                @endforeach
        </div>

        <div class="tab-content">
            @foreach ($rounds as $round)
                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                    id="participantTab{{ $round->id }}" role="tabpanel" tabindex="0">

                    <div class="card card-custom">
                        <div class="card-body">
                            <ul class="nav nav-pills mb-3" id="competitionTab" role="tablist">
                                @foreach ($competitions as $competition)
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link {{ $loop->first ? 'active' : 'mx-1' }}"
                                            data-bs-toggle="pill"
                                            data-bs-target="#competitionTab{{ $competition->id }}{{ $round->id }}"
                                            type="button" role="tab">
                                            {{ $competition->name != 'Speech' ? $competition->name : $competition->name . ' ' . $competition->category }}
                                        </button>
                                    </li>
                                @endforeach
                            </ul>

                            <div class="tab-content">
                                @foreach ($competitions as $competition)
                                    <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                        id="competitionTab{{ $competition->id }}{{ $round->id }}" role="tabpanel"
                                        tabindex="0">
                                        @if (count($qualifications[$round->id][$competition->id]) > 0)
                                            <table class="table">
                                                <thead class="table-light">
                                                    <tr class="text-secondary">
                                                        <th class="align-middle">
                                                            {{ $competition->name == 'Debate' ? 'TEAM NAME' : 'NAME' }}
                                                        </th>
                                                        <th class="align-middle">CHECK-IN TIME</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($qualifications[$round->id][$competition->id] as $qualification)
                                                        <tr>
                                                            <td class="align-middle">
                                                                {{ $competition->name == 'Debate' ? $qualification->registrationDetail->debateTeam->name : $qualification->registrationDetail->participants[0]->name }}
                                                            </td>
                                                            <td class="align-middle">
                                                                @if ($qualification->attendance)
                                                                    {{ date('j M, H:i', strtotime($qualification->attendance->created_at)) }}
                                                                @else
                                                                    <span class="text-danger fw-semibold">Absence</span>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        @else
                                            <div class="text-center">
                                                <img src="/storage/images/assets/empty.webp" alt="No Data Found"
                                                    width="20%">
                                                <h5 class="mb-3 fw-semibold">No Data Found</h5>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app>
