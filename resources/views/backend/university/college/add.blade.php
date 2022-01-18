@extends('backend.university.admin.layouts.master')
@section('content')
<div class="row column_title">
    <div class="col-md-12">
        <div class="page_title">
            <h2>Register College</h2>
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
                                <form id="regForm" class="forms-sample" method="post" action="{{ route('university.college.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name" class="col-sm-5 col-form-label">College Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}" name="name" placeholder="name">
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
                                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}" name="email" placeholder="email">
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
                                            <input type="text" class="form-control @error('contact_no') is-invalid @enderror" id="contact_no" value="{{ old('contact_no') }}" name="contact_no" placeholder="contact_no">
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
                                            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" value="{{ old('address') }}" name="address" placeholder="address">
                                            @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="col-sm-5 col-form-label">Password</label>
                                        <div class="col-sm-9">
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" value="{{ old('password') }}" name="password" placeholder="password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 col-form-label ">Logo</label>
                                        <div class="col-sm-9">
                                            <input type="file" id="logo" name="logo" class="form-control @error('logo') is-invalid @enderror">
                                            @error('logo')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="{{ route('university.college.index')}}"><button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></a>
                                        <button type="submit" class="btn btn-primary myform">Save</button>
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

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script src="{{ asset('Admin/asset/js/sweetalert.min.js') }}"></script>
<script>
    $("#regForm").validate({
        rules: {
            name: {
                required: true,
                maxlength: 225,
            },
            email: {
                required: true,
                email: true,
                maxlength: 50
            },
            password: {
                required: true,
                minlength: 5,
                checklower: true,
                checkupper: true,
                checkdigit: true

            },
            contact_no: {
                required: true,
                number: true,
                minlength: 10
            },
            address: {
                required: true,
            },
            logo: {
                required: true,
            },
        },
        messages: {
            name: {
                required: "Name is required",
                maxlength: "Name cannot be more than 20 characters"
            },
            lastName: {
                required: "Last name is required",
                maxlength: "Last name cannot be more than 20 characters"
            },
            email: {
                required: "Email is required",
                email: "Email must be a valid email address",
                maxlength: "Email cannot be more than 50 characters",
            },
            password: {
                required: "Password is required"
            },
            contact_no: {
                required: "Contact is required",
                number: "Only Digits allowed",
                minlength: "Contact must be at least 10 characters"
            },
            address: {
                required: "Address is required"
            },
            logo: {
                required: "Logo is required"
            },

        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).addClass("is-valid").removeClass("is-invalid");
        },
        errorPlacement: function(error, element) {
            error.insertAfter(element.parent());
        },
    });


    $(document).on('click', '.delete', function() {
       alert(2132);
      swal({
            title: "Are you sure?",
            text: "You Want To Delete The College!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
         })
         .then((willDelete) => {
            if (willDelete) {
               var delet = $(this).data('id');
               var url = '{{route("university.college.destroy", ":queryId")}}';
               url = url.replace(':queryId', delet);
               $.ajax({
                  url: url,
                  type: "DELETE",
                  data: {
                     id: delet,
                     _token: '{{ csrf_token() }}'
                  },
                  dataType: "json",
                  success: function(data) {
                     window.LaravelDataTables["college-table"].draw();
                  }
               });
               swal("Your Store has been deleted!", {
                  icon: "success",
               });
            } else {
               swal("Your College is safe!");
            }
         });
   });
</script>
@endsection