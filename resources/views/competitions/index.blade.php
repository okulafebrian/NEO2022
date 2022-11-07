<x-app title="Competitions | NEO 2022">

    <x-slot name="navbarAdmin"></x-slot>
    <x-slot name="sidebarAdmin"></x-slot>

    <div class="container p-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="m-0 text-primary">Competition List</h3>
            <a type="button" href="{{ route('competitions.create') }}" class="btn btn-primary">
                <i class="fa-solid fa-plus me-2"></i>Add Competition
            </a>
        </div>

        <div class="card card-custom">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr class="text-muted bg-light">
                            <th class="col-4">COMPETITION</th>
                            <th>NORMAL</th>
                            <th>EARLY BIRD</th>
                            <th class="text-center">ACTIVE</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($competitions as $competition)
                            <tr class="m-5 p-5">
                                <td class="align-middle">
                                    <div class="row gx-3 my-3">
                                        <div class="col-3">
                                            <img src="/storage/images/logos/{{ $competition->logo }}" alt=""
                                                width="100%" class="rounded-3">
                                        </div>
                                        <div class="col m-auto">
                                            <h6 class="mb-1">{{ $competition->name }}</h6>
                                            <span>{{ $competition->category }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle">
                                    <p class="mb-1">
                                        Rp {{ number_format($competition->normal_price, 0, '.', '.') }}
                                    </p>
                                    <span role="button" data-bs-toggle="tooltip" data-bs-title="Remaining slots">
                                        <i class="bi bi-file-bar-graph-fill text-primary"></i>
                                        {{ $competition->normal_quota - $competition->registrations_count }}
                                    </span>
                                </td>
                                <td class="align-middle">
                                    <p class="mb-1">
                                        Rp {{ number_format($competition->early_price, 0, '.', '.') }}
                                    </p>
                                    <span role="button" data-bs-toggle="tooltip" data-bs-title="Remaining slots">
                                        <i class="bi bi-file-bar-graph-fill text-primary"></i>
                                        {{ $competition->early_quota - $competition->early_registrations_count }}
                                    </span>
                                </td>
                                <td class="align-middle">
                                    @livewire('toggle-switch', [
                                        'model' => $competition,
                                        'field' => 'is_active',
                                    ])
                                </td>
                                <td class="align-middle">
                                    <div class="dropdown">
                                        <button class="btn btn-outline-light btn-sm" type="button"
                                            data-bs-toggle="dropdown">
                                            <i class="bi bi-three-dots-vertical text-muted"></i>
                                        </button>
                                        <ul class="dropdown-menu p-1 border-0 shadow-sm rounded-3">
                                            <li>
                                                <a class="dropdown-item p-2 rounded-3"
                                                    href="{{ route('competitions.edit', $competition) }}">
                                                    <i class="bi bi-pencil me-2"></i>Edit
                                                </a>
                                            </li>
                                            <li>
                                                <form method="POST"
                                                    action="{{ route('competitions.destroy', $competition) }}">
                                                    @csrf
                                                    <input type="hidden" name="_method" value='DELETE'>
                                                    <button type="submit" class="dropdown-item p-2 rounded-3">
                                                        <i class="bi bi-trash3 me-2"></i>Delete
                                                    </button>
                                                </form>
                                            </li>
                                            @if ($competition->ebooklet)
                                                <li>
                                                    <a class="dropdown-item p-2 rounded-3" href="#">
                                                        <i class="bi bi-file-earmark-arrow-down me-2"></i>E-Booklet
                                                    </a>
                                                </li>
                                            @endif
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
