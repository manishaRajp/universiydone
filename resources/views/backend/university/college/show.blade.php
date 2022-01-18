@extends('backend.university.admin.layouts.master')
@section('content')
    <div class="row column_title">
        <div class="col-md-12">
            <div class="page_title">
                    <a href="{{ route('university.college.index') }}"><button class="btn btn-outline-info float-right"><i class="fa fa-thermometer-full"></i> | Go
                        to Home</button></a>
                <h2>College View</h2>

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
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="name">College Name</label>
                                            <input type="text" name="name" id="name" value="{{ $clg_show->name }}"
                                                class="form-control" readonly>
                                        </div>
                                        <div class="form-group col-md-6">

                                            <label for="email">Email</label>

                                            <input name="email" id="email" value="{{ $clg_show->email }}"
                                                class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="contact_no">Contact No.</label>

                                            <input type="text" name="contact_no" id="contact_no"
                                                value="{{ $clg_show->contact_no }}" class="form-control" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="address">Address</label>
                                            <input type="text" name="address" id="address"
                                                value="{{ $clg_show->address }}" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <center>
                                        <div class="form-group">
                                            <label for="restaurant">College Logo</label><br>
                                            <img src="{{ asset('storage/CollegeLogo/' . $clg_show['logo']) }}"
                                                class=" img-thumbnail float-center" width="100px" height="100px" alt="">
                                        </div>
                                    </center>
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
