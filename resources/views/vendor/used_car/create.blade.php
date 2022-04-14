@extends('vendor.layout.app')
@section('content')
<section class="pb-5 login_content_wraper" style="background-image:url(assets/images/gradiantbg.jpg);">
    <div class="container-lg container-fluid" >
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="main_content_wraper dashboard mt-1 mt-lg-5 mt-md-5">
                    <h1 class="sec_main_heading text-center mb-0">POST AN AD FOR USED CAR</h1>
                    <p class="sec_main_para text-center">Post Ad For Your Car You Want To Sell</p>
                </div>
            </div>
        </div>


        <div class="row ">
            <div class="col-lg-9 col-md-11 col-sm-12  mx-auto">
                <div class="bid_form_wraper">
                    <div class="row">
                        <div class="col-lg-8 mx-auto px-5 px-lg-1 ">
                        </div>
                        <form method="post" action="">
                            <div class="row g-lg-3 g-2">
                                <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
                                    <div class="input-images">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
                                    <div class="input-images-3">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input type="text" class="form-control" name="modelname" placeholder="Model" aria-label="Model">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input type="text" class="form-control" name="make" placeholder="Make" aria-label="Make">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <select class="form-select"  name="typeOfService" aria-label="Type of Service">
                                        <option  value="0" selected>Year</option>
                                        <option value="1">2019</option>
                                        <option value="2">2020</option>
                                        <option value="3">2021</option>
                                    </select>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input type="text" class="form-control" name="price" placeholder="Price" aria-label="Price">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input type="text" class="form-control"  name="color" placeholder="Color" aria-label="Color">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input type="text" class="form-control" name="engine" placeholder="Engine" aria-label="Engine">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input type="text" class="form-control"  name="price" placeholder="Price" aria-label="Price">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input type="text" class="form-control" name="address" placeholder="Address" aria-label="Price">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input type="text" class="form-control" name="car_milage" placeholder="Car Milage" aria-label="Price">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-floating">
                      <textarea class="form-control" placeholder="Add Repairing Details" name="description" id="floatingTextarea2" style="height: 100px">
                      </textarea>
                                    </div>
                                </div>



                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="d-grid gap-2 mt-lg-3 mb-lg-4">
                                        <button class="btn btn-secondary block get_appointment" type="submit">NEXT
                                        </button>
                                    </div>
                                </div>
                                <!-- <div class="col-lg-6 col-md-12">
                                  <div class="d-grid gap-2 mt-lg-3 mb-4">
                                    <button class="btn text-center btn-primary get_quot block get_appointment" type="button">GET QUOTES FROM PREFFERED GARAGES
                                    </button>
                                  </div>
                                </div> -->
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
