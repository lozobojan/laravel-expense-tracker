@component('mail::message')
# You have added new expense

Expense amount: {{ $expense->amount_formatted }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
