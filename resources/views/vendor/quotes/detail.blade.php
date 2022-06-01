@extends('vendor.layout.app')
@section('content')
    <?php  $company = \App\Models\Company::where('id',$data->company_id)->first();?>
<section class="pb-5 login_content_wraper">
    <div class="px-md-4 container-lg container-fluid">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="main_content_wraper dashboard mt-1 mt-lg-5 mt-md-5">
                    <h4 class="sec_main_heading text-center mb-0"> MY OFFERED QUOTE</h4>
                    <p class="sec_main_para text-center">See How You Responded To This Request</p>
                </div>
            </div>
        </div>
        <div class="row g-2">
            <div class="col-lg-12 col-md-12 col-12  mx-auto">
                <div class="all_quote_card replies_allquot ">
                    <div class=" w-100  quote_detail_wraper replies ">
                        <div class="active_bid_dtl_card_left">
                            <div class="quote_info">
                                <h5 class="heading-color d-flex align-items-center active_quote nowrape">{{$company->company}}</h5>
                                <p class="mb-0">{{$data->car_owner_name}}</p>

                                <p class="mb-0">{{$data->phone}}</p>
                                <p class="milage">Mileage  <span>{{$data->mileage}}km</span></p>
                            </div>

                            <div class="d-flex chat_view__detail qoute_replies vendor_order days">
                                <h5 class="heading-color active_bidDay">{{$data->day}} Days</h5>
                                <a href="#" class="chat_icon">
                                    <i class="fa-solid fa-message"></i>
                                    <!-- <img src="assets/images/meassageiconblk.svg"> -->
                                </a>
                            </div>

                        </div>
                        <div class=" active_bid_dtl_card_right">
                            <h5 class="offer_quote_heading">{{$data->model}}</h5>
{{--                            <h3 class="offer_quote_heading second_heading">My Quote <span>AED 1200</span></h3>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row  mt-5">
            <div class="col-lg-12">
                <div class="all_quote_card  vendor_rply_dtlL _text mb-5">
                    <h5 class="active_order_req">Requirments</h5>

                    <div class="vendor__rply__dttl">
                        <p>{{$data->description1}}</p>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $images = \App\Models\UserBidImage::where('user_bid_id',$data->id)->where('type','image')->get();?>
        <div class="row">
            <div class="col-lg-12">
                <div class="all_quote_card  vendor_rply_dtlL _text">
                    <div class="owl-carousel carousel_se_03_carousel owl-theme mt-5">
                        @if(count($images) == 0)
                        <div class="item">
                            <div class="carAd_img_wraper doc_img customer_dashboard">
                                <img src="{{ asset('public/assets/images/no-preview.png') }}">
                            </div>
                        </div>
                        <div class="item">
                            <div class="carAd_img_wraper doc_img customer_dashboard">
                                <img src="{{ asset('public/assets/images/no-preview.png') }}">
                            </div>
                        </div>
                        <div class="item">
                            <div class="carAd_img_wraper doc_img customer_dashboard">
                                <img src="{{ asset('public/assets/images/no-preview.png') }}">
                            </div>
                        </div>
                        @elseif(count($images) == 1)
                            @foreach($images as $image)
                                <div class="item">
                                    <div class="carAd_img_wraper doc_img customer_dashboard">
                                        <img src="{{ asset($image->car_image) }}">
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="carAd_img_wraper doc_img customer_dashboard">
                                        <img src="{{ asset('public/assets/images/no-preview.png') }}">
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="carAd_img_wraper doc_img customer_dashboard">
                                        <img src="{{ asset('public/assets/images/no-preview.png') }}">
                                    </div>
                                </div>
                            @endforeach
                        @elseif(count($images) == 2)
                            @foreach($images as $image)
                                <div class="item">
                                    <div class="carAd_img_wraper doc_img customer_dashboard">
                                        <img src="{{ asset($image->car_image) }}">
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="carAd_img_wraper doc_img customer_dashboard">
                                        <img src="{{ asset('public/assets/images/no-preview.png') }}">
                                    </div>
                                </div>
                            @endforeach
                        @else
                            @foreach($images as $image)
                                <div class="item">
                                    <div class="carAd_img_wraper doc_img customer_dashboard">
                                        <img src="{{ asset($image->car_image) }}">
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="carAd_img_wraper doc_img customer_dashboard">
                                        <img src="{{ asset('public/assets/images/no-preview.png') }}">
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>

                </div>
            </div>
        </div>
        <?php
        $documents = \App\Models\UserBidImage::where('user_bid_id',$data->id)->where('type','file')->get();?>
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="all_quote_card  vendor_rply_dtlL _text">
                    <div class="owl-carousel carousel_se_03_carousel owl-theme mt-5">
                        @if(count($documents) == 0)
                            <div class="item">
                                <div class="carAd_img_wraper doc_img customer_dashboard">
                                    <img src="{{ asset('public/assets/images/no-preview.png') }}">
                                </div>
                            </div>
                            <div class="item">
                                <div class="carAd_img_wraper doc_img customer_dashboard">
                                    <img src="{{ asset('public/assets/images/no-preview.png') }}">
                                </div>
                            </div>
                            <div class="item">
                                <div class="carAd_img_wraper doc_img customer_dashboard">
                                    <img src="{{ asset('public/assets/images/no-preview.png') }}">
                                </div>
                            </div>
                        @elseif(count($documents) == 1)
                            @foreach($documents as $image)
                                <?php $pathinfo = pathinfo($image->car_image);
                                $supported_ext = array('docx', 'xlsx', 'pdf');
                                $src_file_name = $image->car_image;
                                $ext = strtolower(pathinfo($src_file_name, PATHINFO_EXTENSION)); ?>
                                <div class="item">
                                    <div class="carAd_img_wraper doc_img customer_dashboard">
                                        @if($ext=="docx")
                                        <a class="text-decoration-none text-reset" href="{{url($image->car_image)}}">
                                        <img src="{{ asset('public/assets/images/wordicon.png') }}" style="height: 100%;">
                                        </a>
                                        @elseif($ext=="doc")
                                        <a class="text-decoration-none text-reset" href="{{url($image->car_image)}}">
                                        <img src="{{ asset('public/assets/images/wordicon.png') }}" style="height: 100%;">
                                        </a>
                                        @elseif($ext=="xlsx")
                                        <a class="text-decoration-none text-reset" href="{{url($image->car_image)}}">
                                        <img src="{{ asset('public/assets/images/excelicon.png') }}" style="height: 100%;">
                                        </a>
                                        @elseif($ext=="pdf")
                                        <a class="text-decoration-none text-reset" href="{{url($image->car_image)}}">
                                        <img src="{{ asset('public/assets/images/pdficon.png') }}" style="height: 100%;">
                                        </a>
                                        @else
                                        <img src="{{ asset($image->car_image) }}">
                                        @endif


                                    </div>
                                </div>
                                <div class="item">
                                    <div class="carAd_img_wraper doc_img customer_dashboard">
                                        <img src="{{ asset('public/assets/images/no-preview.png') }}">
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="carAd_img_wraper doc_img customer_dashboard">
                                        <img src="{{ asset('public/assets/images/no-preview.png') }}">
                                    </div>
                                </div>
                            @endforeach
                        @elseif(count($documents) == 2)
                            @foreach($documents as $image)
                                <?php $pathinfo = pathinfo($image->car_image);
                                $supported_ext = array('docx', 'xlsx', 'pdf');
                                $src_file_name = $image->car_image;
                                $ext = strtolower(pathinfo($src_file_name, PATHINFO_EXTENSION)); ?>
                                <div class="item">
                                    <div class="carAd_img_wraper doc_img customer_dashboard">
                                        @if($ext=="docx")
                                            <a class="text-decoration-none text-reset" href="{{url($image->car_image)}}">
                                                <img src="{{ asset('public/assets/images/wordicon.png') }}" style="height: 100%;">
                                            </a>
                                        @elseif($ext=="doc")
                                            <a class="text-decoration-none text-reset" href="{{url($image->car_image)}}">
                                                <img src="{{ asset('public/assets/images/wordicon.png') }}" style="height: 100%;">
                                            </a>
                                        @elseif($ext=="xlsx")
                                            <a class="text-decoration-none text-reset" href="{{url($image->car_image)}}">
                                                <img src="{{ asset('public/assets/images/excelicon.png') }}" style="height: 100%;">
                                            </a>
                                        @elseif($ext=="pdf")
                                            <a class="text-decoration-none text-reset" href="{{url($image->car_image)}}">
                                                <img src="{{ asset('public/assets/images/pdficon.png') }}" style="height: 100%;">
                                            </a>
                                        @else
                                            <img src="{{ asset($image->car_image) }}">
                                        @endif
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="carAd_img_wraper doc_img customer_dashboard">
                                        <img src="{{ asset('public/assets/images/no-preview.png') }}">
                                    </div>
                                </div>
                            @endforeach
                        @else
                            @foreach($documents as $image)
                                <?php $pathinfo = pathinfo($image->car_image);
                                $supported_ext = array('docx', 'xlsx', 'pdf');
                                $src_file_name = $image->car_image;
                                $ext = strtolower(pathinfo($src_file_name, PATHINFO_EXTENSION)); ?>
                                <div class="item">
                                    <div class="carAd_img_wraper doc_img customer_dashboard">
                                        @if($ext=="docx")
                                            <a class="text-decoration-none text-reset" href="{{url($image->car_image)}}">
                                                <img src="{{ asset('public/assets/images/wordicon.png') }}" style="height: 100%;">
                                            </a>
                                        @elseif($ext=="doc")
                                            <a class="text-decoration-none text-reset" href="{{url($image->car_image)}}">
                                                <img src="{{ asset('public/assets/images/wordicon.png') }}" style="height: 100%;">
                                            </a>
                                        @elseif($ext=="xlsx")
                                            <a class="text-decoration-none text-reset" href="{{url($image->car_image)}}">
                                                <img src="{{ asset('public/assets/images/excelicon.png') }}" style="height: 100%;">
                                            </a>
                                        @elseif($ext=="pdf")
                                            <a class="text-decoration-none text-reset" href="{{url($image->car_image)}}">
                                                <img src="{{ asset('public/assets/images/pdficon.png') }}" style="height: 100%;">
                                            </a>
                                        @else
                                            <img src="{{ asset($image->car_image) }}">
                                        @endif
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="carAd_img_wraper doc_img customer_dashboard">
                                        <img src="{{ asset('public/assets/images/no-preview.png') }}">
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>


                    <h5 class="active_order_req">Police /Accident /Inspection Report</h5>

                    <div class="vendor__rply__dttl">
                        <p>{{$data->description2}}</p>
                    </div>

                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="all_quote_card  vendor_rply_dtlL _text">
                    <form action="{{ route('vendor.bidresponse') }}" method="post">
                        @csrf
                        <div class="row ">
                            <div class="col-lg-9 mx-auto">
                                <h6 class="heading-color">Service Details</h6>
                                <div class="conten-row-block-main-container services-details">
                                    <div class="mb-3 row content-block-row">
                                        <div class="col-sm-4">
                                            <input type="text" name="service_name[]" class="form-control" placeholder="Particular" />
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="input-group">
                                                <div class="p-0 input-group-text">
                                                    <button class='w-auto h-100 px-1 btn btn-secondary minus'><span class="fa fa-minus"></span></button>
                                                </div>
                                                <input type='number' name='service_quantity[]' value='0' class='form-control qty' />
                                                <div class="p-0 input-group-text">
                                                    <button class='w-auto h-100 px-1 btn btn-secondary plus'><span class="fa fa-plus"></span></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="number" min="1" value='' name="services_rate[]"  class="form-control item-rate" placeholder="Rate" />
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="number" min="1" value='' name="services_amount[]" class="form-control item-amount" placeholder="Amount" />
                                        </div>
                                        <div class="col-sm-2 d-flex flex-wrap">
                                            <button class="w-auto btn btn-secondary add-btn"><span class="fa fa-plus"></span></button>
                                            <button class="w-auto btn btn-secondary remove-btn"><span class="fa fa-minus"></span></button>
                                        </div>
                                    </div>
                                </div>
                                <h6 class="heading-color">Spares Details</h6>
                                <div class="conten-row-block-main-container spares-details">
                                    <div class="mb-3 row content-block-row">
                                        <div class="col-sm-4">
                                            <input type="text" name="spares_name[]" class="form-control" placeholder="Particular" />
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="input-group">
                                                <div class="p-0 input-group-text">
                                                    <button class='w-auto h-100 px-1 btn btn-secondary minus'><span class="fa fa-minus"></span></button>
                                                </div>
                                                <input type='number' name='spares_quantity[]' value='0' class='form-control qty' />
                                                <div class="p-0 input-group-text">
                                                    <button class='w-auto h-100 px-1 btn btn-secondary plus'><span class="fa fa-plus"></span></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="number" min="1" value='' name="spares_rate[]"  class="form-control item-rate" placeholder="Rate" />
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="number" min="1" value='' name="spares_amount[]" class="form-control item-amount" placeholder="Amount" />
                                        </div>
                                        <div class="col-sm-2 d-flex flex-wrap">
                                            <button class="w-auto btn btn-secondary add-btn"><span class="fa fa-plus"></span></button>
                                            <button class="w-auto btn btn-secondary remove-btn"><span class="fa fa-minus"></span></button>
                                        </div>
                                    </div>
                                </div>
                                <h6 class="heading-color">Others</h6>
                                <div class="conten-row-block-main-container extras-details">
                                    <div class="mb-3 row content-block-row">
                                        <div class="col-sm-4">
                                            <input type="text" name="others_name[]" class="form-control" placeholder="Particular" />
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="input-group">
                                                <div class="p-0 input-group-text">
                                                    <button class='w-auto h-100 px-1 btn btn-secondary minus'><span class="fa fa-minus"></span></button>
                                                </div>
                                                <input type='number' name='others_quantity[]' value='0' class='form-control qty' />
                                                <div class="p-0 input-group-text">
                                                    <button class='w-auto h-100 px-1 btn btn-secondary plus'><span class="fa fa-plus"></span></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="number" min="1" name="others_rate[]" class="form-control item-rate" placeholder="Rate" />
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="number" min="1" name="others_amount[]" class="form-control item-amount" placeholder="Amount" />
                                        </div>
                                        <div class="col-sm-2 d-flex flex-wrap">
                                            <button class="w-auto btn btn-secondary add-btn"><span class="fa fa-plus"></span></button>
                                            <button class="w-auto btn btn-secondary remove-btn"><span class="fa fa-minus"></span></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
                                        <h6 class="heading-color">Estimate Total</h6>
                                        <input type="number" name="price" class="form-control" id="amountTotal" placeholder="AED Price">
                                        @error('price')<span class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
                                        <h6 class="heading-color">Vat 5%</h6>
                                        <input type="hidden" name="bid_id" value="{{$data->id}}">
                                        @error('bid_id')<span class="text-danger">{{$message}}</span>@enderror
                                        <input type="hidden" name="vendor_id" value="{{auth()->id()}}">
                                        @error('vendor_id')<span class="text-danger">{{$message}}</span>@enderror
                                        <?php $garage = \App\Models\Garage::where('vendor_id',auth()->id())->first();?>
                                        <input type="hidden" name="garage_id" value="{{$garage->id}}">
                                        <input type="number" name="vat" class="form-control" id="vatPercent" placeholder="AED Price">
                                        @error('vat')<span class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
                                        <h6 class="heading-color">Net Total</h6>
                                        <input type="number"  name="net_total" class="form-control" id="netTotal" placeholder="AED Price">
                                        @error('net_total')<span class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
                                        <h6 class="heading-color">Time Frame</h6>
                                        <input type="text"  name="time" class="form-control" placeholder="Time Frame">
                                        @error('time')<span class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="col-lg-12 col-md-12 mb-3">
                                        <div class="form-floating">
                                            <textarea class="form-control" name="description" placeholder="Add information in details" id="floatingTextarea2" style="height: 106px"></textarea>
                                            @error('description')<span class="text-danger">{{$message}}</span>@enderror
                                            <label for="floatingTextarea2">Add Repairing Details</label>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="d-grid gap-2 mt-3 mb-4">
                                                <button class="btn btn-secondary block get_appointment" type="submit">SUBMIT QUOTE</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
