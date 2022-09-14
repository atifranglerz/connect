@extends('vendor.layout.app')
@section('content')
    <section class="pb-5 login_content_wraper" style="background-image:url(public/assets/images/gradiantbg.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-9 mx-auto">
                    <div class="cuatomer_signup_form_wraper mt-5">
                        <div class="main_content_wraper">
                            <h4 class="sec_main_heading text-center mb-0">{{ __('msg.edit') }}</h4>
                            <p class="sec_main_para text-center mb-0">{{ __('msg.Edit your profile details') }}</p>
                        </div>
                        <form action="{{ route('vendor.profile.update', $profile->id) }}" method="post"
                            enctype="multipart/form-data" class="pt-5">
                            @csrf
                            @method('put')
                            <div class="col-12 mb-3 signup_vendor signup_input_wraper">
                                <h5 class="mb-0 heading-color">{{ __('msg.Profile Picture') }}</h5>
                            </div>
                            <div class="col-12 mb-3  signup_input_wraper">
                                <div id="profileImage">
                                </div>
                            </div>
                            {{-- <div class="col-12 mb-3  signup_input_wraper">
                                <div class="input-images-9"></div>
                                @error('id_card')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div> --}}
                            <div class="col-12 mb-3 signup_vendor signup_input_wraper">
                                <h5 class="mb-0 heading-color">{{ __('msg.Your ID') }}</h5>
                            </div>
                            <div class="col-12 mb-3  signup_input_wraper">
                                <div id="id_card">
                                </div>
                            </div>

                            
                            <div class="col-12 mb-3 signup_vendor signup_input_wraper">
                                <h5 class="mb-0 heading-color">{{ __('msg.Business Info') }}</h5>
                            </div>

                            <div class="col-12 mb-3  signup_input_wraper">
                                <input type="text" name="name" value="{{ $profile->name }}" class="form-control"
                                    id="inputName" placeholder="Owner Name">
                                @error('name')
                                    <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="email" name="email" value="{{ $profile->email }}"class="form-control"
                                    id="inputEmail" placeholder="Email">
                                @error('email')
                                    <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="text" name="country" value="{{ $profile->country }}" class="form-control"
                                    id="inpuCountry" placeholder="{{ __('msg.Country') }}" readonly>
                                @error('country')
                                    <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <select class="form-select form-control" name="city" aria-label="City">
                                    <option value="Dubai" @if ($profile->city == 'Dubai') selected @endif>
                                        {{ __('msg.Dubai') }}</option>
                                    <option value="Abu Dhabi" @if ($profile->city == 'Abu Dhabi') selected @endif>
                                        {{ __('msg.Abu Dhabi') }}</option>
                                    <option value="Sharjah" @if ($profile->city == 'Sharjah') selected @endif>
                                        {{ __('msg.Sharjah') }}</option>
                                    <option value="Ras Al Khaimah" @if ($profile->city == 'Ras Al Khaimah') selected @endif>
                                        {{ __('msg.Ras Al Khaimah') }}</option>
                                    <option value="Ajman" @if ($profile->city == 'Ajman') selected @endif>
                                        {{ __('msg.Ajman') }}</option>
                                </select>
                                @error('city')
                                    <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <select class="form-select form-control insurance-company" name="company[]"
                                    aria-label="company" value="" multiple="multiple">
                                    @foreach ($company as $data)
                                        <option value="{{ $data->id }}"
                                            @if (isset($profile->company[0])) @foreach ($profile->company as $company)
                                            @if ($company->name == $data->name)
                                            selected @endif
                                            @endforeach
                                    @endif>

                                    {{ $data->name }}</option>
                                    @endforeach
                                </select>
                                @error('garage_catagary')
                                    <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="number" name="postbox" value="{{ $profile->post_box }}" class="form-control"
                                    id="inputNumber" placeholder="{{ __('msg.P/O Box') }}">
                                @error('postbox')
                                    <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3  signup_input_wraper">
                                <div id="image_license">
                                </div>
                            </div>
                            <div class="col-12 mb-3 signup_vendor signup_input_wraper">
                                <h5 class="mb-0 heading">{{__('msg.Legal Info')}}</h5>
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="text" name="trading_license"  value="{{ $profile->trading_license }}" class="form-control"  placeholder="{{__('msg.Trading License No.')}} ({{__('msg.Required')}})">
                                @error('trading_license')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="text" name="vat"  class="form-control" value="{{ $profile->vat }}" placeholder="{{__('msg.VAT Details')}} ({{__('msg.Required')}})">
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
                                        <input type="text" name="billing_area"  value="{{ $profile->billing_area }}" class="form-control" placeholder="{{__('msg.Billing Area')}} ({{__('msg.Required')}})">
                                        @error('billing_area')
                                        <div class="text-danger p-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-6" style="padding-left: 4px">
                                        <input type="text"  name="billing_city"  value="{{ $profile->billing_city }}" class="form-control" placeholder="{{__('msg.Billing City')}} ({{__('msg.Required')}})">
                                        @error('billing_city')
                                        <div class="text-danger p-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <div style="position: relative">
                                    <input type="text" name="billing_address"  value="{{ $profile->billing_address }}" class="form-control"  placeholder="{{__('msg.Address')}} ({{__('msg.Required')}})" style="padding-right: 2rem">
                                    <span class="fa fa-location" aria-hidden="true" style="position: absolute;top: 10px;right: 10px"></span>
                                </div>
                                @error('billing_address')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_vendor signup_input_wraper">
                                <h5 class="mb-0 heading">{{__('msg.Number For Appointment')}}</h5>
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="text" name="appointment_number"  value="{{ $profile->appointment_number }}" class="form-control" placeholder="97142110800 ({{__('msg.Required')}})" onkeypress="if(this.value.length==11) return false">
                                @error('appointment_number')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <div class="d-grid gap-2 mt-3 mb-4">
                                    <button class="btn btn-secondary block get_appointment"
                                        type="submit">{{ __('msg.update_your_business_profile') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        $(function() {
            let preloaded = [{
                id: 1,
                src: '{{ asset($profile->image) }}'
            }, ];
            $('#profileImage').imageUploader({
                preloaded: preloaded,
                imagesInputName: 'profile_images',
                maxFiles: 1,
            });
        });
        $(function() {
            let preloaded = [{
                id: 1,
                src: '{{ asset($profile->id_card) }}'
            }, ];
            $('#id_card').imageUploader({
                preloaded: preloaded,
                imagesInputName: 'id_card',
                maxFiles: 1,
            });
        });
        $(function() {
            let preloaded = [{
                id: 1,
                src: '{{ asset($profile->image_license) }}'
            }, ];
            $('#image_license').imageUploader({
                preloaded: preloaded,
                imagesInputName: 'image_license',
                maxFiles: 1,
            });
        });
    </script>
@endsection
