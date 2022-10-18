<x-app title="Competitions | NEO 2022">

    <x-slot name="navbarAdmin"></x-slot>
    <x-slot name="sidebarAdmin"></x-slot>

    <div class="container p-5">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="m-0">Competition List</h3>
            <a type="button" href="{{ route('competitions.create') }}" class="btn btn-outline-primary rounded-pill">
                <i class="fa-solid fa-plus me-2"></i>Add Competition
            </a>
        </div>

        <div class="card card-custom">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr class="text-secondary">
                            <th class="col-4">COMPETITION INFO</th>
                            <th class="col-3">PRICE</th>
                            <th class="col-2">QUOTA
                                <i class="bi bi-info-circle ms-2" data-bs-toggle="tooltip"
                                    data-bs-title="Amount of quota set"></i>
                            </th>
                            <th class="col-2 text-center">ACTIVE</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($competitions as $competition)
                            <tr>
                                <td class="py-4">
                                    <div class="row">
                                        <div class="col-3">
                                            <img src="/storage/images/logos/{{ $competition->logo }}" alt=""
                                                width="100%" class="rounded-3">
                                        </div>
                                        <div class="col">
                                            <div class="row">
                                                <h5>{{ $competition->name }}</h5>
                                                <p>{{ $competition->category }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4">
                                    <div class="input-group w-75">
                                        <span class="input-group-text">Rp</span>
                                        <input type="text" class="form-control"
                                            value="{{ number_format($competition->price, 0, '.', '.') }}" readonly>
                                    </div>
                                </td>
                                <td class="py-4">
                                    <input type="text" class="form-control mb-2 w-75"
                                        value="{{ $competition->quota }}" readonly>
                                    <span type="button" data-bs-toggle="tooltip"
                                        data-bs-title="Total Verified Registrations"><i
                                            class="bi bi-clipboard-check me-2"></i>0</span>
                                </td>
                                <td class="py-4">
                                    @livewire('toggle-switch', [
                                        'model' => $competition,
                                        'field' => 'is_active',
                                    ])
                                </td>
                                <td class="py-4">
                                    <div class="dropdown">
                                        <button class="btn btn-outline-light" type="button" data-bs-toggle="dropdown">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('competitions.edit', $competition) }}">
                                                    <i class="bi bi-pencil-fill me-2"></i>Edit
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <i class="bi bi-trash3-fill me-2"></i>Delete
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <i class="bi bi-file-earmark-arrow-down-fill me-2"></i>E-Booklet
                                                </a>
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
