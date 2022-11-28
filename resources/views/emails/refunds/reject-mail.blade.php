@component('mail::message')
# Dear {{ $refund->registration->user->name }}, <br>

<p>Your refund request has been rejected. We are sorry to announce that your refund request was rejected because your
payment proof was incomplete or fake.</p>

<p>If you have the further question, please contact us at our LINE Official @044wlisy or email neo.bnec@gmail.com</p>

@component('vendor.mail.text.signature')
@endcomponent
@endcomponent
