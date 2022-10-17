@extends('web.layout.app')
@section('content')
    <section class="pb-5 login_content_wraper">
        <div class="container-lg container-fluid" >
            <div class="row">
                <div class="col-lg-5 col-md-8 col-sm-8 mx-auto">
                    <div class="cuatomer_signup_form_wraper mt-5 mt-lg-5 ">
                        <div class="main_content_wraper">
                            <h4 class="sec_main_heading text-center mb-0">{{__('msg.WELCOME!')}}</h4>
                            <p class="sec_main_para text-center mb-0">{{__('msg.Fill Up your details to Create New Account')}}</p>
                        </div>

                        <form name="signUpForm" method="post" action="{{route('user.companyRegister')}}" enctype="multipart/form-data" class="pt-4">
                            @csrf
                            <div class="col-12 mb-3 signup_input_wraper form-group">
                                <div class="input-images-8"></div>
                                @error('profile_image')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper form-group">
                                <div class="input-images-9"></div>
                                @error('id_card')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_vendor signup_input_wraper">
                                <h5 class="mb-0 heading">{{__('msg.Business Info')}}</h5>
                            </div>

                            <div class="col-12 mb-3  signup_input_wraper form-group">
                                <input type="text" class="form-control"  name="name" value="{{ old('name') }}" id="inputName" placeholder="{{__('msg.Owner Name')}} ({{__('msg.Required')}})" required>
                                @error('name')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="text" name="company_name" class="form-control" value="{{old('company_name')}}" id="inputgarageName" placeholder="{{__('msg.Company Legal Name')}} ({{__('msg.Required')}})" required>
                                @error('company_name')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" id="inputEmail" placeholder="{{__('msg.Email')}} ({{__('msg.Required')}})" required>
                                @error('email')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                                <div id="email-validation" class="d-none" style="color:red">This email  has been already taken!</div>
                            </div>
                            <div class="col-12 mb-3  signup_input_wraper form-group">
                                <div class="input-images-10"></div>
                                @error('image_license')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_vendor signup_input_wraper">
                                <h5 class="mb-0 heading">{{__('msg.Legal Info')}}</h5>
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="text" name="trading_license" value="{{ old('trading_license') }}" class="form-control"  placeholder="{{__('msg.Trading License No.')}} (Required)" required>
                                @error('trading_license')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_vendor signup_input_wraper">
                                <h5 class="mb-0 heading">{{__('msg.Address')}}</h5>
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <div class="row">
                                    <div class="col-6 mb-3" style="padding-right: 4px">
                                        <input type="number" class="form-control"  name="post_box" value="{{ old('post_box') }}" placeholder="{{__('msg.P/O Box')}} ({{__('msg.Required')}})" required>
                                        @error('post_box')
                                        <div class="text-danger p-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-6 mb-3" style="padding-left: 4px">
                                        <input type="text" name="billing_area" value="{{ old('billing_area') }}"  class="form-control" placeholder="{{__('msg.Billing Area')}} ({{__('msg.Required')}})" required>
                                        @error('billing_area')
                                        <div class="text-danger p-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-6 mb-3" style="padding-right: 4px">
                                        <input type="text" class="form-control" name="country" value="United Arab Emirates" readonly>
                                        @error('country')
                                        <div class="text-danger p-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-6 mb-3" style="padding-left: 4px">
                                        <select class="form-select form-control" name="city" aria-label="City" required>
                                            <option selected disabled value="">{{__('msg.Select City')}} ({{__('msg.Required')}})</option>
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
                                    <div class="col-12">
                                        <input type="text"  name="billing_city" value="{{ old('billing_city') }}"  class="form-control" placeholder="{{__('msg.Billing City')}} ({{__('msg.Required')}})" required>
                                        @error('billing_city')
                                        <div class="text-danger p-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <div style="position: relative">
                                    <input type="text" name="billing_address" value="{{ old('billing_address') }}" class="form-control"  placeholder="{{__('msg.Address')}} ({{__('msg.Required')}})" required style="padding-right: 2rem">
                                    <span class="fa fa-location" aria-hidden="true" style="position: absolute;top: 10px;right: 10px"></span>
                                </div>
                                @error('billing_address')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_vendor signup_input_wraper">
                                <h5 class="mb-0 heading">{{__('msg.Contact Numbers')}}</h5>
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="text" name="phone" value="{{ old('phone') }}" class="form-control" placeholder="+971 XXXXXXXX ({{__('msg.Required')}})" required>
                                @error('phone')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="number" class="form-control line-dubai d-none" name="landlineDu" placeholder="04 XXXXXXXX ({{ __('msg.Optional') }})">
                                <input type="number" class="form-control line-dhabi d-none" name="landlineAD" placeholder="02 XXXXXXXX ({{ __('msg.Optional') }})">
                                <input type="number" class="form-control line-sharjah d-none" name="landlineSh" placeholder="06 XXXXXXXX ({{ __('msg.Optional') }})">
                                <input type="number" class="form-control line-khaimah d-none" name="landlineRAK" placeholder="07 XXXXXXXX ({{ __('msg.Optional') }})">
                                <input type="number" class="form-control line-ajman d-none" name="landlineAj" placeholder="06 XXXXXXXX ({{ __('msg.Optional') }})">
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <div class="position-relative d-flex align-items-center pass-holder">
                                    <input id="inputPass" name="password" type="password" value="{{ old('password') }}" class="form-control pass-input" placeholder="{{__('msg.password')}} ({{__('msg.Required')}})" required>
                                    <span toggle="#inputPass" class="fa fa-fw fa-eye preview-eye-icon toggle-password"></span>
                                </div>
                                @error('password')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <div class="position-relative d-flex align-items-center pass-holder">
                                    <input id="inputConPass" name="conform_password" value="{{old('conform_password')}}" type="password" class="form-control pass-confirm-input" placeholder="{{__('msg.Confirm Password')}} ({{__('msg.Required')}})" required>
                                    <span toggle="#inputConPass" class="fa fa-fw fa-eye preview-eye-icon toggle-password"></span>
                                </div>
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
                    <h5 class="my-4 text-center login_link_heading">Already have an account ?<a href="{{route('user.companyLogin')}}"> Login</a>
                    </h5>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script>
    $(function() {
        $('select[name="city"]').on('change', function() {
            if($(this).val()=="Dubai") {
                $('.line-dubai').removeClass('d-none');
                $('.line-dhabi').addClass('d-none');
                $('.line-sharjah').addClass('d-none');
                $('.line-khaimah').addClass('d-none');
                $('.line-ajman').addClass('d-none');
            } else if ($(this).val()=="Abu Dhabi") {
                $('.line-dhabi').removeClass('d-none');
                $('.line-dubai').addClass('d-none');
                $('.line-sharjah').addClass('d-none');
                $('.line-khaimah').addClass('d-none');
                $('.line-ajman').addClass('d-none');
            } else if ($(this).val()=="Sharjah") {
                $('.line-sharjah').removeClass('d-none');
                $('.line-dubai').addClass('d-none');
                $('.line-dhabi').addClass('d-none');
                $('.line-khaimah').addClass('d-none');
                $('.line-ajman').addClass('d-none');
            } else if ($(this).val()=="Ras Al Khaimah") {
                $('.line-khaimah').removeClass('d-none');
                $('.line-dubai').addClass('d-none');
                $('.line-dhabi').addClass('d-none');
                $('.line-sharjah').addClass('d-none');
                $('.line-ajman').addClass('d-none');
            } else if ($(this).val()=="Ajman") {
                $('.line-ajman').removeClass('d-none');
                $('.line-dubai').addClass('d-none');
                $('.line-dhabi').addClass('d-none');
                $('.line-sharjah').addClass('d-none');
                $('.line-khaimah').addClass('d-none');
            }
        });

        // Initialize form validation on the registration form.
        // It has the name attribute "registration"
        jQuery.validator.addMethod("phoneUE", function(phone_number, element) {
            phone_number = phone_number.replace(/\s+/g, "");
            return this.optional(element) || phone_number.length > 9 &&
            phone_number.match(/^(?:\+?971-?)?(?:50|51|52|55|56|2|3|4|6|7|9)\d{7}$/);
        }, "Please specify a valid phone number");

        jQuery.validator.addMethod("landlineDubai", function(phone_number, element) {
            phone_number = phone_number.replace(/\s+/g, "");
            return this.optional(element) || phone_number.length > 9 &&
                phone_number.match(/^(?:\+?04-?)?(?:50|51|52|55|56|2|3|4|6|7|9)\d{7}$/);
        }, "Please specify a valid landline number");

        jQuery.validator.addMethod("landlineAbuDhabi", function(phone_number, element) {
            phone_number = phone_number.replace(/\s+/g, "");
            return this.optional(element) || phone_number.length > 9 &&
                phone_number.match(/^(?:\+?02-?)?(?:50|51|52|55|56|2|3|4|6|7|9)\d{7}$/);
        }, "Please specify a valid landline number");

        jQuery.validator.addMethod("landlineSharjah", function(phone_number, element) {
            phone_number = phone_number.replace(/\s+/g, "");
            return this.optional(element) || phone_number.length > 9 &&
                phone_number.match(/^(?:\+?06-?)?(?:50|51|52|55|56|2|3|4|6|7|9)\d{7}$/);
        }, "Please specify a valid landline number");

        jQuery.validator.addMethod("landlineRasAlKhaimah", function(phone_number, element) {
            phone_number = phone_number.replace(/\s+/g, "");
            return this.optional(element) || phone_number.length > 9 &&
                phone_number.match(/^(?:\+?07-?)?(?:50|51|52|55|56|2|3|4|6|7|9)\d{7}$/);
        }, "Please specify a valid landline number");

        jQuery.validator.addMethod("landlineAjman", function(phone_number, element) {
            phone_number = phone_number.replace(/\s+/g, "");
            return this.optional(element) || phone_number.length > 9 &&
                phone_number.match(/^(?:\+?06-?)?(?:50|51|52|55|56|2|3|4|6|7|9)\d{7}$/);
        }, "Please specify a valid landline number");

        var validator = $("form[name='signUpForm']").validate({
            ignore: [],
            onfocusout: function (element) {
                var $element = $(element);
                if ($element.hasClass('select2-search__field')) {
                    $element2 = $element.closest('.form-group').find('select');
                    if (!$element2.prop('required') && $element2.val() == '') {
                        $element.removeClass('is-valid');
                    } else {
                        this.element($element2)
                    }
                } else if (!$element.prop('required') && ($element.val() == '' || $element.val() == null)) {
                    $element.removeClass('is-valid');
                } else if ($element.attr('type')=="email") {
                    // alert('s');
                    var email = element.value;
                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        headers: {
                            'X-CSRF-Token': '{{ csrf_token() }}',
                        },
                        url: "{{ route('user.user-email-validation') }}",
                        data: {
                            'email': email
                        },
                        success: function(response) {
                            // console.log(response.data);
                            if(response.data == "exists") {
                                $('#email-validation').removeClass('d-none');
                                if(!$element.hasClass('d-none')) {
                                    $element.removeClass('is-valid').addClass('is-invalid error');
                                }
                            } else {
                                $('#email-validation').addClass('d-none');
                                if($element.hasClass('d-none')) {
                                    $element.removeClass('is-invalid error').addClass('is-valid');
                                }
                            }
                        }
                    });
                } else {
                    this.element(element)
                }
            },
            onkeyup: function (element) {
                var $element = $(element);
                if ($element.hasClass('select2-search__field')) {
                    $element.closest('.form-group').find('select').valid();
                } else {
                    $element.valid();
                }
            },
            rules: {
                id_card: "required",
                image_license: "required",
                name: "required",
                garage_name: "required",
                email: "required",
                city: "required",
                post_box: "required",
                trading_license: "required",
                billing_address: "required",
                billing_city: "required",
                address: "required",
                phone: {
                    phoneUE: true,
                    required: true
                },
                landlineDu: {
                    landlineDubai: true,
                    required: false
                },
                landlineAD: {
                    landlineAbuDhabi: true,
                    required: false
                },
                landlineSh: {
                    landlineSharjah: true,
                    required: false
                },
                landlineRAK: {
                    landlineRasAlKhaimah: true,
                    required: false
                },
                landlineAj: {
                    landlineAjman: true,
                    required: false
                },
                password: {
                    required: true,
                    minlength: 8
                },
                conform_password: {
                    required: true,
                    minlength: 8,
                    equalTo: '#inputPass'
                },
            },
            messages: {
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 8 characters long"
                },
                conform_password: {
                    required: "Please enter the confirm password.",
                    minlength: "Password do no match",
                    equalTo: "Please enter the same password as above"
                },
            },
            errorClass: 'is-invalid error',
            validClass: 'is-valid',
            highlight: function (element, errorClass, validClass) {
                var elem = $(element);
                if (elem.hasClass("select2-hidden-accessible")) {
                    elem.closest('.form-group').find('input').addClass(errorClass);
                    elem.closest('.form-group').find('input').removeClass(validClass);
                    elem.closest('.form-group').find('span.select2-selection').addClass(errorClass);
                    elem.closest('.form-group').find('span.select2-selection').removeClass(validClass);
                } else {
                    elem.addClass(errorClass);
                }
            },
            unhighlight: function (element, errorClass, validClass) {
                var elem = $(element);
                if (elem.hasClass("select2-hidden-accessible")) {
                    elem.closest('.form-group').find('input').addClass(validClass);
                    elem.closest('.form-group').find('input').removeClass(errorClass);
                    elem.closest('.form-group').find('span.select2-selection').removeClass(errorClass);
                    elem.closest('.form-group').find('span.select2-selection').addClass(validClass);
                } else {
                    elem.removeClass(errorClass);
                    elem.addClass(validClass);
                }
            },
            errorPlacement: function (error, element) {
                var elem = $(element);
                console.log(elem);
                if (elem.hasClass("select2-hidden-accessible")) {
                    var element2 = elem.closest('.form-group').find('.select2-container');
                    error.insertAfter(element2);
                } else if (elem.closest('.form-group').find('div').hasClass('image-uploader')) {
                    var element2 = elem.closest('.form-group').find('.image-uploader');
                    error.insertAfter(element2);
                } else if (elem.hasClass('inteltel')) {
                    var element2 = elem.closest('.iti');
                    error.insertAfter(element2);
                } else if (elem.hasClass('pass-input')) {
                    var element2 = elem.closest('.pass-holder');
                    error.insertAfter(element2);
                } else if (elem.hasClass('pass-confirm-input')) {
                    var element2 = elem.closest('.pass-holder');
                    error.insertAfter(element2);
                } else {
                    error.insertAfter(element);
                }
            }
        });

        setInterval(() => {
            /*Upload Your ID*/
            if(!$('input[name="id_card"]').val()=="") {
                $('label[for="id_card"]').empty().hide();
                $('input[name="id_card"]').removeClass('is-invalid error').addClass('is-valid');
            } else {
                $('label[for="id_card"]').text("This field is required.").show();
                $('input[name="id_card"]').removeClass('is-valid').addClass('is-invalid error');
            }
            if ($('.uploaded .uploaded-image').length==0) {
                $('label[for="id_card"]').text("This field is required.").show();
                $('input[name="id_card"]').removeClass('is-valid').addClass('is-invalid error');
                $('input[name="id_card"]').val('');
            }
            /*Upload Your ID*/

            /*Trade License and ID*/
            if(!$('input[name="image_license"]').val()=="") {
                $('label[for="image_license"]').empty().hide();
                $('input[name="image_license"]').removeClass('is-invalid error').addClass('is-valid');
            } else {
                $('label[for="image_license"]').text("This field is required.").show();
                $('input[name="image_license"]').removeClass('is-valid').addClass('is-invalid error');
            }
            if ($('input[name="image_license"]').closest('.image-uploader').find('.uploaded .uploaded-image').length==0) {
                $('label[for="image_license"]').text("This field is required.").show();
                $('input[name="image_license"]').removeClass('is-valid').addClass('is-invalid error');
                $('input[name="image_license"]').val('');
            }
            /*Trade License and ID*/
        }, 500);
    });

</script>
@endsection
