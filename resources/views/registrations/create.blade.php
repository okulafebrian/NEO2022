<x-app title="Registrations | NEO 2022">

    <x-slot name="navbarUser"></x-slot>

    <form id="registrationForm" class="needs-validation" method="POST" action="{{ route('registrations.store') }}"
        enctype="multipart/form-data">
        @csrf

        <div class="container" style="padding-top: 6rem; padding-bottom: 4rem;">
            <div class="mb-4 text-center">
                <h4 class="text-primary fw-semibold">Registration Form</h4>
                <p class="text-muted">
                    Fill in all details and review your registration.
                </p>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <section class="mb-5">
                        <h5 class="mb-3 fw-semibold">Companion Data</h5>
                        <div class="card card-custom">
                            <div class="card-body">
                                <div id="companion" class="row g-4 mb-3">
                                    <div class="col-md">
                                        <label class="form-label">Full Name</label>
                                        <input type="text" class="form-control" name="companion_name" required>
                                    </div>
                                    <div class="col-md">
                                        <label class="form-label">Phone Number</label>
                                        <input type="text" class="form-control" name="companion_phone" required>
                                        <div class="form-text">E.g. 081367889900</div>
                                    </div>
                                </div>
                                <div>
                                    <input class="form-check-input" type="checkbox" id="nocompanion">
                                    <label class="form-check-label">
                                        We don't have a companion
                                    </label>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section>
                        <h5 class="mb-3 fw-semibold">Participant Data</h5>

                        @foreach ($competitions as $competition)
                            <input type="hidden" name="ticket[{{ $competition->id }}]"
                                value="{{ $ticket[$competition->id] }}">

                            @if ($ticket[$competition->id] > 0)
                                <input type="hidden" name="price[{{ $competition->id }}]"
                                    value="{{ $price[$competition->id] }}">
                                <input type="hidden" name="type[{{ $competition->id }}]"
                                    value="{{ $type[$competition->id] }}">
                            @endif

                            @for ($j = 0; $j < $ticket[$competition->id]; $j++)
                                <div class="card card-custom mb-4">
                                    <div class="card-body">
                                        <h5 class="mb-4" style="font-size: 18px">
                                            <span class="title-bar"></span>
                                            {{ $competition->name == 'Speech' ? $competition->name . ' ' . $competition->category : $competition->name }}
                                            #{{ $j + 1 }}
                                        </h5>

                                        @if ($competition->name == 'Debate')
                                            <div class="row mb-4">
                                                <div class="col-12">
                                                    <label class="form-label">Team Name</label>
                                                    <input type="text" class="form-control" name="debate_team_name[]"
                                                        required>
                                                    <div class="form-text">E.g. BINUS A, Pluto, The Minions</div>
                                                </div>
                                            </div>

                                            <ul class="nav nav-tabs mb-4" id="formTab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link active" id="speakerA-tab"
                                                        data-bs-toggle="pill"
                                                        data-bs-target="#speakerA{{ $competition->id }}{{ $j }}"
                                                        type="button" role="tab">Speaker A</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="speakerB-tab" data-bs-toggle="pill"
                                                        data-bs-target="#speakerB{{ $competition->id }}{{ $j }}"
                                                        type="button" role="tab">Speaker B</button>
                                                </li>
                                            </ul>

                                            <div class="tab-content">
                                                <div class="tab-pane fade show active"
                                                    id="speakerA{{ $competition->id }}{{ $j }}"
                                                    role="tabpanel">
                                                    <x-form id="{{ $competition->id }}" :j=$j :k=0
                                                        category="{{ $competition->category }}" :provinces='$provinces' />
                                                </div>

                                                <div class="tab-pane fade"
                                                    id="speakerB{{ $competition->id }}{{ $j }}"
                                                    role="tabpanel">
                                                    <x-form id="{{ $competition->id }}" :j=$j :k=1
                                                        category="{{ $competition->category }}" :provinces='$provinces' />
                                                </div>
                                            </div>
                                        @else
                                            <x-form id="{{ $competition->id }}" :j=$j :k=0
                                                category="{{ $competition->category }}" :provinces='$provinces' />
                                        @endif
                                    </div>
                                </div>
                            @endfor
                        @endforeach
                    </section>
                </div>

                {{-- Price Summary --}}
                <div class="col">
                    <div class="card card-custom sticky-top" style="top: 5rem;">
                        <div class="card-body">
                            <h5 class="mb-4 fw-semibold">Price Summary</h5>

                            <table class="table table-borderless m-0 td-custom" style="table-layout: fixed;">
                                <tbody>
                                    @foreach ($competitions as $competition)
                                        @if ($ticket[$competition->id] > 0)
                                            <tr>
                                                <td class="text-truncate col-7">
                                                    {{ $ticket[$competition->id] }}x
                                                    {{ $competition->name == 'Speech' ? $competition->name . ' ' . $competition->category : $competition->name }}
                                                </td>
                                                <td class="text-end">Rp
                                                    {{ number_format($price[$competition->id] * $ticket[$competition->id], 0, '.', '.') }}
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>

                            <hr style="border-style: dashed">

                            <div class="table-custom">
                                <h6>Total Price</h6>
                                <h6>Rp {{ number_format($totalPrice, 0, '.', '.') }}</h6>
                            </div>

                            <hr style="border-style: dashed">

                            <div class="form-check mb-4">
                                <input class="form-check-input" type="checkbox" id="agreeTnC">
                                <label class="form-check-label">
                                    <small>
                                        I have read and agreed with the <a target="_blank"
                                            href="https://drive.google.com/file/d/1cfO4JArJIurLWJsK3g8bSBawxOUyJQWw/view?usp=sharing"
                                            role="button">terms and
                                            conditions</a>
                                    </small>
                                </label>
                            </div>

                            <button id="confirmBtn" type="button" data-bs-toggle="modal"
                                data-bs-target="#confirmRegistration" class="btn btn-primary py-2 w-100" disabled>
                                Confirm
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="confirmRegistration" class="modal fade" style="z-index: 999999999999 !important">
            <div class="modal-dialog modal-dialog-centered" style="max-width: 28rem;">
                <div class="modal-content border-0 shadow py-3">
                    <div class="modal-header border-0">
                        <h5 class="fw-semibold m-auto text-center">
                            Are your registration details correct?
                        </h5>
                    </div>
                    <div class="modal-body py-0 text-center">
                        <p>
                            You will not be able to change your registration details once you proceed to payment. Do you
                            want to proceed?
                        </p>
                    </div>
                    <div class="p-3 d-grid gap-2">
                        <button type="submit" class="btn btn-primary py-2 w-100">
                            Continue to Payment
                        </button>
                        <button type="button" class="btn btn-outline-light py-2 w-100" data-bs-dismiss="modal">
                            Check Again
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>
        $('#nocompanion').on('click', function() {
            if ($(this).is(':checked')) {
                $('#companion .form-control').prop('disabled', true)
                $("input[name='nocompanion']").val(1)
            } else {
                $('#companion .form-control').prop('disabled', false)
                $("input[name='nocompanion']").val(0)
            }
        })

        $('#agreeTnC').on('click', function() {
            if ($(this).is(':checked')) {
                $('#confirmBtn').prop('disabled', false)
            } else {
                $('#confirmBtn').prop('disabled', true)
            }
        })
    </script>
</x-app>
