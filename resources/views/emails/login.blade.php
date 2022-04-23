@component('mail::message')
# Introduction
{{ $data['name'] }}
Successfull Registration

Thanks,<br>
{{ config('app.name') }}
@endcomponent
