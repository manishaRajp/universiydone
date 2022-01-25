@extends('backend.university.admin.layouts.master')
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
            <div class="white_shd full margin_bottom_30">
                <div class="container">
                    <div class="row mt-3">
                        <div class="col-md-offset-4 col-md-4 col-lg-offset-3 col-lg-6">
                            <div class="card profile-card-2">
                                <div class="card-body pt-5">
                                    <div class="card-header card-header-primary">
                                        <h4 class="card-title">Merit Round</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form id="meritForm" class="forms-sample myform" method="POST"
                                        action="{{ route('university.merti.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Select Course
                                                :</label>
                                            <div class="col-sm-9">
                                                <select class="form-control @error('course_id') is-invalid @enderror" name="course_id"
                                                    id="course_id"  data-live-search="true">
                                                    <option value=""></option>
                                                    @foreach ($course as $select)
                                                        <option value="{{ $select->id }}">{{ $select->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('course_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleInputUsername2"
                                                class="col-sm-3 col-form-label">round_no</label>
                                            <div class="col-sm-9">
                                                <input type="text"
                                                    class="form-control @error('round_no') is-invalid @enderror"
                                                    id="round_no" name="round_no" value="{{ old('round_no') }}"
                                                    placeholder="round_no">
                                                @error('round_no')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleInputUsername2"
                                                class="col-sm-3 col-form-label">start_date</label>
                                            <div class="col-sm-9">
                                                <input type="date"
                                                    class="form-control @error('start_date') is-invalid @enderror"
                                                    id="start_date" name="start_date" value="{{ old('start_date') }}"
                                                    placeholder="start_date">
                                                @error('start_date')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleInputUsername2"
                                                class="col-sm-3 col-form-label">end_date</label>
                                            <div class="col-sm-9">
                                                <input type="date"
                                                    class="form-control @error('end_date') is-invalid @enderror"
                                                    id="end_date" name="end_date" value="{{ old('end_date') }}"
                                                    placeholder="end_date">
                                                @error('end_date')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">
                                                Decalretion date</label>
                                            <div class="col-sm-9">
                                                <input type="date"
                                                    class="form-control @error('merit_result_declare_date') is-invalid @enderror"
                                                    id="merit_result_declare_date" name="merit_result_declare_date"
                                                    value="{{ old('merit_result_declare_date') }}"
                                                    placeholder="merit_result_declare_date">
                                                @error('merit_result_declare_date')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class=" float-center" style="margin-top: 10px; ">
                                            <button type="submit" class="btn-sm btn-outline-success">Save</button>
                                            <button class="btn-sm btn-outline-danger "> <a
                                                    href="{{ route('university.merti.index') }}"> Cancel</button></a>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <script type="text/javascript">
        $(document).ready(function() {
            $('.select').selectpicker();
        });

        $("#meritForm").validate({
            rules: {
                course_id: {
                    required: true,
                },
                round_no: {
                    required: true,
                    integer: true,
                    range: [1, 3],

                },
                start_date: {
                    required: true,


                },
                end_date: {
                    required: true,
                },
                merit_result_declare_date: {
                    required: true,
                },
            },
            messages: {
                course_id: {
                    required: "Course  is required",
                },
                round_no: {
                    required: "Round no. name is required",
                },
                start_date: {
                    required: "Start Date is required",
                },
                end_date: {
                    required: "End date is required"
                },
                merit_result_declare_date: {
                    required: "Merit declare date is required",
                },

            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass("is-invalid").removeClass("is-valid");
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).addClass("is-valid").removeClass("is-invalid");
            },

        });
    </script>
@endpush
