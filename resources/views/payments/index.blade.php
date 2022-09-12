<x-admin title="Payment">
    <div class="container">
        @foreach ($payments as $payment)
        <div class="flex"></div>
            <p>{{$payment->registration_id}}</p>
            <p>{{$payment->payment_type }}</p>
            <p>{{$payment->account_name}}</p>
            <p>{{$payment->payment_amount}}</p>
            <p>{{$payment->is_confirmed}}</p>
            @if ($payment->is_confirmed === 0)
                <p>Waiting for confirmation</p>
            @elseif($payment->is_confirmed)
        @endforeach
    </div>
</x-admin>