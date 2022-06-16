@extends('user.layout.app')
@section('content')
<section class="pb-5 login_content_wraper" style="background-image:url(public/assets/images/gradiantbg.jpg);">
    <div class="px-4 container-lg container-fluid" >
        <div class="row">
            <div class="col-xl-8 col-lg-7 col-sm-9  col-md-10 mx-auto">
                <div class="row mt-5 mb-4 g-3">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="d-grid gap-2 mt-lg-3 ">
                            <a href="{{route('user.quoteindex')}}" class="btn text-center btn-primary get_quot block get_appointment d-flex justify-content-center align-items-center" type="button">GO BACK TO ALL QUOTES
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6  col-md-6 col-sm-6">
                        <div class="d-grid gap-2 mt-lg-3 ">
                            <a href="{{route('user.payment_page',$data->id)}}" class="btn btn-secondary block get_appointment d-flex justify-content-center align-items-center" type="button">ACCEPT QUOTE
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-2">
            <div class="col-12">
                <div class="all_quote_card  vendor_rply_dtlL">
                    <?php
                    $userbid = \App\Models\UserBid::where('id',$data->user_bid_id)->first();
                    $company = \App\Models\Company::where('id',$userbid->company_id)->first();
                    $garage = \App\Models\Garage::where('id',$data->garage_id)->first();
                    ?>
                    <div class="car_inner_imagg vendor_rply_dtl ">
                        <img @if($garage->image && $garage->image != null) src="{{asset($garage->image)}}" @else src="{{ asset('public/assets/images/repair2.jpg') }}" @endif>
                    </div>
                    <div class=" w-100  quote_detail_wraper">
                        <div class="quote_info">
                            <h4 class="d-flex align-items-center active_quote rply_dtl heading-color">{{$garage->garage_name}}</h4>
                            <p class="mb-0 rply__dtl">{{$data->vendordetail->name}}</p>
                            <p class="rply__dtl" >{{$data->vendordetail->phone}}</p>
                            <div class="card_icons respons_qoute d-flex align-items-center">
                                <?php $category = \App\Models\GarageCategory::where('garage_id',$data->garage_id)->pluck('category_id');
                                $category_name = \App\Models\Category::whereIn('id',$category)->get();
                                ?>
                                @foreach($category_name as $catname)
                                    <div class="icon_wrpaer vendor_qoute_dtl">
                                        <img src="{{asset($catname->icon)}}">
                                    </div>
                                @endforeach


                            </div>
                        </div>
                        <div class="quote_detail_btn_wraper">
                            <h4 class=" text-sm-center vendor_replies_dtl">AED {{$data->price}}</h4>
                            <div class="quote_info">
                                <p class="quote_rev vndr_rply__dtl">Time Frame Offered<span> {{$data->time}}  Days</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row  mt-5">
            <div class="col-lg-12">

                <div class="all_quote_card  vendor_rply_dtlL _text">
                    <div class="over_view_part carad_data vendor_detail">
                        <h5 class=" text-center mb-5 heading heading-color">REPAIR DETAILS</h5>
                    </div>
                    <div class="col-md-9 mx-auto vendor__rply__dttl">
                        <h6 class="heading-color">Service Details</h6>
                        <div class="conten-row-block-main-container services-details">
                            <div class="mb-3 row content-block-row">
                                @php
                                    $count=0;
                                @endphp
                                @forelse($data->part as $service)
                                    @if($service->type=='services')
                                <div class="col-sm-4">

                                    @if($count==0)
                                    <label for="particular" class="heading-color">Particular</label>
                                        <input type="text" value="{{$service->service_name}}" class="form-control" placeholder="Particular" readonly>
                                    @else
                                        <input type="text" value="{{$service->service_name}}" class="form-control mt-2" placeholder="Particular" readonly>
                                    @endif

                                </div>
                                <div class="col-sm-2">
                                    @if($count==0)
                                    <label for="quantity" class="heading-color">Quantity</label>
                                        <input type="number" value="{{$service->service_quantity}}"  class="form-control" readonly>
                                    @else
                                        <input type="number" value="{{$service->service_quantity}}"  class="form-control mt-2" readonly>
                                    @endif

                                </div>
                                <div class="col-sm-3">
                                    @if($count==0)
                                    <label for="rate" class="heading-color">Rate</label>
                                        <input type="number" min="1" value="{{$service->service_rate}}" class="form-control" placeholder="Rate" readonly>
                                    @else
                                        <input type="number" min="1" value="{{$service->service_rate}}" class="form-control mt-2" placeholder="Rate" readonly>
                                    @endif

                                </div>
                                <div class="col-sm-3">
                                    @if($count++==0)
                                    <label for="amount" class="heading-color">amount</label>
                                        <input type="number" min="1"  value="{{$service->service_rate*$service->service_quantity}}" class="form-control" placeholder="Amount" readonly>
                                    @else
                                        <input type="number" min="1" value="{{$service->service_rate*$service->service_quantity}}" class="form-control mt-2" placeholder="Amount" readonly>
                                    @endif

                                </div>
                                    @endif
                                @empty
                                @endforelse
                            </div>
                        </div>
                        <h6 class="heading-color">Spares Details</h6>
                        <div class="conten-row-block-main-container services-details">
                            <div class="mb-3 row content-block-row">
                                @php
                                    $count=0;
                                @endphp
                                @forelse($data->part as $service)
                                    @if($service->type=='spares')
                                <div class="col-sm-4">
                                    @if($count==0)
                                    <label for="particular" class="heading-color">Particular</label>
                                    <input type="text" class="form-control" value="{{$service->service_name}}" placeholder="Particular" readonly>
                                    @else
                                        <input type="text" value="{{$service->service_name}}" class="form-control mt-2" placeholder="Particular" readonly>
                                    @endif
                                </div>
                                <div class="col-sm-2">
                                    @if($count==0)
                                    <label for="quantity" class="heading-color">Quantity</label>
                                    <input type="number" value="{{$service->service_quantity}}" class="form-control" readonly>
                                    @else
                                        <input type="number" value="{{$service->service_quantity}}" class="form-control mt-2" readonly>
                                    @endif
                                </div>
                                <div class="col-sm-3">
                                    @if($count==0)
                                    <label for="rate" class="heading-color">Rate</label>
                                    <input type="number" min="1" value="{{$service->service_rate}}" class="form-control" placeholder="Rate" readonly>
                                    @else
                                        <input type="number" min="1" value="{{$service->service_rate}}" class="form-control mt-2" placeholder="Rate" readonly>
                                        @endif
                                </div>
                                <div class="col-sm-3">
                                    @if($count++==0)
                                    <label for="amount" class="heading-color">amount</label>
                                    <input type="number" min="1" value="{{$service->service_rate*$service->service_quantity}}"  class="form-control" placeholder="Amount" readonly>
                                    @else
                                        <input type="number" min="1" value="{{$service->service_rate*$service->service_quantity}}" class="form-control mt-2" placeholder="Amount" readonly>
                                    @endif
                                </div>
                                    @endif

                                        @empty

                                        @endforelse
                            </div>
                        </div>
                        <h6 class="heading-color">Others</h6>
                        <div class="conten-row-block-main-container services-details">
                            <div class="mb-3 row content-block-row">
                                @php
                                $total=0;
                                $count=0;
                                @endphp
                                @forelse($data->part as $service)
                                    @php
                                        $total+=$service->service_rate*$service->service_quantity;
                                    @endphp
                                    @if($service->type=='others')

                                <div class="col-sm-4">
                                    @if($count==0)
                                    <label for="particular" class="heading-color">Particular</label>
                                    <input type="text" value="{{$service->service_name}}" class="form-control" placeholder="Particular" readonly>
                                    @else
                                        <input type="text" value="{{$service->service_name}}" class="form-control mt-2" placeholder="Particular" readonly>
                                    @endif
                                </div>
                                <div class="col-sm-2">
                                    @if($count==0)
                                    <label for="quantity" class="heading-color">Quantity</label>
                                    <input type="number" value="{{$service->service_quantity}}"  class="form-control" readonly>
                                    @else
                                        <input type="number" value="{{$service->service_quantity}}" class="form-control mt-2" readonly>
                                    @endif
                                </div>
                                <div class="col-sm-3">
                                    @if($count==0)
                                    <label for="rate" class="heading-color">Rate</label>
                                    <input type="number" min="1" value="{{$service->service_rate}}" class="form-control" placeholder="Rate" readonly>
                                    @else
                                        <input type="number" min="1" value="{{$service->service_rate}}" class="form-control mt-2" placeholder="Rate" readonly>
                                    @endif
                                </div>
                                <div class="col-sm-3">
                                    @if($count++==0)
                                    <label for="amount" class="heading-color">amount</label>
                                    <input type="number" min="1" value="{{$service->service_rate*$service->service_quantity}}" class="form-control" placeholder="Amount" readonly>
                                    @else
                                        <input type="number" min="1" value="{{$service->service_rate*$service->service_quantity}} mt-2" class="form-control" placeholder="Amount" readonly>
                                        @endif
                                </div>
                                    @endif
                                        @empty
                                        @endforelse
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
                                <h6 class="heading-color">Estimate Total</h6>
                                <input type="number" value="{{$total}}" class="form-control" placeholder="AED Price" readonly>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
                                <h6 class="heading-color">Vat 5%</h6>
                                <input type="number" value="{{$data->vat}}" class="form-control" placeholder="AED Price" readonly>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
                                <h6 class="heading-color">Net Total</h6>
                                <input type="number" value="{{$data->vat+$total}}" class="form-control" placeholder="AED Price" readonly>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
                                <h6 class="heading-color">Time Frame</h6>
                                <input type="text" value="{{$data->time}}" name="time" class="form-control" placeholder="Estimated Time" readonly>
                            </div>
                        </div>
                        <h6 class="heading-color">Repairing Details</h6>
                        <p>{{$data->description}}</p>
                        <a class="btn-secondary get_appointment" href="{{url('user/print-order-details',$data->id)}}">Preview</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row  mt-5">
            <div class="col-lg-12">

                <div class="all_quote_card  vendor_rply_dtlL _text">
                    <div class="over_view_part carad_data vendor_detail">
                        <h5 class="text-center mb-5 heading heading-color">CAR DETAILS</h5>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 col-md-10 col-sm-8  mx-auto">
                            <div class="row mt-1 g-3">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="d-grid gap-2 ">
                                        <button class="btn text-center btn-primary get_quot block get_appointment" type="button">Car Model : {{$userbid->model}}</button>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="d-grid gap-2 ">
                                        <button class="btn text-center btn-primary get_quot block get_appointment" type="button">Car Make : {{$company->company}}</button>
                                    </div>
                                </div>
                                <?php $userbidcateg = \App\Models\UserBidCategory::where('user_bid_id',$data->user_bid_id)->pluck('category_id');
                                $userbidcategories = \App\Models\Category::whereIn('id',$userbidcateg)->get(); ?>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="d-grid gap-2 ">
                                        <button class="btn text-center btn-primary get_quot block get_appointment" type="button">Type of Service : @foreach($userbidcategories as $userbidcategory)  {{$userbidcategory->name}}, @endforeach</button>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="d-grid gap-2 ">
                                        <button class="btn text-center btn-primary get_quot block get_appointment" type="button">Customer Name : {{auth()->user()->name}}</button>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
