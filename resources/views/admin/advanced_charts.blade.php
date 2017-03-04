@extends('layouts/default')

{{-- Page title --}}
@section('title')
    Advanced Charts
    @parent
@stop
{{-- page level styles --}}
@section('header_styles')
    <!--pluin styles -->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/c3/css/c3.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/advanced_charts.css')}}"/>
@stop

@section('content')
            <header class="head">
                <div class="main-bar row">
                    <div class="col-lg-6 col-md-4 col-sm-4">
                        <h4 class="nav_top_align">
                            <i class="fa fa-bar-chart" aria-hidden="true"></i>
                            Advanced Charts
                        </h4>
                    </div>
                    <div class="col-lg-6 col-md-8 col-sm-8">
                        <ol class="breadcrumb float-xs-right nav_breadcrumb_top_align">
                            <li class="breadcrumb-item">
                                <a href="index1">
                                    <i class="fa fa-home" aria-hidden="true"></i>
                                    Dashboard
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">Charts</a>
                            </li>
                            <li class="breadcrumb-item active">Advanced Charts</li>
                        </ol>
                    </div>
                </div>
            </header>
            <div class="outer">
                <div class="inner bg-light lter bg-container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header bg-white">
                                    Just Gauge Charts
                                </div>
                                <div class="card-block">
                                    <div class="row ">
                                        <div class="col-lg-3 col-sm-6 col-xs-12 m-t-35">
                                            <div id="gauge1" class="gauge"></div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 col-xs-12 m-t-35">
                                            <div id="gauge2" class="gauge"></div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 col-xs-12 m-t-35">
                                            <div id="gauge3" class="gauge"></div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 col-xs-12 m-t-35">
                                            <div id="gauge4" class="gauge"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card m-t-35">
                                <div class="card-header bg-white">
                                    Stacked Area Chart
                                </div>
                                <div class="card-block m-t-35">
                                    <div id="chart2"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card m-t-35">
                                <div class="card-header bg-white">
                                    Scatter Plot
                                </div>
                                <div class="card-block m-t-35">
                                    <div id="chart3"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card m-t-35">
                                <div class="card-header bg-white">
                                    Donut Chart
                                </div>
                                <div class="card-block m-t-35">
                                    <div id="chart1"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card m-t-35">
                                <div class="card-header bg-white">
                                    Line Chart
                                </div>
                                <div class="card-block m-t-35">
                                    <div id="chart4"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.inner -->
            </div>
            <!-- /.outer -->

@stop
    <!-- /#wrap -->
@section('footer_scripts')
<!-- plugin script -->
<script type="text/javascript" src="{{asset('assets/vendors/raphael/js/raphael-min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/justgage/js/justgage.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/d3/js/d3.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/c3/js/c3.min.js')}}"></script>
<!-- end of plugin script -->
<script type="text/javascript" src="{{asset('assets/js/pages/advanced_charts.js')}}"></script>

@stop