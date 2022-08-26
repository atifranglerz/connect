@extends('vendor.layout.app')
@section('content')

    <section class="pb-5 login_content_wraper">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="main_content_wraper dashboard mt-1 mt-lg-5 mt-md-5">
                        <h4 class="sec_main_heading text-center mb-0">{{__('msg.Edit Workshop')}}</h4>
                        <p class="sec_main_para text-center">{{__('msg.Set Up How Your Workshop Looks Like')}}</p>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-lg-8 col-md-11  mx-auto">
                    <div class="bid_form_wraper">
                        <div class="row">
                            <div class="col-lg-8 mx-auto px-5 px-lg-1 ">
                                <ul class="nav nav-tabs " id="myTab" role="tablist">
                                    <li class="nav-item nav_item_li vendor_creatworkoshop" role="presentation">
                                        <button class="nav-link active tab_btns" id="home-tab" data-bs-toggle="tab"
                                                data-bs-target="#home" type="button" role="tab" aria-controls="home"
                                                aria-selected="true"></button>
                                    </li>
                                    <li class="nav-item nav_item_li vendor_creatworkoshop" role="presentation">
                                        <button class="nav-link tab_btns" id="profile-tab" data-bs-toggle="tab"
                                                data-bs-target="#profile" type="button" role="tab"
                                                aria-controls="profile" aria-selected="false"></button>
                                    </li>
                                    <li class="nav-item nav_item_li vendor_creatworkoshop" role="presentation">
                                        <button class="nav-link tab_btns" id="contact-tab" data-bs-toggle="tab"
                                                data-bs-target="#contact" type="button" role="tab"
                                                aria-controls="contact" aria-selected="false"></button>
                                    </li>
                                </ul>
                                <div class="col-lg-9 mx-auto">
                                    <p class=" request_quote_heading">{{__('msg.CAR INFORMATION')}}</p>
                                </div>
                            </div>
                            <form enctype="multipart/form-data" method="post" action="{{ route('vendor.workshop.update',$garage->id ) }}">
                                @csrf
                                @method('PUT')
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active form-step form-step-active" id="home" role="tabpanel"
                                         aria-labelledby="home-tab">
                                        <div class="row g-lg-3 g-2">
                                            <div class="col-lg-6 col-md-6">
                                                <input type="text" name="garage_name" class="form-control" value="{{$garage->garage_name}}">
                                                @error('garage_name')
                                                <div class="text-danger p-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <input type="text" name="address" class="form-control" value="{{$garage->address}}">
                                                @error('address')
                                                <div class="text-danger p-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <input type="email" name="email" class="form-control" disabled value="{{ \Illuminate\Support\Facades\Auth::user()->email }}">
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <input type="text" name="phone" class="form-control" value="{{$garage->phone}}">
                                                @error('phone')
                                                <div class="text-danger p-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <input type="text" name="country" class="form-control" value="{{$garage->country}}">
                                                @error('country')
                                                <div class="text-danger p-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <input type="text" name="city" class="form-control" value="{{$garage->city}}">
                                                @error('city')
                                                <div class="text-danger p-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <input type="number" name="post_box" class="form-control" value="{{$garage->post_box}}">
                                                @error('post_box')
                                                <div class="text-danger p-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6 col-md-6">


                                                <!-- multiple name="animals" id="animals" class="filter-multi-select" -->
                                                <select class="form-select form-control offer-garage-services" name="category[]" multiple aria-label="Type of Service">
{{--                                                    @php--}}

{{--                                                        $selectedcategory=explode(',',$garage->vendor->garages_catagory);--}}
{{--                                                        $categoryCounter=count($selectedcategory);--}}
{{--                                                    @endphp--}}
                                                    @foreach($garage->garageCategory as $selectedCaategory)
                                                    @foreach($categories as $data)
                                                        <option value="{{$data->id}}" @if($data->id==$selectedCaategory->category_id) selected @endif>{{$data->name}}</option>
                                                    @endforeach
                                                    @endforeach
                                                </select>
                                                @error('category')
                                                <div class="text-danger p-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <input type="text" name="trading_no" class="form-control" value="{{$garage->trading_no}}">
                                                @error('trading_no')
                                                <div class="text-danger p-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <input type="text" name="vat" class="form-control" value="{{$garage->vat}}">
                                                @error('vat')
                                                <div class="text-danger p-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="d-grid gap-2 mt-3 mb-4">
                                                    <button class="btn btn-secondary block get_appointment next-tab-btn" type="button">{{__('msg.NEXT')}}</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="over_view_part timing_hours mape_wraper mt-4">
                                                    <h5 class="heading-color text-center mb-4">{{__('msg.Google Maps')}}</h5>
                                                    <div
                                                        class="input-group mb-3 mx-lg-5 mx-md-3 mx-1 search_garages_wraper vendor_crt_wrkshop">
                                                        <input type="text" class="form-control search_garages creat_wrk" placeholder="Search For Your Next Car" aria-label="Recipient's username" aria-describedby="button-addon2">
                                                        <button class="btn search crt_wrik" type="button" id="button-addon2">{{__('msg.SEARCH')}}</button>
                                                        <div class="srearch_icon_wraper crt_wrk_shp">
                                                            <span class="fa fa-location" aria-hidden="true"></span>
                                                            <!-- <img src="{{asset('public/assets/images/location-icon.svg')}}"> -->
                                                        </div>
                                                    </div>

                                                    <div class="responsive-map">
                                                        <iframe
                                                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2822.7806761080233!2d-93.29138368446431!3d44.96844997909819!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x52b32b6ee2c87c91%3A0xc20dff2748d2bd92!2sWalker+Art+Center!5e0!3m2!1sen!2sus!4v1514524647889" height="550" frameborder="0" style="border:0" allowfullscreen>
                                                        </iframe>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane fade form-step" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row g-lg-3 g-2">
                                            <div class="col-lg-12 mb-3">
                                                <div class="workshop-image">
                                                </div>
                                                <!-- <label class="img_wraper_label">
                                                  <div class="file_icon_wraper">
                                                    <img src="assets/images/fileuploadicon.svg">
                                                  </div>
                                                  <p class="mb-0">Upload workshop image</p>
                                                  <input type="file" size="60" >
                                                </label> -->

                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-floating">
                                                    <textarea class="form-control" name="description"
                                                               id="floatingTextarea2"
                                                              style="height: 106px">{{$garage->description}}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="d-grid gap-2 mt-3 mb-4">
                                                    <button class="btn btn-secondary block get_appointment next-tab-btn"
                                                            type="button">{{__('msg.NEXT')}}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade form-step" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                        @foreach($garage->garageTiming as $value)

                                            <div class="row mb-3 align-items-center justify-content-center">
                                                <label for="inputEmail3"
                                                       class="col-lg-2 mb-3 col-md-2 col-sm-3 col-form-label activeDaylabel">{{$value->day}}</label>
                                                <div class="col-lg-3 col-md-3 col-sm-3 mb-3 crt_wrkshop">
                                                    <input type="hidden" name="day[]" value="{{$value->day}}">
                                                    <input type="text" name="from[]" value="{{$value->from}}" class="form-control" placeholder="From :10:00Am " id="">
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-sm-3 mb-3 crt_wrkshop">
                                                    <input type="text" class="form-control" name="to[]" value="{{$value->to}}" placeholder="To :06:00Pm " id="">
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
                                                    <div
                                                        class="form-check crt_wrkshop d-flex justify-content-between align-items-center">
                                                        <label class="form-check-label" for="autoSizingCheck">{{__('msg.Closed:')}}</label>
                                                        <input class="form-check-input wrk_day_chek" name="closed[]" type="checkbox" {{ ($value->closed == "1" ? 'checked' : '') }} id="autoSizingCheck">
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                            <div class="col-lg-12">
                                                <div class="d-grid gap-2 mt-3 mb-4">
                                                 <button class="btn btn-secondary block get_appointment next-tab-btn" type="submit">{{__('msg.NEXT')}}</button>
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

        $(function() {
            let preloaded = [
                {id: 1, src:'{{asset($garage->image)}}'},
            ];
            $('.workshop-image').imageUploader({
                preloaded: preloaded,
                maxFiles:1,
            });
        });
    </script>
@endsection
