@component('mail::message')
# Identity Document Submission

User **{{ $user->name }}** ({{ $user->email }}) has submitted an identity document for verification.

@component('mail::panel')
Login admin panel to see Identification Document
@endcomponent

Please review and verify the document as soon as possible.

Thanks,
{{ config('app.name') }}
@endcomponent
