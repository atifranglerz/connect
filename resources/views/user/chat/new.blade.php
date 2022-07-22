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
                    style="right: 3px;top: 3px;font-size: 11px;cursor: pointer" id="{{$data->id}}"></span>
                {{$data->body}}
            </p>
            @else
            <div class="message_txt">
                <span class="fa fa-trash text-danger position-absolute del-content delete" aria-hidden="true"
                    style="right: 3px;top: 3px;font-size: 11px;cursor: pointer" id="{{$data->id}}"></span>
                <div class="position-relative d-flex justify-content-center align-items-center img-download-block">
                    <img src="{{ asset($data->attachment)}}" width="100px">
                    <a class="position-absolute" download="image" href="{{ asset($data->attachment)}}" title="image"><i
                            class="fa fa-download" aria-hidden="true"></i></a>
                </div>
                @if(isset($data->filetext))
                <p class="mb-0">{{$data->filetext ?? ''}}</p>
                @endif
            </div>
            @endif
        </div>
    </div>
    @endif
    @endforeach
    @endif
</div>