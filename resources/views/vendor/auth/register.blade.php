@extends('web.layout.app')
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
                            <h4 class="sec_main_heading text-center mb-0">{{__('msg.WELCOME!')}}</h4>
                            <p class="sec_main_para text-center mb-0">{{__('msg.Fill Up your details to Create New Account')}}</p>
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
                                <h5 class="mb-0 heading">{{__('msg.Business Info')}}</h5>
                            </div>

                            <div class="col-12 mb-3  signup_input_wraper">
                                <input type="text" class="form-control"  name="name" value="{{ old('name') }}" id="inputName" placeholder="{{__('msg.Owner Name')}} ({{__('msg.Required')}})">
                                @error('name')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="text" name="garage_name" class="form-control" value="{{old('garage_name')}}" id="inputgarageName" placeholder="{{__('msg.Garage Legal Name')}} ({{__('msg.Required')}})">
                                @error('garage_name')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <select class="form-select form-control offer-garage-services" name="garages_catagary[]" aria-label="Type of Service" multiple="multiple">
                                    @foreach($categories as $value)
                                        <option value="{{$value->name}}" {{ (collect(old('garages_catagary'))->contains($value->name)) ? 'selected':'' }}>{{$value->name}}</option>
                                    @endforeach
                                </select>
                                @error('garage_catagary')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="inputEmail" placeholder="{{__('msg.Email')}} ({{__('msg.Required')}})">
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
                                    <option selected disabled value="">{{__('msg.Select City')}}</option>
                                    <option value="Dubai" @if(old('city')=='Dubai') selected @endif>{{__('msg.Dubai')}}</option>
                                    <option value="Abu Dhabi" @if(old('city')=='Abu Dhabi') selected @endif>{{__('msg.Abu Dhabi')}}</option>
                                    <option value="Sharjah" @if(old('city')=='Sharjah') selected @endif>{{__('msg.Sharjah')}}</option>
                                    <option value="Ras Al Khaimah" @if(old('city')=='Ras Al Khaimah') selected @endif>{{__('msg.Ras Al Khaimah')}}</option>
                                    <option value="Ajman" @if(old('city')=='Ajman') selected @endif>{{__('msg.Ajman')}}</option>
                                </select>
                                @error('city')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <select class="form-select form-control insurance-company" name="company[]" aria-label="company" multiple="multiple">
                                    @foreach ($company as $data)
                                        <option value="{{$data->id}}" {{ (collect(old('company'))->contains($data->id)) ? 'selected':'' }}>{{$data->name}}</option>
                                    @endforeach
                                </select>
                                @error('garage_catagary')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="number" name="post_box" value="{{ old('post_box') }}" class="form-control" placeholder="{{__('msg.P/O Box')}} ({{__('msg.Required')}})">
                                @error('post_box')
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
                                <h5 class="mb-0 heading">{{__('msg.Legal Info')}}</h5>
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="text" name="trading_license" value="{{ old('trading_license') }}" class="form-control"  placeholder="{{__('msg.Trading License No.')}} ({{__('msg.Required')}})">
                                @error('trading_license')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="text" name="vat" value="{{ old('vat') }}" class="form-control"  placeholder="{{__('msg.VAT Details')}} ({{__('msg.Required')}})">
                                @error('vat')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_vendor signup_input_wraper">
                                <h5 class="mb-0 heading">{{__('msg.Billing Info')}}</h5>
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <div class="row">
                                    <div class="col-6" style="padding-right: 4px">
                                        {{--                                        <select class="form-select" name="billing_area" aria-label="Type of Service">--}}
                                        {{--                                            <option selected>Area</option>--}}
                                        {{--                                            <option value="1">2019</option>--}}
                                        {{--                                        </select>--}}
                                        <input type="text" name="billing_area" value="{{ old('billing_area') }}"  class="form-control" placeholder="{{__('msg.Billing Area')}} ({{__('msg.Required')}})">
                                        @error('billing_area')
                                        <div class="text-danger p-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-6" style="padding-left: 4px">
                                        <input type="text"  name="billing_city" value="{{ old('billing_city') }}"  class="form-control" placeholder="{{__('msg.Billing City')}} ({{__('msg.Required')}})">
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
                                <div style="position: relative">
                                    <input type="text" name="billing_address" value="{{ old('billing_address') }}" class="form-control"  placeholder="{{__('msg.Address')}} ({{__('msg.Required')}})" style="padding-right: 2rem">
                                    <span class="fa fa-location" aria-hidden="true" style="position: absolute;top: 10px;right: 10px"></span>
                                </div>
                                @error('billing_address')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 mb-3 signup_vendor signup_input_wraper">
                                <h5 class="mb-0 heading">{{__('msg.Add Number For Appointment')}}</h5>
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="text" name="phone" value="{{ old('phone') }}" class="form-control" placeholder="97142110800 ({{__('msg.Required')}})" onkeypress="if(this.value.length==11) return false">
                                @error('phone')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            {{-- <div class="col-12 mb-3 signup_input_wraper">
                                <input type="text" name="appointment_number" value="{{ old('appointment_number') }}" class="form-control"  placeholder="{{__('msg.Telephone No.')}}">
                                @error('appointment_number')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div> --}}
                            <div class="col-12 mb-3 signup_vendor signup_input_wraper">
                                <h5 class="mb-0 heading">{{__('msg.password')}}</h5>
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <div class="position-relative d-flex align-items-center">
                                    <input id="inputPass" name="password" type="password" value="{{ old('password') }}" class="form-control" placeholder="{{__('msg.password')}} ({{__('msg.Required')}})" autocomplete="off">
                                    <span toggle="#inputPass" class="fa fa-fw fa-eye preview-eye-icon toggle-password"></span>
                                </div>
                                @error('password')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <div class="position-relative d-flex align-items-center">
                                    <input id="inputConPass" name="conform_password" value="{{old('conform_password')}}" type="password" class="form-control" placeholder="{{__('msg.Confirm Password')}} ({{__('msg.Required')}})">
                                    <span toggle="#inputConPass" class="fa fa-fw fa-eye preview-eye-icon toggle-password"></span>
                                </div>
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <div class="d-grid gap-2 mt-3 mb-4">
                                    <button class="btn btn-secondary block get_appointment" type="submit">{{__('msg.Register your business')}}
                                    </button>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h5 class="my-4 text-center login_link_heading">{{__('msg.Already have an account?')}}<a
                            href="{{route('vendor.login')}}"> {{__('msg.Login')}}</a>
                    </h5>
                </div>
            </div>
        </div>
    </section>
@endsection
