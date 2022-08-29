<x-user title="My Registration - NEO 2022">
    <div class="container py-4">
        <h3 class="mb-4">My Registration</h3>

        @forelse ($registrations as $registration)
            {{-- REGISTRASI EXPIRED --}}
            @if ($registration->expired == true)
                <x-status :registration='$registration' status="expired" />
                @continue
            @endif

            {{-- MENUNGGU PEMBAYARAN --}}
            @if (!$registration->payment)
                <form method="GET" action="{{ route('payments.create') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="registration_id" value="{{ $registration->id }}">
                    <x-status :registration='$registration' status="waiting" />
                </form>
                <script>
                    var id = "{{ $registration->id }}"
                    var time = "{{ $registration->payment_due }}"
                    $('#paymentDue' + id).countdown(time, function(event) {
                        $(this).html(event.strftime('%H:%M:%S'))
                    })
                </script>
                @continue
            @endif

            {{-- PEMBAYARAN BELOM DIKONFIRMASI --}}
            @if ($registration->payment->is_confirmed == false)
                <x-status :registration='$registration' status="unconfirmed" />
                @continue
            @endif

            {{-- PEMBAYARAN SUDAH DIKONFIRMASI --}}
            <x-status :registration='$registration' status="confirmed" />
        @empty
            {{-- BELOM ADA REGISTRASI --}}
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h4>No competitions registerd...yet!</h4>
                    <p>It's time to show your talent and win the competition</p>
                    <a class="btn btn-primary" href="{{ route('dashboard') }}" role="button">Register Now</a>
                </div>
            </div>
        @endforelse

    </div>
</x-user>
