@extends('backend.college.admin.layouts.master')
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
                                    <div class="card-header card-header-primary">
                                        <button class="btn-sm btn-outline-danger float-right"> <a
                                                href="{{ route('college.course.index') }}"> Cancel</button></a>
                                        <h4 class="card-title">Select Course</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form class="forms-sample myform" method="POST"
                                        action="{{ route('college.course.store') }}" enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group row">
                                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Select Course
                                                :</label>
                                            <div class="col-sm-9">
                                                <select class="form-control @error('course_id') is-invalid @enderror"
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
                                                class="col-sm-3 col-form-label">seat_no</label>
                                            <div class="col-sm-9">
                                                <input type="text"
                                                    class="form-control @error('seat_no') is-invalid @enderror" id="seat_no"
                                                    name="seat_no" value="{{ old('seat_no') }}" placeholder="seat_no">
                                                @error('seat_no')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleInputUsername2"
                                                class="col-sm-3 col-form-label">Reserved Base</label>
                                            <div class="col-sm-9">
                                                <input type="text"
                                                    class="form-control @error('reserved_seat') is-invalid @enderror"
                                                    id="reserved_seat" name="reserved_seat"
                                                    value="{{ old('reserved_seat') }}" placeholder="reserved_seat">
                                                @error('reserved_seat')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleInputUsername2"
                                                class="col-sm-3 col-form-label">Merit Base</label>
                                            <div class="col-sm-9">
                                                <input type="text"
                                                    class="form-control @error('merit_seat') is-invalid @enderror"
                                                    id="merit_seat" name="merit_seat" value="{{ old('merit_seat') }}"
                                                    placeholder="merit_seat">
                                                @error('merit_seat')
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
            $('.select').selectpicker();
        });
    </script>
@endpush
