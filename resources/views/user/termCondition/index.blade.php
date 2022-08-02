@extends('user.layout.app')
@section('content')
    <section class="m-4 p-4 rounded login_content_wraper">
        <h4 class="sec_main_heading">Agreement</h4>
        <h5 class="sec_main_heading text-center">Privacy Policy</h6>
            <p class="text-justify">{!! $data['policy']->description !!}</p>
            <h6 class="sec_main_heading text-center">Terms & Conditions</h6>
            <p class="text-justify">{!! $data['terms']->description !!}</p>
        </section>
@endsection