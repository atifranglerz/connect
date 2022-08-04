@extends('web.layout.app')
@section('content')
    <section class="pb-5 login_content_wraper">
        <div class="container-lg container-fluid" >
            <div class="row">
                <div class="col-lg-5 col-md-8 col-sm-8 mx-auto">
                    <div class="cuatomer_signup_form_wraper mt-5 mt-lg-5 ">
                        <div class="main_content_wraper">
                            <h4 class="sec_main_heading text-center mb-0">WELCOME!</h4>
                            <p class="sec_main_para text-center mb-0">Fill Up your details to Create New Account</p>
                        </div>

                        <form  method="post" action="{{route('user.register')}}" enctype="multipart/form-data" class="pt-5">
                            @csrf
                            <div class="col-12 mb-3  signup_input_wraper">
                                <div class="input-images-signup"></div>
                                 <label class="img_wraper_label">
                                  <input type="file"  name="image" size="60" >
                                     @error('image')
                                     <div class="text-danger p-2">{{ $message }}</div>
                                     @enderror
                                </label>
                            </div>
                            <div class="col-12 mb-3  signup_input_wraper">
                                <input type="text" class="form-control"  name="name" value="{{ old('name') }}" id="inputName" placeholder="Full Name">
                                @error('name')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="number" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="Mobile Number">
                                @error('phone')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" id="inputEmail" placeholder="Email">
                                @error('email')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="text" class="form-control" name="country" value="United Arab Emirates" readonly>

                                {{-- <select class="form-select form-control" name="country" aria-label="Country">
                                    <option selected disabled value="">Select Country</option>
                                    <option value="United Arab Emirates" @if(old('country')=='United Arab Emirates') selected @endif>United Arab Emirates</option>
                                </select> --}}
                                @error('country')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <select class="form-select form-control" name="city" aria-label="City">
                                    <option selected disabled value="">Select City</option>
                                    <option value="Dubai" @if(old('city')=='Dubai') selected @endif>Dubai</option>
                                    <option value="Abu Dhabi" @if(old('city')=='Abu Dhabi') selected @endif>Abu Dhabi</option>
                                    <option value="Sharjah" @if(old('city')=='Sharjah') selected @endif>Sharjah</option>
                                    <option value="Ras Al Khaimah" @if(old('city')=='Ras Al Khaimah') selected @endif>Ras Al Khaimah</option>
                                    <option value="Ajman" @if(old('city')=='Ajman') selected @endif>Ajman</option>
                                </select>
                                @error('city')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="text" class="form-control" name="address" value="{{ old('address') }}" placeholder="Address">
                                @error('address')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="number" class="form-control"  name="post_box" value="{{ old('post_box') }}" placeholder="P/O Box">
                                @error('post_box')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <div class="position-relative d-flex align-items-center">
                                    <input id="inputPass" name="password" type="password" class="form-control" placeholder="Password">
                                    <span toggle="#inputPass" class="fa fa-fw fa-eye preview-eye-icon toggle-password"></span>
                                </div>
                                @error('password')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <div class="position-relative d-flex align-items-center">
                                    <input id="inputConPass" name="password_confirmation" type="password" class="form-control" placeholder="Confirm Password">
                                    <span toggle="#inputConPass" class="fa fa-fw fa-eye preview-eye-icon toggle-password"></span>
                                </div>
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
                    <h5 class="my-4 text-center login_link_heading">Already have an account ?<a href="{{route('user.login')}}"> Login</a>
                    </h5>
                </div>
            </div>
        </div>
    </section>
  
@endsection

