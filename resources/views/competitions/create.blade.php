<x-app title="Add Competition | NEO 2022">

    <x-slot name="navbarAdmin"></x-slot>

    <div class="container" style="padding: 6rem 0; max-width: 60rem">
        <h3 class="mb-4">Add New Competition</h3>

        <form method="POST" action="{{ route('competitions.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card card-custom mb-3">
                <div class="card-body">
                    <h5 class="mb-4">Upload Logo</h5>
                    <div class="row">
                        <div class="col-3">
                            <label for="logo" class="col-form-label">
                                Competition Logo <span class="text-danger">*</span>
                            </label>
                            <div class="form-text pe-3">
                                The image format is .jpg .jpeg .png and a minimum size of 300 x 300px (For optimal
                                images use a minimum size of 700 x 700 px).
                            </div>
                        </div>
                        <div class="col">
                            <label for="logo">
                                <div class="input-img text-center text-secondary">
                                    <div class="input-img-label p-4">
                                        <img class="icon mb-2" src="/storage/images/assets/add-img.svg" width="70%">
                                        <small>Add Image</small>
                                    </div>
                                    <img class="img-preview" src="#" width="100%" style="visibility: hidden">
                                </div>
                            </label>
                            <input id="logo" name="logo" class="d-none form-control" type="file" required />
                        </div>
                    </div>
                </div>
            </div>

            <div class="card card-custom mb-3">
                <div class="card-body">
                    <h5 class="mb-4">Competition Details</h5>
                    <div class="row mb-3">
                        <label for="name" class="col-3 col-form-label">Competition Name <span
                                class="text-danger">*</span></label>
                        <div class="col">
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="category" class="col-3 col-form-label">Category <span
                                class="text-danger">*</span></label>
                        <div class="col">
                            <select id="category" class="form-select" name="category" required>
                                <option selected disabled value="">Select Category</option>
                                <option>Junior High School</option>
                                <option>Senior High School</option>
                                <option>Univeristy</option>
                                <option>Open Category</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="price" class="col-3 col-form-label">Price <span
                                class="text-danger">*</span></label>
                        <div class="input-group col">
                            <span class="input-group-text">Rp</span>
                            <input class="form-control price-format" type="text" id="price" name="price"
                                required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="quota" class="col-3 col-form-label">Quota <span
                                class="text-danger">*</span></label>
                        <div class="col">
                            <input class="form-control" type="number" id="quota" name="quota" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="ebooklet" class="col-3 col-form-label">E-Booklet</label>
                        <div class="col">
                            <input class="form-control" type="file" id="ebooklet" name="ebooklet">
                        </div>
                    </div>
                    <div class="row">
                        <label for="link_group" class="col-3 col-form-label">Link Group</label>
                        <div class="col">
                            <input class="form-control" type="text" id="link_group" name="link_group">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card card-custom mb-3">
                <div class="card-body">
                    <h5 class="mb-4">Content</h5>
                    <textarea class="form-control check-form" id="content" name="content" rows="10"></textarea>
                </div>
            </div>

            <div class="d-grid gap-2 d-flex justify-content-end">
                <a href="{{ route('competitions.index') }}" type="button" class="btn btn-outline-primary py-2 px-5">
                    Cancel
                </a>
                <button type="submit" class="btn btn-primary py-2 px-5">Create</button>
            </div>
        </form>
    </div>
</x-app>
