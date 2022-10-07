@component('mail::message')
<h3 style="margin: auto;width:100px">Add Approvel</h3>
Dear {{ isset($data->user_id) ? $data->user['name'] : $data->vendor['name']}},

Congratulation ! Your ad has been approved.

<p>Model: {{$data->company->company}}</p>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
