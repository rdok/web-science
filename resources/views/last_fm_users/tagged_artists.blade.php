@extends('layouts.app')

@section('styles')
    <!-- DataTables -->
    {!! HTML::style('packages/DataTables/dataTables.bootstrap.css') !!}
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
                            @include('last_fm_users._partials.authorized_actions.tagged_artists')
                        @else
                            @include('last_fm_users._partials.unauthorized_actions.tagged_artists')
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
                            <th>User Id</th>
                            <th>Artist Id</th>
                            <th>Tag Id</th>
                            <th>Updated at</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($usersTagArtists as $usersTagArtist)
                            <tr>
                                <td>{!! $usersTagArtist->last_fm_user_id !!}</td>
                                <td>{!! $usersTagArtist->artist_id !!}</td>
                                <td>{!! $usersTagArtist->tag_id !!}</td>
                                <td>{!! $usersTagArtist->created_at !!}</td>
                            </tr>
                        @endforeach

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>User Id</th>
                            <th>Artist Id</th>
                            <th>Tag Id</th>
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
    {!! HTML::script('packages/bower/DataTables/media/js/jquery.dataTables.min.js') !!}
    {!! HTML::script('packages/DataTables/dataTables.bootstrap.js') !!}
    <!-- SlimScroll -->
    {!! HTML::script('packages/bower/slimScroll/jquery.slimscroll.min.js') !!}
    <!-- Bootstrap Filestyle -->
    {!! HTML::script('packages/bootstrap-filestyle/bootstrap-filestyle.min.js') !!}

    <!-- page script -->
    <script type="text/javascript">
        $(function () {
            $('#lastFmUsers-table').dataTable()
            $('.tooltip-wrapper').tooltip({position: "bottom"})
        })
    </script>
@endsection
