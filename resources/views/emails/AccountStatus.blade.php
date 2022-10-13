@component('mail::message')
Account Status

{{$data['reason']}}


Thanks,<br>
{{ config('app.name') }}
@endcomponent
