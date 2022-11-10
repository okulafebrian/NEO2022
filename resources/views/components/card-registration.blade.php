<div class="card card-custom p-0 mb-3">
    <div class="card-header-custom">
        <small class="text-secondary">
            <span class="fw-semibold text-primary">
                @if ($status == 'to-pay' || $status == 'expired')
                    REG ID – {{ str_pad($registration->id, 3, '0', STR_PAD_LEFT) }}
                @elseif ($status == 'refund')
                    REF ID - {{ str_pad($registration->refund->id, 3, '0', STR_PAD_LEFT) }}
                @else
                    INVOICE ID – {{ str_pad($registration->payment->id, 3, '0', STR_PAD_LEFT) }}
                @endif
            </span>
            /
            <i class="bi bi-person"></i>
            {{ $registration->user->name }}
            /
            <i class="bi bi-envelope"></i>
            {{ $registration->user->email }}
        </small>
        @if ($status == 'to-pay')
            <small class="text-secondary">Payment Due :
                <span
                    class="fw-semibold text-primary">{{ date('j M, H:i', strtotime($registration->payment_due)) }}</span>
            </small>
        @elseif ($status == 'refund')
            @if ($registration->refund->is_verified == true)
                <small class="fw-semibold text-success">ACCEPTED</small>
            @elseif ($registration->refund->is_verified == false)
                <small class="fw-semibold text-danger">REJECTED</small>
            @else
                <small class="fw-semibold text-primary">PENDING</small>
            @endif
        @endif
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-2">
                @if ($status == 'refund')
                    <small class="fw-semibold">REG ID</small>
                    <p class="m-0 text-muted">
                        {{ str_pad($registration->id, 3, '0', STR_PAD_LEFT) }}
                    </p>
                @else
                    <small class="fw-semibold">REG DATE</small>
                    <p class="m-0 text-muted">
                        {{ date('j M, H:i', strtotime($registration->created_at)) }}
                    </p>
                @endif
            </div>
            <div class="col">
                <small class="fw-semibold">
                    COMPETITIONS ({{ $registration->competitions->count() }})
                </small>
                <p class="m-0 text-muted">
                    @foreach ($registration->competitions->unique() as $competition)
                        {{ $competition->name == 'Speech' ? $competition->name . ' ' . $competition->category_init : $competition->name }}
                        @if (!$loop->last)
                            <span class="text-muted mx-1">|</span>
                        @endif
                    @endforeach
                </p>
            </div>
            <div class="col-2">
                <small class="fw-semibold">TOTAL PAYMENT</small>
                <p class="m-0 text-muted">Rp
                    {{ number_format($registration->competitions->sum('pivot.price'), 0, '.', '.') }}
                </p>
            </div>
        </div>
    </div>

    <div class="border-top p-3">
        <button type="button" class="btn btn-outline-light py-2"
            data-bs-target="#show{{ $status }}{{ $registration->id }}" data-bs-toggle="modal">
            <i class="bi bi-eye me-1"></i>Details
        </button>

        <button type="button" class="btn btn-outline-light py-2" data-bs-toggle="modal" data-bs-target="#destroy{{ $registration->id }}">
            <i class="bi bi-trash3 me-1"></i>Remove
        </button>

        <x-modal-confirmation action="destroy" title="Remove Registration" name="registrations" :model='$registration'>
            Are you sure want to remove REG ID – {{ str_pad($registration->id, 3, '0', STR_PAD_LEFT) }}?
        </x-modal-confirmation>


        @if ($status == 'verified')
            <a href="{{ route('payments.download-invoice', $registration->payment) }}"
                class="btn btn-outline-light py-2">
                <i class="bi bi-file-earmark-arrow-down me-1"></i>Invoice
            </a>
        @endif

        @if ($status == 'to-verify')
            <button type="button" class="btn btn-primary py-2 px-5 float-end"
                data-bs-target="#verifyPayment{{ $registration->id }}" data-bs-toggle="modal">Verify</button>
        @elseif($status == 'verified')
            <button type="button" class="btn btn-primary py-2 float-end">Resend Invoice</button>
        @elseif($status == 'refund' && $registration->refund->is_verified == -1)
            <button type="button" class="btn btn-primary py-2 px-5 float-end"
                data-bs-target="#verifyRefund{{ $registration->refund->id }}" data-bs-toggle="modal">Verify</button>
        @endif
    </div>
</div>
