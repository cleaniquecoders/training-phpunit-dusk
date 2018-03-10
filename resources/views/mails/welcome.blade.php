@component('mail::message')

Dear {{ $user->name }},

Thank your for registering with us!

Thanks,<br>
{{ config('app.name') }}
@endcomponent