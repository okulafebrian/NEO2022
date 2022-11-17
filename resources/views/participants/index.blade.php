<x-app title="Participants | NEO 2022">

    <x-slot name="navbarAdmin"></x-slot>
    <x-slot name="sidebarAdmin"></x-slot>

    <div class="container p-5">
        <div class="d-flex justify-content-between">
            <h4 class="mb-4 fw-semibold text-primary">Participant List</h4>
            <div>
                <a href="{{ route('participants.export') }}" class="btn btn-outline-light">
                    <i class="bi bi-file-earmark-arrow-down me-1"></i> Export to Excel
                </a>
            </div>
        </div>


        <div class="card card-custom p-0 px-4 mb-3">
            <ul class="nav nav-tabs border-0" id="participantTab" role="tablist">
                @foreach ($competitions as $competition)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link {{ $loop->first ? 'active' : '' }}" data-bs-toggle="tab"
                            data-bs-target="#tab{{ $competition->id }}" type="button" role="tab">
                            {{ $competition->name != 'Speech' ? $competition->name : $competition->name . ' ' . $competition->category_init }}
                            ({{ $competition->registrationDetails->count() }})
                        </button>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="tab-content">
            @foreach ($competitions as $competition)
                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="tab{{ $competition->id }}"
                    role="tabpanel" tabindex="0">
                    <div class="card card-custom">
                        <div class="card-body">
                            @if (count($competition->debateTeams) > 0)
                                <table class="table table-debate">
                                    <thead class="table-light">
                                        <tr class="text-secondary">
                                            <th></th>
                                            <th>TEAM NAME</th>
                                            <th>SPEAKERS</th>
                                            <th>GRADE</th>
                                            <th>LINE ID</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($competition->debateTeams as $debateTeam)
                                            <tr>
                                                <td class="align-middle">
                                                    <button class="btn btn-outline-light btn-sm" type="button"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#show{{ $debateTeam->id }}">
                                                        <i class="fa-solid fa-chevron-down text-muted"></i>
                                                    </button>
                                                </td>
                                                <td class="align-middle">{{ $debateTeam->name }}</td>
                                                <td class="align-middle">
                                                    @foreach ($debateTeam->registrationDetail->participants as $participant)
                                                        {{ $participant->name }}<br>
                                                    @endforeach
                                                </td>
                                                <td class="align-middle">
                                                    @foreach ($debateTeam->registrationDetail->participants as $participant)
                                                        {{ $participant->grade }}<br>
                                                    @endforeach
                                                </td>
                                                <td class="align-middle">
                                                    @foreach ($debateTeam->registrationDetail->participants as $participant)
                                                        {{ $participant->line_id }}<br>
                                                    @endforeach
                                                </td>
                                                <td class="align-middle text-end">
                                                    <button class="btn btn-outline-light btn-sm" type="button"
                                                        data-bs-toggle="dropdown">
                                                        <i class="bi bi-three-dots-vertical text-muted"></i>
                                                    </button>
                                                    <ul class="dropdown-menu p-1 border-0 shadow-sm rounded-3">
                                                        <li>
                                                            <a href="{{ route('debate-teams.edit', $debateTeam) }}"
                                                                class="dropdown-item p-2 rounded-3" type="button">
                                                                <i class="bi bi-pencil me-2"></i>Edit Team
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>

                                            {{-- MODAL DEBATE TEAM --}}
                                            <div class="modal fade" id="show{{ $debateTeam->id }}" tabindex="-1">
                                                <div
                                                    class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                                    <div class="modal-content border-0">
                                                        <div
                                                            class="modal-header d-flex justify-content-between text-primary p-4">
                                                            <h5 class="m-auto">{{ $debateTeam->name }}</h5>
                                                            <i class="fa-solid fa-xmark fa-xl" role="button"
                                                                data-bs-dismiss="modal"></i>
                                                        </div>
                                                        <div class="modal-body p-4 text-start">
                                                            <div class="row">
                                                                @foreach ($debateTeam->registrationDetail->participants as $participant)
                                                                    <div class="col-6 {{ $loop->first ? 'border-end' : '' }}"
                                                                        style="font-size: 13px;">
                                                                        <div class="row g-0 mb-2">
                                                                            <div class="col-3 text-muted">Name</div>
                                                                            <div class="col-1 text-muted">:</div>
                                                                            <div class="col">
                                                                                {{ $participant->name }}
                                                                            </div>
                                                                        </div>
                                                                        <div class="row g-0 mb-2">
                                                                            <div class="col-3 text-muted">Grade</div>
                                                                            <div class="col-1 text-muted">:</div>
                                                                            <div class="col">
                                                                                {{ $participant->grade }}
                                                                            </div>
                                                                        </div>
                                                                        <div class="row g-0 mb-2">
                                                                            <div class="col-3 text-muted">LINE ID</div>
                                                                            <div class="col-1 text-muted">:</div>
                                                                            <div class="col">
                                                                                {{ $participant->line_id }}
                                                                            </div>
                                                                        </div>
                                                                        <div class="row g-0 mb-2">
                                                                            <div class="col-3 text-muted">Institution
                                                                            </div>
                                                                            <div class="col-1 text-muted">:</div>
                                                                            <div class="col">
                                                                                {{ $participant->institution }}
                                                                            </div>
                                                                        </div>
                                                                        <div class="row g-0 mb-2">
                                                                            <div class="col-3 text-muted">Gender</div>
                                                                            <div class="col-1 text-muted">:</div>
                                                                            <div class="col">
                                                                                {{ $participant->gender }}
                                                                            </div>
                                                                        </div>
                                                                        <div class="row g-0 mb-2">
                                                                            <div class="col-3 text-muted">Phone</div>
                                                                            <div class="col-1 text-muted">:</div>
                                                                            <div class="col">
                                                                                {{ $participant->phone_number }}
                                                                            </div>
                                                                        </div>
                                                                        <div class="row g-0 mb-2">
                                                                            <div class="col-3 text-muted">Email</div>
                                                                            <div class="col-1 text-muted">:</div>
                                                                            <div class="col">
                                                                                {{ $participant->email }}
                                                                            </div>
                                                                        </div>
                                                                        <div class="row g-0 mb-2">
                                                                            <div class="col-3 text-muted">Province</div>
                                                                            <div class="col-1 text-muted">:</div>
                                                                            <div class="col">
                                                                                {{ $participant->province }}
                                                                            </div>
                                                                        </div>
                                                                        <div class="row g-0 mb-2">
                                                                            <div class="col-3 text-muted">District/City
                                                                            </div>
                                                                            <div class="col-1 text-muted">:</div>
                                                                            <div class="col">
                                                                                {{ $participant->district }}
                                                                            </div>
                                                                        </div>
                                                                        <div class="row g-0 mb-2">
                                                                            <div class="col-3 text-muted">Address</div>
                                                                            <div class="col-1 text-muted">:</div>
                                                                            <div class="col">
                                                                                {{ $participant->address }}
                                                                            </div>
                                                                        </div>
                                                                        @if ($participant->binusian)
                                                                            <div class="row g-0 mb-2">
                                                                                <div class="col-3 text-muted">NIM
                                                                                </div>
                                                                                <div class="col-1 text-muted">:</div>
                                                                                <div class="col">
                                                                                    {{ $participant->binusian->nim }}
                                                                                </div>
                                                                            </div>
                                                                            <div class="row g-0 mb-2">
                                                                                <div class="col-3 text-muted">Region
                                                                                </div>
                                                                                <div class="col-1 text-muted">:</div>
                                                                                <div class="col">
                                                                                    {{ $participant->binusian->region }}
                                                                                </div>
                                                                            </div>
                                                                        @endif
                                                                        <div class="row g-0 mb-2">
                                                                            <div class="col-3 text-muted">Username
                                                                            </div>
                                                                            <div class="col-1 text-muted">:</div>
                                                                            <div class="col">
                                                                                {{ $participant->username }}
                                                                            </div>
                                                                        </div>
                                                                        <div class="row g-0 mb-2">
                                                                            <div class="col-3 text-muted">Password
                                                                            </div>
                                                                            <div class="col-1 text-muted">:</div>
                                                                            <div class="col">
                                                                                P{{ str_pad($participant->id, 3, '0', STR_PAD_LEFT) }}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            @elseif (count($competition->participants) > 0)
                                <table class="table table-participant">
                                    <thead class="table-light">
                                        <tr class="text-secondary">
                                            <th></th>
                                            <th>NAME</th>
                                            <th>GRADE</th>
                                            <th>LINE ID</th>
                                            <th>INSTITUTION</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($competition->participants as $participant)
                                            <tr>
                                                <td>
                                                    <button class="btn btn-outline-light btn-sm toggleChevron"
                                                        type="button">
                                                        <i class="fa-solid fa-chevron-down text-muted"></i>
                                                    </button>
                                                </td>
                                                <td class="align-middle">{{ $participant->name }}</td>
                                                <td class="align-middle">{{ $participant->grade }}</td>
                                                <td class="align-middle">{{ $participant->line_id }}</td>
                                                <td class="align-middle">{{ $participant->institution }}</td>
                                                <td class="align-middle text-end">
                                                    <button class="btn btn-outline-light btn-sm" type="button"
                                                        data-bs-toggle="dropdown">
                                                        <i class="bi bi-three-dots-vertical text-muted"></i>
                                                    </button>
                                                    <ul class="dropdown-menu p-1 border-0 shadow-sm rounded-3">
                                                        <li>
                                                            <a href="{{ route('participants.edit', $participant) }}"
                                                                class="dropdown-item p-2 rounded-3" type="button">
                                                                <i class="bi bi-pencil me-2"></i>Edit Participant
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <button type="button" data-bs-toggle="modal"
                                                                data-bs-target="#sendAccountInfo{{ $participant->id }}"
                                                                class="dropdown-item p-2 rounded-3">
                                                                <i class="bi bi-envelope-paper me-2"></i>Send Account
                                                                Info
                                                            </button>
                                                        </li>
                                                    </ul>
                                                </td>

                                                <td class="d-none">{{ $participant->gender }}</td>
                                                <td class="d-none">{{ $participant->phone_number }}</td>
                                                <td class="d-none">{{ $participant->email }}</td>
                                                <td class="d-none">{{ $participant->province }}</td>
                                                <td class="d-none">{{ $participant->district }}</td>
                                                <td class="d-none">
                                                    {{ $participant->binusian ? $participant->binusian->nim : '' }}
                                                </td>
                                                <td class="d-none">
                                                    {{ $participant->binusian ? $participant->binusian->region : '' }}
                                                </td>
                                                <td class="d-none">{{ $participant->address }}</td>
                                                <td class="d-none">{{ $participant->username }}</td>
                                                <td class="d-none">
                                                    P{{ str_pad($participant->id, 3, '0', STR_PAD_LEFT) }}
                                                </td>
                                            </tr>

                                            <x-modal-confirmation action="sendAccountInfo" title="Send Account Info"
                                                name="participants" :model='$participant'>
                                                The participant account information will be sent to
                                                {{ $participant->email }}
                                            </x-modal-confirmation>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="text-center">
                                    <img src="/storage/images/assets/empty.webp" alt="No Registration Yet"
                                        width="20%">
                                    <h5 class="fw-semibold">No Registration Yet</h5>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app>
