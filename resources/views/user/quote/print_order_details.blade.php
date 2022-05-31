@extends('user.layout.app')
@section('content')
<section class="pb-5 login_content_wraper" style="background-image:url(public/vendor/assets/images/gradiantbg.jpg);">
    <div class="container-lg container-fluid" >
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="main_content_wraper dashboard mt-1 mt-lg-5 mt-md-5 white-background-box">
                    <h3 class="sec_main_heading text-center">MOTORMEC GARAGE</h1>
                    <p class="sec_main_para text-center">22nd. st. Al Qouz Ind 3, Behind Al Quoz Mall. P.O. Box 391409</p>
                    <p class="sec_main_para text-center"><b>Tel : </b><span>04 3881192</span>, <b>Fax : </b><span>3881433</span></p>
                    <p class="sec_main_para text-center"><b>email : </b><span>motormecdubai@gmail.com</span></p>
                    <h5 class="sec_main_heading text-center my-3">JOB ESTIMATE</h1>
                    <div class="table-responsive bg-white">
                        <table class="table table-bordered table-striped table-dark mb-0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <td colspan="2">Mr. ABDUL QADAR</td>
                                    <th>Est. No.</th>
                                    <td>12390</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Phone</th>
                                    <td>0558123939</td>
                                    <th>Fax :</th>
                                    <th>Est. Date</th>
                                    <td>04-May-2021</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <h6 class="mt-3">Vehicle Detail :</h1>
                    <div class="table-responsive bg-white">
                        <table class="table table-bordered table-striped table-dark mb-0">
                            <thead>
                                <tr>
                                    <th>Registration No.</th>
                                    <td>15271 - M</td>
                                    <th>Milage Kms.</th>
                                    <td>296988</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Make</th>
                                    <td>AUDI Q7</td>
                                    <th>Color</th>
                                    <td>WHITE</td> 
                                </tr>
                                <tr>
                                    <th>Chasis No.</th>
                                    <td>WA1AGDFE4ED000457</td>
                                    <th>Year</th>
                                    <td>2013</td> 
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <h6 class="mt-3">Services Detail :</h1>
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
                                <tr>
                                    <td>1</td>
                                    <td>POWER STEERING OIL COOLER ( USED)</td>
                                    <td>1</td>
                                    <td><span>750</span>.00</td>
                                    <td><span>750</span>.00</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <th>Spares : </th>
                                    <td><span>750</span>.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <h6 class="mt-3">Spares Detail :</h1>
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
                                <tr>
                                    <td>1</td>
                                    <td>POWER STEERING OIL COOLER ( USED)</td>
                                    <td>1</td>
                                    <td><span>750</span>.00</td>
                                    <td><span>750</span>.00</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <th>Spares : </th>
                                    <td><span>750</span>.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <h6 class="mt-3">Others :</h1>
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
                                <tr>
                                    <td>1</td>
                                    <td>POWER STEERING OIL COOLER ( USED)</td>
                                    <td>1</td>
                                    <td><span>750</span>.00</td>
                                    <td><span>750</span>.00</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <th>Spares : </th>
                                    <td><span>750</span>.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="my-3 row mx-0">
                        <div class="offset-xl-8 col-xl-4 offset-md-7 col-md-5 offset-sm-6 col-sm-6">
                            <div class="row">
                                <b class="col-6">Estimate Total</b>
                                <div class="col-6 text-xl-right">
                                    <span><span>6,815</span>.00</span>
                                </div>
                            </div>
                            <div class="row">
                                <b class="col-6">VAT 5%</b>
                                <div class="col-6 text-xl-right">
                                    <span>3401</span>
                                </div>
                            </div>
                            <div class="row">
                                <b class="col-6">Net Total</b> 
                                <div class="col-6 text-xl-right">
                                    <span>7,155.75</span>
                                </div>
                            </div>                            
                        </div>
                    </div>
                    <div>
                        <ul class="font-italic px-4">
                            <li>
                                The above estimate is an approximate and is based on our initial inspection of the vehicle. An additional estimate shall be prepared and send for any extra work or parts required, after dismantling
                            </li>
                            <li>
                                When an estimation for repair is given, it is understood that the total cost of repair would be ±25% of the
                                estimated amount. After preparation of the estimation, if the customer does not repair the car he/she should pay a
                                minimum of AED 450/- or more ( depending on the diagnose time expenditure) will be charged if job estimated and
                                not repaired / pulled out.
                            </li>
                            <li>
                                If estimate value is above AED 1000 customer is required to make full advance payment for parts and 50% of labour.
                            </li>
                            <li>Estimate is valid for 7 days only</li>
                            <li>Vehicle delivery is subject to availability of parts.</li>
                            <li>Signed copy of estimate with approval has to be sent for commencement of work.</li>
                            <li>Vehicle once ready for delivery should be collected with in 3 days, after which MOTORMEC GARAGE will not be liable for any damages or losses.</li>
                            <li>Please note after replacement/repair of the above any additional requirement if required can only be ascertained after testing of said repair/replacement.</li>
                        </ul>
                        <p class="font-italic">Remarks : ALL PARTS USED AND AFTER MARKET......... NO WARRANTY</p>
                        <div class="row mb-3">
                            <div class="col-sm-6">
                                <b>Customer's Signature</b>
                                <span class="px-3">-------</span>
                            </div>
                            <div class="col-sm-6">
                                <b>Workshop Manager Signature</b>
                                <span class="px-3">-------</span>
                            </div>
                        </div>
                        <b class="font-italic small">
                            Please Note : Vehicle Must be collected with 3 days of Invoice/Estimate date, Failing which there
                            will be a parking charge of AED 50/- per day incurred by customer. Motormec will not be
                            responsible if the vehcile is collected / picked / impounded by Dubai local authorities for which
                            it will be the customers responibility to get the vehicle released at thier own costs.
                        </b>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
    <script>
        
    </script>
@endsection