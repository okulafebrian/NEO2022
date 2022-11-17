<x-app title="Add Access Control | NEO 2022">

    <x-slot name="navbarAdmin"></x-slot>

    <div class="container" style="padding: 6rem 0; max-width: 60rem">
        <h4 class="mb-4 fw-semibold text-primary">Add New Access Control</h4>

        <form method="POST" action="{{ route('access-controls.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card card-custom mb-3">
                <div class="card-body">
                    <div class="row mb-3">
                        <label class="col-3 col-form-label">Access Type</label>
                        <div class="col">
                            <select class="form-select" name="access_id" required>
                                <option selected disabled value="">Select access type</option>
                                @foreach ($accesses as $access)
                                    <option value="{{ $access->id }}">{{ $access->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-3 col-form-label">User</label>
                        <div class="col">
                            <select class="form-select" name="user_id" required>
                                <option selected disabled value="">Select user</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-grid gap-2 d-flex justify-content-end">
                <a href="{{ route('access-controls.index') }}" type="button" class="btn btn-outline-primary py-2 px-5">
                    Cancel
                </a>
                <button type="submit" class="btn btn-primary py-2 px-5">Add</button>
            </div>
        </form>
    </div>
</x-app>
