<x-app title="Create Promotion | NEO 2022">

    <x-slot name="navbarAdmin"></x-slot>

    <div class="container" style="padding: 6rem 0; max-width: 40rem">
        <h3 class="mb-4 text-primary">Create Promotion</h3>

        <form method="POST" action="{{ route('environments.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="card card-custom mb-3">
                <div class="card-body">
                    <div class="row g-0 mb-3">
                        <label class="col-3 col-form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" class="col form-control" name="name" required>
                    </div>
                    <div class="row g-0 mb-3">
                        <label class="col-3 col-form-label">Start Time <span class="text-danger">*</span></label>
                        <input type="datetime-local" class="col form-control" name="start_time" required>
                    </div>
                    <div class="row g-0">
                        <label class="col-3 col-form-label">End Time <span class="text-danger">*</span></label>
                        <input type="datetime-local" class="col form-control" name="end_time" required>
                    </div>
                </div>
            </div>

            <div class="d-grid gap-2 d-flex justify-content-end">
                <a href="{{ route('environments.index') }}" class="btn btn-outline-primary px-5">Cancel</a>
                <button type="submit" class="btn btn-primary px-5">Create</button>
            </div>
        </form>
    </div>
</x-app>
