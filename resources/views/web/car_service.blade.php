@extends('web.layout.app')
@section('content')
<section class="looking_for garages">
    <div class="container-lg container-fluid">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="main_content_wraper">
{{--                    <h1 class="sec_main_heading text-center">GARAGES</h1>--}}
                    <h4 class="sec_main_heading text-center">ALL SERVICES</h4>
                    <p class="sec_main_para text-center">Choose any service from the list below and find best available service providers</p>

                </div>
            </div>
        </div>
        <div class="row g-3">
            @foreach($services as $value)
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4">
                <a href="{{route('vendors-by-service',$value->id)}}">
                    <div class="img_wraper">
                        <img src="{{ $value->image }}">
                        <h6 class="img_text">{{$value->name}}</h6>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
