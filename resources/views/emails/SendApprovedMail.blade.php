@component('mail::message')
Dear {{$data->user['name']}},

Congratulation ! Your ad has been approved.


Thanks,<br>
{{ config('app.name') }}
@endcomponent
