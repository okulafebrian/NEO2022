<x-app title="Dashboard | NEO 2022">

    <x-slot name="navbarAdmin"></x-slot>
    <x-slot name="sidebarAdmin"></x-slot>

    <div class="container p-5">
        <h3 class="mb-4 text-primary">Admin Dashboard</h3>

        <div class="row row-cols-5 g-3 mb-4">
            <div class="col">
                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-body">
                        <p class="mb-2 text-muted">To verify</p>
                        <h3>{{ $unverifiedRegistrations }}</h3>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-body">
                        <p class="mb-2 text-muted">New Refund</p>
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
        </div>

        <div class="card border-0 shadow-sm rounded-3">
            <div class="p-4">
                <h5 class="mb-3">Participant Summary</h5>
                <div class="row row-cols-5 g-3">
                    @foreach ($competitions as $competition)
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <p class="mb-2 text-muted">
                                        {{ $competition->name == 'Speech' ? $competition->name . ' ' . $competition->category_init : $competition->name }}
                                    </p>
                                    <h3>
                                        {{ $competition->name == 'Debate' ? $competition->debateTeams->count() : $competition->participants->count() }}
                                    </h3>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app>
