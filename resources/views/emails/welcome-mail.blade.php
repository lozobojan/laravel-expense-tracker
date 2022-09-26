@component('mail::message')
# Dear {{ $newUser->name }}, welcome to LaravelExpenseTracker

You can use this app to track your personal expenses.

@component('mail::button', ['url' => 'http://127.0.0.1:8000'])
Go to ExpenseTracker
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
