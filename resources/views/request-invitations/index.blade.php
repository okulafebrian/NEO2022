<x-app title="Request Invitation Letter | NEO 2022">

    <x-slot name="navbarAdmin"></x-slot>
    <x-slot name="sidebarAdmin"></x-slot>

    <div class="container p-5">
        <h4 class="mb-4 text-primary fw-semibold">Request Invitation Letter List</h4>

        <div class="card card-custom">
            <div class="card-body">
                @if ($requestInvitations->count() > 0)
                    <table class="table">
                        <thead>
                            <tr class="text-secondary">
                                <th>NAME</th>
                                <th>EMAIL</th>
                                <th>INSTITUTION</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($requestInvitations as $invitation)
                                <tr>
                                    <td class="align-middle">{{ $invitation->name }}</td>
                                    <td class="align-middle">{{ $invitation->email }}</td>
                                    <td class="align-middle">{{ $invitation->institution }}</td>
                                    <td class="align-middle text-end">
                                        <button class="btn btn-primary">S</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="text-center">
                        <img src="/storage/images/assets/empty.webp" alt="No testimony Yet" width="20%">
                        <h5 class="fw-semibold">No testimony Yet</h5>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app>
