@extends('web.layout.app')
@section('content')
    <section class="about_connect looking_for lates_news_main">
        <div class="container-lg container-fluid">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="main_content_wraper">
                        <h1 class="sec_main_heading text-center">latest news</h1>
                        <p class="sec_main_para text-center">See what new for you in our portal</p>
                    </div>
                </div>
            </div>


            <div class="row g-3">
                @foreach($news as $value)
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <a href="{{route('news_detail')}}">
                        <div class="card card_vendors shadow" >
                            <div class="car_img_wrapper latest_news">
                                <img src="{{$value->image}}" class="card-img-top" alt="Car image">
                            </div>
                            <div class="card-body px-lg-4 px-sm-2">
                                <p class="card-title date ">{{$value->created_at}}Jan 1, 2022</p>
                                <p class="sec_main_para car_text ">{{$value->title}}</p>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>




        </div>
        <!-- <div class="row">
          <div class="col-lg-5 mx-auto">
            <div class="text-center view_all_btn_wrapper">
              <a href="#" class="view_all_btn">view all</a>
            </div>
          </div>
        </div> -->
        </div>
    </section>
@endsection
