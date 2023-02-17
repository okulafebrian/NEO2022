@component('mail::message')
# Dear {{ $refund->registration->user->name }}, <br>

<p>Your refund request has been accepted. We have transferred back your payment of Rp
{{ number_format($refund->payment_amount, 0, '.', '.') }} to:</p>

<p>
<span style="margin-left: 1rem">{{ $refund->dest_account_name }}</span> <br>
<span style="margin-left: 1rem">{{ $refund->bank_name }} {{ $refund->dest_account_number }}</span>
</p>

<p>Please find the proof of payment that we have attached to this email.</p>

<p>If you have the further question, please contact us at our LINE Official @044wlisy or email neo.bnec@gmail.com</p>

@component('vendor.mail.text.signature')
@endcomponent
@endcomponent
