<x-app title="Edit Companion | NEO 2022">

    <x-slot name="navbarAdmin"></x-slot>

    <div class="container" style="padding: 6rem 0; max-width: 60rem">
        <h4 class="mb-4 fw-semibold text-primary">Edit Companion</h4>

        <form method="POST" action="{{ route('companions.update', $companion) }}" enctype="multipart/form-data">
            @csrf

            <div class="card card-custom mb-3">
                <div class="card-body">
                    <div class="row mb-3">
                        <label class="col-3 col-form-label">Name</label>
                        <div class="col">
                            <input type="text" class="form-control" name="name" value="{{ $companion->name }}"
                                required>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-3 col-form-label">Phone Number</label>
                        <div class="col">
                            <input type="text" class="form-control" name="phone_number"
                                value="{{ $companion->phone_number }}" required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-grid gap-2 d-flex justify-content-end">
                <a href="{{ route('companions.index') }}" type="button" class="btn btn-outline-primary py-2 px-5">
                    Cancel
                </a>
                @method('PUT')
                <button type="submit" class="btn btn-primary py-2 px-5">Save Changes</button>
            </div>
        </form>
    </div>
</x-app>
