@component('mail::message')
# You have added new expense

New expense amount: {{ $expense->amount_formatted }}
<br/>
Total expenses: {{ number_format($sum, 2) }} €


Thanks,<br>
{{ config('app.name') }}
@endcomponent
