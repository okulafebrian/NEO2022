@if ($action == 'delete')
    <div class="modal fade" id="delete{{ $participant->id }}" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 400px">
            <div class="modal-content rounded-4 border-0">
                <div class="modal-body text-center p-4">
                    <h4>Delete Participant</h4>
                    <p class="my-4">
                        Are you sure want to remove <b>{{ $participant->name }}</b>?
                    </p>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary btn-lg" type="button">Delete</button>
                        <button class="btn btn-outline-primary btn-lg" type="button"
                            data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

@if ($action == 'show')
    <div class="modal fade" id="show{{ $participant->id }}" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 border-0">
                <div class="modal-header border-0 p-4 pb-0">
                    <h5 class="modal-title">{{ $participant->name }}</h5>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body p-4">
                    <div class="card">
                        <div class="card-body" style="font-size: small">
                            <div class="row mb-2 g-0">
                                <div class="col-4">Gender</div>
                                <div class="col-1">:</div>
                                <div class="col-7">{{ $participant->gender }}
                                </div>
                            </div>
                            <div class="row mb-2 g-0">
                                <div class="col-4">Grade</div>
                                <div class="col-1">:</div>
                                <div class="col-7">{{ $participant->grade }}
                                </div>
                            </div>
                            <div class="row mb-2 g-0">
                                <div class="col-4">Address</div>
                                <div class="col-1">:</div>
                                <div class="col-7">
                                    {{ $participant->address }}
                                </div>
                            </div>
                            <div class="row mb-2 g-0">
                                <div class="col-4">Email</div>
                                <div class="col-1">:</div>
                                <div class="col-7">
                                    {{ $participant->email }}
                                </div>
                            </div>
                            <div class="row mb-2 g-0">
                                <div class="col-4">LINE ID</div>
                                <div class="col-1">:</div>
                                <div class="col-7">
                                    {{ $participant->line_id }}
                                </div>
                            </div>
                            <div class="row mb-2 g-0">
                                <div class="col-4">Phone Number</div>
                                <div class="col-1">:</div>
                                <div class="col-7">
                                    {{ $participant->whatsapp_number }}
                                </div>
                            </div>
                            <div class="row mb-2 g-0">
                                <div class="col-4">Institute Name</div>
                                <div class="col-1">:</div>
                                <div class="col-7">
                                    {{ $participant->institute_name }}
                                </div>
                            </div>
                            <div class="row mb-2 g-0">
                                <div class="col-4">Institute Address</div>
                                <div class="col-1">:</div>
                                <div class="col-7">
                                    {{ $participant->institute_address }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
