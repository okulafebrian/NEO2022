@component('mail::message')
# Dear {{ $payment->registration->user->name }}, <br>

<p>Thank you for registering for the National English Olympics 2022. We have received and approved your payment for
competition registration.</p>

<p>Please find the invoice that we have attached to this email for details.</p>

<p>If you have the further question, please contact us at our LINE Official @044wlisy or email neo.bnec@gmail.com</p>

@component('vendor.mail.text.signature')
@endcomponent
@endcomponent
