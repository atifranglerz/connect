@extends('web.layout.app')
@section('content')
<section class="looking_for garages">
    <div class="container-lg container-fluid">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="main_content_wraper">
                    <h1 class="sec_main_heading text-center">GARAGES</h1>
                    <p class="sec_main_para text-center">Choose any service from the list below and find best available service providers</p>

                </div>
            </div>
        </div>
        <div class="row g-3">
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4">
                <a href="{{route('gerage_detail')}}">
                    <div class="img_wraper">
                        <img src="{{asset('public/assets/images/car1.jpg')}}">
                        <h4 class="img_text">car colloision</h4>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4">
                <a href="{{route('gerage_detail')}}">
                    <div class="img_wraper">
                        <img src="{{asset('public/assets/images/car3.jpg')}}">
                        <h4 class="img_text">electrical</h4>
                    </div>
                </a>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4">
                <a href="{{route('gerage_detail')}}">
                    <div class="img_wraper">
                        <img src="{{asset('public/assets/images/car2.jpg')}}">
                        <h4 class="img_text">body repair</h4>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4">
                <a href="{{route('gerage_detail')}}">
                    <div class="img_wraper">
                        <img src="{{asset('public/assets/images/car1.jpg')}}">
                        <h4 class="img_text">mechanical</h4>
                    </div>
                </a>
            </div>


            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4">
                <a href="{{route('gerage_detail')}}">
                    <div class="img_wraper">
                        <img src="{{asset('public/assets/images/car3.jpg')}}">
                        <h4 class="img_text">electrical</h4>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4">
                <a href="{{route('gerage_detail')}}">
                    <div class="img_wraper">
                        <img src="{{asset('public/assets/images/car8.jpg')}}">
                        <h4 class="img_text">interior refurbishment</h4>
                    </div>
                </a>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4">
                <a href="{{route('gerage_detail')}}">
                    <div class="img_wraper">
                        <img src="{{asset('public/assets/images/car1.jpg')}}">
                        <h4 class="img_text">mechanical</h4>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4">
                <a href="{{route('gerage_detail')}}">
                    <div class="img_wraper">
                        <img src="{{asset('public/assets/images/car5.jpg')}}">
                        <h4 class="img_text">car detailing</h4>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4">
                <a href="{{route('gerage_detail')}}">
                    <div class="img_wraper">
                        <img src="{{asset('public/assets/images/car6.jpg')}}">
                        <h4 class="img_text">car towing</h4>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4">
                <a href="{{route('gerage_detail')}}">
                    <div class="img_wraper">
                        <img src="{{asset('public/assets/images/car5.jpg')}}">
                        <h4 class="img_text">window tinting</h4>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4">
                <a href="{{route('gerage_detail')}}">
                    <div class="img_wraper">
                        <img src="{{asset('public/assets/images/car8.jpg')}}">
                        <h4 class="img_text">interior refurbishment</h4>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4">
                <a href="{{route('gerage_detail')}}">
                    <div class="img_wraper">
                        <img src="{{asset('public/assets/images/car5.jpg')}}">
                        <h4 class="img_text">window tinting</h4>
                    </div>
                </a>
            </div>

        </div>

   -->    </div>
</section>
@endsection
