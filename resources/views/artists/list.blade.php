@extends('app')

@section('styles')
    <!-- DataTables -->
    {!! HTML::style('packages/DataTables/dataTables.bootstrap.css') !!}
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">All Artists
                        <a href="{!! route('upload_artists') !!}" class="btn bg-navy btn-flat margin">
                            <i class='fa fa-cloud-upload'></i>
                        </a>
                    </h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="artists-table" class="table table-bordered table-striped table-hover" width="100%" cellspacing="0">
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
                                {!! link_to($artist->url, 'View', ['class' => 'btn btn-block btn-info btn-xs', 'target' => '_blank']) !!}
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
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection

@section('scripts')
<!-- DataTables -->
{!! HTML::script('packages/bower/DataTables/media/js/jquery.dataTables.min.js') !!}
{!! HTML::script('packages/DataTables/dataTables.bootstrap.js') !!}
<!-- SlimScroll -->
{!! HTML::script('packages/bower/slimScroll/jquery.slimscroll.min.js') !!}

<!-- page script -->
<script type="text/javascript">
    $(function () {
        $('#artists-table').dataTable();
    });
</script>
@endsection
