@component('mail::message')
# Hello {{ $tenant->name }},

Your recent report has been replied to by the admin.

@component('mail::panel')
{{ $reply->reply }}
@endcomponent

Please log in to your account to view more details.

Thanks,
{{ config('app.name') }}
@endcomponent
