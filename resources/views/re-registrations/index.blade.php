<x-app title="Qualifications | NEO 2022">

    <x-slot name="navbarAdmin"></x-slot>
    <x-slot name="sidebarAdmin"></x-slot>

    <div class="container p-5">
        <h4 class="mb-4 text-primary fw-semibold">Re-Registration List</h4>

        <div class="card card-custom p-0 px-4 mb-3">
            <ul class="nav nav-tabs border-0" id="participantTab" role="tablist">
                @foreach ($rounds as $round)
                    @if ($round->name == 'Semifinal')
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" data-bs-toggle="tab"
                                data-bs-target="#participantTab{{ $round->id }}" type="button" role="tab">
                                {{ $round->name }}
                            </button>
                        </li>
                    @endif
                @endforeach
        </div>

        <div class="tab-content">
            @foreach ($rounds as $round)
                @if ($round->name == 'Semifinal')
                    <div class="tab-pane fade show active" id="participantTab{{ $round->id }}" role="tabpanel"
                        tabindex="0">

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
                                                            @if ($competition->name == 'Debate')
                                                                <th class="align-middle">SPEAKERS</th>
                                                            @endif
                                                            <th class="align-middle text-center">VACCINATION</th>
                                                            <th class="align-middle">ALLERGIC</th>
                                                            <th class="align-middle">STATUS</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($qualifications[$round->id][$competition->id] as $qualification)
                                                            <tr>
                                                                <td class="align-middle">
                                                                    {{ $competition->name == 'Debate' ? $qualification->registrationDetail->debateTeam->name : $qualification->registrationDetail->participants[0]->name }}
                                                                </td>
                                                                @if ($competition->name == 'Debate')
                                                                    <td class="align-middle">
                                                                        {{ $qualification->registrationDetail->participants[0]->name }}<br>
                                                                        {{ $qualification->registrationDetail->participants[1]->name }}
                                                                    </td>
                                                                @endif
                                                                <td class="align-middle text-center">
                                                                    @if ($qualification->registrationDetail->participants[0]->vaccination)
                                                                        <a href="/storage/vaccinations/{{ $qualification->registrationDetail->participants[0]->vaccination }}"
                                                                            target="_blank"
                                                                            class="btn btn-outline-light btn-sm">
                                                                            <i class="bi bi-image"></i>
                                                                        </a>
                                                                    @else
                                                                        -
                                                                    @endif

                                                                    @if ($competition->name == 'Debate')
                                                                        <br>
                                                                        @if ($qualification->registrationDetail->participants[1]->vaccination)
                                                                            <a href="/storage/vaccinations/{{ $qualification->registrationDetail->participants[1]->vaccination }}"
                                                                                target="_blank"
                                                                                class="btn btn-outline-light btn-sm mt-1">
                                                                                <i class="bi bi-image"></i>
                                                                            </a>
                                                                        @else
                                                                            -
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                                <td class="align-middle">
                                                                    @if ($competition->name == 'Debate')
                                                                        {{ $qualification->registrationDetail->participants[0]->allergy ? $qualification->registrationDetail->participants[0]->allergy : '-' }}
                                                                        <br>
                                                                        {{ $qualification->registrationDetail->participants[1]->allergy ? $qualification->registrationDetail->participants[1]->allergy : '-' }}
                                                                    @else
                                                                        {{ $qualification->registrationDetail->participants[0]->allergy ? $qualification->registrationDetail->participants[0]->allergy : '-' }}
                                                                    @endif
                                                                </td>
                                                                <td class="align-middle">
                                                                    @if ($qualification->registrationDetail->participants[0]->vaccination)
                                                                        <span class="text-success">Confirmed</span>
                                                                    @else
                                                                        <span class="text-danger">Unconfirmed</span>
                                                                    @endif

                                                                    @if ($competition->name == 'Debate')
                                                                        <br>
                                                                        @if ($qualification->registrationDetail->participants[1]->vaccination)
                                                                            <span class="text-success">Confirmed</span>
                                                                        @else
                                                                            <span class="text-danger">Unconfirmed</span>
                                                                        @endif
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
                @endif
            @endforeach
        </div>
    </div>
</x-app>
