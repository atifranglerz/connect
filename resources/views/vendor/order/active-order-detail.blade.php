@extends('vendor.layout.app')
@section('content')
<section class="pb-5 login_content_wraper">
    <div class="container-lg container-fluid">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="main_content_wraper dashboard mt-1 mt-lg-5 mt-md-5">
                    <h1 class="sec_main_heading text-center mb-0"> ACTIVE ORDER</h1>
                    <!-- <p class="sec_main_para text-center">See what are the active orders you have</p> -->
                </div>
            </div>
        </div>
        <div class="row g-2">
            <div class="col-lg-6 col-md-12 col-sm-12 col-11  mx-auto">
                <div class="all_quote_card replies_allquot ">
                    <!-- <div class="car_inner_imagg ">
                          <img src="assets/images/repair3.jpg">
                        </div> -->
                    <?php
                        $userbidid = \App\Models\UserBid::where('id',$order->user_bid_id)->first();
                        $company = \App\Models\Company::where('id',$userbidid->company_id)->first();

                        $userbidimage = \App\Models\UserBidImage::where('user_bid_id',$userbidid->id)->get();
                        ?>
                    <div class=" w-100  quote_detail_wraper replies ">
                        <div class="quote_info">
                            <h3 class="d-flex align-items-center active_quote nowrape ">{{$company->company}}
                                ({{$userbidid->model}})</h3>
                            <p class="mb-0">{{$userbidid->car_owner_name}}</p>

                            <p class="mb-0">{{$userbidid->phone}}</p>
                            <p class="milage">Mileage <span>{{$userbidid->mileage}}km</span></p>
                        </div>
                        <div class="quote_detail_btn_wraper replies">
                            <h3 class="vendor_order_id">Order Id: #{{$order->order_code}}</h3>
                            <div class="d-flex chat_view__detail qoute_replies vendor_order ">
                                <h3 class="">{{$userbidid->day}} Days</h3>
                                <form action="{{route('vendor.queryChat')}}" method="POST" class="chat_view__detail">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$userbidid->user_id}}">
                                    <input type="hidden" name="order_no" value="{{$order->order_code}}">
                                    <input type="hidden" name="order_id" value="{{$order->id}}">
                                    <button type="submit" class="chat_icon"><i class="fa-solid fa-message"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--                <div class="col-lg-3 col-md-6 col-sm-6 col-11  mx-auto">--}}
            {{--                    <div class="all_quote_card replies_allquot h-100 ">--}}
            {{--                        <div class=" w-100  quote_detail_wraper replies ">--}}
            {{--                            <div class="quote_info">--}}
            {{--                                <h3 class="d-flex align-items-center active_quote nowrape  ">Suzuki Alto</h3>--}}
            {{--                                <p class="mb-0">2017</p>--}}
            {{--                                <p class="mb-0">Suzuki</p>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            <div class="col-lg-6 col-md-6 col-sm-6 col-11  mx-auto">
                <div class="all_quote_card  replies_allquot h-100">
                    <div class=" w-100  quote_detail_wraper replies payviainsu">
                        <div class="quote_detail_btn_wraper">
                            <div class="d-flex align-items-center chat_view__detail allreplies ">
                                <div class="pay_via_insurance_header_garages">
                                    <p>Payed Via Insurance</p>
                                    <i class="bi bi-star-fill"></i>
                                </div>
                            </div>
                        </div>
                        <div class="quote_info">
                            <h3 class="d-flex align-items-center active_quote nowrape"> Budget</h3>
                            <div class="quote_detail_btn_wraper">
                                <h3 class="quotereplies">AED {{$order->total}}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row  mt-5">
            <div class="col-lg-12">

                <div class="all_quote_card  vendor_rply_dtlL _text mb-5">
                    <h3 class="active_order_req">Requirments</h3>

                    <div class="vendor__rply__dttl">
                        <p>{{$userbidid->description1}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="all_quote_card  vendor_rply_dtlL _text">
            <div class="owl-carousel carousel_se_03_carousel owl-theme mt-5 owl-loaded owl-drag">
                <div class="owl-stage-outer">
                    <div class="owl-stage"
                        style="transform: translate3d(-1488px, 0px, 0px); transition: all 0s ease 0s; width: 5656px;">
                        @foreach($userbidimage as $image)
                        <?php $pathinfo = pathinfo($image->car_image);
                                $supported_ext = array('docx', 'xlsx', 'pdf');
                                $src_file_name = $image->car_image;
                                $ext = strtolower(pathinfo($src_file_name, PATHINFO_EXTENSION)); ?>

                        <div class="owl-item cloned" style="width: 297.667px;">
                            <div class="item">
                                <div class="carAd_img_wraper carAd_img_wraper doc_img customer_dashboard">
                                    @if($ext=="docx")
                                    <a class="text-decoration-none text-reset" href="{{url($image->car_image)}}">
                                        <img src="{{ asset('public/assets/images/wordicon.png') }}"
                                            style="height: 100%;">
                                    </a>
                                    @elseif($ext=="doc")
                                    <a class="text-decoration-none text-reset" href="{{url($image->car_image)}}">
                                        <img src="{{ asset('public/assets/images/wordicon.png') }}"
                                            style="height: 100%;">
                                    </a>
                                    @elseif($ext=="xlsx")
                                    <a class="text-decoration-none text-reset" href="{{url($image->car_image)}}">
                                        <img src="{{ asset('public/assets/images/excelicon.png') }}"
                                            style="height: 100%;">
                                        <a class="text-decoration-none text-reset" href="{{url($image->car_image)}}">
                                            @elseif($ext=="pdf")
                                            <a class="text-decoration-none text-reset"
                                                href="{{url($image->car_image)}}">
                                                <img src="{{ asset('public/assets/images/pdficon.png') }}"
                                                    style="height: 100%;">
                                            </a>
                                            @else
                                            <img src="{{asset($image->car_image)}}">
                                            @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="owl-nav disabled">
                    <button type="button" role="presentation" class="owl-prev">
                        <span aria-label="Previous">‹</span>
                    </button>
                    <button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button>
                </div>
                <div class="owl-dots">
                    <button role="button" class="owl-dot active">
                        <span></span>
                    </button>
                    <button role="button" class="owl-dot">
                        <span></span>
                    </button>
                    <button role="button" class="owl-dot">
                        <span></span>
                    </button>
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
                        <p>{{$userbidid->description2}}</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection