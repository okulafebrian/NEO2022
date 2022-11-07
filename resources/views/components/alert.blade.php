@if (session('success'))
    <div class="modal fade show" style="z-index: 9999;" id="alert" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content border-0" style="background-color: #EFEFEF">
                <div class="modal-body">
                    <h6 class="m-0">
                        <i class="fa-solid fa-circle-check me-1"></i> {!! session('success') !!}
                    </h6>
                </div>
            </div>
        </div>
    </div>
@endif

@if (session('failed'))
    <div class="modal fade show" style="z-index: 9999;" id="alert" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content border-0" style="background-color: #EFEFEF">
                <div class="modal-body">
                    <h6 class="m-0">
                        <i class="fa-solid fa-circle-xmark me-1"></i> {!! session('failed') !!}
                    </h6>
                </div>
            </div>
        </div>
    </div>
@endif

{{-- @if (session('error'))
    <div class="modal fade show" style="z-index: 9999;" id="alert" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content rounded-4 border-0">
                <div class="modal-body py-5">
                    <div class="row d-flex justify-content-center align-items-center">
                        <div class="col-12 text-center">
                            <i class="fa-solid fa-triangle-exclamation fa-9x text-danger"></i>
                        </div>
                        <div class="col-12 text-center mt-4">
                            <h1>Oops...</h1>
                            <p class="text-muted">{!! session('error') !!}</p>
                            <button type="button" class="btn btn-outline-danger btn-lg mt-2" data-bs-dismiss="modal">
                                OK, I got it
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif --}}
