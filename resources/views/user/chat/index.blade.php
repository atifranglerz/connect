@extends('user.layout.app')
@section('content')
<section class="main_wraper d-flex">
    <div class="chat_overlay d-none"></div>
    <div class="side_inbox">
        <div class="side_inbox_search_sec text-center">
            <h5 class="inbox_nmae">Inbox</h5>
            <form>
                <div class="searchInput">
                    <input class="form-control me-2" id="search_input" placeholder="Search">
                    <a href="#" type="submit"><img src="{{ asset('public/assets/images/searchicon.svg')}}"></a>
                </div>
            </form>
        </div>
        <div id="users" class="main_contact mt-3">
            @foreach($vendors as $data)
            <a href="#" class="favorite d-flex align-items-center" id="{{$data->vendor->id}}">
                <?php
                    $unread = \App\Models\Chat::where([['customer_receiver_id',auth()->user()->id],['vendor_sender_id',$data->vendor_id],['seen',0]])->count('seen');
                   ?>
                <div class="inbox_contact justify-content-between">
                    <p id="userNotify">{{$unread}}</p>
                    <div class="contact_img">
                        <img src="{{ asset($data->vendor->image)}}">
                    </div>
                    <div class="name_of_contact">
                        <p class="mb-0">{{$data->vendor->name}}</p>
                    </div>
                    <div class="chat_toggle_button">
                        <a href="#" id="del_toggle"><span class="bi bi-three-dots-vertical text-white"></span></a>
                        <div class="submenue shadow " id="delet_user_toggle">
                            <ul>
                                <li><a href="#" class="chatted_delete d-block" id="{{$data->vendor->id}}">
                                        <span class="fa fa-trash text-danger" aria-hidden="true"
                                            style="margin-right: 8px"></span>
                                        delete</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </a>

            @endforeach
        </div>
    </div>

    <div class="chat_section" style="background-image:url('assets/images/chat_bg.png')">
        <div id="append_msg">

            <!-- append chat section -->

        </div>
        <div class="sending_input_field d-none" id="sendMessageForm" >
        <img id="showImage" src="" />
            <form enctype="multipart/form-data" id="chatForm">
                @csrf
                <div class="form-floating d-flex align-items-center form_sending_wraper">
                <input type="hidden" @if(isset($id)) value="{{$id}}" @endif name="receiver_id" id="receiver_id">
                    <textarea class="form-control enterKey" name="body" id="typeMsg"
                        placeholder="Say Somthing"></textarea>
                    <button type="submit" class="btn btn-primary" id="sendMsg">send</button>
                    <div class="file_input_messages">
                    <input type="file" id="attachment" name="attachment" accept="image/gif, image/jpeg, image/png"
                            onchange="readURL(this);" class="messages_file">
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection

@section('script')
<script>

    //show selected file
function readURL(input) {
    $('#showImage').removeClass('d-none');
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#showImage').attr('src', e.target.result).width(70).height(70);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$(document).on('click', '.favorite', function() {
    var id = $(this).attr('id');
    console.log(id);
    $.ajax({
        type: "POST",
        dataType: "json",
        headers: {
            'X-CSRF-Token': '{{ csrf_token() }}',
        },
        url: "{{ route('user.chat.favorite') }}",
        data: {
            'id': id
        },
        success: function(response) {
            console.log(response);
            $('#sendMessageForm').removeClass('d-none');
            $('#receiver_id').val(response.id);
            $('#users').empty();
            $('#users').append(response.vendors);
            $('#append_msg').empty();
            $('#append_msg').append(response.message);
            $('#notify').html(response.unread);
        }
    });
});


$(document).ready(function() {
    $('form').on('submit',function(event){ 
        event.preventDefault();
        $.ajax({
            url: "{{ route('user.chatSend') }}",
            type: 'POST',
            data: new FormData(this),
            async: false,
            success: function(response) {
                console.log(response);
                $('#users').empty();
                $("#typeMsg").val("");
                $("#attachment").val("");
                $('#users').append(response.vendors);
                $('#append_msg').empty();
                $('#append_msg').append(response.message);
            },
            cache: false,
            contentType: false,
            processData: false,
        });
    });
});



$(document).on('click', '.MobileContactToggler', function() {

    let id = $('#receiver_id').val();
    console.log(id);
    $.ajax({
        type: "POST",
        dataType: "json",
        headers: {
            'X-CSRF-Token': '{{ csrf_token() }}',
        },
        url: "{{ route('user.chat.all_delete') }}",
        data: {
            'id': id
        },
        success: function(response) {
            console.log(response);
            $('#append_msg').empty();
            $('#append_msg').append(response.message);
        }
    });
});


$(document).on('click', '.delete', function() {
    var msg_id = $(this).attr('id');
    let id = $('#receiver_id').val();

    $.ajax({
        type: "POST",
        dataType: "json",
        headers: {
            'X-CSRF-Token': '{{ csrf_token() }}',
        },
        url: "{{ route('user.chat.delete') }}",
        data: {
            'msg_id': msg_id,
            'id': id
        },
        success: function(response) {
            console.log(response);
            $('#append_msg').empty();
            $('#append_msg').append(response.message);
        }
    });
});



$(document).on('click', '.chatted_delete', function() {
    var id = $(this).attr('id');
    console.log(id);
    $.ajax({
        type: "POST",
        dataType: "json",
        headers: {
            'X-CSRF-Token': '{{ csrf_token() }}',
        },
        url: "{{ route('user.chat.chatted_delete') }}",
        data: {
            'id': id
        },
        success: function(response) {
            console.log(response);
            $('#sendMessageForm').addClass('d-none');
            $('#users').empty();
            $('#users').append(response.message);
            $('#append_msg').empty();
        }
    });
});
</script>
@endsection