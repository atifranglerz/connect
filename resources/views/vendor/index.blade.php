@extends('vendor.layout.app')
@section('content')
    <section class="pb-5 login_content_wraper" style="background-image:url(assets/images/gradiantbg.jpg);">
        <div class="container-lg container-fluid" >
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="main_content_wraper dashboard mt-1 mt-lg-5 mt-md-5">
                        <h1 class="sec_main_heading text-center mb-0">DASHBOARD</h1>
                        <p class="sec_main_para text-center">View your profile</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 col-md-11 col-sm-11  mx-auto">
                    <div class="quote_card_heading  mb-lg-4 mb-2 mt-lg-5 mt-3">
                        <h3>All Quotes</h3>
                        <a href="#">View All</a>
                    </div>
                    <div class="all_quote_card">
                        <div class="quote_info">
                            <h3>Car Repair</h3>
                            <p >Red Suzuki For Repair</p>
                            <p class="quote_rev"><span>5 </span> Quotes Recieved</p>
                        </div>
                        <div class="quote_detail_btn_wraper">
                            <a href="#" class="btn-secondary">VIEW DETAILS</a>

                        </div>

                    </div>
                </div>
                <div class="col-lg-10 col-md-11 col-sm-11   mx-auto">
                    <div class="quote_card_heading mb-lg-4 mb-2 mt-lg-5 mt-3">
                        <h3>All Orders</h3>
                        <a href="allOrder.php">View All</a>
                    </div>
                    <div class="all_quote_card">
                        <div class="quote_info">
                            <h3>Car Repair</h3>
                            <p >Red Suzuki For Repair</p>
                            <p class="quote_rev">Order ID:<span> #12345678 </span></p>
                        </div>
                        <div class="quote_detail_btn_wraper">
                            <a href="#" class="btn-secondary">VIEW DETAILS</a>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
