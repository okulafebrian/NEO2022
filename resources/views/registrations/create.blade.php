<x-user title="Registration - NEO 2022">
    <form method="POST" action="{{ route('registrations.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="container py-md-5 py-4 px-md-5 px-4">
            <div class="page-header">
                <h2>Your Registration</h2>
                <p class="bd-lead">Fill in participant details and review your registration.</p>
            </div>

            <div class="row">
                {{-- Participant Details --}}
                <div class="col-md-7">
                    <div class="accordion" id="accordionForm">
                        @foreach ($selectedCompetitions as $selectedCompetition)
                            @for ($i = 0; $i < $selectedCompetition->count; $i++)
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse{{ $i }}{{ $selectedCompetition->id }}">
                                            {{ $selectedCompetition->name == 'Speech' ? $selectedCompetition->name . ' ' . $selectedCompetition->category : $selectedCompetition->name }}
                                            {{ $i + 1 }}
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $i }}{{ $selectedCompetition->id }}"
                                        class="accordion-collapse collapse show" data-bs-parent="#accordionForm">
                                        <div class="accordion-body">
                                            <div class="row g-3">
                                                @if ($selectedCompetition->name == 'Debate')
                                                    <h5>Speaker A</h5>
                                                    <x-form :competition=$selectedCompetition :i=$i :k=0 />
                                                    <hr class="border-0">
                                                    <h5>Speaker B</h5>
                                                    <x-form :competition=$selectedCompetition :i=$i :k=1 />
                                                @else
                                                    <x-form :competition=$selectedCompetition :i=$i :k=0 />
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        @endforeach
                    </div>
                </div>

                {{-- Price Summary --}}
                <div class="col-md-5 pt-md-0 pt-4">
                    <div class="card rounded-4">
                        <div class="card-body p-4">
                            <h4>Price Summary</h4>
                            <div class="my-4 border-bottom">
                                @foreach ($selectedCompetitions as $selectedCompetition)
                                    <div class="row">
                                        <div class="col">
                                            <p>{{ $selectedCompetition->count }}x
                                                {{ $selectedCompetition->name == 'Speech' ? $selectedCompetition->name . ' ' . $selectedCompetition->category : $selectedCompetition->name }}
                                            </p>
                                        </div>
                                        <div class="col-5 text-end">
                                            <p>Rp {{ number_format($selectedCompetition->amount, 0, '.', '.') }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <h5>Total Price</h5>
                                <h5>Rp {{ number_format($totalPrice, 0, '.', '.') }}</h5>
                            </div>
                            <div class="d-none d-lg-block">
                                <button type="button" class="btn btn-primary btn-lg w-100" data-bs-toggle="modal"
                                    data-bs-target="#confirmRegModal">
                                    Continue to Payment
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Confirmation Modal --}}
            <div class="modal fade" id="confirmRegModal" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content rounded-4 shadow p-3">
                        <div class="modal-header border-bottom-0">
                            <h4 class="modal-title">Are your participant details correct?</h4>
                        </div>
                        <div class="modal-body py-0">
                            <p>You will not be able to change your participant details once you proceed to payment.</p>
                        </div>
                        <div class="modal-footer flex-column border-top-0 gap-2">
                            <button type="button" class="btn btn-lg btn-outline-dark w-100"
                                data-bs-dismiss="modal">Check
                                Again</button>
                            <button type="submit" class="btn btn-lg btn-dark w-100">Continue</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex d-sm-none p-3 mt-2 border-top">
            <button class="btn btn-dark btn-lg w-100" type="submit">Continue to Payment</button>
        </div>
    </form>
</x-user>
