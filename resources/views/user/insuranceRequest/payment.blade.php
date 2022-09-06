@extends('user.layout.app')
@section('content')
    <section class="pb-5 login_content_wraper">
        <div class="container-lg container-fluid">
            <div class="row">
                <div class="col-lg-10  mx-auto">
                    <div class="main_content_wraper dashboard mt-1 mt-lg-5 mt-md-5">
                        <h4 class="sec_main_heading text-center mb-0">{{ __('msg.SELF PAYMENTS') }}</h4>
                        <p class="sec_main_para text-center">{{ __('msg.Choose and add your payment details below') }}</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-10 col-md-12 mx-auto">
                    <form role="form" action="{{ route('user.pay-payment') }}" method="POST" class="require-validation"
                        data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                        @csrf
                        <div class="row g-2">
                            <input type="hidden" name="vendor_bid_id" value="{{$data->id}}">
                            <div class="col-lg-5 col-md-5 col-sm-5">
                                <div class=" billing_info">
                                    <h5 class="heading-color">{{ __('msg.Payment Info') }}</h5>
                                </div>
                                <div class="inpu_wraper mb-3">
                                    <div class='col-xs-12 form-group required'>
                                        <input class='form-control' value="{{ $data->net_total }} {{ __('msg.AED') }}"
                                            size='4' type='text' readonly name="amount">
                                    </div>
                                </div>
                                <div class="inpu_wraper mb-3">
                                    <div class='col-xs-12 form-group required'>
                                        <input class='form-control' placeholder="{{ __('msg.Cardholder Name') }}"
                                            size='4' type='text' name="name">
                                    </div>
                                </div>

                                <div class="inpu_wraper mb-3">
                                    <div class='col-xs-12 form-group  required'>
                                        <input autocomplete='off' class='form-control card-number'
                                            placeholder="{{ __('msg.Card Number') }}" name="card-number" size='20'
                                            type='text'>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 ">
                                <div class="payment_divider">
                                </div>

                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-5">
                                <div class=" billing_info">
                                    <h5 class="heading-color">{{ __('msg.Payment Info') }}</h5>
                                </div>
                                <div class="inpu_wraper mb-3">
                                    <div class='col-xs-12 form-group cvc required'>
                                        <input autocomplete='off' class='form-control card-cvc' name="card-cvc"
                                            placeholder="CVV" size='4' type='text'>
                                    </div>
                                </div>
                                <div class="inpu_wraper mb-3">
                                    <div class='col-xs-12  form-group expiration required'>
                                        <input class='form-control card-expiry-month' name="expiry-month"
                                            placeholder="{{ __('msg.Expiry Date') }}" size='2' type='text'>
                                    </div>
                                </div>
                                <div class="inpu_wraper mb-3">
                                    <div class='col-xs-12 form-group expiration required'>
                                        <input class='form-control card-expiry-year' name="expiry-year" placeholder='YYYY'
                                            size='4' type='text'>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='form-row row'>
                            <div class='col-md-12 error form-group d-none'>
                                <div class='alert-danger alert'>{{ __('msg.Please correct the errors and try again.') }}
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-xl-8 col-lg-10 col-sm-10 mx-auto">
                                <div class="col-sm-5 mx-auto center">
                                    <button class="btn btn-primary btn-lg btn-block"
                                    type="submit">{{ __('msg.COMPLETE PAYMENT') }}</button>

                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="mt-5">
                        <p>Right now you are going to pay 100% of the total ammount
                            {{ $data->net_total }}, thank you</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
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
                $errorMessage.addClass('d-none');

                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('d-none');
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
@endsection
