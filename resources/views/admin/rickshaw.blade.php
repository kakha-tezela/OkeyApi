@extends('layouts/default')

{{-- Page title --}}
@section('title')
    Rickshaw
    @parent
@stop
{{-- page level styles --}}
@section('header_styles')
    <!--Plugin styles -->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/rickshaw/css/rickshaw.min.css')}}" />
    <!--End of Plugin styles -->
    <!--Page level styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/rickshaw.css')}}" />
    <!--End of Page level styles-->
@stop
@section('content')
        <header class="head">
            <div class="main-bar row">
                <div class="col-lg-6 col-md-4 col-sm-4">
                    <h4 class="nav_top_align">
                        <i class="fa fa-bar-chart"></i>
                       Rickshaw
                    </h4>
                </div>
                <div class="col-lg-6 col-md-8 col-sm-8">
                    <ol class="breadcrumb float-xs-right nav_breadcrumb_top_align">
                        <li class="breadcrumb-item">
                            <a href="index1">
                                <i class="fa fa-home" data-pack="default" data-tags=""></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">Charts</a>
                        </li>
                        <li class="breadcrumb-item active">Rickshaw</li>
                    </ol>
                </div>
            </div>
        </header>
            <div class="outer">
                <div class="inner bg-container">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <div class="card demo">
                                <div class="card-header bg-white">
                                    Line chart
                                </div>
                                <div class="card-block m-t-35">
                                    <div id="chart3"></div>
                                    <div id="smoother" title="Smoothing"></div>
                                    <div id="legend_chart3"></div>
                                    <div id="slider3"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="card md_top_align">
                                <div class="card-header bg-white">
                                    Simple Animation chart
                                </div>
                                <div class="card-block m-t-35">
                                    <div id="chart_6"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card m-t-35">
                                <div class="card-header bg-white">
                                    Multiple Renderers Chart
                                </div>
                                <div class="card-block m-t-35">
                                    <div id="chart2"></div>
                                    <div id="slider2"></div>
                                    <div id="legend_chart2"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <div class="card m-t-35">
                                <div class="card-header bg-white">
                                    Log and Absolute Scale Chart
                                </div>
                                <div class="card-block m-t-35">
                                    <div id="y_axis"></div>
                                    <div id="chart"></div>
                                    <div id="y_axis_2"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="card m-t-35">
                                <div class="card-header bg-white">
                                    Scaled Series Chart
                                </div>
                                <div class="card-block m-t-35">
                                    <div id="chart_5"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card m-t-35">
                                <div class="card-header bg-white">
                                    Line and Toggling chart
                                </div>
                                <div class="card-block m-t-35">
                                    <div id="chart_1"></div>
                                    <div id="legend_1"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- /.outer -->

@stop
@section('footer_scripts')
<!-- plugin scripts-->
<script type="text/javascript" src="{{asset('assets/vendors/d3/js/d3.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/rickshaw/js/rickshaw.min.js')}}"></script>
<!-- end of plugin scripts-->
<!--Page level scripts-->
<script type="text/javascript" src="{{asset('assets/js/pages/richshaw_chart.js')}}"></script>
<!--End of page level scripts-->
@stop