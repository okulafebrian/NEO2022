<x-app title="Environments | NEO 2022">
    <x-slot name="navbarAdmin"></x-slot>
    <x-slot name="sidebarAdmin"></x-slot>

    <div class="container p-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="m-0 fw-semibold text-primary">Environment List</h4>
            <a type="button" href="{{ route('environments.create') }}" class="btn btn-outline-light">
                <i class="fa-solid fa-plus me-2"></i>Add Environment
            </a>
        </div>

        <div class="card card-custom">
            <div class="card-body">
                <table class="table">
                    <thead class="bg-light">
                        <tr class="text-muted">
                            <th>CODE</th>
                            <th>NAME</th>
                            <th>PERIOD</th>
                            <th>STATUS</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($environments as $environment)
                            <x-modal-confirmation action="destroy" title="Delete Environment" name="environments"
                                :model=$environment>
                                Are you sure want to delete <span class="fw-semibold">{{ $environment->code }}</span>?
                            </x-modal-confirmation>

                            <tr>
                                <td class="align-middle">{{ $environment->code }}</td>
                                <td class="align-middle">{{ $environment->name }}</td>
                                <td class="align-middle">
                                    {{ date('j M', strtotime($environment->start_time)) }} -
                                    {{ date('j M', strtotime($environment->end_time)) }}
                                </td>
                                <td class="align-middle">
                                    @if (strtotime($environment->start_time) <= time() && strtotime($environment->end_time) >= time())
                                        <span class="text-success fw-bold">Ongoing</span>
                                    @elseif (strtotime($environment->start_time) > time())
                                        <span class="text-warning fw-bold">Upcoming</span>
                                    @else
                                        <span class="text-dark fw-bold">Closed</span>
                                    @endif
                                </td>
                                <td class="align-middle text-end">
                                    <div class="dropdown">
                                        <button class="btn btn-outline-light btn-sm" type="button"
                                            data-bs-toggle="dropdown">
                                            <i class="bi bi-three-dots-vertical text-muted"></i>
                                        </button>
                                        <ul class="dropdown-menu p-1 border-0 shadow-sm rounded-3">
                                            <li>
                                                <a class="dropdown-item p-2 rounded-3"
                                                    href="{{ route('environments.edit', $environment) }}">
                                                    <i class="bi bi-pencil me-2"></i>Edit
                                                </a>
                                            </li>
                                            <li>
                                                <button type="button" class="dropdown-item p-2 rounded-3"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#destroy{{ $environment->id }}">
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
            </div>
        </div>
    </div>
</x-app>
