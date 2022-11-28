<div class="card card-custom p-0 mb-3">
    <div class="card-header-custom">
        <small class="text-secondary">
            <span class="fw-semibold text-primary">
                @if ($status == 'to-pay' || $status == 'expired')
                    REG ID – {{ str_pad($registration->id, 3, '0', STR_PAD_LEFT) }}
                @elseif ($status == 'refund')
                    REF ID - {{ str_pad($refund->id, 3, '0', STR_PAD_LEFT) }}
                @else
                    INVOICE ID – {{ str_pad($registration->payment->id, 3, '0', STR_PAD_LEFT) }}
                @endif
            </span>
            /
            <i class="bi bi-person"></i>
            @if ($status == 'refund')
                {{ $refund->registration->user->name }}
            @else
                {{ $registration->user->name }}
            @endif
            /
            <i class="bi bi-envelope"></i>
            @if ($status == 'refund')
                {{ $refund->registration->user->email }}
            @else
                {{ $registration->user->email }}
            @endif
        </small>
        @if ($status == 'to-pay')
            <small class="text-secondary">Payment Due :
                <span
                    class="fw-semibold text-primary">{{ date('j M, H:i', strtotime($registration->payment_due)) }}</span>
            </small>
        @elseif ($status == 'refund')
            @if ($refund->deleted_at)
                <small class="fw-semibold text-danger">REJECTED</small>
            @elseif ($refund->is_verified == true)
                <small class="fw-semibold text-success">ACCEPTED</small>
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
                        {{ str_pad($refund->registration->id, 3, '0', STR_PAD_LEFT) }}
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
                    COMPETITIONS 
                    @if ($status == 'refund')
                        ({{ $refund->registration->competitions->count() }})
                    @else
                        ({{ $registration->competitions->count() }})
                    @endif
                </small>
                <p class="m-0 text-muted">
                    @if ($status == 'refund')
                        @foreach ($refund->registration->competitions->unique() as $competition)
                            {{ $competition->name == 'Speech' ? $competition->name . ' ' . $competition->category_init : $competition->name }}
                            @if (!$loop->last)
                                <span class="text-muted mx-1">|</span>
                            @endif
                        @endforeach
                    @else
                        @foreach ($registration->competitions->unique() as $competition)
                            {{ $competition->name == 'Speech' ? $competition->name . ' ' . $competition->category_init : $competition->name }}
                            @if (!$loop->last)
                                <span class="text-muted mx-1">|</span>
                            @endif
                        @endforeach
                    @endif
                </p>
            </div>
            <div class="col-2">
                <small class="fw-semibold">TOTAL PAYMENT</small>
                <p class="m-0 text-muted">Rp
                    @if ($status == 'refund')
                        {{ number_format($refund->registration->competitions->sum('pivot.price'), 0, '.', '.') }}
                    @else
                        {{ number_format($registration->competitions->sum('pivot.price'), 0, '.', '.') }}
                    @endif
                </p>
            </div>
        </div>
    </div>
    
    @if ($status != 'refund')
        <div class="border-top p-3">
            <button type="button" class="btn btn-outline-light py-2" data-bs-target="#show{{ $status }}{{ $registration->id }}" data-bs-toggle="modal">
                <i class="bi bi-eye me-1"></i>Details
            </button>
            <button type="button" class="btn btn-outline-light py-2" data-bs-toggle="modal" data-bs-target="#destroy{{ $registration->id }}">
                <i class="bi bi-trash3 me-1"></i>Remove
            </button>

            @if ($status == 'to-verify')
                <button type="button" class="btn btn-primary py-2 px-5 float-end"
                    data-bs-target="#verifyPayment{{ $registration->id }}" data-bs-toggle="modal">Verify</button>
            @elseif($status == 'verified')
                <a href="{{ route('payments.download-invoice', $registration->payment) }}" class="btn btn-outline-light py-2">
                    <i class="bi bi-file-earmark-arrow-down me-1"></i>Invoice
                </a>
                <button type="button" class="btn btn-primary py-2 float-end" data-bs-target="#resend-invoice{{ $registration->payment->id }}" data-bs-toggle="modal">Resend Invoice</button>
            @endif
        </div>
    @elseif ($status == 'refund' && !$refund->deleted_at)
        <div class="border-top p-3">
            <button type="button" class="btn btn-primary py-2 px-5 float-end"
                data-bs-target="#verifyRefund{{ $refund->id }}" data-bs-toggle="modal">Verify</button>
        </div>
    @endif
</div>
