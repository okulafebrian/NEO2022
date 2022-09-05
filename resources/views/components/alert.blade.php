@if (session('success'))
    <div class="modal fade show pr-0" style="z-index: 9999;" id="alert" tabindex="-1" role="dialog"
        aria-labelledby="alertTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content rounded-20 border-0">
                <div class="modal-header border-bottom-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row d-flex justify-content-center align-items-center">
                        <div class="col-12 mb-3 text-center">
                            <span class="fa-stack fa-4x">
                                <i class="fas fa-circle fa-stack-2x text-success"></i>
                                <i class="fas fa-check fa-stack-1x fa-inverse"></i>
                            </span>
                        </div>
                        <div class="col-12 my-2 text-center">
                            <h3 class="font-weight-bold">Success</h3>
                            <h5 class="font-weight-normal">{!! session('success') !!}</h5>
                            <button type="button" class="btn btn-teal rounded-pill my-3 px-5" data-bs-dismiss="modal">
                                OK, I got it
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
