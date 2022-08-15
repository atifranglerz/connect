@extends('vendor.layout.app')
@section('content')
    <section class="pb-5 login_content_wraper">
        <div class="container-lg container-fluid">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="main_content_wraper dashboard mt-1 mt-lg-5 mt-md-5">
                        <h3 class="sec_main_heading text-center mb-0">Downloaded File</h3>
                    </div>
                </div>
            </div>
            <div class="d-flex">
                @if ($data->count() > 0)
                    @foreach ($data as $file)
                        <div class="item">
                            <p>{{$file->sender_name}}</p>
                            <div class="carAd_img_wraper doc_img customer_dashboard ">
                                <img src="{{ asset($file->file) }}">
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>There is no file</p>
                @endif

            </div>
        </div>
        </div>
    </section>
@endsection
