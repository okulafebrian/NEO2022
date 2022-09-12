<x-admin title="Dashboard - NEO 2022">
    <div class="container py-4">
        <div class="card">
            <div class="card-body">
                @foreach ($competitionSummaries as $competitionSummary)
                    <h3>{{ $competitionSummary->name }} - {{ $competitionSummary->id }}</h3>
                    <p>Normal: {{ $competitionSummary->normal_quota_avail }}</p>
                    <p>Early: {{ $competitionSummary->early_quota_avail }}</p>
                    <br>
                @endforeach
            </div>
        </div>
    </div>
</x-admin>
