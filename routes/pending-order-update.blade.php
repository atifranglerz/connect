@extends('user.layout.app')
@section('content')
<section class="pb-5 login_content_wraper" style="background-image:url(assets/images/gradiantbg.jpg);">
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
                        <img @if($garage->image && $garage->image != null) src="{{asset($garage->image)}}" @else
                        src="{{ asset('public/assets/images/repair2.jpg') }}" @endif>
                    </div>
                    <div class=" w-100  quote_detail_wraper">
                        <div class="quote_info">
                            <h5 class="d-flex align-items-center active_quote">{{$garage->garage_name}}</h5>
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
                                <p>Order ID: <span>#{{$order->order_code}}</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="row">
      <div class="col-lg-12">
        <div class="over_view_part carad_data">
          <h3 class=" text-center mb-5">LEGAL DOCS</h3>
        </div>
      </div>
    </div> -->
        <div class="owl-carousel carousel_se_03_carousel owl-theme mt-5">
            <div class="item">
                <div class="carAd_img_wraper doc_img customer_dashboard">
                    <img src="assets/images/doc1.jpg">
                </div>
            </div>
            <div class="item">
                <div class="carAd_img_wraper carAd_img_wraper doc_img customer_dashboard">
                    <img src="assets/images/doc2.jpg">
                </div>
            </div>
            <div class="item">
                <div class="carAd_img_wraper carAd_img_wraper doc_img customer_dashboard">
                    <img src="assets/images/doc3.jpg">
                </div>
            </div>

        </div>
        <div class="row mt-5">
            <div class=" col-xl-7 col-lg-9 col-md-9 col-sm-11 mx-auto">
                <div class="all_quote_card  vendor_rply_dtlL _text">
                    <div class="over_view_part carad_data vendor_detail">
                        <h3 class=" text-center mb-5">REPAIR DETAILS</h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-5 col-sm-5">
                            <div class="invoice_details mb-5">
                                <h4>Work Days</h4>
                                <h4 class="__gray">7</h4>
                            </div>
                            <div class="invoice_details">
                                <h4>Labor Pay</h4>
                                <h4 class="__gray">AED 170</h4>
                            </div>


                        </div>
                        <div class="col-lg-2 col-sm-2">
                            <div class="divider_invoice">

                            </div>

                        </div>
                        <div class="col-lg-5 col-sm-5">
                            <div class="invoice_details mb-5">
                                <h4>Per Day Rate</h4>
                                <h4 class="__gray">AED 120</h4>
                            </div>
                            <div class="invoice_details">
                                <h4>Total Invoice</h4>
                                <h4 class="__gray">AED 450</h4>
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
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                            voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                            cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                            laborum.Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a
                            piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard
                            McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the
                            more obscure Latin words, consectetur,</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="row  mt-5">
      <div class="col-lg-12">

        <div class="all_quote_card  vendor_rply_dtlL _text">
          <div class="over_view_part carad_data vendor_detail">
            <h3 class=" text-center mb-5">CAR DETAILS</h3>
          </div>
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <div class="row mt-1 g-3">
                <div class="col-lg-6 col-md-6">
                  <div class="d-grid gap-2 ">
                    <button class="btn text-center btn-primary get_quot block get_appointment" type="button">Car Model
                    </button>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6">
                  <div class="d-grid gap-2 ">
                    <button class="btn text-center btn-primary get_quot block get_appointment" type="button">Car Make
                    </button>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6">
                  <div class="d-grid gap-2 ">
                    <button class="btn text-center btn-primary get_quot block get_appointment" type="button">Type of Service
                    </button>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6">
                  <div class="d-grid gap-2 ">
                    <button class="btn text-center btn-primary get_quot block get_appointment" type="button">Customer Name
                    </button>
                  </div>
                </div>
              </div>


            </div>
          </div>
        </div>
      </div>
    </div> -->

        <div class="row">
            <div class="col-xl-5 col-lg-6  col-md-8 mx-auto">
                <div class="row mt-5 mb-4 g-3">
                    <!--  <div class="col-lg-6 col-md-6">
            <div class="d-grid gap-2 mt-lg-3 ">
              <button class="btn text-center btn-primary get_quot block get_appointment " type="button">CANCEL ORDER
              </button>
            </div>
          </div> -->
                    <div class="col-lg-6 col-md-6 col-sm-4 mx-auto">
                        <div class="d-grid gap-2 mt-lg-3 ">
                            <a href="{{route('user.order.summary',$order->id)}}" class="btn btn-secondary block get_appointment">MARK AS COMPLETE</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection