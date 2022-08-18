@extends('user.layout.app')
@section('content')
    <section class="pb-5 login_content_wraper" style="background-image:url(public/assets/images/gradiantbg.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="main_content_wraper dashboard mt-1 mt-lg-5 mt-md-5">
                        <h4 class="sec_main_heading text-center mb-0">EDIT YOUR AD FOR USED CAR</h4>
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
                            <form action="{{ route('user.ads.update', $ads->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row g-lg-3 g-2">
                                    <?php
                                        $images = Explode(',', $ads->images);
                                        $preImages = [];
                                        foreach ($images as $image) {
                                            $obj = (object) ['id' => '', 'src' => ''];
                                            $obj->id = $image;
                                            $obj->src = asset($image);
                                            $preImages[] = $obj;
                                        }
                                        $preImages = json_encode($preImages);

                                        //update the documents images
                                        $docx = Explode(',', $ads->document_file);
                                        $preDocx = [];
                                        foreach ($docx as $doc) {
                                            $obj = (object) ['id' => '', 'src' => ''];
                                            $obj->id = $doc;
                                            $obj->src = asset($doc);
                                            $preDocx[] = $obj;
                                        }
                                        $preDocx = json_encode($preDocx);
                                    ?>
                                    <div class="col-lg-6 col-md-6 mb-3">
                                        <div class="car_images">
                                        </div>
                                        @error('car_images')
                                            <div class="text-danger p-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6 mb-3">
                                        <div class="doc_images">
                                        </div>
                                        @error('files')
                                            <div class="text-danger p-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <input type="text" name="model" class="form-control" placeholder="Model"
                                            value="{{ $ads->model }}" aria-label="Model">
                                        @error('model')
                                            <div class="text-danger p-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <select class="form-select" name="company_id" aria-label="Type of Service">
                                            <option value="{{ $ads->company_id }}" selected>{{ $ads->company->company }}
                                            </option>
                                            @foreach ($company as $data)
                                                <option value="{{ $data->id }}">{{ $data->company }}</option>
                                            @endforeach
                                        </select>
                                        @error('company_id')
                                            <div class="text-danger p-2">{{ $message }}</div>
                                        @enderror
                                        <span class="text-danger" id="companyError"></span>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <select class="form-select" name="model_year_id" aria-label="Type of Service">
                                            <option value="{{ $ads->model_year_id }}" selected>
                                                {{ $ads->modelYear->model_year }}
                                            </option>
                                            @foreach ($year as $data)
                                                <option value="{{ $data->id }}">{{ $data->model_year }}</option>
                                            @endforeach
                                        </select>
                                        @error('model_year_id')
                                            <div class="text-danger p-2">{{ $message }}</div>
                                        @enderror
                                        <span class="text-danger" id="model_year_Error"></span>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <input type="text" name="price" value="{{ $ads->price }}"
                                            class="form-control" placeholder="Price" aria-label="Price">
                                        @error('price')
                                            <div class="text-danger p-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <input type="text" name="color" value="{{ $ads->color }}"
                                            class="form-control" placeholder="Color" aria-label="Color">
                                        @error('color')
                                            <div class="text-danger p-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <input type="text" name="engine" value="{{ $ads->engine }}"
                                            class="form-control" placeholder="Engine" aria-label="Engine">
                                        @error('engine')
                                            <div class="text-danger p-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <input type="text" name="phone" value="{{ $ads->phone }}"
                                            class="form-control" placeholder="Phone No" aria-label="Price">
                                        @error('phone')
                                            <div class="text-danger p-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <input type="text" name="address" value="{{ $ads->address }}"
                                            class="form-control" placeholder="Address" aria-label="Price">
                                        @error('address')
                                            <div class="text-danger p-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <select class="form-select form-control" name="country" aria-label="Country"
                                            disabled>
                                            <option disabled value="">Select Country</option>
                                            <option value="United Arab Emirates" selected>United Arab Emirates</option>
                                        </select>
                                        @error('country')
                                            <div class="text-danger p-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <select class="form-select form-control" name="city" aria-label="City">
                                            @if (isset($ads->city))
                                                <option selected value="{{ $ads->city }}">{{ $ads->city }}</option>
                                            @endif
                                            <option value="Dubai" @if (old('city') == 'Dubai') selected @endif>Dubai
                                            </option>
                                            <option value="Abu Dhabi" @if (old('city') == 'Abu Dhabi') selected @endif>Abu
                                                Dhabi</option>
                                            <option value="Sharjah" @if (old('city') == 'Sharjah') selected @endif>
                                                Sharjah
                                            </option>
                                            <option value="Ras Al Khaimah"
                                                @if (old('city') == 'Ras Al Khaimah') selected @endif>Ras Al Khaimah</option>
                                            <option value="Ajman" @if (old('city') == 'Ajman') selected @endif>Ajman
                                            </option>
                                        </select>
                                        @error('city')
                                            <div class="text-danger p-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <input type="text" name="mileage" class="form-control"
                                            value="{{ $ads->mileage }}" placeholder="Car Milage" aria-label="Price">
                                        @error('mileage')
                                            <div class="text-danger p-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-floating">
                                            <input class="form-control" name="description"
                                                value="{{ $ads->description }}" valyuplaceholder="Add Repairing Details"
                                                id="floatingTextarea2" style="height: 100px"></input>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="d-grid gap-2 mt-lg-3 mb-lg-4">
                                            <button class="btn btn-secondary block get_appointment" type="submit">NEXT
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
         $(function() {
            let imagePre = <?php echo $preImages; ?>;
            console.log(imagePre);
            $('.car_images').imageUploader({
                preloaded: imagePre,
                imagesInputName: 'car_images',
                preloadedInputName: 'car_old',
                maxFiles: 3,
            });
        });
        //update the documents images
        $(function() {
            let preDocx = <?php echo $preDocx; ?>;
            $('.doc_images').imageUploader({
                preloaded: preDocx,
                imagesInputName: 'doucment',
                preloadedInputName: 'doc_old',
                maxFiles: 3,
            });
        });
    </script>
@endsection
