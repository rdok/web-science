<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>StatsApp</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    {!! HTML::style('packages/bootstrap/dist/css/bootstrap.min.css') !!}
    <!-- Font Awesome Icons -->
    {!! HTML::style('packages/fontawesome/css/font-awesome.min.css') !!}
    <!-- Ionicons -->
    {!! HTML::style('packages/ionicons/css/ionicons.min.css') !!}
    <!-- Morris chart -->
    {!! HTML::style('packages/morrisjs/morris.css') !!}
    <!-- jvectormap -->
    {!! HTML::style('packages/jquery-jvectormap-2.0.1/jquery-jvectormap-2.0.1.css') !!}
    <!-- Daterange picker -->
    {!! HTML::style('packages/bootstrap-daterangepicker/daterangepicker-bs3.css') !!}
    <!-- Theme style -->
    {!! HTML::style('css/AdminLTE.min.css') !!}
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    {!! HTML::style('css/skins/_all-skins.min.css') !!}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body class="skin-black">

<div class="wrapper">

    @include('layouts.header')

    @include('layouts.sidebar')

    <!-- Right side column. Contains the navbar and content of the page -->
    <div class="content-wrapper">
        @yield('content')
    </div>
    <!-- /.content-wrapper -->

    @include('layouts.footer')

</div>
<!-- ./wrapper -->

<!-- jQuery -->
{!! HTML::script('packages/jquery/dist/jquery.min.js') !!}
<!-- Bootstrap -->
{!! HTML::script('packages/bootstrap/dist/js/bootstrap.min.js') !!}
<!-- FastClick -->
{!! HTML::script('packages/fastclick/lib/fastclick.js') !!}
<!-- SparkLine -->
{!! HTML::script('packages/sparkline/jquery.sparkline.min.js') !!}
<!-- jvectormap -->
{!! HTML::script('packages/jquery-jvectormap-2.0.1/jquery-jvectormap-2.0.1.min.js') !!}
{!! HTML::script('packages/jquery-jvectormap-2.0.1/jquery-jvectormap-world-mill-en.js') !!}
<!-- jQuery Knob Chart -->
{!! HTML::script('packages/jquery-knob/dist/jquery.knob.min.js') !!}
<!-- daterangepicker -->
{!! HTML::script('public/packages/bootstrap-daterangepicker/daterangepicker.js') !!}
<!-- datepicker -->
{!! HTML::script('packages/bootstrap-datepicker/js/bootstrap-datepicker.js') !!}
<!-- iCheck -->
{!! HTML::script('packages/jquery-icheck/icheck.min.js') !!}
<!-- SlimScroll -->
{!! HTML::script('packages/slimScroll/jquery.slimscroll.min.js') !!}
<!-- ChartJS -->
{!! HTML::script('packages/chartjs/Chart.min.js') !!}

<!-- AdminLTE App -->
{!! HTML::script('js/app.min.js') !!}

</body>
</html>
