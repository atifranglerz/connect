@extends('web.layout.app')
@section('content')
<style>
    .package-block {
        padding-right: 4px;
    }
    .days-block {
        padding: 0 4px;
    }
    @media (max-width: 575px) {
        .package-block {
            padding-right: 12px;
        }
        .days-block {
            padding: 0 4px 0 12px;
        }
    }
</style>
<section class="pb-5 login_content_wraper" style="background-image:url(public/assets/images/gradiantbg.jpg);min-height: 100vh">
    <div class="container" >
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="mt-md-5 mt-3 cuatomer_signup_form_wraper">
                    <div class="main_content_wraper">
                        <h5 class="sec_main_heading text-center mb-0">Post Your Ad</h5>
                    </div>
                    <form class="pt-4 px-2">
                        <div class="row mx-0">
                            <div class="form-group col-sm-4 mb-3 package-block">
                                <select class="form-select form-control" id="package">
                                    <option value="" selected disabled>Select Package</option>
                                    @foreach ($package as $data)
                                    <option value="{{ $data->id }}">{{ $data->package_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-sm-4 col-6 mb-3 days-block">
                                <input type="text" class="form-control" value="" placeholder="Days i.e..." readonly>
                            </div>
                            <div class="form-group col-sm-4 col-6 mb-3 price-block" style="padding-left: 4px">
                                <input type="text" class="form-control" value="" placeholder="Price AED" readonly>
                            </div>
                            <div class="form-group mb-3">
                                <label for="formFile" class="form-label heading-color"><b>Ad Image ({{__('msg.Required')}})</b></label>
                                <input class="form-control" type="file" id="simpleAdImage" accept=".jpeg, .jpg, .png, .PNG, .heic">
                            </div>
                            <div class="form-group col-6" style="padding-right: 4px">
                                <input type="url" class="form-control" name="url" value="{{ old('url') }}" placeholder="URL ({{__('msg.Required')}})" required>
                            </div>
                            <div class="form-group col-6" style="padding-left: 4px">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="{{__('msg.Email')}} ({{__('msg.Required')}})" required>
                            </div>
                            <div class="form-group mt-3">
                                <textarea rows="4" placeholder="Description ({{__('msg.Optional')}})" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="d-grid gap-2 mt-3 mb-4">
                                <button class="btn btn-secondary" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
    <script src="{{asset('public/assets/Check-Image-Resolution/jquery.checkImageSize.min.js')}}"></script>
    <script>
        $(function() {
            $("#package").on("change", function() {
                var id = $(this).val();
                var $this = $(this);
                $.ajax({
                    url: '{{ route('select-package') }}',
                    type: 'GET',
                    data: {
                        'id': id,
                    },
                    success: function(response) {
                        console.log(response.data);
                        $('.days-block input').val(response.data.validity);
                        $('.price-block input').val(response.data.price);
                    }
                });
            });
            $("#simpleAdImage").checkImageSize({
                minWidth: 300,
                minHeight: 300,
                maxWidth: 300,
                maxHeight: 300,
                showError:true,
                ignoreError:false
            });
        });
    </script>
@endsection
