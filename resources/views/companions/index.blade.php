<x-app title="Companions | NEO 2022">

    <x-slot name="navbarAdmin"></x-slot>
    <x-slot name="sidebarAdmin"></x-slot>

    <div class="container p-5">
        <h4 class="fw-semibold text-primary mb-4">Companion List</h4>

        <div class="card card-custom">
            <div class="card-body">
                @if ($companions->count() > 0)
                    <table class="table table-general">
                        <thead class="table-light">
                            <tr class="text-secondary">
                                <th>NAME</th>
                                <th>PHONE NUMBER</th>
                                <th>PARTICIPANTS</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($companions as $companion)
                                <tr>
                                    <td class="align-middle">{{ $companion->name }}</td>
                                    <td class="align-middle">{{ $companion->phone_number }}</td>
                                    <td class="align-middle">
                                        @foreach ($companion->verifiedPayment->participants as $participant)
                                            {{ $participant->name }} <br>
                                        @endforeach
                                    </td>
                                    <td class="align-middle text-end">
                                        <a href="{{ route('companions.edit', $companion) }}"
                                            class="btn btn-outline-light btn-sm" type="button">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="text-center">
                        <img src="/storage/images/assets/empty.webp" alt="No Companion Yet" width="20%">
                        <h5 class="fw-semibold">No Companion Yet</h5>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app>
