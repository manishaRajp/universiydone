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
            <div class="white_shd full margin_bottom_30">
                <div class="full graph_head">
                    <div class="heading1 margin_0">
                        <h2>College profile</h2>
                    </div>
                </div>
                <div class="container-fluid center">
                    <div class="row mt-3">
                        <div class="col-lg-36">
                            <div class="card profile-card-2">
                                <div class="card-body pt-5">
                                    <div class="card-header card-header-primary">
                                        <h4 class="card-title">Edit Profile</h4>
                                        <img src="{{ asset('/storage/CollegeLogo/'.Auth::guard('college')->user()->logo) }}"
                                            width="100" height="100" alt="profile-image" class="profile">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('college.profile_update') }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text"
                                                        class="form-control @error('name') is-invalid @enderror" id="name"
                                                        name="name" value="{{ Auth::guard('college')->user()->name }}"
                                                        autocomplete="off">
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="text"
                                                        class="form-control @error('email') is-invalid @enderror" id="email"
                                                        name="email" value="{{ Auth::guard('college')->user()->email }}"
                                                        autocomplete="off">
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="contact_no">Contact No.</label>
                                                    <input type="number"
                                                        class="form-control @error('contact_no') is-invalid @enderror"
                                                        id="contact_no" name="contact_no"
                                                        value="{{ Auth::guard('college')->user()->contact_no }}"
                                                        autocomplete="off">
                                                    @error('contact_no')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="form-group">
                                                    <label for="address">Address</label>
                                                    <input type="text"
                                                        class="form-control @error('address') is-invalid @enderror"
                                                        id="address" name="address"
                                                        value="{{ Auth::guard('college')->user()->address }}"
                                                        autocomplete="off">
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
                                        </div>

                                        <input type="submit" class="btn btn-primary" value="Update Profile">
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
