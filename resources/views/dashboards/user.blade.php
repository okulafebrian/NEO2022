<x-user title="Dashboard - NEO 2022">
    <div class="container my-4">

        <header>

        </header>

        <section class="choose-competition">
            <form method="GET" action="{{ route('registrations.create') }}" enctype="multipart/form-data"
                autocomplete="off">
                @csrf
                <div class="row mb-3">
                    <div class="col-8">
                        <h3>What category would you like to join ?</h3>
                        <p class="m-0">Now you can register multiple competitions at once</p>
                    </div>
                    <div class="col d-flex justify-content-end align-items-center">
                        <button class="total-ticket btn btn-outline-secondary p-2 px-4 me-4 text-dark" disabled>0
                            Tickets</button>
                        <button class="btn btn-dark btn-register p-2 px-3" type="submit" disabled>Register</button>
                    </div>
                </div>

                <div class="row row-cols-5">
                    @foreach ($competitions as $competition)
                        <div class="col g-2">
                            <div class="card card-competition btn text-start p-0" data-bs-toggle="modal"
                                data-bs-target="#ticket{{ $competition->id }}Modal" data-id="{{ $competition->id }}">
                                <div class="card-body">
                                    <h5 class="m-0">{{ $competition->name }}</h5>
                                    <p class="m-0">{{ $competition->category }}</p>
                                    <h6 class="m-0">IDR
                                        {{ $currentOffer->type == 'normal' ? number_format($competition->normal_price, 0, '.', '.') : number_format($competition->early_price, 0, '.', '.') }}
                                    </h6>
                                </div>
                                <span id="compet{{ $competition->id }}TicketAmountBadge"
                                    class="position-absolute top-0 end-0 badge rounded-pill bg-danger"></span>
                                <input type="number" name="competTicketAmount[{{ $competition->id }}]" value="0"
                                    id="compet{{ $competition->id }}TicketAmount" class="ticket-amount" hidden>
                            </div>
                        </div>

                        {{-- Modal Choose Ticket Amount --}}
                        <div class="modal fade" id="ticket{{ $competition->id }}Modal" data-id="{{ $competition->id }}"
                            data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content rounded-4 shadow p-3">
                                    <div class="modal-header border-bottom-0">
                                        <h5 class="modal-title">Number of Tickets</h5>
                                    </div>
                                    <div class="modal-body d-flex">
                                        <div class="col-8">
                                            <p class="m-0">{{ $competition->name }}</p>
                                            <h6 class="m-0">IDR
                                                {{ number_format($competition->early_price, 0, '.', '.') }}</h6>
                                        </div>
                                        <input type="number" id="inputTicket" class="input-spinner" min="1"
                                            max="{{ $competition->early_quota }}" value="1" />
                                    </div>
                                    <div class="modal-footer flex-nowrap border-top-0 justify-content-center">
                                        <button type="button" id="cancelTicket"
                                            class="btn btn-lg btn-outline-dark col-6"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="button" id="confirmTicket" class="btn btn-lg btn-dark col-6"
                                            data-bs-dismiss="modal">Confirm</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </form>
        </section>
    </div>
</x-user>
