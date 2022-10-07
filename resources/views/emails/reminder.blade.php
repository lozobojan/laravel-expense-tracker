@component('mail::message')
# Dear ...,

You haven't logged any expense for today.

Please consider doing it...

@component('mail::button', ['url' => ''])
Go to expense tracker
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
