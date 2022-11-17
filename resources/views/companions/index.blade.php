<x-app title="Companion | NEO 2022">

    <x-slot name="navbarAdmin"></x-slot>
    <x-slot name="sidebarAdmin"></x-slot>

    <div class="container p-5">
        <div class="mb-4 d-flex justify-content-between align-items-center">
            <h4 class="m-0 fw-semibold text-primary">Companion List</h4>
            <a href="{{ route('companions.create') }}" class="btn btn-outline-light">
                <i class="fa-solid fa-plus me-2"></i>Add Companion
            </a>
        </div>

        <div class="card card-custom">
            <div class="card-body">
                @if ($companions->count() > 0)
                    <table class="table table-participant">
                        <thead class="table-light">
                            <tr class="text-secondary">
                                <th>NAME</th>
                                <th>PHONE NUMBER</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($companions as $companion)
                                <tr>
                                    <td class="align-middle">{{ $companion->name }}</td>
                                    <td class="align-middle">{{ $companion->phone_number }}</td>
                                    <td class="align-middle text-end">
                                        <a href="{{ route('companions.edit', $companion) }}"
                                            class="btn btn-outline-light btn-sm" type="button">
                                            <i class="bi bi-pencil me-2">
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="text-center">
                        <img src="/storage/images/assets/empty.webp" alt="No Companion Yet" width="20%">
                        <h5 class="fw-semibold">No Companion Yet</h5>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app>
