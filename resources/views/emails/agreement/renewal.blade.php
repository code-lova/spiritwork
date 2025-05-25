<x-mail::message>
# Agreement Renewal Reminder

Hello {{ $tenantName }},

Your tenancy agreement dated **{{ $agreementDate }}**
is now due for renewal. Please log in and complete your payment to continue occupancy.


<x-mail::button :url="$agreementUrl">
Log In to Renew
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
