<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>college</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    {{-- Fa-fa icon --}}
    <link href="{{ asset('Admin/asset/css/fa-fa icon.css') }}" rel="stylesheet" />
    <!-- site icon -->
    <link rel="icon" href="{{ asset('Admin/asset/images/fevicon.png') }}" type="image/png" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ asset('Admin/asset/css/bootstrap.min.css') }}" />
    <!-- site css -->
    <link rel="stylesheet" href="{{ asset('Admin/asset/css/style.css') }}" />
    <!-- responsive css -->
    <link rel="stylesheet" href="{{ asset('Admin/asset/css/responsive.css') }}" />
    <!-- color css -->
    <link rel="stylesheet" href="{{ asset('Admin/asset/css/colors.css') }}" />
    <!-- select bootstrap -->
    <link rel="stylesheet" href="{{ asset('Admin/asset/css/bootstrap-select.css') }}" />
    <!-- scrollbar css -->
    <link rel="stylesheet" href="{{ asset('Admin/asset/css/perfect-scrollbar.css') }}" />
    <!-- custom css -->
    <link rel="stylesheet" href="{{ asset('Admin/asset/css/custom.css') }}" />
    {{-- select2 --}}
    {{-- datatable --}}
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.dataTables.min.css" rel="stylesheet">

    <script src="/vendor/datatables/buttons.server-side.js"></script>

    @stack('css')

</head>

<body class="dashboard dashboard_1">

    @include('backend.college.admin.layouts.menubar')
    @include('backend.college.admin.layouts.header')
    <br>
    <br>
    @include('flash-message')


    @yield('content')
    <!-- jQuery -->
    <script src="{{ asset('Admin/asset/js/jquery.min.js') }}"></script>
    <script src="{{ asset('Admin/asset/js/popper.min.js') }}"></script>
    <script src="{{ asset('Admin/asset/js/bootstrap.min.js') }}"></script>
    <!-- wow animation -->
    <script src="{{ asset('Admin/asset/js/animate.js') }}"></script>
    <!-- select country -->
    <script src="{{ asset('Admin/asset/js/bootstrap-select.js') }}"></script>
    <!-- owl carousel -->
    <script src="{{ asset('Admin/asset/js/owl.carousel.js') }}"></script>
    <!-- chart js -->
    <script src="{{ asset('Admin/asset/js/Chart.min.js') }}"></script>
    <script src="{{ asset('Admin/asset/js/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('Admin/asset/js/utils.js') }}"></script>
    <script src="{{ asset('Admin/asset/js/analyser.js') }}"></script>
    <!-- nice scrollbar -->
    <script src="{{ asset('Admin/asset/js/perfect-scrollbar.min.js') }}"></script>
    <script>
        var ps = new PerfectScrollbar('#sidebar');
    </script>
    <!-- custom js -->
    <script src="{{ asset('Admin/asset/js/custom.js') }}"></script>
    <script src="{{ asset('Admin/asset/js/chart_custom_style1.js') }}"></script>

    {{-- select 2 --}}
    <script src="{{ asset('Admin/asset/js/boostrap.js') }}"></script>
    <script src="{{ asset('Admin/asset/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('Admin/asset/js/dataTables.bootstrap4.min.js') }}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>

    @stack('scripts')
</body>
@include('backend.college.admin.layouts.footer')

</html>
