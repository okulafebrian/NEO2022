<x-admin title="Payment">
    <div class="container">
        @foreach ($payments as $payment)
            <p>{{ $payment->registration_id }}</p>
            <p>{{ $payment->name }}</p>
            <p>{{ $payment->payment_amount }}</p>

            @if($payment->is_confirmed === 0)
                <p>Pending</p>
            @else
                <p>Confirmed</p>
            @endif
        @endforeach
    </div>
</x-admin>