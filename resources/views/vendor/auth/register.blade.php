@extends('vendor.auth.layout.app')
@section('style')
    <style type="text/css">
        .login_sinup {
            display: none;
        }
    </style>
@endsection
@section('content')

    <section class="pb-5 login_content_wraper">
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
                                @error('profile_image')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 mb-3  signup_input_wraper">
                                <div class="input-images-9"></div>
                                @error('id_card')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_vendor signup_input_wraper">
                                <h4 class="mb-0">Business Info</h4>
                            </div>

                            <div class="col-12 mb-3  signup_input_wraper">
                                <input type="text" class="form-control"  name="name" value="{{ old('name') }}" id="inputName" placeholder="Owner Name">
                                @error('name')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="text" name="garage_name" class="form-control" value="{{old('garage_name')}}" id="inputgarageName" placeholder="Garage Legal Name">
                                @error('garage_name')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <select class="form-select form-control offer-garage-services" name="garages_catagary[]" aria-label="Type of Service" multiple="multiple">
                                    @foreach($categories as $value)
                                        <option value="{{$value->name}}">{{$value->name}}</option>
                                    @endforeach
                                </select>
                                @error('garage_catagary')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="inputEmail" placeholder="Email">
                                @error('email')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <select class="form-select form-control" name="country" aria-label="Country">
                                    <option selected disabled value="">Select Country</option>
                                    @foreach($countries as $value)
                                        <option value="{{$value->asciiname}}" @if(old('country')==$value->asciiname) selected @endif>{{$value->asciiname}}</option>
                                    @endforeach
                                </select>
                                @error('country')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="text"  name="city" class="form-control" value="{{ old('city') }}" id="inputNumber" placeholder="City">
                                @error('city')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="number" name="post_box" value="{{ old('post_box') }}" class="form-control" id="inputNumber" placeholder="P/O Box">
                                @error('post_box')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="text" name="phone" value="{{ old('phone') }}" class="form-control" id="inputNumber" placeholder="Telephone No.">
                                @error('phone')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3  signup_input_wraper">
                                <div class="input-images-10"></div>
                                @error('image_license')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_vendor signup_input_wraper">
                                <h4 class="mb-0">Legal Info</h4>
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="text" name="trading_license" value="{{ old('trading_license') }}" class="form-control"  placeholder="Trading License No.">
                                @error('trading_license')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="text" name="vat" value="{{ old('vat') }}" class="form-control"  placeholder="VAT Details">
                                @error('vat')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_vendor signup_input_wraper">
                                <h4 class="mb-0">Billing Info</h4>
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <div class="row">
                                    <div class="col-6  ">
                                        {{--                                        <select class="form-select" name="billing_area" aria-label="Type of Service">--}}
                                        {{--                                            <option selected>Area</option>--}}
                                        {{--                                            <option value="1">2019</option>--}}
                                        {{--                                        </select>--}}
                                        <input type="text" name="billing_area" value="{{ old('billing_area') }}"  class="form-control" placeholder="Billing Area">
                                        @error('billing_area')
                                        <div class="text-danger p-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-6 ">
                                        <input type="text"  name="billing_city" value="{{ old('billing_city') }}"  class="form-control" placeholder="Billing City">
                                        {{--                                        <select class="form-select" name="billing_city" aria-label="Type of Service">--}}
                                        {{--                                            <option selected>City</option>--}}
                                        {{--                                            <option value="1">2019</option>--}}
                                        {{--                                        </select>--}}
                                        @error('billing_city')
                                        <div class="text-danger p-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="text" name="billing_address" value="{{ old('billing_address') }}" class="form-control"  placeholder="Address">
                            </div>
                            @error('billing_address')
                            <div class="text-danger p-2">{{ $message }}</div>
                            @enderror
                            <div class="col-12 mb-3 signup_vendor signup_input_wraper">
                                <h4 class="mb-0">Add Number For Appointment</h4>
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="text" name="appointment_number" value="{{ old('appointment_number') }}" class="form-control"  placeholder="Telephone No.">
                                @error('appointment_number')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_vendor signup_input_wraper">
                                <h4 class="mb-0">Password</h4>
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="password" name="password" value="{{ old('password') }}" class="form-control" id="inputNumber" placeholder="Password">
                                @error('password')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="password" name="conform_password" value="{{old('conform_password')}}" class="form-control" id="inputNumber" placeholder="Confirm Password">
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <div class="d-grid gap-2 mt-3 mb-4">
                                    <button class="btn btn-secondary block get_appointment" type="submit">REGISTER YOUR BUSINESS
                                    </button>
                                </div>
                            </div>
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
