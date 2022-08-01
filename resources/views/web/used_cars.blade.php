@extends('web.layout.app')
@section('content')
<style>
.select2-container {
    z-index: 5555;
    width: 100% !important;
}
</style>
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
            <div class="mb-5 mt-3">
                <div class="input-group mb-3 search_garages_wraper">
                    <input type="text" class="form-control search_garages" placeholder="Search For Your Next Car"
                        aria-label="Recipient's username" aria-describedby="button-addon2">
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
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">Top Searches</h6>
                        <a type="button" class="heading-color" data-bs-dismiss="modal"><span
                                class="fa fa-times"></span></a>
                    </div>
                    <div class="modal-body">
                        <div class="garage_name">
                            <form action="{{url('search-used-car')}}" method="post" id="submitform" class="my-2">
                                @csrf
                                <div class="row">

                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="col-12 mb-2 signup_vendor ">
                                            <h6 class="mb-0 heading">Price</h6>
                                        </div>
                                        <input type="text" name="priceFrom" class="form-control" placeholder="From"
                                            aria-label="Model">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 mt-sm-0 mt-2">
                                        <div class="col-12 mb-2 signup_vendor ">
                                            <h6 class="mb-0 heading">Price</h6>
                                        </div>
                                        <input type="text" name="priceTo" class="form-control" placeholder="To"
                                            aria-label="Model">
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6 mt-2">
                                        <div class="col-12 mb-2 signup_vendor ">
                                            <h6 class="mb-0 heading">Model From</h6>
                                        </div>
                                        <select class="form-select form-control model-year-field" name="modelFrom"
                                            aria-label="Type of Service">
                                            <option value=""></option>
                                            @foreach($year as $data)
                                            <option value="{{$data->model_year}}">{{$data->model_year }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 mt-2">
                                        <div class="col-12 mb-2 signup_vendor ">
                                            <h6 class="mb-0 heading">Model To</h6>
                                        </div>
                                        <select class="form-select form-control model-year-field" name="modelTo"
                                            aria-label="Type of Service">
                                            <option value=""></option>
                                            @foreach($year as $data)
                                            <option value="{{$data->model_year }}">{{$data->model_year }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 mt-2">
                                        <div class="col-12 mb-2 signup_vendor ">
                                            <h6 class="mb-0 heading">Car Maker</h6>
                                        </div>
                                        <select class="form-select form-control company-name-field" name="company_id"
                                            aria-label="Type of Service">
                                            <option value=""></option>
                                            @foreach($company as $data)
                                            <option value="{{$data->company }}">{{$data->company }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 mt-2">
                                        <div class="col-12 mb-2 signup_vendor ">
                                            <h6 class="mb-0 heading">Milage</h6>
                                        </div>
                                        <input type="text" name="milage" class="form-control"
                                            placeholder="Milage e.g 40 Km" aria-label="Model">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 mt-2">
                                        <div class="col-12 mb-2 signup_vendor ">
                                            <h6 class="mb-0 heading">Country</h6>
                                        </div>
                                        <select class="form-select form-control" name="country" aria-label="Country"
                                            disabled>
                                            <option disabled value="">Select Country</option>
                                            <option value="United Arab Emirates" selected>United Arab Emirates</option>
                                        </select>
                                        @error('country')
                                        <div class="text-danger p-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 mt-2">
                                        <div class="col-12 mb-2 signup_vendor ">
                                            <h6 class="mb-0 heading">City</h6>
                                        </div>
                                        <select class="form-select form-control" name="city" aria-label="City">
                                            <option selected disabled value="">Select City</option>
                                            <option value="Dubai" @if(old('city')=='Dubai' ) selected @endif>Dubai
                                            </option>
                                            <option value="Abu Dhabi" @if(old('city')=='Abu Dhabi' ) selected @endif>Abu
                                                Dhabi</option>
                                            <option value="Sharjah" @if(old('city')=='Sharjah' ) selected @endif>Sharjah
                                            </option>
                                            <option value="Ras Al Khaimah" @if(old('city')=='Ras Al Khaimah' ) selected
                                                @endif>Ras Al Khaimah</option>
                                            <option value="Ajman" @if(old('city')=='Ajman' ) selected @endif>Ajman
                                            </option>
                                        </select>
                                        @error('city')
                                        <div class="text-danger p-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary flterClass" type="submit">Search</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row g-3">
            @if(count($ads) > 0)
            @foreach($ads as $value)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <a href="{{route('car_detail',$value->id)}}">
                    <div class="card card_vendors shadow">
                        <div class="car_img_wrapper">
                            <?php
                                $img1=Explode(",",$value->images);
                            ?>
                            <img src="{{ asset($img1[0]) }}" class="card-img-top" alt="Car image">
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <h6 class="card-title">{{ $value->model }}</h6>
                                <!-- <h5 class="card-title">{{ modelYear($value->model_year_id)}}</h5> -->
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <h5 class="card-title price mb-0 ">Price : {{ $value->price }}</h5>
                                <h5 class="card-title location mb-0 ">{{ $value->city }}</h5>
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
                    <ul class="pagination">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true"><i
                                    class="fa-solid fa-chevron-left"></i></a>
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