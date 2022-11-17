<x-app title="Dashboard | NEO 2022">

    <x-slot name="navbarAdmin"></x-slot>
    <x-slot name="sidebarAdmin"></x-slot>

    <div class="container p-5">
        <section class="mb-4">
            <div class="mb-3">
                <h4 class="fw-semibold text-primary">Important Today</h4>
                <p class="m-0 text-purple-muted">Activities you need to complete in today</p>
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
                            <h3>0</h3>
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
                    <h4 class="fw-semibold text-primary mb-3">Participant Summary</h4>
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
                            <h4 class="fw-semibold text-primary mb-3">Environments</h4>
                            <table class="table table-borderless m-0 td-custom">
                                <tbody>
                                    <tr>
                                        <td class="fw-semibold col-3">Registration</td>
                                        <td>:</td>
                                        <td>
                                            {{ date('j M', strtotime($environments[0]->start_time)) }} -
                                            {{ date('j M', strtotime($environments[0]->end_time)) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-semibold">Early Bird</td>
                                        <td>:</td>
                                        <td>
                                            {{ date('j M', strtotime($environments[1]->start_time)) }} -
                                            {{ date('j M', strtotime($environments[1]->end_time)) }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <hr>

                            <div class="row">
                                <div class="col">
                                    @foreach ($environments as $i => $environment)
                                        @if ($i > 1 && $i < 5)
                                            <p class="mb-1">
                                                <i
                                                    class="bi bi-circle-fill me-1 fa-xs {{ $environment->is_shown ? 'text-success' : 'text-danger' }}"></i>
                                                {{ $environment->name }}
                                            </p>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col">
                                    @foreach ($environments as $i => $environment)
                                        @if ($i >= 5)
                                            <p class="mb-1">
                                                <i
                                                    class="bi bi-circle-fill me-1 fa-xs {{ $environment->is_shown ? 'text-success' : 'text-danger' }}"></i>
                                                {{ $environment->name }}
                                            </p>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-custom">
                        <div class="card-body">
                            <div class="table-custom mb-3">
                                <h4 class="fw-semibold text-primary m-0">Quota Details</h4>
                                <div>
                                    <small><i class="bi bi-square-fill fa-xs text-primary"></i> Whole</small>
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
                                            <div class="col">:
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
