@extends('Backend.university.admin.layouts.master')
@section('content')
    <!-- profile contant section -->
    <div class="row column_title">
        <div class="col-md-12">
            <div class="page_title">
                <h2></h2>
            </div>
        </div>
    </div>
    <!-- row -->
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
                                        <h4 class="card-title">Reset Password</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form class="form-container-forget" method="POST"
                                        action="{{ route('university.change_pass') }}">
                                        @csrf
                                        <div class="form-group">
                                            <div class="row mb-3">
                                                <input id="oldpassword" type="password"
                                                    class="form-control @error('oldpassword') is-invalid @enderror"
                                                    name="oldpassword" value="{{ old('oldpassword') }}"
                                                    autocomplete="oldpassword" autofocus
                                                    placeholder="Please enter old password">
                                                @error('oldpassword')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row mb-3">
                                                <input id="newpassword" type="password"
                                                    class="form-control @error('newpassword') is-invalid @enderror"
                                                    name="newpassword" value="{{ old('newpassword') }}"
                                                    autocomplete="newpassword" placeholder="Please enter new password">
                                                @error('newpassword')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row mb-3">
                                                <input id="password_confirmation" type="password"
                                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                                    name="password_confirmation"
                                                    value="{{ old('password_confirmation') }}" autocomplete="new-password"
                                                    placeholder=" Confirm New password">
                                                @error('password_confirmation')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <button class="btn btn-success">Change Password</button>
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

    <!-- end user profile section -->

@endsection
