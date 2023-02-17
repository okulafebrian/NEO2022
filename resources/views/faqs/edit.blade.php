<x-app title="Edit FAQ | NEO 2022">

    <x-slot name="navbarAdmin"></x-slot>

    <div class="container" style="padding: 6rem 0; max-width: 60rem">
        <h4 class="mb-4 fw-semibold text-primary">Edit FAQ</h4>

        <form method="POST" action="{{ route('faqs.update', $faq) }}" enctype="multipart/form-data">
            @csrf
            <div class="card card-custom mb-3">
                <div class="card-body">
                    <div class="row mb-3">
                        <label class="col-3 col-form-label">Category</label>
                        <div class="col">
                            <fieldset>
                                <input type="radio" class="btn-check" id="general" name="category" value="general"
                                    {{ $faq->category == 'general' ? 'checked' : '' }} required>
                                <label for="general" class="btn btn-selection rounded-pill">General</label>

                                <input type="radio" class="btn-check" id="competition" name="category"
                                    {{ $faq->category == 'competition' ? 'checked' : '' }} value="competition">
                                <label for="competition" class="btn btn-selection rounded-pill">Competition</label>
                            </fieldset>
                        </div>
                    </div>

                    <div id="subCategory" class="row mb-3 d-none">
                        <label class="col-3 col-form-label">Sub Category</label>
                        <div class="col">
                            <fieldset>
                                <input type="radio" class="btn-check" id="debate" name="sub_category"
                                    value="debate" {{ $faq->sub_category == 'debate' ? 'checked' : '' }} disabled
                                    required>
                                <label for="debate" class="btn btn-selection rounded-pill">Debate</label>

                                <input type="radio" class="btn-check" id="newscasting" name="sub_category"
                                    value="newscasting" {{ $faq->sub_category == 'newscasting' ? 'checked' : '' }}
                                    disabled>
                                <label for="newscasting" class="btn btn-selection rounded-pill">Newscasting</label>

                                <input type="radio" class="btn-check" id="ssw" name="sub_category"
                                    value="short story writing"
                                    {{ $faq->sub_category == 'short story writing' ? 'checked' : '' }} disabled>
                                <label for="ssw" class="btn btn-selection rounded-pill">Short Story Writing</label>

                                <input type="radio" class="btn-check" id="speech" name="sub_category"
                                    value="speech" {{ $faq->sub_category == 'speech' ? 'checked' : '' }} disabled>
                                <label for="speech" class="btn btn-selection rounded-pill">Speech</label>
                            </fieldset>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-3 col-form-label">Title</label>
                        <div class="col">
                            <input type="text" class="form-control" name="title" value="{{ $faq->title }}"
                                required>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-3 col-form-label">Description</label>
                        <div class="col">
                            <textarea class="form-control" name="description" value="{{ $faq->description }}" rows="3" required>{{ $faq->description }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-grid gap-2 d-flex justify-content-end">
                <a href="{{ route('faqs.manage') }}" type="button" class="btn btn-outline-primary py-2 px-5">
                    Cancel
                </a>
                @method('PUT')
                <button type="submit" class="btn btn-primary py-2 px-5">Save Changes</button>
            </div>
        </form>
    </div>

    <script>
        if ($('input[name="category"]:checked').val() == 'competition') {
            $('#subCategory').removeClass('d-none')
            $('#subCategory').find('input').prop('disabled', false)
        }

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
