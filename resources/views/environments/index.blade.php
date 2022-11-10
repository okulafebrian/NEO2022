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

        <div class="row">
            <div class="col">
                <div class="card card-custom">
                    <div class="card-body">
                        <table class="table">
                            <thead class="bg-light">
                                <tr class="text-muted">
                                    <th>NAME</th>
                                    <th>PERIOD</th>
                                    <th>STATUS</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($periodEnvironments as $environment)
                                    <tr>
                                        <td class="align-middle">{{ $environment->name }}</td>
                                        <td class="align-middle">
                                            {{ date('j M', strtotime($environment->start_time)) }} -
                                            {{ date('j M', strtotime($environment->end_time)) }}
                                        </td>
                                        <td class="align-middle">
                                            @if (strtotime($environment->start_time) <= time() && strtotime($environment->end_time) >= time())
                                                <span class="text-success fw-bold">Ongoing</span>
                                            @elseif (strtotime($environment->start_time) > time())
                                                <span class="text-orange-400 fw-bold">Upcoming</span>
                                            @else
                                                <span class="text-danger fw-bold">Finished</span>
                                            @endif
                                        </td>
                                        <td class="align-middle text-end">
                                            <a href="{{ route('environments.edit', $environment) }}"
                                                class="btn btn-outline-light btn-sm" type="button">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card card-custom">
                    <div class="card-body">
                        <table class="table">
                            <thead class="bg-light">
                                <tr class="text-muted">
                                    <th>NAME</th>
                                    <th class="text-center">ENABLED</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($toggleEnvironments as $environment)
                                    <tr>
                                        <td class="align-middle">{{ $environment->name }}</td>
                                        <td class="align-middle">
                                            @livewire('toggle-switch', [
                                                'model' => $environment,
                                                'field' => 'is_shown',
                                            ])
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
</x-app>
