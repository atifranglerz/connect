@extends('web.layout.app')
@section('content')

    <section class="looking_for garages">
        <div class="container-lg container-fluid">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="main_content_wraper">
                        <h4 class="sec_main_heading text-center">{{ __('msg.ALL GARAGES') }}</h4>
                        <p class="sec_main_para allgarages text-center">
                            {{ __('msg.Search popular service providers based on their service quality') }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <form class="mb-5 mt-3">

                        <div class="input-group mb-3 search_garages_wraper">
                            <input type="text" class="form-control search_garages"
                                placeholder="{{ __('msg.Search For Your Favorite Garages (Type Here)') }}"
                                aria-label="Recipient's username" aria-describedby="button-addon2"
                                style="padding-right: 16px">
                            {{-- <button class="btn search" type="button" id="button-addon2">{{__('msg.SEARCH')}}</button> --}}
                            <div class="srearch_icon_wraper">
                                <img src="{{ asset('public/assets/images/searchicon.') }}svg">
                            </div>

                            {{-- <div class="slide_icon_wraper"> --}}
                            {{-- <a href="" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"> --}}
                            {{-- <img src="{{asset('public/assets/images/slideicon.s')}}vg"> --}}
                            {{-- </a> --}}

                            {{-- </div> --}}

                        </div>
                    </form>

                </div>
            </div>
            <div class="row g-3 appendGarage">
                @if (count($garages) > 0)
                    @foreach ($garages as $value)
                        <div class="col-lg-3 col-md-4 col-sm-4">
                            <a href="{{ route('gerage_detail', $value->id) }}">
                                <div class="card card_vendors shadow">
                                    <div class="car_img_wrapper all_garages">
                                        <img @if ($value->image && $value->image != null) src="{{ asset($value->image) }}" @else src="{{ asset('public/assets/images/repair2.jpg') }}" @endif
                                            class="card-img-top" alt="Car image">
                                        {{-- <div class="promoted_vendors"> --}}
                                        {{-- <p>PREFERRED VENDOR</p> --}}
                                        {{-- <i class="fa-solid fa-star"></i> --}}
                                        {{-- </div> --}}
                                    </div>

                                    <div class="card-body p-sm-2">
                                        <h6 class="block-head-txt text-center">{{ $value->garage_name }}</h6>
                                        <h5 class="card-title text-center allgarages_card_title"><span>
                                                @if (isset($overAllRatings))
                                                    ?{{ $overAllRatings }}:''
                                                @endif
                                            </span></h5>
                                        <div class="card_icons d-flex justify-content-center align-items-center">
                                            <?php $category = \App\Models\GarageCategory::where('garage_id', $value->id)->pluck('category_id');
                                            $category_name = \App\Models\Category::whereIn('id', $category)->get();
                                            $count = $category->count();
                                                if ($count > 5) {
                                                    $count = 5;
                                                }
                                            ?>
                                            @for ($i = 0; $i < $count; $i++)
                                                <div class="icon_wrpaer">
                                                    <img src="{{ asset($category_name[$i]->icon) }}">
                                                </div>
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @else
                    <p>{{ __('msg.Oops... Sorry, no garages found related to this category service!') }}</p>
                @endif

            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <nav aria-label="..." class="d-flex align-items-center justify-content-center">
                        <span class="mt-4">{!! $garages->links() !!}</span>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            var services;
            $(".search_garages").on("keyup", function() {
                var val = $('.search_garages').val();
                services = {{ $id }};
                $.ajax({
                    url: '{{ URL::to('/service-garage') }}',
                    type: 'GET',
                    data: {
                        'val': val,
                        'service': services
                    },

                    success: function(response) {
                        $(".appendGarage").empty();
                        $(".appendGarage").append(response);

                    }
                });
            });


        });
    </script>
@endsection
