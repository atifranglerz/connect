@extends('admin.layout.app')
@section('title', 'Edit Faq')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form method="post" action="{{ url('/admin/update-faq/'. $data->id)  }}">
                                @csrf
                                <div class="card-header">
                                    <h4>Edit Faq</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row"></div>
                                    <div class="form-group">
                                        <label>Question</label>
                                        <input type="text" class="form-control" required="" name="question" value="{{$data->question}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Answer</label>
                                        <input type="text" class="form-control" required="" name="answer" value="{{$data->answer}}">
                                    </div>

                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
