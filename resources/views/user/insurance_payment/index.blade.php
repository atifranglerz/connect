@extends('user.layout.app')
@section('content')
    <section class="pb-5 login_content_wraper">
        <div class="container-lg container-fluid">
            <div class="row">
                <div class="col-lg-10  mx-auto">
                    <div class="main_content_wraper dashboard mt-1 mt-lg-5 mt-md-5">
                        <h4 class="sec_main_heading text-center mb-0">PAYMENT VIA INSURANCE COMPANY</h4>
                        <p class="sec_main_para text-center">Now you can pay for your order via insurance company</p>
                    </div>
                </div>
            </div>
            <div class="row  mt-5">
                <div class="col-lg-12">
                    <div class="all_quote_card  vendor_rply_dtlL _text">
                        {{-- <div class=" billing_info via_insurance">
                            <h4 class="heading-color">Select From Your Quotes</h4>
                        </div>
                        <div class="row g-3">
                            <div class="col-lg-12">
                                <div class="all_quote_card pay_via_insurance">
                                    <div class="quote_info">
                                        <h5 class="select_quote heading-color">Car Repair</h5>
                                        <p>Red Suzuki For Repair</p>
                                        <p class="quote_rev"><span>5 </span> Quotes Recieved</p>
                                    </div>
                                    <div class="quote_detail_btn_wraper">
                                        <a href="#" class="btn-secondary pay_via_insurance_btn btn_gray">SELECT</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="all_quote_card pay_via_insurance">
                                    <div class="quote_info">
                                        <h5 class="select_quote heading-color">Car Repair</h5>
                                        <p>Red Suzuki For Repair</p>
                                        <p class="quote_rev"><span>5 </span> Quotes Recieved</p>
                                    </div>
                                    <div class="quote_detail_btn_wraper">
                                        <a href="#" class="btn-secondary pay_via_insurance_btn">SELECTED</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" billing_info via_insurance mt-5">
                            <h4 class="heading-color">Select 3 Quotes You Want</h4>
                        </div>
                        <div class="row g-3">
                            <div class="col-lg-12 col-md-12 col-12 ">
                                <div class="all_quote_card  vendor_rply_dtlL insurancePayment">
                                    <div class="car_inner_imagg vendor_rply_dtl ">
                                        <img src="{{ asset('public/user/assets/images/repair2.jpg') }}">
                                    </div>
                                    <div class=" w-100  quote_detail_wraper">
                                        <div class="quote_info insurancePayment_">
                                            <h5 class="d-flex align-items-center active_quote select_quote heading-color">
                                                Car Repair</h5>
                                            <p class="mb-0">Sharjah, Ajman</p>
                                            <p>+971234567890</p>
                                            <div class="card_icons respons_qoute d-flex align-items-center">
                                                <div class="icon_wrpaer vendor_qoute_dtl">
                                                    <img src="{{ asset('public/user/assets/images/iconrp.svg') }}">
                                                </div>
                                                <div class="icon_wrpaer vendor_qoute_dtl">
                                                    <img src="{{ asset('public/user/assets/images/iconrp2.svg') }}">
                                                </div>
                                                <div class="icon_wrpaer vendor_qoute_dtl">
                                                    <img src="{{ asset('public/user/assets/images/iconrp3.svg') }}">
                                                </div>
                                                <div class="icon_wrpaer vendor_qoute_dtl">
                                                    <img src="{{ asset('public/user/assets/images/iconrp4.svg') }}">
                                                </div>
                                                <div class="icon_wrpaer vendor_qoute_dtl">
                                                    <img src="{{ asset('public/user/assets/images/iconrp5.svg') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="quote_detail_btn_wraper">
                                            <h5 class=" text-sm-center insurance_pyment">AED 1200</h5>
                                            <div class="quote_info">
                                                <div class="quote_detail_btn_wraper">
                                                    <a href="#"
                                                        class="btn-secondary pay_via_insurance_btn crossed">SELECTED <i
                                                            class="bi bi-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-12 ">
                                <div class="all_quote_card  vendor_rply_dtlL insurancePayment">
                                    <div class="car_inner_imagg vendor_rply_dtl ">
                                        <img src="{{ asset('public/user/assets/images/repair2.jpg') }}">
                                    </div>
                                    <div class=" w-100  quote_detail_wraper">
                                        <div class="quote_info insurancePayment_">
                                            <h5 class="d-flex align-items-center active_quote select_quote heading-color">
                                                Car Repair</h5>
                                            <p class="mb-0">Sharjah, Ajman</p>
                                            <p>+971234567890</p>
                                            <div class="card_icons respons_qoute d-flex align-items-center">
                                                <div class="icon_wrpaer vendor_qoute_dtl">
                                                    <img src="{{ asset('public/user/assets/images/iconrp.svg') }}">
                                                </div>
                                                <div class="icon_wrpaer vendor_qoute_dtl">
                                                    <img src="{{ asset('public/user/assets/images/iconrp2.svg') }}">
                                                </div>
                                                <div class="icon_wrpaer vendor_qoute_dtl">
                                                    <img src="{{ asset('public/user/assets/images/iconrp3.svg') }}">
                                                </div>
                                                <div class="icon_wrpaer vendor_qoute_dtl">
                                                    <img src="{{ asset('public/user/assets/images/iconrp4.svg') }}">
                                                </div>
                                                <div class="icon_wrpaer vendor_qoute_dtl">
                                                    <img src="{{ asset('public/user/assets/images/iconrp5.svg') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="quote_detail_btn_wraper">
                                            <h5 class=" text-sm-center insurance_pyment">AED 1200</h5>
                                            <div class="quote_info">
                                                <div class="quote_detail_btn_wraper">
                                                    <a href="#"
                                                        class="btn-secondary pay_via_insurance_btn crossed">SELECTED <i
                                                            class="bi bi-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-12 ">
                                <div class="all_quote_card  vendor_rply_dtlL insurancePayment">
                                    <div class="car_inner_imagg vendor_rply_dtl ">
                                        <img src="{{ asset('public/user/assets/images/repair2.jpg') }}">
                                    </div>
                                    <div class=" w-100  quote_detail_wraper">
                                        <div class="quote_info insurancePayment_">
                                            <h5 class="d-flex align-items-center active_quote select_quote heading-color">
                                                Car Repair</h5>
                                            <p class="mb-0">Sharjah, Ajman</p>
                                            <p>+971234567890</p>
                                            <div class="card_icons respons_qoute d-flex align-items-center">
                                                <div class="icon_wrpaer vendor_qoute_dtl">
                                                    <img src="{{ asset('public/user/assets/images/iconrp.svg') }}">
                                                </div>
                                                <div class="icon_wrpaer vendor_qoute_dtl">
                                                    <img src="{{ asset('public/user/assets/images/iconrp2.svg') }}">
                                                </div>
                                                <div class="icon_wrpaer vendor_qoute_dtl">
                                                    <img src="{{ asset('public/user/assets/images/iconrp3.svg') }}">
                                                </div>
                                                <div class="icon_wrpaer vendor_qoute_dtl">
                                                    <img src="{{ asset('public/user/assets/images/iconrp4.svg') }}">
                                                </div>
                                                <div class="icon_wrpaer vendor_qoute_dtl">
                                                    <img src="{{ asset('public/user/assets/images/iconrp5.svg') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="quote_detail_btn_wraper">
                                            <h5 class=" text-sm-center insurance_pyment">AED 1200</h5>
                                            <div class="quote_info">
                                                <div class="quote_detail_btn_wraper">
                                                    <a href="#"
                                                        class="btn-secondary pay_via_insurance_btn crossed">SELECTED <i
                                                            class="bi bi-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        <div class="row">
                            <div class=" billing_info via_insurance mt-5">
                                <h5 class="heading-color">Select Insurance Company</h5>
                            </div>
                            <form action="{{ route('user.payment-request') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="vendor_bid_id" value="{{ $id ?? '' }}">
                                @if ($errors->has('vendor_bid_id'))
                                    <div class="error text-danger">{{ $errors->first('vendor_bid_id') }}</div>
                                @endif
                                <div class="row g-3">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <select class="form-select" name="company" id="company"
                                            aria-label="Type of Service">
                                            <option selected disabled value="">Select Insurance Company</option>
                                            @foreach ($company->company as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('company'))
                                            <div class="error text-danger">{{ $errors->first('company') }}</div>
                                        @endif
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm  -6">
                                        <input type="email" class="form-control" name="company_email" id="company_email"
                                            value="" placeholder="EMail" readonly>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class=" billing_info via_insurance mt-1">
                                            <h5 class="mb-0 heading-color">Personal Details</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input type="text" class="form-control" name="name" placeholder="Name"
                                            value="{{ Auth::user()->name }}" readonly>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input type="email" class="form-control" name="email" placeholder="EMail"
                                            value="{{ Auth::user()->email }}" readonly>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input type="text" class="form-control" name="phone" placeholder="Phone Number"
                                            value="{{ Auth::user()->phone }}" readonly>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8 mx-auto">
                                        <div class="d-grid gap-2 mt-3 mb-4">
                                            <button class="btn btn-secondary block get_appointment" type="submit">SEND
                                                DETAILS
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script type="text/javascript">
        $(function() {
            $("#company").change(function() {
                var id = $(this).val();
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    headers: {
                        'X-CSRF-Token': '{{ csrf_token() }}',
                    },
                    url: "{{ route('user.email') }}",
                    data: {
                        'id': id
                    },
                    success: function(response) {
                        console.log(response);
                        $('#company_email').val('');
                        $('#company_email').val(response.company.email);
                    }
                });
            });
        });
    </script>
@endsection
