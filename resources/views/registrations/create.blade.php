<x-app title="Registrations | NEO 2022">

    <x-slot name="navbarUser"></x-slot>

    <form id="registrationForm" class="needs-validation" method="POST" action="{{ route('registrations.store') }}"
        enctype="multipart/form-data" novalidate>
        @csrf
        <div class="container-lg my-5">
            <div class="mb-4 text-center">
                <h3>Your Registration</h3>
                <p class="text-muted">For debate competition, you must fill in the data of both speaker.</p>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    {{-- Participant Details --}}
                    @foreach ($competitions as $competition)
                        @if ($ticketQty[$competition->id] > 0)
                            <input type="hidden" name="id[]" value="{{ $competition->id }}">
                            <input type="hidden" name="price[]" value="{{ $competition->price }}">
                            <input type="hidden" name="has_promo[]" value="{{ $hasPromo[$competition->id] }}">
                        @endif

                        @for ($j = 0; $j < $ticketQty[$competition->id]; $j++)
                            <div class="card card-custom rounded-4 mb-4">
                                <div class="card-body">
                                    <h5 class="mb-4">
                                        <span class="title-bar"></span>
                                        {{ $competition->name == 'Speech' ? $competition->name . ' ' . $competition->category : $competition->name }}
                                        {{ $j + 1 }}
                                    </h5>

                                    @if ($competition->name == 'Debate')
                                        <ul class="nav nav-tabs mb-4" id="tabs-tab" role="tablist">
                                            <li class="nav-item me-2" role="presentation">
                                                <button class="nav-link active" id="speakerA-tab" data-bs-toggle="pill"
                                                    data-bs-target="#speakerA{{ $competition->id }}{{ $j }}"
                                                    type="button" role="tab">Speaker A</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="speakerB-tab" data-bs-toggle="pill"
                                                    data-bs-target="#speakerB{{ $competition->id }}{{ $j }}"
                                                    type="button" role="tab">Speaker B</button>
                                            </li>
                                        </ul>
                                    @endif

                                    @if ($competition->name == 'Debate')
                                        <div class="tab-content" id="tabs-tabContent">
                                            <div class="tab-pane fade show active"
                                                id="speakerA{{ $competition->id }}{{ $j }}"
                                                role="tabpanel">
                                                <x-form-create id="{{ $competition->id }}" :j=$j :k=0
                                                    category="{{ $competition->category }}" />
                                            </div>

                                            <div class="tab-pane fade"
                                                id="speakerB{{ $competition->id }}{{ $j }}"
                                                role="tabpanel">
                                                <x-form-create id="{{ $competition->id }}" :j=$j :k=1
                                                    category="{{ $competition->category }}" />
                                            </div>
                                        </div>
                                    @else
                                        <x-form-create id="{{ $competition->id }}" :j=$j :k=0
                                            category="{{ $competition->category }}" />
                                    @endif
                                </div>
                            </div>
                        @endfor
                    @endforeach
                </div>

                {{-- Price Summary --}}
                <div class="col-lg">
                    <div class="card card-custom rounded-4 sticky-top" style="top:2rem">
                        <div class="card-body">
                            <h4>Price Summary</h4>

                            <div class="my-4 border-bottom">
                                @foreach ($competitions as $competition)
                                    @if ($ticketQty[$competition->id] > 0)
                                        <div class="row g-0 text-muted">
                                            <div class="col">
                                                <p>
                                                    {{ $ticketQty[$competition->id] }}x
                                                    {{ $competition->name == 'Speech' ? $competition->name . ' ' . $competition->category : $competition->name }}
                                                </p>
                                            </div>
                                            <div class="col-5 text-end">
                                                <p>Rp
                                                    {{ number_format($price[$competition->id] * $ticketQty[$competition->id], 0, '.', '.') }}
                                                </p>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <div class="d-flex justify-content-between mb-4">
                                <h5>Total Price</h5>
                                <h5>Rp {{ number_format($totalPrice, 0, '.', '.') }}</h5>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg w-100">
                                Continue to Payment
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-app>
