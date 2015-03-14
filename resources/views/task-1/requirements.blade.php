@extends('layouts.app')

@section('styles')
@endsection

@section('content')
    <!-- START CUSTOM TABS -->
    <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_introduction" data-toggle="tab">Introduction</a></li>
                    <li><a href="#tab_requirement_part_a" data-toggle="tab">Part a</a></li>
                    <li><a href="#tab_requirement_part_b" data-toggle="tab">Part a</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Dropdown <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                            <li role="presentation" class="divider"></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
                        </ul>
                    </li>
                    <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_introduction">
                        <blockquote>
                            LastFM is a social network where users write about the artists they listen to, use tags to
                            characterize them, and they form friendship relations among them. <br/>Your task is perform a study
                            on an excerpt of the LastFM data set which can be obtained from the following site: <a
                                    target="_blank" href="http://www.grouplens.org/datasets/hetrec-2011/">http://www.grouplens.org/datasets/hetrec-2011/</a>

                        </blockquote>
                    </div><!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_requirement_part_a">
                        <blockquote>
                            What is the distribution of the number of different artists listened at least once?
                            <br>Repeat the same question with the number of friends of each user.
                        </blockquote>
                    </div><!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_requirement_part_b">
                        Who are the top 10 most influential users? Determine influence based on page rank, on degree
                        centrality and on betweenness centrality. You also need to characterize the 10 top users based
                        on the artists they have listened to (you may choose for that the 10 most frequently listened to
                        artists).
                    </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
            </div><!-- nav-tabs-custom -->
        </div><!-- /.col -->

    </div> <!-- /.row -->
    <!-- END CUSTOM TABS -->
@endsection


@section('scripts')
    <!-- SlimScroll -->
    {!! HTML::script('packages/bower/slimScroll/jquery.slimscroll.min.js', [], true) !!}
    <!-- Bootstrap Filestyle -->
    {!! HTML::script('packages/bootstrap-filestyle/bootstrap-filestyle.min.js', [], true) !!}
@endsection
