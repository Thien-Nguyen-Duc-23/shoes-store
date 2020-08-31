<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>@yield('title', 'Shoes Store')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="{{ asset('admin_lte/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
        
        <!-- Select2 -->
        <link rel="stylesheet" href="{{ asset('admin_lte/bower_components/select2/dist/css/select2.min.css') }}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('admin_lte/bower_components/font-awesome/css/font-awesome.min.css') }}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="{{ asset('admin_lte/bower_components/Ionicons/css/ionicons.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('admin_lte/dist/css/AdminLTE.min.css') }}">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
            folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="{{ asset('admin_lte/dist/css/skins/_all-skins.min.css') }}">
        <!-- Date Picker -->
        <link rel="stylesheet" href="{{ asset('admin_lte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
        <!-- Daterange picker -->
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="{{ asset('admin_lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/fileinput.min.js"></script>
        <link href="{{ asset('admin_lte/libs/fileinput/fileinput.min.css') }}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{ asset('admin_lte/plugins/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.css') }}" />
        <style>
            .select2-container {
                min-width: 100%;
            }
        </style>
        @stack('styles')
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            @includeIf('admin.partials.header')
            <!-- begin::Model delete -->
            @includeIf('admin.common.modal_del')
            <!-- Left side column. contains the logo and sidebar -->
            @includeIf('admin.partials.sidebar')
            <!-- Content Wrapper. Contains page content -->
            @yield('content')
            <!-- /.content-wrapper -->
            @includeIf('admin.partials.footer')
        </div>
        <!-- ./wrapper -->

        <!-- jQuery 3 -->
        <script src="{{ asset('admin_lte/bower_components/jquery/dist/jquery.min.js') }}"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="{{ asset('admin_lte/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
        $.widget.bridge('uibutton', $.ui.button);
        </script>
        <!-- Bootstrap 3.3.7 -->
        <script src="{{ asset('admin_lte/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        
        <!-- Select2 -->
        <script src="{{ asset('admin_lte/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
        <!-- jQuery Knob Chart -->
        <script src="{{ asset('admin_lte/bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
        <!-- daterangepicker -->
        <script src="{{ asset('admin_lte/bower_components/moment/min/moment.min.js') }}"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
        <!-- datepicker -->
        <script src="{{ asset('admin_lte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="{{ asset('admin_lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
        <!-- Slimscroll -->
        <script src="{{ asset('admin_lte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
        <!-- FastClick -->
        <script src="{{ asset('admin_lte/bower_components/fastclick/lib/fastclick.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('admin_lte/dist/js/adminlte.min.js') }}"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="{{ asset('admin_lte/dist/js/pages/dashboard.js') }}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{ asset('admin_lte/dist/js/demo.js') }}"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script type="text/javascript" src="{{ asset('js/bootstrap-datetimepicker.js') }}"></script>
        <script src="{{ asset('admin_lte/plugins/bootstrap-switch/dist/js/bootstrap-switch.min.js') }}"></script>
        <script src="{{ asset('js/admin.js') }}"></script>
        <script src="{{ asset('admin_lte/libs/fileinput/fileinput.min.js') }}"></script>
        <script src="{{ asset('admin_lte/libs/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
        <script>
            $(document).ready(function () {
                //Initialize Select2 Elements
                $('.select2').select2({
                    placeholder: " Please select ",
                    closeOnSelect : false
                });
                //Initialize Select2 Elements

                //Date range picker with time picker
                $('.reservationtime').daterangepicker({
                    autoUpdateInput: false,
                    locale: {
                        format: 'YYYY-MM-DD',
                        cancelLabel: 'Clear'
                    }
                });
                $('.reservationtime').on('apply.daterangepicker', function(ev, picker) {
                    $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));
                });

                $('.reservationtime').on('cancel.daterangepicker', function(ev, picker) {
                    $(this).val('');
                });

                // Active Menu
                if ($(".nav-link").hasClass("active")) {
                    $(".active").parents(".has-treeview").addClass("menu-open")
                }
            });
        </script>
        @stack('scripts')
    </body>
</html>
