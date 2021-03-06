@extends('layouts.app')

@section('styles')
    <!-- DataTables -->
    {!! HTML::style('packages/DataTables/dataTables.bootstrap.css', [], true) !!}
@endsection

@section('content')
    <div class="row">

        <div class="col-md-12">
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
                            @include('last_fm_users._partials.authorized_actions.artists')
                        @else
                            @include('last_fm_users._partials.unauthorized_actions.artists')
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
                    <h3 class="box-title">All LastFm Users </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="lastFmUsers-table" class="table table-bordered table-striped table-hover" width="100%"
                           cellspacing="0">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Artist Id</th>
                            <th>Weight</th>
                            <th>Updated at</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($artists as $artist)
                            @foreach($artist->lastFmUsers as $lastFmUser)
                                <tr>
                                    <td>{!! $lastFmUser->id !!}</td>
                                    <td>{!! $artist->id !!}</td>
                                    <td>{!! $lastFmUser->pivot->listen_count !!}</td>
                                    <td>{!! $artist->updated_at !!}</td>
                                </tr>
                            @endforeach
                        @endforeach

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Artist Id</th>
                            <th>Weight</th>
                            <th>Updated at</th>
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
            $('#lastFmUsers-table').dataTable()
            $('.tooltip-wrapper').tooltip({position: "bottom"})
        })
    </script>
@endsection
