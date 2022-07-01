<div>
    @foreach($customer as $data)
    <a href="#" class="favorite d-flex align-items-center" id="{{$data->customer->id}}">
        <?php
            $unread = \App\Models\Chat::where([['vendor_receiver_id',auth()->user()->id],['customer_sender_id',$data->customer_id],['seen',0]])->count('seen');
            $user = \App\Models\User::where('id',$data->customer->id)->first();
            $gettime = strtotime($user->online_status)+5;
            $now = strtotime(Carbon\Carbon::now());
       ?>
        <p>{{$now.'/'.$gettime}}</p>
        <div class="inbox_contact justify-content-between">
            <p>{{$unread}}</p>
            <div class="contact_img">
                <img src="{{ asset($data->customer->image)}}">
            </div>
            <div class="name_of_contact">
                <p class="mb-0">{{$data->customer->name}}</p>
            </div>
            @if($now < $gettime)
            <span id="online_status" class="chatbox-option__notification notify text-red">online</span>
            @endif
                <div>
                    <div class="chat_toggle_button">
                        <a href="#" id="chat_toggle"><span class="bi bi-three-dots-vertical text-white"></span></a>
                        <div class="submenue shadow " id="delet_message_toggle">
                            <ul>
                                <li><a href="#" class="chatted_delete d-block" id="{{$data->customer->id}}">
                                        <span class="fa fa-trash text-danger" aria-hidden="true"
                                            style="margin-right: 8px"></span>
                                        delete</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

        </div>

    </a>
    @endforeach
</div>