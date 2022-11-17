<x-app title="FAQ | NEO 2022">

    <x-slot name="navbarAdmin"></x-slot>
    <x-slot name="sidebarAdmin"></x-slot>

    <div class="container p-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="m-0 fw-semibold text-primary">FAQ List</h4>
            <div>
                <button type="button" class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#importFAQ">
                    <i class="bi bi-file-earmark-arrow-up me-2"></i>Import FAQ
                </button>

                <div id="importFAQ" class="modal fade" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered" style="max-width: 28rem">
                        <div class="modal-content border-0 shadow py-3">
                            <div class="modal-header">
                                <h5 class="fw-semibold m-auto ">Import FAQ</h5>
                            </div>
                            <form method="POST" action="{{ route('faqs.import') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <label class="form-label">Upload Excel File</label>
                                    <input class="form-control" type="file" name="file" required>
                                </div>
                                <div class="row g-3 p-3">
                                    <div class="col-6">
                                        <button type="button" class="btn btn-outline-light py-2 w-100"
                                            data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-primary py-2 w-100">Import</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <a type="button" href="{{ route('faqs.create') }}" class="btn btn-outline-light">
                    <i class="fa-solid fa-plus me-2"></i>Add FAQ
                </a>
            </div>
        </div>

        <div class="card card-custom p-0 px-4 mb-3">
            <ul class="nav nav-tabs border-0" id="participantTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab1" type="button"
                        role="tab">
                        General
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab2" type="button" role="tab">
                        Accomodation
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab3" type="button" role="tab">
                        Competition
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab4" type="button" role="tab">
                        Technical Problems
                    </button>
                </li>
            </ul>
        </div>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="tab1" role="tabpanel" tabindex="0">
                <div class="card card-custom">
                    <div class="card-body">
                        @if ($generalFaqs->count() > 0)
                            <table class="table">
                                <thead>
                                    <tr class="text-secondary">
                                        <th>TITLE</th>
                                        <th>DESCRIPTION</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($generalFaqs as $faq)
                                        <x-modal-confirmation action="destroy" title="Delete FAQ" name="faqs"
                                            :model=$faq>
                                            Are you sure want to delete this faq?
                                        </x-modal-confirmation>

                                        <tr>
                                            <td class="align-middle">{{ $faq->title }}</td>
                                            <td class="align-middle">{{ $faq->description }}</td>
                                            <td class="align-middle text-end">
                                                <div class="dropdown">
                                                    <button class="btn btn-outline-light btn-sm" type="button"
                                                        data-bs-toggle="dropdown">
                                                        <i class="bi bi-three-dots-vertical text-muted"></i>
                                                    </button>
                                                    <ul class="dropdown-menu p-1 border-0 shadow-sm rounded-3">
                                                        <li>
                                                            <a class="dropdown-item p-2 rounded-3"
                                                                href="{{ route('faqs.edit', $faq) }}">
                                                                <i class="bi bi-pencil me-2"></i>Edit
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <button type="button" class="dropdown-item p-2 rounded-3"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#destroy{{ $faq->id }}">
                                                                <i class="bi bi-trash3 me-2"></i>Delete
                                                            </button>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="text-center">
                                <img src="/storage/images/assets/empty.webp" alt="No FAQ Yet" width="20%">
                                <h5 class="fw-semibold">No FAQ Yet</h5>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="tab2" role="tabpanel" tabindex="0">
                <div class="card card-custom">
                    <div class="card-body">
                        @if ($accomodationFaqs->count() > 0)
                            <table class="table">
                                <thead>
                                    <tr class="text-secondary">
                                        <th>TITLE</th>
                                        <th>DESCRIPTION</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($accomodationFaqs as $faq)
                                        <x-modal-confirmation action="destroy" title="Delete FAQ" name="faqs"
                                            :model=$faq>
                                            Are you sure want to delete this faq?
                                        </x-modal-confirmation>

                                        <tr>
                                            <td class="align-middle">{{ $faq->title }}</td>
                                            <td class="align-middle">{{ $faq->description }}</td>
                                            <td class="align-middle text-end">
                                                <div class="dropdown">
                                                    <button class="btn btn-outline-light btn-sm" type="button"
                                                        data-bs-toggle="dropdown">
                                                        <i class="bi bi-three-dots-vertical text-muted"></i>
                                                    </button>
                                                    <ul class="dropdown-menu p-1 border-0 shadow-sm rounded-3">
                                                        <li>
                                                            <a class="dropdown-item p-2 rounded-3"
                                                                href="{{ route('faqs.edit', $faq) }}">
                                                                <i class="bi bi-pencil me-2"></i>Edit
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <button type="button" class="dropdown-item p-2 rounded-3"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#destroy{{ $faq->id }}">
                                                                <i class="bi bi-trash3 me-2"></i>Delete
                                                            </button>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="text-center">
                                <img src="/storage/images/assets/empty.webp" alt="No FAQ Yet" width="20%">
                                <h5 class="fw-semibold">No FAQ Yet</h5>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="tab3" role="tabpanel" tabindex="0">
                <div class="card card-custom">
                    <div class="card-body">
                        @if ($competitionFaqs->count() > 0)
                            <table class="table">
                                <thead>
                                    <tr class="text-secondary">
                                        <th>TITLE</th>
                                        <th>DESCRIPTION</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($competitionFaqs as $faq)
                                        <x-modal-confirmation action="destroy" title="Delete FAQ" name="faqs"
                                            :model=$faq>
                                            Are you sure want to delete this faq?
                                        </x-modal-confirmation>

                                        <tr>
                                            <td class="align-middle">{{ $faq->title }}</td>
                                            <td class="align-middle">{{ $faq->description }}</td>
                                            <td class="align-middle text-end">
                                                <div class="dropdown">
                                                    <button class="btn btn-outline-light btn-sm" type="button"
                                                        data-bs-toggle="dropdown">
                                                        <i class="bi bi-three-dots-vertical text-muted"></i>
                                                    </button>
                                                    <ul class="dropdown-menu p-1 border-0 shadow-sm rounded-3">
                                                        <li>
                                                            <a class="dropdown-item p-2 rounded-3"
                                                                href="{{ route('faqs.edit', $faq) }}">
                                                                <i class="bi bi-pencil me-2"></i>Edit
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <button type="button" class="dropdown-item p-2 rounded-3"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#destroy{{ $faq->id }}">
                                                                <i class="bi bi-trash3 me-2"></i>Delete
                                                            </button>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="text-center">
                                <img src="/storage/images/assets/empty.webp" alt="No FAQ Yet" width="20%">
                                <h5 class="fw-semibold">No FAQ Yet</h5>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="tab4" role="tabpanel" tabindex="0">
                <div class="card card-custom">
                    <div class="card-body">
                        @if ($technicalFaqs->count() > 0)
                            <table class="table">
                                <thead>
                                    <tr class="text-secondary">
                                        <th>TITLE</th>
                                        <th>DESCRIPTION</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($technicalFaqs as $faq)
                                        <x-modal-confirmation action="destroy" title="Delete FAQ" name="faqs"
                                            :model=$faq>
                                            Are you sure want to delete this faq?
                                        </x-modal-confirmation>

                                        <tr>
                                            <td class="align-middle">{{ $faq->title }}</td>
                                            <td class="align-middle">{{ $faq->description }}</td>
                                            <td class="align-middle text-end">
                                                <div class="dropdown">
                                                    <button class="btn btn-outline-light btn-sm" type="button"
                                                        data-bs-toggle="dropdown">
                                                        <i class="bi bi-three-dots-vertical text-muted"></i>
                                                    </button>
                                                    <ul class="dropdown-menu p-1 border-0 shadow-sm rounded-3">
                                                        <li>
                                                            <a class="dropdown-item p-2 rounded-3"
                                                                href="{{ route('faqs.edit', $faq) }}">
                                                                <i class="bi bi-pencil me-2"></i>Edit
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <button type="button" class="dropdown-item p-2 rounded-3"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#destroy{{ $faq->id }}">
                                                                <i class="bi bi-trash3 me-2"></i>Delete
                                                            </button>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="text-center">
                                <img src="/storage/images/assets/empty.webp" alt="No FAQ Yet" width="20%">
                                <h5 class="fw-semibold">No FAQ Yet</h5>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app>
