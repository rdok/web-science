<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>StatsApp | {!! $title !!} </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    {!! HTML::style('packages/bower/bootstrap/dist/css/bootstrap.min.css',[], true) !!}
    <!-- Font Awesome Icons -->
    {!! HTML::style('packages/bower/fontawesome/css/font-awesome.min.css',[], true) !!}
    <!-- AdminLTE -->
    {!! HTML::style('css/AdminLTE/AdminLTE.min.css',[], true) !!}
    <!-- iCheck -->
    {!! HTML::style('packages/bower/iCheck/skins/square/blue.css',[], true) !!}

    {!! HTML::style('css/AdminLTE/app_auth.css',[], true) !!}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body>

@yield('content')

<!-- jQuery -->
{!! HTML::script('packages/bower/jquery/dist/jquery.min.js',[], true) !!}
<!-- Bootstrap -->
{!! HTML::script('packages/bower/bootstrap/dist/js/bootstrap.min.js',[], true) !!}
<!-- FastClick -->
{!! HTML::script('packages/bower/fastclick/lib/fastclick.js',[], true) !!}
<!-- iCheck -->
{!! HTML::script('packages/bower/iCheck/icheck.min.js',[], true) !!}

@yield('scripts')

<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>
