<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('public/user/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- custome css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/poppins.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/inter.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/style.css') }} ">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/newstyle.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/user/assets/css/style.css') }} ">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/user/assets/css/newstyle.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('public/user/assets/OwlCarousel/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/user/assets/OwlCarousel/dist/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/user/assets/image-uploader/dist/image-uploader.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/toastr/css/toastr.min.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Customer panel |{{ $page_title ?? "" }}</title>
    <link rel='shortcut icon' type='image/x-icon' href='{{ asset('public/user/assets/favicon/favicon.ico') }}' />
    <style>
        /* width */
        .login_sinup > .accoutntData > .notification_tooltip > ul.notification_list::-webkit-scrollbar, .form_sending_wraper > textarea::-webkit-scrollbar, ul.sidebar_navcigation::-webkit-scrollbar {
            display: none;
        }
        .panel-title {
            display: inline;
            font-weight: bold;
        }

        .display-table {
            display: table;
        }

        .display-tr {
            display: table-row;
        }

        .display-td {
            display: table-cell;
            vertical-align: middle;
            width: 61%;
        }
        .has-error .form-control {
            border-color: #a94442;
        }
/*rating stars*/
.rating-stars {
    padding: 0px 15px;
    margin-bottom: 16px;
    justify-content: center;
}

.rating__label {
    margin-bottom: 0;
}

/* use display:inline-flex to prevent whitespace issues. alternatively, you can put all the children of .rating-group on a single line */
.rating-group {
    display: inline-flex;
}

/* make hover effect work properly in IE */
.rating__icon {
    pointer-events: none;
}

/* hide radio inputs */
.rating__input {
    position: absolute !important;
    left: -9999px !important;
}

/* set icon padding and size */
.rating__label {
    cursor: pointer;
    /* if you change the left/right padding, update the margin-right property of .rating__label--half as well. */
    padding: 0 0.1em;
    font-size: 24px;
}

/* add padding and positioning to half star labels */
.rating__label--half {
    padding-right: 0;
    margin-right: -30px;
    z-index: 2;
}

/* set default star color */
.rating__icon--star {
    color: #ff6a00;
}

/* set color of none icon when unchecked */
.rating__icon--none {
    color: #eee;
}

/* if none icon is checked, make it red */
.rating__input--none:checked + .rating__label .rating__icon--none {
    color: red;
}

/* if any input is checked, make its following siblings grey */
.rating__input:checked ~ .rating__label .rating__icon--star {
    color: #ddd;
}

/* make all stars orange on rating group hover */
.rating-group:hover .rating__label .rating__icon--star,
.rating-group:hover .rating__label--half .rating__icon--star {
    color: #ff6a00;
}

/* make hovered input's following siblings grey on hover */
.rating__input:hover ~ .rating__label .rating__icon--star,
.rating__input:hover ~ .rating__label--half .rating__icon--star {
    color: #ddd;
}

/* make none icon grey on rating group hover */
.rating-group:hover .rating__input--none:not(:hover) + .rating__label .rating__icon--none {
    color: #eee;
}

/* make none icon red on hover */
.rating__input--none:hover + .rating__label .rating__icon--none {
    color: #ff6a00;
}

/*rating stars*/

        .form-check-input:checked {
            background-color: var(--orange);
            border-color: var(--orang-mask);
        }

        .form-check-input:focus {
            box-shadow: 0 0 0 0 var(--orang-mask);
        }

        .form-switch .form-check-input:checked {
            background-image: url( {{ url('public/user/assets/images/toggler.svg') }});
        }

        .form-switch .form-check-input:focus {
            background-image: url( {{ url('public/user/assets/images/toggler.svg') }});
        }

        .form-check-input:focus {
            border-color: var(--orange);
        }

        .form-switch .form-check-input {
            background-image: url( {{ url('public/user/assets/images/orangesvg.svg') }});
        }

        .form-switch.toggler_switch {
            padding-left: 7.5em;
        }

        .lang_toggler > label {
            color: var(--orange);
        }

        .lang_toggler > label.arabi {
            position: absolute;
            left: 26px;

        }

        .lang_toggler > label.english {
            position: absolute;
            right: 26px;
        }

        @media (max-width: 575px) {
            .form-switch.toggler_switch {
                padding-left: 7.5em;
            }

            .form-switch .form-check-input {
                width: 2em;
            }

            .lang_toggler > label.arabi {
                left: 45px;
            }

            .lang_toggler > label.english {
                right: 35px;
            }
        }

        @media (min-width: 992px) and (max-width: 1024px) {
            .form-switch.toggler_switch {
                padding-left: 5.5em;
            }
        }
    </style>
</head>

<body>
<div class="main ">
    <div class="over_lay d-none" id="sideNavOverlay"></div>
    @include('user.common.sidebar')
    <div class="right_main" id="dashboardSidebarRightContent">
        @include('user.common.header')
        @yield('content')
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ asset('public/user/assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="https://kit.fontawesome.com/611bc9fae4.js" crossorigin="anonymous"></script>
<script src="{{ asset('public/user/assets/OwlCarousel/dist/owl.carousel.min.js') }}"></script>
<script src="{{ asset('public/user/assets/image-uploader/dist/image-uploader.min.js') }}"></script>
<script src="{{asset('public/assets/select2/js/select2.min.js')}}"></script>
<script src="{{asset('public/assets/toastr/js/toastr.min.js')}}"></script>
<script src="{{ asset('public/assets/js/custom.js') }}"></script>
@yield('script')
<!-- Sweet Alert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        width: '27rem',
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
        @if (Session()->has('message'))
    var type = "{{ Session::get('alert') }}";
    switch (type) {
        case'info':
            Toast.fire({
                icon: 'info',
                title: '{{ Session::get("message") }}'
            })
            break;
        case 'success':
            Toast.fire({
                icon: 'success',
                title: '{{ Session::get("message") }}'
            })
            break;
        case 'warning':
            Toast.fire({
                icon: 'warning',
                title: '{{ Session::get("message") }}'
            })
            break;
        case'error':
            Toast.fire({
                icon: 'error',
                title: '{{ Session::get("message") }}'
            })
            break;
    }
    @endif
    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

</script>

<script type="text/javascript">
    /*scrolling banner*/
    $(document).ready(function(){
        $('.input-images').imageUploader({
            extensions: ['.png', '.jpg'],
            maxFiles:5,
        });
        $(".input-images>.image-uploader>.upload-text").append('<label class="img_wraper_label"><div class="file_icon_wraper"><img src="{{ asset('public/user/assets/images/fileuploadicon.svg') }}"></div><p class="mb-0">Upload Car image <b class="small">(Format: png, jpg only)</b></p><input name="car_images[]" type="file" size="60"></label>');
        $('.input-images-2').imageUploader({
            extensions: ['.pdf'],
            mimes: ['application/pdf'],
            maxFiles:1,
        });
        $(".input-images-2>.image-uploader>.upload-text").append('<label class="img_wraper_label skip"><div class="file_icon_wraper"><img src="{{ asset('public/user/assets/images/fileuploadicon.svg') }}"></div><p class="mb-0">Upload Police/Accident/Inspection Report</p><input type="file" name="files" size="60" ></label>   ');
        $('.input-images-3').imageUploader({
            extensions: ['.png', '.jpg'],
            maxFiles:5,
        });
        $(".input-images-3>.image-uploader>.upload-text").append('<label class="img_wraper_label"><div class="file_icon_wraper"><img src="{{ asset('public/user/assets/images/fileuploadicon.svg')}}"></div><p class="mb-0">Add Registration Copy Image <b class="small">(Format: png, jpg only)</b></p><input type="file" name="doucment[]" size="60" ></label>   ');
        $('.image-uploader-edit').imageUploader();
        $(".image-uploader-edit>.image-uploader>.upload-text").append('<label class="img_wraper_label"><div class="file_icon_wraper"><img src="{{ asset('public/user/assets/images/fileuploadicon.svg')}}"></div><p class="mb-0">Upload Your Picture To Update</p><input type="file" name="profile" size="60" ></label>');
        $(document).on('click', '#menuToggle', function () {
            $("#dashboardSidebarRightContent").toggleClass("toggled");
            $("#dashboardSidebar").toggleClass("sidebar-toggle");
        });

        /*dashboard right side content toggle*/
        /*dashboard right side content and sidebar toggle switching*/
        sideBarToggleSwitch();
        /*dashboard right side content and sidebar toggle switching*/
        if($(window).width()<=991) {
            /*Side-nav-overlay*/
            sideNavOverlay();
            /*Side-nav-overlay*/
        }
        $(window).resize(function () {
            /*dashboard right side content and sidebar toggle switching*/
            sideBarToggleSwitch();
            /*dashboard right side content and sidebar toggle switching*/
            /*Side-nav-overlay*/
            sideNavOverlay();
            /*Side-nav-overlay*/
        });
        /*Side-nav-overlay*/
        function sideNavOverlay() {
            $(document).on('click', '#menuToggle', function () {
                $('#sideNavOverlay').removeClass('d-none');
            });
        }
        /*Side-nav-overlay*/
        /*dashboard right side content toggle*/
        function sideBarToggleSwitch() {
            $(document).on('click', function (event) {
                if ($(window).width()<=991 && !$(event.target).closest('#dashboardSidebar, #menuToggle').length) {
                    $('#dashboardSidebar').addClass('sidebar-toggle');
                    /*Side-nav-overlay*/
                    $('#sideNavOverlay').addClass('d-none');
                    /*Side-nav-overlay*/
                }
            });
            if ($(window).width()>=992) {
                $('#dashboardSidebar').removeClass('sidebar-toggle');
                $('#dashboardSidebarRightContent').removeClass('toggled');
            }
            else {
                $('#dashboardSidebar').addClass('sidebar-toggle');
                $('#sideNavOverlay').addClass('d-none');
            }
        }
        // $('.notification_tooltip').hide();
        $(document).on('click', '.notify-btn', function() {
            $('#notification_tolltip').toggle();
        });
        $(document).on('click', '#Logout_Profile', function() {
            $('#TopProfile').toggle();
        });


        $(document).on('click', '#chat_toggle', function () {

            $(this).siblings(".submenue").toggle();
        });
        window.addEventListener('click', function(e){
            if (document.getElementById('chat_toggle').contains(e.target)){
                // Clicked inside the  box
                // alert("inside clicked");
                $("#delet_message_toggle").css("display","block");
            }
            else{
                $("#delet_message_toggle").css("display","none");
                // alert("out side");
            }
        });


        $(document).on('click', '#del_toggle', function () {

            $(this).siblings(".submenue").toggle();
        });
        window.addEventListener('click', function(e){
            if (document.getElementById('del_toggle').contains(e.target)){
                // Clicked inside the  box
                // alert("inside clicked");
                $("#delet_user_toggle").css("display","block");
            }
            else{
                $("#delet_user_toggle").css("display","none");
                // alert("out side");
            }
        });

        $("#search_input").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $(".main_contact>a>.inbox_contact").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });



      // code for message send
      $(document).on('click', '#sendMsg', function() {
            var typeMsg = $("#typeMsg").val().trim();
            var attachment = $("#attachment").val().trim();
            if(typeMsg=="" && attachment =="") {
                return false;
            }
            $('#showImage').addClass('d-none');
        });


        $(document).on('keypress',function(e) {
            if(e.which == 13) {
                $("#sendMsg").click();
            }
        });
        $("input.messages_file[type=file]").before('<span class="fa fa-paperclip text-white messages_file_uploader_image" aria-hidden="true"></span>');

        sidebarScrollHeight();
        $(window).resize(function(){
            sidebarScrollHeight();
        });


    });
    (function ($) {
        "use strict";
        $(document).ready(function () {
            $(".carousel_se_01_carousel").owlCarousel({
                loop:true,
                items:1,
                margin:10,
                nav:true,
                autoplay:true,
            });
        });
        $(document).ready(function () {
            $(".carousel_se_02_carousel").owlCarousel({
                items: 3,
                nav: false,
                loop: true,
                dots:true,
                mouseDrag: true,
                responsiveClass: true,
                responsive: {
                    0:{
                        items: 1,
                    },
                    // 480: {
                    //   items: 2,
                    // },
                    768: {
                        items: 2,
                    },
                    992: {
                        items: 3,
                    },
                    1200: {
                        items: 3,
                    },
                },
            });
        });
        $(document).ready(function () {
            $(".carousel_se_03_carousel").owlCarousel({
                items: 3,
                nav: false,
                loop: true,
                dots:true,
                margin:10,
                mouseDrag: true,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                    },
                    576: {
                        items: 2,
                    },
                    768: {
                        items: 3,
                    },
                    992: {
                        items: 3,
                    },
                    1200: {
                        items: 3,
                    },
                },
            });
        });
    })(jQuery);
    function sidebarScrollHeight() {
        var dashboardSidebar= $("#dashboardSidebar").innerHeight();
        var topHeaght =$(".main_profile_img_name").innerHeight();
        var bottomHeaght =$(".soignou_plus_language_wraper").innerHeight();
        var sidebarHeight= dashboardSidebar - topHeaght - bottomHeaght - 50;
        $(".sidebar_navcigation").innerHeight(sidebarHeight);
    }
    $(function() {
        var pgurl = window.location.href.substr(window.location.href.lastIndexOf("/")+1);
        $(".sidebar_navcigation>li>a").each(function(){
            if($(this).attr("href") == pgurl || $(this).attr("href") == '' )
                $(this).addClass("active");
        })
        $(".navbar-nav>.nav-item>.nav-link").each(function(){
            if($(this).attr("href") == pgurl || $(this).attr("href") == '' )
                $(this).addClass("active");
        })

    });
</script>
<script>
        setInterval(ajaxCall, 1000);
            function ajaxCall() {
                var id = $('.favorite.active').attr('id');
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    headers: {
                        'X-CSRF-Token': '{{ csrf_token() }}',
                    },
                    url: "{{ route('user.online.status') }}",
                    data: {
                        'id': id
                    },
                    success: function(response) {
                        // console.log(response);
                        $('#notify').html(response.msg);
                        $('.cahtting_messages').append(response.message);
                        if(response.data!=''){
                            setTimeout(() => {
                                $(".cahtting_messages").scrollTop($(".cahtting_messages")[0].scrollHeight);
                            }, 100);
                        }
                    }
                });
            }

        setInterval(ajaxC, 10000);
            function ajaxC() {
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    headers: {
                        'X-CSRF-Token': '{{ csrf_token() }}',
                    },
                    url: "{{ route('user.notification') }}",
                    data: {
                        'id': 1
                    },
                    success: function(response) {
                        // console.log(response);
                        $('#notfication').html(response.unread);
                        $('#notification_tolltip').empty();
                        $('#notification_tolltip').append(response.notification);
                    }
                });
            }


            $(document).on('click', '.notification', function() {
                var id = $(this).attr('id');
                console.log(id);
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    headers: {
                        'X-CSRF-Token': '{{ csrf_token() }}',
                    },
                    url: "{{ route('user.status.notification') }}",
                    data: {
                        'id': id
                    },
                    success: function(response) {
                        console.log(response);
                        $('#notfication').html(response.unread);
                        $('#notification_tolltip').empty();
                        $('#notification_tolltip').append(response.notification);
                    }
                });
            });
    </script>
    <script>
        $('#flexSwitchCheckDefault').on('click', function() {
            if ($(this).prop('checked') == true) {
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    headers: {
                        'X-CSRF-Token': '{{ csrf_token() }}',
                    },
                    url: "{{url('language/en')}}",
                    data: {
                        'id': 1
                    },
                    success: function(response) {
                        window.location.reload();
                        // console.log(response);
                    }
                });
            } else {
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    headers: {
                        'X-CSRF-Token': '{{ csrf_token() }}',
                    },
                    url: "{{url('language/arb')}}",
                    data: {
                        'id': 1
                    },
                    success: function(response) {
                         window.location.reload();
                        // console.log(response);
                    }
                });
            }
        });
    </script>



</body>
</html>
