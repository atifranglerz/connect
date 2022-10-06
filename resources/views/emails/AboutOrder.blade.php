@component('mail::message')
    <h3>{{ $message['title'] }}</h3>
    <p style="margin: 35px 0 15px;">Dear Customer,</p>
    <p>{{ $message['body1'] }} <a href="{{ $message['link1'] }}">Order No {{ $message['order_no'] }}</a>
        {{ $message['body2'] }} @if (isset($message['link2']))
            <a href="{{ $message['link2'] }}">Chat Now</a> {{ $message['body3'] }}
        @endif </br>You are welcome to contact our support <a href="edev@ranglerz.pw">here</a> team if
        you have any questions.</p>

    @if (isset($message['invoice']))
        <section class="pb-5 login_content_wraper" style="background-image:url(public/vendor/assets/images/gradiantbg.jpg);">
            <div class="container-lg container-fluid">
                <div class="row">
                    <div class="col-lg-10 mx-auto">
                        <div class="main_content_wraper dashboard mt-1 mt-lg-5 mt-md-5 white-background-box">
                            <h5 class="sec_main_heading text-center">{{ $message[1]->vendordetail->garage_name }}
                                {{ __('msg.GARAGE') }}</h5>
                            <p class="sec_main_para text-center">
                                {{ $message[1]->vendordetail->address }}{{ __('msg.P/O Box') }}
                                {{ $message[1]->vendordetail->post_box }}</p>
                            <p class="sec_main_para text-center"><b><b>{{ __('msg.Tel') }}:
                                    </b><span>{{ $message[1]->vendordetail->phone }}</span>
                            </p>
                            <p class="text-center"><b>{{ __('msg.Email') }}:
                                </b>{{ $message[1]->vendordetail->vendor->email }}</p>
                            <h5 class="sec_main_heading text-center my-3">{{ __('msg.JOB ESTIMATE') }}</h5>
                            <div class="table-responsive bg-white">
                                <table class="table table-bordered table-striped table-dark mb-0">
                                    <thead>
                                        <tr>
                                            <th>{{ __('msg.Name') }}</th>
                                            <td colspan="2">{{ $message[1]->vendordetail->vendor->name }}</td>
                                            <th>{{ __('msg.id') }}</th>
                                            <td>{{ mt_rand(1, 999999) }}</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>{{ __('msg.Phone') }}</th>
                                            <td colspan="2">{{ $message[1]->vendordetail->vendor->phone }}</td>
                                            <th>{{ __('msg.Date') }}</th>
                                            <td>{{ \Carbon\Carbon::parse($message[1]->created)->format('d-M-Y') }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <h6 class="mt-3">{{ __('msg.vendor_detail') }}</h6>
                            <div class="table-responsive bg-white">
                                <table class="table table-bordered table-striped table-dark mb-0">
                                    <thead>
                                        <tr>
                                            <th>{{ __('msg.Registration No.') }}</th>
                                            <td>{{ $message[1]->userBid->registration_no }}</td>
                                            <th>{{ __('msg.Total Mileage') }}</th>
                                            <td>{{ $message[1]->userBid->mileage }}</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>{{ __('msg.Car Make') }}</th>
                                            <td>{{ $message[1]->userBid->company->company }}</td>
                                            <th>{{ __('msg.Color') }}</th>
                                            <td>{{ $message[1]->userBid->color }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('msg.Chasis No.') }}</th>
                                            <td>{{ $message[1]->userBid->Chasis_no }}</td>
                                            <th>{{ __('msg.Year') }}</th>

                                            <td>{{ $message[1]->userBid->modelYear->model_year }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <h6 class="mt-3">{{ __('msg.Services Detail') }}:</h6>
                            <div class="table-responsive bg-white">
                                <table class="table table-bordered table-striped table-dark mb-0">
                                    <thead>
                                        <tr>
                                            <th>{{ __('msg.SL No') }}</th>
                                            <th>{{ __('msg.Particular') }}</th>
                                            <th>{{ __('msg.Qty') }}</th>
                                            <th>{{ __('msg.Rate') }}</th>
                                            <th>{{ __('msg.Amount') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $total = 0;
                                            $grand_total = 0;
                                        @endphp
                                        @forelse($message[1]->part as $service)
                                            @if ($service->type == 'services')
                                                @php
                                                    $total += $service->service_rate * $service->service_quantity;
                                                    
                                                @endphp
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $service->service_name }}</td>
                                                    <td>{{ $service->service_quantity }}</td>
                                                    <td><span>{{ $service->service_rate }}</span>.00</td>
                                                    <td><span>{{ $service->service_rate * $service->service_quantity }}</span>.00
                                                    </td>

                                                </tr>
                                            @endif
                                        @empty
                                        @endforelse
                                        @php
                                            $grand_total += $total;
                                        @endphp
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <th>{{ __('msg.Services') }}: </th>
                                            <td><span>{{ $total }}</span>.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <h6 class="mt-3">{{ __('msg.Spares Details') }}:</h6>
                            <div class="table-responsive bg-white">
                                <table class="table table-bordered table-striped table-dark mb-0">
                                    <thead>
                                        <tr>
                                            <th>{{ __('msg.SL No') }}</th>
                                            <th>{{ __('msg.Particular') }}</th>
                                            <th>{{ __('msg.Qty') }}</th>
                                            <th>{{ __('msg.Rate') }}</th>
                                            <th>{{ __('msg.Amount') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $total = 0;
                                        @endphp
                                        @forelse($message[1]->part as $service)
                                            @if ($service->type == 'spares')
                                                @php
                                                    $total += $service->service_rate * $service->service_quantity;
                                                    
                                                @endphp
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $service->service_name }}</td>
                                                    <td>{{ $service->service_quantity }}</td>
                                                    <td><span>{{ $service->service_rate }}</span>.00</td>
                                                    <td><span>{{ $service->service_rate * $service->service_quantity }}</span>.00
                                                    </td>

                                                </tr>
                                            @endif
                                        @empty
                                        @endforelse
                                        @php
                                            $grand_total += $total;
                                        @endphp
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <th>{{ __('msg.Spares') }}: </th>
                                            <td><span>{{ $total }}</span>.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <h6 class="mt-3">{{ __('msg.Others') }}:</h6>
                            <div class="table-responsive bg-white">
                                <table class="table table-bordered table-striped table-dark mb-0">
                                    <thead>
                                        <tr>
                                            <th>{{ __('msg.SL No') }}</th>
                                            <th>{{ __('msg.Particular') }}</th>
                                            <th>{{ __('msg.Qty') }}</th>
                                            <th>{{ __('msg.Rate') }}</th>
                                            <th>{{ __('msg.Amount') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $total = 0;
                                            $grand_toal = 0;
                                        @endphp
                                        @forelse($message[1]->part as $service)
                                            @if ($service->type == 'others')
                                                @php
                                                    $total += $service->service_rate * $service->service_quantity;
                                                @endphp
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $service->service_name }}</td>
                                                    <td>{{ $service->service_quantity }}</td>
                                                    <td><span>{{ $service->service_rate }}</span>.00</td>
                                                    <td><span>{{ $service->service_rate * $service->service_quantity }}</span>.00
                                                    </td>

                                                </tr>
                                            @endif
                                        @empty
                                        @endforelse
                                        @php
                                            $grand_total += $total;
                                        @endphp
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <th>{{ __('msg.Others') }}: </th>
                                            <td><span>{{ $total }}</span>.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="my-3 row mx-0">
                                <div class="offset-xl-8 col-xl-4 offset-md-7 col-md-5 offset-sm-6 col-sm-6">
                                    <div class="row">
                                        <b class="col-6">{{ __('msg.Estimate Total') }}</b>
                                        <div class="col-6 text-xl-right">
                                            <span><span>{{ $grand_total }}</span>.00</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <b class="col-6">{{ __('msg.vat') }}
                                            {{ $message[1]->vendordetail->vat }}%</b>
                                        <div class="col-6 text-xl-right">
                                            <span>{{ $message[1]->vat }}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <b class="col-6">{{ __('msg.Net Total') }}</b>
                                        <div class="col-6 text-xl-right">
                                            <span>{{ $grand_total + $message[1]->vat }}</span>
                                        </div>
                                    </div>
                                    @if ($message['invoice'] == 'quote')
                                        <div class="row">
                                            <b class="col-6">Paid 30% of Total</b>
                                            <div class="col-6 text-xl-right">
                                                <span>{{ $message['paid'] }}</span>
                                            </div>
                                        </div>
                                    @elseif($message['invoice'] == 'order')
                                        <div class="row">
                                            <b class="col-6">Paid Remaining Total</b>
                                            <div class="col-6 text-xl-right">
                                                <span>{{ $message['paid'] }}</span>
                                            </div>
                                        </div>
                                    @else
                                        <div class="row">
                                            <b class="col-6">Payment will pay by Your Insurance Company</b>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div>
                                <p class="font-italic">{{ $message[1]->description }}</p>
                                <p class="font-italic">
                                    {{ __('msg.Remarks: ALL PARTS USED AND AFTERMARKET......... NO WARRANTY') }}
                                </p>
                                <b class="font-italic small">{{ __('msg.offer_term') }}</b>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
