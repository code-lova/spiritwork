<x-mail::message>
# Action Required

Dear {{ $tenantName }},

Your agreement has been generated for **{{ $propertyName }}**.
Please log in to your account and sign your portion of the document.

<x-mail::button :url="$agreementUrl">
Log in to Sign Agreement
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
