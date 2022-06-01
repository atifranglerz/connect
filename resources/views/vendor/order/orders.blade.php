@extends('vendor.layout.app')
@section('content')
<section class="pb-5 login_content_wraper">
    <div class="container-lg container-fluid" >
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="main_content_wraper dashboard mt-1 mt-lg-5 mt-md-5">
                    <h4 class="sec_main_heading text-center mb-0">ALL ORDERS</h4>
                    <p class="sec_main_para text-center">See your order history here</p>
                </div>
            </div>
        </div>


        <div class="row g-2">
            @foreach($orders as $order)
                <?php
                $userbidid = \App\Models\UserBid::where('id',$order->user_bid_id)->first();
                $img = \App\Models\UserBidImage::where('user_bid_id',$userbidid->id)->where('type','image')->oldest()->first();
                $company = \App\Models\Company::where('id',$userbidid->company_id)->first();

                ?>
                <div class="col-lg-10 col-md-12 col-sm-12 col-10  mx-auto">
                    <div class="all_quote_card ">
                        <div class="car_inner_imagg ">
                            <img src="{{ asset($img->car_image) }}">
                        </div>
                        <div class=" w-100  quote_detail_wraper">
                            <div class="quote_info">
                                <h5 class="d-flex align-items-center active_quote">{{$company->company}}  ({{$userbidid->model}})  <span class="order_id">{{$order->status}}</span></h5>
                                <p class="mb-0">{{$userbidid->description1}}</p>
                                <p >{{$userbidid->phone}}</p>
                            </div>
                            <div class="quote_detail_btn_wraper">
                                <h5 class=" text-sm-center">AED {{$order->total}}</h5>
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
            @endforeach
        </div>
    </div>
</section>
@endsection
