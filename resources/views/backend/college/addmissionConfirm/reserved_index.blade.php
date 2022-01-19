@extends('backend.college.admin.layouts.master')
@section('content')
    <link rel="stylesheet" href="{{ asset('Admin/asset/css/bootstrap4.min.css') }}" />
    <div class="full_container">
        <div class="inner_container">
            <div class="midde_cont">
                <div class="row column_title">
                    <div class="col-md-12">
                        <div class="page_title">
                            {{-- <a href="{{ route('university.college.create') }}" class="btn btn-success float-left">click to add
                            college</a>&nbsp; --}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <h4 style="font-size:150%;" class="card-title">Confirm Addmission Resrvedbases base List </h4>
                        <section style="padding-top: 60px;">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 table-responsive">
                                        {!! $dataTable->table(['class' => 'table table-bordered dt-responsive nowrap']) !!}
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('Admin/asset/js/boostrap.js') }}"></script>
    <script src="{{ asset('Admin/asset/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('Admin/asset/js/dataTables.bootstrap4.min.js') }}"></script>
    {!! $dataTable->scripts() !!}
    <script>
        $(".clg-delete").click(function() {
            alert(1);
            var id = $(this).data("id");
            var token = $("meta[name='csrf-token']").attr("content");

            $.ajax({
                url: "users/" + id,
                type: 'DELETE',
                data: {
                    "id": id,
                    "_token": token,
                },
                success: function() {
                    console.log("it Works");
                }
            });

        });
    </script>
@endpush
