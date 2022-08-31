@extends('vendor.layout.app')
@section('content')
    <section class="pb-5 login_content_wraper">
        <div class="container-lg container-fluid">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="main_content_wraper dashboard mt-1 mt-lg-5 mt-md-5">
                        @if ($order->status == 'cancelled')
                            <h4 class="sec_main_heading text-center mb-0"> {{__('msg.ORDER CANCELED')}}</h4>
                        @else
                            <h4 class="sec_main_heading text-center mb-0">{{__('msg.Active Orders')}}</h4>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row g-2">
                <div class="col-lg-6 col-md-12 col-sm-12 col-11  mx-auto">
                    <div class="all_quote_card replies_allquot ">
                        <?php
                        $userbidid = \App\Models\UserBid::where('id', $order->user_bid_id)->first();
                        $insurancestatus = \App\Models\InsuranceRequest::where('vendor_bid_id', $order->vendor_bid_id)->first();
                        $company = \App\Models\Company::where('id', $userbidid->company_id)->first();
                        $userbidimage = \App\Models\UserBidImage::where([['user_bid_id', $order->userbid->id], ['type', 'image']])->first();
                        $userbidimage = explode(',', $userbidimage->car_image);
                        // $userbidimage = \App\Models\UserBidImage::where('user_bid_id', $userbidid->id)->get();
                        $user = \App\Models\User::find($order->userbid->user_id);
                        // dd($user);
                        ?>
                        <div class=" w-100  quote_detail_wraper replies ">
                            <div class="quote_info">
                                <h5 class="d-flex align-items-center active_quote nowrape ">{{ $company->company }}
                                    ({{ $userbidid->model }})</h5>
                                <p class="mb-0">{{ $userbidid->car_owner_name }}</p>

                                <p class="mb-0">{{ $user->phone }}</p>
                                <p class="milage">{{__('msg.mileage')}} <span>{{ $userbidid->mileage }}{{__('msg.Km')}}</span></p>
                            </div>
                            <div class="quote_detail_btn_wraper replies">
                                <h5 class="vendor_order_id">{{__('msg.Order Id:')}} #{{ $order->order_code }}</h5>
                                <div class="d-flex chat_view__detail qoute_replies vendor_order ">
                                    <h5 class="">{{ $userbidid->day }} Days</h5>
                                    <form action="{{ route('vendor.queryChat') }}" method="POST" class="chat_view__detail">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $userbidid->user_id }}">
                                        <input type="hidden" name="order_no" value="{{ $order->order_code }}">
                                        <input type="hidden" name="order_id" value="{{ $order->id }}">
                                        <button type="submit" class="chat_icon"><i
                                                class="fa-solid fa-message"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-11  mx-auto">
                    <div class="all_quote_card  replies_allquot h-100">
                        <div class=" w-100  quote_detail_wraper replies payviainsu">
                            <div class="quote_detail_btn_wraper">
                                <div class="d-flex align-items-center chat_view__detail allreplies mb-4">
                                    <div class="pay_via_insurance_header_garages">
                                        @if ($order->paid_by == 'company')
                                            @if ($insurancestatus->status == 0)
                                                <p>{{__('msg.Payment Is Pending')}}</p>
                                            @endif
                                            @if ($insurancestatus->status == 1)
                                                <p>{{__('msg.Paid via Insurance')}}</p>
                                            @endif
                                        @else
                                            <p>{{__('msg.Paid By Customer')}}</p>
                                        @endif
                                        <i class="bi bi-star-fill"></i>
                                    </div>

                                </div>
                                <a href="{{ url('vendor/print-order-details', $order->vendor_bid_id) }}">{{__('msg.view invoice')}}</a>
                            </div>
                            <div class="quote_info">
                                <h5 class="d-flex align-items-center active_quote nowrape"> {{__('msg.Budget')}}</h5>
                                <div class="quote_detail_btn_wraper">
                                    <h5 class="quotereplies">Total: {{ $order->total }} {{__('msg.AED')}}</h5>
                                    @if ($order->status != 'complete')
                                    <h5 class="quotereplies">Paid: {{ $order->advance }} {{ __('msg.AED') }}</h5>
                                @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row  mt-5">
                <div class="col-lg-12">

                    <div class="all_quote_card  vendor_rply_dtlL _text mb-5">
                        <h5 class="active_order_req">{{__('msg.Requirements')}}</h5>

                        <div class="vendor__rply__dttl">
                            <p>{{ $userbidid->description1 }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row  ">
                <div class="col-lg-12">
                    <div class="all_quote_card  vendor_rply_dtlL _text mb-5">
                        <div class="owl-carousel carousel_se_03_carousel owl-theme mt-5">
                            @if ($userbidimage && count($userbidimage) == 0)
                                <div class="item">
                                    <div class="carAd_img_wraper doc_img customer_dashboard">
                                        <img src="{{ asset('public/assets/images/no-preview.png') }}">
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="carAd_img_wraper carAd_img_wraper doc_img customer_dashboard">
                                        <img src="{{ asset('public/assets/images/no-preview.png') }}">
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="carAd_img_wraper carAd_img_wraper doc_img customer_dashboard">
                                        <img src="{{ asset('public/assets/images/no-preview.png') }}">
                                    </div>
                                </div>
                            @elseif($userbidimage && count($userbidimage) == 1)
                                @foreach ($userbidimage as $image)
                                    <div class="item">
                                        <div class="carAd_img_wraper doc_img customer_dashboard">
                                            <img src="{{ asset($image) }}">
                                        </div>
                                    </div>
                                @endforeach
                                <div class="item">
                                    <div class="carAd_img_wraper doc_img customer_dashboard">
                                        <img src="{{ asset('public/assets/images/no-preview.png') }}">
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="carAd_img_wraper carAd_img_wraper doc_img customer_dashboard">
                                        <img src="{{ asset('public/assets/images/no-preview.png') }}">
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="carAd_img_wraper carAd_img_wraper doc_img customer_dashboard">
                                        <img src="{{ asset('public/assets/images/no-preview.png') }}">
                                    </div>
                                </div>
                            @elseif($userbidimage && count($userbidimage) == 2)
                                @foreach ($userbidimage as $image)
                                    <div class="item">
                                        <div class="carAd_img_wraper doc_img customer_dashboard">
                                            <img src="{{ asset($image) }}">
                                        </div>
                                    </div>
                                @endforeach
                                <div class="item">
                                    <div class="carAd_img_wraper carAd_img_wraper doc_img customer_dashboard">
                                        <img src="{{ asset('public/assets/images/no-preview.png') }}">
                                    </div>
                                </div>
                            @else
                                @foreach ($userbidimage as $image)
                                    <div class="item">
                                        <div class="carAd_img_wraper doc_img customer_dashboard">
                                            <img src="{{ asset($image) }}">
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="all_quote_card  vendor_rply_dtlL _text">
                <div class="owl-carousel carousel_se_03_carousel owl-theme mt-5 owl-loaded owl-drag">
                    <div class="owl-stage-outer">
                        <div class="owl-stage"
                            style="transform: translate3d(-1488px, 0px, 0px); transition: all 0s ease 0s; width: 5656px;">
                            @foreach ($userbidimage as $image)
                                <?php $pathinfo = pathinfo($image->car_image);
                                $supported_ext = ['docx', 'xlsx', 'pdf'];
                                $src_file_name = $image->car_image;
                                $ext = strtolower(pathinfo($src_file_name, PATHINFO_EXTENSION)); ?>

                                <div class="owl-item cloned" style="width: 297.667px;">
                                    <div class="item">
                                        <div class="carAd_img_wraper carAd_img_wraper doc_img customer_dashboard">
                                            @if ($ext == 'docx')
                                                <a class="text-decoration-none text-reset"
                                                    href="{{ url($image->car_image) }}">
                                                    <img src="{{ asset('public/assets/images/wordicon.png') }}"
                                                        style="height: 100%;">
                                                </a>
                                            @elseif($ext == 'doc')
                                                <a class="text-decoration-none text-reset"
                                                    href="{{ url($image->car_image) }}">
                                                    <img src="{{ asset('public/assets/images/wordicon.png') }}"
                                                        style="height: 100%;">
                                                </a>
                                            @elseif($ext == 'xlsx')
                                                <a class="text-decoration-none text-reset"
                                                    href="{{ url($image->car_image) }}">
                                                    <img src="{{ asset('public/assets/images/excelicon.png') }}"
                                                        style="height: 100%;">
                                                    <a class="text-decoration-none text-reset"
                                                        href="{{ url($image->car_image) }}">
                                                    @elseif($ext == 'pdf')
                                                        <a class="text-decoration-none text-reset"
                                                            href="{{ url($image->car_image) }}">
                                                            <img src="{{ asset('public/assets/images/pdficon.png') }}"
                                                                style="height: 100%;">
                                                        </a>
                                                    @else
                                                        <img src="{{ asset($image->car_image) }}">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="owl-nav disabled">
                        <button type="button" role="presentation" class="owl-prev">
                            <span aria-label="Previous">‹</span>
                        </button>
                        <button type="button" role="presentation" class="owl-next"><span
                                aria-label="Next">›</span></button>
                    </div>
                    <div class="owl-dots">
                        <button role="button" class="owl-dot active">
                            <span></span>
                        </button>
                        <button role="button" class="owl-dot">
                            <span></span>
                        </button>
                        <button role="button" class="owl-dot">
                            <span></span>
                        </button>
                    </div>
                </div>
            </div> --}}
            <div class="row  mt-5">
                <div class="col-lg-12">

                    <div class="all_quote_card  vendor_rply_dtlL _text">
                        <div class="over_view_part carad_data vendor_detail">
                            <h5 class=" text-center mb-5">{{__('msg.REPAIR DETAILS')}}</h5>
                        </div>
                        <div class="vendor__rply__dttl">
                            <p>{{ $userbidid->description2 }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @if ($order->status == 'pending')
                <div class="row">
                    <div class="col-xl-10 col-lg-6  col-md-10 col-sm-10 mx-auto">
                        <div class="row mt-3 mb-4 g-3">

                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="d-grid gap-2 mt-lg-3 ">
                                    <a href="{{ route('vendor.addfund', $order->user_bid_id) }}"
                                        class="btn btn-secondary block get_appointment" type="button"> {{__('msg.ADD FUNDS')}}
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="d-grid gap-2 mt-lg-3 ">
                                    <form action="{{ route('vendor.completeInovoice') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="order_id" value="{{ $order->id }}">
                                        <input type="hidden" name="order_no" value="{{ $order->order_code }}">
                                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                                        @if ($order->paid_by == 'company' && $insurancestatus->status == 0)
                                                <button
                                                    class="btn text-center px-5 btn-primary get_quot block get_appointment d-flex align-items-center justify-content-center disabled"
                                                    type="submit"> {{__('msg.SEND FINAL INVOICE TO CUSTOMER')}} </button>
                                        @else
                                            <button
                                                class="btn text-center px-5 btn-primary get_quot block get_appointment d-flex align-items-center justify-content-center"
                                                type="submit"> {{__('msg.SEND FINAL INVOICE TO CUSTOMER')}} </button>
                                        @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="row  mt-5">
                    <div class="col-lg-12">

                        <div class="all_quote_card  vendor_rply_dtlL _text">
                            <div class="over_view_part carad_data vendor_detail">
                                <h5 class=" text-center mb-5">ORDER CANCEL REASON</h5>
                            </div>
                            <div class="vendor__rply__dttl">
                                <p>{{ $order->reason }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
@section('script')
    <script>
        toastr.options = {
            "closeButton": true,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        $(document).ready(function() {
            <?php if(session('alert-order-success'))
                {
            ?>
            toastr.success('{{ Session::get('alert-order-success') }}');
            <?php
                }
            ?>
        });
    </script>
@endsection
