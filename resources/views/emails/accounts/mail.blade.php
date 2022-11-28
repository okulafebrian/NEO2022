@component('mail::message')
# Dear {{ $participant->name }}, <br>

<p>Thank you for registering for the National English Olympics 2022. To access your <a
href="https://www.neo.mybnec.org/participant/login">participant account</a>, please use the username and password
below:</p>

<p style="font-weight: bold; padding-left: 1rem;">
Username : {{ $participant->username }} <br>
Password : P{{ str_pad($participant->id, 3, '0', STR_PAD_LEFT) }}
</p>

<p>Please also join the
{{ $participant->registrationDetail->competition->name != 'Speech' ? $participant->registrationDetail->competition->name : $participant->registrationDetail->competition->name . ' ' . $participant->registrationDetail->competition->category }}
participant group and big group using following links:</p>

<p style="font-weight: bold; padding-left: 1rem;">
Competition group :
<a href="{{ $participant->registrationDetail->competition->link_group }}">
{{ $participant->registrationDetail->competition->link_group }}
</a>
</p>

<p style="font-weight: bold; padding-left: 1rem;">
Big group :
<a href="https://line.me/R/ti/g/W0wChC-s75">
https://line.me/R/ti/g/W0wChC-s75
</a>
</p>

<p>If you have the further question, please contact us at our LINE Official @044wlisy or email neo.bnec@gmail.com</p>

@component('vendor.mail.text.signature')
@endcomponent
@endcomponent
