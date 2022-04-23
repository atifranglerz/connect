@extends('user.layout.app')
@section('content')
<section class="pb-5 login_content_wraper" style="background-image:url(public/assets/images/gradiantbg.jpg);">
    <div class="container-lg container-fluid" >
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="main_content_wraper dashboard mt-1 mt-lg-5 mt-md-5">
                    <h1 class="sec_main_heading text-center mb-0">RESPONSE TO YOUR QUOTES</h1>
                    <p class="sec_main_para text-center">See what garage owners have to say about your quote</p>
                </div>
            </div>
        </div>
        <div class="row g-2">
            <div class="col-lg-6 col-md-6 col-sm-6 col-10  mx-auto">
                <div class="all_quote_card replies_allquot h-100 ">
                    <div class="car_inner_imagg replies_qout">
                        <img src="{{ asset('public/user/assets/images/repair3.jpg')}}">
                    </div>
                    <div class=" w-100  quote_detail_wraper replies ">
                        <div class="quote_info">
                            <h3 class="d-flex align-items-center active_quote nowrape ">Cultus Repairs</h3>
                            <p class="mb-0">Red Suzuki For Repair</p>
                            <p >0987654321778</p>
                        </div>
                        <div class="quote_detail_btn_wraper replies">
                            <div class="d-flex chat_view__detail qoute_replies">
                                <a href="#" class="chat_icon">
                                    <i class="fa-solid fa-message"></i>
                                    <!--   <img src="public/user/assets/images/meassageiconblk.svg"> -->
                                </a>
                                <div class="card_icons respons_qoute d-flex justify-content-center align-items-center">
                                    <div class="icon_wrpaer">
                                        <img src="{{ asset('public/user/assets/images/iconrp.svg')}}">
                                    </div>
                                    <div class="icon_wrpaer">
                                        <img src="{{ asset('public/user/assets/images/iconrp2.svg')}}">
                                    </div>
                                    <div class="icon_wrpaer">
                                        <img src="{{ asset('public/user/assets/images/iconrp3.svg')}}">
                                    </div>
                                    <div class="icon_wrpaer">
                                        <img src="{{ asset('public/user/assets/images/iconrp4.svg')}}">
                                    </div>
                                    <div class="icon_wrpaer">
                                        <img src="{{ asset('public/user/assets/images/iconrp5.svg')}}">
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-10   mx-auto">
                <div class="all_quote_card  replies_allquot h-100">
                    <div class=" w-100  quote_detail_wraper replies second">
                        <div class="quote_info">
                            <h3 class="d-flex align-items-center active_quote nowrape">Garage Owner Quote</h3>
                            <div class="quote_detail_btn_wraper">
                                <h3 class="quotereplies">AED 1200</h3>
                            </div>
                        </div>
                        <div class="quote_detail_btn_wraper">
                            <div class="d-flex align-items-center chat_view__detail allreplies ">
                                <a href="{{route('user.vendorReply')}}" class="btn-secondary">VIEW DETAILS</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
