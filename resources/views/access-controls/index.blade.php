<x-app title="Access Controls | NEO 2022">

    <x-slot name="navbarAdmin"></x-slot>
    <x-slot name="sidebarAdmin"></x-slot>

    <div class="container p-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="m-0 fw-semibold text-primary">Access Control List</h4>
            <a type="button" href="{{ route('access-controls.create') }}" class="btn btn-outline-light">
                <i class="fa-solid fa-plus me-2"></i>Add Access
            </a>
        </div>

        <div class="card card-custom">
            <div class="card-body">
                @if ($accessControls->count() > 0)
                    <table class="table table-general">
                        <thead class="table-light">
                            <tr class="text-secondary">
                                <th>USER</th>
                                <th>ACCESS TYPE</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($accessControls as $control)
                                <x-modal-confirmation action="destroy" title="Delete FAQ" name="access-controls"
                                    :model=$control>
                                    Are you sure want to remove the access from {{ $control->user->name }}?
                                </x-modal-confirmation>

                                <tr>
                                    <td class="align-middle">{{ $control->user->name }}</td>
                                    <td class="align-middle">{{ $control->access->name }}</td>
                                    <td class="align-middle text-end">
                                        <button type="button" class="btn btn-outline-light" data-bs-toggle="modal"
                                            data-bs-target="#destroy{{ $control->id }}">
                                            <i class="bi bi-trash3"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="text-center">
                        <img src="/storage/images/assets/empty.webp" alt="No Access Control Yet" width="20%">
                        <h5 class="fw-semibold">No Access Control Yet</h5>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app>
