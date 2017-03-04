@extends('layouts/default')

{{-- Page title --}}
@section('title')
    P notify
    @parent
@stop
{{-- page level styles --}}
@section('header_styles')
    <!--Plugin styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/pnotify/css/pnotify.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/animate/css/animate.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/pnotify/css/pnotify.buttons.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/pnotify/css/pnotify.history.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/pnotify/css/pnotify.mobile.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/sweetalert/css/sweetalert2.min.css')}}"/>
    <!--End of Plugin styles-->
    <!--Page level styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/p_notify.css')}}"/>
    <!--End of page level styles-->
@stop
@section('content')
            <header class="head">
                <div class="main-bar row">
                    <div class="col-lg-6 col-md-4 col-sm-4">
                        <h4 class="nav_top_align">
                            <i class="fa fa-anchor"></i>
                            P-Notify
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
                            <li class="breadcrumb-item active">P-Notify</li>
                        </ol>
                    </div>
                </div>
            </header>
            <div class="outer">
                <div class="inner bg-container notify_page">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-block m-t-35 m-b-20">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h5>Basic Notifications</h5>
                                            <div class="m-t-10">Basic notifications with different colors</div>
                                            <div>
                                                <button class="btn btn-warning notify_desktop m-r-20">Desktop
                                                    Notification
                                                    Info
                                                </button>
                                                <button class="btn btn-success notify_desktopsuccess m-r-20">Desktop
                                                    Notification
                                                </button>
                                                <button class="btn btn-info notify_dyn_notice m-r-20">Dynamic Notice
                                                </button>
                                                <button class="btn btn-danger notify_regerror m-r-20">Regular Error
                                                </button>
                                                <button class="btn btn-warning notify_formnotice m-r-20">Form Notice
                                                </button>
                                                <div id="form_notice" style="display: none;">
                                                    <form class="pf-form pform_custom" method="post">
                                                        <div class="pf-element pf-heading">
                                                            <h3>Login to Continue</h3>
                                                            <p>Just an example.</p>
                                                        </div>
                                                        <div class="pf-element">
                                                            <label>
                                                                <span class="pf-label">Username</span>
                                                                <input class="pf-field form-control" type="text"
                                                                       name="username"/>
                                                            </label>
                                                        </div>
                                                        <div class="pf-element">
                                                            <label>
                                                                <span class="pf-label">Password</span>
                                                                <input class="pf-field form-control" type="password"
                                                                       name="password"/>
                                                            </label>
                                                        </div>
                                                        <div class="pf-element">
                                                            <label>
                                                                <span class="pf-label">Remember Me</span>
                                                                <input class="pf-field" type="checkbox"
                                                                       name="remember"/>
                                                            </label>
                                                        </div>
                                                        <div class="pf-element pf-buttons pf-centered">
                                                            <input class="pf-button btn btn-default" type="submit"
                                                                   name="submit"
                                                                   value="Submit"/>
                                                            <input class="pf-button btn btn-default" type="button"
                                                                   name="cancel"
                                                                   value="Cancel"/>
                                                        </div>
                                                    </form>
                                                </div>
                                                <button class="btn btn-success notify_clicknotice m-r-20" onclick=" var notice = new PNotify({
            title: 'Click Notice',
            text: 'I wish someone would click me.',
            type: 'success'
        });
        notice.get().css('cursor', 'pointer').click(function (e) {
            if ($(e.target).is('.ui-pnotify-closer *, .ui-pnotify-sticker *'))
                return;
            notice.update({
                type: 'success',
                text: 'Yay, you clicked me!&lt;div style=&quot;text-align: center;&quot;&gt;&lt;img src=&quot;https://upload.wikimedia.org/wikipedia/commons/thumb/e/ec/Happy_smiley_face.png/240px-Happy_smiley_face.png&quot; /&gt;&lt;/div&gt;'});
        });">Click Notice
                                                </button>

                                                <button class="btn btn-info notify_regularinfo">Regular Info</button>


                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 m-t-35">
                                            <h5>Animated Notifications</h5>
                                            <div class="m-t-10">Animated notifications with various styles</div>
                                            <div>
                                                <button class="btn btn-outline-warning notify_fromtop m-r-20">From the
                                                    top!
                                                </button>
                                                <button class="btn btn-outline-info notify_zoom m-r-20">Zoom
                                                </button>
                                                <button class="btn btn-outline-danger notify_zippy m-r-20">Zippy
                                                </button>
                                                <button class="btn btn-outline-success notify_off_handle m-r-20">Off the
                                                    Handle
                                                </button>
                                                <button class="btn btn-outline-info notify_cards">Shuffling Cards
                                                </button>

                                            </div>
                                        </div>
                                    </div>
                                    <!--</div>-->

                                    <div class="row">
                                        <div class="col-lg-12 m-t-35">
                                            <h5>Own Animation Styles</h5>
                                            <div class="m-t-10">Notifications with our own animation styles</div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-xl-4 col-lg-5 col-md-6 col-sm-6 col-xs-12 m-t-10">
                                                        <label for="animate_in" class="control-label">Effect in</label>
                                                        <select id="animate_in"
                                                                class="form-control effect_in_margin_top">
                                                            <option value="bounceIn">bounceIn</option>
                                                            <option value="bounceInDown">bounceInDown</option>
                                                            <option value="bounceInLeft">bounceInLeft</option>
                                                            <option value="bounceInRight">bounceInRight</option>
                                                            <option value="bounceInUp">bounceInUp</option>
                                                            <option value="fadeIn">fadeIn</option>
                                                            <option value="fadeInDown">fadeInDown</option>
                                                            <option value="fadeInDownBig">fadeInDownBig</option>
                                                            <option value="fadeInLeft">fadeInLeft</option>
                                                            <option value="fadeInLeftBig">fadeInLeftBig</option>
                                                            <option value="fadeInRight">fadeInRight</option>
                                                            <option value="fadeInRightBig">fadeInRightBig</option>
                                                            <option value="fadeInUp">fadeInUp</option>
                                                            <option value="fadeInUpBig">fadeInUpBig</option>
                                                            <option value="flipInX">flipInX</option>
                                                            <option value="flipInY">flipInY</option>
                                                            <option value="lightSpeedIn">lightSpeedIn</option>
                                                            <option value="rotateIn">rotateIn</option>
                                                            <option value="rotateInDownLeft">rotateInDownLeft</option>
                                                            <option value="rotateInDownRight">rotateInDownRight</option>
                                                            <option value="rotateInUpLeft">rotateInUpLeft</option>
                                                            <option value="rotateInUpRight">rotateInUpRight</option>
                                                            <option value="rollIn">rollIn</option>
                                                            <option value="zoomIn">zoomIn</option>
                                                            <option value="zoomInDown">zoomInDown</option>
                                                            <option value="zoomInLeft">zoomInLeft</option>
                                                            <option value="zoomInRight">zoomInRight</option>
                                                            <option value="zoomInUp">zoomInUp</option>
                                                            <option value="slideInDown">slideInDown</option>
                                                            <option value="slideInLeft">slideInLeft</option>
                                                            <option value="slideInRight">slideInRight</option>
                                                            <option value="slideInUp">slideInUp</option>
                                                        </select>
                                                    </div>
                                                    <div class="clearfix hidden-lg-up hidden-md-up hidden-sm-up hidden-xl-up"></div>
                                                    <!--<div class="form-group">-->
                                                    <div class="col-xl-4 col-lg-5 col-md-6 col-sm-7 col-xs-12 m-t-10">
                                                        <label for="animate_out" class="control-label">Effect
                                                            out</label>
                                                        <select id="animate_out" class="form-control">
                                                            <option value="bounceOut">bounceOut</option>
                                                            <option value="bounceOutDown">bounceOutDown</option>
                                                            <option value="bounceOutLeft">bounceOutLeft</option>
                                                            <option value="bounceOutRight">bounceOutRight</option>
                                                            <option value="bounceOutUp">bounceOutUp</option>
                                                            <option value="fadeOut">fadeOut</option>
                                                            <option value="fadeOutDown">fadeOutDown</option>
                                                            <option value="fadeOutDownBig">fadeOutDownBig</option>
                                                            <option value="fadeOutLeft">fadeOutLeft</option>
                                                            <option value="fadeOutLeftBig">fadeOutLeftBig</option>
                                                            <option value="fadeOutRight">fadeOutRight</option>
                                                            <option value="fadeOutRightBig">fadeOutRightBig</option>
                                                            <option value="fadeOutUp">fadeOutUp</option>
                                                            <option value="fadeOutUpBig">fadeOutUpBig</option>
                                                            <option value="flipOutX">flipOutX</option>
                                                            <option value="flipOutY">flipOutY</option>
                                                            <option value="lightSpeedOut">lightSpeedOut</option>
                                                            <option value="rotateOut">rotateOut</option>
                                                            <option value="rotateOutDownLeft">rotateOutDownLeft</option>
                                                            <option value="rotateOutDownRight">rotateOutDownRight
                                                            </option>
                                                            <option value="rotateOutUpLeft">rotateOutUpLeft</option>
                                                            <option value="rotateOutUpRight">rotateOutUpRight</option>
                                                            <option value="hinge">hinge</option>
                                                            <option value="rollOut">rollOut</option>
                                                            <option value="zoomOut">zoomOut</option>
                                                            <option value="zoomOutDown">zoomOutDown</option>
                                                            <option value="zoomOutLeft">zoomOutLeft</option>
                                                            <option value="zoomOutRight">zoomOutRight</option>
                                                            <option value="zoomOutUp">zoomOutUp</option>
                                                            <option value="slideOutDown">slideOutDown</option>
                                                            <option value="slideOutLeft">slideOutLeft</option>
                                                            <option value="slideOutRight">slideOutRight</option>
                                                            <option value="slideOutUp">slideOutUp</option>
                                                        </select>
                                                    </div>
                                                    <div class="clearfix hidden-lg-up hidden-md-up hidden-sm-up hidden-xl-up"></div>
                                                    <div class="col-xl-4 col-lg-5 col-sm-6 m-t-10">
                                                        <button class="btn btn-success btn_margin_top notify_btn">
                                                            Notify!
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--</div>-->
                                </div>
                            </div>
                            <div class="card m-t-35">
                                <div class="card-block m-t-35 m-b-20">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h5>Callback Notifications</h5>
                                            <div class="m-t-10">Callbacks Module Manipulate the notice during its lifecycle</div>
                                            <div>
                                                <button class="btn btn-warning notify_callback m-r-20">Notice with
                                                    Callbacks
                                                </button>
                                                <button class="btn btn-mint notify_callback1 m-r-20">Notice-Error to
                                                    Success-Info
                                                </button>
                                                <button class="btn btn-danger notify_bignotice">Big Notice
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 m-t-35">
                                            <h5>Attention Seekers</h5>
                                            <div class="m-t-10">Notifications with different animated styles</div>
                                            <div>
                                                <button class="btn btn-success lorvent notify_bounce m-r-20">Bounce
                                                </button>
                                                <button class="btn btn-warning notify_flash m-r-20">Flash
                                                </button>
                                                <button class="btn btn-info notify_pulse m-r-20">Pulse
                                                </button>
                                                <button class="btn btn-danger notify_rubberband m-r-20">Rubber Band
                                                </button>
                                                <button class="btn btn-success notify_shake m-r-20">Shake
                                                </button>
                                                <button class="btn btn-warning notify_swing m-r-20">Swing
                                                </button>
                                                <button class="btn btn-info notify_tada m-r-20">Tada
                                                </button>
                                                <button class="btn btn-danger notify_wobble m-r-20">Wobble
                                                </button>
                                                <button class="btn btn-success notify_jello">Jello
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 m-t-35">
                                            <h5>Confirm Notifications</h5>
                                            <div class="m-t-10">Confirm Module Confirmation dialogs and prompts</div>
                                            <div>
                                                <button class="btn btn-outline-success notify_confirm_dialog m-r-20">
                                                    Confirm
                                                    Dialog
                                                </button>
                                                <button class="btn btn-outline-info notify_modal_dialog m-r-20">Modal
                                                    Confirm
                                                    Dialog
                                                </button>
                                                <button class="btn btn-outline-danger notify_custom_buttons m-r-20">
                                                    Custom
                                                    Buttons
                                                </button>
                                                <button class="btn btn-outline-warning notify_alert_button m-r-20">Alert
                                                    Style
                                                    Button
                                                </button>
                                                <button class="btn btn-outline-success notify_prompt_dialog m-r-20">
                                                    Prompt
                                                    Dialog
                                                </button>
                                                <button class="btn btn-outline-danger notify_multiprompt_dialog">Multi
                                                    Line
                                                    Prompt Dialog
                                                </button>
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
            </div>
@stop
@section('footer_scripts')
<!--Plugin scripts-->
<script type="text/javascript" src="{{asset('assets/vendors/pnotify/js/pnotify.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/pnotify/js/pnotify.animate.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/pnotify/js/pnotify.buttons.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/pnotify/js/pnotify.confirm.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/pnotify/js/pnotify.nonblock.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/pnotify/js/pnotify.mobile.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/pnotify/js/pnotify.desktop.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/pnotify/js/pnotify.history.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/pnotify/js/pnotify.callbacks.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/sweetalert/js/sweetalert2.min.js')}}"></script>
<!--End of plugin scripts-->
<!--Page level scripts-->
<script type="text/javascript" src="{{asset('assets/js/pages/p_notify.js')}}"></script>
<!-- end of global scripts-->
@stop