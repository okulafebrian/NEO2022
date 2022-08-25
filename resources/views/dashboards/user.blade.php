<x-user title="Dashboard - NEO 2022">
    <div class="container my-4">

        <header>

        </header>

        <section class="choose-competition">
            <form method="GET" action="{{ route('registration.create') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-9">
                        <h2>What category would you like to join ?</h2>
                        <p>Now you can register multiple competitions at once</p>
                    </div>
                    <div class="col">
                        <div
                            class="ticket border border-secondary rounded d-flex align-items-center justify-content-between p-3">
                            <p class="total-ticket m-0">0 Tickets</p>
                            <button class="btn btn-dark btn-register" type="submit" disabled>Register</button>
                        </div>
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
                                    <input type="hidden" name="price[{{ $competition->id }}]"
                                        value="{{ $currentOffer->type == 'normal' ? $competition->normal_price : $competition->early_price }}">
                                </div>
                                <span id="ticket{{ $competition->id }}Badge"
                                    class="position-absolute top-0 end-0 badge rounded-pill bg-danger"></span>
                                <input type="number" name="ticketAmount[{{ $competition->id }}]" value="0"
                                    id="ticket{{ $competition->id }}Amount" class="ticket-amount" hidden>
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
