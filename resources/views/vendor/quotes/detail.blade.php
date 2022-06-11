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
                                    <td>{{$data->day}}</td>
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
                            <td> @forelse($data->services as $services)@if($loop->iteration==1){{$services->category->name}}@else, {{$services->category->name}} @endif @empty @endforelse</td>

                            <td>
                                <div class="chat_view__detail d-flex justify-content-center">
                                    <a href="#" class="justify-content-center chat_icon">
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
                            @for($i=0;$i<count($car_images);$i++)
                              <div class="item">
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
                            @for($i=0;$i<count($car_images);$i++)
                                <div class="item">
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
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="all_quote_card  vendor_rply_dtlL _text">
                    <form action="{{ route('vendor.bidresponse') }}" method="post">
                        @csrf
                        <div class="row ">
                            <div class="col-lg-9 mx-auto">
                                <h6 class="heading-color">Services/Labor Details <sup class="fa fa-question label-fa-question" data-toggle="tooltip" data-placement="top" title=' "+" Sign will be used for Addition and "-" Sign will used be for Subtraction'></sup></h6>
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
                                <h6 class="heading-color">Spares Details <sup class="fa fa-question label-fa-question" data-toggle="tooltip" data-placement="top" title=' "+" Sign will be used for Addition and "-" Sign will used be for Subtraction'></sup></h6>
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
                                <h6 class="heading-color">Others <sup class="fa fa-question label-fa-question" data-toggle="tooltip" data-placement="top" title=' "+" Sign will be used for Addition and "-" Sign will used be for Subtraction'></sup></h6>
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
                                        <input type="text"  name="time" class="form-control" placeholder="Estimated Time">
                                        @error('time')<span class="text-danger">{{$message}}</span>@enderror
                                    </div>
                                    <div class="col-lg-12 col-md-12 mb-3">
                                        <div class="form-floating">
                                            <textarea class="form-control" name="description" placeholder="Add information in details" id="floatingTextarea2" style="height: 106px"></textarea>
                                            @error('description')<span class="text-danger">{{$message}}</span>@enderror
                                            <label for="floatingTextarea2">Add Repairing Details</label>
                                        </div>
                                       <div class="row">
                                           <div class="col-lg-6 col-md-6">
                                               <div class="d-grid gap-2 mt-3 mb-4">
                                                   <button class="btn btn-secondary block get_appointment" id="btnSubmit" type="submit">SUBMIT QUOTE</button>
                                               </div>

                                           </div>
                                           <input type="hidden" name="btnType" id="btnType" value="0" >
                                           <div class="col-lg-6 col-md-6">
                                               <div class="d-grid gap-2 mt-3 mb-4">
                                                   <button class="btn btn-secondary block get_appointment" data-toggle="modal" data-target="#privTermsPolicyModal"  type="button">PREVIEW QUOTE</button>
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
    <div class="modal fade" id="privTermsPolicyModal" aria-labelledby="privTermsPolicy" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="privTermsPolicy">Privacy Policy and Terms & Conditions</h6>
                </div>
                <div class="modal-body">
                    <h6 class="sec_main_heading text-center">Privacy Policy</h6>
                    <p class="text-justify">It is Repair My Car policy to respect your privacy regarding any information we may collect while operating our website. This Privacy Policy applies to repairmycar.com. We respect your privacy and are committed to protecting personally identifiable information you may provide us through the Website. We have adopted this privacy policy ("Privacy Policy") to explain what information may be collected on our Website, how we use this information, and under what circumstances we may disclose the information to third parties. This Privacy Policy applies only to information we collect through the Website and does not apply to our collection of information from other sources. This Privacy Policy, together with the Terms and conditions posted on our Website, set forth the general rules and policies governing your use of our Website. Depending on your activities when visiting our Website, you may be required to agree to additional terms and conditions.</p>
                    <h6 class="sec_main_heading text-center">Terms & Conditions</h6>
                    <p class="text-justify">It is Repair My Car policy to respect your privacy regarding any information we may collect while operating our website. This Privacy Policy applies to repairmycar.com. We respect your privacy and are committed to protecting personally identifiable information you may provide us through the Website. We have adopted this privacy policy ("Privacy Policy") to explain what information may be collected on our Website, how we use this information, and under what circumstances we may disclose the information to third parties. This Privacy Policy applies only to information we collect through the Website and does not apply to our collection of information from other sources. This Privacy Policy, together with the Terms and conditions posted on our Website, set forth the general rules and policies governing your use of our Website. Depending on your activities when visiting our Website, you may be required to agree to additional terms and conditions.</p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-primary" id="agreePrivTerms" data-bs-dismiss="modal" style="padding: 8px 16px!important;height: unset">I Agree</button>
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
        $(document).ready(function(){
            $(document).on('click','#preview', function(event){
                // event.preventDefault();
                $('#btnType').val('1');


            });
            $(document).on('click','#btnSubmit', function(event){
                $('#btnType').val('0');


            });

        });
    </script>
@endsection
