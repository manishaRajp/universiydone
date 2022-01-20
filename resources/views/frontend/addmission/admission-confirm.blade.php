@extends('frontend.layouts.layout-form')
@section('content')
    {{-- @dd($addmission->college_id) --}}
    <div class="container">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('addmoission-confirm.store') }}"
            enctype="multipart/form-data">
            @csrf
            <h2>Addmission Confimation</h2>
            {{-- @dd($data) --}}
            <div class="form-group">
                <label for="merit" class="col-sm-3 control-label">College</label>
                <div class="col-sm-9">
                        @foreach ($addmission->college_id as $data)
                        <input type="text" id="college_id" name="college_id"
                            class="form-control @error('college_id') is-invalid @enderror" value="{{ $data }}"
                            readonly>
                        @error('college_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        @endforeach
                    </div>
                </div>

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

            <button type="submit" class="btn btn-primary float-center">confirm</button>
            <a href="{{ route('home') }}" class="btn btn-warning"><i class="fa fa-thermometer-full"></i>Reject</a>
            <a href="{{ route('home') }}" class="btn btn-danger"><i class="fa fa-thermometer-full"></i>Pendding</a>

            {{-- <a href="{{ route('home') }}" class="btn btn-danger"><i class="fa fa-thermometer-full"></i>You Have
                    submitted avbove data</a> --}}

        </form>
    </div>
@endsection
