@component('mail::message')
# Dear {{ $payment->registration->user->name }}, <br>

<p>Thank you for registering for the National English Olympics 2022. We have received and reviewed your payment for
competition registration.</p>

<p>Unfortunately, your payment was declined due to incomplete payment transaction or fake payment proof.</p>

<p>If you have the further question, please contact us at our LINE Official @044wlisy or email neo.bnec@gmail.com</p>

@component('vendor.mail.text.signature')
@endcomponent
@endcomponent
