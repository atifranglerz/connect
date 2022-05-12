@extends('user.layout.app')
@section('content')
<section class="pb-5 login_content_wraper">
    <div class="container-lg container-fluid" >
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="main_content_wraper dashboard mt-1 mt-lg-5 mt-md-5">
                    <h1 class="sec_main_heading text-center mb-0">MY ADS</h1>
                    <p class="sec_main_para text-center">Edit Or Delete Your Previous Ads</p>
                </div>
            </div>
        </div>

        <div class="row g-2">
            @if(count($ads) >0)
            @foreach($ads as $data )
                <div class="col-lg-11 col-md-12 col-sm-12 col-11 mx-auto">
                    <div class="all_quote_card ">
                        <div class="car_inner_imagg ">
                            <?php
                            $img = explode(",", $data->images);
                            ?>
                            <img src="{{ asset($img[0]) }}">
                        </div>
                        <div class="  w-100  quote_detail_wraper align-items-md-center">
                            <div class="quote_info Leavereview">
                                <h3 class="d-flex align-items-center active_quote">{{$data->model}}</h3>
                                <p class="mb-0">{{$data->company->company}}</p>
                                <p class="mb-0">{{$data->modelYear->model_year}}</p>
                                <p >{{$data->mileage}} CC</p>
                            </div>
                            <div class="quote_detail_btn_wraper">
                                <h3 class=" text-sm-center">AED {{$data->price}}</h3>
                                <div class="d-flex  align-items-center chat_view__detail">
                                    <form method="post" action="{{route('user.ads.destroy', $data->id )}}" >
                                        @method('delete')
                                        @csrf
                                        <button  type="submit" class="btn-secondary edit_del_btns me-2">DELETE</button>
                                    </form>
                                    <a href="{{ route('user.ads.edit' ,  $data->id) }}" class="btn btn-primary edit_del_btns">EDIT</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @else
                <div class="col-lg-11 col-md-12 col-sm-12 col-11 mx-auto">
                    <div class="all_quote_card ">
                        <div class="  w-100  quote_detail_wraper align-items-md-center">
                            <div class="quote_info Leavereview">
                                <p class="mb-0">No Ads has been added !</p>
                            </div>

                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
@endsection
