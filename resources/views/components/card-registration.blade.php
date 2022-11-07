<div class="card card-custom p-0 mb-3">
    <div class="card-header-custom">
        <small class="text-secondary">
            <b class="text-primary">
                @if ($status == 'to-pay' || $status == 'expired')
                    REG ID – {{ str_pad($registration->id, 3, '0', STR_PAD_LEFT) }}
                @else
                    INVOICE ID – {{ str_pad($registration->payment->id, 3, '0', STR_PAD_LEFT) }}
                @endif
            </b>
            <span>/</span>
            <i class="bi bi-person"></i>
            {{ $registration->user->name }}
            <span>/</span>
            <i class="bi bi-envelope"></i>
            {{ $registration->user->email }}
        </small>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-2">
                <small class="fw-bold">REG DATE</small>
                <p class="m-0 text-muted">
                    {{ date('j M, h:i', strtotime($registration->created_at)) }}
                </p>
            </div>
            <div class="col">
                <small class="fw-bold">
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
                <small class="fw-bold">TOTAL PAYMENT</small>
                <p class="m-0 text-muted">Rp
                    {{ number_format($registration->competitions->sum('pivot.price'), 0, '.', '.') }}
                </p>
            </div>
        </div>
    </div>

    <div class="border-top p-3">
        <button type="button" class="btn btn-outline-light" data-bs-target="#show{{ $registration->id }}"
            data-bs-toggle="modal">
            <i class="bi bi-eye me-1"></i>
            Show Details
        </button>

        @if ($status == 'verified')
            <a href="{{ route('payments.download-invoice', $registration->payment) }}" class="btn btn-outline-light">
                <i class="bi bi-file-earmark-arrow-down me-1"></i>
                Download Invoice
            </a>
        @endif

        @if ($status == 'to-verify')
            <button type="button" class="btn btn-primary px-5 float-end"
                data-bs-target="#verify{{ $registration->id }}" data-bs-toggle="modal">Verify</button>
        @elseif($status == 'verified')
            <button type="button" class="btn btn-primary float-end"
                data-bs-target="#sendInvoice{{ $registration->id }}" data-bs-toggle="modal">Resend Invoice</button>
        @elseif ($status == 'to-pay')
            <div class="alert alert-danger m-0 float-end" role="alert" style="padding: 0.35rem .75rem">
                Payment Due : <b>{{ date('j M, H:i', strtotime($registration->payment_due)) }}</b>
            </div>
        @endif
    </div>
</div>
