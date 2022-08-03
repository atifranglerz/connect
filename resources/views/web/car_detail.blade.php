@extends('web.layout.app')
@section('content')
    <?php $images = explode(',', $ad->images);
    $docs = explode(',', $ad->document_file);
    ?>
    <section class="caradDetailBabnner py-5">
        <div class="container">
            <h4 class="text-center mb-4 heading-color">CAR IMAGES</h4>
            <div class="owl-carousel carousel_se_02_carousel owl-theme" id="carImages">
                @if (count($images) == 0)
                    <a href="{{ asset('public/assets/images/no-preview.png') }}">
                        <div class="item">
                            <div class="carAd_img_wraper">
                                <img src="{{ asset('public/assets/images/no-preview.png') }}">
                            </div>
                        </div>
                    </a>
                    <a href="{{ asset('public/assets/images/no-preview.png') }}">
                        <div class="item">
                            <div class="carAd_img_wraper">
                                <img src="{{ asset('public/assets/images/no-preview.png') }}">
                            </div>
                        </div>
                    </a>
                    <a href="{{ asset('public/assets/images/no-preview.png') }}">
                        <div class="item">
                            <div class="carAd_img_wraper">
                                <img src="{{ asset('public/assets/images/no-preview.png') }}">
                            </div>
                        </div>
                    </a>
                @elseif(count($images) == 1)
                    @foreach ($images as $image)
                        <a href="{{ url($image) }}">
                            <div class="item">
                                <div class="carAd_img_wraper">
                                    <img src="{{ url($image) }}">
                                </div>
                            </div>
                        </a>
                        <a href="{{ asset('public/assets/images/no-preview.png') }}">
                            <div class="item">
                                <div class="carAd_img_wraper">
                                    <img src="{{ asset('public/assets/images/no-preview.png') }}">
                                </div>
                            </div>
                        </a>
                        <a href="{{ asset('public/assets/images/no-preview.png') }}">
                            <div class="item">
                                <div class="carAd_img_wraper">
                                    <img src="{{ asset('public/assets/images/no-preview.png') }}">
                                </div>
                            </div>
                        </a>
                    @endforeach
                @elseif(count($images) == 2)
                    @foreach ($images as $image)
                        <a href="{{ asset($image) }}">
                            <div class="item">
                                <div class="carAd_img_wraper">
                                    <img src="{{ asset($image) }}">
                                </div>
                            </div>
                        </a>
                    @endforeach
                    <a href="{{ asset('public/assets/images/no-preview.png') }}">
                        <div class="item">
                            <div class="carAd_img_wraper">
                                <img src="{{ asset('public/assets/images/no-preview.png') }}">
                            </div>
                        </div>
                    </a>
                @else
                    @foreach ($images as $image)
                        <a href="{{ asset($image) }}">
                            <div class="item">
                                <div class="carAd_img_wraper">
                                    <img src="{{ asset($image) }}">
                                </div>
                            </div>
                        </a>
                    @endforeach
                @endif

            </div>
        </div>
    </section>

    <section class=" store_brances d-flex justify-content-center align-items-center">
        <div class="container-lg container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-3">
                    <h6 class="store_addres">Company: {{ getCompany($ad->company_id) }}</h6>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-3">
                    <h6 class="store_addres">Country: @if ($ad->vendor_id != null)
                            {{ getCountryByVendor($ad->vendor_id) }}@else{{ getCountryByVendor($ad->user_id) }}
                        @endif
                    </h6>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-3">
                    <h6 class="store_addres">City: {{ $ad->city }}</h6>
                    <!-- <h5 class="store_addres">
    @if ($ad->vendor_id != null)
    {{ getCityByVendor($ad->vendor_id) }}@else{{ getCityByVendor($ad->user_id) }}
    @endif
    </h5> -->
                </div>
                <div class="col-lg-3 col-md-6 col-sm-3">
                    <h6 class="store_addres">Price: {{ $ad->price }}</h6>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="over_view_part carad_data">
                        <h4 class="text-center mt-3 mb-0 heading-color">LEGAL DOCS</h4>
                    </div>
                </div>
            </div>
            <div class="owl-carousel carousel_se_02_carousel owl-theme" id="carDocs">
                @if ($docs && count($docs) == 0)
                    <a href="{{ asset('public/assets/images/no-preview.png') }}">
                        <div class="item">
                            <div class="carAd_img_wraper doc_img">
                                <img src="{{ asset('public/assets/images/no-preview.png') }}">
                            </div>
                        </div>
                    </a>
                    <a href="{{ asset('public/assets/images/no-preview.png') }}">
                        <div class="item">
                            <div class="carAd_img_wraper doc_img">
                                <img src="{{ asset('public/assets/images/no-preview.png') }}">
                            </div>
                        </div>
                    </a>
                    <a href="{{ asset('public/assets/images/no-preview.png') }}">
                        <div class="item">
                            <div class="carAd_img_wraper doc_img">
                                <img src="{{ asset('public/assets/images/no-preview.png') }}">
                            </div>
                        </div>
                    </a>
                @elseif($docs && count($docs) == 1)
                    @foreach ($docs as $doc)
                        <a href="{{ asset($doc) }}">
                            <div class="item">
                                <div class="carAd_img_wraper doc_img">
                                    <img src="{{ asset($doc) }}">
                                </div>
                            </div>
                        </a>
                        <a href="{{ asset('public/assets/images/no-preview.png') }}">
                            <div class="item">
                                <div class="carAd_img_wraper doc_img">
                                    <img src="{{ asset('public/assets/images/no-preview.png') }}">
                                </div>
                            </div>
                        </a>
                        <a href="{{ asset('public/assets/images/no-preview.png') }}">
                            <div class="item">
                                <div class="carAd_img_wraper doc_img">
                                    <img src="{{ asset('public/assets/images/no-preview.png') }}">
                                </div>
                            </div>
                        </a>
                    @endforeach
                @elseif($docs && count($docs) == 2)
                    @foreach ($docs as $doc)
                        <a href="{{ asset($doc) }}">
                            <div class="item">
                                <div class="carAd_img_wraper doc_img">
                                    <img src="{{ asset($doc) }}">
                                </div>
                            </div>
                        </a>
                    @endforeach
                    <a href="{{ asset('public/assets/images/no-preview.png') }}">
                        <div class="item">
                            <div class="carAd_img_wraper doc_img">
                                <img src="{{ asset('public/assets/images/no-preview.png') }}">
                            </div>
                        </div>
                    </a>
                @else
                    @foreach ($docs as $doc)
                        <a href="{{ asset($doc) }}">
                            <div class="item">
                                <div class="carAd_img_wraper doc_img">
                                    <img src="{{ asset($doc) }}">
                                </div>
                            </div>
                        </a>
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
                        <h4 class="text-center mt-3 mb-0 heading-color">CAR INFORMATION</h4>
                    </div>
                </div>
            </div>
            <div class="row g-4 mb-4">
                <div class="col-lg-8 col-md-6 col-sm-6">
                    <div class="over_view_part">
                        <h5 class=" text-center mb-5 heading-color">OVERVIEW</h5>
                        <p>{{ $ad->description }}</p>
                        <br>

                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="over_view_part timing_hours">
                        <h5 class=" text-center mb-5 heading-color">DETAILS</h5>
                        <div class="timing_container">
                            <p class="time_for_opning mb-0">Engine</p>
                            <p class="time_for_opning mb-1">{{ $ad->engine }}</p>
                        </div>
                        <div class="timing_container">
                            <p class="time_for_opning mb-1">Color</p>
                            <p class="time_for_opning mb-1">{{ $ad->color }}</p>
                        </div>
                        <div class="timing_container">
                            <p class="time_for_opning mb-1">Registered On</p>
                            <p class="time_for_opning mb-1">{{ $ad->modelYear->model_year }}</p>
                        </div>
                        <div class="timing_container">
                            <p class="time_for_opning mb-1">Total Mileage</p>
                            <p class="time_for_opning mb-1">{{ $ad->mileage }} Km</p>
                        </div>
                    </div>
                    <div class="d-grid gap-2 mt-3">
                        @if (auth()->guard('web')->check())
                            <a @if (isset($ad->vendor_id)) href="{{ url('user/chat/' . $ad->vendor_id) }}" @else href="#" @endif
                                class="btn btn-primary get_appointment">CONTACT VIA MESSAGE
                                <img src="{{ asset('public/assets/images/messageicon.svg') }}">
                            </a>
                        @elseif(auth()->guard('vendor')->check())
                            <a @if (isset($ad->user_id)) href="{{ url('vendor/chat/' . $ad->user_id) }}" @else href="#" @endif
                                class="btn btn-primary get_appointment">CONTACT VIA MESSAGE
                                <img src="{{ asset('public/assets/images/messageicon.svg') }}">
                            </a>
                        @else
                            <a onclick="myFunction()" class="btn btn-primary get_appointment">CONTACT VIA MESSAGE
                                <img src="{{ asset('public/assets/images/messageicon.svg') }}">
                            </a>
                        @endif
                    </div>
                </div>

            </div>

        </div>
    </section>
@endsection
@section('script')
    <script>
        $(function() {
            $('#carImages, #carDocs').lightGallery({
                thumbnail: true,
                zoom: true,
                fullScreen: true,
                counter: true,
                clone: true,
                autoplayControls: false,
                download: true,
                share: false
            });
        });

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

        function myFunction() {
            toastr.warning('Please login first');
        }
    </script>
@endsection
