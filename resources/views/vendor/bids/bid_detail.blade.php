@extends('vendor.layout.app')
@section('content')
<section class="pb-5 login_content_wraper" style="background-image:url(assets/images/gradiantbg.jpg);">
  <div class="container-lg container-fluid" >
   <div class="row">
    <div class="col-lg-10 mx-auto">
      <div class="main_content_wraper dashboard mt-1 mt-lg-5 mt-md-5">
        <h1 class="sec_main_heading text-center mb-0"> MY OFFERED QUOTE</h1>
        <p class="sec_main_para text-center">See How You Responded To This Request</p>
      </div>
    </div>
  </div>
  <div class="row g-2">
    <div class="col-lg-12 col-md-12 col-12  mx-auto">
      <div class="all_quote_card replies_allquot ">
        <div class=" w-100  quote_detail_wraper replies ">
          <div class="active_bid_dtl_card_left">
            <div class="quote_info">
              <h3 class="d-flex align-items-center active_quote nowrape ">{{$data->userBid->company->company}}</h3>
              <p class="mb-0">{{$data->userBid->user->name}}</p>
              <p class="mb-0" >{{$data->userBid->user->phone}}</p>
              <p class="milage" >Mileage  <span>{{$data->userBid->mileage}}km</span></p>
            </div>
            <div class="d-flex chat_view__detail qoute_replies vendor_order days ">
              <h3 class="active_bidDay">7 Days</h3>
              <a href="#" class="chat_icon">
                <i class="fa-solid fa-message"></i>
                <!-- <img src="assets/images/meassageiconblk.svg"> -->
              </a>
            </div>

          </div>
          <div class=" active_bid_dtl_card_right">
            <h3 class= "offer_quote_heading">{{$data->userBid->model}}</h3>
            <h3 class="offer_quote_heading second_heading">My Quote <span>AED {{$data->price}}</span></h3>
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
          <p>{{$data->description}}</p>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="all_quote_card  vendor_rply_dtlL _text">
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

      </div>
    </div>
  </div>
  <div class="row mt-5">
    <div class="col-lg-12">
      <div class="all_quote_card  vendor_rply_dtlL _text">
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


        <h3 class="active_order_req">Police /Accident /Inspection Report</h3>

        <div class="vendor__rply__dttl">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,</p>
        </div>

      </div>
    </div>
  </div>
</div>
</section>
@endsection
