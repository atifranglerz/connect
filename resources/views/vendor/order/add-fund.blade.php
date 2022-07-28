@extends('vendor.layout.app')
@section('content')
<?php  $company = \App\Models\Company::where('id',$data->company_id)->first();?>
<section class="pb-5 login_content_wraper">
    <div class="px-md-4 container-lg container-fluid">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="main_content_wraper dashboard mt-1 mt-lg-5 mt-md-5">
                    <h4 class="sec_main_heading text-center mb-0"> Final Invoice</h4>
                    <p class="sec_main_para text-center">See How You Responded To This Request</p>
                </div>
            </div>
        </div>
        <div class="row g-2">
            <div class="col-lg-12 col-md-12 col-12  mx-auto">
                <div class="table-responsive white-background-box">
                    <table class="table table-bordered table-striped table-dark mb-0">
                        <thead>
                            <tr>
                                <th>Customer's Name</th>
                                <th>Company</th>
                                <th>Registration No.</th>
                                <th>Chasis No.</th>
                                <th>Model</th>
                                <th>Milage e.g 40 Km</th>
                                <th>Color</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$data->car_owner_name}}</td>
                                <td>{{$company->company}}</td>
                                <td>{{$data->registration_no}}</td>
                                <td>{{$data->Chasis_no}}</td>
                                <td>{{$data->modelYear->model_year}}</td>
                                <td>{{$data->mileage}}km</td>
                                <td>{{$data->color}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive white-background-box mt-3">
                    <table class="table table-bordered table-striped table-dark mb-0">
                        <thead>
                            <tr>
                                <th>Estimated Days e.g (7)</th>
                                <th>Services Required</th>
                                <th>Chat Now</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$data->day}}</td>
                                <td> @forelse($data->services as
                                    $services)@if($loop->iteration==1){{$services->category->name}}@else,
                                    {{$services->category->name}} @endif @empty @endforelse</td>
                                <td>
                                    <div class="chat_view__detail d-flex justify-content-center">
                                        <a href="{{url('vendor/chat/'.$data->user->id)}}"
                                            class="justify-content-center chat_icon">
                                            <i class="fa-solid fa-message"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
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
        $car_images = \App\Models\UserBidImage::where('user_bid_id',$data->id)->where('type','image')->first();
        $car_images=Explode(",",$car_images->car_image);
        ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="all_quote_card  vendor_rply_dtlL _text">
                    <h5 class="heading-color">Car Images</h5>
                    <div class="owl-carousel carousel_se_03_carousel owl-theme mt-4">
                        @if(count($car_images) > 0)
                        @for($i=0;$i<count($car_images);$i++) <div class="item">
                            <div class="carAd_img_wraper doc_img customer_dashboard">
                                <img src="{{ asset($car_images[$i]) }}">
                            </div>
                    </div>
                    @endfor
                    @endif
                </div>
            </div>
        </div>
    </div>
    <?php
        $car_images = \App\Models\UserBidImage::where('user_bid_id',$data->id)->where('type','registerImage')->first();
        $car_images=Explode(",",$car_images->car_image);

        ?>
    <div class="row mt-5">
        <div class="col-lg-12">
            <div class="all_quote_card  vendor_rply_dtlL _text">
                <h5 class="heading-color">Registration Copy Images </h5>
                <div class="owl-carousel carousel_se_03_carousel owl-theme mt-4">
                    @if(count($car_images) > 0)
                    @for($i=0;$i<count($car_images);$i++) <div class="item">
                        <div class="carAd_img_wraper doc_img customer_dashboard">
                            <img src="{{ asset($car_images[$i]) }}">
                        </div>
                </div>
                @endfor
                @endif
            </div>
        </div>
    </div>
    </div>
    <?php
        $documents = \App\Models\UserBidImage::where('user_bid_id',$data->id)->where('type','file')->get();

        ?>
    @if($data->looking_for=='I have Inspection Report & Looking for the Quotations')
    <div class="row mt-5">
        <div class="col-lg-12">
            <div class="all_quote_card  vendor_rply_dtlL _text">
                <h5 class="active_order_req">Police /Accident /Inspection Report</h5>
                <div class="owl-carousel carousel_se_03_carousel owl-theme mt-4">
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


                <h5 class="heading-color mt-4">Special Requirements</h5>

                <div class="vendor__rply__dttl">
                    <p>{{$data->description2}}</p>
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="row mt-5">
        <div class="col-lg-12">
            <div class="all_quote_card  vendor_rply_dtlL _text">
                <form action="{{ route('vendor.finalFund') }}" method="post">
                    @csrf
                    <div class="row ">
                        <div class="col-lg-9 mx-auto">
                            <h6 class="heading-color">Services/Labor Details <sup
                                    class="fa fa-question label-fa-question" data-toggle="tooltip" data-placement="top"
                                    title=' "+" Sign will be used for Addition and "-" Sign will used be for Subtraction'></sup>
                            </h6>
                            <div class="conten-row-block-main-container services-details">
                                <div class="mb-3 row content-block-row serDetail1">
                                    <div class="col-sm-4">
                                        <input type="text" name="service_name[]" class="form-control particular-item"
                                            placeholder="Particular" />
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="input-group">
                                            <div class="p-0 input-group-text">
                                                <button class='w-auto h-100 px-1 btn btn-secondary minus'><span
                                                        class="fa fa-minus"></span></button>
                                            </div>
                                            <input type='number' name='service_quantity[]' min='0' value='0'
                                                class='form-control qty' />
                                            <div class="p-0 input-group-text">
                                                <button class='w-auto h-100 px-1 btn btn-secondary plus'><span
                                                        class="fa fa-plus"></span></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="number" min="1" value='' name="services_rate[]"
                                            class="form-control item-rate" placeholder="Rate" />
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="number" min="1" value='' name="services_amount[]"
                                            class="form-control item-amount" placeholder="Amount" />
                                    </div>
                                    <div class="col-sm-2 d-flex flex-wrap">
                                        <button class="w-auto btn btn-secondary add-btn services-detail-add-btn"><span
                                                class="fa fa-plus"></span></button>
                                        <button class="w-auto btn btn-secondary remove-btn"><span
                                                class="fa fa-minus"></span></button>
                                    </div>
                                </div>
                            </div>
                            <h6 class="heading-color">Spares Details <sup class="fa fa-question label-fa-question"
                                    data-toggle="tooltip" data-placement="top"
                                    title=' "+" Sign will be used for Addition and "-" Sign will used be for Subtraction'></sup>
                            </h6>
                            <div class="conten-row-block-main-container spares-details">
                                <div class="mb-3 row content-block-row spareDetail1">
                                    <div class="col-sm-4">
                                        <input type="text" name="spares_name[]" class="form-control particular-item"
                                            placeholder="Particular" />
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="input-group">
                                            <div class="p-0 input-group-text">
                                                <button class='w-auto h-100 px-1 btn btn-secondary minus'><span
                                                        class="fa fa-minus"></span></button>
                                            </div>
                                            <input type='number' name='spares_quantity[]' min='0' value='0'
                                                class='form-control qty' />
                                            <div class="p-0 input-group-text">
                                                <button class='w-auto h-100 px-1 btn btn-secondary plus'><span
                                                        class="fa fa-plus"></span></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="number" min="1" value='' name="spares_rate[]"
                                            class="form-control item-rate" placeholder="Rate" />
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="number" min="1" value='' name="spares_amount[]"
                                            class="form-control item-amount" placeholder="Amount" />
                                    </div>
                                    <div class="col-sm-2 d-flex flex-wrap">
                                        <button class="w-auto btn btn-secondary add-btn spares-detail-add-btn"><span
                                                class="fa fa-plus"></span></button>
                                        <button class="w-auto btn btn-secondary remove-btn"><span
                                                class="fa fa-minus"></span></button>
                                    </div>
                                </div>
                            </div>
                            <h6 class="heading-color">Others <sup class="fa fa-question label-fa-question"
                                    data-toggle="tooltip" data-placement="top"
                                    title=' "+" Sign will be used for Addition and "-" Sign will used be for Subtraction'></sup>
                            </h6>
                            <div class="conten-row-block-main-container extras-details">
                                <div class="mb-3 row content-block-row othersDetail1">
                                    <div class="col-sm-4">
                                        <input type="text" name="others_name[]" class="form-control particular-item"
                                            placeholder="Particular" />
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="input-group">
                                            <div class="p-0 input-group-text">
                                                <button class='w-auto h-100 px-1 btn btn-secondary minus'><span
                                                        class="fa fa-minus"></span></button>
                                            </div>
                                            <input type='number' name='others_quantity[]' min='0' value='0'
                                                class='form-control qty' />
                                            <div class="p-0 input-group-text">
                                                <button class='w-auto h-100 px-1 btn btn-secondary plus'><span
                                                        class="fa fa-plus"></span></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="number" min="1" name="others_rate[]" class="form-control item-rate"
                                            placeholder="Rate" />
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="number" min="1" name="others_amount[]"
                                            class="form-control item-amount" placeholder="Amount" />
                                    </div>
                                    <div class="col-sm-2 d-flex flex-wrap">
                                        <button class="w-auto btn btn-secondary add-btn others-detail-add-btn"><span
                                                class="fa fa-plus"></span></button>
                                        <button class="w-auto btn btn-secondary remove-btn"><span
                                                class="fa fa-minus"></span></button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
                                    <h6 class="heading-color">Estimate Total</h6>
                                    <input type="number" name="price" class="form-control amountTotal"
                                        placeholder="AED Price">
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
                                    <input type="number" name="vat" class="form-control vatPercent"
                                        placeholder="AED Price">
                                    @error('vat')<span class="text-danger">{{$message}}</span>@enderror
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
                                    <h6 class="heading-color">Net Total</h6>
                                    <input type="number" name="net_total" class="form-control netTotal"
                                        placeholder="AED Price">
                                    @error('net_total')<span class="text-danger">{{$message}}</span>@enderror
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
                                    <h6 class="heading-color">Time Frame</h6>
                                    <input type="text" name="time" class="form-control" placeholder="Estimated Time">
                                    @error('time')<span class="text-danger">{{$message}}</span>@enderror
                                </div>
                                <div class="col-lg-12 col-md-12 mb-3">
                                    <div class="form-floating">
                                        <textarea class="form-control" name="description"
                                            placeholder="Add information in details" id="floatingTextarea2"
                                            style="height: 106px"></textarea>
                                        @error('description')<span class="text-danger">{{$message}}</span>@enderror
                                        <label for="floatingTextarea2">Add Repairing Details</label>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="d-grid gap-2 mt-3 mb-4">
                                                <button class="btn btn-secondary block get_appointment" id="btnSubmit"
                                                    type="submit">SUBMIT FINAL INVOICE</button>
                                            </div>

                                        </div>
                                        <input type="hidden" name="btnType" id="btnType" value="0">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="d-grid gap-2 mt-3 mb-4">
                                                <button class="btn btn-secondary block get_appointment"
                                                    data-bs-toggle="modal" data-bs-target="#previewBidDetails"
                                                    type="button">PREVIEW INVOICE</button>
                                            </div>
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
<!-- Modal -->


<div class="modal fade" id="previewBidDetails" aria-labelledby="previewBidDetails" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">PDF Live Preview</h6>
            </div>
            <div class="modal-body">
                <div class="pb-0 main_content_wraper">
                    <h3 class="sec_main_heading text-center">
                        {{\Illuminate\Support\Facades\Auth::user()->garage->garage_name}} GARAGE</h1>
                        <p class="sec_main_para text-center">
                            {{\Illuminate\Support\Facades\Auth::user()->garage->address}} P.O. Box
                            {{\Illuminate\Support\Facades\Auth::user()->garage->post_box}}</p>
                        <p class="sec_main_para text-center"><b>Tel :
                            </b><span>{{\Illuminate\Support\Facades\Auth::user()->garage->phone}}</span>, <b>Fax :
                            </b><span>3881433</span></p>
                        <p class="sec_main_para text-center"><b>email :
                            </b><span>{{\Illuminate\Support\Facades\Auth::user()->email}}</span></p>
                        <h5 class="sec_main_heading text-center my-3">JOB ESTIMATE</h5>
                        <div class="table-responsive bg-white">
                            <table class="table table-bordered table-striped table-dark mb-0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <td colspan="2">{{\Illuminate\Support\Facades\Auth::user()->name}}</td>
                                        <th>Est. No.</th>
                                        <td>{{mt_rand(1, 999999)}}</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>Phone</th>
                                        <td>{{\Illuminate\Support\Facades\Auth::user()->phone}}</td>
                                        <th>Fax :</th>
                                        <th>Est. Date</th>
                                        <td>{{ \Carbon\Carbon::parse($data->created)->format('d-M-Y')}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <h6 class="mt-3">Vehicle Detail :</h6>
                        <div class="table-responsive bg-white">
                            <table class="table table-bordered table-striped table-dark mb-0">
                                <thead>
                                    <tr>
                                        <th>Registration No.</th>
                                        <td>{{$data->registration_no}}</td>
                                        <th>Milage Kms.</th>
                                        <td>{{$data->mileage}}km</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>Make</th>
                                        <td>{{$company->company}}</td>
                                        <th>Color</th>
                                        <td>{{$data->color}}</td>
                                    </tr>
                                    <tr>
                                        <th>Chasis No.</th>
                                        <td>{{$data->Chasis_no}}</td>
                                        <th>Year</th>

                                        <td>{{$data->modelYear->model_year}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <h6 class="mt-3">Services Detail :</h6>
                        <div class="table-responsive bg-white">
                            <table class="table table-bordered table-striped table-dark mb-0">
                                <thead>
                                    <tr>
                                        <th>SL No</th>
                                        <th>Particulars</th>
                                        <th>Qty</th>
                                        <th>Rate</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="serDetail1">
                                        <td>1</td>
                                        <td class="particular-item"></td>
                                        <td class="qty"></td>
                                        <td><span class="item-rate"></span>.00</td>
                                        <td><span class="item-amount"></span>.00</td>
                                    </tr>
                                    <tr class="services-detail">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <th>Services : </th>
                                        <td class="services-details"><span class="inner"></span>.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <h6 class="mt-3">Spares Detail :</h6>
                        <div class="table-responsive bg-white">
                            <table class="table table-bordered table-striped table-dark mb-0">
                                <thead>
                                    <tr>
                                        <th>SL No</th>
                                        <th>Particulars</th>
                                        <th>Qty</th>
                                        <th>Rate</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="spareDetail1">
                                        <td>1</td>
                                        <td class="particular-item"></td>
                                        <td class="qty"></td>
                                        <td><span class="item-rate"></span>.00</td>
                                        <td><span class="item-amount"></span>.00</td>
                                    </tr>
                                    <tr class="spares-detail">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <th>Spares : </th>
                                        <td class="spares-details"><span class="inner"></span>.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <h6 class="mt-3">Others :</h6>
                        <div class="table-responsive bg-white">
                            <table class="table table-bordered table-striped table-dark mb-0">
                                <thead>
                                    <tr>
                                        <th>SL No</th>
                                        <th>Particulars</th>
                                        <th>Qty</th>
                                        <th>Rate</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="othersDetail1">
                                        <td>1</td>
                                        <td class="particular-item"></td>
                                        <td class="qty"></td>
                                        <td><span class="item-rate"></span>.00</td>
                                        <td><span class="item-amount"></span>.00</td>
                                    </tr>
                                    <tr class="others-detail">
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <th>Others : </th>
                                        <td class="extras-details"><span class="inner"></span>.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="my-3 row mx-0">
                            <div class="offset-md-7 col-md-5 offset-sm-4 col-sm-8">
                                <div class="row">
                                    <b class="col-6">Estimate Total</b>
                                    <div class="col-6 text-xl-right">
                                        <span class="amountTotal"></span>.00</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <b class="col-6">VAT 5%</b>
                                    <div class="col-6 text-xl-right">
                                        <span class="vatPercent"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <b class="col-6">Net Total</b>
                                    <div class="col-6 text-xl-right">
                                        <span class="netTotal"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p id="repairingDetails" class="font-italic"></p>
                            <p class="font-italic">Remarks : ALL PARTS USED AND AFTER MARKET......... NO WARRANTY</p>
                            <b class="font-italic small">
                                Please Note : Vehicle Must be collected with 3 days of Invoice/Estimate date, Failing
                                which there
                                will be a parking charge of AED 50/- per day incurred by customer. Motormec will not be
                                responsible if the vehcile is collected / picked / impounded by Dubai local authorities
                                for which
                                it will be the customers responibility to get the vehicle released at thier own costs.
                            </b>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
$(function() {
    /*tooltip*/
    $('[data-toggle="tooltip"]').tooltip({
        trigger: 'hover'
    });
    /*tooltip*/
});
$(document).ready(function() {
    $(document).on('click', '#preview', function(event) {
        $('#btnType').val('1');
    });
    $(document).on('click', '#btnSubmit', function(event) {
        $('#btnType').val('0');
    })
});

$('textarea[name="description"]').keyup(function() {
    let repDescription = $(this).val();
    $('#repairingDetails').text(repDescription);
});

let serDetail = 1;
let sertrId = 1;
let sertdId = 1;

let sparesDetail = 1;
let sparestrId = 1;
let sparestdId = 1;

let othersDetail = 1;
let otherstrId = 1;
let otherstdId = 1;

$(document).on('click', '.services-detail-add-btn', function(e) {
    e.preventDefault();

    $('.services-detail').before(`<tr class="serDetail${++sertrId}">
                <td>${++sertdId}</td>
                <td class="particular-item"></td>
                <td class="qty"></td>
                <td><span class="item-rate"></span>.00</td>
                <td><span class="item-amount"></span>.00</td>
            </tr>`);

    $(this).closest('.conten-row-block-main-container').append(`<div class="mb-3 row content-block-row serDetail${++serDetail}">
                                        <div class="col-sm-4">
                                            <input type="text" name="service_name[]" class="form-control particular-item" placeholder="Particular">
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="input-group">
                                                <div class="p-0 input-group-text">
                                                    <button class="w-auto h-100 px-1 btn btn-secondary minus"><span class="fa fa-minus" aria-hidden="true"></span></button>
                                                </div>
                                                <input type="number" name="service_quantity[]" min="0" value="0" class="form-control qty">
                                                <div class="p-0 input-group-text">
                                                    <button class="w-auto h-100 px-1 btn btn-secondary plus"><span class="fa fa-plus" aria-hidden="true"></span></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="number" min="1" value="" name="services_rate[]" class="form-control item-rate" placeholder="Rate">
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="number" min="1" value="" name="services_amount[]" class="form-control item-amount" placeholder="Amount">
                                        </div>
                                        <div class="col-sm-2 d-flex flex-wrap">
                                            <button class="w-auto btn btn-secondary add-btn services-detail-add-btn"><span class="fa fa-plus" aria-hidden="true"></span></button>
                                            <button class="w-auto btn btn-secondary remove-btn"><span class="fa fa-minus" aria-hidden="true"></span></button>
                                        </div>
                                    </div>`);

});

$(document).on('click', '.spares-detail-add-btn', function(e) {
    e.preventDefault();

    $('.spares-detail').before(`<tr class="spareDetail${++sparestrId}">
                <td>${++sparestdId}</td>
                <td class="particular-item"></td>
                <td class="qty"></td>
                <td><span class="item-rate"></span>.00</td>
                <td><span class="item-amount"></span>.00</td>
            </tr>`);

    $(this).closest('.conten-row-block-main-container').append(`<div class="mb-3 row content-block-row spareDetail${++sparesDetail}">
                                        <div class="col-sm-4">
                                            <input type="text" name="spares_name[]" class="form-control particular-item" placeholder="Particular">
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="input-group">
                                                <div class="p-0 input-group-text">
                                                    <button class="w-auto h-100 px-1 btn btn-secondary minus"><span class="fa fa-minus" aria-hidden="true"></span></button>
                                                </div>
                                                <input type="number" name="spares_quantity[]" min="0" value="0" class="form-control qty">
                                                <div class="p-0 input-group-text">
                                                    <button class="w-auto h-100 px-1 btn btn-secondary plus"><span class="fa fa-plus" aria-hidden="true"></span></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="number" min="1" value="" name="spares_rate[]" class="form-control item-rate" placeholder="Rate">
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="number" min="1" value="" name="spares_amount[]" class="form-control item-amount" placeholder="Amount">
                                        </div>
                                        <div class="col-sm-2 d-flex flex-wrap">
                                            <button class="w-auto btn btn-secondary add-btn spares-detail-add-btn"><span class="fa fa-plus" aria-hidden="true"></span></button>
                                            <button class="w-auto btn btn-secondary remove-btn"><span class="fa fa-minus" aria-hidden="true"></span></button>
                                        </div>
                                    </div>`);

});

$(document).on('click', '.others-detail-add-btn', function(e) {
    e.preventDefault();

    $('.others-detail').before(`<tr class="othersDetail${++otherstrId}">
                <td>${++otherstdId}</td>
                <td class="particular-item"></td>
                <td class="qty"></td>
                <td><span class="item-rate"></span>.00</td>
                <td><span class="item-amount"></span>.00</td>
            </tr>`);

    $(this).closest('.conten-row-block-main-container').append(`<div class="mb-3 row content-block-row othersDetail${++othersDetail}">
                                        <div class="col-sm-4">
                                            <input type="text" name="others_name[]" class="form-control particular-item" placeholder="Particular">
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="input-group">
                                                <div class="p-0 input-group-text">
                                                    <button class="w-auto h-100 px-1 btn btn-secondary minus"><span class="fa fa-minus" aria-hidden="true"></span></button>
                                                </div>
                                                <input type="number" name="others_quantity[]" min="0" value="0" class="form-control qty">
                                                <div class="p-0 input-group-text">
                                                    <button class="w-auto h-100 px-1 btn btn-secondary plus"><span class="fa fa-plus" aria-hidden="true"></span></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="number" min="1" value="" name="others_rate[]" class="form-control item-rate" placeholder="Rate">
                                        </div>
                                        <div class="col-sm-2">
                                            <input type="number" min="1" value="" name="others_amount[]" class="form-control item-amount" placeholder="Amount">
                                        </div>
                                        <div class="col-sm-2 d-flex flex-wrap">
                                            <button class="w-auto btn btn-secondary add-btn others-detail-add-btn"><span class="fa fa-plus" aria-hidden="true"></span></button>
                                            <button class="w-auto btn btn-secondary remove-btn"><span class="fa fa-minus" aria-hidden="true"></span></button>
                                        </div>
                                    </div>`);

});

$(document).on('click', '.remove-btn', function(e) {
    e.preventDefault();
    let mainParent = $(this).closest('.content-block-row').attr('class').split(' ').pop();
    $('.' + mainParent).remove();
});

$(document).on('keyup', ".particular-item, .qty, .item-rate", function() {
    setTimeout(() => {
        let $parItem = $(this).closest('.content-block-row').find('input.particular-item').val();

        let $quanInput = $(this).closest('.content-block-row').find('input.qty');
        let val1 = parseInt($quanInput.val());

        let $rateInput = $(this).closest('.content-block-row').find('input.item-rate');
        let val2 = parseInt($rateInput.val());

        let $amountInput = $(this).closest('.content-block-row').find('input.item-amount');
        $amountInput.val(val1 * val2).change();
        amountTotal();

        let mainParent = $(this).closest('.content-block-row').attr('class').split(' ').pop();
        $('.' + mainParent).find('.particular-item').text($parItem);
        $('.' + mainParent).find('.item-rate').text(val2);
        $('.' + mainParent).find('.qty').text(val1);
        $('.' + mainParent).find('.item-amount').text(val1 * val2);

        let mainDiv = $(this).closest('.conten-row-block-main-container').attr('class').split(' ')
            .pop();
        let itemAmount = $('.' + mainDiv).find('.item-amount');
        var sum = 0;
        $(itemAmount).each(function(e) {
            sum += parseInt($(this).val());
        });
        $('.' + mainDiv).find('.inner').text(sum);
    }, 500);
});

/*Amount Total, Vat, Net Total Calculations*/
$(document).on('click', '.plus', function(e) {
    e.preventDefault();
    let $quanInput = $(this).closest('.input-group').find('input.qty');
    let val1 = parseInt($quanInput.val());
    $quanInput.val(val1 + 1).change();

    let $rateInput = $(this).closest('.content-block-row').find('input.item-rate');
    let val2 = parseInt($rateInput.val());

    let $amountInput = $(this).closest('.content-block-row').find('input.item-amount');
    $amountInput.val((val1 + 1) * val2).change();

    let mainParent = $(this).closest('.content-block-row').attr('class').split(' ').pop();
    $('.' + mainParent).find('.qty').text(val1 + 1);
    $('.' + mainParent).find('.item-amount').text((val1 + 1) * val2);

    let mainDiv = $(this).closest('.conten-row-block-main-container').attr('class').split(' ').pop();
    let itemAmount = $('.' + mainDiv).find('.item-amount');
    var sum = 0;
    $(itemAmount).each(function(e) {
        sum += parseInt($(this).val());
    });
    $('.' + mainDiv).find('.inner').text(sum);
    amountTotal();
});

$(document).on('click', '.minus', function(e) {
    e.preventDefault();
    let $quanInput = $(this).closest('.input-group').find('input.qty');
    var val1 = parseInt($quanInput.val());

    let $rateInput = $(this).closest('.content-block-row').find('input.item-rate');
    let val2 = parseInt($rateInput.val());

    let $amountInput = $(this).closest('.content-block-row').find('input.item-amount');
    $amountInput.val((val1 - 1) * val2).change();

    if (val1 > 0) {
        $quanInput.val(val1 - 1).change();
        let mainParent = $(this).closest('.content-block-row').attr('class').split(' ').pop();
        $('.' + mainParent).find('.qty').text(val1 - 1);
        $('.' + mainParent).find('.item-amount').text((val1 - 1) * val2);

        let mainDiv = $(this).closest('.conten-row-block-main-container').attr('class').split(' ').pop();
        let itemAmount = $('.' + mainDiv).find('.item-amount');
        var sum = 0;
        $(itemAmount).each(function(e) {
            sum += parseInt($(this).val());
        });
        $('.' + mainDiv).find('.inner').text(sum);
        amountTotal();
    }
});

function amountTotal() {
    var sum_value = 0;
    $('.item-amount').each(function() {
        sum_value += +$(this).val();
        $('.amountTotal').val(sum_value);
        $('.amountTotal').text(sum_value);
    });

    var amountTotal = parseInt($('.amountTotal').val());

    //The percent that we want to get.
    var percentToGet = 5;

    //Calculate the percent.
    var percentCal = (percentToGet / 100) * amountTotal;

    var percentRoundOff = parseInt(Math.ceil(percentCal));
    //Alert it out for demonstration purposes.
    // alert(percentToGet + "% of " + amountTotal + " is " + percent);

    $('.vatPercent').val(percentRoundOff);
    $('.vatPercent').text(percentRoundOff);
    let netTotal = amountTotal + percentRoundOff
    $('.netTotal').val(netTotal);
    $('.netTotal').text(netTotal);
}
/*Amount Total, Vat, Net Total Calculations*/
</script>
@endsection