{{--@extends('user.auth.layout.app')--}}
{{--@section('content')--}}
{{--    <section class="section">--}}
{{--        <div class="container mt-5">--}}
{{--            <div class="row">--}}
{{--                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">--}}
{{--                    <div class="card card-primary">--}}
{{--                        <div class="card-header">--}}
{{--                            <h4>Forget Password</h4>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <form method="POST" action="{{ route('user.reset_password') }}" class="needs-validation" novalidate="">--}}
{{--                                @csrf--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="email">Email</label>--}}
{{--                                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>--}}
{{--                                    @error('email')--}}
{{--                                    <span class="text-danger">{{ $message }}</span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">--}}
{{--                                        Send Email--}}
{{--                                    </button>--}}
{{--                                </div>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--@endsection--}}
@extends('user.auth.layout.app')
@section('content')
<section class="pb-5 login_content_wraper" style="background-image:url(public/assets/images/gradiantbg.jpg); min-height: 100vh;">
    <div class="container" >
        <div class="row">
            <div class="col-lg-5 col-md-10 mx-auto">
                <div class="cuatomer_signup_form_wraper">
                    <div class="main_content_wraper">
                        <h1 class="sec_main_heading text-center mb-0">WELCOME BACK!</h1>
                        <p class="sec_main_para text-center mb-0">Fill Up your details to Recover Your Password !</p>
                    </div>

                    <form class="pt-5">

                        <div class="col-12 mb-3 signup_input_wraper">
                            <input type="email" class="form-control" id="inputEmail" placeholder=" Enter Your Email">
                        </div>



                        <div class="col-12 mb-3 signup_input_wraper">
                            <div class="d-grid gap-2 mt-4 mb-4">
                                <a href ="Newpass.php" class="btn btn-secondary block get_appointment" type="button">SUBMIT
                                </a>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
