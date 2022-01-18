@extends('backend.university.admin.layouts.master')
@section('content')
    <div class="row column_title">
        <div class="col-md-12">
            <div class="page_title">
                <a href="{{ route('university.subject.index') }}"><button class="btn btn-outline-info float-right"><i
                            class="fa fa-thermometer-full"></i> | Go to Home</button></a>
                <h2>College Edit</h2>
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
                                        <h4 class="card-title">Subject Details</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form id="regForm" class="forms-sample" method="Post"
                                        action="{{ route('university.subject.update', $sub_edit->id) }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <input type="hidden" name="id" value="{{ $sub_edit->id }}" id=" id">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-5 col-form-label">Subject Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                    id="name" name="name" value="{{ $sub_edit->name }}">
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="code" class="col-sm-5 col-form-label">Subject Code</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control @error('code') is-invalid @enderror"
                                                    id="code" value="{{ $sub_edit->code }}" name="code"
                                                    placeholder="code">
                                                @error('code')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary myform">Update</button>
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
    </div>
@endsection
