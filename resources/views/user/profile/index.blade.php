@extends('user.layout.app')
@section('content')
    <section class="dashboard_main_section" style="background-image:url({{ url('public/user/assets/images/gradiantbg.jpg') }});">
        <div class="container-lg container-fluid">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="main_content_wraper mt-5">
                        <h1 class="sec_main_heading text-center mb-0">PROFILE</h1>
                        <p class="sec_main_para text-center">Your profile</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 col-md-12 mx-auto ">
                    <div class="edit_profile_link_wraper mb-lg-4 mb-3">

                        <a href="{{ route('user.profile.edit') }}"><img src="{{ asset('public/user/assets/images/editicon.svg') }}">Edit</a>
                    </div>
                </div>
                <div class="col-lg-8 mx-auto">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="profile_name_box text-lg-center mb-4">
                                <div class="user_icon">
                                    <img src="{{ asset('public/user/assets/images/user.svg') }}">
                                </div>
                                <p class="mb-0">John Mathew</p>

                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="profile_name_box text-center mb-4">
                                <div class="user_icon">
                                    <img src="{{ asset('public/user/assets/images/location.svg') }}">
                                </div>
                                <p class="mb-0">12B-sharjah, UAE</p>

                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="profile_name_box text-center mb-4">
                                <div class="user_icon">
                                    <img src="{{ asset('public/user/assets/images/mailicon.svg') }}">
                                </div>
                                <p class="mb-0">abc@email.com</p>

                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="profile_name_box text-center mb-4">
                                <div class="user_icon">
                                    <img src="{{ asset('public/user/assets/images/callicon.svg') }}">
                                </div>
                                <p class="mb-0">+971234567890</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
