@extends('user.layout.app')
@section('content')
<section class="pb-5 login_content_wraper" style="background-image:url(public/vendor/assets/images/gradiantbg.jpg);">
    <div class="container-lg container-fluid">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="main_content_wraper dashboard mt-1 mt-lg-5 mt-md-5 white-background-box">
                    <h5 class="sec_main_heading text-center">{{$data->vendordetail->garage_name}} GARAGE</h4>
                        <p class="sec_main_para text-center">{{$data->vendordetail->address}} P.O. Box
                            {{$data->vendordetail->post_box}}</p>
                        <p class="sec_main_para text-center"><b>Tel : </b><span>{{$data->vendordetail->phone}}</span>,
                            <b>Fax : </b><span>3881433</span>
                        </p>
                        <p class="sec_main_para text-center"><b>email :
                            </b><span>{{$data->vendordetail->vendor->email}}</span></p>
                        <h5 class="sec_main_heading text-center my-3">JOB ESTIMATE</h4>
                            <div class="table-responsive bg-white">
                                <table class="table table-bordered table-striped table-dark mb-0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <td colspan="2">{{$data->vendordetail->vendor->name}}</td>
                                            <th>Est. No.</th>
                                            <td>{{mt_rand(1, 999999)}}</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>Phone</th>
                                            <td>{{$data->vendordetail->vendor->phone}}</td>
                                            <th>Fax :</th>
                                            <th>Est. Date</th>
                                            <td>{{ \Carbon\Carbon::parse($data->created)->format('d-M-Y')}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <h6 class="mt-3">Vehicle Detail :</h4>
                                <div class="table-responsive bg-white">
                                    <table class="table table-bordered table-striped table-dark mb-0">
                                        <thead>
                                            <tr>
                                                <th>Registration No.</th>
                                                <td>{{$data->userBid->registration_no}}</td>
                                                <th>Milage Kms.</th>
                                                <td>{{$data->userBid->mileage}}</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>Make</th>
                                                <td>{{$data->userBid->company->company}}</td>
                                                <th>Color</th>
                                                <td>{{$data->userBid->color}}</td>
                                            </tr>
                                            <tr>
                                                <th>Chasis No.</th>
                                                <td>{{$data->userBid->Chasis_no}}</td>
                                                <th>Year</th>

                                                <td>{{$data->userBid->modelYear->model_year}}</td>
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
                                            @php
                                            $total=0;
                                            $grand_total=0;
                                            @endphp
                                            @forelse($data->part as $service)
                                            @if($service->type=='services')
                                            @php
                                            $total+=$service->service_rate*$service->service_quantity;

                                            @endphp
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$service->service_name}}</td>
                                                <td>{{$service->service_quantity}}</td>
                                                <td><span>{{$service->service_rate}}</span>.00</td>
                                                <td><span>{{$service->service_rate*$service->service_quantity}}</span>.00
                                                </td>

                                            </tr>
                                            @endif
                                            @empty
                                            @endforelse
                                            @php
                                            $grand_total+=$total;
                                            @endphp
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <th>Services : </th>
                                                <td><span>{{$total}}</span>.00</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <h6 class="mt-3">Spares Detail :</h4>
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
                                                @php
                                                $total=0;
                                                @endphp
                                                @forelse($data->part as $service)
                                                @if($service->type=='spares')
                                                @php
                                                $total+=$service->service_rate*$service->service_quantity;

                                                @endphp
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$service->service_name}}</td>
                                                    <td>{{$service->service_quantity}}</td>
                                                    <td><span>{{$service->service_rate}}</span>.00</td>
                                                    <td><span>{{$service->service_rate*$service->service_quantity}}</span>.00
                                                    </td>

                                                </tr>
                                                @endif
                                                @empty
                                                @endforelse
                                                @php
                                                $grand_total+=$total;
                                                @endphp
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <th>Spares : </th>
                                                    <td><span>{{$total}}</span>.00</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <h6 class="mt-3">Others :</h4>
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
                                                    @php
                                                    $total=0;
                                                    $grand_toal=0;
                                                    @endphp
                                                    @forelse($data->part as $service)
                                                    @if($service->type=='others')
                                                    @php
                                                    $total+=$service->service_rate*$service->service_quantity;
                                                    @endphp
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$service->service_name}}</td>
                                                        <td>{{$service->service_quantity}}</td>
                                                        <td><span>{{$service->service_rate}}</span>.00</td>
                                                        <td><span>{{$service->service_rate*$service->service_quantity}}</span>.00
                                                        </td>

                                                    </tr>
                                                    @endif
                                                    @empty
                                                    @endforelse
                                                    @php
                                                    $grand_total+=$total;
                                                    $vat = $grand_total*5/100;
                                                    $vat = number_format($vat, 0, '.', '');
                                                    @endphp
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <th>Others : </th>
                                                        <td><span>{{$total}}</span>.00</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="my-3 row mx-0">
                                            <div class="offset-xl-8 col-xl-4 offset-md-7 col-md-5 offset-sm-6 col-sm-6">
                                                <div class="row">
                                                    <b class="col-6">Estimate Total</b>
                                                    <div class="col-6 text-xl-right">
                                                        <span><span>{{$grand_total}}</span>.00</span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <b class="col-6">VAT 5%</b>
                                                    <div class="col-6 text-xl-right">
                                                        <span>{{$vat}}</span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <b class="col-6">Net Total</b>
                                                    <div class="col-6 text-xl-right">
                                                        <span>{{$grand_total+ $vat}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <p class="font-italic">{{$data->description}}</p>
                                            <p class="font-italic">Remarks : ALL PARTS USED AND AFTER
                                                MARKET......... NO WARRANTY</p>
                                            <b class="font-italic small">
                                                Please Note : Vehicle Must be collected with 3 days of
                                                Invoice/Estimate date, Failing which there
                                                will be a parking charge of AED 50/- per day incurred by customer.
                                                Motormec will not be
                                                responsible if the vehcile is collected / picked / impounded by
                                                Dubai local authorities for which
                                                it will be the customers responibility to get the vehicle released
                                                at thier own costs.
                                            </b>
                                            <div style="display:flex;width: 600px;margin:auto;">

                                                <a href="{{route('user.reject-resolution',$data->id)}}" class="btn text-center px-5 btn-primary get_quot block get_appointment d-flex align-items-center justify-content-center mt-3" >REJECT RESOLUTION</a>
                                                <a class="btn-secondary get_appointment mt-3" href="#" id="pdf">Download
                                                    Pdf</a>
                                                <a href="{{route('user.accept-resolution',$data->id)}}" class="btn text-center px-5 btn-primary get_quot block get_appointment d-flex align-items-center justify-content-center mt-3" >ACCEPT RESOLUTION</a>
                                            </div>
                                        </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script>
$(document).ready(function() {
    $(document).on('click', '#pdf', function(event) {
        $('header').hide();
        $('#dashboardSidebar').hide()
        $('.right_main').css('margin-left', 0)
        $('#pdf').hide();
        window.print();
        $('header').show();
        $('#dashboardSidebar').show()
        $('.right_main').css('margin-left', '255px')
        $('#pdf').show();

    });

});
</script>
@endsection
