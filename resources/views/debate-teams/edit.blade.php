<x-app title="Edit Debate Team | NEO 2022">
    <x-slot name="navbarAdmin"></x-slot>

    <div class="container" style="padding: 6rem 0; max-width: 60rem">
        <h4 class="mb-4 fw-semibold text-primary">Edit Debate Team</h4>

        <form method="POST" action="{{ route('debate-teams.update', $debateTeam) }}" enctype="multipart/form-data">
            @csrf
            <div class="card card-custom mb-3">
                <div class="card-body">
                    <div class="row mb-3">
                        <label class="col-3 col-form-label">Team Name</label>
                        <div class="col">
                            <input type="text" class="form-control" name="team_name" value="{{ $debateTeam->name }}"
                                required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-3 col-form-label">Speaker A</label>
                        <div class="col-7">
                            <input type="text" class="form-control" readonly
                                value="{{ $debateTeam->registrationDetail->participants[0]->name }}" required>
                        </div>
                        <div class="col text-end">
                            <button data-bs-toggle="modal" type="button"
                                data-bs-target="#sendAccountInfo{{ $debateTeam->registrationDetail->participants[0]->id }}"
                                class="btn btn-outline-light">
                                <i class="bi bi-envelope-paper"></i>
                            </button>
                            <a href="{{ route('participants.edit', $debateTeam->registrationDetail->participants[0]) }}"
                                target="_blank" class="btn btn-outline-light">
                                <i class="bi bi-pencil"></i>
                            </a>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-3 col-form-label">Speaker B</label>
                        <div class="col-7">
                            <input type="text" class="form-control" readonly
                                value="{{ $debateTeam->registrationDetail->participants[1]->name }}" required>
                        </div>
                        <div class="col text-end">
                            <button data-bs-toggle="modal" type="button"
                                data-bs-target="#sendAccountInfo{{ $debateTeam->registrationDetail->participants[1]->id }}"
                                class="btn btn-outline-light">
                                <i class="bi bi-envelope-paper"></i>
                            </button>
                            <a href="{{ route('participants.edit', $debateTeam->registrationDetail->participants[1]) }}"
                                target="_blank" class="btn btn-outline-light">
                                <i class="bi bi-pencil"></i>
                            </a>
                        </div>
                    </div>

                    <x-modal-confirmation action="sendAccountInfo" title="Send Account Info" name="participants"
                        :model='$debateTeam->registrationDetail->participants[0]'>
                        The participant account information will be sent to
                        {{ $debateTeam->registrationDetail->participants[0]->email }}
                    </x-modal-confirmation>

                    <x-modal-confirmation action="sendAccountInfo" title="Send Account Info" name="participants"
                        :model='$debateTeam->registrationDetail->participants[1]'>
                        The participant account information will be sent to
                        {{ $debateTeam->registrationDetail->participants[1]->email }}
                    </x-modal-confirmation>
                </div>
            </div>

            <div class="d-grid gap-2 d-flex justify-content-end">
                <a href="{{ route('participants.index') }}" type="button" class="btn btn-outline-primary py-2 px-5">
                    Cancel
                </a>
                @method('PUT')
                <button type="submit" class="btn btn-primary py-2 px-5">Save Changes</button>
            </div>
        </form>
    </div>
</x-app>
