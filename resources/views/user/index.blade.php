@extends('user.layout.app')
@section('content')
    <section class="pb-5 login_content_wraper">
        <div class="container-lg container-fluid" >
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="main_content_wraper dashboard mt-1 mt-lg-5 mt-md-5">
                        <h4 class="sec_main_heading text-center mb-0">DASHBOARD</h4>
                        <p class="sec_main_para text-center">View your profile</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 col-md-11 col-sm-11  mx-auto">
                    <div class="quote_card_heading  mb-lg-4 mb-2 mt-lg-5 mt-3">
                        <h5>All Quotes</h5>
                        <a href="{{route('user.quoteindex')}}">View All</a>
                    </div>
                    @if($user_bid)
                        <?php
                        $img = \App\Models\UserBidImage::where('user_bid_id',$user_bid->id)->where('type','image')->oldest()->first();
                        $company = \App\Models\Company::where('id',$user_bid->company_id)->first();
                        ?>
                        <div class="all_quote_card">
                            <div class="quote_info">
                                <h5 class="heading-color">{{$company->company}}  {{$user_bid->model}}</h5>
                                <p >{{$user_bid->description1}}</p>
                                <p class="quote_rev"><span>5 </span> Quotes Recieved</p>
                            </div>
                            <div class="quote_detail_btn_wraper">
                                <a href="{{route('user.response',$user_bid->id)}}" class="btn-secondary">VIEW DETAILS</a>

                            </div>

                        </div>
                    @else
                        <div class="all_quote_card">
                            <div class="quote_info">
                                <p >No Quote has been added !</p>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-lg-10 col-md-11 col-sm-11   mx-auto">
                    <div class="quote_card_heading mb-lg-4 mb-2 mt-lg-5 mt-3">
                        <h5>All Orders</h5>
                        <a href="{{route('user.order.index')}}">View All</a>
                    </div>
                    @if($order)
                    <?php
                    $userbidid = \App\Models\UserBid::where('id',$order->user_bid_id)->first();
                    if($userbidid){
                    $company = \App\Models\Company::where('id',$userbidid->company_id)->first();
                    }

                    ?>

                    <div class="all_quote_card">
                        <div class="quote_info">
                            <h5 class="heading-color">{{$company->company}}  ({{$userbidid->model}})</h5>
                            <p >{{$userbidid->description1}}</p>
                            <p class="quote_rev">Order ID:<span> #{{$order->order_code}} </span></p>
                        </div>
                        <div class="quote_detail_btn_wraper">
                            <a href="{{route('user.order.show',$order->id)}}" class="btn-secondary">VIEW DETAILS</a>

                        </div>

                    </div>
                    @else
                        <div class="all_quote_card">
                            <div class="quote_info">

                                <p >No Orders has been added !</p>

                            </div>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </section>
@endsection
{{--<form id="frm-logout" action="{{ route('user.logout') }}" method="POST" style="display: none;">
    @csrf
</form>--}}
