<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>AdminLTE 2 | Log in</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="{{ asset('admin_lte/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('admin_lte/bower_components/font-awesome/css/font-awesome.min.css') }}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="{{ asset('admin_lte/bower_components/Ionicons/css/ionicons.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('admin_lte/dist/css/AdminLTE.min.css') }}">
        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="../../index2.html"><b>Shoes</b> Store</a>
            </div>
            <!-- /.login-logo -->
            <div class="login-box-body">
                @if (session('error'))
                    <p class="text-danger login-box-msg">
                        {{ session('error') }}
                    </p>
                @endif
                <form class="" method="POST" action="{{ route('auth.loginAdmin') }}">
                    @csrf
                    <div class="form-group has-feedback">
                        <!-- <input type="email" class="form-control" placeholder="Email"> -->
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        @if ($errors->has('email'))
                            <span class="text-danger help-block">
                                <strong class="text-danger">{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group has-feedback">
                        <!-- <input type="password" class="form-control" placeholder="Password"> -->
                        <input id="password" type="password" class="form-control" name="password" required  placeholder="Password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        @if ($errors->has('password'))
                            <span class="text-danger help-block">
                                <strong class="text-danger">{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-xs-8"></div>
                        <!-- /.col -->
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
        <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->

        <!-- jQuery 3 -->
        <script src="{{ asset('admin_lte/bower_components/jquery/dist/jquery.min.js') }}"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="{{ asset('admin_lte/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    </body>
</html>
