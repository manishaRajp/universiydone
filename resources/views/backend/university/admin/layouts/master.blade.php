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
    <title>University</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    {{-- Fa-fa icon --}}
    <link href="{{ asset('Admin/asset/css/fa-fa icon.css') }}" rel="stylesheet" />
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
    <!-- datatable css -->
    <link rel="stylesheet" href="{{ asset('Admin/asset/css/bootstrap4.min.css') }}"/>
    


    {{-- select2 --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

    @stack('css')

</head>

<body class="dashboard dashboard_1">

    @include('backend.university.admin.layouts.menubar')
    @include('backend.university.admin.layouts.header')
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>


    @stack('scripts')
</body>
@include('backend.university.admin.layouts.footer')

</html>