@extends('company.layout.app')
@section('content')
    <section class="pb-5 login_content_wraper">
        <div class="container-lg container-fluid">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="main_content_wraper dashboard mt-1 mt-lg-5 mt-md-5">
                        <h4 class="sec_main_heading text-center mb-0">ALL INSURANCE REQUEST</h4>
                        {{-- <p class="sec_main_para text-center">Select your preferred garage</p> --}}
                    </div>
                </div>
            </div>

            <div class="row g-2">
                @if (count($insurance) > 0)
                    @foreach ($insurance as $value)
                        <div class="col-lg-10 col-md-11 col-sm-12 col-10  mx-auto">
                            <div class="all_quote_card ">
                                <div class="car_inner_imagg ">
                                    <?php
                                    $userBid = \App\Models\UserBid::where('id', $value->bid->user_bid_id)->first();
                                    $img = \App\Models\UserBidImage::where('user_bid_id', $userBid->id)
                                        ->where('type', 'image')
                                        ->oldest()
                                        ->first();
                                    $company = \App\Models\Company::where('id', $userBid->company_id)->first();
                                    $img1 = Explode(',', $img->car_image);
                                    ?>
                                    <img src="{{ asset($img1[0]) }}">
                                </div>
                                <div class=" w-100  quote_detail_wraper">
                                    <div class="quote_info">
                                        <h5 class="d-flex align-items-center active_quote heading-color"><a href="#"
                                                class="heading-color">{{ $company->company }} {{ $value->model }}</a> <span
                                                class="order_id">#{{ $userBid->reference_no }}</span></h5>
                                        <p class="mb-0">{{ $userBid->car_owner_name }}</p>
                                        <p class="mb-0">{{ $userBid->phone }}</p>
                                    </div>
                                    <div class="quote_detail_btn_wraper">
                                        <h5 class=" text-sm-center">AED {{ $value->bid->net_total }}</h5>
                                        <div class="d-flex align-items-center chat_view__detail">
                                            <a href="{{ route('company.car-detail', $value->bid->id) }}" class="btn-secondary">VIEW
                                                DETAILS</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-lg-10 col-md-11 col-sm-12 col-10  mx-auto">
                        <div class="all_quote_card ">
                            <div class=" w-100  quote_detail_wraper">
                                <div class="quote_info">
                                    <p class="mb-0">No Request has been received !</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
