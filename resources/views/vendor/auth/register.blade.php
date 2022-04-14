@extends('vendor.auth.layout.app')
@section('style')
    <style type="text/css">
        .login_sinup {
            display: none;
        }
    </style>
@endsection
@section('content')
    <section class="pb-5 login_content_wraper"
             style="background-image:url( {{ asset('public/vendor/assets/images/gradiantbg.jpg')}} );">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-8 col-sm-10 mx-auto">
                    <div class="cuatomer_signup_form_wraper mt-5 mt-lg-5 ">
                        <div class="main_content_wraper">
                            <h1 class="sec_main_heading text-center mb-0">WELCOME!</h1>
                            <p class="sec_main_para text-center mb-0">Fill Up your details to Create New Account</p>
                        </div>

                        <form action="{{route('vendor.register')}}" method="post" class="pt-5">
                            @csrf
                            <div class="col-12 mb-3  signup_input_wraper">
                                <div class="input-images-8"></div>
                                <!-- <label class="img_wraper_label">
                                  <div cl ass="file_icon_wraper">
                                    <img src="assets/images/fileuploadicon.svg">
                                  </div>
                                  <p class="mb-0">Upload Your Picture </p>
                                  <input type="file" size="60" >
                                </label> -->
                            </div>

                            <div class="col-12 mb-3  signup_input_wraper">
                                <div class="input-images-9"></div>
                                <!-- <label class="img_wraper_label">
                                  <div class="file_icon_wraper">
                                    <img src="assets/images/fileuploadicon.svg">
                                  </div>
                                  <p class="mb-0">Upload Your ID</p>
                                  <input type="file" size="60" >
                                </label> -->
                            </div>
                            <div class="col-12 mb-3 signup_vendor signup_input_wraper">
                                <h4 class="mb-0">Business Info</h4>
                            </div>

                            <div class="col-12 mb-3  signup_input_wraper">
                                <input type="text" class="form-control" name="name" id="inputName"
                                       placeholder="Owner Name">
                            </div>
{{--                            <div class="col-12 mb-3 signup_input_wraper">--}}
{{--                                <input type="text" class="form-control" name="gerageName" id="inputgarageName"--}}
{{--                                       placeholder="Garage Legal Name">--}}
{{--                            </div>--}}
{{--                            <div class="col-12 mb-3 signup_input_wraper">--}}
{{--                                <select class="form-select" name="service" aria-label="Type of Service">--}}
{{--                                    <option selected>Business Category</option>--}}
{{--                                    <option value="1">2019</option>--}}
{{--                                    <option value="2">2020</option>--}}
{{--                                    <option value="3">2021</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="email" name="email" class="form-control" id="inputEmail"
                                       placeholder="Email">
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="text" name="country" class="form-control" id="inpuCountry"
                                       placeholder="Country">
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="text" name="city" class="form-control" id="inputNumber" placeholder="City">
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="text" name="post_box" class="form-control" id="inputNumber"
                                       placeholder="P/O Box">
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="text" name="phone" class="form-control" id="inputNumber"
                                       placeholder="Telephone No.">
                            </div>
                            <div class="col-12 mb-3  signup_input_wraper">
                                <div class="input-images-10"></div>
                                <!-- <label class="img_wraper_label">
                                  <div class="file_icon_wraper">
                                    <img src="assets/images/fileuploadicon.svg">
                                  </div>
                                  <p class="mb-0">Upload Your Trade License and ID </p>
                                  <input type="file" size="60" >
                                </label>  -->
                            </div>
{{--                            <div class="col-12 mb-3 signup_vendor signup_input_wraper">--}}
{{--                                <h4 class="mb-0">Legal Info</h4>--}}
{{--                            </div>--}}
{{--                            <div class="col-12 mb-3 signup_input_wraper">--}}
{{--                                <input type="text" class="form-control" name="License_number"--}}
{{--                                       placeholder="Trading License No.">--}}
{{--                            </div>--}}
{{--                            <div class="col-12 mb-3 signup_input_wraper">--}}
{{--                                <input type="text" class="form-control" name="detail" placeholder="VAT Details">--}}
{{--                            </div>--}}
{{--                            <div class="col-12 mb-3 signup_vendor signup_input_wraper">--}}
{{--                                <h4 class="mb-0">Billing Info</h4>--}}
{{--                            </div>--}}
                            <div class="col-12 mb-3 signup_input_wraper">
                                <div class="row">
{{--                                    <div class="col-6  ">--}}
{{--                                        <select class="form-select" name="service_Area" aria-label="Type of Service">--}}
{{--                                            <option selected>Area</option>--}}
{{--                                            <option value="1">2019</option>--}}
{{--                                            <option value="2">2020</option>--}}
{{--                                            <option value="3">2021</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-6 ">--}}
{{--                                        <select class="form-select" name="service_city" aria-label="Type of Service">--}}
{{--                                            <option selected>City</option>--}}
{{--                                            <option value="1">2019</option>--}}
{{--                                            <option value="2">2020</option>--}}
{{--                                            <option value="3">2021</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}

                                </div>
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="text" class="form-control" name="address" placeholder="Address">
                            </div>
{{--                            <div class="col-12 mb-3 signup_vendor signup_input_wraper">--}}
{{--                                <h4 class="mb-0">Add Number For Appointment</h4>--}}
{{--                            </div>--}}
{{--                            <div class="col-12 mb-3 signup_input_wraper">--}}
{{--                                <input type="text" class="form-control" name="phone_number"--}}
{{--                                       placeholder="Telephone No.">--}}
{{--                            </div>--}}
                            <div class="col-12 mb-3 signup_vendor signup_input_wraper">
                                <h4 class="mb-0">Password</h4>
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="password" class="form-control" name="password" id="inputNumber"
                                       placeholder="Password">
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="password" class="form-control" id="inputNumber"
                                       placeholder="Confirm Password">
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <div class="d-grid gap-2 mt-3 mb-4">
                                    <button class="btn btn-secondary block get_appointment" type="submit">REGISTER YOUR
                                        BUSINESS
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h4 class="my-4 text-center login_link_heading">Already have an account ?<a
                            href="{{route('vendor.login')}}"> Login</a>
                    </h4>
                </div>
            </div>
        </div>
    </section>
@endsection
