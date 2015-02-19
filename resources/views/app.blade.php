<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>StatsApp | {!! $title !!} </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    {!! HTML::style('packages/bower/bootstrap/dist/css/bootstrap.min.css') !!}
    <!-- Font Awesome Icons -->
    {!! HTML::style('packages/bower/fontawesome/css/font-awesome.min.css') !!}
    <!-- Ionicons -->
    {!! HTML::style('packages/bower/ionicons/css/ionicons.min.css') !!}
    @yield('styles')
    <!-- AdminLTE -->
    {!! HTML::style('css/AdminLTE/AdminLTE.min.css') !!}
    {!! HTML::style('css/skins/skin-black.min.css') !!}

    {!! HTML::style('css/app.css') !!}

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
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {!! $title !!}
                <small>{!! $secondTitle !!}</small>
            </h1>
            {!! Breadcrumbs::render() !!}
        </section>

        <!-- Main content -->
        <section class="content">
            @yield('content')
        </section>
        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->

    @include('layouts.footer')

</div>
<!-- ./wrapper -->

<!-- jQuery -->
{!! HTML::script('packages/bower/jquery/dist/jquery.min.js') !!}
<!-- Bootstrap -->
{!! HTML::script('packages/bower/bootstrap/dist/js/bootstrap.min.js') !!}
<!-- FastClick -->
{!! HTML::script('packages/bower/fastclick/lib/fastclick.js') !!}
<!-- AdminLTE App -->
{!! HTML::script('js/app.min.js') !!}
@yield('scripts')
</body>
</html>
