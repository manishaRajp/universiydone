@extends('frontend.layouts.app')
@section('content')
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <div class="container register">
        <div class="row justify-content-center">
            <div class="col-md-3 register-left">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
                <h3>Student Register</h3>
            </div>
            <div class="col-md-9 register-right">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Student Registration</h3>
                        <div class="row register-form">
                            <div class="col-md-10">
                                <div class="card">
                                    <div class="card-header">{{ __('Register') }}</div>
                                    <div class="card-body">
                                        <form method="POST" action="{{ route('register') }}"
                                            enctype="multipart/form-data" id="regForm">
                                            @csrf
                                            <div class="row mb-3">
                                                <label for="name"
                                                    class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                                                <div class="col-md-6">
                                                    <input id="name" type="text"
                                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                                        value="{{ old('name') }}" autocomplete="name" autofocus>
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="email"
                                                    class="col-md-4 col-form-label text-md-end">{{ __('E-Mail Address') }}</label>
                                                <div class="col-md-6">
                                                    <input id="email" type="text"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        name="email" value="{{ old('email') }}" autocomplete="email">
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="contact_no"
                                                    class="col-md-4 col-form-label text-md-end">{{ __('Contact') }}</label>
                                                <div class="col-md-6">
                                                    <input id="contact_no" type="number"
                                                        class="form-control @error('contact_no') is-invalid @enderror"
                                                        name="contact_no" value="{{ old('contact_no') }}"
                                                        autocomplete="contact_no">
                                                    @error('contact_no')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="address"
                                                    class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>
                                                <div class="col-md-6">
                                                    <input id="address" type="text"
                                                        class="form-control @error('address') is-invalid @enderror"
                                                        name="address" value="{{ old('address') }}"
                                                        autocomplete="address">

                                                    @error('address')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="gender"
                                                    class="col-md-4 col-form-label text-md-end">{{ __('Gender') }}</label>
                                                <div class="maxl">
                                                    <label class="radio inline">
                                                        <input class="form-control @error('gender') is-invalid @enderror"
                                                            type="radio" name="gender" value="M" checked>
                                                        <span> Male </span>
                                                    </label>
                                                    <label class="radio inline">
                                                        <input class="form-control @error('gender') is-invalid @enderror"
                                                            type="radio" name="gender" value="F">
                                                        <span>Female </span>
                                                    </label>
                                                    <label class="radio inline">
                                                        <input class="form-control @error('gender') is-invalid @enderror"
                                                            type="radio" name="gender" value="O">
                                                        <span>Other </span>
                                                    </label>
                                                    @error('gender')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="adhaar_card_no"
                                                    class="col-md-4 col-form-label text-md-end">{{ __('adhaar_card_no') }}</label>
                                                <div class="col-md-6">
                                                    <input id="adhaar_card_no" type="number"
                                                        class="form-control @error('adhaar_card_no') is-invalid @enderror"
                                                        name="adhaar_card_no" value="{{ old('adhaar_card_no') }}"
                                                        autocomplete="adhaar_card_no">
                                                    @error('adhaar_card_no')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="dob" class="col-md-4 col-form-label text-md-end">Date of Birth</label>
                                                <div class="col-sm-6">
                                                    <input type="date"
                                                        class="form-control @error('dob') is-invalid @enderror" id="dob"
                                                        name="dob" value="{{ old('dob') }}" placeholder="dob">
                                                    @error('dob')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="password"
                                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                                <div class="col-md-6">
                                                    <input id="password" type="password"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        name="password" autocomplete="new-password">

                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="password-confirm"
                                                    class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                                                <div class="col-md-6">
                                                    <input id="password-confirm" type="password" class="form-control"
                                                        name="password_confirmation" autocomplete="new-password">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="image"
                                                    class="col-md-4 col-form-label text-md-end">{{ __('image') }}</label>

                                                <div class="col-md-6">
                                                    <input id="image" type="file"
                                                        class="form-control @error('image') is-invalid @enderror"
                                                        name="image" value="{{ old('image') }}" autocomplete="image">

                                                    @error('image')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mb-0">
                                                <div class="col-md-6 offset-md-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Register') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

