<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>StatsApp | {!! $title !!} </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    {!! HTML::style('packages/bower/bootstrap/dist/css/bootstrap.min.css', [], true) !!}
    <!-- Font Awesome Icons -->
    {!! HTML::style('packages/bower/fontawesome/css/font-awesome.min.css', [], true) !!}
    <!-- Ionicons -->
    {!! HTML::style('packages/bower/ionicons/css/ionicons.min.css', [], true) !!}

    @yield('styles')

    <!-- AdminLTE -->
    {!! HTML::style('css/AdminLTE/AdminLTE.min.css', [], true) !!}
    {!! HTML::style('css/skins/skin-black.min.css', [], true) !!}

    {!! HTML::style('css/app.css', [], true) !!}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body class="skin-black">

<div class="wrapper">

    @include('layouts.partials.header')

    @include('layouts.partials.sidebar')
    <!-- Right side column. Contains the navbar and content of the page -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {!! $title !!}
                <small>{{ Inspiring::quote() }}</small>
            </h1>
            {!! Breadcrumbs::render() !!}
        </section>
        <!-- Main content -->
        <section class="content">
            @include('flash::message')
            @yield('content')
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    @include('layouts.partials.footer')

</div>
<!-- ./wrapper -->

<!-- jQuery -->
{!! HTML::script('packages/bower/jquery/dist/jquery.min.js', [], true) !!}
<!-- Bootstrap -->
{!! HTML::script('packages/bower/bootstrap/dist/js/bootstrap.min.js', [], true) !!}
<!-- FastClick -->
{!! HTML::script('packages/bower/fastclick/lib/fastclick.js', [], true) !!}
<!-- SlimScroll -->
{!! HTML::script('packages/bower/slimScroll/jquery.slimscroll.min.js', [], true) !!}
<!-- AdminLTE App -->
{!! HTML::script('js/app.min.js', [], true) !!}
<script>$('#flash-overlay-modal').modal();</script>
@yield('scripts')
</body>
</html>
