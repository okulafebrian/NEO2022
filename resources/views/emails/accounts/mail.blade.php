@component('mail::message')
# Dear {{ $participant->name }}, <br>

<p>Thank you for registering for the National English Olympics 2022. To access your <a href="https://www.neo.mybnec.org/participant/login">participant account</a>, please use the username and password below:</p>

<p style="font-weight: bold">
<span style="margin-left: 1rem">Username   : {{ $participant->username }}</span> <br>
<span style="margin-left: 1rem">Password   : P{{ str_pad($participant->id, 3, '0', STR_PAD_LEFT) }}</span>
</p>

<p>If you have the further question, please contact us at our LINE Official @044wlisy or email neo2022.as@gmail.com</p>

@component('vendor.mail.text.signature')
@endcomponent
@endcomponent