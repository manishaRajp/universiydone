@extends('Backend.college.admin.layouts.master')
@section('content')
    <div class="row column_title">
        <div class="col-md-12">
            <div class="page_title">
                <h2></h2>
            </div>
        </div>
    </div>
    <div class="row column1">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class=" full margin_bottom_30">
                <div class="container">
                    <div class="row mt-3">
                        <div class="col-md-offset-4 col-md-4 col-lg-offset-3 col-lg-6">
                            <div class="card profile-card-2">
                                <div class="card-body pt-5">
                                    <button class="btn-sm btn-outline-danger float-right"> <a
                                            href="{{ route('college.merit.index') }}">Cancel</button></a>
                                    <div class="card-header card-header-primary">
                                        <h4 class="card-title">Merit Round</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form class="forms-sample myform" method="POST"
                                        action="{{ route('college.merit.store') }}" enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group row">
                                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Select Course
                                                :</label>
                                            <div class="col-sm-9">
                                                <select
                                                    class="selectpicker form-control @error('course_id') is-invalid @enderror"
                                                    name="course_id" id="course_id" data-live-search="true">
                                                    <option value=""></option>
                                                    @foreach ($course_select as $select)
                                                        <option value="{{ $select->id }}">{{ $select->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('course_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleInputUsername2"
                                                class="col-sm-3 col-form-label">Merit Round</label>
                                            <div class="col-sm-9">
                                                <input type="text"
                                                    class="form-control @error('merit_round_id') is-invalid @enderror"
                                                    id="merit_round_id" name="merit_round_id"
                                                    value="{{ old('merit_round_id') }}" placeholder="merit_round">
                                                @error('merit_round_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">merit</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control @error('merit') is-invalid @enderror"
                                                    id="merit" name="merit" value="{{ old('merit') }}"
                                                    placeholder="merit">
                                                @error('merit')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class=" float-center" style="margin-top: 10px; ">
                                            <button type="submit" class="btn-sm btn-outline-success">Save</button>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-2"></div>
        </div>
        <!-- end row -->
    </div>
@endsection

@push('scripts')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('select').selectpicker();
        });
    </script>
@endpush
