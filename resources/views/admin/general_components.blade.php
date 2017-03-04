@extends('layouts/default')

{{-- Page title --}}
@section('title')
    General Components
    @parent
@stop
{{-- page level styles --}}
@section('header_styles')
    <!--Page level styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/general_components.css')}}"/>
    <!-- end of page level styles -->
@stop
@section('content')
            <header class="head">
                <div class="main-bar row">
                    <div class="col-lg-6 col-sm-5 col-md-12 col-xs-12">
                        <h4 class="nav_top_align">
                            <i class="fa fa-anchor" aria-hidden="true"></i>
                            General Components
                        </h4>
                    </div>
                    <div class="col-lg-6 col-sm-7 col-md-12 col-xs-12">
                        <ol class="breadcrumb float-xs-right nav_breadcrumb_top_align">
                            <li class="breadcrumb-item">
                                <a href="index1">
                                    <i class="fa fa-home" aria-hidden="true"></i>
                                    Dashboard
                                </a>
                            </li>
                            <li class="breadcrumb-item">

                                <a href="#">Components</a>
                            </li>
                            <li class="breadcrumb-item active">General Components</li>
                        </ol>
                    </div>
                </div>
            </header>
            <div class="outer">
                <div class="inner bg-container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header bg-white">
                                    Color Pallet
                                </div>
                                <div class="card-block">
                                    <div class="row">
                                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                            <div class="border_box m-t-35">
                                                <div class="row">
                                                    <div class="col-xs-4 p-r-0">
                                                        <div class="padding10 bg-primary disabled">Lite</div>
                                                    </div>
                                                    <div class="col-xs-4 p-lr-0">
                                                        <div class="padding10 bg-primary">Medium</div>
                                                    </div>
                                                    <div class="col-xs-4 p-l-0">
                                                        <div class="padding10 primary_bg_dark">Dark</div>
                                                    </div>
                                                    <div class="col-xs-12 col-md-12 margin_for_lite_text"> Primary
                                                        Variation
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                            <div class="border_box m-t-35">
                                                <div class="row">
                                                    <div class="col-xs-4 p-r-0">
                                                        <div class="padding10 bg-success disabled">Lite</div>
                                                    </div>
                                                    <div class="col-xs-4 p-lr-0">
                                                        <div class="padding10 bg-success">Medium</div>
                                                    </div>
                                                    <div class="col-xs-4 p-l-0">
                                                        <div class="padding10 success_bg_dark">Dark</div>
                                                    </div>
                                                    <div class="col-xs-12 col-md-12 margin_for_lite_text">Success
                                                        Variation
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                            <div class="border_box m-t-35">
                                                <div class="row">
                                                    <div class="col-xs-4 p-r-0">
                                                        <div class="padding10 bg-danger disabled">Lite</div>
                                                    </div>
                                                    <div class="col-xs-4 p-lr-0">
                                                        <div class="padding10 bg-danger">Medium</div>
                                                    </div>
                                                    <div class="col-xs-4 p-l-0">
                                                        <div class="padding10 danger_bg_dark">Dark</div>
                                                    </div>
                                                    <div class="col-xs-12 col-md-12 margin_for_lite_text">Danger Variation
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                            <div class="border_box m-t-35">
                                                <div class="row">
                                                    <div class="col-xs-4 p-r-0">
                                                        <div class="padding10 bg-warning disabled">Lite</div>
                                                    </div>
                                                    <div class="col-xs-4 p-lr-0">
                                                        <div class="padding10 bg-warning">Medium</div>
                                                    </div>
                                                    <div class="col-xs-4 p-l-0">
                                                        <div class="padding10 warning_bg_dark">Dark</div>
                                                    </div>
                                                    <div class="col-xs-12 col-md-12 margin_for_lite_text">Warning
                                                        Variation
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                            <div class="border_box m-t-35">
                                                <div class="row">
                                                    <div class="col-xs-4 p-r-0">
                                                        <div class="padding10 bg-info disabled">Lite</div>
                                                    </div>
                                                    <div class="col-xs-4 p-lr-0">
                                                        <div class="padding10 bg-info">Medium</div>
                                                    </div>
                                                    <div class="col-xs-4 p-l-0">
                                                        <div class="padding10 info_bg_dark">Dark</div>
                                                    </div>
                                                    <div class="col-xs-12 col-md-12 margin_for_lite_text">Info Variation
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                            <div class="border_box m-t-35">
                                                <div class="row">
                                                    <div class="col-xs-4 p-r-0">
                                                        <div class="padding10 bg-mint disabled">Lite</div>
                                                    </div>
                                                    <div class="col-xs-4 p-lr-0">
                                                        <div class="padding10 bg-mint">Medium</div>
                                                    </div>
                                                    <div class="col-xs-4 p-l-0">
                                                        <div class="padding10 mint_bg_dark">Dark</div>
                                                    </div>
                                                    <div class="col-xs-12 col-md-12 margin_for_lite_text">Mint Variation
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                            <div class="border_box m-t-35">
                                                <div class="row">
                                                    <div class="col-xs-4 p-r-0">
                                                        <div class="padding10 bg-gray disabled">Lite</div>
                                                    </div>
                                                    <div class="col-xs-4 p-lr-0">
                                                        <div class="padding10 bg-gray">Medium</div>
                                                    </div>
                                                    <div class="col-xs-4 p-l-0">
                                                        <div class="padding10 gray_bg_dark">Dark</div>
                                                    </div>
                                                    <div class="col-xs-12 col-md-12 margin_for_lite_text">Gray Variation
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                                            <div class="border_box m-t-35">
                                                <div class="row">
                                                    <div class="col-xs-4 p-r-0">
                                                        <div class="padding10 bg-default disabled">Lite</div>
                                                    </div>
                                                    <div class="col-xs-4 p-lr-0">
                                                        <div class="padding10 bg-default">Medium</div>
                                                    </div>
                                                    <div class="col-xs-4 p-l-0">
                                                        <div class="ol-xs-4 padding10 default_bg_dark">Dark</div>
                                                    </div>
                                                    <div class="col-xs-12 col-md-12 margin_for_lite_text">Default
                                                        Variation
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card m-t-35">
                                <div class="card-header bg-white">
                                    Headings
                                </div>
                                <div class="card-block">
                                    <h1 class="m-t-25">Heading level 1</h1>
                                    <h2>Heading level 2</h2>
                                    <h3>Heading level 3</h3>
                                    <h4>Heading level 4</h4>
                                    <h5>Heading level 5</h5>
                                    <h6>Heading level 6</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card  m-t-35">
                                <div class="card-header bg-white">
                                    Lists
                                </div>
                                <div class="card-block">
                                    <div class="list-group m-t-35">
                                        <ul class="list-group lists_margin_bottom">
                                            <li class="list-group-item">
                                                Cras justo odio
                                                <span class="tag tag-pill tag-primary">14</span>
                                            </li>
                                            <li class="list-group-item">Astala vista dio maricopa</li>

                                            <li class="list-group-item">

                                                geria feito masta heon
                                                <span class="tag tag-pill tag-primary">44</span>
                                            </li>
                                            <li class="list-group-item">terian becko chinas suo</li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card m-t-35">
                                <div class="card-header bg-white">
                                    Alerts
                                </div>
                                <div class="card-block">
                                    <div class="row m-t-35">
                                        <div class="col-lg-6">
                                            <div class="alert alert-warning alert-dismissable">
                                                <button type="button" class="close" data-dismiss="alert"
                                                        aria-hidden="true">×
                                                </button>
                                                <strong>Warning!</strong>
                                                Best check your self, you're not looking too good.
                                            </div>
                                            <div class="alert alert-warning alert-dismissable">
                                                <button type="button" class="close" data-dismiss="alert"
                                                        aria-hidden="true">×
                                                </button>
                                                <h4 class="text-white">Warning!</h4>
                                                <p>
                                                    Change this and that and try again.
                                                    <a class="alert-link">Duis mollis</a>
                                                    , est non commodo luctus.
                                                </p>
                                                <p>
                                                    <a class="btn btn-secondary" href="#">Take this action</a>
                                                    <a class="btn btn-link text-white" href="#">Or do this</a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="alert alert-info alert-dismissable">
                                                <button type="button" class="close" data-dismiss="alert"
                                                        aria-hidden="true">×
                                                </button>
                                                <strong>Heads up!</strong>
                                                This alert needs your attention, but it's not super important.
                                            </div>
                                            <div class="alert alert-info alert-dismissable">
                                                <button type="button" class="close" data-dismiss="alert"
                                                        aria-hidden="true">×
                                                </button>
                                                <h4 class="text-white">Heads up!</h4>
                                                <p>
                                                    Change this and that and try again.
                                                    <a class="alert-link">Duis mollis</a>
                                                    , est non commodo luctus.
                                                </p>
                                                <p>
                                                    <a class="btn btn-secondary" href="#">Take this action</a>
                                                    <a class="btn btn-link text-white" href="#">Or do this</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="alert alert-success alert-dismissable">
                                                <button type="button" class="close" data-dismiss="alert"
                                                        aria-hidden="true">×
                                                </button>
                                                <strong>Well done!</strong>
                                                You successfully read this important alert message.
                                            </div>
                                            <div class="alert alert-success">
                                                <button type="button" class="close" data-dismiss="alert"
                                                        aria-hidden="true">×
                                                </button>
                                                <h4 class="text-white">Well done!</h4>
                                                <p>
                                                    Change this and that and try again.
                                                    <a class="alert-link">Duis mollis</a>
                                                    , est non commodo luctus.
                                                </p>
                                                <p>
                                                    <a class="btn btn-secondary" href="#">Take this action</a>
                                                    <a class="btn btn-link text-white" href="#">Or do this</a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="alert alert-danger alert-dismissable">
                                                <button type="button" class="close" data-dismiss="alert"
                                                        aria-hidden="true">×
                                                </button>
                                                <strong>Oh snap!</strong>
                                                Change a few things up and try submitting again.
                                            </div>

                                            <div class="alert alert-danger alert-dismissable">
                                                <button type="button" class="close" data-dismiss="alert"
                                                        aria-hidden="true">×
                                                </button>
                                                <h4 class="text-white">Oh snap!</h4>
                                                <p>
                                                    Change this and that and try again.
                                                    <a class="alert-link">Duis mollis</a>
                                                    , est non commodo luctus.
                                                </p>
                                                <p>
                                                    <a class="btn btn-secondary" href="#">Take this action</a>
                                                    <a class="btn btn-link text-white" href="#">Or do this</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 m-t-35">
                            <div class="card">
                                <div class="card-header bg-white">
                                    Tooltips and Popovers
                                </div>
                                <div class="card-block m-t-20 text-xs-center text-sm-left">
                                    <div class="row">
                                        <div class="col-lg-12 m-t-15">
                                            <h5>Tooltips</h5>
                                            <div class="row">
                                                <div class="col-lg-3 col-sm-6 col-xs-12">
                                                    <button type="button" class="btn btn-primary m-t-20" data-toggle="tooltip" data-placement="top" title=" Top">
                                                        Tooltip on top
                                                    </button>
                                                </div>
                                                <div class="col-lg-3 col-sm-6 col-xs-12">
                                                    <button type="button" class="btn btn-info m-t-20" data-toggle="tooltip" data-placement="right" title="Right">
                                                        Tooltip on right
                                                    </button>
                                                </div>
                                                <div class="col-lg-3 col-sm-6 col-xs-12">
                                                    <button type="button" class="btn btn-warning m-t-20" data-toggle="tooltip" data-placement="bottom" title="Bottom">
                                                        Tooltip on bottom
                                                    </button>
                                                </div>
                                                <div class="col-lg-3 col-sm-6 col-xs-12">
                                                    <button type="button" class="btn btn-success m-t-20" data-toggle="tooltip" data-placement="left" title="Left">
                                                        Tooltip on left
                                                    </button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row m-t-20">
                                        <div class="col-lg-12 m-t-15">
                                            <h5>Popovers</h5>
                                            <div class="row">
                                                <div class="col-lg-3 col-sm-6">
                                                    <button type="button" class="btn btn-primary m-t-20" data-toggle="popover" data-placement="top" data-content="Top">
                                                        Popovers on top
                                                    </button>
                                                </div>
                                                <div class="col-lg-3 col-sm-6">
                                                    <button type="button" class="btn btn-info m-t-20" data-toggle="popover" data-placement="right" data-content="Right">
                                                        Popovers on right
                                                    </button>
                                                </div>
                                                <div class="col-lg-3 col-sm-6">
                                                    <button type="button" class="btn btn-warning m-t-20" data-toggle="popover" data-placement="bottom" data-content="Bottom">
                                                        Popovers on bottom
                                                    </button>
                                                </div>
                                                <div class="col-lg-3 col-sm-6">
                                                    <button type="button" class="btn btn-success m-t-20" data-toggle="popover" data-placement="left" data-content="Left">
                                                        Popovers on left
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 m-t-35">
                            <div class="card">
                                <div class="card-header bg-white">
                                    Paginations
                                </div>
                                <div class="card-block">
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12  m-t-25">
                                            <ul class="pagination pagination_padding_general_components">
                                                <li class="page-item active">
                                                    <a href="#">PREVIOUS</a>
                                                </li>
                                                <li class="page-item">
                                                    <a href="#">1</a>
                                                </li>
                                                <li class="page-item active">
                                                    <a href="#">2</a>
                                                </li>
                                                <li class="page-item">
                                                    <a href="#">3</a>
                                                </li>
                                                <li class="page-item disabled">
                                                    <a href="#">4</a>
                                                </li>
                                                <li class="page-item active">
                                                    <a href="#">NEXT</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <ul class="pagination pagination_padding_general_components">
                                                <li class="page-item active">
                                                    <a href="#">
                                                        <span class="fa fa-angle-double-left"></span>
                                                    </a>
                                                </li>
                                                <li class="page-item">
                                                    <a href="#">1</a>
                                                </li>
                                                <li class="page-item active">
                                                    <a href="#">2</a>
                                                </li>
                                                <li class="page-item">
                                                    <a href="#">3</a>
                                                </li>
                                                <li class="page-item">
                                                    <a href="#">4</a>
                                                </li>
                                                <li class="page-item disabled">
                                                    <a href="#">...</a>
                                                </li>
                                                <li class="page-item">
                                                    <a href="#">15</a>
                                                </li>
                                                <li class="page-item active">
                                                    <a href="#">
                                                        <span class="fa fa-angle-double-right"></span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-12">
                                            <ul class="pagination pagination_padding_general_components">
                                                <li class="page-item">
                                                    <a href="#" class="page-link" aria-label="Previous">
                                                        <span aria-hidden="true">«</span>
                                                    </a>
                                                </li>
                                                <li class="page-item"><a href="#" class="page-link">1</a></li>
                                                <li class="page-item"><a href="#" class="page-link">2</a></li>
                                                <li class="page-item"><a href="#" class="page-link">3</a></li>
                                                <li class="page-item disabled"><a href="#" class="page-link">4</a></li>
                                                <li class="page-item"><a href="#" class="page-link">5</a></li>
                                                <li class="page-item"><a href="#" class="page-link">6</a></li>
                                                <li class="page-item"><a href="#" class="page-link">7</a></li>
                                                <li class="page-item">
                                                    <a href="#" class="page-link" aria-label="Next">
                                                        <span aria-hidden="true">»</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card m-t-35">
                                <div class="card-header bg-white">
                                    Pills
                                </div>
                                <div class="card-block">
                                    <div class="row">
                                        <div class="col-lg-12">

                                            <ul class="nav nav-pills nav_profile_color nav-inline  m-t-35">
                                                <li class="nav-item nav_hover_color_home nav_home_color">
                                                    <a href="#" class="nav-link active nav_active_background_color">Home
                                                    </a>
                                                </li>
                                                <li class="nav-item nav_profile_color">
                                                    <a href="#" class="nav-link">
                                                        Profile
                                                        <span class="tag tag-pill tag-danger">42</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item nav_profile_color">
                                                    <a href="#" class="nav-link">
                                                        Menu
                                                        <span class="tag tag-pill tag-danger">42</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-12 ">
                                            <ul class="nav nav-pills nav_profile_color nav-stacked nav_bar_align_top nav_inline_profile">
                                                <li class="nav-item nav_active_background_color">
                                                    <a href="#" class="nav-link active">
                                                        Home
                                                        <span class="tag tag-danger tag-pill float-xs-right">42</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item nav_profile_color">
                                                    <a href="#" class="nav-link">Profile</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-6 m-t-35">
                            <div class="card">
                                <div class="card-header bg-white">
                                    Progress Bars
                                </div>
                                <div class="card-block progress_bars_margin_top">
                                    <h5 class="m-t-35">Basic Progress Bars</h5>
                                    <progress class="progress progress-success" value="73" max="100">73%</progress>
                                    <progress class="progress progress-info" value="500" max="1000">50%</progress>
                                    <progress class="progress progress-warning" value="35" max="100">35%</progress>
                                    <progress class="progress progress-danger" value="200" max="1000">20%</progress>

                                    <h5 class="m-t-35">Stripped Progress Bars</h5>
                                    <progress class="progress progress-striped progress-success" value="73" max="100">
                                        73%
                                    </progress>
                                    <progress class="progress progress-striped progress-info" value="500" max="1000">
                                        50%
                                    </progress>
                                    <progress class="progress progress-striped progress-warning" value="35" max="100">
                                        35%
                                    </progress>
                                    <progress class="progress progress-striped progress-danger" value="200" max="1000">
                                        20%
                                    </progress>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.inner -->
            </div>
            <!-- /.outer -->
            <!-- Modal -->
            <div class="modal fade" id="search_modal" tabindex="-1" role="dialog"
                 aria-hidden="true">
                <form>
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div class="input-group search_bar_small">
                                <input type="text" class="form-control" placeholder="Search..." name="search">
                                <span class="input-group-btn">
        <button class="btn btn-secondary" type="submit"><i class="fa fa-search"></i></button>
      </span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
@stop
@section('footer_scripts')
<script>
    $('[data-toggle="popover"]').popover()
</script>
@stop