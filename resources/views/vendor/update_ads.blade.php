@extends('vendor.layout.app')
@section('content')
<section class="pb-5 login_content_wraper" style="background-image:url(public/assets/images/gradiantbg.jpg);">
    <div class="container" >
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="main_content_wraper dashboard mt-1 mt-lg-5 mt-md-5">
                    <h1 class="sec_main_heading text-center mb-0">EDIT YOUR AD FOR USED CAR</h1>
                    <p class="sec_main_para text-center">Edit your ad</p>
                </div>
            </div>
        </div>


        <div class="row ">
            <div class="col-lg-9 col-md-11  mx-auto">
                <div class="bid_form_wraper">
                    <div class="row">
                        <div class="col-lg-8 mx-auto px-5 px-lg-1 ">
                        </div>
                        <form>
                            <div class="row g-lg-3 g-2">
                                <div class="col-lg-6 col-md-6 mb-3">
                                    <div class="input-images">
                                    </div>
                                    <!-- <label class="img_wraper_label">
                                      <div class="file_icon_wraper">
                                        <img src="assets/images/fileuploadicon.svg">
                                      </div>
                                      <p class="mb-0">Upload Car image</p>
                                      <input type="file" size="60" >
                                    </label> -->
                                </div>
                                <div class="col-lg-6 col-md-6 mb-3">
                                    <div class="input-images-3">
                                    </div>
                                    <!-- <label class="img_wraper_label">
                                      <div class="file_icon_wraper">
                                        <img src="assets/images/fileuploadicon.svg">
                                      </div>
                                      <p class="mb-0">Upload Car image</p>
                                      <input type="file" size="60" >
                                    </label> -->
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <input type="text" class="form-control" placeholder="Model" aria-label="Model">
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <input type="text" class="form-control" placeholder="Make" aria-label="Make">
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <select class="form-select" aria-label="Type of Service">
                                        <option selected>Year</option>
                                        <option value="1">2019</option>
                                        <option value="2">2020</option>
                                        <option value="3">2021</option>
                                    </select>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <input type="text" class="form-control" placeholder="Price" aria-label="Price">
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <input type="text" class="form-control" placeholder="Color" aria-label="Color">
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <input type="text" class="form-control" placeholder="Engine" aria-label="Engine">
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <input type="text" class="form-control" placeholder="Phone No" aria-label="Price">
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <input type="text" class="form-control" placeholder="Address" aria-label="Price">
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <input type="text" class="form-control" placeholder="Car Milage" aria-label="Price">
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-floating">
                      <textarea class="form-control" placeholder="Add Repairing Details" id="floatingTextarea2" style="height: 100px">
                      </textarea>
                                    </div>
                                </div>



                                <div class="col-lg-12 col-md-12">
                                    <div class="d-grid gap-2 mt-lg-3 mb-lg-4">
                                        <button class="btn btn-secondary block get_appointment" type="button">NEXT
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
