<x-app title="Participant Account List | NEO 2022">

    <x-slot name="navbarAdmin"></x-slot>

    <div class="container" style="padding: 6rem 0; max-width: 60rem">
        <h4 class="mb-4 fw-semibold text-primary">Participant Account List</h4>

        <div class="card card-custom p-0 px-4 mb-3">
            <ul class="nav nav-tabs border-0" id="participantTab" role="tablist">
                @foreach ($competitions as $competition)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link {{ $loop->first ? 'active' : '' }}" data-bs-toggle="tab"
                            data-bs-target="#tab{{ $competition->id }}" type="button" role="tab">
                            {{ $competition->name != 'Speech' ? $competition->name : $competition->name . ' ' . $competition->category_init }}
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
                            @if (count($competition->participants) > 0)
                                <table class="table table-general">
                                    <thead class="table-light">
                                        <tr class="text-secondary">
                                            <th>NAME</th>
                                            <th>USERNAME</th>
                                            <th>PASSWORD</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($competition->participants as $participant)
                                            <x-modal-confirmation action="sendAccountInfo" title="Send Account Info"
                                                name="participants" :model='$participant'>
                                                The participant account information will be sent to
                                                {{ $participant->email }}
                                            </x-modal-confirmation>

                                            <tr>
                                                <td class="align-middle">{{ $participant->name }}</td>
                                                <td class="align-middle">{{ $participant->username }}</td>
                                                <td class="align-middle">
                                                    P{{ str_pad($participant->id, 3, '0', STR_PAD_LEFT) }}
                                                </td>
                                                <td class="align-middle text-end">
                                                    <button type="button" class="btn btn-outline-light"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#sendAccountInfo{{ $participant->id }}">
                                                        <i class="bi bi-envelope-paper me-2"></i>Send Account
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="text-center">
                                    <img src="/storage/images/assets/empty.webp" alt="No Registration Yet"
                                        width="20%">
                                    <h5 class="fw-semibold">No Participant Yet</h5>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app>
