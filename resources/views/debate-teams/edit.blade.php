<x-app title="Edit Debate Team | NEO 2022">
    <x-slot name="navbarAdmin"></x-slot>

    <div class="container" style="padding: 6rem 0; max-width: 40rem">
        <h3 class="mb-4 text-primary">Edit Debate Team</h3>

        <form method="POST" action="{{ route('debate-teams.update', $debateTeam) }}" enctype="multipart/form-data">
            @csrf
            <div class="card card-custom mb-3">
                <div class="card-body">
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" value="{{ $debateTeam->name }}"
                                required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-grid gap-2 d-flex justify-content-end">
                <a href="{{ route('debate-teams.index') }}" type="button" class="btn btn-outline-primary px-5">
                    Cancel
                </a>
                @method('PUT')
                <button type="submit" class="btn btn-primary px-5">Save Changes</button>
            </div>
        </form>
    </div>
</x-app>
