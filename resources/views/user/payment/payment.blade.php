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
            <?php
            $garage = \App\Models\Garage::find($vendorbid->garage_id);
            $vendor = \App\Models\Vendor::with('company')->find($garage->vendor_id);
            $user = \App\Models\User::with('company')->find(Auth::id());
            foreach ($vendor->company as $company) {
                if ($user->company[0]->name == $company->name) {
                    $status = 'yes';
                    break;
                } else {
                    $status = 'no';
                }
            }
            ?>
            <div class="row">
                <div class="col-lg-10 col-md-12 mx-auto">
                    <form method="post" action="{{ route('user.payment-info') }}">
                        @csrf
                        <input type="hidden" name="user_bid_id" value="{{ $vendorbid->user_bid_id }}">
                        <input type="hidden" name="vendor_bid_id" value="{{ $vendorbid->id }}">
                        <input type="hidden" name="garage_id" value="{{ $vendorbid->garage_id }}">
                        <input type="hidden" name="amount" value="{{ $vendorbid->net_total }}">
                        <div class="row g-2">
                            <div class="col-lg-5 col-md-5 col-sm-5">
                                <div class=" billing_info">
                                    <h5 class="heading-color">Billing Info</h5>
                                </div>

                                <div class="inpu_wraper mb-3">
                                    <input type="text" class="form-control" name="customer_name" placeholder="Name">
                                </div>
                                <div class="inpu_wraper mb-3">
                                    <input type="text" class="form-control" name="customer_address"
                                        placeholder="Address">
                                </div>
                                <div class="inpu_wraper mb-3">
                                    <input type="text" class="form-control" name="customer_postal_code"
                                        placeholder="Postal Code">
                                </div>
                                <div class="inpu_wraper mb-3">
                                    <input type="text" class="form-control" name="customer_city" placeholder="City">
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
                                    <input type="text" class="form-control" name="card_number" placeholder="Card Number"
                                        aria-label="Make">
                                </div>
                                <div class="inpu_wraper mb-3">
                                    <input type="text" class="form-control" name="cardholder_name"
                                        placeholder="Cardholder Name" aria-label="Make">
                                </div>
                                <div class="inpu_wraper mb-3">
                                    <input type="text" class="form-control" name="expiry_date" placeholder="Expiry Date"
                                        aria-label="Make">
                                </div>
                                <div class="inpu_wraper mb-3">
                                    <input type="text" class="form-control" name="cvv" placeholder="CVV"
                                        aria-label="Make">
                                </div>

                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-xl-8 col-lg-10 col-sm-10 mx-auto">
                                @if ($type == 'order')
                                    <input type="hidden" name="type" value="order">
                                    <div class="col-sm-5 mx-auto center">
                                        <button class="btn text-center btn-secondary get_quot block get_appointment"
                                            type="submit">COMPLETE PAYMENT</button>
                                    </div>
                                @else
                                    <div class="row">
                                        <input type="hidden" name="type" value="quote">
                                        @if ($status == 'no')
                                            <div class="col-sm-5 mx-auto center">
                                                <button class="btn text-center btn-secondary get_quot block get_appointment"
                                                    type="submit">CONFIRM ORDER</button>
                                            </div>
                                        @else
                                            <div class="col-lg-5 col-sm-5">
                                                <button class="btn text-center btn-secondary get_quot block get_appointment"
                                                    type="submit">CONFIRM ORDER</button>
                                            </div>
                                            <div class="col-lg-2 col-sm-2">
                                                <div>
                                                    <h5 class="conform_order_H3 text-center">OR</h5>
                                                </div>

                                            </div>
                                            <div class="col-lg-5 col-sm-5">
                                                <a href="{{ route('user.payment-insurance', $vendorbid->id) }}"
                                                    class="btn text-center btn-primary get_quot block get_appointment d-flex align-items-center justify-content-center"
                                                    type="button">PAY VIA INSURANCE COMPANY</a>
                                            </div>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
@endsection
