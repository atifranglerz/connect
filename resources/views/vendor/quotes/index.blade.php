@extends('vendor.layout.app')
@section('content')
    <section class="pb-5 login_content_wraper" style="background-image:url(public/vendor/assets/images/gradiantbg.jpg);">
        <div class="container-lg container-fluid" >
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="main_content_wraper dashboard mt-1 mt-lg-5 mt-md-5">
                        <h1 class="sec_main_heading text-center mb-0">ACTIVE QUOTES</h1>
                        <p class="sec_main_para text-center">Select your preferred garage</p>
                    </div>
                </div>
            </div>

            @foreach( $data as $value)
                <div class="row g-2">
                    <div class="col-lg-10 col-md-11 col-sm-12 col-10  mx-auto">
                        <div class="all_quote_card ">
                            <div class="car_inner_imagg ">
{{--                                <?php--}}
{{--                                $img = explode(",",$value->car_image);--}}
{{--                                ?>--}}
{{--                                <img src="{{ asset($img[0]) }}">--}}
                                                            <img src="{{ asset('public/user/assets/images/repair3.jpg')}}">
                            </div>
                            <div class=" w-100  quote_detail_wraper">
                                <div class="quote_info">
                                    <h3 class="d-flex align-items-center active_quote"><a href="#">{{$value->model}}</a> <span class="order_id">#12345678</span></h3>
                                    <p class="mb-0">Red Suzuki For Repair</p>
                                    <p >{{$value->phone}}</p>
                                </div>
                                <div class="quote_detail_btn_wraper">
                                    <h3 class=" text-sm-center">AED {{$value->price}}</h3>
                                    <div class="d-flex align-items-center chat_view__detail">
                                        <a href="#" class="chat_icon"><!-- <img src="assets/images/meassageiconblk.svg"> --><i class="fa-solid fa-message"></i></a>
                                        <a href="{{ route('vendor.quotedetail',$value->id ) }}" class="btn-secondary">VIEW DETAILS</a>
                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
