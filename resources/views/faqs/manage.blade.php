<x-app title="Manage FAQ | NEO 2022">

    <x-slot name="navbarAdmin"></x-slot>
    <x-slot name="sidebarAdmin"></x-slot>

    <div class="container p-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="m-0 fw-semibold text-primary">FAQ List</h4>
            <a type="button" href="{{ route('faqs.create') }}" class="btn btn-outline-light">
                <i class="fa-solid fa-plus me-2"></i>Add FAQ
            </a>
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
                        Competition
                    </button>
                </li>
            </ul>
        </div>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="tab1" role="tabpanel" tabindex="0">
                <div class="card card-custom">
                    <div class="card-body">
                        @if ($generalFaqs->count() > 0)
                            <table class="table table-general">
                                <thead>
                                    <tr class="text-secondary">
                                        <th class="d-none"></th>
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
                                            <td class="d-none">{{ $faq->id }}</td>
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
                        @if ($competitionFaqs->count() > 0)
                            <ul class="nav nav-pills gap-2 mb-4" id="competitionTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#debateTab"
                                        type="button" role="tab">
                                        Debate
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" data-bs-toggle="pill" data-bs-target="#newscastingTab"
                                        type="button" role="tab">
                                        Newscasting
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" data-bs-toggle="pill" data-bs-target="#sswTab"
                                        type="button" role="tab">
                                        Short Story Writing
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" data-bs-toggle="pill" data-bs-target="#speechTab"
                                        type="button" role="tab">
                                        Speech
                                    </button>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="debateTab" role="tabpanel" tabindex="0">
                                    <table class="table table-general">
                                        <thead class="table-light">
                                            <tr class="text-secondary">
                                                <th class="d-none"></th>
                                                <th>QUESTION</th>
                                                <th>ANSWER</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($competitionFaqs as $faq)
                                                @if ($faq->sub_category == 'debate')
                                                    <x-modal-confirmation action="destroy" title="Delete FAQ"
                                                        name="faqs" :model=$faq>
                                                        Are you sure want to delete this faq?
                                                    </x-modal-confirmation>

                                                    <tr>
                                                        <td class="d-none">{{ $faq->id }}</td>
                                                        <td class="align-middle">{{ $faq->title }}</td>
                                                        <td class="align-middle">{{ $faq->description }}</td>
                                                        <td class="align-middle text-end">
                                                            <div class="dropdown">
                                                                <button class="btn btn-outline-light btn-sm"
                                                                    type="button" data-bs-toggle="dropdown">
                                                                    <i
                                                                        class="bi bi-three-dots-vertical text-muted"></i>
                                                                </button>
                                                                <ul
                                                                    class="dropdown-menu p-1 border-0 shadow-sm rounded-3">
                                                                    <li>
                                                                        <a class="dropdown-item p-2 rounded-3"
                                                                            href="{{ route('faqs.edit', $faq) }}">
                                                                            <i class="bi bi-pencil me-2"></i>Edit
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <button type="button"
                                                                            class="dropdown-item p-2 rounded-3"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#destroy{{ $faq->id }}">
                                                                            <i class="bi bi-trash3 me-2"></i>Delete
                                                                        </button>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="newscastingTab" role="tabpanel" tabindex="0">
                                    <table class="table table-general">
                                        <thead class="table-light">
                                            <tr class="text-secondary">
                                                <th class="d-none"></th>
                                                <th>QUESTION</th>
                                                <th>ANSWER</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($competitionFaqs as $faq)
                                                @if ($faq->sub_category == 'newscasting')
                                                    <x-modal-confirmation action="destroy" title="Delete FAQ"
                                                        name="faqs" :model=$faq>
                                                        Are you sure want to delete this faq?
                                                    </x-modal-confirmation>

                                                    <tr>
                                                        <td class="d-none">{{ $faq->id }}</td>
                                                        <td class="align-middle">{{ $faq->title }}</td>
                                                        <td class="align-middle">{{ $faq->description }}</td>
                                                        <td class="align-middle text-end">
                                                            <div class="dropdown">
                                                                <button class="btn btn-outline-light btn-sm"
                                                                    type="button" data-bs-toggle="dropdown">
                                                                    <i
                                                                        class="bi bi-three-dots-vertical text-muted"></i>
                                                                </button>
                                                                <ul
                                                                    class="dropdown-menu p-1 border-0 shadow-sm rounded-3">
                                                                    <li>
                                                                        <a class="dropdown-item p-2 rounded-3"
                                                                            href="{{ route('faqs.edit', $faq) }}">
                                                                            <i class="bi bi-pencil me-2"></i>Edit
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <button type="button"
                                                                            class="dropdown-item p-2 rounded-3"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#destroy{{ $faq->id }}">
                                                                            <i class="bi bi-trash3 me-2"></i>Delete
                                                                        </button>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="sswTab" role="tabpanel" tabindex="0">
                                    <table class="table table-general">
                                        <thead class="table-light">
                                            <tr class="text-secondary">
                                                <th class="d-none"></th>
                                                <th>QUESTION</th>
                                                <th>ANSWER</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($competitionFaqs as $faq)
                                                @if ($faq->sub_category == 'short story writing')
                                                    <x-modal-confirmation action="destroy" title="Delete FAQ"
                                                        name="faqs" :model=$faq>
                                                        Are you sure want to delete this faq?
                                                    </x-modal-confirmation>

                                                    <tr>
                                                        <td class="d-none">{{ $faq->id }}</td>
                                                        <td class="align-middle">{{ $faq->title }}</td>
                                                        <td class="align-middle">{{ $faq->description }}</td>
                                                        <td class="align-middle text-end">
                                                            <div class="dropdown">
                                                                <button class="btn btn-outline-light btn-sm"
                                                                    type="button" data-bs-toggle="dropdown">
                                                                    <i
                                                                        class="bi bi-three-dots-vertical text-muted"></i>
                                                                </button>
                                                                <ul
                                                                    class="dropdown-menu p-1 border-0 shadow-sm rounded-3">
                                                                    <li>
                                                                        <a class="dropdown-item p-2 rounded-3"
                                                                            href="{{ route('faqs.edit', $faq) }}">
                                                                            <i class="bi bi-pencil me-2"></i>Edit
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <button type="button"
                                                                            class="dropdown-item p-2 rounded-3"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#destroy{{ $faq->id }}">
                                                                            <i class="bi bi-trash3 me-2"></i>Delete
                                                                        </button>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="speechTab" role="tabpanel" tabindex="0">
                                    <table class="table table-general">
                                        <thead class="table-light">
                                            <tr class="text-secondary">
                                                <th></th>
                                                <th>QUESTION</th>
                                                <th>ANSWER</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($competitionFaqs as $faq)
                                                @if ($faq->sub_category == 'speech')
                                                    <x-modal-confirmation action="destroy" title="Delete FAQ"
                                                        name="faqs" :model=$faq>
                                                        Are you sure want to delete this faq?
                                                    </x-modal-confirmation>

                                                    <tr>
                                                        <td class="d-none">{{ $faq->id }}</td>
                                                        <td class="align-middle">{{ $faq->title }}</td>
                                                        <td class="align-middle">{{ $faq->description }}</td>
                                                        <td class="align-middle text-end">
                                                            <div class="dropdown">
                                                                <button class="btn btn-outline-light btn-sm"
                                                                    type="button" data-bs-toggle="dropdown">
                                                                    <i
                                                                        class="bi bi-three-dots-vertical text-muted"></i>
                                                                </button>
                                                                <ul
                                                                    class="dropdown-menu p-1 border-0 shadow-sm rounded-3">
                                                                    <li>
                                                                        <a class="dropdown-item p-2 rounded-3"
                                                                            href="{{ route('faqs.edit', $faq) }}">
                                                                            <i class="bi bi-pencil me-2"></i>Edit
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <button type="button"
                                                                            class="dropdown-item p-2 rounded-3"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#destroy{{ $faq->id }}">
                                                                            <i class="bi bi-trash3 me-2"></i>Delete
                                                                        </button>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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
