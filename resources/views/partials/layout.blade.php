<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Dashboard | DevLabs - Belajar Kimia Menjadi Lebih Mudah</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="DevLabs - Belajar Kimia Menjadi Lebih Mudah" name="description" />
    <meta content="Kendariweb" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{!! url('assets/images/favicon.ico') !!}">

    <!-- Bootstrap Css -->
    <link href="{!! url('assets/css/bootstrap.min.css') !!}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{!! url('assets/css/icons.min.css') !!}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{!! url('assets/css/app.min.css') !!}" id="app-style" rel="stylesheet" type="text/css" />
    <link href="{!! url('assets/libs/sweetalert2/sweetalert2.min.css') !!}" rel="stylesheet">

</head>

@include('partials.header')
@if (Auth::user()->level === 'admin')
<!-- Arahkan ke halaman admin -->
<body data-layout="horizontal" data-topbar="dark">
@else
<!-- Arahkan ke halaman user biasa -->
<body data-layout="vertical" data-sidebar="dark">
@endif


    <!-- Begin page -->
    <div id="layout-wrapper">

        @include('partials.header')
        @if (Auth::user()->level === 'admin')
        <!-- Arahkan ke halaman admin -->
        @include('partials.menu')
        @else
        <!-- Arahkan ke halaman user biasa -->
        @include('partials.menusiswa')
        @endif
        @include('sweetalert::alert')

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    @yield('content')



                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->




        </div>
        <!-- END layout-wrapper -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        @include('partials.footer')

        <!-- JAVASCRIPT -->

        <script src="{!! url('assets/libs/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
        <script src="{!! url('assets/libs/metismenujs/metismenujs.min.js') !!}"></script>
        <script src="{!! url('assets/libs/simplebar/simplebar.min.js') !!}"></script>
        <script src="{!! url('assets/libs/feather-icons/feather.min.js') !!}"></script>

        <!-- apexcharts -->
        <script src="{!! url('assets/libs/apexcharts/apexcharts.min.js') !!}"></script>
        
        <script src="{!! url('assets/libs/sweetalert2/sweetalert2.min.js') !!}"></script>
        <!-- Chart JS -->
        <script src="{!! url('assets/js/pages/chartjs.js') !!}"></script>

        <script src="{!! url('assets/js/pages/dashboard.init.js') !!}"></script>

        <script src="{!! url('assets/js/app.js') !!}"></script>

</body>

</html>