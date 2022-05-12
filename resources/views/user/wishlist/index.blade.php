@extends('user.layout.app')
@section('content')
    <section class="pb-5 login_content_wraper">
        <div class="container-lg container-fluid" >
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="main_content_wraper dashboard mt-1 mt-lg-5 mt-md-5">
                        <h1 class="sec_main_heading text-center mb-0">PREFERRED GARAGES</h1>
                        <p class="sec_main_para text-center">See your favorite stores and what they have new to offer to you</p>
                    </div>
                </div>
            </div>
            <div class="row g-2">
                @if(count($wishlists) >0)
                @foreach($wishlists as $wishlist)
                <div class="col-lg-11 col-md-12  mx-auto">
                    <div class="all_quote_card ">
                        <div class="car_inner_imagg">
                            <img @if($wishlist->image && $wishlist->image != null) src="{{asset($wishlist->image)}}" @else src="{{ asset('public/assets/images/repair2.jpg') }}" @endif>
                        </div>
                        <div class=" w-100  quote_detail_wraper align-items-sm-center">
                            <div class="quote_info Leavereview mb-sm-3">
                                <h3 class="d-flex align-items-center active_quote">{{ucfirst($wishlist->garage_name)}}
                                </h3>
                                <p class="mb-0">{{$wishlist->city}}, {{$wishlist->country}}</p>
                                <p >{{$wishlist->phone}}</p>
                                <div class="card_icons d-flex justify-content-center align-items-center">
                                    <?php $category = \App\Models\GarageCategory::where('garage_id',$wishlist->id)->pluck('category_id');
                                    $category_name = \App\Models\Category::whereIn('id',$category)->get();
                                    ?>
                                   @foreach($category_name as $catname)
                                    <div class="icon_wrpaer">
                                        <img src="{{asset($catname->icon)}}">
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="quote_detail_btn_wraper">



                                <div class="d-flex align-items-center chat_view__detail">
                                    <a href="#" class="chat_icon">
                                        <i class="fa-solid fa-message"></i>
                                        <!-- <img src="public/user/assets/images/meassageiconblk.svg")  -->
                                    </a>
                                  <?php  $userwishlist = \App\Models\UserWishlist::where('user_id',auth()->id())->where('garage_id',$wishlist->id)->first();?>
                                    <form action="{{ route('user.wishlist.destroy', $userwishlist->id) }}" method="POST" style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button class="chat_icon" type="submit" style="margin-right: 8px;">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                    <a href="{{route('gerage_detail',$wishlist->id)}}" class="btn-secondary">VIEW DETAILS</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                    <div class="col-lg-11 col-md-12  mx-auto">
                        <div class="all_quote_card ">

                            <div class=" w-100  quote_detail_wraper align-items-sm-center">
                                <div class="quote_info Leavereview mb-sm-3">
                                    <p class="mb-0">No preferred garage has been added !</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </section>
@endsection
