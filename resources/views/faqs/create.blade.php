<x-app title="Add FAQ | NEO 2022">

    <x-slot name="navbarAdmin"></x-slot>

    <div class="container" style="padding: 6rem 0; max-width: 60rem">
        <h4 class="mb-4 fw-semibold text-primary">Add New FAQ</h4>

        <form method="POST" action="{{ route('faqs.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card card-custom mb-3">
                <div class="card-body">
                    <div class="row mb-3">
                        <label class="col-3 col-form-label">Category</label>
                        <div class="col">
                            <fieldset>
                                <input type="radio" class="btn-check" id="general" name="category" value="general"
                                    required>
                                <label for="general" class="btn btn-selection rounded-pill">General</label>

                                <input type="radio" class="btn-check" id="accomodation" name="category"
                                    value="accomodation">
                                <label for="accomodation" class="btn btn-selection rounded-pill">Accomodation</label>

                                <input type="radio" class="btn-check" id="competition" name="category"
                                    value="competition">
                                <label for="competition" class="btn btn-selection rounded-pill">Competition</label>

                                <input type="radio" class="btn-check" id="technical" name="category"
                                    value="technical">
                                <label for="technical" class="btn btn-selection rounded-pill">Technical Problem</label>
                            </fieldset>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-3 col-form-label">Title</label>
                        <div class="col">
                            <input type="text" class="form-control" name="title" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-3 col-form-label">Description</label>
                        <div class="col">
                            <textarea class="form-control" name="description" rows="3" required></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-grid gap-2 d-flex justify-content-end">
                <a href="{{ route('faqs.manage') }}" type="button" class="btn btn-outline-primary py-2 px-5">
                    Cancel
                </a>
                <button type="submit" class="btn btn-primary py-2 px-5">Add</button>
            </div>
        </form>
    </div>
</x-app>
