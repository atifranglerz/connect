@extends('user.layout.app')
@section('content')
    <section class="main_wraper d-flex"
        style="background-image:url({{ asset('public/assets/images/repair-my-car-logos/chat_image.jpg') }});background-size: contain">
        <div class="chat_overlay d-none"></div>
        <div class="side_inbox">
            <div class="side_inbox_search_sec text-center">
                <h5 class="inbox_nmae">{{ __('msg.Inbox') }}</h5>
                <form>
                    <div class="searchInput">
                        <input class="form-control me-2" id="search_input" placeholder="{{ __('msg.SEARCH') }}">
                        <a href="#" type="submit"><img src="{{ asset('public/assets/images/searchicon.svg') }}"></a>
                    </div>
                </form>
            </div>
            <div id="users" class="main_contact mt-3">
                @foreach ($vendors as $data)
                    <a href="#" class="favorite d-flex align-items-center" id="{{ $data->vendor->id }}">
                        <?php
                        $unread = \App\Models\Chat::where([['customer_receiver_id', auth()->user()->id], ['vendor_sender_id', $data->vendor_id], ['seen', 0]])->count('seen');
                        $vendor = \App\Models\Vendor::where('id', $data->vendor->id)->first();
                        $gettime = strtotime($vendor->online_status) + 8;
                        $now = strtotime(Carbon\Carbon::now());
                        ?>
                        <div class="inbox_contact justify-content-between">
                            <div class="position-relative contact_img">
                                <p id="userNotify">{{ $unread }}</p>
                                <img src="{{ asset($data->vendor->image) }}">
                                @if ($now < $gettime)
                                    <h4 style="color: rgb(17, 243, 17); font-size: 100px;position: absolute;right: -3px;top: 0"
                                        class="online-offline-dot">.</h4>
                                @else
                                    <h4 style="color:white; font-size: 100px;position: absolute;right: -3px;top: 0"
                                        class="online-offline-dot">.</h4>
                                @endif
                            </div>
                            <div class="name_of_contact">
                                <p class="mb-0">{{ $data->vendor->name }}</p>
                            </div>
                            <div class="chat_toggle_button">
                                <a href="#" id="del_toggle"><span
                                        class="bi bi-three-dots-vertical text-white"></span></a>
                                <div class="submenue shadow " id="delet_user_toggle">
                                    <ul>
                                        <li><a href="#" class="chatted_delete d-block" id="{{ $data->vendor->id }}">
                                                <span class="fa fa-trash text-danger" aria-hidden="true"
                                                    style="margin-right: 8px"></span>
                                                {{ __('msg.delete') }}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>

        <div class="chat_section">
            <div id="append_msg">

                <!-- append chat section -->

            </div>
            <div class="sending_input_field d-none" id="sendMessageForm">
                <p><img id="showImage" width="70" /></p>
                <form enctype="multipart/form-data" id="chatForm">
                    @csrf
                    <div class="form-floating d-flex align-items-center form_sending_wraper">
                        <input type="hidden" @if (isset($id)) value="{{ $id }}" @endif
                            name="receiver_id" id="receiver_id">
                        <textarea class="form-control enterKey" name="body" id="typeMsg" placeholder="Say Somthing"></textarea>
                        <button type="submit" class="btn btn-primary" id="sendMsg">{{ __('msg.send') }}</button>
                        <div class="file_input_messages">
                            <input type="file" id="attachment" name="attachment" onchange="loadFile(event)"
                                class="messages_file">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="sec_main_heading text-center mb-0">move to Archive</h5>
                        <a type="button" class="heading-color" data-bs-dismiss="modal"><span
                                class="fa fa-times"></span></a>
                    </div>
                    <div class="modal-body">
                        <div class="garage_name">
                            <form action="{{ route('vendor.withdraw_request') }}" method="post" id="submitform"
                                class="my-2">
                                @csrf
                                <div class="row">

                                    <input type="hidden" name="msg_id" value="" class="form-control" id="msg_id">
                                    <div class="col-12 mb-3 signup_vendo">
                                        <h5 class="mb-0 heading-color">file name</h5>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="text" name="file_name" value="" class="form-control"
                                            id="file_name">
                                        @error('file_name')
                                            <div class="text-danger p-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-primary moveArchive">Move</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        //show selected file
        var loadFile = function(event) {
            $('#showImage').removeClass('d-none');
            var file = $("#attachment").val();
            var extention = file.split('.');
            if (extention[1] == "docx") {
                $('#showImage').attr("src", "{{ asset('public/assets/images/wordicon.png') }}");
            } else if (extention[1] == "pdf") {
                $('#showImage').attr("src", "{{ asset('public/assets/images/pdficon.png') }}");
            } else if (extention[1] == "xlsx") {
                $('#showImage').attr("src", "{{ asset('public/assets/images/excelicon.png') }}");
            } else if (extention[1] == "pptx") {
                $('#showImage').attr("src", "{{ asset('public/assets/images/ppicon.png') }}");
            } else {
                var image = document.getElementById('showImage');
                image.src = URL.createObjectURL(event.target.files[0]);
            }
        };


        $(document).on('click', '.favorite', function() {
            var id = $(this).attr('id');
            $(".favorite").removeClass('active');
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
                    // console.log(response);
                    $('#sendMessageForm').removeClass('d-none');
                    $('#receiver_id').val(response.id);
                    $('#users').empty();
                    $('#users').append(response.vendors);
                    $("#" + id).addClass('active');
                    $('#append_msg').empty();
                    $('#append_msg').append(response.message);
                    $('#notify').html(response.unread);
                    setTimeout(() => {
                        $(".cahtting_messages").scrollTop($(".cahtting_messages")[0]
                            .scrollHeight);
                    }, 10);
                }
            });
        });


        $(document).ready(function() {
            $('form').on('submit', function(event) {
                let c_id = $('#receiver_id').val();
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
                        $("#" + c_id).addClass('active');
                        $('#append_msg').empty();
                        $('#append_msg').append(response.message);
                    },
                    cache: false,
                    contentType: false,
                    processData: false,
                });
            });
        });


        setInterval(ajaxC, 10000);

        function ajaxC() {
            var id = $('.favorite.active').attr('id');
            $.ajax({
                type: "POST",
                dataType: "json",
                headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}',
                },
                url: "{{ route('user.chatted.status') }}",
                data: {
                    'id': id
                },
                success: function(response) {
                    console.log(response);
                    $('#users').empty();
                    $('#users').append(response.vendors);
                    $("#" + id).addClass('active');
                }
            });
        }


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

        // file status change and move to archive
        $(document).on('click', '.filedownload', function() {
            var msg_id = $(this).attr('id');
            $('#msg_id').val(msg_id);

        });

        $(document).on('click', '.moveArchive', function() {
            var msg_id = $('#msg_id').val();
            var file_name = $('#file_name').val();
            $.ajax({
                type: "POST",
                dataType: "json",
                headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}',
                },
                url: "{{ route('user.archive.download') }}",
                data: {
                    'msg_id': msg_id,
                    'file_name': file_name,
                },
                success: function(response) {
                    // console.log(response);
                    $("#exampleModal").modal('hide');
                    $("#" + msg_id).addClass('d-none');
                    $('#file_name').val(' ');
                    
                    toastr.success("file move to archived", 'success');

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
                    setTimeout(() => {
                        $(".cahtting_messages").scrollTop($(".cahtting_messages")[0]
                            .scrollHeight);
                    }, 10);
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
