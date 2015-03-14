@extends('layouts.app')

@section('styles')
    <!-- DataTables -->
    {!! HTML::style('packages/DataTables/dataTables.bootstrap.css', [], true) !!}
@endsection

@section('content')
    <div class="row">

        <div class="col-xs-6">
            <div class="box box-default collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title">Database</h3>

                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i
                                    class="fa fa-times"></i></button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->

                <div class="box-body">
                    <div class="row">
                        @if (Auth::user())
                            @include('artists._partials.authed_actions')
                        @else
                            @include('artists._partials.guest_actions')
                        @endif
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">All Artists </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="artists-table" class="table table-bordered table-striped table-hover" width="100%"
                           cellspacing="0">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>LastFM Url</th>
                            <th>Updated At</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($artists as $artist)
                            <tr>
                                <td>{!! $artist->name !!}</td>
                                <td>
                                    <a href="{!! url($artist->url) !!}" target="_blank"><i class="fa fa-lastfm"></i></a>
                                </td>
                                <td>{!! $artist->updated_at !!}</td>
                            </tr>
                        @endforeach

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>LastFM Url</th>
                            <th>Updated At</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@endsection

@section('scripts')
    <!-- DataTables -->
    {!! HTML::script('packages/bower/DataTables/media/js/jquery.dataTables.min.js', [], true) !!}
    {!! HTML::script('packages/DataTables/dataTables.bootstrap.js', [], true) !!}
    <!-- SlimScroll -->
    {!! HTML::script('packages/bower/slimScroll/jquery.slimscroll.min.js', [], true) !!}
    <!-- Bootstrap Filestyle -->
    {!! HTML::script('packages/bootstrap-filestyle/bootstrap-filestyle.min.js', [], true) !!}

    <!-- page script -->
    <script type="text/javascript">
        $(function () {
            $('#artists-table').dataTable()
            $('.tooltip-wrapper').tooltip({position: "bottom"})
        })
    </script>
@endsection
