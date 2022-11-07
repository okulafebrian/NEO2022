<x-app title="Add Round | NEO 2022">
    <x-slot name="navbarAdmin"></x-slot>

    <div class="container" style="padding: 6rem 0; max-width: 40rem">
        <h3 class="mb-4 text-primary">Add Competition Round</h3>

        <form method="POST" action="{{ route('rounds.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card card-custom mb-3">
                <div class="card-body">
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" required>
                        </div>
                    </div>
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
