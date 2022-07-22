@component('mail::message')
Forget Password

The body of your message.
<h1>Forget Password Email</h1>

You can reset password link code here:

@component('mail::button', ['url' =>  $data['url']])
   Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
