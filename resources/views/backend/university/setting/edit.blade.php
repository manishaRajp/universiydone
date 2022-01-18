@extends('backend.university.admin.layouts.master')
@section('content')
    <div class="row column_title">
        <div class="col-md-12">
            <div class="page_title">
                <h2>Comman setting</h2>
            </div>
        </div>
    </div>
    <div class="row column1">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="margin_bottom_30">
                <div class="container">
                    <div class="row mt-3">
                        <div class="col-md-offset-4 col-md-4 col-lg-offset-3 col-lg-6">
                            <div class="card profile-card-2">
                                <div class="card-body pt-5">
                                    <div class="card-header card-header-primary">
                                        <h4 class="card-title">Comman setting</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    @foreach ($comman_setting as $key => $value)
                                        <form action="{{ route('university.comman-setting.update', $value->id) }}"
                                            method="post">
                                            @csrf
                                            @method('put')
                                            <input type="hidden" name="id[]" value="{{ $value->id }}" id="id">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="subject_id"
                                                            value="">{{ $value->subject->name }}</label>
                                                        <input type="text"
                                                            class="form-control @error('subject_id') is-invalid @enderror"
                                                            id="subject_id" name="subject_id[]"
                                                            value="{{ $value->subject_id }}">
                                                        @error('subject_id')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-7">
                                                    <div class="form-group">
                                                        <label for="marks">Marks</label>
                                                        <input type="text"
                                                            class="form-control @error('marks') is-invalid @enderror"
                                                            id="marks" name="marks[]"
                                                            value="{{ $value->marks }}">
                                                        @error('marks')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                    @endforeach
                                    <input type="submit" class="btn btn-primary" value="Save changes">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
@endsection
