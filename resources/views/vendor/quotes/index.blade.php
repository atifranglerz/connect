@extends('vendor.layout.app')

@section('content')

<section class="pb-5 login_content_wraper" style="background-image:url(public/vendor/assets/images/gradiantbg.jpg);">

    <div class="container-lg container-fluid">

        <div class="row">

            <div class="col-lg-10 mx-auto">

                <div class="main_content_wraper dashboard mt-1 mt-lg-5 mt-md-5">

                    <h4 class="sec_main_heading text-center mb-0">ALL QUOTES</h4>

                    {{--  <p class="sec_main_para text-center">Select your preferred garage</p>--}}

                </div>

            </div>

        </div>

        <div class="row g-2">

            @foreach( $user_all_bid as $value)
            <div class="col-lg-10 col-md-11 col-sm-12 col-10  mx-auto">

                <div class="all_quote_card ">

                    <div class="car_inner_imagg ">


                        <?php
                            $img = \App\Models\UserBidImage::where('user_bid_id',$value->user_bit_id)->where('type','image')->oldest()->first();
                            $img1=Explode(",",$img->car_image);
                        ?>
                        <img src="{{ asset($img1[0]) }}">

                    </div>

                    <div class=" w-100  quote_detail_wraper">

                        <div class="quote_info">

                            <h5 class="d-flex align-items-center active_quote heading-color"><a href="#"
                                    class="heading-color">{{$value->userBid->company->company}}
                                    ({{$value->userbid->model}})</a> <span
                                    class="order_id">#{{$value->userbid->reference_no}}</span></h5>

                            <p class="mb-0">{{$value->userbid->description1}}</p>



                            <!-- <p>{{$value->userbid->phone}}</p> -->

                        </div>

                        <div class="quote_detail_btn_wraper">

                            <h5 class="text-sm-center">AED {{$value->userbid->price}}</h5>

                            <div class="d-flex align-items-center chat_view__detail">

                                <a type="button" href="{{url('vendor/chat/'.$value->user_id)}}" class="chat_icon">
                                    <!-- <img src="assets/images/meassageiconblk.svg"> --><i
                                        class="fa-solid fa-message"></i>
                                </a>

                                <?php
                                            $id =  $value->userbid->id;
                                            $offer = \App\Models\VendorBidStatus::where([['user_bid_id',$id],['vendor_id',Auth::id()]])->first();
                                        ?>
                                @if($offer == NULL)
                                <a href="{{ route('vendor.quotedetail',$value->userbid->id ) }}"
                                    class="btn-secondary">VIEW DETAILS</a>
                                @else
                                <a href="{{ route('vendor.view-offer',$value->userbid->id ) }}"
                                    class="btn-secondary">VIEW OFFER</a>
                                @endif

                            </div>





                        </div>



                    </div>

                </div>

            </div>



            @endforeach

        </div>





        @foreach( $user_all_bids as $value)
        <div class="col-lg-10 col-md-11 col-sm-12 col-10  mx-auto">

            <div class="all_quote_card ">

                <div class="car_inner_imagg ">
                    <?php
                                $img = \App\Models\UserBidImage::where('user_bid_id',$value->user_bit_id)->where('type','image')->oldest()->first();
                                $img1=Explode(",",$img->car_image);
                                ?>

                    <img src="{{ asset($img1[0]) }}">

                </div>

                <div class=" w-100  quote_detail_wraper">

                    <div class="quote_info">

                        <h5 class="d-flex align-items-center active_quote heading-color"><a href="#"
                                class="heading-color">{{$value->userBid->company->company}}
                                ({{$value->userbid->model}})</a> <span
                                class="order_id">#{{$value->userbid->reference_no}}</span></h5>

                        <p class="mb-0">{{$value->userbid->description1}}</p>
                        <!-- <p>{{$value->userbid->phone}}</p> -->

                    </div>

                    <div class="quote_detail_btn_wraper">

                        <h5 class="text-sm-center">AED {{$value->userbid->price}}</h5>

                        <div class="d-flex align-items-center chat_view__detail">

                            <a type="button" href="{{url('vendor/chat/'.$value->user_id)}}" class="chat_icon">
                                <!-- <img src="assets/images/meassageiconblk.svg"> --><i
                                    class="fa-solid fa-message"></i>
                            </a>

                            <?php
                                            $id =  $value->userbid->id;
                                            $offer = \App\Models\VendorBidStatus::where([['user_bid_id',$id],['vendor_id',Auth::id()]])->first();
                                        ?>
                            @if($offer == NULL)
                            <a href="{{ route('vendor.quotedetail',$value->userbid->id ) }}" class="btn-secondary">VIEW
                                DETAILS</a>
                            @else
                            <a href="{{ route('vendor.view-offer',$value->userbid->id ) }}" class="btn-secondary">VIEW
                                OFFER</a>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</section>

@endsection