@extends('layouts/default')

{{-- Page title --}}
@section('title')
    Data Tables
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <!--Page level styles-->
    <title> | Admire</title>

    <!--IE Compatibility modes-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Mobile first-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/logo1.ico"/>

    <!-- global styles-->
    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Font Awesome -->
    <link type="text/css" rel="stylesheet" href="css/font-awesome.min.css" />
    <link type="text/css" rel="stylesheet" href="css/app.css" />
    <link type="text/css" rel="stylesheet" href="assets/lib/themify-icons/themify-icons.css" />
    <!-- bootstrap overwritten -->
    <!--<link type="text/css" rel="stylesheet" href="assets/css/bootstrap-overwritten.css" />-->
    <!-- core stylesheet -->
    <link type="text/css" rel="stylesheet" href="assets/css/main.css" />
    <!--<link type="text/css" rel="stylesheet" href="assets/css/panel.css" />-->
    <link type="text/css" rel="stylesheet" href="assets/css/skins/skin.css" />
    <link type="text/css" rel="stylesheet" href="assets/css/skins/black_skin.css" />
    <script type="text/javascript">
    function loadjscssfile(filename, filetype) {
        if (filetype == "css") {
            var fileref = document.createElement("link");
            fileref.rel = "stylesheet";
            fileref.type = "text/css";
            fileref.href = 'assets/css/skins/' + filename;
            document.getElementsByTagName("head")[0].appendChild(fileref)
        }
    }
    </script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="assets/lib/html5shiv/html5shiv.js"></script>
    <script src="assets/lib/respond/respond.min.js"></script>
    <![endif]-->
    <!--Modernizr 2.8.2-->
    <script type="text/javascript" src="assets/lib/modernizr/modernizr.min.js"></script>
    <!-- end of global styles-->
    <!-- page level styles -->
    <link type="text/css" rel="stylesheet" href="assets/lib/datatables/css/select2.css" />

    <link type="text/css" rel="stylesheet" href="assets/lib/datatables/css/dataTables.scroller.min.css" />
    <link type="text/css" rel="stylesheet" href="assets/lib/datatables/css/dataTables.colReorder.min.css" />
    <link type="text/css" rel="stylesheet" href="assets/lib/datatables/css/dataTables.bootstrap.css" />
    <link type="text/css" rel="stylesheet" href="assets/css/pages/tables.css" />
    <!-- end of page level styles -->

</head>

<body class="  ">
    <div class="bg-dark dk" id="wrap">
        <div id="top">
            <!-- .navbar -->
            <nav class="navbar navbar-static-top">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <header class="navbar-header">
                        <button type="button" class="navbar-toggle toggle_icon" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar toggle_icon"></span>
                            <span class="icon-bar toggle_icon"></span>
                            <span class="icon-bar toggle_icon"></span>
                        </button>
                        <a href="index1.html" class="navbar-brand">
                            <span>
                                <img src="assets/img/logow.png" width="58" height="50" alt="logo"> <b class="white_txt">ADMIRE ADMIN</b>
                            </span>
                        </a>
                    </header>
                    <div class="topnav  dropdown-menu-right">
                        <div class="btn-group">
                            <div class="notifications no-bg">
                                <a class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-envelope fa-1x"></i>
                                    <span class="label label-warning">4</span>
                                </a>
                                <div class="dropdown-menu" role="menu">
                                    <div class="popover-title">You have 4 Messages</div>
                                    <div class="data">
                                        <div class="col-xs-2">
                                            <img src="assets/img/mailbox_imgs/5.jpg" class="message-img avatar" alt="avatar1"></div>
                                        <div class="col-xs-10 message-data"> <strong>hally</strong>
                                            sent you an image.
                                            <br>
                                            <small>add to timeline</small>
                                        </div>
                                    </div>
                                    <div class="data">
                                        <div class="col-xs-2">
                                            <img src="assets/img/mailbox_imgs/8.jpg" class="message-img avatar" alt="avatar1"></div>
                                        <div class="col-xs-10 message-data"> <strong>Meri</strong>
                                            invitation for party.
                                            <br>
                                            <small>add to timeline</small>
                                        </div>
                                    </div>
                                    <div class="data">
                                        <div class="col-xs-2">
                                            <img src="assets/img/mailbox_imgs/7.jpg" class="message-img avatar" alt="avatar1"></div>
                                        <div class="col-xs-10 message-data">
                                            <strong>Remo</strong>
                                            meeting details .
                                            <br>
                                            <small>add to timeline</small>
                                        </div>
                                    </div>
                                    <div class="data">
                                        <div class="col-xs-2">
                                            <img src="assets/img/mailbox_imgs/6.jpg" class="message-img avatar" alt="avatar1"></div>
                                        <div class="col-xs-10 message-data">
                                            <strong>David</strong>
                                            upcoming events list.
                                            <br>
                                            <small>add to timeline</small>
                                        </div>
                                    </div>
                                    <div class="popover-footer">
                                        <a href="mail_inbox.html">Inbox</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="btn-group">
                            <div class="notifications messages no-bg">
                                <a class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-bell"></i>
                                    <span class="label label-danger">4</span>
                                </a>
                                <div class="dropdown-menu" role="menu">
                                    <div class="popover-title">You have 4 Notifications</div>
                                    <div class="data">
                                        <div class="col-xs-2">
                                            <img src="assets/img/mailbox_imgs/1.jpg" class="message-img avatar" alt="avatar1"></div>
                                        <div class="col-xs-10 message-data">
                                            <i class="fa fa-clock-o"></i>
                                            <strong>Remo</strong>
                                            sent you an image
                                            <br>
                                            <small class="primary_txt">just now.</small>
                                            <br>
                                        </div>
                                    </div>
                                    <div class="data">
                                        <div class="col-xs-2">
                                            <img src="assets/img/mailbox_imgs/2.jpg" class="message-img avatar" alt="avatar1"></div>
                                        <div class="col-xs-10 message-data">
                                            <i class="fa fa-clock-o"></i>
                                            <strong>clay</strong>
                                            business propasals
                                            <br>
                                            <small class="primary_txt">20min Back.</small>
                                            <br></div>
                                    </div>
                                    <div class="data">
                                        <div class="col-xs-2">
                                            <img src="assets/img/mailbox_imgs/3.jpg" class="message-img avatar" alt="avatar1"></div>
                                        <div class="col-xs-10 message-data">
                                            <i class="fa fa-clock-o"></i>
                                            <strong>John</strong>
                                            meeting at Ritz
                                            <br>
                                            <small class="primary_txt">2hrs Back.</small>
                                            <br></div>
                                    </div>
                                    <div class="data">
                                        <div class="col-xs-2">
                                            <img src="assets/img/mailbox_imgs/4.jpg" class="message-img avatar" alt="avatar1"></div>
                                        <div class="col-xs-10 message-data">
                                            <i class="fa fa-clock-o"></i>
                                            <strong>Luicy</strong>
                                            Request Invitation
                                            <br>
                                            <small class="primary_txt">Yesterday.</small>
                                            <br></div>
                                    </div>
                                    <div class="popover-footer">
                                        <a href="#">View All</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="btn-group">
                            <a class="btn btn-default btn-sm toggle-left" id="menu-toggle" role="button">
                                &nbsp;
                                <i class="ti-menu"></i>
                                &nbsp;
                            </a>
                        </div>
                        <div class="btn-group">
                            <a class="btn btn-default btn-sm toggle-right">
                                &nbsp;
                                <i class="ti-settings"></i>
                                &nbsp;
                            </a>
                        </div>
                        <div class="btn-group">
                            <div class="user-settings no-bg">
                                <button type="button" class="btn btn-default dropdown-toggle no-bg" data-toggle="dropdown">
                                    <img src="assets/img/admin.jpg" width="27" height="27" class="avatar-img" alt="avatar"> <b>Micheal</b>
                                    <span class="fa fa-sort-down white_bg"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li class="popover-title">
                                        <span class="ti-settings float-xs-right"></span>
                                        Admire Admin
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="ti-shine"></span>
                                            Account Settings
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="ti-user"></span>
                                            User Status
                                        </a>
                                    </li>
                                    <li>
                                        <a href="mail_inbox.html">
                                            <span class="ti-email"></span>
                                            Inbox
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="lockscreen.html">
                                            <span class="ti-lock"></span>
                                            Lock Screen
                                        </a>
                                    </li>
                                    <li>
                                        <a href="login.html">
                                            <span class="ti-cloud-down"></span>
                                            Log Out
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="collapse navbar-collapse navbar-ex1-collapse">
                        <!-- .nav -->

                        <ul class="nav navbar-nav">
                            <li>
                                <a href="mail_inbox.html">
                                    <span class="ti-cloud-down"></span>
                                    Inbox
                                </a>
                            </li>
                            <li>
                                <a href="mail_compose.html">
                                    <span class="ti-cloud-up"></span>
                                    Compose
                                </a>
                            </li>
                            <li>
                                <a href="maps.html">
                                    <span class="ti-map-alt"></span>
                                    Maps
                                </a>
                            </li>
                            <li>
                                <a href="gallery.html">
                                    <span class="ti-image"></span>
                                    Gallery
                                </a>
                            </li>
                        </ul>
                        <!-- /.nav --> </div>
                </div>
                <!-- /.container-fluid --> </nav>
            <!-- /.navbar -->
            <!-- /.head --> </div>
        <!-- /#top -->
        <div id="left">
            <div class="media user-media bg-dark dker">
                <div class="user-media-toggleHover">
                    <span class="fa fa-user"></span>
                </div>
                <div class="user-wrapper bg-dark">
                    <a class="user-link" href="">
                        <img class="media-object img-thumbnail user-img rounded-circle" alt="User Picture" src="assets/img/admin.jpg" width="64" height="64"></a>
                    <div class="media-body">
                        <h5 class="media-heading">
                            <br />
                        </h5>
                        <ul class="list-unstyled user-info">
                            <li>Welcome Back</li>
                            <li>Micheal</li>
                        </ul>
                    </div>
                    <div class="search_bar">
                        <form>
                            <div class="input-group">
                                <input type="text" class="input-sm form-control left-search" placeholder="Search">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- #menu -->
            <ul id="menu" class="bg-blue dker">
                <li>
                    <a href="index1.html">
                        <i class="ti-home"></i>
                        <span class="link-title">&nbsp;Dashboard</span>
                    </a>
                </li>
                <li class="">
                    <a href="javascript:;">
                        <i class="ti-anchor"></i>
                        <span class="link-title">&nbsp; Components</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul>
                        <li>
                            <a href="general_components.html">
                                <i class="fa fa-angle-right"></i>
                                &nbsp; General Components
                            </a>
                        </li>
                        <li>
                            <a href="advanced_components.html">
                                <i class="fa fa-angle-right"></i>
                                &nbsp; Advanced Components
                            </a>
                        </li>
                        <li>
                            <a href="sliders.html">
                                <i class="fa fa-angle-right"></i>
                                &nbsp; Transitions & Sliders
                            </a>
                        </li>
                        <li>
                            <a href="icons.html">
                                <i class="fa fa-angle-right"></i>
                                &nbsp; Icons
                            </a>
                        </li>
                        <li>
                            <a href="buttons.html">
                                <i class="fa fa-angle-right"></i>
                                &nbsp; Buttons
                            </a>
                        </li>
                        <li>
                            <a href="notifications.html">
                                <i class="fa fa-angle-right"></i>
                                &nbsp; Notifications
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a href="javascript:;">
                        <i class="ti-pencil-alt"></i>
                        <span class="link-title">&nbsp; Forms</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul>
                        <li>
                            <a href="form_elements.html">
                                <i class="fa fa-angle-right"></i>
                                &nbsp; Form Elements
                            </a>
                        </li>
                        <li>
                            <a href="form_layouts.html">
                                <i class="fa fa-angle-right"></i>
                                &nbsp; Form Layouts
                            </a>
                        </li>
                        <li>
                            <a href="form_validations.html">
                                <i class="fa fa-angle-right"></i>
                                &nbsp; Form Validations
                            </a>
                        </li>
                        <li>
                            <a href="form_editors.html">
                                <i class="fa fa-angle-right"></i>
                                &nbsp; Form Editors
                            </a>
                        </li>
                        <li>
                            <a href="form_wizards.html">
                                <i class="fa fa-angle-right"></i>
                                &nbsp; Wizards
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="active">
                    <a href="table.html">
                        <i class="ti-layout-grid3"></i>
                        <span class="link-title">&nbsp; Tables</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul>
                        <li>
                            <a href="simple_tables.html">
                                <i class="fa fa-angle-right"></i>
                                &nbsp; Simple Tables
                            </a>
                        </li>
                        <li class="active" id="active">
                            <a href="datatables.html">
                                <i class="fa fa-angle-right"></i>
                                &nbsp; Data Tables
                            </a>
                        </li>
                        <li>
                            <a href="advanced_tables.html">
                                <i class="fa fa-angle-right"></i>
                                &nbsp; Advanced Tables
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="chart.html">
                        <i class="ti-bar-chart"></i>
                        <span class="link-title">&nbsp; Charts</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul>
                        <li>
                            <a href="charts.html">
                                <i class="fa fa-angle-right"></i>
                                &nbsp; Charts
                            </a>
                        </li>
                        <li>
                            <a href="advanced_charts.html">
                                <i class="fa fa-angle-right"></i>
                                &nbsp; Advanced Charts
                            </a>
                        </li>
                        <!--
                        <li>
                        <a href="sparkline_charts.html">
                            <i class="fa fa-angle-right"></i>
                            &nbsp; Sparkline Charts
                        </a>
                    </li>
                    -->
                </ul>
            </li>
            <li>
                <a href="chart.html">
                    <i class="ti-user"></i>
                    <span class="link-title">&nbsp; Users</span>
                    <span class="fa arrow"></span>
                </a>
                <ul>
                    <li>
                        <a href="users.html">
                            <i class="fa fa-angle-right"></i>
                            &nbsp; Users
                        </a>
                    </li>
                    <li>
                        <a href="add_user.html">
                            <i class="fa fa-angle-right"></i>
                            &nbsp; Add User
                        </a>
                    </li>
                    <li>
                        <a href="view_user.html">
                            <i class="fa fa-angle-right"></i>
                            &nbsp; User Profile
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="calendar.html">
                    <i class="ti-calendar"></i>
                    <span class="link-title">&nbsp; Calendar</span>
                    <span class="float-xs-right badge m-xs-r">7</span>
                </a>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="ti-files"></i>
                    <span class="link-title">&nbsp; Pages</span>
                    <span class="fa arrow"></span>
                </a>
                <ul>
                    <li>
                        <a href="404.html">
                            <i class="fa fa-angle-right"></i>
                            &nbsp; 404
                        </a>
                    </li>
                    <li>
                        <a href="500.html">
                            <i class="fa fa-angle-right"></i>
                            &nbsp; 500
                        </a>
                    </li>
                    <li>
                        <a href="login.html">
                            <i class="fa fa-angle-right"></i>
                            &nbsp; Login
                        </a>
                    </li>
                    <li>
                        <a href="register.html">
                            <i class="fa fa-angle-right"></i>
                            &nbsp; Register
                        </a>
                    </li>
                    <li>
                        <a href="lockscreen.html">
                            <i class="fa fa-angle-right"></i>
                            &nbsp; Lock Screen
                        </a>
                    </li>
                    <li>
                        <a href="invoice.html">
                            <i class="fa fa-angle-right"></i>
                            &nbsp; Invoice
                        </a>
                    </li>
                    <li>
                        <a href="blank.html">
                            <i class="fa fa-angle-right"></i>
                            &nbsp; Blank Page
                        </a>
                    </li>
                </ul>
            </li>
            <li class="">
                <a href="javascript:;">
                    <i class="ti-layout-media-center"></i>
                    <span class="link-title">&nbsp; Layouts</span>
                    <span class="fa arrow"></span>
                </a>
                <ul>
                    <li>
                        <a href="boxed.html">
                            <i class="fa fa-angle-right"></i>
                            &nbsp; Boxed Layout
                        </a>
                    </li>
                    <li>
                        <a href="fixed-header-boxed.html">
                            <i class="fa fa-angle-right"></i>
                            &nbsp; Boxed &amp; Fixed Header
                        </a>
                    </li>
                    <li>
                        <a href="fixed-header-menu.html">
                            <i class="fa fa-angle-right"></i>
                            &nbsp; Fixed Header &amp; Menu
                        </a>
                    </li>
                    <li>
                        <a href="fixed-header.html">
                            <i class="fa fa-angle-right"></i>
                            &nbsp; Fixed Header
                        </a>
                    </li>
                    <li>
                        <a href="fixed-menu-boxed.html">
                            <i class="fa fa-angle-right"></i>
                            &nbsp; Boxed &amp; Fixed Menu
                        </a>
                    </li>
                    <li>
                        <a href="fixed-menu.html">
                            <i class="fa fa-angle-right"></i>
                            &nbsp; Fixed Menu
                        </a>
                    </li>
                    <li>
                        <a href="no-header.html">
                            <i class="fa fa-angle-right"></i>
                            &nbsp; No Header
                        </a>
                    </li>
                    <li>
                        <a href="no-left-sidebar.html">
                            <i class="fa fa-angle-right"></i>
                            &nbsp; No Left Sidebar
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="ti-view-list-alt"></i>
                    <span class="link-title">&nbsp; Multi Level Menu</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="javascript:;">
                            <i class="fa fa-angle-right"></i>
                            &nbsp;Level 1
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu sub-submenu">
                            <li>
                                <a href="javascript:;">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp;Level 2
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp;Level 2
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp;Level 2
                                    <span class="fa arrow"></span>
                                </a>
                                <ul class="sub-menu sub-submenu">
                                    <li>
                                        <a href="javascript:;">
                                            <i class="fa fa-angle-right"></i>
                                            &nbsp;Level 3
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <i class="fa fa-angle-right"></i>
                                            &nbsp;Level 3
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <i class="fa fa-angle-right"></i>
                                            &nbsp;Level 3
                                            <span class="fa arrow"></span>
                                        </a>
                                        <ul class="sub-menu sub-submenu">
                                            <li>
                                                <a href="javascript:;">
                                                    <i class="fa fa-angle-right"></i>
                                                    &nbsp;Level 4
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <i class="fa fa-angle-right"></i>
                                                    &nbsp;Level 4
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                    <i class="fa fa-angle-right"></i>
                                                    &nbsp;Level 4
                                                    <span class="fa arrow"></span>
                                                </a>
                                                <ul class="sub-menu sub-submenu">
                                                    <li>
                                                        <a href="javascript:;">
                                                            <i class="fa fa-angle-right"></i>
                                                            &nbsp;Level 5
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <i class="fa fa-angle-right"></i>
                                                            &nbsp;Level 5
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <i class="fa fa-angle-right"></i>
                                                            &nbsp;Level 5
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <i class="fa fa-angle-right"></i>
                                            &nbsp;Level 4
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp;Level 2
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <i class="fa fa-angle-right"></i>
                            &nbsp;Level 1
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <i class="fa fa-angle-right"></i>
                            &nbsp;Level 1
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu sub-submenu">
                            <li>
                                <a href="javascript:;">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp;Level 2
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp;Level 2
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp;Level 2
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- /#menu --> </div>
    <!-- /#left -->

    <div id="content" class="bg-container">
        <header class="head">
            <div class="main-bar row">
                <div class="col-lg-6 col-sm-4 nav_align_top">

                        <i class="ti-layout-grid3"></i>
                        <b>Data Tables</b>

                </div>
                <div class="col-lg-6 col-sm-8">
                    <ol class="breadcrumb float-xs-right breadcrumb_align_top">
                        <li class="breadcrumb-item">
                            <a href="index1.html">
                                <i class="ti-home" data-pack="default" data-tags=""></i>
                                Home
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">Data Tables</a>
                        </li>
                        <li class="breadcrumb-item active">Data Tables</li>
                    </ol>
                </div>                
            </div>
        </header>
        <div class="outer">
            <div class="inner bg-light lter bg-container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- BEGIN EXAMPLE1 TABLE PORTLET-->
                        <div class="card card-inverse">
                            <div class="card-header card-primary">
                                <i class="fa fa-table"></i>
                                Datatable with TableTools
                                <div class="tools"></div>
                            </div>
                            <div class="card-block">
                                <table class="table table-striped table-bordered table-hover" id="sample_1">
                                    <thead>
                                        <tr>
                                            <th>Rendering engine</th>
                                            <th>Browser</th>
                                            <th>Platform(s)</th>
                                            <th>Engine version</th>
                                            <th>CSS grade</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Trident</td>
                                            <td>Internet Explorer 4.0</td>
                                            <td>Win 95+</td>
                                            <td>4</td>
                                            <td>X</td>
                                        </tr>
                                        <tr>
                                            <td>Trident</td>
                                            <td>Internet Explorer 5.0</td>
                                            <td>Win 95+</td>
                                            <td>5</td>
                                            <td>C</td>
                                        </tr>
                                        <tr>
                                            <td>Trident</td>
                                            <td>Internet Explorer 5.5</td>
                                            <td>Win 95+</td>
                                            <td>5.5</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Trident</td>
                                            <td>Internet Explorer 6</td>
                                            <td>Win 98+</td>
                                            <td>6</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Trident</td>
                                            <td>Internet Explorer 7</td>
                                            <td>Win XP SP2+</td>
                                            <td>7</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Trident</td>
                                            <td>AOL browser (AOL desktop)</td>
                                            <td>Win XP</td>
                                            <td>6</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Firefox 1.0</td>
                                            <td>Win 98+ / OSX.2+</td>
                                            <td>1.7</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Firefox 1.5</td>
                                            <td>Win 98+ / OSX.2+</td>
                                            <td>1.8</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Firefox 2.0</td>
                                            <td>Win 98+ / OSX.2+</td>
                                            <td>1.8</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Firefox 3.0</td>
                                            <td>Win 2k+ / OSX.3+</td>
                                            <td>1.9</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Camino 1.0</td>
                                            <td>OSX.2+</td>
                                            <td>1.8</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Camino 1.5</td>
                                            <td>OSX.3+</td>
                                            <td>1.8</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Netscape 7.2</td>
                                            <td>Win 95+ / Mac OS 8.6-9.2</td>
                                            <td>1.7</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Netscape Browser 8</td>
                                            <td>Win 98SE+</td>
                                            <td>1.7</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Netscape Navigator 9</td>
                                            <td>Win 98+ / OSX.2+</td>
                                            <td>1.8</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Mozilla 1.0</td>
                                            <td>Win 95+ / OSX.1+</td>
                                            <td>1</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Mozilla 1.1</td>
                                            <td>Win 95+ / OSX.1+</td>
                                            <td>1.1</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Mozilla 1.2</td>
                                            <td>Win 95+ / OSX.1+</td>
                                            <td>1.2</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Mozilla 1.3</td>
                                            <td>Win 95+ / OSX.1+</td>
                                            <td>1.3</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Mozilla 1.4</td>
                                            <td>Win 95+ / OSX.1+</td>
                                            <td>1.4</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Mozilla 1.5</td>
                                            <td>Win 95+ / OSX.1+</td>
                                            <td>1.5</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Mozilla 1.6</td>
                                            <td>Win 95+ / OSX.1+</td>
                                            <td>1.6</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Mozilla 1.7</td>
                                            <td>Win 98+ / OSX.1+</td>
                                            <td>1.7</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Mozilla 1.8</td>
                                            <td>Win 98+ / OSX.1+</td>
                                            <td>1.8</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Seamonkey 1.1</td>
                                            <td>Win 98+ / OSX.2+</td>
                                            <td>1.8</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Epiphany 2.20</td>
                                            <td>Gnome</td>
                                            <td>1.8</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Webkit</td>
                                            <td>Safari 1.2</td>
                                            <td>OSX.3</td>
                                            <td>125.5</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Webkit</td>
                                            <td>Safari 1.3</td>
                                            <td>OSX.3</td>
                                            <td>312.8</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Webkit</td>
                                            <td>Safari 2.0</td>
                                            <td>OSX.4+</td>
                                            <td>419.3</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Webkit</td>
                                            <td>Safari 3.0</td>
                                            <td>OSX.4+</td>
                                            <td>522.1</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Webkit</td>
                                            <td>OmniWeb 5.5</td>
                                            <td>OSX.4+</td>
                                            <td>420</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Webkit</td>
                                            <td>iPod Touch / iPhone</td>
                                            <td>iPod</td>
                                            <td>420.1</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Webkit</td>
                                            <td>S60</td>
                                            <td>S60</td>
                                            <td>413</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Presto</td>
                                            <td>Opera 7.0</td>
                                            <td>Win 95+ / OSX.1+</td>
                                            <td>-</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Presto</td>
                                            <td>Opera 7.5</td>
                                            <td>Win 95+ / OSX.2+</td>
                                            <td>-</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Presto</td>
                                            <td>Opera 8.0</td>
                                            <td>Win 95+ / OSX.2+</td>
                                            <td>-</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Presto</td>
                                            <td>Opera 8.5</td>
                                            <td>Win 95+ / OSX.2+</td>
                                            <td>-</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Presto</td>
                                            <td>Opera 9.0</td>
                                            <td>Win 95+ / OSX.3+</td>
                                            <td>-</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Presto</td>
                                            <td>Opera 9.2</td>
                                            <td>Win 88+ / OSX.3+</td>
                                            <td>-</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Presto</td>
                                            <td>Opera 9.5</td>
                                            <td>Win 88+ / OSX.3+</td>
                                            <td>-</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Presto</td>
                                            <td>Opera for Wii</td>
                                            <td>Wii</td>
                                            <td>-</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Presto</td>
                                            <td>Nokia N800</td>
                                            <td>N800</td>
                                            <td>-</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Presto</td>
                                            <td>Nintendo DS browser</td>
                                            <td>Nintendo DS</td>
                                            <td>8.5</td>
                                            <td>
                                                C/A <sup>1</sup>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END EXAMPLE1 TABLE PORTLET-->

                        <!-- BEGIN EXAMPLE2 TABLE PORTLET-->
                        <div class="card card-inverse">
                            <div class="card-header card-warning">

                                    <i class="fa fa-table"></i>
                                    Show/Hide Columns

                                <div class="float-xs-right">
                                    <div class="btn-group show-hide">
                                        <a class="btn default" href="#" data-toggle="dropdown">
                                            Columns
                                            <i class="fa fa-angle-down"></i>
                                        </a>
                                        <div id="sample_4_column_toggler" class="dropdown-menu hold-on-click dropdown-checkboxes float-xs-right">
                                            <label>
                                                <input type="checkbox" checked data-column="0">Rendering engine</label>
                                            <label>
                                                <input type="checkbox" checked data-column="1">Browser</label>
                                            <label>
                                                <input type="checkbox" checked data-column="2">Platform(s)</label>
                                            <label>
                                                <input type="checkbox" checked data-column="3">Engine version</label>
                                            <label>
                                                <input type="checkbox" checked data-column="4">CSS grade</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-block">
                                <table class="table table-striped table-bordered" id="sample_4">
                                    <thead>
                                        <tr>
                                            <th>Rendering engine</th>
                                            <th>Browser</th>
                                            <th class="hidden-xs">Platform(s)</th>
                                            <th class="hidden-xs">Engine version</th>
                                            <th class="hidden-xs">CSS grade</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Trident</td>
                                            <td>Internet Explorer 4.0</td>
                                            <td>Win 95+</td>
                                            <td>4</td>
                                            <td>X</td>
                                        </tr>
                                        <tr>
                                            <td>Trident</td>
                                            <td>Internet Explorer 5.0</td>
                                            <td>Win 95+</td>
                                            <td>5</td>
                                            <td>C</td>
                                        </tr>
                                        <tr>
                                            <td>Trident</td>
                                            <td>Internet Explorer 5.5</td>
                                            <td>Win 95+</td>
                                            <td>5.5</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Trident</td>
                                            <td>Internet Explorer 6</td>
                                            <td>Win 98+</td>
                                            <td>6</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Trident</td>
                                            <td>Internet Explorer 7</td>
                                            <td>Win XP SP2+</td>
                                            <td>7</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Trident</td>
                                            <td>AOL browser (AOL desktop)</td>
                                            <td>Win XP</td>
                                            <td>6</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Firefox 1.0</td>
                                            <td>Win 98+ / OSX.2+</td>
                                            <td>1.7</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Firefox 1.5</td>
                                            <td>Win 98+ / OSX.2+</td>
                                            <td>1.8</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Firefox 2.0</td>
                                            <td>Win 98+ / OSX.2+</td>
                                            <td>1.8</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Firefox 3.0</td>
                                            <td>Win 2k+ / OSX.3+</td>
                                            <td>1.9</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Camino 1.0</td>
                                            <td>OSX.2+</td>
                                            <td>1.8</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Camino 1.5</td>
                                            <td>OSX.3+</td>
                                            <td>1.8</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Netscape 7.2</td>
                                            <td>Win 95+ / Mac OS 8.6-9.2</td>
                                            <td>1.7</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Netscape Browser 8</td>
                                            <td>Win 98SE+</td>
                                            <td>1.7</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Netscape Navigator 9</td>
                                            <td>Win 98+ / OSX.2+</td>
                                            <td>1.8</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Mozilla 1.0</td>
                                            <td>Win 95+ / OSX.1+</td>
                                            <td>1</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Mozilla 1.1</td>
                                            <td>Win 95+ / OSX.1+</td>
                                            <td>1.1</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Mozilla 1.2</td>
                                            <td>Win 95+ / OSX.1+</td>
                                            <td>1.2</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Mozilla 1.3</td>
                                            <td>Win 95+ / OSX.1+</td>
                                            <td>1.3</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Mozilla 1.4</td>
                                            <td>Win 95+ / OSX.1+</td>
                                            <td>1.4</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Mozilla 1.5</td>
                                            <td>Win 95+ / OSX.1+</td>
                                            <td>1.5</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Mozilla 1.6</td>
                                            <td>Win 95+ / OSX.1+</td>
                                            <td>1.6</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Mozilla 1.7</td>
                                            <td>Win 98+ / OSX.1+</td>
                                            <td>1.7</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Mozilla 1.8</td>
                                            <td>Win 98+ / OSX.1+</td>
                                            <td>1.8</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Seamonkey 1.1</td>
                                            <td>Win 98+ / OSX.2+</td>
                                            <td>1.8</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Epiphany 2.20</td>
                                            <td>Gnome</td>
                                            <td>1.8</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Webkit</td>
                                            <td>Safari 1.2</td>
                                            <td>OSX.3</td>
                                            <td>125.5</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Webkit</td>
                                            <td>Safari 1.3</td>
                                            <td>OSX.3</td>
                                            <td>312.8</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Webkit</td>
                                            <td>Safari 2.0</td>
                                            <td>OSX.4+</td>
                                            <td>419.3</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Webkit</td>
                                            <td>Safari 3.0</td>
                                            <td>OSX.4+</td>
                                            <td>522.1</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Webkit</td>
                                            <td>OmniWeb 5.5</td>
                                            <td>OSX.4+</td>
                                            <td>420</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Webkit</td>
                                            <td>iPod Touch / iPhone</td>
                                            <td>iPod</td>
                                            <td>420.1</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Webkit</td>
                                            <td>S60</td>
                                            <td>S60</td>
                                            <td>413</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Presto</td>
                                            <td>Opera 7.0</td>
                                            <td>Win 95+ / OSX.1+</td>
                                            <td>-</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Presto</td>
                                            <td>Opera 7.5</td>
                                            <td>Win 95+ / OSX.2+</td>
                                            <td>-</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Presto</td>
                                            <td>Opera 8.0</td>
                                            <td>Win 95+ / OSX.2+</td>
                                            <td>-</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Presto</td>
                                            <td>Opera 8.5</td>
                                            <td>Win 95+ / OSX.2+</td>
                                            <td>-</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Presto</td>
                                            <td>Opera 9.0</td>
                                            <td>Win 95+ / OSX.3+</td>
                                            <td>-</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Presto</td>
                                            <td>Opera 9.2</td>
                                            <td>Win 88+ / OSX.3+</td>
                                            <td>-</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Presto</td>
                                            <td>Opera 9.5</td>
                                            <td>Win 88+ / OSX.3+</td>
                                            <td>-</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Presto</td>
                                            <td>Opera for Wii</td>
                                            <td>Wii</td>
                                            <td>-</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Presto</td>
                                            <td>Nokia N800</td>
                                            <td>N800</td>
                                            <td>-</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Presto</td>
                                            <td>Nintendo DS browser</td>
                                            <td>Nintendo DS</td>
                                            <td>8.5</td>
                                            <td>
                                                C/A <sup>1</sup>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END EXAMPLE2 TABLE PORTLET-->
                        <!-- BEGIN EXAMPLE3 TABLE PORTLET-->
                        <div class="card card-inverse">
                            <div class="card-header card-success">

                                    <i class="fa fa-table"></i>
                                    Scroller

                                <span class="float-xs-right">
                                    <i class="ti-angle-up"></i>
                                </span>
                                <span class="float-xs-right clickable">
                                    <i class="ti-close"></i>
                                </span>
                                <div class="tools">
                                    <a href="javascript:;" class="collapse"></a>
                                    <a href="#portlet-config" data-toggle="modal" class="config"></a>
                                    <a href="javascript:;" class="reload"></a>
                                    <a href="javascript:;" class="remove"></a>
                                </div>
                            </div>
                            <div class="card-block">
                                <table class="table table-striped table-hover" id="sample_5">
                                    <thead>
                                        <tr>
                                            <th>Rendering engine</th>
                                            <th>Browser</th>
                                            <th class="hidden-xs">Platform(s)</th>
                                            <th class="hidden-xs">Engine version</th>
                                            <th class="hidden-xs">CSS grade</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Trident</td>
                                            <td>Internet Explorer 4.0</td>
                                            <td>Win 95+</td>
                                            <td>4</td>
                                            <td>X</td>
                                        </tr>
                                        <tr>
                                            <td>Trident</td>
                                            <td>Internet Explorer 5.0</td>
                                            <td>Win 95+</td>
                                            <td>5</td>
                                            <td>C</td>
                                        </tr>
                                        <tr>
                                            <td>Trident</td>
                                            <td>Internet Explorer 5.5</td>
                                            <td>Win 95+</td>
                                            <td>5.5</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Trident</td>
                                            <td>Internet Explorer 6</td>
                                            <td>Win 98+</td>
                                            <td>6</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Trident</td>
                                            <td>Internet Explorer 7</td>
                                            <td>Win XP SP2+</td>
                                            <td>7</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Trident</td>
                                            <td>AOL browser (AOL desktop)</td>
                                            <td>Win XP</td>
                                            <td>6</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Firefox 1.0</td>
                                            <td>Win 98+ / OSX.2+</td>
                                            <td>1.7</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Firefox 1.5</td>
                                            <td>Win 98+ / OSX.2+</td>
                                            <td>1.8</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Firefox 2.0</td>
                                            <td>Win 98+ / OSX.2+</td>
                                            <td>1.8</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Firefox 3.0</td>
                                            <td>Win 2k+ / OSX.3+</td>
                                            <td>1.9</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Camino 1.0</td>
                                            <td>OSX.2+</td>
                                            <td>1.8</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Camino 1.5</td>
                                            <td>OSX.3+</td>
                                            <td>1.8</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Netscape 7.2</td>
                                            <td>Win 95+ / Mac OS 8.6-9.2</td>
                                            <td>1.7</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Netscape Browser 8</td>
                                            <td>Win 98SE+</td>
                                            <td>1.7</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Netscape Navigator 9</td>
                                            <td>Win 98+ / OSX.2+</td>
                                            <td>1.8</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Mozilla 1.0</td>
                                            <td>Win 95+ / OSX.1+</td>
                                            <td>1</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Mozilla 1.1</td>
                                            <td>Win 95+ / OSX.1+</td>
                                            <td>1.1</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Mozilla 1.2</td>
                                            <td>Win 95+ / OSX.1+</td>
                                            <td>1.2</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Mozilla 1.3</td>
                                            <td>Win 95+ / OSX.1+</td>
                                            <td>1.3</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Mozilla 1.4</td>
                                            <td>Win 95+ / OSX.1+</td>
                                            <td>1.4</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Mozilla 1.5</td>
                                            <td>Win 95+ / OSX.1+</td>
                                            <td>1.5</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Mozilla 1.6</td>
                                            <td>Win 95+ / OSX.1+</td>
                                            <td>1.6</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Mozilla 1.7</td>
                                            <td>Win 98+ / OSX.1+</td>
                                            <td>1.7</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Mozilla 1.8</td>
                                            <td>Win 98+ / OSX.1+</td>
                                            <td>1.8</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Seamonkey 1.1</td>
                                            <td>Win 98+ / OSX.2+</td>
                                            <td>1.8</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Epiphany 2.20</td>
                                            <td>Gnome</td>
                                            <td>1.8</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Webkit</td>
                                            <td>Safari 1.2</td>
                                            <td>OSX.3</td>
                                            <td>125.5</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Webkit</td>
                                            <td>Safari 1.3</td>
                                            <td>OSX.3</td>
                                            <td>312.8</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Webkit</td>
                                            <td>Safari 2.0</td>
                                            <td>OSX.4+</td>
                                            <td>419.3</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Webkit</td>
                                            <td>Safari 3.0</td>
                                            <td>OSX.4+</td>
                                            <td>522.1</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Webkit</td>
                                            <td>OmniWeb 5.5</td>
                                            <td>OSX.4+</td>
                                            <td>420</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Webkit</td>
                                            <td>iPod Touch / iPhone</td>
                                            <td>iPod</td>
                                            <td>420.1</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Webkit</td>
                                            <td>S60</td>
                                            <td>S60</td>
                                            <td>413</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Presto</td>
                                            <td>Opera 7.0</td>
                                            <td>Win 95+ / OSX.1+</td>
                                            <td>-</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Presto</td>
                                            <td>Opera 7.5</td>
                                            <td>Win 95+ / OSX.2+</td>
                                            <td>-</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Presto</td>
                                            <td>Opera 8.0</td>
                                            <td>Win 95+ / OSX.2+</td>
                                            <td>-</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Presto</td>
                                            <td>Opera 8.5</td>
                                            <td>Win 95+ / OSX.2+</td>
                                            <td>-</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Presto</td>
                                            <td>Opera 9.0</td>
                                            <td>Win 95+ / OSX.3+</td>
                                            <td>-</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Presto</td>
                                            <td>Opera 9.2</td>
                                            <td>Win 88+ / OSX.3+</td>
                                            <td>-</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Presto</td>
                                            <td>Opera 9.5</td>
                                            <td>Win 88+ / OSX.3+</td>
                                            <td>-</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Presto</td>
                                            <td>Opera for Wii</td>
                                            <td>Wii</td>
                                            <td>-</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Presto</td>
                                            <td>Nokia N800</td>
                                            <td>N800</td>
                                            <td>-</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Presto</td>
                                            <td>Nintendo DS browser</td>
                                            <td>Nintendo DS</td>
                                            <td>8.5</td>
                                            <td>
                                                C/A
                                                <sup>1</sup>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END EXAMPLE3 TABLE PORTLET-->
                        <!-- BEGIN EXAMPLE4 TABLE PORTLET-->
                        <div class="card card-inverse">
                            <div class="card-header card-info">

                                    <i class="fa fa-table"></i>
                                    Columns Reorder

                                <span class="float-xs-right">
                                    <i class="ti-angle-up"></i>
                                </span>
                                <span class="float-xs-right clickable">
                                    <i class="ti-close"></i>
                                </span>
                                <div class="tools">
                                    <a href="javascript:;" class="collapse"></a>
                                    <a href="#portlet-config" data-toggle="modal" class="config"></a>
                                    <a href="javascript:;" class="reload"></a>
                                    <a href="javascript:;" class="remove"></a>
                                </div>
                            </div>
                            <div class="card-block">
                                <table class="table table-striped table-bordered table-hover" id="sample_6">
                                    <thead>
                                        <tr>
                                            <th>Rendering engine</th>
                                            <th>Browser</th>
                                            <th class="hidden-xs">Platform(s)</th>
                                            <th class="hidden-xs">Engine version</th>
                                            <th class="hidden-xs">CSS grade</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Trident</td>
                                            <td>Internet Explorer 4.0</td>
                                            <td>Win 95+</td>
                                            <td>4</td>
                                            <td>X</td>
                                        </tr>
                                        <tr>
                                            <td>Trident</td>
                                            <td>Internet Explorer 5.0</td>
                                            <td>Win 95+</td>
                                            <td>5</td>
                                            <td>C</td>
                                        </tr>
                                        <tr>
                                            <td>Trident</td>
                                            <td>Internet Explorer 5.5</td>
                                            <td>Win 95+</td>
                                            <td>5.5</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Trident</td>
                                            <td>Internet Explorer 6</td>
                                            <td>Win 98+</td>
                                            <td>6</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Trident</td>
                                            <td>Internet Explorer 7</td>
                                            <td>Win XP SP2+</td>
                                            <td>7</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Trident</td>
                                            <td>AOL browser (AOL desktop)</td>
                                            <td>Win XP</td>
                                            <td>6</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Firefox 1.0</td>
                                            <td>Win 98+ / OSX.2+</td>
                                            <td>1.7</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Firefox 1.5</td>
                                            <td>Win 98+ / OSX.2+</td>
                                            <td>1.8</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Firefox 2.0</td>
                                            <td>Win 98+ / OSX.2+</td>
                                            <td>1.8</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Firefox 3.0</td>
                                            <td>Win 2k+ / OSX.3+</td>
                                            <td>1.9</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Camino 1.0</td>
                                            <td>OSX.2+</td>
                                            <td>1.8</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Camino 1.5</td>
                                            <td>OSX.3+</td>
                                            <td>1.8</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Netscape 7.2</td>
                                            <td>Win 95+ / Mac OS 8.6-9.2</td>
                                            <td>1.7</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Netscape Browser 8</td>
                                            <td>Win 98SE+</td>
                                            <td>1.7</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Netscape Navigator 9</td>
                                            <td>Win 98+ / OSX.2+</td>
                                            <td>1.8</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Mozilla 1.0</td>
                                            <td>Win 95+ / OSX.1+</td>
                                            <td>1</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Mozilla 1.1</td>
                                            <td>Win 95+ / OSX.1+</td>
                                            <td>1.1</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Mozilla 1.2</td>
                                            <td>Win 95+ / OSX.1+</td>
                                            <td>1.2</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Mozilla 1.3</td>
                                            <td>Win 95+ / OSX.1+</td>
                                            <td>1.3</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Mozilla 1.4</td>
                                            <td>Win 95+ / OSX.1+</td>
                                            <td>1.4</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Mozilla 1.5</td>
                                            <td>Win 95+ / OSX.1+</td>
                                            <td>1.5</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Mozilla 1.6</td>
                                            <td>Win 95+ / OSX.1+</td>
                                            <td>1.6</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Mozilla 1.7</td>
                                            <td>Win 98+ / OSX.1+</td>
                                            <td>1.7</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Mozilla 1.8</td>
                                            <td>Win 98+ / OSX.1+</td>
                                            <td>1.8</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Seamonkey 1.1</td>
                                            <td>Win 98+ / OSX.2+</td>
                                            <td>1.8</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Epiphany 2.20</td>
                                            <td>Gnome</td>
                                            <td>1.8</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Webkit</td>
                                            <td>Safari 1.2</td>
                                            <td>OSX.3</td>
                                            <td>125.5</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Webkit</td>
                                            <td>Safari 1.3</td>
                                            <td>OSX.3</td>
                                            <td>312.8</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Webkit</td>
                                            <td>Safari 2.0</td>
                                            <td>OSX.4+</td>
                                            <td>419.3</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Webkit</td>
                                            <td>Safari 3.0</td>
                                            <td>OSX.4+</td>
                                            <td>522.1</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Webkit</td>
                                            <td>OmniWeb 5.5</td>
                                            <td>OSX.4+</td>
                                            <td>420</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Webkit</td>
                                            <td>iPod Touch / iPhone</td>
                                            <td>iPod</td>
                                            <td>420.1</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Webkit</td>
                                            <td>S60</td>
                                            <td>S60</td>
                                            <td>413</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Presto</td>
                                            <td>Opera 7.0</td>
                                            <td>Win 95+ / OSX.1+</td>
                                            <td>-</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Presto</td>
                                            <td>Opera 7.5</td>
                                            <td>Win 95+ / OSX.2+</td>
                                            <td>-</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Presto</td>
                                            <td>Opera 8.0</td>
                                            <td>Win 95+ / OSX.2+</td>
                                            <td>-</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Presto</td>
                                            <td>Opera 8.5</td>
                                            <td>Win 95+ / OSX.2+</td>
                                            <td>-</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Presto</td>
                                            <td>Opera 9.0</td>
                                            <td>Win 95+ / OSX.3+</td>
                                            <td>-</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Presto</td>
                                            <td>Opera 9.2</td>
                                            <td>Win 88+ / OSX.3+</td>
                                            <td>-</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Presto</td>
                                            <td>Opera 9.5</td>
                                            <td>Win 88+ / OSX.3+</td>
                                            <td>-</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Presto</td>
                                            <td>Opera for Wii</td>
                                            <td>Wii</td>
                                            <td>-</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Presto</td>
                                            <td>Nokia N800</td>
                                            <td>N800</td>
                                            <td>-</td>
                                            <td>A</td>
                                        </tr>
                                        <tr>
                                            <td>Presto</td>
                                            <td>Nintendo DS browser</td>
                                            <td>Nintendo DS</td>
                                            <td>8.5</td>
                                            <td>
                                                C/A
                                                <sup>1</sup>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <!-- END EXAMPLE4 TABLE PORTLET--> </div>
                </div>
            </div>
            <!-- /.inner --> </div>
        <!-- /.outer --> </div>
    <!-- /#content -->
    <div id="right" class="bg-light lter">
        <div class="alert alert-success white_txt">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Welcome Micheal
                <br /></strong> 
            Set Your Skin Here. Checkout Admin Statistics. Good Day!.
        </div>
        <div class="well well-small dark">
            <h4 class="brown_txt">
                <i class="ti-brush skin-icon brown_bg"></i>
                Skins
            </h4>
            <br />

            <div class="skinmulti_btn" onclick="javascript:loadjscssfile('blue_black_skin.css','css')">
                <div class="skin_blue skin_size"></div>
                <div class="skin_black skin_size"></div>
            </div>
            <div class="skinmulti_btn" onclick="javascript:loadjscssfile('green_black_skin.css','css')">
                <div class="skin_green skin_size"></div>
                <div class="skin_black skin_size"></div>
            </div>
            <div class="skinmulti_btn" onclick="javascript:loadjscssfile('purple_black_skin.css','css')">
                <div class="skin_purple skin_size"></div>
                <div class="skin_black skin_size"></div>
            </div>
            <div class="skinmulti_btn" onclick="javascript:loadjscssfile('orange_black_skin.css','css')">
                <div class="skin_orange skin_size"></div>
                <div class="skin_black skin_size"></div>
            </div>
            <div class="skinmulti_btn" onclick="javascript:loadjscssfile('red_black_skin.css','css')">
                <div class="skin_red skin_size"></div>
                <div class="skin_black skin_size"></div>
            </div>
            <div class="skinmulti_btn" onclick="javascript:loadjscssfile('mint_black_skin.css','css')">
                <div class="skin_mint skin_size"></div>
                <div class="skin_black skin_size"></div>
            </div>
            <div class="skinmulti_btn" onclick="javascript:loadjscssfile('brown_black_skin.css','css')">
                <div class="skin_brown skin_size"></div>
                <div class="skin_black skin_size"></div>
            </div>
            <div class="skinmulti_btn" onclick="javascript:loadjscssfile('black_skin.css','css')">
                <div class="skin_black skin_size"></div>
                <div class="skin_black skin_size"></div>
            </div>
            <div class="skin_btn skin_blue" onclick="javascript:loadjscssfile('blue_skin.css','css')"></div>
            <div class="skin_btn skin_green" onclick="javascript:loadjscssfile('green_skin.css','css')"></div>
            <div class="skin_btn skin_purple" onclick="javascript:loadjscssfile('purple_skin.css','css')"></div>
            <div class="skin_btn skin_orange" onclick="javascript:loadjscssfile('orange_skin.css','css')"></div>
            <div class="skin_btn skin_red" onclick="javascript:loadjscssfile('red_skin.css','css')"></div>
            <div class="skin_btn skin_mint" onclick="javascript:loadjscssfile('mint_skin.css','css')"></div>
            <div class="skin_btn skin_brown" onclick="javascript:loadjscssfile('brown_skin.css','css')"></div>
            <div class="skin_btn skin_black" onclick="javascript:loadjscssfile('black_skin.css','css')"></div>

        </div>
        <div class="well well-small dark">
            <h4 class="brown_txt margin15_bottom">
                <img src="assets/img/avatar.png" width="27" height="27" class="avatar-img" alt="avatar"> &nbsp;Admin Statistics</h4>
            <br />
            <ul class="list-unstyled">
                <li class="green_txt margin15_bottom">
                    <i class="ti-lock skin-icon mint_bg"></i>
                    &nbsp; Last Login
                    <span class="inlinesparkline float-xs-right">2hrs Back</span>
                </li>
                <li class="warning_txt margin15_bottom">
                    <i class="ti-pencil skin-icon warning_bg_dark"></i>
                    &nbsp; Pending Tasks
                    <span class="dynamicsparkline float-xs-right">12</span>
                </li>
                <li class="primary_txt margin15_bottom">
                    <i class="ti-thought skin-icon primary_bg_dark"></i>
                    &nbsp; Weather Today
                    <span class="dynamicbar float-xs-right">Rainy</span>
                </li>
                <li class="brown_txt margin15_bottom">
                    <i class="ti-calendar skin-icon brown_bg"></i>
                    &nbsp; Upcmng Event
                    <span class="inlinebar float-xs-right">Team Out</span>
                </li>
                <li class="success_txt margin15_bottom">
                    <i class="ti-bell skin-icon success_bg_dark"></i>
                    &nbsp; Notifications
                    <span class="inlinebar float-xs-right">5</span>
                </li>
            </ul>
        </div>
        <div class="well well-small dark">
            <h4 class="brown_txt">
                <i class="ti-hand-point-down skin-icon brown_bg"></i>
                Alerts
            </h4>
            <br />
            <span>Sales Improvement</span>
            <span class="float-xs-right">
                <small>20%</small>
            </span>
            <div class="progress xs">
                <div class="progress-bar progress-bar-info" style="width: 20%"></div>
            </div>
            <span>Server Load</span>
            <span class="float-xs-right">
                <small>80%</small>
            </span>
            <div class="progress xs">
                <div class="progress-bar progress-bar-warning" style="width: 80%"></div>
            </div>
            <span>Traffic Improvement</span>
            <span class="float-xs-right">
                <small>55%</small>
            </span>
            <div class="progress xs">
                <div class="progress-bar progress-bar-success" style="width: 55%"></div>
            </div>
        </div>
    </div>
    <!-- # right side -->

</div>
<!-- /#wrap -->
<footer class="Footer bg-primary">
    <p>2016 &copy; Admire Admin Theme</p>
</footer>
<!-- /#footer -->

<!-- global scripts-->
<!--jQuery 2.1.1 -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <!--Bootstrap -->
    <script src="js/tether.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/core.js"></script>
<!--  demo scripts -->
<script type="text/javascript" src="assets/js/app.js"></script>
<script type="text/javascript" src="assets/js/admire.js"></script>
<!-- end of global scripts-->
<!-- page level scripts -->
<script type="text/javascript" src="assets/lib/datatables/select2.min.js"></script>
<script type="text/javascript" src="assets/lib/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/lib/datatables/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="assets/lib/datatables/dataTables.colReorder.min.js"></script>
<script type="text/javascript" src="assets/lib/datatables/dataTables.scroller.min.js"></script>
<script type="text/javascript" src="assets/lib/datatables/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="assets/lib/datatables/table-advanced.js"></script>
<script>
    jQuery(document).ready(function() {

        TableAdvanced.init();
        $(".ti-close").on("click",function(){
            $(this).closest(".card").fadeToggle();
        });

        $(".ti-angle-up").on("click",function () {
            $(this).closest('.card').find('.card-block').slideToggle();
            $(this).toggleClass("ti-angle-up").toggleClass("ti-angle-down");
        });
    });
    </script>
<!-- end page level scripts -->

</body>

</html>