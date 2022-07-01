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
    </div>


</section>
@endsection

@section('script')
<script>
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
            $('#users').empty();
            $('#users').append(response.vendors);
            $('#append_msg').empty();
            $('#append_msg').append(response.message);
            $('#notify').html(response.unread);
        }

    });
});

$(document).ready(function() {
    $(document).on('click', '#sendMsg', function() {

        let body = $('#typeMsg').val();
        let id = $('#receiver_id').val();
        let attachment = $('#attachment').val();
        if (body != ' ') {
            $.ajax({
                type: 'POST',
                url: "{{ route('user.chatSend') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: id,
                    body: body,
                    attachment: attachment,
                },
                dataType: "json",

                success: function(response) {
                    console.log(response);
                    $('#users').empty();
                    $('#users').append(response.vendors);
                    $('#append_msg').empty();
                    $('#append_msg').append(response.message);
                    $('#notify').html(response.unread);


                }
            });
        }
    });
});


$(document).on('click', '.MobileContactToggler', function() {

    let id = $('#receiver_id').val();
    // alert(id);
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
            $('#users').empty();
            $('#users').append(response.message);
            $('#append_msg').empty();

        }

    });
});

</script>
@endsection