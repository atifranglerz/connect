@extends('vendor.auth.layout.app')
@section('content')
    <style type="text/css">
        .login_sinup{
            display: none;
        }
    </style>

    <section class="pb-5 login_content_wraper" style="background-image:url(../../../public/assets/images/gradiantbg.jpg);">
        <div class="container" >
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="main_content_wraper dashboard mt-1 mt-lg-5 mt-md-5">
                        <h1 class="sec_main_heading text-center mb-3">CREATE WORKSHOP</h1>
                        <p class="sec_main_para text-center">Set Up How Your Workshop Looks Like</p>
                    </div>
                </div>
            </div>

            <div class="row ">
                <div class="col-lg-8 col-md-11  mx-auto">
                    <div class="bid_form_wraper">
                        <div class="row">
                            <div class="col-lg-8 mx-auto px-5 px-lg-1 ">
                                <ul class="nav nav-tabs " id="myTab" role="tablist">
                                    <li class="nav-item nav_item_li vendor_creatworkoshop" role="presentation">
                                        <button class="nav-link active tab_btns" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true"></button>
                                    </li>
                                    <li class="nav-item nav_item_li vendor_creatworkoshop" role="presentation">
                                        <button class="nav-link tab_btns" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false"></button>
                                    </li>
                                    <li class="nav-item nav_item_li vendor_creatworkoshop" role="presentation">
                                        <button class="nav-link tab_btns" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false"></button>
                                    </li>
                                </ul>
                                <div class="col-lg-9 mx-auto">
                                    <p class=" request_quote_heading">CAR INFORMATION</p>
                                </div>
                            </div>
                            <form method="post" action="">
                                @csrf
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active px-lg-3" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row g-lg-3 g-2">
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <input type="text" class="form-control" name="workshop_name" placeholder="Workshop Name">
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <input type="text" class="form-control" name="business_name" placeholder="Doing Business As">
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <input type="text" class="form-control" name="address" placeholder="Address">
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <input type="email" class="form-control" name="email" placeholder="Email" >
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <input type="text" class="form-control" name="number" placeholder="Phone Number" >
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <input type="text" class="form-control" name="country" placeholder="Country" >
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <input type="email" class="form-control" name="city" placeholder="City" >
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <input type="text" class="form-control" name="postbox_number" placeholder="P/O Box" >
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <!-- multiple name="animals" id="animals" class="filter-multi-select" -->
                                                <select class="form-select"  name="service\_type" aria-label="Type of Service">
                                                    <option selected>Type of Service</option>
                                                    <option value="1">2019</option>
                                                    <option value="2">2020</option>
                                                    <option value="3">2021</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="d-grid gap-2 mt-3 mb-4">
                                                    <button class="btn btn-secondary block get_appointment" type="submit">NEXT
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

{{--                                        <div class="row">--}}
{{--                                            <div class="col-lg-12">--}}
{{--                                                <div class="over_view_part timing_hours mape_wraper mt-4">--}}
{{--                                                    <h3 class=" text-center mb-5">Google Maps</h3>--}}
{{--                                                    <div class="input-group mb-3 mx-lg-5 mx-md-3 mx-1 search_garages_wraper vendor_crt_wrkshop">--}}
{{--                                                        <input type="text" class="form-control search_garages creat_wrk" name="search_car" placeholder="Search For Your Next Car" aria-label="Recipient's username" aria-describedby="button-addon2">--}}
{{--                                                        <button class="btn search " type="button" id="button-addon2">Search</button>--}}
{{--                                                        <div class="srearch_icon_wraper crt_wrk_shp">--}}
{{--                                                            <img src="assets/images/location-icon.svg">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}

{{--                                                    <div class="responsive-map">--}}
{{--                                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2822.7806761080233!2d-93.29138368446431!3d44.96844997909819!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x52b32b6ee2c87c91%3A0xc20dff2748d2bd92!2sWalker+Art+Center!5e0!3m2!1sen!2sus!4v1514524647889" height="550" frameborder="0" style="border:0" allowfullscreen>--}}
{{--                                                        </iframe>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                    </div>--}}
{{--                                    next section--}}
{{--                                    <div class="tab-pane fade px-lg-3" id="profile" role="tabpanel" aria-labelledby="profile-tab">--}}
{{--                                        <div class="row g-lg-3 g-2">--}}
{{--                                            <div class="col-lg-12 mb-3">--}}
{{--                                                <div class="input-images-4">--}}
{{--                                                </div>--}}
{{--                                                <!-- <label class="img_wraper_label">--}}
{{--                                                  <div class="file_icon_wraper">--}}
{{--                                                    <img src="assets/images/fileuploadicon.svg">--}}
{{--                                                  </div>--}}
{{--                                                  <p class="mb-0">Upload workshop image</p>--}}
{{--                                                  <input type="file" size="60" >--}}
{{--                                                </label> -->--}}
{{--                                            </div>--}}
{{--                                            <div class="col-lg-12">--}}
{{--                                                <div class="form-floating">--}}
{{--                                                    <textarea class="form-control" placeholder="Add information in details" id="floatingTextarea2" style="height: 106px"></textarea>--}}
{{--                                                    <label for="floatingTextarea2">Add overview in detail</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-lg-12">--}}
{{--                                                <div class="d-grid gap-2 mt-3 mb-4">--}}
{{--                                                    <button class="btn btn-secondary block get_appointment" type="button">NEXT--}}
{{--                                                    </button>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="tab-pane fade px-lg-3" id="contact" role="tabpanel" aria-labelledby="contact-tab">--}}

{{--                                        <div class="row mb-3 align-items-center justify-content-center">--}}
{{--                                            <label for="inputEmail3" class="col-lg-2 mb-3 col-md-2 col-sm-3 col-form-label activeDaylabel">Monday</label>--}}
{{--                                            <div class="col-lg-3 col-md-3 col-sm-3 mb-3 crt_wrkshop">--}}
{{--                                                <input type="text" class="form-control" placeholder="From :10:00Am " id="">--}}
{{--                                            </div>--}}
{{--                                            <div class="col-lg-3 col-md-3 col-sm-3 mb-3 crt_wrkshop">--}}
{{--                                                <input type="text" class="form-control" placeholder="To :06:00Pm " id="">--}}
{{--                                            </div>--}}
{{--                                            <div class="col-lg-3 col-md-3 col-sm-3 mb-3">--}}
{{--                                                <div class="form-check crt_wrkshop d-flex justify-content-between align-items-center">--}}
{{--                                                    <label class="form-check-label" for="autoSizingCheck">--}}
{{--                                                        Closed:</label>--}}
{{--                                                    <input class="form-check-input wrk_day_chek" type="checkbox" id="autoSizingCheck">--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="row mb-3 align-items-center justify-content-center">--}}
{{--                                            <label for="inputEmail3" class="col-lg-2 mb-3 col-md-2 col-sm-3 col-form-label activeDaylabel">Monday</label>--}}
{{--                                            <div class="col-lg-3 col-md-3 col-sm-3 mb-3 crt_wrkshop">--}}
{{--                                                <input type="text" class="form-control" placeholder="From :10:00Am " id="">--}}
{{--                                            </div>--}}
{{--                                            <div class="col-lg-3 col-md-3 col-sm-3 mb-3 crt_wrkshop">--}}
{{--                                                <input type="text" class="form-control" placeholder="To :06:00Pm " id="">--}}
{{--                                            </div>--}}
{{--                                            <div class="col-lg-3 col-md-3 col-sm-3 mb-3">--}}
{{--                                                <div class="form-check crt_wrkshop d-flex justify-content-between align-items-center">--}}
{{--                                                    <label class="form-check-label" for="autoSizingCheck">--}}
{{--                                                        Closed:</label>--}}
{{--                                                    <input class="form-check-input wrk_day_chek" type="checkbox" id="autoSizingCheck">--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="row mb-3 align-items-center justify-content-center">--}}
{{--                                            <label for="inputEmail3" class="col-lg-2 mb-3 col-md-2 col-sm-3 col-form-label activeDaylabel">Monday</label>--}}
{{--                                            <div class="col-lg-3 col-md-3 col-sm-3 mb-3 crt_wrkshop">--}}
{{--                                                <input type="text" class="form-control" placeholder="From :10:00Am " id="">--}}
{{--                                            </div>--}}
{{--                                            <div class="col-lg-3 col-md-3 col-sm-3 mb-3 crt_wrkshop">--}}
{{--                                                <input type="text" class="form-control" placeholder="To :06:00Pm " id="">--}}
{{--                                            </div>--}}
{{--                                            <div class="col-lg-3 col-md-3 col-sm-3 mb-3">--}}
{{--                                                <div class="form-check crt_wrkshop d-flex justify-content-between align-items-center">--}}
{{--                                                    <label class="form-check-label" for="autoSizingCheck">--}}
{{--                                                        Closed:</label>--}}
{{--                                                    <input class="form-check-input wrk_day_chek" type="checkbox" id="autoSizingCheck">--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="row mb-3 align-items-center justify-content-center">--}}
{{--                                            <label for="inputEmail3" class="col-lg-2 mb-3 col-md-2 col-sm-3 col-form-label activeDaylabel">Monday</label>--}}
{{--                                            <div class="col-lg-3 col-md-3 col-sm-3 mb-3 crt_wrkshop">--}}
{{--                                                <input type="text" class="form-control" placeholder="From :10:00Am " id="">--}}
{{--                                            </div>--}}
{{--                                            <div class="col-lg-3 col-md-3 col-sm-3 mb-3 crt_wrkshop">--}}
{{--                                                <input type="text" class="form-control" placeholder="To :06:00Pm " id="">--}}
{{--                                            </div>--}}
{{--                                            <div class="col-lg-3 col-md-3 col-sm-3 mb-3">--}}
{{--                                                <div class="form-check crt_wrkshop d-flex justify-content-between align-items-center">--}}
{{--                                                    <label class="form-check-label" for="autoSizingCheck">--}}
{{--                                                        Closed:</label>--}}
{{--                                                    <input class="form-check-input wrk_day_chek" type="checkbox" id="autoSizingCheck">--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="row mb-3 align-items-center justify-content-center">--}}
{{--                                            <label for="inputEmail3" class="col-lg-2 mb-3 col-md-2 col-sm-3 col-form-label activeDaylabel">Monday</label>--}}
{{--                                            <div class="col-lg-3 col-md-3 col-sm-3 mb-3 crt_wrkshop">--}}
{{--                                                <input type="text" class="form-control" placeholder="From :10:00Am " id="">--}}
{{--                                            </div>--}}
{{--                                            <div class="col-lg-3 col-md-3 col-sm-3 mb-3 crt_wrkshop">--}}
{{--                                                <input type="text" class="form-control" placeholder="To :06:00Pm " id="">--}}
{{--                                            </div>--}}
{{--                                            <div class="col-lg-3 col-md-3 col-sm-3 mb-3">--}}
{{--                                                <div class="form-check crt_wrkshop d-flex justify-content-between align-items-center">--}}
{{--                                                    <label class="form-check-label" for="autoSizingCheck">--}}
{{--                                                        Closed:</label>--}}
{{--                                                    <input class="form-check-input wrk_day_chek" type="checkbox" id="autoSizingCheck">--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="row mb-3 align-items-center justify-content-center">--}}
{{--                                            <label for="inputEmail3" class="col-lg-2 mb-3 col-md-2 col-sm-3 col-form-label activeDaylabel">Monday</label>--}}
{{--                                            <div class="col-lg-3 col-md-3 col-sm-3 mb-3 crt_wrkshop">--}}
{{--                                                <input type="text" class="form-control" placeholder="From :10:00Am " id="">--}}
{{--                                            </div>--}}
{{--                                            <div class="col-lg-3 col-md-3 col-sm-3 mb-3 crt_wrkshop">--}}
{{--                                                <input type="text" class="form-control" placeholder="To :06:00Pm " id="">--}}
{{--                                            </div>--}}
{{--                                            <div class="col-lg-3 col-md-3 col-sm-3 mb-3">--}}
{{--                                                <div class="form-check crt_wrkshop d-flex justify-content-between align-items-center">--}}
{{--                                                    <label class="form-check-label" for="autoSizingCheck">--}}
{{--                                                        Closed:</label>--}}
{{--                                                    <input class="form-check-input wrk_day_chek" type="checkbox" id="autoSizingCheck">--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="row mb-3 align-items-center justify-content-center">--}}
{{--                                            <label for="inputEmail3" class="col-lg-2 mb-3 col-md-2 col-sm-3 col-form-label activeDaylabel">Monday</label>--}}
{{--                                            <div class="col-lg-3 col-md-3 col-sm-3 mb-3 crt_wrkshop">--}}
{{--                                                <input type="text" class="form-control" placeholder="From :10:00Am " id="">--}}
{{--                                            </div>--}}
{{--                                            <div class="col-lg-3 col-md-3 col-sm-3 mb-3 crt_wrkshop">--}}
{{--                                                <input type="text" class="form-control" placeholder="To :06:00Pm " id="">--}}
{{--                                            </div>--}}
{{--                                            <div class="col-lg-3 col-md-3 col-sm-3 mb-3">--}}
{{--                                                <div class="form-check crt_wrkshop d-flex justify-content-between align-items-center">--}}
{{--                                                    <label class="form-check-label" for="autoSizingCheck">--}}
{{--                                                        Closed:</label>--}}
{{--                                                    <input class="form-check-input wrk_day_chek" type="checkbox" id="autoSizingCheck">--}}
{{--                                                </div>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php //include 'footersignup.php';?>
@endsection
