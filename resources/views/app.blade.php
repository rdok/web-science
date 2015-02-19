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
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Laravel</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="/">Home</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="/auth/login">Login</a></li>
                    <li><a href="/auth/register">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/auth/logout">Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

@yield('content')

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
