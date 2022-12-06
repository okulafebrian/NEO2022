<x-app title="Dashboard | NEO 2022">

    <x-slot name="navbarAdmin"></x-slot>
    <x-slot name="sidebarAdmin"></x-slot>

    <div class="container p-5">
        <section class="mb-4">
            <div class="mb-3">
                <h4 class="fw-semibold text-primary">Important Today</h4>
                <p class="m-0 text-purple-muted">Activities you need to complete ASAP and keep track of</p>
            </div>

            <div class="row row-cols-5 g-3">
                <div class="col">
                    <div class="card border-0 shadow-sm rounded-3">
                        <div class="card-body">
                            <small class="text-muted">To verify</small>
                            <h3>{{ $unverifiedCount }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card border-0 shadow-sm rounded-3">
                        <div class="card-body">
                            <small class="text-muted">New Refund</small>
                            <h3>{{ $refundCount }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card border-0 shadow-sm rounded-3">
                        <div class="card-body">
                            <small class="text-muted">Invitation Request</small>
                            <h3>{{ $requestCount }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card border-0 shadow-sm rounded-3">
                        <div class="card-body">
                            <small class="text-muted">New Submission</small>
                            <h3>{{ $submissionCount }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="mb-4">
            <div class="card card-custom">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-end mb-3">
                        <h4 class="fw-semibold text-primary m-0">Participant Summary</h4>
                        <h6 class="m-0 text-primary fw-semibold">Total : {{ $totalParticipant }}</h6>
                    </div>

                    <div class="row row-cols-5 g-2">
                        @foreach ($competitions as $competition)
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <small class="mb-2 text-muted text-truncate">
                                            {{ $competition->name == 'Speech' ? $competition->name . ' ' . $competition->category_init : $competition->name }}
                                        </small>
                                        <h3>
                                            {{ $competition->name == 'Debate' ? $competition->debateTeams->count() : $competition->participants->count() }}
                                        </h3>
                                        <small>
                                            {{ $competition->name == 'Debate' ? 'Teams' : 'Persons' }}
                                        </small>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <section class="mb-4">
            <div class="row">
                <div class="col-7">
                    <div class="card card-custom h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="fw-semibold text-primary m-0">Environments</h4>
                                <div class="d-flex gap-3">
                                    <small><i class="bi bi-square-fill fa-xs text-dark"></i> Closed</small>
                                    <small><i class="bi bi-square-fill fa-xs text-warning"></i> Upcoming</small>
                                    <small><i class="bi bi-square-fill fa-xs text-success"></i> Ongoing</small>
                                </div>
                            </div>

                            <ul class="list-group">
                                @foreach ($environments as $environment)
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col">
                                                {{ $environment->name }}
                                            </div>
                                            <div class="col-1">
                                                @if (strtotime($environment->start_time) <= time() && strtotime($environment->end_time) >= time())
                                                    <i class="bi bi-square-fill fa-xs text-success"></i>
                                                @elseif (strtotime($environment->start_time) > time())
                                                    <i class="bi bi-square-fill fa-xs text-warning"></i>
                                                @else
                                                    <i class="bi bi-square-fill fa-xs text-dark"></i>
                                                @endif
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-custom">
                        <div class="card-body">
                            <div class="table-custom mb-3">
                                <h4 class="fw-semibold text-primary m-0">Quota Details</h4>
                                <div class="d-flex gap-3">
                                    <small><i class="bi bi-square-fill fa-xs text-primary"></i> Normal</small>
                                    <small><i class="bi bi-square-fill fa-xs text-blue"></i> Early</small>
                                </div>
                            </div>

                            <ul class="list-group">
                                @foreach ($competitions as $competition)
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col">
                                                {{ $competition->name == 'Speech' ? $competition->name . ' ' . $competition->category_init : $competition->name }}
                                            </div>
                                            <div class="col text-end">
                                                <span class="badge bg-purple-100 text-primary">
                                                    {{ $competition->total_quota - $competition->early_quota - $competition->normal_registrations_count }}
                                                    / {{ $competition->total_quota - $competition->early_quota }}
                                                </span>
                                                <span class="badge bg-blue-100 text-blue">
                                                    {{ $competition->early_quota - $competition->early_registrations_count }}
                                                    / {{ $competition->early_quota }}
                                                </span>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-app>
