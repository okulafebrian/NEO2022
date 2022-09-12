<div class="p-3">
    <div class="row g-md-4 g-3">
        <div class="col-md-2 col-3">
            <img src="/storage/images/assets/{{ $status }}.svg" class="img-fluid rounded-4" alt="icon">
        </div>
        <div class="col-md-9 col-7">
            <div class="py-1">
                <h6 class="fw-semibold">
                    @foreach ($registration->competitions->unique() as $competition)
                        {{ $loop->first ? $competition->name : '- ' . $competition->name }}
                        {{ $competition->name == 'Speech' ? $competition->category_init : null }}
                    @endforeach
                </h6>
                <p class="card-text mb-2 text-muted">
                    {{ $title }}
                </p>
                <p class="card-text m-0">
                    {{ date('j F, H:m', strtotime($registration->created_at)) }}
                </p>
            </div>
        </div>
        <div class="col-md-1 col-2">
            <div class="dropdown text-end">
                <button class="btn btn-outline-light btn-sm rounded-3" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="bi bi-three-dots-vertical text-muted"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end p-2 border-0 shadow-sm rounded-4">
                    @if ($status == 'waiting')
                        <li>
                            <form method="POST" action="{{ route('registrations.destroy', $registration) }}">
                                @csrf
                                <input type="hidden" name="_method" value='DELETE'>
                                <button type="submit" class="dropdown-item ps-2 rounded-3">Cancel Registration</button>
                            </form>
                        </li>
                    @endif
                    <li>
                        <a class="dropdown-item ps-2 rounded-3" href="{{ route('registrations.show', $registration) }}">
                            Registration Details
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item ps-2 rounded-3" href="#">
                            Help
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        @if ($status == 'waiting')
            <div class="col-12">
                <a class="btn btn-light-red p-md-3 rounded-4 w-100"
                    href="{{ route('payments.create', $registration->id) }}" role="button">
                    <div class="row g-0">
                        <div class="col-8 text-start">
                            <small class="text-dark-red">Complete your payment before
                                <span class="fw-bold">{{ $registration->payment_due->format('d M, H:i') }}
                                    WIB</span>
                            </small>
                        </div>
                        <div class="col-4 my-auto text-end">
                            <small class="fw-bold text-dark-red">
                                Pay Now
                                <i class="fa-solid fa-circle-chevron-right ms-1"></i>
                            </small>
                        </div>
                    </div>
                </a>
            </div>
        @endif
    </div>
</div>
