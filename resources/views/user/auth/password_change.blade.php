{{--
@extends('admin.auth.layout.app')
@section('content')
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Password Change</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.password_change') }}" class="needs-validation" novalidate="">
                                @csrf
                                <input id="password" type="hidden" class="form-control" name="email" value="{{ $email }}">
                                <div class="form-group">
                                    <label for="password" class="control-label">New Password</label>
                                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                                    @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password" class="control-label">Confirm Password</label>
                                    <input id="password" type="password" class="form-control" name="password_confirmation" tabindex="2" required>
                                    @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        Change Password
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
--}}
@extends('web.layout.app')
@section('content')
    <section class="pb-5 login_content_wraper" style="background-image:url(assets/images/gradiantbg.jpg);min-height: 100vh">
        <div class="container" >
            <div class="row">
                <div class="col-lg-5 col-md-10 mx-auto">
                    <div class="cuatomer_signup_form_wraper">
                        <div class="main_content_wraper">
                            <h1 class="sec_main_heading text-center mb-0">WELCOME BACK!</h1>
                            <p class="sec_main_para text-center mb-0">Fill Up your details to Recover Your Password !</p>
                        </div>
                        <form method="POST" action="{{ route('user.password_change') }}" class="needs-validation pt-5" novalidate="">
                            @csrf
                            <input type="hidden" name="confirm_token" value="{{ $token }}">
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="password" class="form-control" id="inputEmail" name="password" placeholder=" Enter New Password">
                                @error('password')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3 signup_input_wraper">
                                <input type="password" class="form-control" id="inputEmail" name="password_confirmation" placeholder=" Confirm New Password">
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
