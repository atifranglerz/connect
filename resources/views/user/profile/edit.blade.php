@extends('user.layout.app')
@section('content')
    <section class="pb-5 login_content_wraper">
        <div class="container-lg container-fluid" >
            <div class="row">
                <div class="col-xl-5 col-lg-6 col-md-9 col-sm-9 mx-auto">
                    <div class="cuatomer_signup_form_wraper mt-5">
                        <div class="main_content_wraper">
                            <h4 class="sec_main_heading text-center mb-0">EDIT</h4>
                            <p class="sec_main_para text-center mb-0">Edit your profile details</p>
                        </div>

                        <form class="pt-5" action="{{ route('user.profile.post', $profile->id )}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="col-12 mb-3  signup_input_wraper">
{{--                                <div class="image-uploader-edit"></div>--}}
                                <div id="profileImage">
                                </div>
                            </div>
                            <div class="col-12 mb-3  signup_input_wraper">
                                <input type="text" class="form-control" id="inputName" name="name" placeholder="Full Name" value="{{$profile->name }}">
                                @error('name')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="number" class="form-control" id="inputNumber" name="phone" placeholder="Mobile Number" value="{{ $profile->phone }}">
                                @error('phone')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="email" disabled class="form-control" name="email" id="inputEmail" value="{{ $profile->email }}">
                                @error('email')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="text" class="form-control" id="inputNumber" name="city" placeholder="City" value="{{ $profile->city }}">
                                @error('city')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="text" class="form-control" id="inputNumber" name="country" placeholder="Country" value="{{ $profile->country }}">
                                @error('country')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="number" class="form-control" id="inputNumber" name="post_box" placeholder="P/O Box" value="{{ $profile->post_box }}">
                                @error('post_box')
                                <div class="text-danger p-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <div class="d-grid gap-2 mt-3 mb-4">
                                    <button class="btn btn-secondary block get_appointment" type="submit">UPDATE</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- <div class="row">
              <div class="col-lg-8 mx-auto">
                <h5 class="my-4 text-center login_link_heading">Already have an account ?<a href="#"> Login</a>
                </h5>
              </div>
            </div>
         -->  </div>
    </section>
@endsection
@section('script')
    <script>
        $(function() {
            let preloaded = [
                {id: 1,
                src: '{{asset($profile->image)}}'},
            ];
            $('#profileImage').imageUploader({
                preloaded: preloaded,
                maxFiles:1,
            });
        });
    </script>
@endsection
