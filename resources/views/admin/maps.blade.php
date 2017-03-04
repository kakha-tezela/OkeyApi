@extends('layouts/default')

{{-- Page title --}}
@section('title')
    Maps
    @parent
@stop
{{-- page level styles --}}
@section('header_styles')
    <!--Plugin styles -->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/maps.css')}}">
    <!--end of plugin styles-->
@stop
@section('content')
                <header class="head">
                    <div class="main-bar row">
                        <div class="col-lg-6 col-md-4 col-sm-4">
                            <h4 class="nav_top_align">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                Maps
                            </h4>
                        </div>
                        <div class="col-lg-6 col-md-8 col-sm-8">
                            <ol class="breadcrumb float-xs-right nav_breadcrumb_top_align">
                                <li class="breadcrumb-item">
                                    <a href="index1">
                                        <i class="fa fa-home" aria-hidden="true"></i> Dashboard
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="#">
                                        Maps
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">Google Maps</li>
                            </ol>
                        </div>
                    </div>
                </header>
                <div class="outer">
                    <div class="inner bg-container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header bg-white">
                                        Basic
                                    </div>
                                    <div class="card-block m-t-35">
                                        <div id="gmap-top" class="gmap"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <!-- Basic charts strats here-->
                                <div class="card map_md_top_align">
                                    <div class="card-header bg-white">
                                        Markers
                                    </div>
                                    <div class="card-block m-t-35">
                                        <div id="gmap-markers" class="gmap"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- row -->
                        <div class="row">
                            <div class="col-lg-6">
                                <!-- Basic charts strats here-->
                                <div class="card m-t-35">
                                    <div class="card-header bg-white">
                                        Styled Maps
                                    </div>
                                    <div class="card-block m-t-35">
                                        <div id="gmap-styled" class="gmap"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <!-- Basic charts strats here-->
                                <div class="card m-t-35">
                                    <div class="card-header bg-white">
                                        Map Types
                                    </div>
                                    <div class="card-block m-t-35">
                                        <div id="gmap-types" class="gmap"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="card m-t-35">
                                    <div class="card-header bg-white">
                                        Search Place
                                    </div>
                                    <div class="card-block m-t-35">
                                        <form method="post" id="geocoding_form">
                                            <div class="input-group">
                                                <input type="text" size="50" class="input-sm form-control" id="address" name="address" placeholder="Search Location">
                                                <div class="input-group-btn">
                                                    <button class="btn btn-md btn-default">
                                                        <i class="fa fa-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        <br />
                                        <div id="map1" class="gmap"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- row -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card m-t-35">
                                    <div class="card-header bg-white">
                                        Search Routes
                                    </div>
                                    <div class="card-block m-t-35">
                                        <div id="map" class="large"></div>
                                        <div class="search_route_maps_buttons_margin">
                                            <div class="row">
                                                <a href="#" class="btn btn-primary btn-md" id="get_route">Get route</a>
                                                <a href="#" class="btn btn-primary btn-md" id="back">&laquo; Back</a>
                                                <a href="#" class="btn btn-primary btn-md" id="forward">Forward &raquo;</a>
                                            </div>
                                            <div class="row">
                                                <b>Directions:</b>
                                                <ul id="steps"></ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.inner -->
@stop
@section('footer_scripts')
    <!-- Plugin scripts-->
    <script type="text/javascript" src="http://maps.google.com/maps/api/js"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/gmaps/js/gmaps.min.js')}}"></script>
    <!--End of plugin scripts-->
    <script type="text/javascript" src="{{asset('assets/js/pages/maps_page.js')}}"></script>
@stop
