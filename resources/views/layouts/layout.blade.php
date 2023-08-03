<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Greentech Maliki</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/all.min.css" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ionicons@2.0.1/css/ionicons.min.css" />
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/tempusdominus-bootstrap-4@5.0.1/css/tempusdominus-bootstrap-4.min.css" />
    <!-- iCheck -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/icheck-bootstrap@3.0.1/dist/icheck-bootstrap.min.css" />
    <!-- JQVMap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1.0/dist/css/adminlte.min.css" />
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@1.13.0/css/OverlayScrollbars.min.css" />
    <!-- Daterange picker -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker@3.1.0/daterangepicker.css" />
    <!-- summernote -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-bs4.min.css" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href={{ asset('/public/style/custom.css') }} />
    <!-- Data table -->
    <link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet" />

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Data table -->
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        @if ($page == 'home' || $page == 'register' || $page == 'error')
            <body>
           
            @yield('content')
          
        </body> 
        @else 
            <body>
            @include('layouts.header')
            @include('layouts.sidebar')
            @yield('content')
            @include('layouts.footer')
        </body> @endif
        


    </div>

    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- <script src="cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script> -->

    <!-- jQuery UI 1.11.4 -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-ui@1.12.1/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge("uibutton", $.ui.button);
    </script>
    <!-- Bootstrap 4 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>
    <!-- Sparkline -->
    <script src="https://cdn.jsdelivr.net/npm/sparkline@2.9.3/sparkline.min.js"></script>
    <!-- JQVMap -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-jvectormap@2.0.6/dist/jquery-jvectormap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-jvectormap@2.0.6/dist/maps/jquery-jvectormap-us-aea.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-knob@1.2.13/dist/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker@3.1.0/daterangepicker.min.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="https://cdn.jsdelivr.net/npm/tempusdominus-bootstrap-4@5.0.1/dist/js/tempusdominus-bootstrap-4.min.js">
    </script>
    <!-- Summernote -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@1.13.0/dist/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1.0/dist/js/adminlte.min.js"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1.0/dist/js/pages/dashboard.min.js"></script>

</body>

</html>
