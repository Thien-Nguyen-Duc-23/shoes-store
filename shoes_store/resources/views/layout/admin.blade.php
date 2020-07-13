<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title', 'Shoes Store')</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('admin_lte/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin_lte/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('admin_lte/bower_components/Ionicons/css/ionicons.min.css') }}">
    <!-- daterange picker -->
    <!-- <link rel="stylesheet" href="{{ asset('admin_lte/bower_components/bootstrap-daterangepicker/daterangepicker.css') }}"> -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="{{ asset('admin_lte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('admin_lte/bower_components/jvectormap/jquery-jvectormap.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('admin_lte/bower_components/select2/dist/css/select2.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin_lte/dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('admin_lte/dist/css/skins/_all-skins.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_lte/plugins/iCheck/all.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_lte/plugins/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css') }}"
    <!-- HTML5 Shim and Respond.js') }} IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js') }} doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="{{ asset('https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js') }}"></script>
    <script src="{{ asset('https://oss.maxcdn.com/respond/1.4.2/respond.min.js') }}"></script>
    <![endif]-->
    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    @stack('styles')
</head>
<body class="hold-transition skin-blue sidebar-mini" style="height: 100%; min-height: 100%;">
    <div class="wrapper" style="height: 100%; min-height: 100%;">
        @includeIf('partials.header')
        <!-- Left side column. contains the logo and sidebar -->
        @includeIf('partials.sidebar')
        <!-- begin::Model delete -->
        @includeIf('admin.common.modal_del')
        <!-- end:: end Model delete -->
        <!-- Content Wrapper. Contains page content -->
        @yield('content')
        <!-- /.content-wrapper -->
        @includeIf('partials.footer')
    </div>
    <!-- ./wrapper -->
    <script src="{{ asset('admin_lte/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('admin_lte/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('admin_lte/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('admin_lte/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <!-- date-range-picker -->
    <!-- InputMask -->
    <!-- <script src="{{ asset('admin_lte/plugins/input-mask/jquery.inputmask.js') }}"></script> -->
    <script src="{{ asset('admin_lte/bower_components/moment/min/moment.min.js') }}"></script>
    <!-- <script src="{{ asset('admin_lte/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script> -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <!-- bootstrap datepicker -->
    <script src="{{ asset('admin_lte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('admin_lte/bower_components/fastclick/lib/fastclick.js') }}"></script>
    <!-- AdminLTE App -->
    
    <script src="{{ asset('admin_lte/dist/js/adminlte.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('admin_lte/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
    <!-- jvectormap  -->
    <script src="{{ asset('admin_lte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('admin_lte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('admin_lte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
    <script src="{{ asset('admin_lte/bower_components/chart.js/Chart.js') }}"></script>
    <script src="{{ asset('admin_lte/plugins/iCheck/icheck.min.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!-- <script src="{{ asset('admin_lte/dist/js/pages/dashboard2.js') }}"></script> -->
    <!-- AdminLTE for demo purposes -->
    <!-- <script src="{{ asset('admin_lte/dist/js/demo.js') }}"></script> -->
    <script src="{{ asset('admin_lte/plugins/bootstrap-switch/dist/js/bootstrap-switch.min.js') }}"></script>
    @stack('scripts')
</body>
</html>
