@extends('vendor.auth.layout.app')
@section('content')
<section class="pb-5 login_content_wraper" style="background-image:url(public/assets/images/gradiantbg.jpg);min-height: 100vh">
    <div class="container" >
        <div class="row">
            <div class="col-lg-5 col-md-10 mx-auto">
                <div class="cuatomer_signup_form_wraper">
                    <div class="main_content_wraper">
                        <h1 class="sec_main_heading text-center mb-0">WELCOME BACK!</h1>
                        <p class="sec_main_para text-center mb-0">Fill Up your details to Recover Your Password !</p>
                    </div>

                    <form method="POST" action="{{ route('vendor.password_change') }}" class="pt-5">
                        @csrf
                        <input type="hidden" name="confirm_token" value="{{ $token }}">
                        <div class="col-12 mb-3 signup_input_wraper">
                            <input type="password" class="form-control"  name="password" id="inputEmail" placeholder="New Password">
                            @error('password')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12 mb-3 signup_input_wraper">
                            <input type="password" class="form-control" name="password_confirmation" id="inputEmail" placeholder="Confirm  Password">
                            @error('password_confirmation')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>



                        <div class="col-12 mb-3 signup_input_wraper">
                            <div class="d-grid gap-2 mt-4 mb-4">
                                <button class="btn btn-secondary block get_appointment" type="submit">SUBMIT</button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

