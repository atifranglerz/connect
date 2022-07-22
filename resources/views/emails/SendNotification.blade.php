@component('mail::message')
# Dear Vendor name,

Customer name request a quote to you and all the vendors. Hurry up and put your quote. Be one to get this request to repair the car. Click on the link to view.

@component('mail::button', ['url' => 'google.com'])
View Detail
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
