@component('mail::message')
Welcome to Blog, {{ $user->name }}!

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
