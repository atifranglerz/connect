@extends('vendor.layout.app')
@section('content')
    <section class="pb-5 login_content_wraper" style="background-image:url(public/assets/images/gradiantbg.jpg);">
        <div class="container" >
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-9 mx-auto">
                    <div class="cuatomer_signup_form_wraper mt-5">
                        <div class="main_content_wraper">
                            <h4 class="sec_main_heading text-center mb-0">EDIT</h4>
                            <p class="sec_main_para text-center mb-0">Edit your profile details</p>
                        </div>
                        <form  action="{{ route('vendor.profile.update', $profile->id) }}" method="post" enctype="multipart/form-data" class="pt-5">
                            @csrf
                            @method('put')
                            <div class="col-12 mb-3  signup_input_wraper">
{{--                                <div class="input-images-5">--}}
{{--                                </div>--}}
                                <div id="profileImage">
                                </div>
                            </div>

                            <div class="col-12 mb-3  signup_input_wraper">
{{--                                <div class="input-images-6">--}}
{{--                                </div>--}}
                                <!-- <label class="img_wraper_label">
                                  <div class="file_icon_wraper">
                                    <img src="assets/images/fileuploadicon.svg">
                                  </div>
                                  <p class="mb-0">Upload Your ID</p>
                                  <input type="file" size="60" >
                                </label>  -->
                            </div>
                            <div class="col-12 mb-3 signup_vendor signup_input_wraper">
                                <h5 class="mb-0 heading-color">Business Info</h5>
                            </div>

                            <div class="col-12 mb-3  signup_input_wraper">
                                <input type="text" name="name" value="{{$profile->name}}" class="form-control" id="inputName" placeholder="Owner Name">
                                @error('name')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
{{--                            <div class="col-12 mb-3 signup_input_wraper">--}}
{{--                                <input type="text"  name="garage_name"class="form-control" id="inputgarageName" placeholder="Garage Legal Name">--}}
{{--                            </div>--}}
{{--                            <div class="col-12 mb-3 signup_input_wraper">--}}
{{--                                <select class="form-select" name="typeofservice" aria-label="Type of Service">--}}
{{--                                    <option selected>Business Category</option>--}}
{{--                                    <option value="1">2019</option>--}}
{{--                                    <option value="2">2020</option>--}}
{{--                                    <option value="3">2021</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="email"  name="email" value="{{$profile->email}}"class="form-control" id="inputEmail" placeholder="Email">
                                @error('email')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="text" name="country" value="{{$profile->country}}" class="form-control" id="inpuCountry" placeholder="Country">
                                @error('country')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="text" name="city" value="{{$profile->city}}" class="form-control" id="inputNumber" placeholder="City">
                                @error('city')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="number" name="postbox" value="{{$profile->post_box}}" class="form-control" id="inputNumber" placeholder="P/O Box">
                                @error('postbox')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="number" name="phone" value="{{$profile->phone}}" class="form-control" id="inputNumber" placeholder="Telephone No.">
                                @error('phone')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
{{--                            <div class="col-12 mb-3  signup_input_wraper">--}}
{{--                                <div class="input-images-7"></div>--}}
{{--                                <!-- <label class="img_wraper_label">--}}
{{--                                  <div class="file_icon_wraper">--}}
{{--                                    <img src="assets/images/fileuploadicon.svg">--}}
{{--                                  </div>--}}
{{--                                  <p class="mb-0">Upload Your Trade License and ID </p>--}}
{{--                                  <input type="file" size="60" >--}}
{{--                                </label> -->--}}
{{--                            </div>--}}
{{--                            <div class="col-12 mb-3 signup_vendor signup_input_wraper">--}}
{{--                                <h5 class="mb-0 heading-color">Legal Info</h5>--}}
{{--                            </div>--}}
{{--                            <div class="col-12 mb-3 signup_input_wraper">--}}
{{--                                <input type="text" name="edit_profile" class="form-control"  placeholder="Trading License No.">--}}
{{--                            </div>--}}
{{--                            <div class="col-12 mb-3 signup_input_wraper">--}}
{{--                                <input type="text" name="detail" class="form-control"  placeholder="VAT Details">--}}
{{--                            </div>--}}
{{--                            <div class="col-12 mb-3 signup_vendor signup_input_wraper">--}}
{{--                                <h5 class="mb-0 heading-color">Billing Info</h5>--}}
{{--                            </div>--}}
{{--                            <div class="col-12 mb-3 signup_input_wraper">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-6  ">--}}
{{--                                        <select class="form-select" name="typeofarea" aria-label="Type of Service">--}}
{{--                                            <option selected>Area</option>--}}
{{--                                            <option value="1">2019</option>--}}
{{--                                            <option value="2">2020</option>--}}
{{--                                            <option value="3">2021</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-6 ">--}}
{{--                                        <select class="form-select" type="typeofcity" aria-label="Type of Service">--}}
{{--                                            <option selected>City</option>--}}
{{--                                            <option value="1">2019</option>--}}
{{--                                            <option value="2">2020</option>--}}
{{--                                            <option value="3">2021</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="text" value="{{$profile->address}}" name="address" class="form-control"  placeholder="Address">
                                @error('address')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
{{--                            <div class="col-12 mb-3 signup_vendor signup_input_wraper">--}}
{{--                                <h5 class="mb-0 heading-color">Add Number For Appointment</h5>--}}
{{--                            </div>--}}
{{--                            <div class="col-12 mb-3 signup_input_wraper">--}}
{{--                                <input type="text" name="garage_number" class="form-control"  placeholder="Telephone No.">--}}
{{--                            </div>--}}

                            <div class="col-12 mb-3 signup_vendor signup_input_wraper">
                                <h5 class="mb-0 heading-color">Password</h5>
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="password"  name="password"  class="form-control" value="{{$profile->password}}" id="inputNumber" placeholder="Password">
                                @error('password')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="password" name="conform_password"  class="form-control" id="inputNumber" value="{{$profile->password}}" placeholder="Confirm Password">
                                @error('conform_password')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <div class="d-grid gap-2 mt-3 mb-4">
                                    <button class="btn btn-secondary block get_appointment" type="submit">UPDATE YOUR BUSINESS PROFILE
                                    </button>
                                </div>
                            </div>
                        </form>
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
{{--            $('#update-profile').on('submit', function (e) {--}}
{{--                e.preventDefault();--}}
{{--                let formData = new FormData(this);--}}
{{--                var id = {{ \Illuminate\Support\Facades\Auth::id() }}--}}
{{--                $.ajax({--}}
{{--                    type: "post",--}}
{{--                    url: "{{ url('vendor/profile') }}" + '/' + id,--}}

{{--                    data: formData,--}}
{{--                    contentType: false,--}}
{{--                    processData: false,--}}
{{--                    success: (response) => {--}}
{{--                        console.log(response.message);--}}
{{--                        const Toast = Swal.mixin({--}}
{{--                            toast: true,--}}
{{--                            position: 'top-end',--}}
{{--                            showConfirmButton: false,--}}
{{--                            timer: 1000,--}}
{{--                            timerProgressBar: true,--}}
{{--                            didOpen: (toast) => {--}}
{{--                                toast.addEventListener('mouseenter', Swal.stopTimer)--}}
{{--                                toast.addEventListener('mouseleave', Swal.resumeTimer)--}}
{{--                            }--}}
{{--                        })--}}
{{--                        Toast.fire({--}}
{{--                            icon: response.status,--}}
{{--                            title: response.message,--}}
{{--                        });--}}
{{--                        window.setTimeout(function(){location.reload()},1000)--}}
{{--                    }--}}

{{--                });--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
{{--@endsection--}}
@section('script')
    <script>
        $(function() {
            let preloaded = [
                {id: 1, src: 'https://picsum.photos/500/500?random=1'},
            ];
            $('#profileImage').imageUploader({
                preloaded: preloaded,
                maxFiles:1,
            });
        });
    </script>
@endsection