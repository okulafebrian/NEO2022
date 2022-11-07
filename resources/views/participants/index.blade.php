<x-app title="Participants | NEO 2022">

    <x-slot name="navbarAdmin"></x-slot>
    <x-slot name="sidebarAdmin"></x-slot>

    <div class="container p-5">
        <h3 class="mb-4 text-primary">Participant List</h3>

        <div class="card card-custom p-0 px-4 mb-3">
            <ul class="nav nav-tabs border-0" id="participantTab" role="tablist">
                @foreach ($competitions as $competition)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link {{ $loop->first ? 'active' : '' }}" data-bs-toggle="tab"
                            data-bs-target="#tab{{ $competition->id }}" type="button" role="tab">
                            {{ $competition->name != 'Speech' ? $competition->name : $competition->name . ' - ' . $competition->category_init }}
                        </button>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="tab-content">
            @foreach ($competitions as $competition)
                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="tab{{ $competition->id }}"
                    role="tabpanel" tabindex="0">

                    @if (count($competition->participants) > 0)
                        <div class="card card-custom">
                            <div class="card-body">
                                <table class="table table-participant">
                                    <thead class="table-light">
                                        <tr class="text-secondary">
                                            <th></th>
                                            <th>NAME</th>
                                            <th>LEVEL</th>
                                            <th>LINE</th>
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
                                                    </ul>
                                                </td>

                                                <td class="d-none">{{ $participant->gender }}</td>
                                                <td class="d-none">{{ $participant->phone_number }}</td>
                                                <td class="d-none">{{ $participant->email }}</td>
                                                <td class="d-none">{{ $participant->province }}</td>
                                                <td class="d-none">{{ $participant->district }}</td>
                                                <td class="d-none">{{ $participant->address }}</td>
                                                <td class="d-none">
                                                    P{{ $participant->registrationDetail->competition_id . str_pad($participant->id, 3, '0', STR_PAD_LEFT) }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @else
                        <div class="card card-custom">
                            <div class="text-center mb-4">
                                <img src="/storage/images/assets/empty-cart.png" alt="" width="20%">
                                <h4>No Registration Yet</h4>
                            </div>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</x-app>
