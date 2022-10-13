@component('mail::message')


Thank you {{ $data['name'] }}. Your submission will be reviewed by Repair My Car team, and on the basis of that soon your account will be activated and we'll send you a activatation email as a reminder.

{{-- @component('mail::button', ['url' =>  $data['link']])
    Login To Dashboard
    @endcomponent --}}
<br>
In case you need to talk, please call us at our support +971 56 784 5425<br>
Or send us a mail at <a href="support@repairmycar.com">support@repairmycar.com</a><br>
Best Regards,<br>
RepairMyCar Services<br>
@endcomponent
