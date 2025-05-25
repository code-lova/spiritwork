<x-mail::message>
# Hello {{ $data['name'] }}
# Welcome to OCHeaven Homes.


Below Is Your Account Verification OTP CODE.<br>
NOTE: This is not valid after now.

<h1>{{ $data['verification_code'] }}</h1>


Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
