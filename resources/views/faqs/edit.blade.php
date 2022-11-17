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

                                <input type="radio" class="btn-check" id="accomodation" name="category"
                                    {{ $faq->category == 'accomodation' ? 'checked' : '' }} value="accomodation">
                                <label for="accomodation" class="btn btn-selection rounded-pill">Accomodation</label>

                                <input type="radio" class="btn-check" id="competition" name="category"
                                    {{ $faq->category == 'competition' ? 'checked' : '' }} value="competition">
                                <label for="competition" class="btn btn-selection rounded-pill">Competition</label>

                                <input type="radio" class="btn-check" id="technical" name="category"
                                    {{ $faq->category == 'technical' ? 'checked' : '' }} value="technical">
                                <label for="technical" class="btn btn-selection rounded-pill">Technical Problem</label>
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

                    <div class="row mb-3">
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
</x-app>
