@extends('user.layout.app')
@section('content')
<section class="pb-5 login_content_wraper" style="background-image:url({{ url('public/user/assets/images/gradiantbg.jpg') }});">
    <div class="container-lg container-fluid" >
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="main_content_wraper dashboard mt-1 mt-lg-5 mt-md-5">
                    <h1 class="sec_main_heading text-center mb-0">POST AN AD FOR USED CAR</h1>
                    <p class="sec_main_para text-center">Post Ad For Your Car You Want To Sell</p>
                </div>
            </div>
        </div>


        <div class="row ">
            <div class="col-lg-9 col-md-11 col-sm-12  mx-auto">
                <div class="bid_form_wraper">
                    <div class="row">
                        <div class="col-lg-8 mx-auto px-5 px-lg-1 ">
                        </div>
                        <form enctype="multipart/form-data" method="post" action="{{ route('user.ads.store') }}">
                            @csrf
                            <div class="row g-lg-3 g-2">
                                <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
                                    <div class="input-images"></div>
                                    @error('car_images')
                                    <div class="text-danger p-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
                                    <div class="input-images-3"></div>
                                    @error('doucment')
                                    <div class="text-danger p-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input type="text" name="model" class="form-control" placeholder="Model" aria-label="Model">
                                    @error('model')
                                    <div class="text-danger p-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <select class="form-select" name="company_id" aria-label="Type of Service">
                                        <option value="" selected>company</option>
                                        @foreach($company as $data)
                                            <option value="{{$data->id }}">{{$data->company }}</option>
                                        @endforeach
                                    </select>
                                    @error('company_id')
                                    <div class="text-danger p-2">{{ $message }}</div>
                                    @enderror
                                    <span class="text-danger" id="companyError"></span>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <select class="form-select" name="model_year_id" aria-label="Type of Service">
                                        <option value="" selected>Year</option>
                                        @foreach($year as $data)
                                            <option value="{{$data->id }}">{{$data->model_year }}</option>
                                        @endforeach
                                    </select>
                                    @error('model_year_id')
                                    <div class="text-danger p-2">{{ $message }}</div>
                                    @enderror
                                    <span class="text-danger" id="model_year_Error"></span>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input type="number" name="price" class="form-control" placeholder="Price" aria-label="Price">
                                    @error('price')
                                    <div class="text-danger p-2">{{ $message }}</div>
                                    @enderror
                                    <span class="text-danger" id="priceError"></span>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input type="text" name="color" class="form-control" placeholder="Color" aria-label="Color">
                                    @error('color')
                                    <div class="text-danger p-2">{{ $message }}</div>
                                    @enderror
                                    <span class="text-danger" id="colorError"></span>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input type="text" name="engine" class="form-control" placeholder="Engine" aria-label="Engine">
                                    @error('engine')
                                    <div class="text-danger p-2">{{ $message }}</div>
                                    @enderror
                                    <span class="text-danger" id="engineError"></span>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input type="number" name="phone" class="form-control" placeholder="Phone No" aria-label="Price">
                                    @error('phone')
                                    <div class="text-danger p-2">{{ $message }}</div>
                                    @enderror
                                    <span class="text-danger" id="phoneError"></span>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input type="text" name="address" class="form-control" placeholder="Address" aria-label="Price">
                                    @error('address')
                                    <div class="text-danger p-2">{{ $message }}</div>
                                    @enderror
                                    <span class="text-danger" id="AddressError"></span>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input type="number" name="mileage" class="form-control" placeholder="Car Milage" aria-label="Price">
                                    @error('mileage')
                                    <div class="text-danger p-2">{{ $message }}</div>
                                    @enderror
                                    <span class="text-danger" id="millageError"></span>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-floating">
                                        <div class="form-floating">
                                            <textarea class="form-control" name="description" placeholder="Add Repairing Details" id="floatingTextarea2" style="height: 100px"></textarea>
                                            <label for="floatingTextarea2">Add information in details</label>
                                        </div>
                                        @error('description')
                                        <div class="text-danger p-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="d-grid gap-2 mt-lg-3 mb-lg-4">
                                        <button class="btn btn-secondary block get_appointment" type="submit">NEXT
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
