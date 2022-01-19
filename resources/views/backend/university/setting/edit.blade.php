@extends('backend.university.admin.layouts.master')
@section('content')
    <div class="row column_title">
        <div class="col-md-12">
            <div class="page_title">
                <h2>Comman setting</h2>
            </div>
        </div>
    </div>
    {{-- @dd($comman_setting) --}}
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
        
                                    <form action="{{ route('university.comman-setting.store') }}" method="post">
                                        @csrf
                                        @if (count($comman_setting) == 0)
                                            @foreach ($subject as $subjects)
                                                <label for="marks">{{ Form::label('marks', $subjects->name) }}</label>
                                                <input type="number" name="marks[{{ $subjects->id }}]"
                                                    class="form-control" id="marks"
                                                    onKeyPress="if(this.value.length==3) return false;" min="0" max="100"
                                                    required></br>
                                                @error('marks')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            @endforeach
                                        @else
                                            @foreach ($comman_setting as $common_settings)
                                                <label
                                                    for="marks">{{ Form::label('marks', $common_settings->subject->name) }}</label>
                                                <input type="number" name="marks[{{ $common_settings->id }}]"
                                                    class="form-control"
                                                    onKeyPress="if(this.value.length==3) return false;" min="0" max="100"
                                                    id="marks" value="{{ $common_settings->marks }}" required></br>
                                            @endforeach
                                        @endif
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
