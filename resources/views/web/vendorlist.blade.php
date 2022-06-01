@extends('web.layout.app')
@section('content')
    <section class="looking_for garages">
        <div class="container-lg container-fluid">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="main_content_wraper">
                        <h4 class="sec_main_heading text-center">ALL GARAGES</h4>
                        <p class="sec_main_para allgarages text-center">Search popular service providers based on their service quality</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <form class="mb-5 mt-3">

                        <div class="input-group mb-3 search_garages_wraper">
                            <input type="text" class="form-control search_garages" placeholder="Search For Your Favorite Garages" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn search" type="button" id="button-addon2">Search</button>
                            <div class="srearch_icon_wraper">
                                <img src="{{asset('public/assets/images/searchicon.')}}svg">
                            </div>

                            <div class="slide_icon_wraper">
                                <a href="" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <img src="{{asset('public/assets/images/slideicon.s')}}vg">
                                </a>

                            </div>

                        </div>
                    </form>

                </div>
            </div>
            <div class="row g-3">
                @if(count($garages) > 0)
                    @foreach($garages as $value)
                <div class="col-lg-3 col-md-4 col-sm-4">
                    <a href="{{route('gerage_detail',$value->id)}}">
                        <div class="card card_vendors shadow" >
                            <div class="car_img_wrapper all_garages">
                                <img @if($value->image && $value->image != null) src="{{asset($value->image)}}" @else src="{{ asset('public/assets/images/repair2.jpg') }}" @endif class="card-img-top" alt="Car image">
{{--                                <div class="promoted_vendors">--}}
{{--                                    <p>PREFERRED VENDOR</p>--}}
{{--                                    <i class="fa-solid fa-star"></i>--}}
{{--                                </div>--}}
                            </div>

                            <div class="card-body p-sm-2">
                                <h6 class="block-head-txt text-center">{{$value->garage_name}}</h6>
                                <h5 class="card-title text-center allgarages_card_title"><span>{{$overAllRatings}}</span></h5>
                                <div class="card_icons d-flex justify-content-center align-items-center">
                                    <div class="icon_wrpaer">
                                        <img src="{{asset('public/assets/images/iconrp.svg')}}">
                                    </div>
                                    <div class="icon_wrpaer">
                                        <img src="{{asset('public/assets/images/iconrp2.svg')}}">
                                    </div>
                                    <div class="icon_wrpaer">
                                        <img src="{{asset('public/assets/images/iconrp3.svg')}}">
                                    </div>
                                    <div class="icon_wrpaer">
                                        <img src="{{asset('public/assets/images/iconrp4.svg')}}">
                                    </div>
                                    <div class="icon_wrpaer">
                                        <img src="{{asset('public/assets/images/iconrp5.svg')}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                    @endforeach
                @else
                    Oops... Sorry no garrages found related to this category service !
                @endif

            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <!-- <div class="paginator js-paginator"></div> -->

                    <nav aria-label="..." class="d-flex align-items-center justify-content-center">
                        <ul  class="pagination">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true"><i class="fa-solid fa-chevron-left"></i></a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item " aria-current="page">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">3</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">4</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">
                                    <i class="fa-solid fa-chevron-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
    </section>
@endsection
