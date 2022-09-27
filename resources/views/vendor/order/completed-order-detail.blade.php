@extends('vendor.layout.app')
@section('content')
    <section class="pb-5 login_content_wraper">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="main_content_wraper dashboard mt-1 mt-lg-5 mt-md-5">
                        <h4 class="sec_main_heading text-center mb-0">{{ __('msg.ORDER COMPLETED') }}</h4>
                    </div>
                </div>
            </div>
            <?php
            $company = \App\Models\Company::where('id', $order->userbid->company_id)->first();
            $modelYear = \App\Models\ModelYear::find($order->userbid->model_year_id);
            $insurancestatus = \App\Models\InsuranceRequest::where('vendor_bid_id', $order->vendor_bid_id)->first();
            $user = \App\Models\User::find($order->userbid->user_id);
            $userbidimage = \App\Models\UserBidImage::where([['user_bid_id', $order->userbid->id], ['type', 'image']])->first();
            $userbidimage = explode(',', $userbidimage->car_image);
            //     $review_prev = \App\Models\UserReview::where('user_id', $user->id)->where('garage_id', $order->garage_id)->first();
            $review_prev = \App\Models\UserReview::where('order_id', $order->id)->first();

            ?>
            <div class="row mx-0">
                <div class="col-sm-6 mx-auto">
                    <div class="all_quote_card replies_allquot">
                        <div class=" w-100  quote_detail_wraper replies">
                            <div class="quote_info">
                                <span class="small h6 d-block mb-0"><span class="small h6 mb-0 heading-color">{{ __('msg.Customer Name') }}:</span> {{ $order->customer_name }}</span>
                                <span class="small h6 d-block mb-0"><span class="small h6 mb-0 heading-color">{{ __('msg.Customer Number') }}:</span> {{ $user->phone }}</span>
                                <span class="small h6 d-block mb-0"><span class="small h6 mb-0 heading-color">{{ __('msg.Car Make') }}:</span> {{ $company->company }}</span>
                                <span class="small h6 d-block mb-0"><span class="small h6 mb-0 heading-color">{{ __('msg.Model Year') }}:</span> {{ $modelYear->model_year }}</span>
                                <span class="small h6 d-block mb-0"><span class="small h6 mb-0 heading-color">{{ __('msg.Total Mileage') }}:</span> {{ $order->userbid->mileage }}km</span>
                            </div>
                            <div class="quote_detail_btn_wraper replies">
                                <div class="chat_view__detail qoute_replies vendor_order">
                                    <span class="h5 d-block mb-0"><span class="h5 mb-0 heading-color">{{ __('msg.Time Frame') }}:</span> {{ $order->vendorbid->time }} {{ __('msg.Days') }}</span>
                                    <a href="{{ url('vendor/chat/' . $user->id) }}"
                                        class="justify-content-center chat_icon" style="margin: 10px 0 0 auto">
                                        <i class="fa-solid fa-message"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 mx-auto">
                    <div class="all_quote_card  replies_allquot h-100">
                        <div class=" w-100  quote_detail_wraper replies payviainsu">
                            <div class="quote_detail_btn_wraper">
                                <div class="d-flex align-items-center chat_view__detail allreplies ">
                                    <div class="pay_via_insurance_header_garages">
                                        @if ($order->paid_by == 'insurance')
                                            @if ($insurancestatus->status == 0)
                                                <p>{{ __('msg.Payment Is Pending') }}</p>
                                            @endif
                                            @if ($insurancestatus->status == 1)
                                                <p>{{ __('msg.Paid via Insurance') }}</p>
                                            @endif
                                        @elseif ($order->paid_by == 'company')
                                            <p>{{ __('msg.Paid via Insurance') }}</p>
                                        @else
                                            <p>{{ __('msg.Paid By Customer') }}</p>
                                        @endif
                                        <i class="bi bi-star-fill"></i>
                                    </div>

                                </div>
                            </div>
                            <div class="quote_info">
                                <div class="quote_detail_btn_wraper">
                                    <h5 class="text-sm-center"><span class="h5 heading-color">{{__('msg.Total')}}:</span> {{ $order->total }} {{__('msg.AED')}}</h5>
                                    <div class="completed_order_id">
                                        <h5><span class="h5 heading-color">{{__('msg.Order Id:')}}</span> #{{ $order->order_code }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mx-0 mt-4">
                <div class="col-lg-12">
                    <div class="all_quote_card  vendor_rply_dtlL _text mb-4">
                        <h5 class="active_order_req text-center">{{ __('msg.Requirements') }}</h5>

                        <div class="vendor__rply__dttl">
                            <p>{{ $order->vendorbid->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row  mx-0">
                <div class="col-lg-12">
                    <div class="all_quote_card  vendor_rply_dtlL _text mb-4">
                        <h5 class="text-center mb-3 heading-color">{{ __('msg.CAR IMAGES') }}</h5>
                        <div class="owl-carousel carousel_se_03_carousel owl-theme">
                            @if ($userbidimage && count($userbidimage) == 0)
                                <div class="item">
                                    <div class="carAd_img_wraper doc_img customer_dashboard">
                                        <img src="{{ asset('public/assets/images/no-preview.png') }}">
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="carAd_img_wraper carAd_img_wraper doc_img customer_dashboard">
                                        <img src="{{ asset('public/assets/images/no-preview.png') }}">
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="carAd_img_wraper carAd_img_wraper doc_img customer_dashboard">
                                        <img src="{{ asset('public/assets/images/no-preview.png') }}">
                                    </div>
                                </div>
                            @elseif($userbidimage && count($userbidimage) == 1)
                                @foreach ($userbidimage as $image)
                                    <div class="item">
                                        <div class="carAd_img_wraper doc_img customer_dashboard">
                                            <img src="{{ asset($image) }}">
                                        </div>
                                    </div>
                                @endforeach
                                <div class="item">
                                    <div class="carAd_img_wraper doc_img customer_dashboard">
                                        <img src="{{ asset('public/assets/images/no-preview.png') }}">
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="carAd_img_wraper carAd_img_wraper doc_img customer_dashboard">
                                        <img src="{{ asset('public/assets/images/no-preview.png') }}">
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="carAd_img_wraper carAd_img_wraper doc_img customer_dashboard">
                                        <img src="{{ asset('public/assets/images/no-preview.png') }}">
                                    </div>
                                </div>
                            @elseif($userbidimage && count($userbidimage) == 2)
                                @foreach ($userbidimage as $image)
                                    <div class="item">
                                        <div class="carAd_img_wraper doc_img customer_dashboard">
                                            <img src="{{ asset($image) }}">
                                        </div>
                                    </div>
                                @endforeach
                                <div class="item">
                                    <div class="carAd_img_wraper carAd_img_wraper doc_img customer_dashboard">
                                        <img src="{{ asset('public/assets/images/no-preview.png') }}">
                                    </div>
                                </div>
                            @else
                                @foreach ($userbidimage as $image)
                                    <div class="item">
                                        <div class="carAd_img_wraper doc_img customer_dashboard">
                                            <img src="{{ asset($image) }}">
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row  mx-0">
                <div class="col-lg-12">

                    <div class="all_quote_card  vendor_rply_dtlL _text">
                        <div class="over_view_part carad_data vendor_detail">
                            <h5 class="mb-5 text-center heading-color">{{ __('msg.REPAIR DETAILS') }}</h5>
                        </div>
                        <div class="vendor__rply__dttl">
                            <p>{{ $order->vendorbid->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @if (isset($review_prev))
                <div class="row mx-0 mt-4">
                    <div class="col-lg-12">
                        <div class="all_quote_card  vendor_rply_dtlL _text">
                            <div class="over_view_part carad_data vendor_detail">
                                <h5 class="text-center mb-4">{{ __('msg.YOUR REVIEW') }}</h5>
                            </div>
                            <div class="d-flex align-items-center rating-stars">
                                <div class="rating-group">
                                    @if ($review_prev->rating == '0')
                                        <label aria-label="0 stars" class="rating__label" for="rating2-0">&nbsp;</label>
                                        <label aria-label="0.5 stars" class="rating__label" for="rating2-40"><i
                                                class="rating__icon rating__icon--star fa fa-star"
                                                style="color: gray;"></i></label>
                                        <label aria-label="1 stars" class="rating__label" for="rating2-40"><i
                                                class="rating__icon rating__icon--star fa fa-star"
                                                style="color: gray;"></i></label>
                                        <label aria-label="1.5 stars" class="rating__label" for="rating2-40"><i
                                                class="rating__icon rating__icon--star fa fa-star"
                                                style="color: gray;"></i></label>
                                        <label aria-label="2 stars" class="rating__label" for="rating2-40"><i
                                                class="rating__icon rating__icon--star fa fa-star"
                                                style="color: gray;"></i></label>
                                        <label aria-label="2.5 stars" class="rating__label" for="rating2-40"><i
                                                class="rating__icon rating__icon--star fa fa-star"
                                                style="color: gray;"></i></label>
                                    @elseif($review_prev->rating == '0.5')
                                        <label aria-label="0 stars" class="rating__label" for="rating2-0">&nbsp;</label>
                                        <label aria-label="0.5 stars" class="rating__label rating__label--half"
                                            for="rating2-05"><i
                                                class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                        <label aria-label="1 stars" class="rating__label" for="rating2-40"><i
                                                class="rating__icon rating__icon--star fa fa-star"
                                                style="color: gray;"></i></label>
                                        <label aria-label="1.5 stars" class="rating__label" for="rating2-40"><i
                                                class="rating__icon rating__icon--star fa fa-star"
                                                style="color: gray;"></i></label>
                                        <label aria-label="2 stars" class="rating__label" for="rating2-40"><i
                                                class="rating__icon rating__icon--star fa fa-star"
                                                style="color: gray;"></i></label>
                                        <label aria-label="2.5 stars" class="rating__label" for="rating2-40"><i
                                                class="rating__icon rating__icon--star fa fa-star"
                                                style="color: gray;"></i></label>
                                        <label aria-label="3 stars" class="rating__label" for="rating2-40"><i
                                                class="rating__icon rating__icon--star fa fa-star"
                                                style="color: gray;"></i></label>
                                    @elseif($review_prev->rating == '1')
                                        <label aria-label="0 stars" class="rating__label" for="rating2-0">&nbsp;</label>
                                        <label aria-label="0.5 stars" class="rating__label rating__label--half"
                                            for="rating2-05"><i
                                                class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                        <label aria-label="1 star" class="rating__label" for="rating2-10"><i
                                                class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <label aria-label="1.5 stars" class="rating__label" for="rating2-40"><i
                                                class="rating__icon rating__icon--star fa fa-star"
                                                style="color: gray;"></i></label>
                                        <label aria-label="2 stars" class="rating__label" for="rating2-40"><i
                                                class="rating__icon rating__icon--star fa fa-star"
                                                style="color: gray;"></i></label>
                                        <label aria-label="2.5 stars" class="rating__label" for="rating2-40"><i
                                                class="rating__icon rating__icon--star fa fa-star"
                                                style="color: gray;"></i></label>
                                        <label aria-label="3 stars" class="rating__label" for="rating2-40"><i
                                                class="rating__icon rating__icon--star fa fa-star"
                                                style="color: gray;"></i></label>
                                    @elseif($review_prev->rating == '1.5')
                                        <label aria-label="0 stars" class="rating__label" for="rating2-0">&nbsp;</label>
                                        <label aria-label="0.5 stars" class="rating__label rating__label--half"
                                            for="rating2-05"><i
                                                class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                        <label aria-label="1 star" class="rating__label" for="rating2-10"><i
                                                class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <label aria-label="1.5 stars" class="rating__label rating__label--half"
                                            for="rating2-15"><i
                                                class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                        <label aria-label="2 stars" class="rating__label" for="rating2-40"><i
                                                class="rating__icon rating__icon--star fa fa-star"
                                                style="color: gray;"></i></label>
                                        <label aria-label="2.5 stars" class="rating__label" for="rating2-40"><i
                                                class="rating__icon rating__icon--star fa fa-star"
                                                style="color: gray;"></i></label>
                                        <label aria-label="3 stars" class="rating__label" for="rating2-40"><i
                                                class="rating__icon rating__icon--star fa fa-star"
                                                style="color: gray;"></i></label>
                                        <label aria-label="3.5 stars" class="rating__label" for="rating2-40"><i
                                                class="rating__icon rating__icon--star fa fa-star"
                                                style="color: gray;"></i></label>
                                    @elseif($review_prev->rating == '2')
                                        <label aria-label="0 stars" class="rating__label" for="rating2-0">&nbsp;</label>
                                        <label aria-label="0.5 stars" class="rating__label rating__label--half"
                                            for="rating2-05"><i
                                                class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                        <label aria-label="1 star" class="rating__label" for="rating2-10"><i
                                                class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <label aria-label="1.5 stars" class="rating__label rating__label--half"
                                            for="rating2-15"><i
                                                class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                        <label aria-label="2 stars" class="rating__label" for="rating2-20"><i
                                                class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <label aria-label="3.5 stars" class="rating__label" for="rating2-40"><i
                                                class="rating__icon rating__icon--star fa fa-star"
                                                style="color: gray;"></i></label>
                                        <label aria-label="4 stars" class="rating__label" for="rating2-40"><i
                                                class="rating__icon rating__icon--star fa fa-star"
                                                style="color: gray;"></i></label>
                                        <label aria-label="3.5 stars" class="rating__label" for="rating2-40"><i
                                                class="rating__icon rating__icon--star fa fa-star"
                                                style="color: gray;"></i></label>
                                    @elseif($review_prev->rating == '2.5')
                                        <label aria-label="0 stars" class="rating__label" for="rating2-0">&nbsp;</label>
                                        <label aria-label="0.5 stars" class="rating__label rating__label--half"
                                            for="rating2-05"><i
                                                class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                        <label aria-label="1 star" class="rating__label" for="rating2-10"><i
                                                class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <label aria-label="1.5 stars" class="rating__label rating__label--half"
                                            for="rating2-15"><i
                                                class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                        <label aria-label="2 stars" class="rating__label" for="rating2-20"><i
                                                class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <label aria-label="2.5 stars" class="rating__label rating__label--half"
                                            for="rating2-25"><i
                                                class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                        <label aria-label="3 stars" class="rating__label" for="rating2-40"><i
                                                class="rating__icon rating__icon--star fa fa-star"
                                                style="color: gray;"></i></label>
                                        <label aria-label="3.5 stars" class="rating__label" for="rating2-40"><i
                                                class="rating__icon rating__icon--star fa fa-star"
                                                style="color: gray;"></i></label>
                                        <label aria-label="4 stars" class="rating__label" for="rating2-40"><i
                                                class="rating__icon rating__icon--star fa fa-star"
                                                style="color: gray;"></i></label>
                                    @elseif($review_prev->rating == '3')
                                        <label aria-label="0 stars" class="rating__label" for="rating2-0">&nbsp;</label>
                                        <label aria-label="0.5 stars" class="rating__label rating__label--half"
                                            for="rating2-05"><i
                                                class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                        <label aria-label="1 star" class="rating__label" for="rating2-10"><i
                                                class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <label aria-label="1.5 stars" class="rating__label rating__label--half"
                                            for="rating2-15"><i
                                                class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                        <label aria-label="2 stars" class="rating__label" for="rating2-20"><i
                                                class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <label aria-label="2.5 stars" class="rating__label rating__label--half"
                                            for="rating2-25"><i
                                                class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                        <label aria-label="3 stars" class="rating__label" for="rating2-30"><i
                                                class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <label aria-label="3.5 stars" class="rating__label" for="rating2-40"><i
                                                class="rating__icon rating__icon--star fa fa-star"
                                                style="color: gray;"></i></label>
                                        <label aria-label="4 stars" class="rating__label" for="rating2-40"><i
                                                class="rating__icon rating__icon--star fa fa-star"
                                                style="color: gray;"></i></label>
                                    @elseif($review_prev->rating == '3.5')
                                        <label aria-label="0 stars" class="rating__label" for="rating2-0">&nbsp;</label>
                                        <label aria-label="0.5 stars" class="rating__label rating__label--half"
                                            for="rating2-05"><i
                                                class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                        <label aria-label="1 star" class="rating__label" for="rating2-10"><i
                                                class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <label aria-label="1.5 stars" class="rating__label rating__label--half"
                                            for="rating2-15"><i
                                                class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                        <label aria-label="2 stars" class="rating__label" for="rating2-20"><i
                                                class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <label aria-label="2.5 stars" class="rating__label rating__label--half"
                                            for="rating2-25"><i
                                                class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                        <label aria-label="3 stars" class="rating__label" for="rating2-30"><i
                                                class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <label aria-label="3.5 stars" class="rating__label rating__label--half"
                                            for="rating2-35"><i
                                                class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                        <label aria-label="4 stars" class="rating__label" for="rating2-40"><i
                                                class="rating__icon rating__icon--star fa fa-star"
                                                style="color: gray;"></i></label>
                                        <label aria-label="4.5 stars" class="rating__label" for="rating2-40"><i
                                                class="rating__icon rating__icon--star fa fa-star"
                                                style="color: gray;"></i></label>
                                    @elseif($review_prev->rating == '4')
                                        <label aria-label="0 stars" class="rating__label" for="rating2-0">&nbsp;</label>
                                        <label aria-label="0.5 stars" class="rating__label rating__label--half"
                                            for="rating2-05"><i
                                                class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                        <label aria-label="1 star" class="rating__label" for="rating2-10"><i
                                                class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <label aria-label="1.5 stars" class="rating__label rating__label--half"
                                            for="rating2-15"><i
                                                class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                        <label aria-label="2 stars" class="rating__label" for="rating2-20"><i
                                                class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <label aria-label="2.5 stars" class="rating__label rating__label--half"
                                            for="rating2-25"><i
                                                class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                        <label aria-label="3 stars" class="rating__label" for="rating2-30"><i
                                                class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <label aria-label="3.5 stars" class="rating__label rating__label--half"
                                            for="rating2-35"><i
                                                class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                        <label aria-label="4 stars" class="rating__label" for="rating2-40"><i
                                                class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <label aria-label="4.5 stars" class="rating__label" for="rating2-40"><i
                                                class="rating__icon rating__icon--star fa fa-star"
                                                style="color: gray;"></i></label>
                                    @elseif($review_prev->rating == '4.5')
                                        <label aria-label="0 stars" class="rating__label" for="rating2-0">&nbsp;</label>
                                        <label aria-label="0.5 stars" class="rating__label rating__label--half"
                                            for="rating2-05"><i
                                                class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                        <label aria-label="1 star" class="rating__label" for="rating2-10"><i
                                                class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <label aria-label="1.5 stars" class="rating__label rating__label--half"
                                            for="rating2-15"><i
                                                class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                        <label aria-label="2 stars" class="rating__label" for="rating2-20"><i
                                                class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <label aria-label="2.5 stars" class="rating__label rating__label--half"
                                            for="rating2-25"><i
                                                class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                        <label aria-label="3 stars" class="rating__label" for="rating2-30"><i
                                                class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <label aria-label="3.5 stars" class="rating__label rating__label--half"
                                            for="rating2-35"><i
                                                class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                        <label aria-label="4 stars" class="rating__label" for="rating2-40"><i
                                                class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <label aria-label="4.5 stars" class="rating__label rating__label--half"
                                            for="rating2-45"><i
                                                class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                        <label aria-label="5 stars" class="rating__label" for="rating2-40"><i
                                                class="rating__icon rating__icon--star fa fa-star"
                                                style="color: gray;"></i></label>
                                    @elseif($review_prev->rating == '5')
                                        <label aria-label="0 stars" class="rating__label" for="rating2-0">&nbsp;</label>
                                        <label aria-label="0.5 stars" class="rating__label rating__label--half"
                                            for="rating2-05"><i
                                                class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                        <label aria-label="1 star" class="rating__label" for="rating2-10"><i
                                                class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <label aria-label="1.5 stars" class="rating__label rating__label--half"
                                            for="rating2-15"><i
                                                class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                        <label aria-label="2 stars" class="rating__label" for="rating2-20"><i
                                                class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <label aria-label="2.5 stars" class="rating__label rating__label--half"
                                            for="rating2-25"><i
                                                class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                        <label aria-label="3 stars" class="rating__label" for="rating2-30"><i
                                                class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <label aria-label="3.5 stars" class="rating__label rating__label--half"
                                            for="rating2-35"><i
                                                class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                        <label aria-label="4 stars" class="rating__label" for="rating2-40"><i
                                                class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <label aria-label="4.5 stars" class="rating__label rating__label--half"
                                            for="rating2-45"><i
                                                class="rating__icon rating__icon--star fa fa-star-half"></i></label>
                                        <label aria-label="5 stars" class="rating__label" for="rating2-50"><i
                                                class="rating__icon rating__icon--star fa fa-star"></i></label>
                                    @endif
                                </div>
                            </div>
                            <div class="review_text d-flex justify-content-center align-items-center">
                                <p>{{ $review_prev->review ?? '' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
