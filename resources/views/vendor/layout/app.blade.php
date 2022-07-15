<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Bootstrap CSS -->
    <link href="{{ asset('public/vendor/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- custome css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/poppins.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/inter.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/style.css') }} ">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/newstyle.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/vendor/assets/css/style.css') }} ">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/vendor/assets/css/newstyle.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('public/vendor/assets/OwlCarousel/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/vendor/assets/OwlCarousel/dist/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/vendor/assets/image-uploader/dist/image-uploader.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/toastr/css/toastr.min.css') }}">
    <title>Vendor Pannel</title>
    <style>
        /* width */
        .login_sinup>.accoutntData>.notification_tooltip>ul.notification_list::-webkit-scrollbar,.form_sending_wraper>textarea::-webkit-scrollbar,ul.sidebar_navcigation::-webkit-scrollbar {
            display: none;
        }
    </style>
    <style >

        .form-check-input:checked {
            background-color: var(--orange);
            border-color: var(--orang-mask);
        }.form-check-input:focus {
             box-shadow: 0 0 0 0 var(--orang-mask);
         }
         .form-switch .form-check-input{
            background-image: url( {{ url('public/user/assets/images/orangesvg.svg') }});
        }
        .form-switch .form-check-input:checked{
            background-image: url( {{ url('public/user/assets/images/toggler.svg') }});
        }
        .form-switch .form-check-input:focus {
            background-image: url( {{ url('public/user/assets/images/toggler.svg') }});
        }
        .form-check-input:focus {
            border-color: var(--orange);
        }
        .form-switch.toggler_switch{
            padding-left: 7.5em;
        }
        .lang_toggler>label{
            color: var(--orange);
        }
        .lang_toggler>label.arabi{
            position: absolute;
            left: 26px;

        }
        .lang_toggler>label.english{
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
            .lang_toggler>label.arabi {
                left: 45px;
            }
            .lang_toggler>label.english {
                right: 35px;
            }
        }
        @media (min-width: 992px) and (max-width: 1024px){
            .form-switch.toggler_switch {
                padding-left: 5.5em;
            }
        }
    </style>
</head>
<body>
<div class="main">
    <div class="over_lay d-none" id="sideNavOverlay"></div>
    @include('vendor.common.sidebar')
    <div class="right_main" id="dashboardSidebarRightContent">
        @include('vendor.common.header')

        @yield('content')
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ asset('public/vendor/assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="https://kit.fontawesome.com/611bc9fae4.js" crossorigin="anonymous"></script>
<script src="{{ asset('public/vendor/assets/OwlCarousel/dist/owl.carousel.min.js') }}"></script>
<script src="{{ asset('public/vendor/assets/image-uploader/dist/image-uploader.min.js') }}"></script>
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
        $('.input-images').imageUploader();
        $(".input-images>.image-uploader>.upload-text").append('<label class="img_wraper_label"><div class="file_icon_wraper"><img src="{{ asset('public/vendor/assets/images/fileuploadicon.svg') }}"></div><p class="mb-0">Upload Car image</p><input type="file" name="car_images[]" size="60" ></label>  ');
        $('.input-images-2').imageUploader();
        $(".input-images-2>.image-uploader>.upload-text").append('<label class="img_wraper_label skip"><div class="file_icon_wraper"><img src="{{ asset('public/vendor/assets/images/fileuploadicon.svg') }}"></div><p class="mb-0">Upload Police/Accident/Inspection Report</p><a href="#" class="skip">Skip</a><input type="file" name="file" size="60" ></label>   ');
        $('.input-images-3').imageUploader();
        $(".input-images-3>.image-uploader>.upload-text").append('<label class="img_wraper_label"><div class="file_icon_wraper"><img src="{{ asset('public/vendor/assets/images/fileuploadicon.svg') }}"></div><p class="mb-0">Add Registration Copy Image</p><input type="file" name="files[]" size="60" ></label>');
        $('.input-images-4').imageUploader();
        $(".input-images-4>.image-uploader>.upload-text").append('<label class="img_wraper_label"><div class="file_icon_wraper"><img src="{{ asset('public/vendor/assets/images/fileuploadicon.svg') }}"></div><p class="mb-0">Upload workshop image</p><input type="file" name="image" name="file" size="60" ></label>');
        $('.input-images-5').imageUploader({
            maxFiles:1,
        });
        $(".input-images-5>.image-uploader>.upload-text").append('<label class="img_wraper_label"><div class="file_icon_wraper"><img src="{{ asset('public/vendor/assets/images/fileuploadicon.svg') }}"></div><p class="mb-0">Upload Your Picture </p><input type="file" name="pimage" size="60" ></label>');
        $('.input-images-6').imageUploader();
        $(".input-images-6>.image-uploader>.upload-text").append('<label class="img_wraper_label"><div class="file_icon_wraper"><img src="{{ asset('public/vendor/assets/images/fileuploadicon.svg') }}"></div><p class="mb-0">Upload Your ID</p><input type="file" name="pid" size="60" ></label>');
        $('.input-images-7').imageUploader();
        $(".input-images-7>.image-uploader>.upload-text").append('<label class="img_wraper_label"><div class="file_icon_wraper"><img src="{{ asset('public/vendor/assets/images/fileuploadicon.svg') }}"></div><p class="mb-0">Upload Your Trade License and ID </p><input type="file" size="60" ></label> ');
        $('.Upload_final_report').imageUploader({
            extensions: ['.pdf','.doc'],
            mimes: ['application/pdf','application/msword'],
            maxFiles:1,
        });
        $(".Upload_final_report>.image-uploader>.upload-text").append('<label class="img_wraper_label"><div class="file_icon_wraper"><img src="{{ asset('public/vendor/assets/images/fileuploadicon.svg') }}"></div><p class="mb-0">Upload Final Report</p><input type="file" size="60" ></label>');




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
        $(document).on('click', '#chat_toggle', function() {
            $(".submenue").hide();
            $(this).siblings(".submenue").toggle();

        });
        // window.addEventListener('click', function(e){
        //     if (document.getElementById('chat_toggle').contains(e.target)){
        //         // Clicked inside the  box
        //         // alert("inside clicked");
        //         $("#delet_message_toggle").css("display","block");
        //     }
        //     else{
        //         $("#delet_message_toggle").css("display","none");
        //         // alert("out side");
        //     }
        // });
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
                    0: {
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

    })(jQuery);0
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
        setInterval(ajaxCall, 5000);
        function ajaxCall() {
            $(".favorite.active").trigger('click');
            var c_id = $('.favorite.active').attr('id');
            // alert(c_id);
            var id = 1;
            console.log(id);
            $.ajax({
            type: "POST",
            dataType: "json",
            headers: {
                'X-CSRF-Token': '{{ csrf_token() }}',
            },
            url: "{{ route('vendor.online.status') }}",
            data: {
                'id': id
            },
            success: function(response) {
                console.log(response);
                $('#users').empty();
                $('#users').append(response.message);
                $("#" + c_id).addClass('active');
                $('#notify').html(response.unread);
            }
        });
        }
    </script>
</body>
</html>








