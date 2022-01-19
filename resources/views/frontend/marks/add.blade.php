@extends('frontend.layouts.layout-form')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add Marks') }}</div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" id="add_marks"
                            action="{{ route('marks.store') }}">
                            @csrf
                            @if ($student_marks == null)
                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div class="alert" style="color: red;">{{ $error }}</div>
                                    @endforeach
                                @endif
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($sub as $subject)
                                    <div class="row mb-3">
                                        <label for="name"
                                            class="col-md-4 col-form-label text-md-end">{{ $subject->name }}</label>
                                        <div class="col-md-6">
                                            <input type="number" class="form-control" id="sub[]"
                                                name="sub[{{ $subject->id }}]" value="{{ $subject->obtain_mark }}"><br>
                                            <strong id="sub_{{ $i }}_error" style="color: red">
                                            </strong><br>
                                        </div>
                                    </div>
                                    @php
                                        $i = $i + 1;
                                    @endphp
                                @endforeach
                                <div class="row mb-0">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Submit') }}
                                    </button>
                                </div>
                            @else
                                <p>You are alredy exxited</p>
                    </div>
                    @endif
                    </form>
                    <div id="return"></div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@push('js')<script src="http://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script src="{{ asset('Admin/asset/js/sweetalert.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#add_marks').validate({
                rules: {
                    'sub[]': {
                        required: true,
                    }
                },
                submitHandler: function(form) {
                    addMarks(form);
                }

            });
        });

        function addMarks(form) {
            var form = $('#add_marks');
            var formData = new FormData(form[0]);
            swal({
                title: "Are you sure?",
                text: "you want to Add Marks  !",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Save!',
                cancelButtonText: "No, cancel plx!",
                reverseButtons: true
            }).then((result) => {
                if (result) {
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('marks.store') }}",
                        dataType: 'JSON',
                        data: formData,
                        contentType: false,
                        processData: false,
                        cache: false,
                        success: function(query) {
                            alert(query);
                            if (query) {
                                window.location.href = "{{ route('home') }}";
                                swal("success!", "Add Marks Successfully");
                            }
                        },
                        error: function(data) {

                            $('#sub.1').html("xvx");
                            var t = data.responseText;
                            var e = JSON.parse(t);
                            $.each(e.errors, function(key, value) {
                                new_key = key.replace('.', "_");
                                $('#' + new_key + '_error').html('<strong>' + value[0] +
                                    '</strong>');
                            });
                        }
                    });
                } else {
                    swal("Cancelled", "Safe.... :)", "error");
                }
            });
        }
    </script>
@endpush
