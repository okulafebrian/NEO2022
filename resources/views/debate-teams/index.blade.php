<x-app title="Debate Teams | NEO 2022">
    <x-slot name="navbarAdmin"></x-slot>
    <x-slot name="sidebarAdmin"></x-slot>

    <div class="container p-5">
        <h3 class="mb-4 text-primary">Debate Team List</h3>

        <div class="card card-custom">
            <div class="card-body">
                <table id="tableDebateTeamName" class="table">
                    <thead class="table-light">
                        <tr class="text-secondary">
                            <th>TEAM NAME</th>
                            <th>SPEAKERS</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($debateTeams as $index => $team)
                            <tr>
                                <td class="align-middle">{{ $team->name }}</td>
                                <td class="align-middle">
                                    @foreach ($team->competitionTeam->participants as $index => $participant)
                                        {{ $index == 0 ? $participant->name : ' | ' . $participant->name }}
                                    @endforeach
                                </td>
                                <td class="align-middle text-end">
                                    <a href="{{ route('debate-teams.edit', $team) }}"
                                        class="btn btn-outline-light btn-sm" type="button">
                                        <i class="bi bi-pencil me-2"></i>Edit
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app>
