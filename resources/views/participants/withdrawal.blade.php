<x-app title="Withdrawal List | NEO 2022">

    <x-slot name="navbarAdmin"></x-slot>

    <div class="container" style="padding: 6rem 0; max-width: 60rem">
        <h4 class="mb-4 fw-semibold text-primary">Withdrawal List</h4>

        <div class="card card-custom">
            <div class="card-body">
                @if (count($registrationDetails) > 0)
                    <table class="table table-general">
                        <thead class="table-light">
                            <tr class="text-secondary">
                                <th>NAME</th>
                                <th>COMPETITION</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($registrationDetails as $registrationDetail)
                                <tr>
                                    <td class="align-middle">
                                        {{ $registrationDetail->competition->name == 'Debate' ? $registrationDetail->debateTeam->name : $registrationDetail->deletedParticipants[0]->name }}
                                    </td>
                                    <td class="align-middle">{{ $registrationDetail->competition->name }}</td>
                                    <td class="align-middle text-end">
                                        <form method="POST"
                                            action="{{ route('registration-details.restore', $registrationDetail->id) }}">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-outline-light">
                                                <i class="bi bi-arrow-counterclockwise"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="text-center">
                        <img src="/storage/images/assets/empty.webp" alt="No Registration Yet" width="20%">
                        <h5 class="fw-semibold">No Participant Yet</h5>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app>
