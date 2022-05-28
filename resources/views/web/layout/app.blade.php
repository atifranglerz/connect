<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('public/assets/css/connect.min.css') }}" rel="stylesheet">
    <!-- custome css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/poppins.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/inter.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/style.css') }} ">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/newstyle.css') }}">
    <!-- <link rel="stylesheet" asset('public/href="assets}}') /slick-master/slick/slick.css">
      <link rel="stylesheet"  asset('public/href="assets}}') /slick-master/slick/slick-theme.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/> -->
    <link rel="stylesheet" href="{{ asset('public/assets/OwlCarousel/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/user/assets/image-uploader/dist/image-uploader.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/OwlCarousel/dist/assets/owl.theme.default.min.css') }}">

    <title>Repair my Car</title>
</head>
<body>
<!--paste this code under the head tag-->
<div id="pgLoader">
    <span id="pgLoaderGif"></span>
</div>
<!--paste this code under the head tag-->
<header>
    <nav class="navbar navbar-expand-md navbar-light bg-white ">
        <div class="container-lg container-fluid">
            <a class="navbar-brand" href="{{route('home')}}">
                <div class="logo_wraper">
                    <img src="{{ asset('public/assets/images/repair-my-car-logos/repairmycarlogo.png')}}">
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link px-lg-2 px-3 px-md-2" href="{{route('car_service')}}">Garages & Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-lg-2 px-3 px-md-2" href="{{route('used_cars')}}">Used Cars For Sale</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-lg-2 px-3 px-md-2" href="@if(auth()->check()){{url('user/quotecreate')}}@else{{url('user/login')}}@endif">Request A Quote</a>
                    </li>
                </ul>
                <div class="d-flex login_header_main">
                    @if(auth()->check())
                        <a href="{{ route('user.profile.index') }}" class="me-4 me-md-3">Profile</a>
                        <a href="" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"><i class="fas fa-sign-out-alt"></i>
                                Logout
                        </a>
                        <form id="frm-logout" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                    @else
                    <div class="login_sinup">
                        <a href="{{route('vendor.register')}}"> <i class="fa fa-briefcase me-2 me-md-1"></i> Register Your Garage</a>
                        <a href="{{ route('loginpage') }}" class="login ms-lg-2">Login</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </nav>
</header>
@yield('content')
<footer class="py-5">
    <div class="container-lg container-fluid">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-5">
                <div class="footer_link">
                    <h1>LINKS</h1>
                    <ul>
                        <li><a href="{{ route('register') }}"><span class="fa fa-briefcase me-2 me-md-1" style="margin-right: 8px"></span>Register your business</a></li>
                        <li><a href="{{route('about')}}"><span class="fa fa-info-circle me-2 me-md-1" style="margin-right: 8px"></span>About Us</a></li>
                        <li><a href="{{route('term')}}"><span class="fa fa-pencil-square" style="margin-right: 8px"></span>Terms & Conditions</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-3 col-sm-3">
                <div class="footer_link">
                    <h1>LINKS</h1>
                    <ul>
                        <li><a href="{{route('privacy_policy')}}"><span class="fa fa-lock" style="margin-right: 8px"></span>Privicy Policy</a></li>
                        <li><a href="{{route('news')}}"><span class="fa fa-newspaper" style="margin-right: 8px" aria-hidden="true"></span>News</a></li>
                        <li><a href="{{route('faq')}}"><span class="fa fa-question-circle" style="margin-right: 8px" aria-hidden="true"></span>FAQ </a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-4">
                <div class="footer_link">
                    <h1>CONNECT</h1>
                    <div class="social_icons mb-3">
                        <a href="#">
                            <img src="{{ asset('public/assets/images/facbook.svg')}}">
                        </a>
                        <a href="#">
                            <img src="{{ asset('public/assets/images/insta.svg')}}">
                        </a>
                        <a href="#">
                            <img src="{{ asset('public/assets/images/linkin.svg')}}">
                        </a>
                        <a href="#">
                            <img src="{{ asset('public/assets/images/youtube.svg')}}">
                        </a>
                    </div>
                    <h1 class="footer_contact_heading">CONTACT US</h1>
                    <p class="footer_address">+92 345 123 4678  </p>
                    <p class="footer_address">abc@email.com </p>
                    <p class="footer_address">1- Industrial Area, City</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Top Searches</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="garage_name">
                    <p>Fields Required From Clint Side</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>

            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ asset('public/assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="https://kit.fontawesome.com/611bc9fae4.js" crossorigin="anonymous"></script>
<script src="{{asset('public/assets/OwlCarousel/dist/owl.carousel.min.js') }}"></script>
<script src="{{ asset('public/user/assets/image-uploader/dist/image-uploader.min.js') }}"></script>
<script src="{{asset('public/assets/select2/js/select2.min.js')}}"></script>
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
    (function ($) {
        "use strict";
        $(document).ready(function() {
            $('.input-images-signup').imageUploader({
                maxFiles:1,
            });
            $(".input-images-signup>.image-uploader>.upload-text").append('<label class="img_wraper_label"><div class="file_icon_wraper"><img src="{{asset('public/assets/images/fileuploadicon.svg')}}"></div><p class="mb-0">Upload Your Picture </p><input type="file" size="60" ></label> ');
        });        
    })(jQuery);

    /*scrolling banner*/
    (function ($) {
        "use strict";

        $(document).ready(function () {

            $(".carousel_se_01_carousel").owlCarousel({
                loop:true,
                items:1,
                margin:10,
                nav:true,
                autoplay:true,
                // responsive:{
                //     0:{
                //         items:1
                //     },
                //     600:{
                //         items:3
                //     },
                //     1000:{
                //         items:5
                //     }
                // }

            });
        });

        $(document).ready(function () {
            /*Animate loader off screen*/
            $("#pgLoader").fadeOut("slow");

            $(".carousel_se_02_carousel").owlCarousel({
                items: 3,
                nav: false,
                loop: true,
                dots:true,
                mouseDrag: true,
                responsiveClass: true,
                margin:10,
                // navText: ["<i class='icofont-bubble-left'></i>", "<i class='icofont-bubble-right'></i>"],
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
    /*scrolling banner*/
    $(document).ready(function () {
        $('.input-images').imageUploader();
        $(".input-images>.image-uploader>.upload-text").append('<label class="img_wraper_label"><div class="file_icon_wraper"><img src="assets/images/fileuploadicon.svg"></div><p class="mb-0">Upload Car image</p><input  name="car_images" type="file" size="60" ></label>  ');
        $('.input-images-2').imageUploader();
        $(".input-images-2>.image-uploader>.upload-text").append('<label class="img_wraper_label skip"><div class="file_icon_wraper"><img src="assets/images/fileuploadicon.svg"></div><p class="mb-0">Upload Police/Accident/Inspection Report</p><a href="#" class="skip">Skip</a><input type="file" size="60" ></label>   ');
        $('.input-images-3').imageUploader();
        $(".input-images-3>.image-uploader>.upload-text").append('<label class="img_wraper_label"><div class="file_icon_wraper"><img src="assets/images/fileuploadicon.svg"></div><p class="mb-0">Add Registration Copy Image</p><input type="file" size="60" ></label>');
        $('.input-images-4').imageUploader();
        $(".input-images-4>.image-uploader>.upload-text").append('<label class="img_wraper_label"><div class="file_icon_wraper"><img src="assets/images/fileuploadicon.svg"></div><p class="mb-0">Upload workshop image</p><input type="file" size="60" ></label>');
        $('.input-images-5').imageUploader({
            maxFiles: 1,
        });
        $(".input-images-5>.image-uploader>.upload-text").append('<label class="img_wraper_label"><div class="file_icon_wraper"><img src="assets/images/fileuploadicon.svg"></div><p class="mb-0">Upload Your Picture </p><input type="file"   size="60" ></label>');
        $('.input-images-6').imageUploader();
        $(".input-images-6>.image-uploader>.upload-text").append('<label class="img_wraper_label"><div class="file_icon_wraper"><img src="assets/images/fileuploadicon.svg"></div><p class="mb-0">Upload Your ID</p><input type="file" size="60" ></label>');
        $('.input-images-7').imageUploader();
        $(".input-images-7>.image-uploader>.upload-text").append('<label class="img_wraper_label"><div class="file_icon_wraper"><img src="assets/images/fileuploadicon.svg"></div><p class="mb-0">Upload Your Trade License and ID </p><input type="file" size="60" ></label> ');
        $('.Upload_final_report').imageUploader({
            extensions: ['.pdf', '.doc'],
            mimes: ['application/pdf', 'application/msword'],
            maxFiles: 1,
        });
        $(".Upload_final_report>.image-uploader>.upload-text").append('<label class="img_wraper_label"><div class="file_icon_wraper"><img src="assets/images/fileuploadicon.svg"></div><p class="mb-0">Upload Final Report</p><input type="file" size="60" ></label>');
        $('.input-images-8').imageUploader({
            maxFiles:1,
        });
        $(".input-images-8>.image-uploader>.upload-text").append('<label class="img_wraper_label"><div class="file_icon_wraper"><img src="{{asset('public/assets/images/fileuploadicon.svg')}}"></div><p class="mb-0">Upload Your Picture </p><input name="profile_image" type="file" size="60" ></label> ');
        $('.input-images-9').imageUploader();
        $(".input-images-9>.image-uploader>.upload-text").append('<label class="img_wraper_label"><div class="file_icon_wraper"><img src="{{asset('public/assets/images/fileuploadicon.svg')}}"></div><p class="mb-0">Upload Your ID</p><input name="id_card" type="file" size="60" ></label> ');
        $('.input-images-10').imageUploader();
        $(".input-images-10>.image-uploader>.upload-text").append('<label class="img_wraper_label"><div class="file_icon_wraper"><img src="{{asset('public/assets/images/fileuploadicon.svg')}}"></div><p class="mb-0">Upload Your Trade License and ID </p><input name="image_license" type="file" size="60" ></label>');

        $(document).on('click', '#menuToggle', function () {
            $("#dashboardSidebarRightContent").toggleClass("toggled");
            $("#dashboardSidebar").toggleClass("sidebar-toggle");
        });
        /*dashboard right side content toggle*/
        /*dashboard right side content and sidebar toggle switching*/
        sideBarToggleSwitch();
        /*dashboard right side content and sidebar toggle switching*/
        if ($(window).width() <= 991) {
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
                if ($(window).width() <= 991 && !$(event.target).closest('#dashboardSidebar, #menuToggle').length) {
                    $('#dashboardSidebar').addClass('sidebar-toggle');
                    /*Side-nav-overlay*/
                    $('#sideNavOverlay').addClass('d-none');
                    /*Side-nav-overlay*/
                }
            });
            if ($(window).width() >= 992) {
                $('#dashboardSidebar').removeClass('sidebar-toggle');
                $('#dashboardSidebarRightContent').removeClass('toggled');
            } else {
                $('#dashboardSidebar').addClass('sidebar-toggle');
                $('#sideNavOverlay').addClass('d-none');
            }
        }

        // $('.notification_tooltip').hide();
        $(document).on('click', '.notify-btn', function () {
            $('#notification_tolltip').toggle();
        });
        $(document).on('click', '#Logout_Profile', function () {
            $('#TopProfile').toggle();
        });
        $(document).on('click', '#chat_toggle', function () {

            $(".submenue").toggle();
        });
        window.addEventListener('click', function (e) {
            if (document.getElementById('chat_toggle').contains(e.target)) {
                // Clicked inside the  box
                // alert("inside clicked");
                $("#delet_message_toggle").css("display", "block");
            } else {
                $("#delet_message_toggle").css("display", "none");
                // alert("out side");
            }
        });

        $("#search_input").on("keyup", function () {
            var value = $(this).val().toLowerCase();
            $(".main_contact>a>.inbox_contact").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });


        // code for message send
        $(document).on('click', '#sendMsg', function () {
            // alert('hello');
            var typeMsg = $("#typeMsg").val();
            if (typeMsg == "") {
                return false;
            } else {
                $(".cahtting_messages").append('<div class="main_message"><div class="inbox_contact align-items-end justify-content-end top_main"><div class="message_txt_wraper"><p class="mb-2 text-end">11:20 AM, Today</p><p class="mb-0 message_txt second">' + typeMsg + '</p></div><div class="contact_img second_msg"><img src="assets/images/repair2.jpg"></div></div></div>');
                var chat_message = $(".cahtting_messages");
                chat_message.animate({scrollTop: chat_message[0].scrollHeight}, 1000);
                $("#typeMsg").val("");
            }
        });
        $(document).on('keypress', function (e) {
            if (e.which == 13) {
                $("#sendMsg").click();
            }
        });
        $("input.messages_file[type=file]").before("<img src='assets/images/File.svg' class='messages_file_uploader_image' width='20' height='20' />");


        sidebarScrollHeight();
        $(window).resize(function () {
            sidebarScrollHeight();
        });


    });

    (function ($) {
        "use strict";

        $(document).ready(function () {
            $(".carousel_se_01_carousel").owlCarousel({
                loop: true,
                items: 1,
                margin: 10,
                nav: true,
                autoplay: true,

            });
        });

        $(document).ready(function () {
            $(".carousel_se_02_carousel").owlCarousel({
                items: 3,
                nav: false,
                loop: true,
                dots: true,

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
                dots: true,

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
        var dashboardSidebar = $("#dashboardSidebar").innerHeight();
        var topHeaght = $(".main_profile_img_name").innerHeight();
        var bottomHeaght = $(".soignou_plus_language_wraper").innerHeight();
        var sidebarHeight = dashboardSidebar - topHeaght - bottomHeaght - 50;
        $(".sidebar_navcigation").innerHeight(sidebarHeight);
    }

    $(function () {
        var pgurl = window.location.href.substr(window.location.href.lastIndexOf("/") + 1);
        $(".sidebar_navcigation>li>a").each(function () {
            if ($(this).attr("href") == pgurl || $(this).attr("href") == '')
                $(this).addClass("active");
        })
        $(".navbar-nav>.nav-item>.nav-link").each(function () {
            if ($(this).attr("href") == pgurl || $(this).attr("href") == '')
                $(this).addClass("active");
        })

    });
</script>
</body>
</html>



