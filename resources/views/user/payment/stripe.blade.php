<!DOCTYPE html>
<html>

<head>
    <title>Laravel 8 - Stripe Payment Gateway Integration Example - ItSolutionStuff.com</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style type="text/css">
        .panel-title {
            display: inline;
            font-weight: bold;
        }

        .display-table {
            display: table;
        }

        .display-tr {
            display: table-row;
        }

        .display-td {
            display: table-cell;
            vertical-align: middle;
            width: 61%;
        }
    </style>
</head>

<body>

    <div class="container">

        
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h1>Stripe Payment Gateway</h1>
                <div class="panel panel-default credit-card-box">
                    <div class="panel-heading display-table">
                        <div class="row display-tr">
                            <h3 class="panel-title display-td">Payment Details</h3>
                            <div class="display-td">
                                <img class="img-responsive pull-right" src="data:image/jpeg;base64,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">
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">

                        @if (Session::has('success'))
                            <div class="alert alert-success text-center">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <p>{{ Session::get('success') }}</p>
                            </div>
                        @endif

                        <form role="form" action="{{ route('user.stripe.post') }}" method="post"
                            class="require-validation" data-cc-on-file="false"
                            data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                            @csrf

                            <div class='form-row row'>
                                <div class='col-xs-12 form-group required'>
                                    <label class='control-label'>Payment</label>
                                    <input class='form-control' size='4' type='text' name="payment">
                                </div>
                                <div class='col-xs-12 form-group required'>
                                    <label class='control-label'>Name on Card</label> 
                                    <input class='form-control' size='4' type='text' name="name">
                                </div>
                            </div>

                            <div class='form-row row'>
                                <div class='col-xs-12 form-group card required'>
                                    <label class='control-label'>Card Number</label> 
                                    <input autocomplete='off' class='form-control card-number' name="card-number" size='20' type='text'>
                                </div>
                            </div>

                            <div class='form-row row'>
                                <div class='col-xs-12 col-md-4 form-group cvc required'>
                                    <label class='control-label'>CVC</label> 
                                    <input autocomplete='off' class='form-control card-cvc' name="card-cvc" placeholder='ex. 311' size='4' type='text'>
                                </div>
                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                    <label class='control-label'>Expiration Month</label> 
                                    <input class='form-control card-expiry-month' name="expiry-month" placeholder='MM' size='2' type='text'>
                                </div>
                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                    <label class='control-label'>Expiration Year</label> <input class='form-control card-expiry-year' name="expiry-year" placeholder='YYYY' size='4' type='text'>
                                </div>
                            </div>

                            <div class='form-row row'>
                                <div class='col-md-12 error form-group hide'>
                                    <div class='alert-danger alert'>Please correct the errors and try
                                        again.</div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12">
                                    <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script type="text/javascript">
    $(function() {

        var $form = $(".require-validation");

        $('form.require-validation').bind('submit', function(e) {
            var $form = $(".require-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]',
                    'input[type=text]', 'input[type=file]',
                    'textarea'
                ].join(', '),
                $inputs = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.error'),
                valid = true;
            $errorMessage.addClass('hide');

            $('.has-error').removeClass('has-error');
            $inputs.each(function(i, el) {
                var $input = $(el);
                if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorMessage.removeClass('hide');
                    e.preventDefault();
                }
            });

            if (!$form.data('cc-on-file')) {
                e.preventDefault();
                Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
                }, stripeResponseHandler);
            }

        });

        function stripeResponseHandler(status, response) {
            if (response.error) {
                $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text(response.error.message);
            } else {
                /* token contains id, last4, and card type */
                var token = response['id'];

                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
            }
        }

    });
</script>

</html>
{{-- <section class="pb-5 login_content_wraper">
    <div class="container-lg container-fluid">
        <div class="row">
            <div class="col-lg-10  mx-auto">
                <div class="main_content_wraper dashboard mt-1 mt-lg-5 mt-md-5">
                    <h4 class="sec_main_heading text-center mb-0">{{ __('msg.SELF PAYMENTS') }}</h4>
                    <p class="sec_main_para text-center">{{ __('msg.Choose and add your payment details below') }}</p>
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
                <form role="form" action="{{ route('user.stripe.post') }}" method="POST"
                    class="require-validation" data-cc-on-file="false"
                    data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                    @csrf
                    <input type="hidden" name="user_bid_id" value="{{ $vendorbid->user_bid_id }}">
                    <input type="hidden" name="vendor_bid_id" value="{{ $vendorbid->id }}">
                    <input type="hidden" name="garage_id" value="{{ $vendorbid->garage_id }}">
                    <input type="hidden" name="amount" value="{{ $vendorbid->net_total }}">
                    <div class="row g-2">
                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Payment</label>
                                <input class='form-control' size='4' type='text' name="payment">
                            </div>
                        </div>
                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Name on Card</label>
                                <input class='form-control' size='4' type='text' name="name">
                            </div>
                        </div>

                        <div class='form-row row'>
                            <div class='col-xs-12 form-group  required'>
                                <label class='control-label'>Card Number</label>
                                <input autocomplete='off' class='form-control card-number' name="card-number"
                                    size='20' type='text'>
                            </div>
                        </div>

                        <div class='form-row row'>
                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                <label class='control-label'>CVC</label>
                                <input autocomplete='off' class='form-control card-cvc' name="card-cvc"
                                    placeholder='ex. 311' size='4' type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Month</label>
                                <input class='form-control card-expiry-month' name="expiry-month" placeholder='MM'
                                    size='2' type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Year</label> <input
                                    class='form-control card-expiry-year' name="expiry-year" placeholder='YYYY'
                                    size='4' type='text'>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-xl-8 col-lg-10 col-sm-10 mx-auto">
                            @if ($type == 'order')
                                <input type="hidden" name="type" value="order">
                                <div class="col-sm-5 mx-auto center">
                                    <button class="btn btn-primary btn-lg btn-block"
                                        type="submit">{{ __('msg.COMPLETE PAYMENT') }}</button>
                                </div>
                            @else
                                <div class="row">
                                    <input type="hidden" name="type" value="quote">
                                    @if ($status == 'no')
                                        <div class="col-sm-5 mx-auto center">
                                            <button class="btn btn-primary btn-lg btn-block"
                                                type="submit">{{ __('msg.CONFIRM ORDER') }}</button>
                                        </div>
                                    @else
                                        <div class="col-lg-5 col-sm-5">
                                            <button class="btn btn-primary btn-lg btn-block"
                                                type="submit">{{ __('msg.CONFIRM ORDER') }}</button>
                                        </div>
                                        <div class="col-lg-2 col-sm-2">
                                            <div>
                                                <h5 class="conform_order_H3 text-center">{{ __('msg.OR') }}</h5>
                                            </div>

                                        </div>
                                        <div class="col-lg-5 col-sm-5">
                                            <a href="{{ route('user.payment-insurance', $vendorbid->id) }}"
                                                class="btn text-center btn-primary get_quot block get_appointment d-flex align-items-center justify-content-center"
                                                type="button">{{ __('msg.PAY VIA INSURANCE COMPANY') }}</a>
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
</section> --}}