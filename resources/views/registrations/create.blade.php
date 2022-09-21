<x-user title="Registration - NEO 2022">
    <form id="registrationForm" method="POST" action="{{ route('registrations.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="container-lg p-md-5 p-4">
            <div class="row g-lg-5 g-4">
                <div class="col-lg-7">
                    <div class="mb-4">
                        <h3>Your Registration</h3>
                        <p class="bd-lead">Fill in participant details and review your registration.</p>
                    </div>

                    <div class="row g-4">
                        <input type="hidden" value="{{ $offerID }}" name="offerID">

                        {{-- Participant Details --}}
                        @foreach ($selectedCompetitions as $i => $selectedCompetition)
                            @for ($i = 0; $i < $selectedCompetition->count; $i++)
                                <div class="col-12">
                                    <button class="btn btn-outline-primary btn-collapse shadow-sm rounded-4 w-100 "
                                        type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse{{ $i }}{{ $selectedCompetition->id }}">

                                        <input type="hidden" name="form[]" class="form-control"
                                            value="{{ $selectedCompetition->id }}">
                                        <input type="hidden" name="price[]" class="form-control"
                                            value="{{ $selectedCompetition->price }}">

                                        <h6 class="m-0 p-2 text-start">
                                            {{ $selectedCompetition->name == 'Speech' ? $selectedCompetition->name . ' ' . $selectedCompetition->category : $selectedCompetition->name }}
                                            #{{ $i + 1 }}
                                        </h6>
                                    </button>

                                    <div class="collapse show"
                                        id="collapse{{ $i }}{{ $selectedCompetition->id }}">
                                        <div class="card card-body rounded-4 mt-3 p-4">
                                            @if ($selectedCompetition->name == 'Debate')
                                                <h5 class="mb-3">Speaker A</h5>
                                                <x-form :competition=$selectedCompetition :i=$i :k=0 />

                                                <hr class="border-0">

                                                <h5 class="mb-3">Speaker B</h5>
                                                <x-form :competition=$selectedCompetition :i=$i :k=1 />
                                            @else
                                                <x-form :competition=$selectedCompetition :i=$i :k=0 />
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        @endforeach
                    </div>
                </div>

                {{-- Price Summary --}}
                <div class="col-lg-5">
                    <div class="card price-summary-card rounded-4 border-0 shadow-sm">
                        <div class="card-body p-4">
                            <h4>Price Summary</h4>
                            <div class="my-4 border-bottom">
                                @foreach ($selectedCompetitions as $selectedCompetition)
                                    <div class="row text-muted">
                                        <div class="col">
                                            <p>
                                                {{ $selectedCompetition->count }}x
                                                {{ $selectedCompetition->name == 'Speech' ? $selectedCompetition->name . ' ' . $selectedCompetition->category_init : $selectedCompetition->name }}
                                            </p>
                                        </div>
                                        <div class="col-5 text-end">
                                            <p>Rp {{ number_format($selectedCompetition->amount, 0, '.', '.') }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="d-flex justify-content-between">
                                <h5>Total Price</h5>
                                <h5>Rp {{ number_format($totalPrice, 0, '.', '.') }}</h5>
                            </div>
                            <div class="d-none d-md-block mt-3">
                                <button type="submit" id="confirmRegisterBtn" class="btn btn-primary btn-lg w-100">
                                    Continue to Payment
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Confirmation Modal --}}
            <div class="modal fade" id="confirmRegisterModal" data-bs-backdrop="static" data-bs-keyboard="false"
                role="dialog" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content rounded-4 shadow p-3">
                        <div class="modal-header border-bottom-0">
                            <h4 class="modal-title">Are your participant details correct?</h4>
                        </div>
                        <div class="modal-body py-0">
                            <p>You will not be able to change your participant details once you
                                proceed to payment.</p>
                        </div>
                        <div class="modal-footer flex-column border-top-0 gap-2">
                            <button type="button" class="btn btn-lg btn-outline-dark w-100"
                                data-bs-dismiss="modal">Check
                                Again</button>
                            <button id="submitRegisterBtn" type="submit"
                                class="btn btn-lg btn-dark w-100">Continue</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card d-block d-sm-none border-0 rounded-0 shadow-sm sticky-bottom">
            <div class="card-body">
                <button type="submit" class="btn btn-dark btn-lg w-100">Continue to Payment</button>
            </div>
        </div>

    </form>
</x-user>