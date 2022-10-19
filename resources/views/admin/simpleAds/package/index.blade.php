@extends('admin.layout.app')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4>All Packages</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div class="d-flex">
                                  @foreach ($packages as $package)
                                  <div class="mr-3">
                                    <h4>{{$package->package_name}}</h4>
                                    <h6>Price</h6>
                                    <p>{{$package->price}}</p>
                                    <h6>Validity</h6>
                                    <p>{{$package->validity}}</p>
                                    <p>
                                        <a href="{{ route('admin.ads.edit', $package->id) }}" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></a>
                                    </p>
                                </div>
                                  @endforeach
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('script')
    <script>
        $(function() {
            $("#table_one").DataTable();
        });
    </script>
@endsection
