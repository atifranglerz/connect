@extends('web.layout.app')
@section('content')
<?php $category = \App\Models\GarageCategory::where('garage_id',$garage->id)->pluck('category_id');
      $category_name = \App\Models\Category::whereIn('id',$category)->get();
      $garage = \App\Models\Garage::find($garage->id);

use Illuminate\Support\Facades\Auth;

?>
<section class="banner_section">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <!-- <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active "
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                aria-label="Slide 4"></button>
        </div> -->
        <div class="carousel-inner">
            <div class="carousel-item Stor_detai_item active">
                <div class="preferd_vendors_star">@if($user_wishlist)<img src="{{asset('public/assets/images/preferdicon.svg')}}"> @endif</div>
                <img src="{{asset($garage->image)}}" class="d-block w-100" alt="banner image">
                <div class="carousel-caption d-none d-md-block">
                </div>
            </div>
            <!-- <div class="carousel-item Stor_detai_item ">
                <img src="{{asset('public/assets/images/repair2.jpg')}}" class="d-block w-100" alt="banner image">
                <div class="carousel-caption d-none d-md-block">
                </div>
            </div>

            <div class="carousel-item Stor_detai_item ">
                <div class="preferd_vendors_star"><img src="{{asset('public/assets/images/preferdicon.svg')}}"></div>
                <img src="{{asset($garage->image)}}" class="d-block w-100" alt="banner image">
                <div class="carousel-caption d-none d-md-block">
                </div>
            </div>
            <div class="carousel-item Stor_detai_item ">

                <img src="{{asset('public/assets/images/repair2.jpg')}}" class="d-block w-100" alt="banner image">
                <div class="carousel-caption d-none d-md-block">
                </div>
            </div> -->
        </div>
    </div>
</section>
<section class=" store_brances d-flex justify-content-center align-items-center">
    <div class="container-lg container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-3 col-6">
                <h5 class="store_addres">{{ucfirst($garage->garage_name)}}</h5>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-3 col-6">
                <h5 class="store_addres">{{ucfirst($garage->city)}}, {{ucfirst($garage->country)}}</h5>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-3 col-6">
                @if (Auth::check())
                <h5 class="store_addres">{{$garage->phone}}</h5>
                @endif
            </div>
            <div class="col-lg-3 col-md-6 col-sm-3 col-6">
                <h5 class="store_addres">
                    @if(round($overAllRatings) == '0')
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    @elseif(round($overAllRatings) == '1')
                    <i class="fa-solid fa-star" style="color:black;"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    @elseif(round($overAllRatings) == '2')
                    <i class="fa-solid fa-star" style="color:black;"></i>
                    <i class="fa-solid fa-star" style="color:black;"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    @elseif(round($overAllRatings) == '3')
                    <i class="fa-solid fa-star" style="color:black;"></i>
                    <i class="fa-solid fa-star" style="color:black;"></i>
                    <i class="fa-solid fa-star" style="color:black;"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    @elseif(round($overAllRatings) == '4')
                    <i class="fa-solid fa-star" style="color:black;"></i>
                    <i class="fa-solid fa-star" style="color:black;"></i>
                    <i class="fa-solid fa-star" style="color:black;"></i>
                    <i class="fa-solid fa-star" style="color:black;"></i>
                    <i class="fa-solid fa-star"></i>
                    @elseif(round($overAllRatings) == '5')
                    <i class="fa-solid fa-star" style="color:black;"></i>
                    <i class="fa-solid fa-star" style="color:black;"></i>
                    <i class="fa-solid fa-star" style="color:black;"></i>
                    <i class="fa-solid fa-star" style="color:black;"></i>
                    <i class="fa-solid fa-star" style="color:black;"></i>
                    @endif
                    ({{round($overAllRatings)}})
                </h5>
            </div>
        </div>
    </div>
</section>
<section class="py-3">
    <div class="container-lg container-fluid">
        <div class="main_row d-flex align-items-center justify-content-between flex-wrap">
            @foreach($category_name as $catname)
            <div class="stor_add_show_wraper">
                <div class="stor_add_show_wraper_innr">
                    <img src="{{asset($catname->icon)}}">
                </div>
                <h6 class="mb-0 ms-2 ">{{$catname->name}}</h6>
            </div>
            @endforeach
        </div>

    </div>
</section>
<section class=" py-lg-5 py-md-4 py-2">
    <div class="container-lg container-fluid">
        <div class="row g-4">
            <div class="col-lg-8 col-md-6 col-sm-6">
                <div class="over_view_part">
                    <h5 class=" text-center mb-5 heading-color">OVERVIEW</h5>
                    <p>{!! $garage->description !!}</p>
                    <br>

                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="over_view_part timing_hours">
                    <h5 class=" text-center mb-5 heading-color">OPENING HOURS</h5>
                    <?php $g_timing = \App\Models\GarageTiming::where('garage_id',$garage->id)->get(); ?>
                    @foreach($g_timing as $timing)
                    <div class="timing_container">
                        <p class="time_for_opning mb-0">{{ucfirst($timing->day)}}</p>
                        <p class="time_for_opning mb-1">@if($timing->closed == 0) Closed @else{{$timing->from}} -
                            {{$timing->to}}@endif</p>
                    </div>
                    @endforeach
                </div>
                <div class="d-grid gap-2 mt-3">
                    <button class="btn btn-primary get_appointment byCall heart" type="button">
                        <span class="d-inline-block">GET BOOKING</span>
                        <span class="d-none">{{$garage->phone}}</span>
                        <img src="{{asset('public/assets/images/appoinmenticon.svg')}}">
                    </button>
                </div>
            </div>

        </div>
        <div class="row g-4 mt-3" style="display:flex">
            <div class="col-lg-8 col-md-6 col-sm-6">
                <div class="over_view_part">
                    <h5 class=" text-center mb-5 heading-color">CONTACT VENDOR</h5>
                    @if(session()->has('alert-success'))
                    <div class="alert alert-success">
                        {{ session()->get('alert-success') }}
                    </div>
                    @endif
                    <form class="row g-3" method="post" action="{{ route('contact-vendor') }}"
                        enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf
                        <input type="hidden" name="garage_id" value="{{$garage->id}}">
                        <div class="row g-lg-3 g-2">
                            <div class="col-12">
                                <select name="looking_for" class="form-select form-control" id="lookingFor" required>
                                    <option value=""></option>
                                    <option value="I have Inspection Report & Looking for the Quotations"
                                        @if(old('looking_for')=='I have Inspection Report & Looking for the Quotations'
                                        ) selected @endif>I have Inspection Report & Looking for the
                                        Quotation</option>
                                    <option value="I don't know the Problem and Requesting for the Inspection"
                                        @if(old('looking_for')=="I don't know the Problem and Requesting for the Inspection"
                                        ) selected @endif>I don't know the Problem and Requesting for the
                                        Inspection</option>
                                    <option value="I know about what i'm looking for and requesting for the Quotations"
                                        @if(old('looking_for')=="I know about what i'm looking for and requesting for the Quotations"
                                        ) selected @endif>I know about what i'm looking for and requesting
                                        for the Quotation</option>
                                </select>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <input type="text" class="form-control" name="model" value="{{old('model')}}"
                                    placeholder="Model" aria-label="Car Milage" required>
                                @error('model')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <select class="form-select form-control company-name-field" name="company_id"
                                    aria-label="Type of Service" required>
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
                                    name="registration_no" placeholder="Registration No." aria-label="Car Milage"
                                    required>
                                @error('registration_no')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <input type="text" class="form-control" value="{{old('Chasis_no')}}" name="Chasis_no"
                                    placeholder="Chasis No." aria-label="Car Milage" required>
                                @error('Chasis_no')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <input type="text" class="form-control" name="color" value="{{old('color')}}"
                                    placeholder="Color" aria-label="Car Milage" required>
                                @error('color')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <select class="form-select form-control model-year-field" name="model_year_id"
                                    aria-label="Type of Service" required>
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
                            <div class="col-lg-6 col-md-6">
                                <input type="number" class="form-control" name="mileage" value="{{old('mileage')}}"
                                    placeholder="Milage e.g 40 Km" aria-label="Car Milage" required>
                                @error('mileage')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <input type="number" class="form-control" name="day" value="{{old('day')}}"
                                    placeholder="Days e.g (7)" aria-label="Day" required>
                                @error('day')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 services-dropdown-block">
                                <select class="form-select form-control garage-services" name="category[]" multiple
                                    aria-label="Type of Service" required>
                                    @foreach($catagary as $data)
                                    <option value="{{$data->id }}">{{$data->name}}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-12">
                                <textarea name="description1" placeholder="Add information in details"
                                    class="form-control" rows="5">{{old('description1')}}</textarea>
                            </div>
                            <div class="col-lg-12">
                                <label class="mb-2 heading-color"><b>Upload upto 5 images <small>(Click box
                                            again to upload another)</small></b></label>
                                <div class="input-imagess"></div>
                                @error('car_images')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="police-inspection-report">
                                <div class="col-lg-12 mb-3">
                                    <label class="mb-2 heading-color"><b>Upload Document <small>(Upload Upto 1
                                                PDF)</small></b></label>
                                    <div class="input-imagess-2" accept="pdf/*" data-type='Pdf'></div>
                                    @error('files')
                                    <div class="text-danger p-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <textarea name="description2" placeholder="Special Requirements"
                                        class="form-control" rows="5">{{old('description2')}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-0 g-lg-3 g-2">
                            <div>
                                <label class="mb-2 heading-color"><b>Upload upto 5 images <small>(Click box
                                            again to upload another)</small></b></label>
                                <div class="input-imagess-3"></div>
                                @error('doucment')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row g-2">

                                <div class="col-lg-6 col-md-6">
                                    <input type="text" class="form-control" @if(isset(auth()->user()->name))
                                    value="{{auth()->user()->name}}" readonly @endif name="maker_name"
                                    placeholder="Name"
                                    aria-label="Make" required>
                                    @error('maker_name')
                                    <div class="text-danger p-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <input type="email" class="form-control" @if(isset(auth()->user()->email))
                                    value="{{auth()->user()->email}}" readonly @endif name="email" placeholder="Email"
                                    aria-label="Email" required>
                                    @error('email')
                                    <div class="text-danger p-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <input type="text" class="form-control" name="address" value=""
                                        placeholder="Address" aria-label="Car Milage" required >
                                    @error('address')
                                    <div class="text-danger p-2">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <div class="d-grid gap-2 mt-3">
                            <button class="w-100 btn btn-primary get_appointment heart text-center" type="submit">QUOTE
                                REQUEST </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 ">
                <div class="over_view_part timing_hours">
                    <h5 class="text-center mb-5 heading-color">REVIEWS</h5>
                    <div class="owl-carousel carousel_se_01_carousel owl-theme">
                        @if(count($user_review) >0)
                        @foreach($user_review as $review)
                        <div class="item">
                            <p class="text-center reviews">"{{$review->review}}"</p>
                            <p class="testimonail_person_name text-center mb-1 reviews">
                                {{getUserNameById($review->user_id)}}</p>
                            <p class="testimonail_person_rating text-center reviews"><span>{{$review->rating}}</span>
                            </p>
                        </div>
                        @endforeach
                        @else
                        <div class="item">
                            <p class="text-center reviews">"Suzuki repairs are best in town. They did everything best at
                                affordable rates and speedily. Thumbs up!"</p>
                            <p class="testimonail_person_name text-center mb-1 reviews">Hassan Ali</p>
                            <p class="testimonail_person_rating text-center reviews"><span>5.0</span></p>
                        </div>
                        @endif

                    </div>
                </div>
                <div class="d-grid gap-2 mt-3">

                    @if(auth()->check())
                    <!-- @if(session()->has('alert-garage-success'))
                            <div class="alert alert-success">
                                {{ session()->get('alert-garage-success') }}
                            </div>
                        @endif -->
                    @if(session()->has('alert-error'))
                    <div class="alert alert-danger">
                        {{ session()->get('alert-error') }}
                    </div>
                    @endif
                    <form class="g-3" method="post" action="{{ route('add-to-preffered-garage') }}">
                        @csrf
                        <input type="hidden" name="user_id" value="{{auth()->id()}}">
                        <input type="hidden" name="garage_id" value="{{$garage->id}}">
                        <button class="w-100 btn btn-primary get_appointment heart" type="submit">
                            @if($user_wishlist) PREFFERED GARAGE <img
                                src="{{asset('public/vendor/assets/images/hearticoc.svg')}}"> @else ADD TO PREFFERED
                            GARAGE <img src="{{asset('public/vendor/assets/images/hearticon.svg')}}"> @endif
                        </button>
                    </form>
                    @else
                    <button class="w-100 btn btn-primary get_appointment heart" type="button">ADD TO PREFFERED GARAGE
                        @if($user_wishlist) PREFFERED GARAGE <img
                            src="{{asset('public/vendor/assets/images/hearticoc.svg')}}"> @else ADD TO PREFFERED GARAGE
                        <img src="{{asset('public/vendor/assets/images/hearticon.svg')}}"> @endif
                    </button>
                    @endif
                </div>
                <div class="d-grid gap-2 mt-3">
                    <a href="{{url('user/chat/'.$garage->vendor_id)}}" class="w-100 btn btn-primary get_appointment heart" >CONTACT VIA MESSAGE
                        <img src="{{asset('public/vendor/assets/images/messageicon.svg')}}">
                    </a>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="over_view_part timing_hours mape_wraper mt-4">
                    <h5 class="text-center mb-5 heading-color">LOCATION</h5>
                    <div class="responsive-map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2822.7806761080233!2d-93.29138368446431!3d44.96844997909819!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x52b32b6ee2c87c91%3A0xc20dff2748d2bd92!2sWalker+Art+Center!5e0!3m2!1sen!2sus!4v1514524647889"
                            height="550" frameborder="0" style="border:0" allowfullscreen>
                        </iframe>
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
$(document).ready(function() {
    <?php if(session('alert-garage-success'))
                {
            ?>
    toastr.success('{{ Session::get('alert-garage-success') }}');
    <?php
                }
            ?>
});




$(function() {
    $('#lookingFor').select2({
        placeholder: 'What are you looking for? (Required)',
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
            $('.police-inspection-report').removeClass('d-none');
            $('#requestForInspection').addClass('d-none');
            $('.get-quotes-block').removeClass('d-none');
        } else if (val == valTwo) {
            $('.services-dropdown-block').addClass('d-none');
            $('.police-inspection-report').addClass('d-none');
            $('#requestForInspection').removeClass('d-none');
            $('.get-quotes-block').addClass('d-none');
        } else {
            $('.police-inspection-report').addClass('d-none');
            $('.services-dropdown-block').removeClass('d-none');
            $('#requestForInspection').addClass('d-none');
            $('.get-quotes-block').removeClass('d-none');
        }
    }
});
</script>
@endsection
