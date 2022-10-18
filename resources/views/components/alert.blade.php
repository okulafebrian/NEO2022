@if (session('success'))
    <div class="modal fade show pr-0" style="z-index: 9999;" id="alert" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content rounded-4 border-0">
                <div class="modal-body py-5">
                    <div class="row d-flex justify-content-center align-items-center">
                        <div class="col-12 text-center">
                            <i class="fa-solid fa-circle-check fa-9x text-success"></i>
                        </div>
                        <div class="col-12 text-center mt-4">
                            <h1>Success</h1>
                            <p class="text-muted">{!! session('success') !!}</p>
                            <button type="button" class="btn btn-outline-success btn-lg mt-2" data-bs-dismiss="modal">
                                OK, I got it
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

@if (session('failed'))
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
                            <p class="text-muted">{!! session('failed') !!}</p>
                            <button type="button" class="btn btn-outline-danger btn-lg mt-2" data-bs-dismiss="modal">
                                OK, I got it
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

@if (session('error'))
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
@endif
