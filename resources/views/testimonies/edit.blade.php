<x-app title="Edit Testimony | NEO 2022">

    <x-slot name="navbarAdmin"></x-slot>

    <div class="container" style="padding: 6rem 0; max-width: 60rem">
        <h4 class="mb-4 fw-semibold text-primary">Edit Testimony</h4>

        <form method="POST" action="{{ route('testimonies.update', $testimony) }}" enctype="multipart/form-data">
            @csrf
            <div class="card card-custom mb-3">
                <div class="card-body">
                    <div class="row mb-3">
                        <label class="col-3 col-form-label">Name</label>
                        <div class="col">
                            <input type="text" class="form-control" name="name" value="{{ $testimony->name }}"
                                required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-3 col-form-label">Photo</label>
                        <div class="col">
                            <input class="form-control" type="file" name="photo">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-3 col-form-label">Role</label>
                        <div class="col">
                            <input type="text" class="form-control" name="role" value="{{ $testimony->role }}"
                                required>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-3 col-form-label">Description</label>
                        <div class="col">
                            <textarea class="form-control" name="description" rows="3" value="{{ $testimony->description }}" required>{{ $testimony->description }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-grid gap-2 d-flex justify-content-end">
                <a href="{{ route('testimonies.index') }}" type="button" class="btn btn-outline-primary py-2 px-5">
                    Cancel
                </a>
                @method('PUT')
                <button type="submit" class="btn btn-primary py-2 px-5">Save Changes</button>
            </div>
        </form>
    </div>
</x-app>
