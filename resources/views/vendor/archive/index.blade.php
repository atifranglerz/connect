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
                @if ($attachment->count() > 0)
                    @foreach ($attachment as $data)
                        <?php
                        $file = explode('.', $data->file);
                        $file_name = explode('/', $data->file);
                        ?>
                        @if ($file[1] == 'jpg' || $file[1] == 'png' || $file[1] == 'svg')
                            <div class="item">
                                <p>{{ $data->sender_name }}</p>
                                <div class="carAd_img_wraper doc_img customer_dashboard m-1 mb-5 ">
                                    <a class="position-absolute filedownload" download="{{ $file_name[2] }}" id="{{ $data->id }}" href="{{ asset($data->file) }}" title="image"><i class="fa fa-download" aria-hidden="true"></i></a>
                                    <img src="{{ asset($data->file) }}">
                                    <p class="mt-2">{{ $file_name[2] }}</p>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @else
                    <p>There is no image</p>
                @endif
            </div>
            <div class="d-flex">
                @if ($attachment->count() > 0)
                    @foreach ($attachment as $data)
                        <?php
                            $file = explode('.', $data->file);
                            $file_name = explode('/', $data->file);
                        ?>
                        <div class="item">
                            @if ($file[1] == 'pdf' || $file[1] == 'docx' || $file[1] == 'xlsx' || $file[1] == 'pptx')
                                <p>{{ $data->sender_name }}</p>
                                <div class="carAd_img_wraper doc_img customer_dashboard m-1 mb-5">
                                    <a class="position-absolute filedownload" download="{{ $file_name[2] }}" id="{{ $data->id }}" href="{{ asset($data->file) }}" title="image"><i class="fa fa-download" aria-hidden="true"></i></a>
                                    @if ($file[1] == 'docx')
                                        <img src="{{ asset('public/assets/images/wordicon.png') }}">
                                    @elseif ($file[1] == 'pdf')
                                        <img src="{{ asset('public/assets/images/pdficon.png') }}">
                                    @elseif ($file[1] == 'xlsx')
                                        <img src="{{ asset('public/assets/images/excelicon.png') }}">
                                    @elseif ($file[1] == 'pptx')
                                        <img src="{{ asset('public/assets/images/ppicon.png') }}">
                                    @endif
                                    <p>{{ $file_name[2] }}</p>
                                </div>
                            @endif
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
