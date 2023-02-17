<x-app title="Testimonies | NEO 2022">

    <x-slot name="navbarAdmin"></x-slot>
    <x-slot name="sidebarAdmin"></x-slot>

    <div class="container p-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="m-0 fw-semibold text-primary">Testimony List</h4>
            <a type="button" href="{{ route('testimonies.create') }}" class="btn btn-outline-light">
                <i class="fa-solid fa-plus me-2"></i>Add Testimony
            </a>
        </div>

        <div class="card card-custom">
            <div class="card-body">
                @if ($testimonies->count() > 0)
                    <table class="table">
                        <thead>
                            <tr class="text-secondary">
                                <th class="col-5">NAME</th>
                                <th class="col-6">DESCRIPTION</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($testimonies as $testimony)
                                <x-modal-confirmation action="destroy" title="Delete Testimony" name="testimonies"
                                    :model=$testimony>
                                    Are you sure want to delete this testimony?
                                </x-modal-confirmation>

                                <tr>
                                    <td class="align-middle">
                                        <div class="row gx-3 my-3">
                                            <div class="col-3">
                                                <img src="/storage/images/testimonies/{{ $testimony->photo }}"
                                                    width="100%" class="rounded-3">
                                            </div>
                                            <div class="col m-auto">
                                                <h6 class="fw-semibold mb-1">{{ $testimony->name }}</h6>
                                                <small>{{ $testimony->role }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle">{{ $testimony->description }}</td>
                                    <td class="align-middle text-end">
                                        <div class="dropdown">
                                            <button class="btn btn-outline-light btn-sm" type="button"
                                                data-bs-toggle="dropdown">
                                                <i class="bi bi-three-dots-vertical text-muted"></i>
                                            </button>
                                            <ul class="dropdown-menu p-1 border-0 shadow-sm rounded-3">
                                                <li>
                                                    <a class="dropdown-item p-2 rounded-3"
                                                        href="{{ route('testimonies.edit', $testimony) }}">
                                                        <i class="bi bi-pencil me-2"></i>Edit
                                                    </a>
                                                </li>
                                                <li>
                                                    <button type="button" class="dropdown-item p-2 rounded-3"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#destroy{{ $testimony->id }}">
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
                        <img src="/storage/images/assets/empty.webp" alt="No testimony Yet" width="20%">
                        <h5 class="fw-semibold">No testimony Yet</h5>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app>
