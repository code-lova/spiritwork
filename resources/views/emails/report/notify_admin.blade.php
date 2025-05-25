<x-mail::message>
# Action Required

Hello Sir,

You have a new report from your tenant: **{{ $tenantname }}**.
Please log in to your account to repond to this ASAP.

<x-mail::button :url="$agreementUrl">
Log in to Sign Agreement
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
