@component('mail::message')
    Dear {{ $payment->registration->user->name }}, <br>

    Please see attached the invoice {{ str_pad($payment->id, 3, '0', STR_PAD_LEFT) }} for the payment 0f National
    English
    Olympics 2022 competitions. The invoice is due by {{ date('d-m-Y', strtotime($payment->created_at)) }.
        <br>
        <br>
        Please don't hestitate to get in touch if you have any questions or need clarifications.
        @component('vendor.mail.text.signature')
    @endcomponent
@endcomponent
