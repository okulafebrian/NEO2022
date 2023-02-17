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

                                <input type="radio" class="btn-check" id="competition" name="category"
                                    value="competition">
                                <label for="competition" class="btn btn-selection rounded-pill">Competition</label>
                            </fieldset>
                        </div>
                    </div>

                    <div id="subCategory" class="row mb-3 d-none">
                        <label class="col-3 col-form-label">Sub Category</label>
                        <div class="col">
                            <fieldset>
                                <input type="radio" class="btn-check" id="debate" name="sub_category"
                                    value="debate" disabled required>
                                <label for="debate" class="btn btn-selection rounded-pill">Debate</label>

                                <input type="radio" class="btn-check" id="newscasting" name="sub_category"
                                    value="newscasting" disabled>
                                <label for="newscasting" class="btn btn-selection rounded-pill">Newscasting</label>

                                <input type="radio" class="btn-check" id="ssw" name="sub_category"
                                    value="short story writing" disabled>
                                <label for="ssw" class="btn btn-selection rounded-pill">Short Story Writing</label>

                                <input type="radio" class="btn-check" id="speech" name="sub_category" disabled>
                                <label for="speech" class="btn btn-selection rounded-pill">Speech</label>
                            </fieldset>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-3 col-form-label">Title</label>
                        <div class="col">
                            <input type="text" class="form-control" name="title" required>
                        </div>
                    </div>

                    <div class="row">
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

    <script>
        $('input[name="category"]').on('change', function() {
            if ($(this).val() == 'competition') {
                $('#subCategory').removeClass('d-none')
                $('#subCategory').find('input').prop('disabled', false)
            } else {
                $('#subCategory').addClass('d-none')
                $('#subCategory').find('input').prop('disabled', true).prop('checked', false)
            }
        })
    </script>
</x-app>
