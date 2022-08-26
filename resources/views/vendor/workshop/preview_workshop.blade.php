@extends('web.layout.app')


@section('content')
 <section class="banner_section">
 	<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
 		{{-- <div class="carousel-indicators">
 			<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active " aria-current="true" aria-label="Slide 1"></button>
 			<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2" ></button>
 			<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
 			<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
 		</div> --}}
 		<div class="carousel-inner">
 			<div class="carousel-item Stor_detai_item active">
 				<div class="preferd_vendors_star"><img src="{{asset('public/assets/images/preferdicon.svg')}}"></div>
 				<img src="{{asset($preview_garage->image)}}" class="d-block w-100" alt="banner image">
 				<div class="carousel-caption d-none d-md-block">
 				</div>
 			</div>
			<!-- <div class="carousel-item ">
				<img src="assets/images/repair2.jpg" class="d-block w-100" alt="banner image">
				<div class="carousel-caption d-none d-md-block">
				</div>
			</div>
			<div class="carousel-item">
				<div class="preferd_vendors_star"><img src="assets/images/preferdicon.svg"></div>
				<img src="assets/images/repair2.jpg" class="d-block w-100" alt="banner image">
				<div class="carousel-caption d-none d-md-block">
				</div>
			</div>
			<div class="carousel-item">
				<img src="assets/images/repair2.jpg" class="d-block w-100" alt="banner image">
				<div class="carousel-caption d-none d-md-block">
				</div>
			</div> -->
		</div>
	</div>
</section>
<section class=" store_brances d-flex justify-content-center align-items-center">
	<div class="container-lg container-fluid">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-3 col-6">
				<h4 class="store_addres mb-0">{{$preview_garage->garage_name}}</h4>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-6">
				<h4 class="store_addres mb-0">{{$preview_garage->city}},UAE</h4>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-6">
				<h4 class="store_addres mb-0">{{$preview_garage->phone}}</h4>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-3 col-6">
				<h4 class="store_addres mb-0"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i> 5.0</h4>
			</div>
		</div>
	</div>
</section>
<section class="py-3">
	<div class="container-lg container-fluid">
		<div class="main_row d-flex align-items-center justify-content-between flex-wrap">
			<div class="stor_add_show_wraper">

                @foreach($preview_garage->garageCategory as $sevice)
				<div class="stor_add_show_wraper_innr">
					<img src="{{asset($sevice->category->icon)}}">
				</div>

				<h5 class="mb-0 ms-2 ">{{$sevice->category->name}}</h5>
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
					<h5 class=" text-center mb-5">{{__('msg.OVERVIEW')}}</h5>
                    <p>{{$preview_garage->description}}</p>
{{--					<p>We service domestics and imports of every Suzuki model. If your vehicle is having problems, please bring it to us for an honest diagnosis and trustworthy quote. We are expert mechanics and have built their business on high-quality customer service.--}}
{{--					</p>--}}
{{--					<br>--}}
{{--					<p> We service domestics and imports of every Suzuki model. If your vehicle is having problems, please bring it to us for an honest diagnosis and trustworthy quote.</p>--}}

				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="over_view_part timing_hours">
					<h5 class=" text-center mb-5">{{__('msg.OPENING HOURS')}}</h5>
                    @foreach($preview_garage->garageTiming as $Timing)
					<div class="timing_container">
						<p class="time_for_opning mb-0">{{$Timing->day}}</p>
                        @if($Timing->closed==1)
						<p class="time_for_opning mb-1">{{$Timing->from}} - {{$Timing->from}}</p>
                        @else
                            <p class="time_for_opning mb-1">{{__('msg.Closed:')}}</p>
                            @endif
					</div>
                        @endforeach

				</div>
				<div class="d-grid gap-2 mt-3">
					<button class="btn btn-primary get_appointment" type="button">{{__('msg.GET BOOKING')}}
						<img src="assets/images/appoinmenticon.svg">
					</button>
				</div>
			</div>

		</div>
		<div class="row g-4 mt-3">
			<div class="col-lg-8 col-sm-6 col-md-6">
				<div class="over_view_part">
					<h5 class=" text-center mb-5">{{__('msg.CONTACT VENDOR')}}</h5>
					<form class="row g-3">
						<div class="col-md-12 col-lg-6">
							<input type="text" class="form-control" id="inputCarModel" placeholder="{{__('msg.Model')}}">
						</div>
						<div class="col-md-12 col-lg-6">
							<input type="text" class="form-control" id="inputCarMake" placeholder="{{__('msg.Car Make')}}">
						</div>
						<div class="col-md-12 col-lg-6">
							<select id="inputService" class="form-select">
								<option selected>{{__('msg.Type of Service')}}</option>
								<option>Service 1</option>
								<option>Service 2</option>
								<option>Service 3</option>
							</select>
						</div>
						<div class="col-md-12 col-lg-6">
							<input type="text" class="form-control" id="inputCustomerName" placeholder="{{__('msg.Customer Name')}}">
						</div>
						<div class="col-md-12 col-lg-6">
							<input type="email" class="form-control" id="inputEmail" placeholder="{{__('msg.Email')}}">
						</div>
						<div class="col-md-6">
							<input type="text" class="form-control" id="inputContactNo" placeholder="{{__('msg.Phone Number')}}">
						</div>
						<div class="col-md-12 col-lg-12">
							<textarea class="form-control" placeholder="{{__('msg.Add more details')}}" id="" style="height: 108px"></textarea>
							<!-- <label for="floatingTextarea2">Comments</label> -->
						</div>
						<div class="d-grid gap-2 mt-3">
							<button class="btn btn-primary get_appointment text-center" type="button">{{__('msg.QUOTE REQUEST')}}
								<!-- <img src="assets/images/appoinmenticon.svg"> -->
							</button>
						</div>

					</form>
				</div>

			</div>
			<div class="col-lg-4 col-sm-6 col-md-6 ">
				<div class="over_view_part timing_hours">
					<h5 class=" text-center mb-5">{{__('msg.reviews')}}</h5>
					<div class="owl-carousel carousel_se_01_carousel owl-theme">
						<div class="item">
							<p class="text-center reviews">{{__('msg.revies_data')}}</p>
							<p class="testimonail_person_name text-center mb-1">{{__('msg.Hassan Ali')}}</p>
							<p class="testimonail_person_rating text-center"><span>5.0</span></p>
						</div>
					</div>
				</div>
				<div class="d-grid gap-2 mt-3">
					<button class="btn btn-primary get_appointment" type="button">{{__('msg.ADD TO PREFERRED GARAGE')}}
						<img src="assets/images/hearticoc.svg">
					</button>
				</div>
				<div class="d-grid gap-2 mt-3">
					<button class="btn btn-primary get_appointment" type="button">{{__('msg.CONTACT VIA MESSAGE')}}
						<img src="assets/images/messageicon.svg">
					</button>
				</div>
			</div>

		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="over_view_part timing_hours mape_wraper mt-4">
					<h5 class=" text-center mb-5">{{__('msg.reviews')}}</h5>
					<div class="responsive-map">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2822.7806761080233!2d-93.29138368446431!3d44.96844997909819!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x52b32b6ee2c87c91%3A0xc20dff2748d2bd92!2sWalker+Art+Center!5e0!3m2!1sen!2sus!4v1514524647889" height="550" frameborder="0" style="border:0" allowfullscreen>
						</iframe>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-8 mx-auto">
				<div class="row mt-5 g-3">
					<div class="col-lg-6 col-md-6 col-sm-6">
						<a href="{{route('vendor.workshop.edit',Auth::id())}}" class="btn btn-secondary d-block d-flex justify-content-center justify-content-center w-100">{{__('msg.EDIT GARAGE')}}</a>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6">
					<a href="{{url('vendor/garage-finish')}}" class="btn btn-primary btn_anchhor d-block d-flex justify-content-center justify-content-center" >{{__('msg.FINISH GARAGE')}}</a>
				</div>
				</div>

			</div>
		</div>
	</div>
</section>
@endsection
