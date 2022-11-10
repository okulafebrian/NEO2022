<div class="modal fade" id="paymentMethod" tabindex="-1" style="z-index: 999999">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" style="max-width: 35rem">
        <div class="modal-content border-0" style="max-height: 30rem;">
            <div class="modal-header py-4">
                <h5 class="m-auto fw-semibold">Select Payment Method</h5>
                <i class="bi bi-x fa-2xl" role="button" data-bs-dismiss="modal"></i>
            </div>

            <div class="modal-body py-4 px-3">
                <ul class="list-group list-group-flush">
                    @foreach ($paymentProviders as $index => $paymentProvider)
                        @if ($loop->first)
                            <h6>Bank Transfers</h6>
                        @endif

                        @if ($paymentProvider->type == 'EWALLET' && $paymentProviders[$index - 1]->type == 'BANK')
                            <hr class="mt-2">
                            <h6 class="mt-0">E-Wallets</h6>
                        @endif

                        <li class="list-group-item list-group-item-action py-2 px-lg-3 px-2 border-0 rounded-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <input id="provider{{ $paymentProvider->id }}"
                                        class="form-check-input btn-check me-1" type="radio"
                                        value="{{ $paymentProvider->type }} {{ $paymentProvider->name }}">
                                    <label class="form-check-label stretched-link"
                                        for="provider{{ $paymentProvider->id }}">
                                        @if ($paymentProvider->name != 'Other')
                                            <img src="/storage/images/assets/{{ $paymentProvider->name }}.webp"
                                                alt="{{ $paymentProvider->name }}" width="50" class="me-4">
                                        @else
                                            <span>{{ $paymentProvider->name }}</span>
                                        @endif
                                    </label>
                                </div>
                                <i class="fa-solid fa-chevron-right"></i>
                            </div>
                        </li>

                        <script>
                            $('#provider{{ $paymentProvider->id }}').on('click', function() {
                                if ($(this).val().includes("Other")) {
                                    var type = "{{ $paymentProvider->type }}"

                                    $('#other' + type).modal('toggle')
                                } else {
                                    var name = "{{ $paymentProvider->name }}"

                                    $('#paymentMethodName').text(name).css('color', 'black')
                                    $('input[name="payment_method"]').val($(this).val())
                                }

                                $('#paymentMethod').modal('toggle')
                            })
                        </script>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

{{-- OTHER PAYMENT METHOD MODAL --}}
<div class="modal fade" id="otherBANK" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0" style="max-height: 30rem;">
            <div class="modal-header d-flex justify-content-start">
                <a type="button" class="text-dark px-2" data-bs-target="#paymentMethod" data-bs-toggle="modal">
                    <i class="fa-solid fa-chevron-left"></i>
                </a>
                <h5 class="fw-semibold ms-2">
                    Fill in Bank Name
                </h5>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Bank Name</label>
                    <input type="text" class="form-control">
                    <div class="invalid-feedback">
                        Please input your bank provider name.
                    </div>
                </div>
                <div class="text-end">
                    <button type="button" class="btn btn-primary py-2 px-4" style="font-size: 14px">Confirm</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="otherEWALLET" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0" style="max-height: 30rem;">
            <div class="modal-header d-flex justify-content-start">
                <a type="button" class="text-dark px-2" data-bs-target="#paymentMethod" data-bs-toggle="modal">
                    <i class="fa-solid fa-chevron-left"></i>
                </a>
                <h5 class="fw-semibold ms-2">
                    Fill in E-Wallet Name
                </h5>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">E-Wallet Name</label>
                    <input type="text" class="form-control">
                    <div class="invalid-feedback">
                        Please input your e-wallet provider name.
                    </div>
                </div>
                <div class="text-end">
                    <button type="button" class="btn btn-primary py-2 px-4" style="font-size: 14px">Confirm</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#otherBANK button').on('click', function() {
        if ($('#otherBANK input').val()) {
            var name = $('#otherBANK input').val()

            $('#paymentMethodName').text(name).css('color', 'black')
            $('input[name="payment_method"]').val('BANK ' + name)
            $('#otherBANK .invalid-feedback').hide()
            $('#otherBANK').modal('toggle')
        } else {
            $('#otherBANK .invalid-feedback').show()
        }
    })

    $('#otherEWALLET button').on('click', function() {
        if ($('#otherEWALLET input').val()) {
            var name = $('#otherEWALLET input').val()

            $('#paymentMethodName').text(name).css('color', 'black')
            $('input[name="payment_method"]').val('EWALLET ' + name)
            $('#otherEWALLET .invalid-feedback').hide()
            $('#otherEWALLET').modal('toggle')
        } else {
            $('#otherEWALLET .invalid-feedback').show()
        }
    })
</script>
