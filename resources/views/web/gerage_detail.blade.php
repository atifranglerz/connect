@extends('web.layout.app')
@section('content')
<?php $category = \App\Models\GarageCategory::where('garage_id',$garage->id)->pluck('category_id');
      $category_name = \App\Models\Category::whereIn('id',$category)->get();

?>
<section class="banner_section">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active " aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2" ></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item Stor_detai_item active">
                <div class="preferd_vendors_star"><img src="{{asset('public/assets/images/preferdicon.svg')}}"></div>
                <img src="{{asset('public/assets/images/repair2.jpg')}}" class="d-block w-100" alt="banner image">
                <div class="carousel-caption d-none d-md-block">
                </div>
            </div>
            <div class="carousel-item Stor_detai_item ">

                <img src="{{asset('public/assets/images/repair2.jpg')}}" class="d-block w-100" alt="banner image">
                <div class="carousel-caption d-none d-md-block">
                </div>
            </div>

            <div class="carousel-item Stor_detai_item ">
                <div class="preferd_vendors_star"><img src="{{asset('public/assets/images/preferdicon.svg')}}"></div>
                <img src="{{asset('public/assets/images/repair2.jpg')}}" class="d-block w-100" alt="banner image">
                <div class="carousel-caption d-none d-md-block">
                </div>
            </div>
            <div class="carousel-item Stor_detai_item ">

                <img src="{{asset('public/assets/images/repair2.jpg')}}" class="d-block w-100" alt="banner image">
                <div class="carousel-caption d-none d-md-block">
                </div>
            </div>
        </div>
    </div>
</section>
<section class=" store_brances d-flex justify-content-center align-items-center">
    <div class="container-lg container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-3 col-6">
                <h4 class="store_addres">{{ucfirst($garage->garage_name)}}</h4>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-3 col-6">
                <h4 class="store_addres">{{ucfirst($garage->city)}}, {{ucfirst($garage->country)}}</h4>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-3 col-6">
                <h4 class="store_addres">{{$garage->phone}}</h4>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-3 col-6">
                <h4 class="store_addres">
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
                    ({{round($overAllRatings)}})</h4>
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
                <h3 class="mb-0 ms-2 ">{{$catname->name}}</h3>
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
                    <h3 class=" text-center mb-5">OVERVIEW</h3>
                    <p>{!! $garage->description !!}</p>
                    <br>

                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="over_view_part timing_hours">
                    <h3 class=" text-center mb-5">OPENING HOURS</h3>
                    <?php $g_timing = \App\Models\GarageTiming::where('garage_id',$garage->id)->get(); ?>
                    @foreach($g_timing as $timing)
                    <div class="timing_container">
                        <p class="time_for_opning mb-0">{{ucfirst($timing->day)}}</p>
                        <p class="time_for_opning mb-1">@if($timing->closed == 0) Closed @else{{$timing->from}} - {{$timing->to}}@endif</p>
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
        <div class="row g-4 mt-3">
            <div class="col-lg-8 col-md-6 col-sm-6">
                <div class="over_view_part">
                    <h3 class=" text-center mb-5">CONTACT VENDOR</h3>
                    @if(session()->has('alert-success'))
                        <div class="alert alert-success">
                            {{ session()->get('alert-success') }}
                        </div>
                    @endif
                    <form class="row g-3" method="post" action="{{ route('contact-vendor') }}">
                        @csrf
                        <input type="hidden" name="garage_id" value="{{$garage->id}}">
                        <div class="col-md-12 col-lg-6">
                            <input type="text" class="form-control" name="car_model" id="inputCarModel" placeholder="Car Model" required>
                        </div>
                        <div class="col-md-12 col-lg-6">
                            <input type="text" class="form-control" name="car_make" id="inputCarMake" placeholder="Car Make" required>
                        </div>
                        <div class="col-md-12 col-lg-6">
                            <select id="inputService" name="category" class="form-select" required>
                                <option selected disabled value="">Type of Service</option>
                                @foreach($services as $service)
                                <option value="{{$service->name}}">{{$service->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 col-lg-6">
                            <input type="text" name="customer_name" class="form-control" id="inputCustomerName" placeholder="Customer Name" required>
                        </div>
                        <div class="col-md-12 col-lg-6">
                            <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email ID" required>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="contact_no" class="form-control" id="inputContactNo" placeholder="Contact No." required>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <textarea class="form-control" name="detail" placeholder="Add more in details" id="" style="height: 108px" required></textarea>
                            <!-- <label for="floatingTextarea2">Comments</label> -->
                        </div>
                        <div class="d-grid gap-2 mt-3">
                            <button class="w-100 btn btn-primary get_appointment heart text-center" type="submit">QUOTE REQUEST
                            </button>
                        </div>

                    </form>
                </div>

            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 ">
                <div class="over_view_part timing_hours">
                    <h3 class=" text-center mb-5">REVIEWS</h3>
                    <div class="owl-carousel carousel_se_01_carousel owl-theme">
                        @if(count($user_review) >0)
                        @foreach($user_review as $review)
                        <div class="item">
                            <p class="text-center reviews">"{{$review->review}}"</p>
                            <p class="testimonail_person_name text-center mb-1 reviews">{{getUserNameById($review->user_id)}}</p>
                            <p class="testimonail_person_rating text-center reviews"><span>{{$review->rating}}</span></p>
                        </div>
                        @endforeach
                        @else
                        <div class="item">
                            <p class="text-center reviews">"Suzuki repairs are best in town. They did everything best at affordable rates and speedily. Thumbs up!"</p>
                            <p class="testimonail_person_name text-center mb-1 reviews">Hassan Ali</p>
                            <p class="testimonail_person_rating text-center reviews"><span>5.0</span></p>
                        </div>
                       @endif

                    </div>
                </div>
                <div class="d-grid gap-2 mt-3">

                    @if(auth()->check())
                        @if(session()->has('alert-garage-success'))
                            <div class="alert alert-success">
                                {{ session()->get('alert-garage-success') }}
                            </div>
                        @endif
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
                       @if($user_wishlist) PREFFERED GARAGE <img src="{{asset('public/vendor/assets/images/heart-icon.svg')}}"> @else ADD TO PREFFERED GARAGE <img src="{{asset('public/vendor/assets/images/hearticoc.svg')}}"> @endif
                    </button>
                    </form>
                    @else
                        <button class="w-100 btn btn-primary get_appointment heart" type="button">ADD TO PREFFERED GARAGE
                            @if($user_wishlist) PREFFERED GARAGE <img src="{{asset('public/vendor/assets/images/heart-icon.svg')}}"> @else ADD TO PREFFERED GARAGE <img src="{{asset('public/vendor/assets/images/hearticoc.svg')}}"> @endif
                        </button>
                    @endif
                </div>
                <div class="d-grid gap-2 mt-3">
                    <button class="w-100 btn btn-primary get_appointment heart" type="button">CONTACT VIA MESSAGE
                        <img src="{{asset('public/vendor/assets/images/messageicon.svg')}}">
                    </button>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="over_view_part timing_hours mape_wraper mt-4">
                    <h3 class=" text-center mb-5">LOCATION</h3>
                    <div class="responsive-map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2822.7806761080233!2d-93.29138368446431!3d44.96844997909819!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x52b32b6ee2c87c91%3A0xc20dff2748d2bd92!2sWalker+Art+Center!5e0!3m2!1sen!2sus!4v1514524647889" height="550" frameborder="0" style="border:0" allowfullscreen>
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
