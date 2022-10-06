@component('mail::message')

<h3>{{$message['title']}}</h3>
<p style="margin: 35px 0 15px;">Dear Customer,</p>
<p>{{$message['body1']}} <a href="{{ $message['link1']}}">Order No {{$message['order_no']}}</a> {{$message['body2']}} @if(isset($message['link2']))<a href="{{ $message['link2']}}">Chat Now</a> {{$message['body3']}} @endif </br>You are welcome to contact our support <a href="edev@ranglerz.pw">here</a> team if you have any questions.</p>
<!-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent -->
Thanks,<br>
{{ config('app.name') }}
@endcomponent
