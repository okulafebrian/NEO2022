@if (session('success'))
    <div class="modal fade show" style="z-index: 9999;" id="alert" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content border-0 shadow-sm rounded-3" style="background-color: #7633a0">
                <div class="modal-body text-light">
                    <h6 class="m-0">
                        <i class="fa-solid fa-circle-check me-1"></i> {!! session('success') !!}
                    </h6>
                </div>
            </div>
        </div>
    </div>
@endif

@if (session('failed'))
    <div class="modal fade show" style="z-index: 9999;" id="alert" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content border-0 shadow-sm rounded-3" style="background-color: #a03333">
                <div class="modal-body text-light">
                    <h6 class="m-0">
                        <i class="fa-solid fa-circle-xmark me-1"></i> {!! session('failed') !!}
                    </h6>
                </div>
            </div>
        </div>
    </div>
@endif

@if (session('error'))
    <div class="modal fade show" style="z-index: 9999;" id="alert" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 25rem">
            <div class="modal-content rounded-4 shadow border-0">
                <div class="modal-body text-center p-5">
                    <img src="https://neo.mybnec.org/storage/images/assets/alert.webp" width="75%" class="mb-2">
                    <h3 class="fw-semibold text-primary">{!! session('error') !!}</h3>
                </div>
            </div>
        </div>
    </div>
@endif
