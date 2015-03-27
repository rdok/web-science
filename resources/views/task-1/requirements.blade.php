@extends('layouts.app')

@section('styles')
    <!-- d3 custom -->
    {!! HTML::style('css/d3/charts.css', [], true) !!}
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
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Distribution of the number of different artists listened at least once</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <div class="btn-group">
                            <button aria-expanded="false" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i></button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </div>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div><!-- /.box-header -->
                <div style="display: block;" class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="chart-responsive">
                                <!-- Sales Chart Canvas -->
                                <div id="degreeDistributionChart" style="height: 400px; width: 100%;"></canvas>
                            </div><!-- /.chart-responsive -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- ./box-body -->
                <div style="display: block;" class="box-footer">
                    <div class="row">
                        <div class="col-sm-3 col-xs-6">
                            <div class="description-block border-right">
                                <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span>
                                <h5 class="description-header">$35,210.43</h5>
                                <span class="description-text">TOTAL REVENUE</span>
                            </div><!-- /.description-block -->
                        <div class="col-sm-3 col-xs-6">
                            <div class="description-block border-right">
                                <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 0%</span>
                                <h5 class="description-header">$10,390.90</h5>
                                <span class="description-text">TOTAL COST</span>
                            </div><!-- /.description-block -->
                        </div><!-- /.col -->
                        <div class="col-sm-3 col-xs-6">
                            <div class="description-block border-right">
                                <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 20%</span>
                                <h5 class="description-header">$24,813.53</h5>
                                <span class="description-text">TOTAL PROFIT</span>
                            </div><!-- /.description-block -->
                        </div><!-- /.col -->
                        <div class="col-sm-3 col-xs-6">
                            <div class="description-block">
                                <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> 18%</span>
                                <h5 class="description-header">1200</h5>
                                <span class="description-text">GOAL COMPLETIONS</span>
                            </div><!-- /.description-block -->
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.box-footer -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div>
    <!-- END CUSTOM TABS -->
@endsection


@section('scripts')
    {!! HTML::script('packages/canvasjs/canvasjs.min.js', [], true) !!}
    <!-- page script -->
    <script type="text/javascript">
        window.onload = function () {
            var chart = new CanvasJS.Chart("degreeDistributionChart",
                    {
                        title:{
                            text: "Degree Distribution | Top 5000"
                        },
                        axisX:{
                            title: "Weight",
                            interlacedColor: "#F0F8FF",
                            maximum: 5000
                        },
                        axisY:{
                            title: "Weight counter"
                        },
                        zoomEnabled: true,
                        data: [

                            {
                                type: "line",
                                dataPoints: []
                            }
                        ]
                    });

            $.ajax({
                type : "get",
                url : "{{ route('api_artists_path') }}" + "/minimumTimesListened=1",
                success : function (jsonArtistsListened) {
                    var graph = jsonArtistsListened.data;
                    var degreeDistributions = {};

                    graph.forEach(function(currentNode) {
                        var weight = currentNode.listen_count;

                        if ( ! ( weight in degreeDistributions ) ){
                            degreeDistributions[weight] = 0;
                        }

                        degreeDistributions[weight]++;
                    });

                    var dataPoints = [];

                    for (var weightCounterIndex in degreeDistributions) {
                        dataPoints.push({x: weightCounterIndex, y: degreeDistributions[weightCounterIndex]});
                    }

                    chart.options.data[0].dataPoints = dataPoints;
                    chart.render();
                },
                error: function(e){
                    alert('something went wrong retrieving data. please refresh page.');
                }
            });
        }
    </script>
@endsection
