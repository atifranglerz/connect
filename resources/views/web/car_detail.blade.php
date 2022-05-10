@extends('web.layout.app')
@section('content')
    <?php $images = explode(',',$ad->images);
          $docs = explode(',',$ad->document_file);
    ?>
<section class="caradDetailBabnner py-5">
    <div class="container">
        <div class="owl-carousel carousel_se_02_carousel owl-theme">
            @if(count($images) == 0)
                <div class="item">
                    <div class="carAd_img_wraper">
                        <img src="{{ asset('public/assets/images/no-preview.png') }}">
                    </div>
                </div>
                <div class="item">
                    <div class="carAd_img_wraper">
                        <img src="{{ asset('public/assets/images/no-preview.png') }}">
                    </div>
                </div>
                <div class="item">
                    <div class="carAd_img_wraper">
                        <img src="{{ asset('public/assets/images/no-preview.png') }}">
                    </div>
                </div>
            @elseif(count($images) == 1)
            @foreach($images as $image)
            <div class="item">
                <div class="carAd_img_wraper">
                    <img src="{{ asset($image) }}">
                </div>
            </div>
            <div class="item">
                <div class="carAd_img_wraper">
                    <img src="{{ asset('public/assets/images/no-preview.png') }}">
                </div>
            </div>
            <div class="item">
                <div class="carAd_img_wraper">
                    <img src="{{ asset('public/assets/images/no-preview.png') }}">
                </div>
            </div>
            @endforeach
            @elseif(count($images) == 2)
                @foreach($images as $image)
                    <div class="item">
                        <div class="carAd_img_wraper">
                            <img src="{{ asset($image) }}">
                        </div>
                    </div>
                    <div class="item">
                        <div class="carAd_img_wraper">
                            <img src="{{ asset('public/assets/images/no-preview.png') }}">
                        </div>
                    </div>
                @endforeach
            @else
                @foreach($images as $image)
                    <div class="item">
                        <div class="carAd_img_wraper">
                            <img src="{{ asset($image) }}">
                        </div>
                    </div>
                    <div class="item">
                        <div class="carAd_img_wraper">
                            <img src="{{ asset('public/assets/images/no-preview.png') }}">
                        </div>
                    </div>
                @endforeach
            @endif

        </div>
    </div>
</section>

<section class=" store_brances d-flex justify-content-center align-items-center">
    <div class="container-lg container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-3">
                <h4 class="store_addres">{{getCompany($ad->company_id)}}</h4>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-3">
                <h4 class="store_addres">{{getCountryByVendor($ad->vendor_id)}}</h4>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-3">
                <h4 class="store_addres">{{getCityByVendor($ad->vendor_id)}}</h4>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-3">
                <h4 class="store_addres">Price : {{$ad->price}}</h4>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="over_view_part carad_data">
                    <h3 class=" text-center mb-5">LEGAL DOCS</h3>
                </div>
            </div>
        </div>
        <div class="owl-carousel carousel_se_02_carousel owl-theme">
            @if($docs && count($docs) == 0)
                <div class="item">
                    <div class="carAd_img_wraper doc_img">
                        <img src="{{ asset('public/assets/images/no-preview.png') }}">
                    </div>
                </div>
                <div class="item">
                    <div class="carAd_img_wraper doc_img">
                        <img src="{{ asset('public/assets/images/no-preview.png') }}">
                    </div>
                </div>
                <div class="item">
                    <div class="carAd_img_wraper doc_img">
                        <img src="{{ asset('public/assets/images/no-preview.png') }}">
                    </div>
                </div>
            @elseif($docs && count($docs) == 1)
                @foreach($docs as $doc)
                    <div class="item">
                        <div class="carAd_img_wraper doc_img">
                            <img src="{{ asset($doc) }}">
                        </div>
                    </div>
                    <div class="item">
                        <div class="carAd_img_wraper doc_img">
                            <img src="{{ asset('public/assets/images/no-preview.png') }}">
                        </div>
                    </div>
                    <div class="item">
                        <div class="carAd_img_wraper doc_img">
                            <img src="{{ asset('public/assets/images/no-preview.png') }}">
                        </div>
                    </div>
                @endforeach
            @elseif($docs && count($docs) ==2)
                @foreach($docs as $doc)
                    <div class="item">
                        <div class="carAd_img_wraper doc_img">
                            <img src="{{ asset($doc) }}">
                        </div>
                    </div>
                    <div class="item">
                        <div class="carAd_img_wraper doc_img">
                            <img src="{{ asset('public/assets/images/no-preview.png') }}">
                        </div>
                    </div>
                @endforeach
            @else
                @foreach($docs as $doc)
                    <div class="item">
                        <div class="carAd_img_wraper doc_img">
                            <img src="{{ asset($doc) }}">
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

    </div>
</section>
<section class="">
    <div class="container-lg container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="over_view_part carad_data">
                    <h3 class=" text-center mb-5">CAR INFORMATION</h3>
                </div>
            </div>
        </div>
        <div class="row g-4 mb-4">
            <div class="col-lg-8 col-md-6 col-sm-6">
                <div class="over_view_part">
                    <h3 class=" text-center mb-5">OVERVIEW</h3>
                    <p>{{$ad->description}}</p>
                    <br>

                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="over_view_part timing_hours">
                    <h3 class=" text-center mb-5">DETAILS</h3>
                    <div class="timing_container">
                        <p class="time_for_opning mb-0">Engine</p>
                        <p class="time_for_opning mb-1">{{$ad->engine}}</p>
                    </div>
                    <div class="timing_container">
                        <p class="time_for_opning mb-1">Color</p>
                        <p class="time_for_opning mb-1">{{$ad->color}}</p>
                    </div>
                    <div class="timing_container">
                        <p class="time_for_opning mb-1">Registered On</p>
                        <p class="time_for_opning mb-1">{{$ad->modelYear->model_year}}</p>
                    </div>
                    <div class="timing_container">
                        <p class="time_for_opning mb-1">Total Mileage</p>
                        <p class="time_for_opning mb-1">{{$ad->mileage}} Km</p>
                    </div>
                </div>
                <div class="d-grid gap-2 mt-3">
                    <button class="btn btn-primary get_appointment" type="button">CONTACT VIA MESSAGE
                        <img src="{{ asset('public/assets/images/messageicon.svg') }}">
                    </button>
                </div>
            </div>

        </div>

    </div>
</section>
@endsection
