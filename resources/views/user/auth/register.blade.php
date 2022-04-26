@extends('web.layout.app')
@section('content')
    <section class="pb-5 login_content_wraper" style="background-image:url(public/assets/images/gradiantbg.jpg);">
        <div class="container-lg container-fluid" >
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-8 mx-auto">
                    <div class="cuatomer_signup_form_wraper mt-5 mt-lg-5 ">
                        <div class="main_content_wraper">
                            <h1 class="sec_main_heading text-center mb-0">WELCOME!</h1>
                            <p class="sec_main_para text-center mb-0">Fill Up your details to Create New Account</p>
                        </div>

                        <form  method="post" action="{{route('user.register')}}" enctype="multipart/form-data" class="pt-5">
                            @csrf
                            <div class="col-12 mb-3  signup_input_wraper">
                                <div class="input-images-signup"></div>
                                 <label class="img_wraper_label">
                                  <div class="file_icon_wraper">
                                    <img src="{{asset('public/assets/images/fileuploadicon.svg')}}">
                                  </div>
                                  <p class="mb-0">Upload Your Picture To Update</p>
                                  <input type="file"  name="image" size="60" >
                                     @error('image')
                                     <div class="text-danger p-2">{{ $message }}</div>
                                     @enderror
                                </label>
                            </div>
                            <div class="col-12 mb-3  signup_input_wraper">
                                <input type="text" class="form-control"  name="name" id="inputName" placeholder="Full Name">
                                @error('name')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="number" class="form-control" name="phone" id="inputNumber" placeholder="Mobile Number">
                                @error('phone')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Email">
                                @error('email')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="text" class="form-control" name="country" id="inputNumber" placeholder="Country">
                                @error('country')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="text" class="form-control" name="city" id="inputNumber" placeholder="City">
                                @error('city')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="text" class="form-control" name="address" id="inputNumber" placeholder="Address">
                                @error('address')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="number" class="form-control"  name="post_box" id="inputNumber" placeholder="P/O Box">
                                @error('post_box')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="password" class="form-control"  name="password" id="inputNumber" placeholder="Password">
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
                                    <button class="btn btn-secondary block get_appointment" type="submit">SIGN UP
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h4 class="my-4 text-center login_link_heading">Already have an account ?<a href="{{route('user.login')}}"> Login</a>
                    </h4>
                </div>
            </div>
        </div>
    </section>
@endsection

