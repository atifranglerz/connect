@extends('user.layout.app')
@section('content')
    <section class="pb-5 login_content_wraper" style="background-image:url(public/vendor/assets/images/gradiantbg.jpg);">
        <div class="container-lg container-fluid">
            <div class="row g-2 pt-5">
                <div class="col-lg-11 col-md-12 col-md-12 col-11  mx-auto">
                    <div class="all_quote_card  vendor_rply_dtlL completed_orders">
                        <?php
                        $userbid = \App\Models\UserBid::where('id',$order->user_bid_id)->first();
                        $company = \App\Models\Company::where('id',$userbid->company_id)->first();
                        $garage = \App\Models\Garage::where('id',$order->garage_id)->first();
                        $vendor = \App\Models\Vendor::where('id',$garage->vendor_id)->first();
                        ?>
                        <div class="car_inner_imagg vendor_rply_dtl ">
                            <img @if($garage->image && $garage->image != null) src="{{asset($garage->image)}}" @else src="{{ asset('public/assets/images/repair2.jpg') }}" @endif>
                        </div>
                        <div class=" w-100  quote_detail_wraper">
                            <div class="quote_info">
                                <h3 class="d-flex align-items-center active_quote">{{$garage->garage_name}}</h3>
                                <p class="mb-0">{{$vendor->name}}</p>
                                <p>{{$vendor->phone}}</p>
                                <div class="card_icons d-flex justify-content-center align-items-center">
                                    <?php $category = \App\Models\GarageCategory::where('garage_id',$garage->id)->pluck('category_id');
                                    $category_name = \App\Models\Category::whereIn('id',$category)->get();
                                    ?>
                                    @foreach($category_name as $catname)
                                    <div class="icon_wrpaer">
                                        <img src="{{asset($catname->icon)}}">
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="quote_detail_btn_wraper">
                                <div class="quote_detail_btn_wraper">
                                    <h3 class=" text-sm-center vendor_replies_dtl allOrder">{{$order->status}}</h3>
                                </div>
                                <h3 class=" text-sm-center">AED {{$order->total}}</h3>
                                <div class="completed_order_id">
                                    <p>Order ID:  <span>#{{$order->order_code}}</span></p>
                                </div>

                                <!-- <div class="d-flex align-items-center chat_view__detail">
                                  <a href="#" class="chat_icon"><img src="assets/images/meassageiconblk.svg"></a>
                                  <a href="#" class="btn-secondary">VIEW DETAILS</a>
                                </div> -->
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

                       <?php $vendor_bid = \App\Models\VendorBid::where('garage_id',$order->garage_id)->where('user_bid_id',$order->user_bid_id)->first();?>
                        <div class="vendor__rply__dttl">
                            <p>{{$vendor_bid->description}}</p>
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
                            <div class="col-lg-8 mx-auto">
                                <div class="row mt-1 g-3">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="d-grid gap-2 ">
                                            <button class="btn text-center btn-secondary get_quot block get_appointment" type="button">Car Model : {{getModelByUserBid($order->user_bid_id)}}
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="d-grid gap-2 ">
                                            <button class="btn text-center btn-secondary get_quot block get_appointment" type="button">Car Make : {{$company->company}}
                                            </button>
                                        </div>
                                    </div>
                                    <?php $userbidcateg = \App\Models\UserBidCategory::where('user_bid_id',$order->user_bid_id)->pluck('category_id');
                                    $userbidcategories = \App\Models\Category::whereIn('id',$userbidcateg)->get(); ?>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="d-grid gap-2 ">
                                            <button class="btn text-center btn-secondary get_quot block get_appointment" type="button">Type of Service : @foreach($userbidcategories as $userbidcategory)  {{$userbidcategory->name}}, @endforeach
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="d-grid gap-2 ">
                                            <button class="btn text-center btn-secondary get_quot block get_appointment" type="button">Customer Name : {{auth()->user()->name}}
                                            </button>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if($order->status == 'pending')
                <div class="row">
                    <div class="col-xl-5 col-lg-6  col-md-10 col-sm-12 mx-auto">
                        <div class="row mt-5 mb-4 g-3">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="d-grid gap-2 mt-lg-3 ">
                                    <a href="leavereview1.php" class="btn text-center btn-primary get_quot block get_appointment d-flex align-items-center justify-content-center" type="button">CANCEL ORDER
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="d-grid gap-2 mt-lg-3 ">
                                    <a href="completePayment.php" class="btn btn-secondary block get_appointment" type="button">MARK AS COMPLETE
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="over_view_part carad_data vendor_detail Leave_review">
                            <h3 class=" text-center mb-2 mt-5">REVIEW WORKSHOP</h3>
                        </div>

                    </div>
                </div>
                <div class="row  mt-5">
                    <div class="col-lg-12">

                        <div class="all_quote_card  vendor_rply_dtlL _text">
                            <div class="row">
                                <div class="col-lg-8 mx-auto">
                                    <form>
                                        <div class="row mt-1 g-3">
                                            <div class="col-lg-12 col-md-8 mx-auto">
                                                <div class="form-floating">
                                                    <textarea class="form-control" placeholder="Add Repairing Details" id="floatingTextarea2" style="height: 177px">                      </textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-8 mx-auto">
                                                <div class="d-grid gap-2 ">
                                                    <button class="btn text-center btn-secondary get_quot block get_appointment" type="button">LEAVE REVIEW
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="row  mt-5">
                    <div class="col-lg-12">

                        <div class="all_quote_card  vendor_rply_dtlL _text">
                            <div class="over_view_part carad_data vendor_detail">
                                <h3 class=" text-center mb-4">YOUR REVIEW</h3>
                            </div>
                            <div class="star_rating d-flex justify-content-center align-items-center">
                                <a href="#"><i class="bi bi-star-fill"></i></a>
                                <a href="#"><i class="bi bi-star-fill"></i></a>
                                <a href="#"><i class="bi bi-star-fill"></i></a>
                                <a href="#"><i class="bi bi-star-fill"></i></a>
                                <a href="#"><i class="bi bi-star"></i></a>

                            </div>
                            <div class="review_text d-flex justify-content-center align-items-center">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute ir</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
