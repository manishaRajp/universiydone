@extends('frontend.layouts.layout-form')
@section('content')
    <link rel="stylesheet " type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
    <div class="container">
        @if($status == false)
        <form class="form-horizontal" role="form" method="POST" action="{{ route('addmoission-confirm.store') }}"
            enctype="multipart/form-data">
            @csrf
            <h2>Addmission Confimation</h2>
            <div class="form-group">
                <label for="merit" class="col-sm-3 control-label">College</label>
                <div class="col-sm-9">
                    <input type="text" id="college_id" name="college_id"
                        class="form-control @error('college_id') is-invalid @enderror"
                        value="{{ $addmission->college->name }}" readonly>
                    @error('college_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            {{-- <div class="form-group">
                <label for="merit" class="col-sm-3 control-label">Course</label>
                <div class="col-sm-9">
                    <input type="text" id="course_id" name="course_id" class="form-control @error('course_id') is-invalid @enderror"
                        value="{{ $addmission->course_id }}" readonly>
                    @error('course_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div> --}}
            <div class="form-group">
                <label for="merit" class="col-sm-3 control-label">Merit</label>
                <div class="col-sm-9">
                    <input type="text" id="merit" name="merit" class="form-control @error('merit') is-invalid @enderror"
                        value="{{ $addmission->merit }}" readonly>
                    @error('merit')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="merit_round_id" class="col-sm-3 control-label">Merit round</label>
                <div class="col-sm-9">
                    <input type="text" id="merit_round_id" name="merit_round_id"
                        class="form-control @error('merit_round_id') is-invalid @enderror"
                        value="{{ $addmission->merit_round_id }}" readonly>
                    @error('merit_round_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="addmission_date" class="col-sm-3 control-label">Addmission Date</label>
                <div class="col-sm-9">
                    <input type="date" id="addmission_date" name="addmission_date"
                        class="form-control @error('addmission_date') is-invalid @enderror"
                        value="{{ $addmission->addmission_date }}" readonly>
                    @error('addmission_date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="addmission_code" class="col-sm-3 control-label">Admission Code</label>
                <div class="col-sm-9">
                    <input type="text" id="addmission_code" name="addmission_code"
                        class="form-control @error('addmission_code') is-invalid @enderror"
                        value="{{ $addmission->addmission_code }}" autofocus readonly>
                    @error('addmission_code')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            {{-- <div class="row mb-3">
                <label for="confirmation_type" class="col-sm-3 control-label">Confirmation Type</label>
                <div class="col-sm-3">
                   <div class="maxl">
                    <label class="radio inline">
                        <input class=" @error('confirmation_type') is-invalid @enderror" type="radio" name="confirmation_type"
                            value="M">
                        <span>MeritBase </span>
                    </label>
                    <label class="radio inline">
                        <input class=" @error('confirmation_type') is-invalid @enderror" type="radio" name="confirmation_type"
                            value="R">
                        <span>ReservedBase</span>
                    </label>
                    @error('confirmation_type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                </div>
            </div> --}}
            <button type="submit" class="btn-lg btn-outline-primary float-center">Submit</button>
            <a href="{{ route('home') }}" class="btn-lg btn-outline-danger"><i
                    class="fa fa-thermometer-full"></i>Cancel</a>
        </form>
        @else
        <p>
           Print A error msg and give link to go for Addmission
        </p>
        @endif
    </div>
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('select').selectpicker();
    });
</script>
