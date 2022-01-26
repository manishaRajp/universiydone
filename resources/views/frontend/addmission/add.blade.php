@extends('frontend.layouts.layout-form')
@section('content')
    <div class="container">
        <form class="form-horizontal" role="form" id="addForm" method="POST" action="{{ route('addmission.store') }}"
            enctype="multipart/form-data">
            @csrf
            <h2>Addmission</h2>
            @if ($adddmision_check == null)
                <div class="form-group">
                    <label for="exampleInputUsername2" class="col-sm-3 control-label">Select College
                    </label>
                    <div class="col-sm-9">
                        <select class="form-control @error('college_id') is-invalid @enderror" name="college_id[]"
                            id="college_id" multiple>
                            <option value=""></option>
                            @foreach ($clg_select as $select)
                                <option value="{{ $select->id }}">{{ $select->name }}</option>
                            @endforeach
                        </select>
                        @error('college_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputUsername2" class="col-sm-3 control-label">Select Course
                    </label>
                    <div class="col-sm-9">
                        <select class="form-control @error('course_id') is-invalid @enderror" name="course_id"
                            id="course_id" autofocus>
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
                <div class="form-group">
                    <label for="merit" class="col-sm-3 control-label">Merit</label>
                    <div class="col-sm-9">
                        <input type="text" id="merit" name="merit" class="form-control @error('merit') is-invalid @enderror"
                            value="{{ old('merit') }}" readonly>
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
                            value="{{ old('merit_round_id') }}" readonly>
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
                            value="{{ old('addmission_date') }}" readonly>
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
                            value="{{ old('addmission_code') }}" autofocus readonly>
                        @error('addmission_code')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn-lg btn-outline-primary float-center">Submit</button>
                <a href="{{ route('home') }}" class="btn-lg btn-outline-danger"><i
                        class="fa fa-thermometer-full"></i>Cancel</a>
            @else
                <p>You are alredy exxited</p>
            @endif
        </form>
    </div>
@endsection
