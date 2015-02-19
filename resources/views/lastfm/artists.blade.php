@extends('app')

@section('styles')
    <!-- DataTables -->
    {!! HTML::style('packages/DataTables/media/css/jquery.dataTables.min.css') !!}
@endsection

@section('content')
@endsection

@section('scripts')
<!-- DataTables -->
{!! HTML::script('packages/DataTables/media/js/jquery.dataTables.min.js') !!}
<!-- SlimScroll -->
{!! HTML::script('packages/slimScroll/jquery.slimscroll.min.js') !!}
@endsection
