<x-app title="Webinars | NEO 2022">

    <x-slot name="navbar"></x-slot>

    <section id="header2">
        <div class="mt-auto py-4">
            <x-section-title>
                <x-slot name="title">NEO SIDE EVENT</x-slot>
                <x-slot name="headline">EXCITING WEBINARS</x-slot>
                <x-slot name="subtitle"></x-slot>
            </x-section-title>
        </div>
    </section>

    <div class="container px-lg-5 px-4" style="padding-top: 3rem; padding-bottom: 8rem;">
        <div class="mb-4">
            @if ($isWebinarOngoing)
                <small class="text-success fw-semibold">OPEN REGISTRATION</small>
            @else
                <small class="text-muted fw-semibold">REGISTRATION CLOSED</small>
            @endif
            <h4 class="text-primary fw-semibold">Gen Z Siap Financial Freedom</h4>
        </div>

        <div class="row g-4">
            <div class="col-lg">
                <img src="/storage/images/assets/webinar.png" width="100%" class="rounded-4">
            </div>
            <div class="col-lg-4">
                <div class="card card-custom bg-purple-50 border-0 rounded-4">
                    <div class="card-body">
                        <h5 class="mb-4 text-primary fw-semibold">Event Details</h5>
                        <div class="d-flex mb-3">
                            <i class="bi bi-calendar2-event-fill fa-lg text-primary me-2"></i>
                            <div>
                                <h6 class="fw-semibold text-purple-muted mb-1">DATE</h6>
                                <span>December 7, 2022</span>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <i class="bi bi-clock-fill fa-lg text-primary me-2"></i>
                            <div>
                                <h6 class="fw-semibold text-purple-muted mb-1">TIME</h6>
                                <span>13.00 - 14.40 WIB</span>
                            </div>
                        </div>
                        <div class="d-flex mb-4">
                            <i class="bi bi-geo-alt-fill fa-lg text-primary me-2"></i>
                            <div>
                                <h6 class="fw-semibold text-purple-muted mb-1">LOCATION</h6>
                                <span>ZOOM Meeting</span>
                            </div>
                        </div>
                        <a href="https://bit.ly/NEO2022-WEBINAR"
                            class="btn btn-primary rounded-pill w-100 py-2 {{ $isWebinarOngoing ? '' : 'disabled' }}">
                            Register
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app>
