<x-app title="Add Environment | NEO 2022">

    <x-slot name="navbarAdmin"></x-slot>

    <div class="container" style="padding: 6rem 0; max-width: 60rem">
        <h4 class="mb-4 fw-semibold text-primary">Add New Environment</h4>

        <form method="POST" action="{{ route('environments.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="card card-custom mb-3">
                <div class="card-body">
                    <div class="row g-0 mb-3">
                        <label class="col-3 col-form-label">Code</label>
                        <input type="text" class="col form-control" name="code" required>
                    </div>
                    <div class="row g-0 mb-3">
                        <label class="col-3 col-form-label">Name</label>
                        <input type="text" class="col form-control" name="name" required>
                    </div>
                    <div class="row g-0 mb-3">
                        <label class="col-3 col-form-label">Start Time</label>
                        <input type="datetime-local" class="col form-control" name="start_time" required>
                    </div>
                    <div class="row g-0">
                        <label class="col-3 col-form-label">End Time</label>
                        <input type="datetime-local" class="col form-control" name="end_time" required>
                    </div>
                </div>
            </div>

            <div class="d-grid gap-2 d-flex justify-content-end">
                <a href="{{ route('environments.index') }}" class="btn btn-outline-primary px-5">Cancel</a>
                <button type="submit" class="btn btn-primary px-5">Add</button>
            </div>
        </form>
    </div>
</x-app>
