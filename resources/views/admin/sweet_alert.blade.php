@extends('layouts/default')

{{-- Page title --}}
@section('title')
    Sweet Alerts
    @parent
@stop
{{-- page level styles --}}
@section('header_styles')
    <!--Plugin styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/sweetalert/css/sweetalert2.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/sweet_alert.css')}}"/>
    <!--End of Plugin styles-->
@stop
@section('content')
            <header class="head">
                <div class="main-bar row">
                    <div class="col-lg-6 col-md-4 col-sm-4">
                        <h4 class="nav_top_align">
                            <i class="fa fa-anchor"></i>
                            Sweet Alert
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
                                <a href="#">Components</a>
                            </li>
                            <li class="breadcrumb-item active">Sweet Alert</li>
                        </ol>
                    </div>
                </div>
            </header>
            <div class="outer">
                <div class="inner bg-light lter bg-container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-block m-t-35">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h5>Basic Sweet Alerts</h5>
                                            <div class="m-t-10">Sweet alerts with different colors</div>
                                            <div class="examples">
                                                <button class="btn btn-primary m-r-20 message"> Basic message</button>
                                                <button class="btn btn-primary m-r-20 primary_clr">Primary</button>
                                                <button class="btn btn-info m-r-20 info_clr">Info</button>
                                                <button class="btn btn-warning m-r-20 warning_clr">Warning</button>
                                                <button class="btn btn-success m-r-20 success_clr">Success</button>
                                                <button class="btn btn-danger m-r-20 danger_clr">Danger</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 m-t-35">
                                            <h5>Advanced Sweet Alerts</h5>
                                            <div class="m-t-10">Alerts in different steps</div>
                                            <div class="examples">
                                                <button class="btn btn-gray m-r-20 ajax-request">Ajax Request</button>
                                                <button class="btn btn-primary m-r-20 chaining-modals">Chaining modals
                                                </button>
                                                <button class="btn btn-warning m-r-20 dynamic-queue">Dynamic queue
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card m-t-35">
                                <div class="card-block">
                                    <div class="row">
                                        <div class="col-lg-12 m-t-35">
                                            <h5>Sweet Alerts with Images</h5>
                                            <div class="m-t-10">A message with a custom image and differnt buttons</div>
                                            <div class="examples">
                                                <button class="btn btn-success m-r-20 custom-image">Custom Image
                                                </button>
                                                <button class="btn btn-primary m-r-20 custom-width-padding-background">
                                                    Background Submit
                                                </button>
                                                <button class="btn btn-warning m-r-20 warning confirm">Delete
                                                </button>
                                                <button class="btn btn-mint m-r-20 warning cancel">Delete and Cancel
                                                </button>
                                                <button class="btn btn-info m-r-20 jqueryhtml">JQuery HTML</button>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 m-t-35">
                                            <h5>Different Sweet Alerts</h5>
                                            <div class="m-t-10">A message with different alerts</div>
                                            <div class="examples">
                                                <button class="btn btn-warning m-r-20 title-text">Title with a text under</button>
                                                <button class="btn btn-success m-r-20 success">Success message</button>
                                                <button class="btn btn-mint m-r-20 timer">Autoclose timer</button>
                                                <button class="btn btn-danger m-r-20 showcase sweet">Error message</button>
                                                <button class="btn btn-primary m-r-20 html_ex">HTML message</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.inner -->
            </div>
            <!-- /.outer -->
@stop
@section('footer_scripts')
<!-- plugin scripts -->
<script type="text/javascript" src="{{asset('assets/vendors/sweetalert/js/sweetalert2.min.js')}}"></script>
<!-- end plugin scripts -->
<!--Page level scripts-->
<script type="text/javascript" src="{{asset('assets/js/pages/sweet_alerts.js')}}"></script>
<!-- end of page level scripts-->
@stop