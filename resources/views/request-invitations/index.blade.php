<x-app title="Request Invitation Letter | NEO 2022">

    <x-slot name="navbarAdmin"></x-slot>
    <x-slot name="sidebarAdmin"></x-slot>

    <div class="container p-5">
        <h4 class="mb-4 text-primary fw-semibold">Request Invitation Letter List</h4>

        <div class="card card-custom">
            <div class="card-body">
                @if ($requestInvitations->count() > 0)
                    <table class="table table-general">
                        <thead>
                            <tr class="text-secondary">
                                <th>NAME</th>
                                <th>EMAIL</th>
                                <th>INSTITUTION</th>
                                <th>STATUS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($requestInvitations as $invitation)
                                <tr>
                                    <td class="align-middle">{{ $invitation->name }}</td>
                                    <td class="align-middle">{{ $invitation->email }}</td>
                                    <td class="align-middle">{{ $invitation->institution }}</td>
                                    <td class="align-middle">
                                        @if ($invitation->deleted_at)
                                            <b class="text-primary">Declined</b>
                                        @elseif ($invitation->is_sent)
                                            <b class="text-primary">Sent</b>
                                        @else
                                            <div class="d-flex gap-1">
                                                <form action="{{ route('request-invitations.accept', $invitation) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <button class="btn btn-primary" type="submit">Sent</button>
                                                </form>
                                                <button type="button" class="btn btn-outline-light"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#destroy{{ $invitation->id }}">
                                                    <i class="bi bi-trash3"></i>
                                                </button>
                                            </div>
                                        @endif
                                    </td>
                                </tr>

                                <x-modal-confirmation action="destroy" title="Decline Invitation Request"
                                    name="request-invitations" :model=$invitation>
                                    Are you sure want to decline this request?
                                </x-modal-confirmation>
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
