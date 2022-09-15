@extends('user.layout.app')
@section('content')
    <section class="pb-5 login_content_wraper">
        <div class="container-lg container-fluid">
            <div class="row">
                <div class="col-xl-5 col-lg-6 col-md-9 col-sm-9 mx-auto">
                    <div class="cuatomer_signup_form_wraper mt-5">
                        <div class="main_content_wraper">
                            <h4 class="sec_main_heading text-center mb-0">{{ __('msg.edit') }}</h4>
                            <p class="sec_main_para text-center mb-0">{{ __('msg.Edit your profile details') }}</p>
                        </div>

                        <form class="pt-5" action="{{ route('user.profile.post', $profile->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="col-12 mb-3 signup_vendor signup_input_wraper">
                                <h5 class="mb-0 heading-color">{{ __('msg.Profile Picture') }}</h5>
                            </div>
                            <div class="col-12 mb-3  signup_input_wraper">
                                {{-- <div class="image-uploader-edit"></div> --}}
                                <div id="profileImage">
                                </div>
                            </div>
                            @if (Auth::user()->type == 'company')

                                <div class="col-12 mb-3 signup_vendor signup_input_wraper">
                                    <h5 class="mb-0 heading-color">{{ __('msg.Your ID') }}</h5>
                                </div>
                                <div class="col-12 mb-3  signup_input_wraper">
                                    <div id="id_card">
                                    </div>
                                </div>
                            @endif
                            <div class="col-12 mb-3 signup_vendor signup_input_wraper">
                                <h5 class="mb-0 heading">{{ __('msg.Business Info') }}</h5>
                            </div>
                            @if (Auth::user()->type == 'user')
                                <div class="col-12 mb-3  signup_input_wraper">
                                    <input type="text" class="form-control" id="inputName" name="name"
                                        placeholder="{{ __('msg.Name') }}" value="{{ $profile->name }}">
                                    @error('name')
                                        <div class="text-danger p-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            @else
                                <div class="col-12 mb-3  signup_input_wraper">
                                    <input type="text" class="form-control" name="name"
                                        value="{{ $profile->insurance->owner_name }}" id="inputName"
                                        placeholder="{{ __('msg.Owner Name') }} ({{ __('msg.Required') }})">
                                    @error('name')
                                        <div class="text-danger p-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 mb-3 signup_input_wraper">
                                    <input type="text" name="company_name" class="form-control"
                                        value="{{ $profile->name }}" id="inputgarageName"
                                        placeholder="{{ __('msg.Company Legal Name') }} ({{ __('msg.Required') }})">
                                    @error('company_name')
                                        <div class="text-danger p-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endif
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="number" class="form-control" id="inputNumber" name="phone"
                                    placeholder="{{ __('msg.Phone Number') }}" value="{{ $profile->phone }}" onkeypress="if(this.value.length==12) return false">
                                @error('phone')
                                    <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="email" disabled class="form-control" name="email" id="inputEmail"
                                    value="{{ $profile->email }}">
                                @error('email')
                                    <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="text" class="form-control" id="inputNumber" name="country"
                                    placeholder="{{ __('msg.Country') }}" value="{{ $profile->country }}" readonly>
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
                            @if (Auth::user()->type == 'user')
                                <div class="col-12 mb-3 signup_input_wraper">
                                    <select class="form-select form-control insurance-company" name="company"
                                        aria-label="company" value="">
                                        @foreach ($company as $data)
                                            <option value="{{ $data->id }}"
                                                @if (isset($profile->company[0])) @if ($profile->company[0]->name == $data->name) selected @endif
                                                @endif>{{ $data->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('garage_catagary')
                                        <div class="text-danger p-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endif

                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="number" class="form-control" id="inputNumber" name="post_box"
                                    placeholder="{{ __('msg.P/O Box') }}" value="{{ $profile->post_box }}">
                                @error('post_box')
                                    <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            @if (Auth::user()->type == 'company')
                                <div class="col-12 mb-3 signup_vendor signup_input_wraper">
                                    <h5 class="mb-0 heading">{{ __('msg.Legal Info') }}</h5>
                                </div>
                                <div class="col-12 mb-3  signup_input_wraper">
                                    {{-- <div class="image-uploader-edit"></div> --}}
                                    <div id="image_license">
                                    </div>
                                </div>
                                <div class="col-12 mb-3 signup_input_wraper">
                                    <input type="text" name="trading_license"
                                        value="{{ $profile->insurance->trading_license }}" class="form-control"
                                        placeholder="{{ __('msg.Trading License No.') }} (Required)">
                                    @error('trading_license')
                                        <div class="text-danger p-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 mb-3 signup_vendor signup_input_wraper">
                                    <h5 class="mb-0 heading">{{ __('msg.Billing Info') }}</h5>
                                </div>
                                <div class="col-12 mb-3 signup_input_wraper">
                                    <div class="row">
                                        <div class="col-6" style="padding-right: 4px">
                                            <input type="text" name="billing_area"
                                                value="{{ $profile->insurance->billing_area }}" class="form-control"
                                                placeholder="{{ __('msg.Billing Area') }} ({{ __('msg.Required') }})">
                                            @error('billing_area')
                                                <div class="text-danger p-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-6" style="padding-left: 4px">
                                            <input type="text" name="billing_city"
                                                value="{{ $profile->insurance->billing_city }}" class="form-control"
                                                placeholder="{{ __('msg.Billing City') }} ({{ __('msg.Required') }})">
                                            @error('billing_city')
                                                <div class="text-danger p-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mb-3 signup_input_wraper">
                                    <div style="position: relative">
                                        <input type="text" name="billing_address"
                                            value="{{ $profile->insurance->billing_address }}" class="form-control"
                                            placeholder="{{ __('msg.Address') }} ({{ __('msg.Required') }})"
                                            style="padding-right: 2rem">
                                        <span class="fa fa-location" aria-hidden="true"
                                            style="position: absolute;top: 10px;right: 10px"></span>
                                    </div>
                                    @error('billing_address')
                                        <div class="text-danger p-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endif
                            <div class="col-12 mb-3 signup_input_wraper">
                                <div class="d-grid gap-2 mt-3 mb-4">
                                    <button class="btn btn-secondary block get_appointment"
                                        type="submit">{{ __('msg.update your profile') }}</button>
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
        var role = '<?php echo auth()->user()->type; ?>'
        // alert(role);
        $(function() {
            let preloaded = [{
                id: 1,
                src: '{{ asset($profile->image) }}'
            }, ];
            $('#profileImage').imageUploader({
                preloaded: preloaded,
                maxFiles: 1,
            });
        });
        if (role === 'company') {
            $(function() {
                let preloaded = [{
                    id: 1,
                    src: '{{ asset($profile->insurance->id_card) }}'
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
                    src: '{{ asset($profile->insurance->image_license) }}'
                }, ];
                $('#image_license').imageUploader({
                    preloaded: preloaded,
                    imagesInputName: 'image_license',
                    maxFiles: 1,
                });
            });
        }
    </script>
@endsection
