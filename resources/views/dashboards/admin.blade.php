<x-app title="Dashboard | NEO 2022">

    <x-slot name="navbarAdmin"></x-slot>
    <x-slot name="sidebarAdmin"></x-slot>

    <div class="container p-5">
        <h3 class="mb-4">Admin Dashboard</h3>

        <div class="row row-cols-5 g-3 mb-4">
            <div class="col">
                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-body">
                        <p class="mb-2 text-muted">Pending Verification</p>
                        <h3>{{ $waitingVerification }}</h3>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-body">
                        <p class="mb-2 text-muted">New Questions</p>
                        <h3>0</h3>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-body">
                        <p class="mb-2 text-muted">New Feedbacks</p>
                        <h3>0</h3>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-body">
                        -
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-body">
                        -
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm rounded-3">
            <div class="p-4">
                <h5 class="mb-3">Participant Summary</h5>
                <div class="row row-cols-5 g-3">
                    @foreach ($participantSummaries as $participantSummary)
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <p class="mb-2 text-muted">
                                        {{ $participantSummary->name == 'Speech' ? $participantSummary->name . ' ' . $participantSummary->category_init : $participantSummary->name }}
                                    </p>
                                    <h3>{{ $participantSummary->totalParticipants }}</h3>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app>
