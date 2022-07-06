<div class="chat_top_name ">
    <div class="d-flex justify-content-between align-items-center">
        <a href="#">
            <div class="inbox_contact top_main">
                <?php
                        $vendor = \App\Models\Vendor::where('id',$chated_user->id)->first();
                        $gettime = strtotime($vendor->online_status)+5;
                        $now = strtotime(Carbon\Carbon::now());
                     ?>
                <div class="contact_img">
                    <img src="{{ asset($chated_user->image)}}">
                </div>
                <div class="name_of_contact">
                    <p class="mb-0" id="vendor">{{$chated_user->name}}</p>
                    @if($now > $gettime)
                    <p class="mb-0 status">offline</p>
                    @else
                    <p class="mb-0 status">online</p>
                    @endif
                </div>
            </div>
        </a>
        <div class="chat_toggle_button">
            <a href="#" id="chat_toggle"><i class="bi bi-three-dots-vertical"></i></a>
            <div class="submenue shadow " id="delet_message_toggle">
                <ul>
                    <li><a href="#" class="MobileContactToggler" id="MobileContactToggler">Delete All Messages</a></li>

                </ul>
            </div>
        </div>
    </div>
</div>
<div class="cahtting_messages">
    <div class="main_message">
        @if(count($message)>0)
        @foreach($message as $data)
        @if($data->type == "vendor")
        <div class="inbox_contact align-items-end top_main">
            <div class="contact_img">
                <img src="{{ asset($data->vendor->image)}}">
            </div>
            <div class="message_txt_wraper">
                <p class="mb-2">{{$data->created_at->format('h:s A')}}</p>
                @if($data->msgtype == "text")
                <p class="mb-0 message_txt" id="receiver_side">
                    <span class="fa fa-trash text-danger position-absolute del-content delete" aria-hidden="true"
                        style="right: 3px;top: 3px;font-size: 14px;cursor: pointer" id="{{$data->id}}"></span>
                    {{$data->body}}
                </p>
                @else
                <img src="{{ asset($data->attachment)}}" width="100px">
                <a download="image" href="{{ asset($data->attachment)}}" title="image"><i class="fa fa-download" aria-hidden="true"></i></a>
                <p> {{$data->filetext ?? ''}}</p>
                @endif
            </div>
        </div>
        @else
        <div class="inbox_contact align-items-end justify-content-end top_main">
            <div class="message_txt_wraper">
                <p class="mb-2 text-end">{{$data->created_at->format('h:s A')}}</p>
                @if($data->msgtype == "text")
                <p class="mb-0 message_txt" id="receiver_side">
                    <span class="fa fa-trash text-danger position-absolute del-content delete" aria-hidden="true"
                        style="right: 3px;top: 3px;font-size: 14px;cursor: pointer" id="{{$data->id}}"></span>
                    {{$data->body}}
                </p>
                @else
                <a download="image" href="{{ asset($data->attachment)}}" title="image"><i class="fa fa-download" aria-hidden="true"></i></a>
                <img src="{{ asset($data->attachment)}}" width="100px" >
                <p> {{$data->filetext ?? ''}}</p>
                @endif

            </div>
            <div class="contact_img second_msg">
            </div>
        </div>
        @endif
        @endforeach
        @endif
    </div>
</div>
