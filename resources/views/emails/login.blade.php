@component('mail::message')


Thank you {{ $data['name'] }}. You are now a part of a community that connects people. Find a  service providers or search the right service  and. Log-on to your member page at:

@component('mail::button', ['url' =>  $data['link']])
    Login To Dashboard
    @endcomponent
<br>
In case you need to talk, please call us at our support +971 56 784 5425<br>
Or send us a mail at <a href="support@repairmycar.com">support@repairmycar.com</a><br>
Best Regards,<br>
RepairMyCar Services<br>
@endcomponent
