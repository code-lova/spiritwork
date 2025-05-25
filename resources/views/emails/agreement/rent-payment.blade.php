<x-mail::message>
# Hi {{ $tenantName }},

Your tenancy for **{{ $propertyName }}** has been renewed on **{{ $renewalDate }}**.

Please login to confirm below:


<x-mail::button :url="$agreementUrl">
Login to confirm
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
