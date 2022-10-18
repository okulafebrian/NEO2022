<x-app title="Dashboard | NEO 2022">

    <x-slot name="navbarUser"></x-slot>

    <div class="container-lg my-5">
        <section id="competition-list">
            <div class="mb-4 text-center">
                <h3>Which competition would you like to enter?</h3>
                <p class="text-muted">You can register more than one competition at once.</p>
            </div>

            <div class="m-auto" style="max-width: 600px">
                <form method="POST" action="{{ route('registrations.create') }}" enctype="multipart/form-data"
                    autocomplete="off">
                    @csrf

                    @foreach ($competitions as $competition)
                        <div id="ticketCard{{ $competition->id }}" class="card card-custom rounded-4 mb-3">

                            <input type="hidden" name="has_promo[{{ $competition->id }}]"
                                value="{{ $promotion && $competition->promo_quota - $competition->promo_registrations_count > 0 ? true : false }}">
                            <input type="hidden" name="price[{{ $competition->id }}]"
                                value="{{ $promotion && $competition->promo_quota - $competition->promo_registrations_count > 0 ? $competition->promo_price : $competition->price }}">

                            <div class="card-body row g-0">
                                <div class="col">
                                    @if ($promotion && $competition->promo_quota - $competition->promo_registrations_count > 0)
                                        <small class="fw-bold text-danger">{{ strtoupper($promotion->name) }}</small>
                                    @endif
                                    <h5 class="my-1">{{ $competition->name }}</h5>
                                    <p class="fs-5 mb-1 text-muted">{{ $competition->category }}</p>
                                    <h5>
                                        @if ($promotion && $competition->promo_quota - $competition->promo_registrations_count > 0)
                                            Rp {{ number_format($competition->promo_price, 0, '.', '.') }}
                                            <small class="text-decoration-line-through text-muted ms-2">
                                                Rp {{ number_format($competition->price, 0, '.', '.') }}
                                            </small>
                                        @else
                                            Rp {{ number_format($competition->price, 0, '.', '.') }}
                                        @endif
                                    </h5>
                                </div>
                                <div class="col-md-3 col-5 text-end">
                                    <img src="/storage/images/logos/{{ $competition->logo }}"
                                        alt="{{ $competition->name }}" class="rounded-4 mb-3" width="70%">
                                    <div>
                                        <button class="btn btn-outline-primary rounded-pill" style="width:70%"
                                            type="button">Select</button>
                                        <div class="form-input d-none">
                                            <input type="text" class="input-spinner" step="1"
                                                name="ticket_qty[{{ $competition->id }}]" value="0" min="0"
                                                max="{{ $promotion && $competition->promo_quota - $competition->promo_registrations_count > 0 ? $competition->promo_quota - $competition->promo_registrations_count : $competition->quota }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            $('#ticketCard{{ $competition->id }} button').on('click', function(e) {
                                $(this).hide()
                                $(this).next('.form-input').find('input').val(1)
                                $(this).next('.form-input').toggleClass('d-none')
                                updateTotalTicket()
                            })

                            $(document).on('click', '#ticketCard{{ $competition->id }} .btn-decrement', function() {
                                if ($(this).closest('.form-input').find('input').val() < 1) {
                                    $(this).closest('.form-input').toggleClass('d-none')
                                    $(this).closest('.form-input').prev('button').show()
                                }
                                updateTotalTicket()
                            })

                            $(document).on('click', '#ticketCard{{ $competition->id }} .btn-increment', function() {
                                updateTotalTicket()
                            })

                            function updateTotalTicket() {
                                var totalTicket = 0

                                $('.input-spinner:not(.form-control)').each(function(i, el) {
                                    totalTicket += parseInt($(this).val())
                                })

                                if (totalTicket > 0) {
                                    $('#registerBtn').prop("disabled", false)
                                    $('#totalTicketLabel').show().text('(' + totalTicket + ')')
                                } else {
                                    $('#registerBtn').prop("disabled", true)
                                    $('#totalTicketLabel').hide()
                                }
                            }
                        </script>
                    @endforeach

                    <button type="submit" id="registerBtn" class="btn btn-primary btn-lg rounded-pill w-100 mt-2"
                        disabled>
                        Register <span id="totalTicketLabel"></span>
                    </button>
                </form>
            </div>
        </section>
    </div>
</x-app>
