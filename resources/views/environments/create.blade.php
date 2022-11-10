<x-app title="Create Promotion | NEO 2022">

    <x-slot name="navbarAdmin"></x-slot>

    <div class="container" style="padding: 6rem 0; max-width: 40rem">
        <h4 class="mb-4 fw-semibold text-primary">Create Environment</h4>

        <form method="POST" action="{{ route('environments.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="card card-custom mb-3">
                <div class="card-body">
                    <div class="row g-0 mb-3">
                        <label class="col-3 col-form-label">Name</label>
                        <input type="text" class="col form-control" name="name" required>
                    </div>
                    <div class="row g-0 mb-3">
                        <label class="col-3 col-form-label">Start Time</label>
                        <input type="datetime-local" class="col form-control" name="start_time">
                    </div>
                    <div class="row g-0 mb-3">
                        <label class="col-3 col-form-label">End Time</label>
                        <input type="datetime-local" class="col form-control" name="end_time">
                    </div>
                    <div class="row g-0 mb-3">
                        <label class="col-3 col-form-label">Enable</label>
                        <fieldset class="col">
                            <input type="radio" name="is_shown" class="btn-check" id="yes" value="1">
                            <label for="yes" class="btn btn-selection rounded-pill">Yes</label>

                            <input type="radio" name="is_shown" class="btn-check" id="no" value="0">
                            <label for="no" class="btn btn-selection rounded-pill">No</label>
                        </fieldset>
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
