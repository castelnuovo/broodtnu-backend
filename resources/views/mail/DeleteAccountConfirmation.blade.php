@component('mail::message')

# Delete Account Confirmation

Hello {{ $user->name }},

Your account has been deleted successfully.

If you think this may be an error please contact us:

@component('mail::button', ['url' => $contactUrl])
Contact
@endcomponent

Thanks,<br>
{{ config('app.name') }}<br>
{{ config('app.domain') }}

@endcomponent
