<x-user title="Registration - NEO 2022">
    <div class="container py-4">
        <h2>Participant Details</h2>
        <p>Fill in participant details and review your registration.</p>

        <form method="POST" action="{{ route('registration.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">

                <div class="col-7">
                    @foreach ($competitions as $competition)
                        @if ($tickets[$competition->id] > 0)
                            @for ($i = 0; $i < $tickets[$competition->id]; $i++)
                                <div class="accordion accordion-flush" id="accordionFlushExample">
                                    <div class="accordion-item mb-4 rounded shadow-sm">
                                        <h2 class="accordion-header"
                                            id="heading{{ $competition->id }}{{ $i }}">
                                            <button class="accordion-button rounded-top" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#form{{ $competition->id }}{{ $i }}"
                                                aria-expanded="true"
                                                aria-controls="form{{ $competition->id }}{{ $i }}">
                                                {{ $competition->name }} {{ $i + 1 }}
                                            </button>
                                        </h2>
                                        <div id="form{{ $competition->id }}{{ $i }}"
                                            class="accordion-collapse collapse show p-3" aria-labelledby="headingOne"
                                            data-bs-parent="#accordionExample">

                                            @if ($competition->name == 'Debate')
                                                @for ($k = 0; $k < 2; $k++)
                                                    <div class="accordion-body row g-3">
                                                        <h4 class="fw-bold">Speaker {{ $k + 1 }}</h4>
                                                        <x-form :competition=$competition :i=$i :k=$k :prices=$prices />
                                                    </div>
                                                @endfor
                                            @else
                                                <div class="accordion-body row g-3">
                                                    <x-form :competition=$competition :i=$i :k=0 :prices=$prices />
                                                </div>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            @endfor
                        @endif
                    @endforeach
                </div>

                <div class="col-5">
                    <div class="card">
                        <div class="card-body">
                            <button type="submit" class="btn btn-primary">Confirm and Pay</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-user>
