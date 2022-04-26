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

                        <form action="{{route('vendor.register')}}"  enctype="multipart/form-data" method="post" class="pt-5">
                            @csrf
                            <div class="col-12 mb-3  signup_input_wraper">
                                <div class="input-images-8"></div>
                                 <label class="img_wraper_label">
                                  <div class="file_icon_wraper">
                                    <img src="{{asset('public/assets/images/fileuploadicon.svg')}}">
                                  </div>
                                  <p class="mb-0">Upload Your Picture </p>
                                  <input type="file" name="image" size="60" >
                                     @error('image')
                                     <div class="text-danger p-2">{{ $message }}</div>
                                     @enderror
                                </label>
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
                                <input type="text" class="form-control" name="name" id="inputName" placeholder="Owner Name">
                                @error('name')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email">
                                @error('email')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="text" name="country" class="form-control" id="inpuCountry" placeholder="Country">
                                @error('country')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="text" name="city" class="form-control" id="inputNumber" placeholder="City">
                                @error('city')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="number" name="post_box" class="form-control" id="inputNumber" placeholder="P/O Box">
                                @error('post_box')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="number" name="phone" class="form-control" id="inputNumber" placeholder="Telephone No.">
                                @error('phone')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3  signup_input_wraper">
                                <div class="input-images-10"></div>
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="text" class="form-control" name="address" placeholder="Address">
                                @error('address')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_vendor signup_input_wraper">
                                <h4 class="mb-0">Password</h4>
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="password" class="form-control" name="password" id="inputNumber" placeholder="Password">
                                @error('password')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="password" class="form-control" name="password_confirmation" id="inputNumber" placeholder="Confirm Password">
                                @error('password_confirmation')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
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
