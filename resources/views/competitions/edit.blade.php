<x-app title="Edit Competition | NEO 2022">

    <x-slot name="navbarAdmin"></x-slot>

    <div class="container" style="padding: 6rem 0; max-width: 60rem">
        <h3 class="mb-4">Edit Competition</h3>

        <form method="POST" action="{{ route('competitions.update', $competition) }}" enctype="multipart/form-data">
            @csrf
            <div class="card card-custom mb-3">
                <div class="card-body">
                    <h5 class="mb-4">Upload Logo</h5>

                    <div class="row">
                        <div class="col-3">
                            <label for="logo" class="col-form-label">
                                Competition Logo <span class="text-danger">*</span>
                            </label>
                            <div class="form-text">
                                The image format is .jpg .jpeg .png and a minimum size of 300 x 300px (For optimal
                                images use a minimum size of 700 x 700 px).
                            </div>
                        </div>
                        <div class="col offset-1">
                            <label for="logo">
                                <div class="input-img text-center text-secondary">
                                    <img class="img-preview" src="/storage/images/logos/{{ $competition->logo }}"
                                        width="100%">
                                </div>
                            </label>
                            <input id="logo" name="logo" type="file" required
                                class="d-none form-control @error('logo') is-invalid @enderror" />
                            @error('logo')
                                <div class="invalid-feedback">
                                    Mininum size: 300 x 300px and maximum size: 700 x 700px.
                                </div>

                                <style>
                                    .input-img {
                                        border-color: red;
                                    }
                                </style>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="card card-custom mb-3">
                <div class="card-body">
                    <h5 class="mb-4">Competition Details</h5>

                    <div class="row mb-3">
                        <label for="name" class="col-4 col-form-label">Competition Name <span
                                class="text-danger">*</span></label>
                        <div class="col">
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $competition->name }}" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="category" class="col-4 col-form-label">Category <span
                                class="text-danger">*</span></label>
                        <div class="col">
                            <select id="category" class="form-select" name="category" required>
                                <option selected disabled value="">Select Category</option>
                                <option {{ $competition->category == 'Junior High School' ? 'selected' : '' }}>
                                    Junior High School
                                </option>
                                <option {{ $competition->category == 'Senior High School' ? 'selected' : '' }}>
                                    Senior High School</option>
                                <option {{ $competition->category == 'Univeristy' ? 'selected' : '' }}>
                                    Univeristy
                                </option>
                                <option {{ $competition->category == 'Open Category' ? 'selected' : '' }}>
                                    Open Category
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="price" class="col-4 col-form-label">Price <span
                                class="text-danger">*</span></label>
                        <div class="input-group col">
                            <span class="input-group-text">Rp</span>
                            <input class="form-control price-format" type="text" id="price" name="price"
                                value="{{ $competition->price }}" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="quota" class="col-4 col-form-label">Quota <span
                                class="text-danger">*</span></label>
                        <div class="col">
                            <input class="form-control" type="number" id="quota" name="quota"
                                value="{{ $competition->quota }}" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="ebooklet" class="col-4 col-form-label">E-Booklet</label>
                        <div class="col">
                            <input class="form-control" type="file" id="ebooklet" name="ebooklet"
                                value="{{ $competition->ebooklet }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="link_group" class="col-4 col-form-label">Link Group</label>
                        <div class="col">
                            <input class="form-control" type="text" id="link_group" name="link_group"
                                value="{{ $competition->link_group }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card card-custom mb-3">
                <div class="card-body">
                    <h5 class="mb-4">Content</h5>
                    <textarea class="form-control check-form" id="content" name="content" rows="10">
                        {{ $competition->content }}
                    </textarea>
                </div>
            </div>

            <div class="d-grid gap-2 d-flex justify-content-end">
                <a href="{{ route('competitions.index') }}" type="button" class="btn btn-outline-primary py-2 px-5">
                    Cancel
                </a>
                @method('PUT')
                <button type="submit" class="btn btn-primary py-2 px-5">Save Changes</button>
            </div>
        </form>
    </div>
</x-app>
