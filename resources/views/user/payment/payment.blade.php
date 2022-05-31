@extends('user.layout.app')
@section('content')
<section class="pb-5 login_content_wraper">
    <div class="container-lg container-fluid">
        <div class="row">
            <div class="col-lg-10  mx-auto">
                <div class="main_content_wraper dashboard mt-1 mt-lg-5 mt-md-5">
                    <h4 class="sec_main_heading text-center mb-0">SELF PAYMENTS</h4>
                    <p class="sec_main_para text-center">Choose and add your payment details below</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-10 col-md-12 mx-auto">
                <form method="post" action="{{ route('user.payment-info') }}">
                    @csrf
                    <input type="hidden" name="user_bid_id" value="{{$vendorbid->user_bid_id}}">
                    <input type="hidden" name="vendor_bid_id" value="{{$vendorbid->id}}">
                    <input type="hidden" name="garage_id" value="{{$vendorbid->garage_id}}">
                    <input type="hidden" name="amount" value="{{$vendorbid->price}}">
                    <div class="row g-2">
                        <div class="col-lg-5 col-md-5 col-sm-5">
                            <div class=" billing_info">
                                <h5 class="heading-color">Billing Info</h5>
                            </div>

                            <div class="inpu_wraper mb-3">
                                <input type="text" class="form-control" name="customer_name" placeholder="Name" required>
                            </div>
                            <div class="inpu_wraper mb-3">
                                <input type="text" class="form-control" name="customer_address" placeholder="Address" required>
                            </div>
                            <div class="inpu_wraper mb-3">
                                <input type="text" class="form-control" name="customer_postal_code" placeholder="Postal Code" required>
                            </div>
                            <div class="inpu_wraper mb-3">
                                <input type="text" class="form-control" name="customer_city" placeholder="City" required>
                            </div>

                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 ">
                            <div class="payment_divider">
                            </div>

                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5">
                            <div class=" billing_info">
                                <h5 class="heading-color">Payment Info</h5>
                            </div>

                            <div class="inpu_wraper mb-3">
                                <input type="text" class="form-control" name="card_number" placeholder="Card Number" aria-label="Make" required>
                            </div>
                            <div class="inpu_wraper mb-3">
                                <input type="text" class="form-control" name="cardholder_name" placeholder="Cardholder Name" aria-label="Make" required>
                            </div>
                            <div class="inpu_wraper mb-3">
                                <input type="text" class="form-control" name="expiry_date" placeholder="Expiry Date" aria-label="Make" required>
                            </div>
                            <div class="inpu_wraper mb-3">
                                <input type="text" class="form-control" name="cvv" placeholder="CVV" aria-label="Make" required>
                            </div>

                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-xl-8 col-lg-10 col-sm-10 mx-auto">
                            <div class="row">
                                <div class="col-lg-5 col-sm-5">
                                    <button class="btn text-center btn-secondary get_quot block get_appointment" type="submit">CONFIRM ORDER</button>
                                </div>
                                <div class="col-lg-2 col-sm-2">
                                    <div>
                                        <h3 class="conform_order_H3 text-center">OR</h3>
                                    </div>

                                </div>
                                <div class="col-lg-5 col-sm-5">
                                    <a href="insurancePayment.php" class="btn text-center btn-primary get_quot block get_appointment d-flex align-items-center justify-content-center" type="button">PAY VIA INSURANCE COMPANY</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>

        <div class="row  mt-5">
            <div class="col-lg-8 mx-auto">
                <div></div>
                <!-- <div class="conform_btns d-flex  align-items-center justify-content-center">
                  <div class="d-grid gap-2 ">
                    <button class="btn text-center btn-secondary get_quot block get_appointment" type="button">CONFIRM ORDER
                    </button>
                  </div>
                  <div >
                    <h3 class="conform_order_H3">OR</h3>
                  </div>
                  <div class="d-grid gap-2 ">
                    <a href="insurancePayment.php" class="btn text-center btn-primary get_quot block get_appointment d-flex align-items-center justify-content-between" type="button">PAY VIA INSURANCE COMPANY
                    </a>
                  </div>
                </div> -->
            </div>
        </div>
    </div>
</section>
@endsection
