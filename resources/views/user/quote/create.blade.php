@extends('user.layout.app')
@section('content')
    <style type="text/css">
        .form-step {
            display: none;
        }
        .form-step-active {
            display: block;
        }
    </style>
<section class="pb-5 login_content_wraper" style="background-image:url(public/assets/images/gradiantbg.jpg);">
    <div class="container" >
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="main_content_wraper dashboard mt-1 mt-lg-5 mt-md-5">
                    <h1 class="sec_main_heading text-center mb-3">REQUEST QUOTE</h1>
                    <!-- <p class="sec_main_para text-center">See what's happening on your profile</p> -->
                </div>
            </div>
        </div>

        <div class="row ">
            <div class="col-lg-8 col-md-11  mx-auto">
                <div class="bid_form_wraper">
                    <div class="row">
{{--                        <div class="col-lg-8 mx-auto px-5 px-lg-1 ">--}}
{{--                            <ul class="nav nav-tabs " id="myTab" role="tablist">--}}
{{--                                <li class="nav-item nav_item_li" role="presentation">--}}
{{--                                    <button class="nav-link active tab_btns" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true"></button>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item nav_item_li" role="presentation">--}}
{{--                                    <button class="nav-link tab_btns" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false"></button>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item nav_item_li" role="presentation">--}}
{{--                                    <button class="nav-link tab_btns" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false"></button>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item nav_item_li" role="presentation">--}}
{{--                                    <button class="nav-link tab_btns " id="fourth-tab" data-bs-toggle="tab" data-bs-target="#fourthtab" type="button" role="tab" aria-controls="contact" aria-selected="false"></button>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                            <div class="col-lg-9 mx-auto">--}}
{{--                                <p class=" request_quote_heading">CAR INFORMATION</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <form enctype="multipart/form-data" method="post" action="{{ route('user.quotestore') }}">
                            @csrf
                            <div class="tab-content" id="myTabContent">
                                <div class="form-step form-step-active " id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="row g-lg-3 g-2">
                                        <div class="col-lg-6 col-md-6">
                                            <input type="text" class="form-control" name="model" placeholder="Model" aria-label="Car Milage">
                                            @error('model')
                                            <div class="text-danger p-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                                <select class="form-select" name="company_id" aria-label="Type of Service">
                                                    <option value="" selected>company</option>
                                                    @foreach($company as $data)
                                                        <option value="{{$data->id }}">{{$data->company }}</option>
                                                    @endforeach
                                                </select>
                                                @error('company_id')
                                                <div class="text-danger p-2">{{ $message }}</div>
                                                @enderror
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <select class="form-select" name="model_year_id" aria-label="Type of Service">
                                                <option value="" selected>Year</option>
                                                @foreach($year as $data)
                                                    <option value="{{$data->id }}">{{$data->model_year }}</option>
                                                @endforeach
                                            </select>
                                            @error('model_year_id')
                                            <div class="text-danger p-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <select class="form-select" name="category[]" multiple aria-label="Type of Service">
                                                <option value="" selected>Category</option>
                                                @foreach($catagary as $data)
                                                    <option value="{{$data->id }}">{{$data->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('category')
                                            <div class="text-danger p-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!-- <div class="col-lg-6 col-md-6">
                                          <input type="text" class="form-control" placeholder="Timeline For Work" aria-label="Timeline For Work">
                                        </div>
                   -->                   <div class="col-lg-6 col-md-6">
                                        <input type="text" class="form-control" name="mileage" placeholder="Car Milage" aria-label="Car Milage">
                                        @error('mileage')
                                        <div class="text-danger p-2">{{ $message }}</div>
                                        @enderror
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <input type="number" class="form-control" name="price" placeholder="Price" aria-label="Price">
                                            @error('price')
                                            <div class="text-danger p-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="d-grid gap-2 mt-3 mb-4">
                                                <button class="btn btn-secondary block get_appointment" type="button">NEXT</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-step " id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="row g-lg-3 g-2">
                                        <div class="col-lg-12 mb-3">
                                            <div class="input-images">
{{--                                                input field name  car_images --}}
                                                @error('car_images')
                                                <div class="text-danger p-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-floating">
                                                <input name="description1" class="form-control" placeholder="Add information in details" id="floatingTextarea2" style="height: 106px"></input>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="d-grid gap-2 mt-3 mb-4">
                                                <button class="btn btn-secondary block get_appointment" type="button">NEXT</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-step " id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                    <div class="row g-lg-3 g-2">
                                        <div class="col-lg-12 mb-3">
                                            <div class="input-images-2" accept="pdf/*" data-type='Pdf'>
{{--                                                input field name files--}}
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-floating">
                          <input class="form-control" name="description2" placeholder="Add information in details" id="floatingTextarea2" style="height: 106px"></input>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="d-grid gap-2 mt-3 mb-4">
                                                <button class="btn btn-secondary block get_appointment" type="button">NEXT</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-step" id="fourthtab" role="tabpanel" aria-labelledby="fourth-tab">
                                    <div class="row g-lg-3 g-2">
                                        <div class="col-lg-12 mb-3">
                                            <div class="input-images-3"></div>
{{--                                            input field name doucment--}}
                                        </div>
                                        <div class="row g-lg-3 g-2">
                                            <div class="col-lg-6 col-md-6">
                                                <input type="text" class="form-control"  name="name" placeholder="Name" aria-label="Make">
                                                @error('name')
                                                <div class="text-danger p-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <input type="text" class="form-control" name="phone" placeholder="Mobile No" aria-label="Mobile No">
                                                @error('phone')
                                                <div class="text-danger p-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6 col-md-6">
{{--                                                <input type="email" class="form-control" name="email" placeholder="Email" aria-label="Email">--}}
                                                <input type="email" name="email" class="form-control" disabled value="{{ \Illuminate\Support\Facades\Auth::user()->email }}">
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <input type="text" class="form-control" name="address" placeholder="Address" aria-label="Car Milage">
                                                @error('address')
                                                <div class="text-danger p-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="d-grid gap-2 mt-lg-3 mb-lg-4">
                                                    <button class="btn btn-secondary block get_appointment" type="submit">GET QUOTES FROM ALL GARAGES</button>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="d-grid gap-2 mt-lg-3 mb-4">
                                                    <button class="btn text-center btn-primary get_quot block get_appointment" type="button">GET QUOTES FROM PREFFERED GARAGES</button>
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
    </script>
@endsection

