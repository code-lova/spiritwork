@component('mail::message')
# Identity Verification {{ ucfirst($status) }}

Dear {{ $user->name }},

Your submitted identification document has been **{{ $status }}**.

@if($status === 'approved')
You can now access all features requiring identity verification.
@else
Unfortunately, your document did not meet our verification criteria. Please try uploading a clearer and valid ID.
@endif

@component('mail::button', ['url' => url('/user/profile')])
Go to Profile
@endcomponent

Thanks,<br>
{{ config('app.name') }} Team
@endcomponent
