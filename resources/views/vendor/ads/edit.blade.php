@extends('vendor.layout.app')
@section('content')
    <section class="pb-5 login_content_wraper" style="background-image:url(public/assets/images/gradiantbg.jpg);">
        <div class="container" >
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="main_content_wraper dashboard mt-1 mt-lg-5 mt-md-5">
                        <h1 class="sec_main_heading text-center mb-0">EDIT YOUR AD FOR USED CAR</h1>
                        <p class="sec_main_para text-center">Edit your ad</p>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-lg-9 col-md-11  mx-auto">
                    <div class="bid_form_wraper">
                        <div class="row">
                            <div class="col-lg-8 mx-auto px-5 px-lg-1 ">
                            </div>
                                <form action="{{ route('vendor.ads.update', $ads->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="row g-lg-3 g-2">
                                        <div class="col-lg-6 col-md-6 mb-3">
                                            <div class="input-images">
                                            </div>
                                            <!-- <label class="img_wraper_label">
                                              <div class="file_icon_wraper">
                                                <img src="assets/images/fileuploadicon.svg">
                                              </div>
                                              <p class="mb-0">Upload Car image</p>
                                              <input type="file" size="60" >
                                            </label> -->
                                            @error('car_images')
                                            <div class="text-danger p-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 col-md-6 mb-3">
                                            <div class="input-images-3">
                                            </div>
                                            <!-- <label class="img_wraper_label">
                                              <div class="file_icon_wraper">
                                                <img src="assets/images/fileuploadicon.svg">
                                              </div>
                                              <p class="mb-0">Upload Car image</p>
                                              <input type="file" size="60" >
                                            </label> -->
                                            @error('files')
                                            <div class="text-danger p-2">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6 col-md-6">
                                            <input type="text" name="model" class="form-control" placeholder="Model" value="{{$ads->model}}" aria-label="Model">
                                            @error('model')
                                            <div class="text-danger p-2">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <select class="form-select" name="company_id" aria-label="Type of Service">
                                                <option value="{{$ads->company_id}}" selected>{{$ads->company->company}}</option>
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
                                                <option value="{{$ads->model_year_id}}" selected>{{$ads->modelYear->model_year}}</option>
                                                @foreach($year as $data)
                                                    <option value="{{$data->id }}">{{$data->model_year }}</option>
                                                @endforeach
                                            </select>
                                            @error('model_year_id')
                                            <div class="text-danger p-2">{{ $message }}</div>
                                            @enderror
                                            <span class="text-danger" id="model_year_Error"></span>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <input type="text"  name="price" value="{{$ads->price}}" class="form-control" placeholder="Price" aria-label="Price">
                                            @error('price')
                                            <div class="text-danger p-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <input type="text"  name="color" value="{{$ads->color}}"  class="form-control" placeholder="Color" aria-label="Color">
                                            @error('color')
                                            <div class="text-danger p-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <input type="text" name="engine" value="{{$ads->engine}}" class="form-control" placeholder="Engine" aria-label="Engine">
                                            @error('engine')
                                            <div class="text-danger p-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <input type="text" name="phone"  value="{{$ads->phone}}" class="form-control" placeholder="Phone No" aria-label="Price">
                                            @error('phone')
                                            <div class="text-danger p-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <input type="text" name="address" value="{{$ads->address}}" class="form-control" placeholder="Address" aria-label="Price">
                                            @error('address')
                                            <div class="text-danger p-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <input type="text" name="mileage" class="form-control" value="{{$ads->mileage}}"  placeholder="Car Milage" aria-label="Price">
                                            @error('mileage')
                                            <div class="text-danger p-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-floating">
                      <input class="form-control" name="description" value="{{$ads->description}}" valyuplaceholder="Add Repairing Details" id="floatingTextarea2" style="height: 100px"></input>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="d-grid gap-2 mt-lg-3 mb-lg-4">
                                                <button class="btn btn-secondary block get_appointment" type="submit" >NEXT
                                                </button>
                                            </div>
                                        </div>
                                        <!-- <div class="col-lg-6 col-md-12">
                                          <div class="d-grid gap-2 mt-lg-3 mb-4">
                                            <button class="btn text-center btn-primary get_quot block get_appointment" type="button">GET QUOTES FROM PREFFERED GARAGES
                                            </button>
                                          </div>
                                        </div> -->
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
{{--@section('script')--}}
{{--    <script>--}}
{{--        $.ajaxSetup({--}}
{{--            headers: {--}}
{{--                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--            }--}}
{{--        });--}}
{{--        $(document).ready(function () {--}}
{{--            //alert("abc");--}}
{{--            $('#edit').on('submit', function (e) {--}}
{{--                e.preventDefault();--}}
{{--                var id = {{$ads->id}};--}}
{{--                let formData = new FormData(this);--}}
{{--                $.ajax({--}}
{{--                    type: 'Put',--}}
{{--                    url: "{{ url('vendor/ads') }}" + '/' + id,--}}
{{--                    data: formData,--}}
{{--                    contentType: false,--}}
{{--                    processData: false,--}}
{{--                    success: (response) => {--}}
{{--                        if (response) {--}}
{{--                            this.reset();--}}
{{--                            alert('Image has been uploaded successfully');--}}
{{--                        }--}}
{{--                    }--}}
{{--                });--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
{{--<script type="text/javascript">--}}
{{--    $.ajaxSetup({--}}
{{--        headers: {--}}
{{--            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--        }--}}
{{--    });--}}
{{--    $(".btn-submit").click(function(e){--}}
{{--        e.preventDefault();--}}
{{--        var fd = new FormData (this) ;--}}
{{--        var id = 5 ;--}}
{{--        $.ajax({--}}
{{--            type:'PUT',--}}
{{--            url:"{{ route('ads.update' , 4 ) }}" ,--}}
{{--            data: fd ,--}}
{{--            success:function(data){--}}
{{--                alert(data);--}}
{{--            }--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}
{{--@endsection--}}

