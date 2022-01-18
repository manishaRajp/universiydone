@extends('backend.university.admin.layouts.master')
@section('content')
    <div class="row column_title">
        <div class="col-md-12">
            <div class="page_title">
                <a href="{{ route('university.college.index') }}"><button class="btn btn-outline-info float-right"><i
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
                                        <h4 class="card-title">College Details</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form id="regForm" class="forms-sample" method="Post"
                                        action="{{ route('university.college.update', $clg_edit->id) }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <input type="hidden" name="id" value="{{ $clg_edit->id }}" id=" id">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-5 col-form-label">College Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                    id="name" name="name" value="{{ $clg_edit->name }}">
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="col-sm-5 col-form-label">email</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control @error('email') is-invalid @enderror"
                                                    id="email" value="{{ $clg_edit->email }}" name="email"
                                                    placeholder="email">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="contact_no" class="col-sm-5 col-form-label">Contact No.</label>
                                            <div class="col-sm-9">
                                                <input type="text"
                                                    class="form-control @error('contact_no') is-invalid @enderror"
                                                    id="contact_no" value="{{ $clg_edit->contact_no }}" name="contact_no"
                                                    placeholder="contact_no">
                                                @error('contact_no')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="address" class="col-sm-5 col-form-label">Address</label>
                                            <div class="col-sm-9">
                                                <input type="text"
                                                    class="form-control @error('address') is-invalid @enderror" id="address"
                                                    value="{{ $clg_edit->address }}" name="address" placeholder="address">
                                                @error('address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 col-form-label ">Logo</label>
                                            <div class="col-sm-9">
                                                <input type="file" id="logo" name="logo"
                                                    class="form-control @error('logo') is-invalid @enderror">
                                                @error('logo')
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
