<x-app title="Edit Environment | NEO 2022">

    <x-slot name="navbarAdmin"></x-slot>

    <div class="container" style="padding: 6rem 0; max-width: 60rem">
        <h4 class="mb-4 fw-semibold text-primary">Edit Environment</h4>

        <form method="POST" action="{{ route('environments.update', $environment) }}">
            @csrf

            <div class="card card-custom mb-3">
                <div class="card-body">
                    <div class="row g-0 mb-3">
                        <label class="col-3 col-form-label">Code</label>
                        <input type="text" class="col form-control" name="name" value="{{ $environment->code }}"
                            readonly>
                    </div>
                    <div class="row g-0 mb-3">
                        <label class="col-3 col-form-label">Name</label>
                        <input type="text" class="col form-control" name="name" value="{{ $environment->name }}"
                            required>
                    </div>
                    <div class="row g-0 mb-3">
                        <label class="col-3 col-form-label">Start Time</label>
                        <input type="datetime-local" class="col form-control" name="start_time"
                            value="{{ $environment->start_time }}" required>
                    </div>
                    <div class="row g-0">
                        <label class="col-3 col-form-label">End Time</label>
                        <input type="datetime-local" class="col form-control" name="end_time"
                            value="{{ $environment->end_time }}" required>
                    </div>
                </div>
            </div>

            <div class="d-grid gap-2 d-flex justify-content-end">
                <a href="{{ route('environments.index') }}" type="button" class="btn btn-outline-primary px-5">
                    Cancel
                </a>
                @method('PUT')
                <button type="submit" class="btn btn-primary px-5">Save Changes</button>
            </div>
        </form>
    </div>
</x-app>
