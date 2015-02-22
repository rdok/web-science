@extends('layouts.app')

@section('content')
<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {!! $title !!}
            <small>Graphs</small>
        </h1>
        {!! Breadcrumbs::render() !!}
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="col-md-6">
            <div class="box box-default">
                <div class="box-header with-border">
                    <i class="fa fa-info"></i>
                    <h3 class="box-title">Notifications</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4>	<i class="icon fa fa-check"></i> Registration completed!</h4>
                        Welcome to StatsApp!
                    </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
