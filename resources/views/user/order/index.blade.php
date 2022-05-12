@extends('user.layout.app')
@section('content')
    <section class="pb-5 login_content_wraper" style="background-image:url(public/vendor/assets/images/gradiantbg.jpg);">
        <div class="container-lg container-fluid" >
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="main_content_wraper dashboard mt-1 mt-lg-5 mt-md-5">
                        <h1 class="sec_main_heading text-center mb-0">ALL ORDERS</h1>
                        <p class="sec_main_para text-center">See Your Previously Completed Orders and Details</p>
                    </div>
                </div>
            </div>
            <div class="row g-2">
                @if(count($orders) >0)
                @foreach($orders as $order)
                    <?php
                    $userbidid = \App\Models\UserBid::where('id',$order->user_bid_id)->first();
                    $img = \App\Models\UserBidImage::where('user_bid_id',$userbidid->id)->where('type','image')->oldest()->first();
                    $company = \App\Models\Company::where('id',$userbidid->company_id)->first();

                    ?>
                <div class="col-lg-11 col-md-12  mx-auto">
                    <div class="all_quote_card ">
                        <div class="car_inner_imagg ">
                            <img src="{{ asset($img->car_image) }}">
                        </div>
                        <div class=" w-100  quote_detail_wraper">
                            <div class="quote_info">
                                <h3 class="d-flex align-items-center active_quote">{{$company->company}}  ({{$userbidid->model}})
                                </h3>
                                <p class="mb-0">{{$userbidid->description1}}</p>
                                <p >{{$userbidid->phone}}</p>
{{--                                <div class="card_icons d-flex justify-content-center align-items-center">--}}
{{--                                    <div class="icon_wrpaer">--}}
{{--                                        <img src="{{ asset('public/vendor/assets/images/iconrp.svg') }}">--}}
{{--                                    </div>--}}
{{--                                    <div class="icon_wrpaer">--}}
{{--                                        <img src="{{ asset('public/vendor/assets/images/iconrp2.svg') }}">--}}
{{--                                    </div>--}}
{{--                                    <div class="icon_wrpaer">--}}
{{--                                        <img src="{{ asset('public/vendor/assets/images/iconrp3.svg') }}">--}}
{{--                                    </div>--}}
{{--                                    <div class="icon_wrpaer">--}}
{{--                                        <img src="{{ asset('public/vendor/assets/images/iconrp4.svg') }}">--}}
{{--                                    </div>--}}
{{--                                    <div class="icon_wrpaer">--}}
{{--                                        <img src="{{ asset('public/vendor/assets/images/iconrp5.svg') }}">--}}
{{--                                    </div>--}}
{{--                                </div>--}}

                            </div>
                            <div class="quote_detail_btn_wraper">
                                <div class="quote_detail_btn_wraper">
                                    <h3 class=" text-sm-center vendor_replies_dtl allOrder">{{$order->status}}</h3>
                                </div>
                                <h3 class=" text-sm-center">AED {{$userbidid->price}}</h3>
                                <div class="d-flex align-items-center chat_view__detail">
                                    <a href="#" class="chat_icon">
                                        <i class="fa-solid fa-message"></i>
                                        <!-- <img src="assets/images/meassageiconblk.svg"> -->
                                    </a>
                                    <a href="{{route('user.order.show',$order->id)}}" class="btn-secondary">VIEW DETAILS</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                    <div class="col-lg-11 col-md-12  mx-auto">
                        <div class="all_quote_card ">

                            <div class=" w-100  quote_detail_wraper">
                                <div class="quote_info">
                                    <p class="mb-0">No Orders has been added !</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
