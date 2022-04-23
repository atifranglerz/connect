@extends('user.layout.app')
@section('content')
<section class="pb-5 login_content_wraper" style="background-image:url(public/assets/images/gradiantbg.jpg);">
    <div class="container-lg container-fluid" >
        <div class="row">
            <div class="col-xl-8 col-lg-7 col-sm-9  col-md-10 mx-auto">
                <div class="row mt-5 mb-4 g-3">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="d-grid gap-2 mt-lg-3 ">
                            <a href="{{route('user.quoteindex')}}" class="btn text-center btn-primary get_quot block get_appointment d-flex justify-content-center align-items-center" type="button">GO BACK TO ALL QUOTES
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6  col-md-6 col-sm-6">
                        <div class="d-grid gap-2 mt-lg-3 ">
                            <a href="paymentinfo.php" class="btn btn-secondary block get_appointment d-flex justify-content-center align-items-center" type="button">ACCEPT QUOTE
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-2">
            <div class="col-lg-11 col-md-12 col-sm-12 col-11  mx-auto">
                <div class="all_quote_card  vendor_rply_dtlL">
                    <div class="car_inner_imagg vendor_rply_dtl ">
                        <img src="{{ asset('public/user/assets/images/repair2.jpg')}}">
                    </div>
                    <div class=" w-100  quote_detail_wraper">
                        <div class="quote_info">
                            <h3 class="d-flex align-items-center active_quote rply_dtl">Car Repair</h3>
                            <p class="mb-0 rply__dtl">Sharjah, Ajman</p>
                            <p class="rply__dtl" >+971234567890</p>
                            <div class="card_icons respons_qoute d-flex align-items-center">
                                <div class="icon_wrpaer vendor_qoute_dtl">
                                    <img src="{{ asset('public/user/assets/images/iconrp.svg')}}">
                                </div>
                                <div class="icon_wrpaer vendor_qoute_dtl">
                                    <img src="{{ asset('public/user/assets/images/iconrp2.svg')}}">
                                </div>
                                <div class="icon_wrpaer vendor_qoute_dtl">
                                    <img src="{{ asset('public/user/assets/images/iconrp3.svg')}}">
                                </div>
                                <div class="icon_wrpaer vendor_qoute_dtl">
                                    <img src="{{ asset('public/user/assets/images/iconrp4.svg')}}">
                                </div>
                                <div class="icon_wrpaer vendor_qoute_dtl">
                                    <img src="{{ asset('public/user/assets/images/iconrp5.svg')}}">
                                </div>
                            </div>
                        </div>
                        <div class="quote_detail_btn_wraper">
                            <h3 class=" text-sm-center vendor_replies_dtl">AED 1200</h3>
                            <div class="quote_info">
                                <p class="quote_rev vndr_rply__dtl">Time Frame Offered<span> 5 Days </span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row  mt-5">
            <div class="col-lg-12">

                <div class="all_quote_card  vendor_rply_dtlL _text">
                    <div class="over_view_part carad_data vendor_detail">
                        <h3 class=" text-center mb-5">REPAIR DETAILS</h3>
                    </div>
                    <div class="vendor__rply__dttl">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur,</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row  mt-5">
            <div class="col-lg-12">

                <div class="all_quote_card  vendor_rply_dtlL _text">
                    <div class="over_view_part carad_data vendor_detail">
                        <h3 class=" text-center mb-5">CAR DETAILS</h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-9 col-md-10 col-sm-8  mx-auto">
                            <div class="row mt-1 g-3">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="d-grid gap-2 ">
                                        <button class="btn text-center btn-primary get_quot block get_appointment" type="button">Car Model</button>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="d-grid gap-2 ">
                                        <button class="btn text-center btn-primary get_quot block get_appointment" type="button">Car Make</button>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="d-grid gap-2 ">
                                        <button class="btn text-center btn-primary get_quot block get_appointment" type="button">Type of Service</button>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="d-grid gap-2 ">
                                        <button class="btn text-center btn-primary get_quot block get_appointment" type="button">Customer Name</button>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
