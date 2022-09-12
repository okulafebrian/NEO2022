<x-user title="Dashboard - NEO 2022">
    <form method="GET" action="{{ route('registrations.create') }}" enctype="multipart/form-data" autocomplete="off">
        @csrf
        <input type="hidden" name="offerID" value="{{ $offer->id }}">

        <div class="container-lg px-md-5 pt-md-4 pb-md-5 p-4">
            <div class="row g-md-5 g-4">
                {{-- BANNER --}}
                <div class="col-12">
                    <img src="/storage/images/assets/Banner.png" class="rounded-4" alt="" width="100%">
                </div>

                {{-- COMPETITION LIST --}}
                <div class="col-12">
                    <div class="row g-4">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-md-8">
                                    <h3>What category would you like to join?</h3>
                                    <p class="m-0 bd-lead">Now you can register multiple competitions at once</p>
                                </div>
                                <div class="col-md-4 d-none d-sm-flex justify-content-end align-items-center">
                                    <button class="total-ticket btn btn-outline-dark py-2 px-3 me-2" disabled>0
                                        ticket</button>
                                    <button class="btn-register btn btn-dark py-2 px-3" type="submit"
                                        disabled>Register</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="row row-cols-lg-5 row-cols-md-4 row-cols-sm-2 row-cols-1 g-3">
                                @foreach ($competitions as $competition)
                                    <div class="col">
                                        <div class="card card-competition p-0 border-0" type="button"
                                            data-bs-toggle="modal" data-bs-target="#ticket{{ $competition->id }}Modal">
                                            <div class="row g-md-2 g-3">
                                                <div class="col-md-12 col-4">
                                                    <img src="/storage/images/assets/Competition.png" alt=""
                                                        width="100%" class="rounded-4">
                                                </div>
                                                <div class="col-md-12 col-8">
                                                    <div class="card-body p-1 text-start">
                                                        <h5 id="{{ $competition->id }}title" class="text-truncate mb-1">
                                                            <span id="{{ $competition->id }}badge"></span>
                                                            {{ $competition->name }}
                                                        </h5>
                                                        <p class="mb-1 text-muted">{{ $competition->category }}</p>

                                                        @if ($offer->type == 'normal')
                                                            <h6>Rp
                                                                {{ number_format($competition->normal_price, 0, '.', '.') }}
                                                            </h6>
                                                        @else
                                                            <h6>Rp
                                                                {{ number_format($competition->early_price, 0, '.', '.') }}
                                                            </h6>
                                                            <h6>
                                                                <small
                                                                    class="text-decoration-line-through text-muted me-1">
                                                                    Rp
                                                                    {{ number_format($competition->normal_price, 0, '.', '.') }}
                                                                </small>
                                                                <span
                                                                    class="badge bg-light-red text-danger rounded-pill">
                                                                    Early Bird
                                                                </span>
                                                            </h6>
                                                        @endif
                                                    </div>
                                                </div>
                                                <input type="hidden" class="ticket-amount"
                                                    name="ticketAmount[{{ $competition->id }}]" value="0">
                                            </div>
                                        </div>

                                        @if (!$loop->last)
                                            <hr class="d-block d-sm-none">
                                        @endif
                                    </div>

                                    {{-- Modal Choose Ticket Amount --}}
                                    <div class="modal fade" id="ticket{{ $competition->id }}Modal"
                                        data-id="{{ $competition->id }}" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content rounded-4 shadow p-3">
                                                <div class="modal-header border-bottom-0">
                                                    <h5 class="modal-title">Number of Tickets</h5>
                                                </div>
                                                <div class="modal-body py-0 mx-2">
                                                    <div class="row border border-1 rounded-4 p-3">
                                                        <div class="col">
                                                            <p class="mb-1">
                                                                {{ $competition->name == 'Speech' ? $competition->name . ' ' . $competition->category : $competition->name }}
                                                            </p>
                                                            <h6 class="mb-1">
                                                                @if ($offer->type == 'normal')
                                                                    RP
                                                                    {{ number_format($competition->normal_price, 0, '.', '.') }}
                                                                @else
                                                                    RP
                                                                    {{ number_format($competition->early_price, 0, '.', '.') }}
                                                                @endif
                                                            </h6>
                                                            <p class="text-muted m-0">
                                                                @if ($offer->type == 'normal')
                                                                    {{ $competition->normal_quota_avail }} tickets
                                                                    available
                                                                @else
                                                                    {{ $competition->early_quota_avail }} tickets
                                                                    available
                                                                @endif
                                                            </p>
                                                        </div>
                                                        <div class="col-sm-5 my-sm-auto mt-3">
                                                            <input type="number" id="ticketAmount"
                                                                class="input-spinner" value="1" min="1"
                                                                max="{{ $offer->type == 'normal' ? $competition->normal_quota_avail : $competition->early_quota_avail }}" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer border-top-0">
                                                    <button type="button" id="cancelTicket"
                                                        class="btn btn-outline-dark"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <button type="button" id="confirmTicket" class="btn btn-dark px-3"
                                                        data-bs-dismiss="modal">Add</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card d-block d-sm-none border-0 rounded-0 shadow-sm sticky-bottom">
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-7">
                        <button type="button" class="total-ticket btn btn-outline-dark btn-lg w-100" disabled>0
                            ticket</button>
                    </div>
                    <div class="col-5">
                        <button type="submit" class="btn-register btn btn-dark btn-lg w-100" disabled>Register</button>
                    </div>
                </div>
            </div>
        </div>

    </form>
</x-user>
