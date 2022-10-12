@component('mail::message')
# Introduction

Your Email :
@if(isset($data->email))
    {{$data->email}}
@else
    {{$data['email']}}
@endif
{{-- {{$data['name']}}
{{$data['id']}}
{{$data['type']}} --}}


@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
