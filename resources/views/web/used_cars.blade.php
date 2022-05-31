@extends('web.layout.app')
@section('content')
<section class="looking_for garages">
    <div class="container-lg container-fluid">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="main_content_wraper">
                    <h4 class="sec_main_heading text-center">CAR FOR SALE</h4>
                    <p class="sec_main_para allgarages text-center">Search For Used Cars</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <form class="mb-5 mt-3">

                    <div class="input-group mb-3 search_garages_wraper">
                        <input type="text" class="form-control search_garages" placeholder="Search For Your Next Car" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn search" type="button" id="button-addon2">Search</button>
                        <div class="srearch_icon_wraper">
                            <img src="{{ asset('public/assets/images/searchicon.svg') }}">
                        </div>
                        <div class="slide_icon_wraper">
                            <a href="" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <img src="{{ asset('public/assets/images/slideicon.svg')}}">
                            </a>


                        </div>
                    </div>
                </form>

            </div>
        </div>
        <div class="row g-3">
            @if(count($ads) > 0)
                @foreach($ads as $value)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <a href="{{route('car_detail',$value->id)}}">
                    <div class="card card_vendors shadow">
                        <div class="car_img_wrapper">
                            <img src="{{ $value->images }}" class="card-img-top" alt="Car image">
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <h6 class="card-title">{{ $value->model }}</h6>
                                <!-- <h5 class="card-title">{{ modelYear($value->model_year_id)}}</h5> -->
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <h5 class="card-title price mb-0 ">Price : {{ $value->price }}</h5>
                                <h5 class="card-title location mb-0 ">{{ $value->address }}</h5>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
                @endforeach
            @else
                Oops... Sorry no used cars found !
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
