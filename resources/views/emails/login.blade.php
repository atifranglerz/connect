@component('mail::message')
# Introduction
{{ $data['name'] }}
Successfull login.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
