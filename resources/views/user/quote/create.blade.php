@extends('user.layout.app')
@section('content')
<section class="pb-5 login_content_wraper" style="background-image:url(public/assets/images/gradiantbg.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="main_content_wraper dashboard mt-1 mt-lg-5 mt-md-5">
                    <h4 class="sec_main_heading text-center mb-3">{{__('msg.REQUEST QUOTE')}}</h4>
                    <!-- <p class="sec_main_para text-center">See what's happening on your profile</p> -->
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col-lg-8 col-md-11  mx-auto">
                <div class="bid_form_wraper">
                    <div class="row">
                        <div class="col-lg-8 mx-auto px-5 px-lg-1 ">
                            <ul class="nav nav-tabs " id="myTab" role="tablist">
                                <li class="nav-item nav_item_li" role="presentation">
                                    <button class="nav-link active tab_btns" id="home-tab" data-bs-toggle="tab"
                                        data-bs-target="#home" type="button" role="tab" aria-controls="home"
                                        aria-selected="true"></button>
                                </li>
                                <li class="nav-item nav_item_li" role="presentation">
                                    <button class="nav-link tab_btns" id="profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#profile" type="button" role="tab" aria-controls="profile"
                                        aria-selected="false"></button>
                                </li>
                                <li class="nav-item nav_item_li d-none" role="presentation">
                                    <button class="nav-link tab_btns" id="inspection-report-link" data-bs-toggle="tab"
                                        data-bs-target="#inspectionReport" type="button" role="tab"
                                        aria-controls="inspectionReport" aria-selected="false"></button>
                                </li>
                                <li class="nav-item nav_item_li" role="presentation">
                                    <button class="nav-link tab_btns " id="fourth-tab" data-bs-toggle="tab"
                                        data-bs-target="#fourthtab" type="button" role="tab" aria-controls="contact"
                                        aria-selected="false"></button>
                                </li>
                            </ul>
                            <div class="col-lg-9 mx-auto">
                                <p class=" request_quote_heading">{{__('msg.CAR INFORMATION')}}</p>
                            </div>
                        </div>
                        <form enctype="multipart/form-data" method="post" action="{{ route('user.quotestore') }}"
                            class="needs-validation" novalidate>
                            @csrf
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active form-step form-step-active" id="home"
                                    role="tabpanel" aria-labelledby="home-tab">
                                    <div class="row g-lg-3 g-2">
                                        <div class="col-12">
                                            <select name="looking_for" class="form-select form-control" id="lookingFor">
                                                <option value=""></option>
                                                <option value="I have Inspection Report & Looking for the Quotations"
                                                    @if(old('looking_for')=='I have Inspection Report & Looking for the Quotations'
                                                    ) selected @endif>{{__("msg.I have Inspection Report & Looking for the Quotation")}}</option>
                                                <option
                                                    value="I don't know the Problem and Requesting for the Inspection"
                                                    @if(old('looking_for')=="I don't know the Problem and Requesting for the Inspection"
                                                    ) selected @endif>{{__("msg.I don't know the Problem and Requesting for the Inspection")}}</option>
                                                <option
                                                    value="I know about what i'm looking for and requesting for the Quotations"
                                                    @if(old('looking_for')=="I know about what i'm looking for and requesting for the Quotations"
                                                    ) selected @endif>{{__("msg.I know about what i'm looking for and requesting for the Quotation")}}</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <input type="text" class="form-control" name="model"
                                                value="{{old('model')}}" placeholder="{{__('msg.Model')}} ({{__('msg.Required')}})" aria-label="Car Milage">
                                            @error('model')
                                            <div class="text-danger p-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <select class="form-select form-control company-name-field"
                                                name="company_id" aria-label="Type of Service">
                                                <option value=""></option>
                                                @foreach($company as $data)
                                                <option value="{{$data->id }}" @if(old('company_id')==$data->id)
                                                    selected @endif>{{$data->company }}</option>
                                                @endforeach
                                            </select>
                                            @error('company_id')
                                            <div class="text-danger p-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <input type="text" class="form-control" value="{{old('registration_no')}}"
                                                name="registration_no" placeholder="{{__('msg.Registration No.')}} ({{__('msg.Required')}})"
                                                aria-label="Car Milage">
                                            @error('registration_no')
                                            <div class="text-danger p-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <input type="text" class="form-control" value="{{old('Chasis_no')}}"
                                                name="Chasis_no" placeholder="{{__('msg.Chasis No.')}} ({{__('msg.Required')}})" aria-label="Car Milage">
                                            @error('Chasis_no')
                                            <div class="text-danger p-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <input type="text" class="form-control" name="color"
                                                value="{{old('color')}}" placeholder="{{__('msg.Color')}} ({{__('msg.Required')}})" aria-label="Car Milage">
                                            @error('color')
                                            <div class="text-danger p-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <select class="form-select form-control model-year-field"
                                                name="model_year_id" aria-label="Type of Service" required>
                                                <option value=""></option>
                                                @foreach($year as $data)
                                                <option value="{{$data->id }}" @if(old('model_year_id')==$data->id)
                                                    selected @endif>{{$data->model_year }}</option>
                                                @endforeach
                                            </select>
                                            @error('model_year_id')
                                            <div class="text-danger p-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!-- <div class="col-lg-6 col-md-6">
                                          <input type="text" class="form-control" placeholder="Timeline For Work" aria-label="Timeline For Work">
                                        </div> -->
                                        <div class="col-lg-6 col-md-6">
                                            <input type="number" class="form-control" name="mileage"
                                                value="{{old('mileage')}}" placeholder="{{__("msg.Mileage e.g 40 Km")}} ({{__('msg.Required')}})"
                                                aria-label="Car Milage" required>
                                            @error('mileage')
                                            <div class="text-danger p-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <input type="number" class="form-control" name="day" value="{{old('day')}}"
                                                placeholder="{{__('msg.Days e.g (7)')}} ({{__('msg.Required')}})" aria-label="Day" required>
                                            @error('day')
                                            <div class="text-danger p-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-12 services-dropdown-block">
                                            <select class="form-select form-control garage-services" name="category[]"
                                                multiple aria-label="Type of Service">
                                                @foreach($catagary as $data)
                                                <option value="{{$data->id }}">{{$data->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('category')
                                            <div class="text-danger p-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-12">
                                            <textarea name="description1" placeholder="{{__('msg.Add information in details')}} ({{__('msg.Optional')}})"
                                                class="form-control" rows="5">{{old('description1')}}</textarea>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="d-grid gap-2 mt-3 mb-4">
                                                <button class="btn btn-secondary block get_appointment next-tab-btn"
                                                    type="button">{{__('msg.NEXT')}}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade form-step px-lg-3" id="profile" role="tabpanel"
                                    aria-labelledby="profile-tab">
                                    <div class="row g-lg-3 g-2">
                                        <div class="col-lg-12 mb-3">
                                            <label class="mb-2 heading-color"><b>{{__('msg.Upload upto 5 images')}}<small>({{__('msg.Click the box again to upload another')}})</small></b></label>
                                            <div class="input-images">
                                                {{--input field name  car_images --}}

                                            </div>
                                            @error('car_images')
                                            <div class="text-danger p-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="d-grid gap-2 mt-3 mb-4">
                                                <button class="btn btn-secondary block get_appointment next-tab-btn"
                                                    type="button">{{__('msg.NEXT')}}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade form-step px-lg-3" id="inspectionReport" role="tabpanel"
                                    aria-labelledby="inspection-report-link">
                                    <div class="row g-lg-3 g-2">
                                        <div class="col-lg-12 mb-3">

                                            <div class="input-images-2" accept="pdf/*" data-type='Pdf'>
                                                {{--input field name files--}}
                                            </div>
                                            @error('files')
                                            <div class="text-danger p-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-12">
                                            <textarea name="description2" placeholder="{{__('msg.Special Requirements')}} ({{__('msg.Optional')}})"
                                                class="form-control" rows="5">{{old('description2')}}</textarea>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="d-grid gap-2 mt-3 mb-4">
                                                <button class="btn btn-secondary block get_appointment next-tab-btn"
                                                    type="button">{{__('msg.NEXT')}}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade form-step px-lg-3" id="fourthtab" role="tabpanel"
                                    aria-labelledby="fourth-tab">
                                    <div class="row g-lg-3 g-2">
                                        <div class="row g-2 col-lg-12 mb-3">
                                            <label class="mb-2 heading-color"><b>{{__('msg.Upload upto 5 images')}}<small>({{__('msg.Click the box again to upload another')}})</small></b></label>
                                            <div class="input-images-3"></div>
                                            {{--input field name doucment--}}
                                        </div>
                                        @error('document')
                                        <div class="text-danger p-2">{{ $message }}</div>
                                        @enderror
                                        <div class="row g-2">
                                            <div class="col-lg-6 col-md-6">
                                                <input type="text" class="form-control"
                                                    value="{{ \Illuminate\Support\Facades\Auth::user()->name }}"
                                                    name="maker_name" placeholder="Name" aria-label="Make" required>
                                                @error('name')
                                                <div class="text-danger p-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            {{--<div class="col-lg-6 col-md-6">--}}
                                            {{--<input type="text" class="form-control" name="phone" placeholder="Mobile No" aria-label="Mobile No" required>--}}
                                            {{--@error('phone')--}}
                                            {{--<div class="text-danger p-2">{{ $message }}
                                        </div>--}}
                                        {{--@enderror--}}
                                        {{--</div>--}}
                                        <div class="col-lg-6 col-md-6">
                                            {{--<input type="email" class="form-control" name="email" placeholder="Email" aria-label="Email">--}}
                                            <input type="email" name="email" class="form-control" disabled
                                                value="{{ \Illuminate\Support\Facades\Auth::user()->email }}">
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <input type="text" class="form-control" name="address"
                                                value="{{ \Illuminate\Support\Facades\Auth::user()->address }}"
                                                placeholder="{{__('msg.Address')}}" aria-label="Car Milage" required>
                                            @error('address')
                                            <div class="text-danger p-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 col-md-12 get-quotes-block">
                                            <div class="d-grid gap-2 mt-lg-3 mb-lg-4">
                                                <button class="btn btn-secondary block get_appointment" name="action"
                                                    value="all_garage" type="submit">{{__('msg.GET QUOTES FROM ALL GARAGES')}}</button>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 get-quotes-block">
                                            <div class="d-grid gap-2 mt-lg-3 mb-4">
                                                <button
                                                    class="btn text-center btn-primary get_quot block get_appointment"
                                                    name="action" value="preferred_garage" type="submit">{{__('msg.GET QUOTES FROM PREFERRED GARAGES')}}</button>
                                            </div>
                                        </div>
                                        <div class="col-12 d-none" id="requestForInspection">
                                            <div align="center" class="mt-3">
                                                <button
                                                    class="btn text-center btn-primary get_quot block get_appointment"
                                                    name="action" value="all_garage" type="submit">{{__('msg.SEND REQUEST FOR INSPECTION')}}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection
@section('script')
<script>
    toastr.options = {
        "closeButton": true,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

const nextBtns = document.querySelectorAll(".btn-secondary");
// const progress = document.getElementById("progress");
const formSteps = document.querySelectorAll(".form-step");

let formStepsNum = 0;

nextBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
        formStepsNum++;
        updateFormSteps();
    });
});


function updateFormSteps() {

    formSteps.forEach((formStep) => {
        formStep.classList.contains("form-step-active") &&
            formStep.classList.remove("form-step-active");
    });

    formSteps[formStepsNum].classList.add("form-step-active");
}

$(function() {
    $('#lookingFor').select2({
        placeholder: "{{__('msg.What are you looking for? (Required)')}}",
    });
    lookingFor();
    $('#lookingFor').on('select2:select', function() {
        lookingFor();
    });

    function lookingFor() {
        var val = $('#lookingFor').val();
        let valOne = "I have Inspection Report & Looking for the Quotations";
        let valTwo = "I don't know the Problem and Requesting for the Inspection";
        let valThree = "I know about what i'm looking for and requesting for the Quotations";
        if (val == valOne) {
            $('.services-dropdown-block').removeClass('d-none');
            $('#inspection-report-link').closest('li').removeClass('d-none');
            $('#requestForInspection').addClass('d-none');
            $('.get-quotes-block').removeClass('d-none');
        } else if (val == valTwo) {
            $('.services-dropdown-block').addClass('d-none');
            $('#inspection-report-link').closest('li').addClass('d-none');
            $('#requestForInspection').removeClass('d-none');
            $('.get-quotes-block').addClass('d-none');
        } else {
            $('#inspection-report-link').closest('li').addClass('d-none');
            $('.services-dropdown-block').removeClass('d-none');
            $('#requestForInspection').addClass('d-none');
            $('.get-quotes-block').removeClass('d-none');
        }
    }
    $('.next-tab-btn').on('click', function() {
        var val = $('#lookingFor').val();
        let valOne = "I have Inspection Report & Looking for the Quotations";
        let valTwo = "I don't know the Problem and Requesting for the Inspection";
        let valThree = "I know about what i'm looking for and requesting for the Quotations";
        if (val == valTwo || val == valThree) {
            if($('#profile').hasClass('active')) {
                setTimeout(() => {
                    $('#inspectionReport').removeClass('show active');
                }, 50);
                $('#fourthtab').addClass('show active');
            }
        }
        setTimeout(() => {
            if($('div[aria-labelledby="home-tab"]').hasClass('active')) {
                $('#home-tab').addClass('active');
            } else if ($('div[aria-labelledby="profile-tab"]').hasClass('active')) {
                $('#profile-tab').addClass('active');
            } else if ($('div[aria-labelledby="inspection-report-link"]').hasClass('active')) {
                $('#inspection-report-link').addClass('active');
            } else if ($('div[aria-labelledby="fourth-tab"]').hasClass('active')) {
                $('#fourth-tab').addClass('active');
            }
        }, 50);
    });
});
</script>
@endsection
