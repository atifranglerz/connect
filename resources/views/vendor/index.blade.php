@extends('vendor.layout.app')
@section('content')


<section class="pb-5 login_content_wraper" style="background-image:url({{asset('public/assets/images/gradiantbg.jpg')}});">
    <div class="container-lg container-fluid" >
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="main_content_wraper dashboard mt-1 mt-lg-5 mt-md-5">
                    <h1 class="sec_main_heading text-center mb-0">DASHBOARD</h1>
                    <p class="sec_main_para text-center">See what's happening on your profile</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-11 col-md-11  mx-auto">
                <div class="quote_card_heading _top_dash  mb-lg-4 mb-2 mt-lg-5 mt-3">
                    <h3>Previous Stats</h3>
                    <!-- <a href="#">View All</a> -->
                </div>
                <div class="row g-3">
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="all_quote_card dashboard_card top_dashboard flex-column shadow h-100 ">
                            <h3>{{$completedOrders}}</h3>
                            <h3 class="orang_dashboard_heading text-center">Completed Orders</h3>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="all_quote_card dashboard_card top_dashboard flex-column shadow h-100">
                            <h3>{{$totalReviews}}</h3>
                            <h3 class="orang_dashboard_heading text-center">Total Reviews</h3>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="all_quote_card dashboard_card top_dashboard flex-column shadow h-100">
                            <h3>{{round($overAllRatings,2)}}</h3>
                            <h3 class="orang_dashboard_heading text-center">Overall Rating</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-11 col-md-12  mx-auto">
                <div class="quote_card_heading  mb-lg-4 mb-2 mt-lg-5 mt-3">
                    <h3>Active Orders</h3>
                    <a href="{{route('vendor.orders')}}">View All</a>
                </div>
                <?php
                $userbidid = \App\Models\UserBid::where('id',$order->user_bid_id)->first();
                $img = \App\Models\UserBidImage::where('user_bid_id',$userbidid->id)->where('type','image')->oldest()->first();
                $company = \App\Models\Company::where('id',$userbidid->company_id)->first();
                ?>
                <div class="all_quote_card ">
                    <div class="car_inner_imagg ">
                        <img src="{{ asset($img->car_image) }}">
                    </div>
                    <div class=" w-100  quote_detail_wraper">
                        <div class="quote_info">
                            <h3 class="d-flex align-items-center active_quote">{{$company->company}}  ({{$userbidid->model}})</h3>
                            <p class="mb-0">{{$userbidid->description1}}</p>
                            <p >{{$userbidid->phone}}</p>
                        </div>
                        <div class="quote_detail_btn_wraper">
                            <h3 class=" text-sm-center">AED {{$order->total}}</h3>
                            <div class="d-flex align-items-center chat_view__detail">
                                <a href="#" class="chat_icon">
                                    <i class="fa-solid fa-message"></i>
                                    <!-- <img src="assets/images/meassageiconblk.svg"> -->
                                </a>
                                <a href="{{route('vendor.fullfillment',$order->id)}}" class="btn-secondary">VIEW DETAILS</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

@endsection
