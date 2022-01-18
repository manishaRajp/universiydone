@extends('frontend.layouts.layout-form')
@section('content')
    <div class="container">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('marks.store') }}"
            enctype="multipart/form-data">
            @csrf
            <h2>Add Marks</h2>
            <div class="form-group">
                <label for="exampleInputUsername2" class="col-sm-3 control-label">Select Subject
                    :</label>
                <div class="col-sm-9">
                    <select class="form-control @error('subject_id') is-invalid @enderror" name="subject_id" id="subject_id">
                        <option value=""></option>
                        @foreach ($sub as $select)
                            <option value="{{ $select->id }}">{{ $select->name }}</option>
                        @endforeach
                    </select>
                    @error('subject_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="total_mark" class="col-sm-3 control-label">Total Mark</label>
                <div class="col-sm-9">
                    <input type="text" id="total_mark" name="total_mark" placeholder="Total Mark"
                        class="form-control @error('total_mark') is-invalid @enderror" value="{{ old('total_mark') }}"
                        autofocus>
                    @error('total_mark')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="obtain_mark" class="col-sm-3 control-label">Obtain Mark</label>
                <div class="col-sm-9">
                    <input type="text" id="obtain_mark" name="obtain_mark" placeholder="Obtain Mark"
                        class="form-control @error('obtain_mark') is-invalid @enderror" value="{{ old('obtain_mark') }}"
                        autofocus>
                    @error('obtain_mark')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn-lg btn-outline-primary">Submit</button>
            <a href="{{ route('home') }}" class="btn-lg btn-outline-danger"><i
                    class="fa fa-thermometer-full"></i>Cancel</a>
        </form>
    </div>
@endsection
