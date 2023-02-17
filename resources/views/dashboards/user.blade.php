<x-app title="Dashboard | NEO 2022">

    <x-slot name="navbarUser"></x-slot>

    <div class="container" style="padding-top: 6rem; padding-bottom: 8rem;">
        @if ($isRegistrationOngoing)
            @if ($isEarlyBirdOngoing)
                <div class="alert alert-primary border-0 text-center shadow-sm mb-4">
                    <h6 class="fw-bold"><i class="bi bi-tags-fill me-2"></i>EARLY BIRD DEALS</h6>
                    <h6>SAVE UP TO RP 100.000 - LIMITED SLOTS</h6>
                    <h6 class="m-0">21 Nov - 12 Dec, 2022</h6>
                </div>
            @endif

            <section>
                <h4 class="mb-4 text-primary fw-semibold">
                    Which competition would you like to enter?
                </h4>

                <form method="POST" action="{{ route('registrations.create') }}" enctype="multipart/form-data"
                    autocomplete="off">
                    @csrf

                    <div class="row row-cols-lg-3 row-cols-md-2 row-cols-1 g-4">
                        @foreach ($competitions as $competition)
                            <input type="hidden" name="type[{{ $competition->id }}]"
                                value="{{ $isEarlyBirdOngoing && $competition->early_quota - $competition->early_registrations_count > 0 ? 'EARLY' : 'NORMAL' }}">
                            <input type="hidden" name="price[{{ $competition->id }}]"
                                value="{{ $isEarlyBirdOngoing && $competition->early_quota - $competition->early_registrations_count > 0 ? $competition->early_price : $competition->normal_price }}">

                            <div class="col">
                                <div class="card rounded-4" id="ticketCard{{ $competition->id }}"
                                    style="border-color:#E8E8E8">
                                    <div class="card-body">
                                        <div class="row g-0 mb-3">
                                            <div class="col">
                                                @if ($isEarlyBirdOngoing && $competition->early_quota - $competition->early_registrations_count > 0)
                                                    <small class="fw-bold text-danger">EARLY BIRD</small>
                                                @endif

                                                <h5 class="mb-1" style="font-size: 16px">
                                                    {{ $competition->name }}
                                                </h5>
                                                <p class="mb-1 text-muted" style="font-size: 16px">
                                                    {{ $competition->category }}
                                                </p>
                                                <h5 class="m-0" style="font-size: 16px">
                                                    @if ($competition->total_quota - $competition->registrations_count < 1)
                                                        <span class="text-danger">Tickets sold out</span>
                                                    @elseif ($isEarlyBirdOngoing && $competition->early_quota - $competition->early_registrations_count > 0)
                                                        Rp {{ number_format($competition->early_price, 0, '.', '.') }}
                                                        <small class="text-decoration-line-through text-muted ms-2">
                                                            Rp
                                                            {{ number_format($competition->normal_price, 0, '.', '.') }}
                                                        </small>
                                                    @else
                                                        Rp {{ number_format($competition->normal_price, 0, '.', '.') }}
                                                    @endif
                                                </h5>
                                            </div>

                                            <div class="col-3">
                                                <img src="/storage/images/competitions/{{ $competition->logo }}"
                                                    alt="{{ $competition->name }}" class="rounded-3" width="100%">
                                            </div>
                                        </div>
                                        <div class="text-end">
                                            <button
                                                {{ $competition->is_active == false || $competition->total_quota - $competition->registrations_count < 1 ? 'disabled' : '' }}
                                                class="btn {{ $competition->is_active == false || $competition->total_quota - $competition->registrations_count < 1 ? 'btn-outline-secondary' : 'btn-outline-primary' }} rounded-pill"
                                                type="button" style="font-size:14px; min-width:25%">
                                                Select
                                            </button>
                                            <div class="form-input d-none float-end">
                                                <input type="text" class="input-spinner" step="1"
                                                    name="ticket[{{ $competition->id }}]" value="0" min="0"
                                                    max="{{ $competition->total_quota - $competition->registrations_count }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <script>
                                $('#ticketCard{{ $competition->id }} button').on('click', function() {
                                    $(this).hide()
                                    $(this).next('.form-input').find('input').val(1)
                                    $(this).next('.form-input').toggleClass('d-none')
                                    updateTotalTicket()
                                })

                                $(document).on('click touchstart', '#ticketCard{{ $competition->id }} .btn-decrement', function() {
                                    if ($(this).closest('.form-input').find('input').val() < 1) {
                                        $(this).closest('.form-input').toggleClass('d-none')
                                        $(this).closest('.form-input').prev('button').show()
                                    }
                                    updateTotalTicket()
                                })

                                $(document).on('click touchstart', '#ticketCard{{ $competition->id }} .btn-increment', function() {
                                    updateTotalTicket()
                                })

                                function updateTotalTicket() {
                                    var totalTicket = 0

                                    $('.input-spinner:not(.form-control)').each(function(i, el) {
                                        totalTicket += parseInt($(this).val())
                                    })

                                    if (totalTicket > 0) {
                                        $('.btn-register').prop("disabled", false).removeClass('btn-secondary').addClass('btn-primary')
                                        $('.total-ticket-btn').show().text('(' + totalTicket + ')')
                                        $('.total-ticket-label').text(totalTicket + ' ticket selected')
                                    } else {
                                        $('.btn-register').prop("disabled", true).removeClass('btn-primary').addClass('btn-secondary')
                                        $('.total-ticket-btn').hide()
                                        $('.total-ticket-label').text('No ticket selected')
                                    }
                                }
                            </script>
                        @endforeach
                    </div>

                    <div class="fixed-bottom p-3 bg-white shadow-sm">
                        <div class="container">
                            <div class="row">
                                <div class="col my-auto d-none d-md-block">
                                    <h5 class="m-0 text-muted total-ticket-label">
                                        No ticket selected
                                    </h5>
                                </div>
                                <div class="col-lg-2 col-md-3">
                                    <button type="submit" class="btn btn-secondary btn-register py-2 fw-medium w-100"
                                        disabled>
                                        Register <span class="total-ticket-btn d-md-none"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </section>
        @else
            <div class="text-center">
                <img src="/storage/images/assets/lock.webp" alt="Registration Closed" class="img-size">
                <h3 class="fw-semibold text-primary">Registration Closed</h3>
                <p class="text-purple-muted">Thank you for your enthusiasm in the NEO 2022.</p>
            </div>
        @endif

    </div>
</x-app>
