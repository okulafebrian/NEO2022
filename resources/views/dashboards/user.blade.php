<x-user title="Dashboard - NEO 2022">
    <form method="GET" action="{{ route('registrations.create') }}" enctype="multipart/form-data" autocomplete="off">
        @csrf
        <div class="container px-md-5 px-4">
            <section class="banner py-4">
                <img src="/storage/images/assets/Banner.png" alt="" width="100%">
            </section>

            <section class="competition-list py-lg-4">
                <div class="row">
                    <div class="col-lg-9">
                        <h3>What category would you like to join ?</h3>
                        <p class="text-muted m-0">Now you can register multiple competitions at once</p>
                    </div>
                    <div class="col d-none d-lg-flex justify-content-end my-auto">
                        <button class="total-ticket btn btn-outline-dark me-3" disabled>0 Ticket</button>
                        <button class="btn-register btn btn-dark" type="submit" disabled>Register</button>
                    </div>
                </div>

                <div class="row row-cols-md-5 pt-md-3 pb-3">
                    @foreach ($competitions as $competition)
                        <div class="g-md-2">
                            <hr class="d-md-block d-lg-none">
                            <div class="card card-competition p-0 border-0" type="button" data-bs-toggle="modal"
                                data-bs-target="#ticket{{ $competition->id }}Modal">
                                <div class="row g-0">
                                    <div class="col-md-12 col-4">
                                        <img src="/storage/images/assets/Competition.png" alt="" width="100%"
                                            class="rounded-4">
                                    </div>
                                    <div class="col-md-12 col-8">
                                        <div class="card-body px-md-0 py-md-3 py-1 text-start">
                                            <h5 id="compet{{ $competition->id }}Title" class="text-truncate mb-1">
                                                <span id="compet{{ $competition->id }}TicketAmountText"></span>
                                                {{ $competition->name }}
                                            </h5>
                                            <p class="mb-1 text-muted">{{ $competition->category }}</p>

                                            @if ($currentOffer->type == 'Normal')
                                                <h6>Rp {{ number_format($competition->normal_price, 0, '.', '.') }}</h6>
                                            @else
                                                <h6>Rp {{ number_format($competition->early_price, 0, '.', '.') }}</h6>
                                                <h6>
                                                    <span class="text-decoration-line-through text-muted">Rp
                                                        {{ number_format($competition->normal_price, 0, '.', '.') }}</span>
                                                    <span class="badge bg-danger">Early Bird</span>
                                                </h6>
                                            @endif
                                        </div>
                                    </div>
                                    <input type="hidden" id="compet{{ $competition->id }}TicketAmount"
                                        name="competTicketAmount[{{ $competition->id }}]" class="ticket-amount"
                                        value="0">
                                </div>
                            </div>
                        </div>

                        {{-- Modal Choose Ticket Amount --}}
                        <div class="modal fade" id="ticket{{ $competition->id }}Modal"
                            data-id="{{ $competition->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1">
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
                                                <h6 class="mb-1">Rp
                                                    {{ number_format($competition->early_price, 0, '.', '.') }}</h6>
                                                <p class="text-muted m-0">{{ $competition->early_temp_quota }} tickets
                                                    available</p>
                                            </div>
                                            <div class="col-sm-5 my-sm-auto mt-3">
                                                <input type="number" id="inputTicket" class="input-spinner"
                                                    min="1" max="{{ $competition->early_quota }}"
                                                    value="1" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer border-top-0">
                                        <button type="button" id="cancelTicket" class="btn btn-outline-dark"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="button" id="confirmTicket" class="btn btn-dark px-3"
                                            data-bs-dismiss="modal">Add</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        </div>

        <div class="d-flex d-sm-none p-3 mt-2 border-top">
            <button type="button" class="total-ticket btn btn-outline-dark w-75 me-3" disabled>0
                Ticket</button>
            <button type="button" class="btn-register btn btn-dark w-25" disabled>Register</button>
        </div>
    </form>
</x-user>
