<!doctype html>
<html class="no-js">
<head>
    <meta charset="UTF-8">
    <title>No-header | Admire</title>
    <!--IE Compatibility modes-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Mobile first-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{asset('assets/img/logo1.ico')}}"/>
    <!--Global styles -->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/components.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />
    <!--End of Global styles -->
    <link type="text/css" rel="stylesheet" href="#" id="skin_change"/>
    <!--End of global styles-->
</head>
<body class="no_header">
<div class="preloader" style=" position: fixed;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  z-index: 100000;
  backface-visibility: hidden;
  background: #ffffff;">
    <div class="preloader_img" style="width: 200px;
  height: 200px;
  position: absolute;
  left: 48%;
  top: 48%;
  background-position: center;
z-index: 999999">
        <img src="{{asset('assets/img/loader.gif')}}" style=" width: 40px;" alt="loading...">
    </div>
</div>

<div class="bg-dark" id="wrap">
    <div class="wrapper">
        <div id="left">
            <div class="menu_scroll">
                <div class="left_media">
                    <div class="media user-media bg-dark dker">
                        <div class="user-media-toggleHover">
                            <span class="fa fa-user"></span>
                        </div>
                        <div class="user-wrapper bg-dark">
                            <a class="user-link" href="#">
                                <img class="media-object img-thumbnail user-img rounded-circle admin_img3" alt="User Picture"
                                     src="{{asset('assets/img/admin.jpg')}}">
                                <p class="user-info menu_hide">Welcome Micheal</p>
                            </a>
                        </div>
                    </div>
                    <hr/>
                </div>
                <ul id="menu">
                    <li>
                        <a href="index1">
                            <i class="fa fa-home"></i>
                            <span class="link-title menu_hide">&nbsp;Dashboard 1</span>
                        </a>
                    </li>
                    <li>
                        <a href="index">
                            <i class="fa fa-tachometer"></i>
                            <span class="link-title menu_hide">&nbsp;Dashboard 2
                            <span class="tag tag-pill tag-success new_tag">New</span>
                            </span>
                        </a>
                    </li>
                    <li class="dropdown_menu">
                        <a href="javascript:;">
                            <i class="fa fa-anchor"></i>
                            <span class="link-title menu_hide">&nbsp; Components</span>
                            <span class="fa arrow menu_hide"></span>
                        </a>
                        <ul>
                            <li>
                                <a href="general_components">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; General Components
                                </a>
                            </li>
                            <li>
                                <a href="cards">
                                    <i class="fa fa-angle-right"></i>
                                    <span class="link-title">&nbsp;Cards<span class="tag tag-pill tag-success new_tag">New</span></span>
                                </a>
                            </li>
                            <li>
                                <a href="transitions">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Transitions
                                </a>
                            </li>
                            <li>
                                <a href="buttons">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Buttons
                                </a>
                            </li>
                            <li>
                                <a href="icons">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Icons
                                </a>
                            </li>
                            <li>
                                <a href="animations">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Animations
                                </a>
                            </li>

                            <li>
                                <a href="sliders">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Sliders
                                </a>
                            </li>
                            <li>
                                <a href="notifications">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Notifications
                                </a>
                            </li>
                            <li>
                                <a href="p_notify">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; P-Notify
                                </a>
                            </li>
                            <li>
                                <a href="izitoast">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Izi-Toast<span class="tag tag-pill tag-success new_tag">New</span>
                                </a>
                            </li>
                            <li>
                                <a href="cropper">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Cropper
                                </a>
                            </li>
                            <li>
                                <a href="modal">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Modals
                                </a>
                            </li>


                            <li>
                                <a href="sortable">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Sortable
                                </a>
                            </li>
                            <li>
                                <a href="sweet_alert">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Sweet alerts
                                </a>
                            </li>
                            <li>
                                <a href="grids_layout">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Grid View
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown_menu">
                        <a href="javascript:;">
                            <i class="fa fa-th-large"></i>
                            <span class="link-title menu_hide">&nbsp; Widgets</span>
                            <span class="fa arrow menu_hide"></span>
                        </a>
                        <ul>
                            <li>
                                <a href="widgets1">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Widgets 1
                                </a>
                            </li>
                            <li>
                                <a href="widgets2">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Widgets 2
                                </a>
                            </li>
                            <li>
                                <a href="widgets3">
                                    <i class="fa fa-angle-right"></i>
                                    <span class="link-title">&nbsp; Widgets 3<span class="tag tag-pill tag-success new_tag">New</span></span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown_menu">
                        <a href="javascript:;">
                            <i class="fa fa-pencil"></i>
                            <span class="link-title menu_hide">&nbsp; Forms</span>
                            <span class="fa arrow menu_hide"></span>
                        </a>
                        <ul>
                            <li>
                                <a href="form_elements">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Form Elements
                                </a>
                            </li>
                            <li>
                                <a href="form_layouts">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Form Layouts
                                </a>
                            </li>
                            <li>
                                <a href="form_validations">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Form Validations
                                </a>
                            </li>
                            <li>
                                <a href="form_editors">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Form Editors
                                </a>
                            </li>
                            <li>
                                <a href="radio_checkbox">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Radio and Checkbox
                                </a>
                            </li>
                            <li>
                                <a href="form_wizards">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Wizards
                                </a>
                            </li>
                            <li>
                                <a href="datetime_picker">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Date Time Picker
                                </a>
                            </li>

                            <li>
                                <a href="ratings">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Ratings
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="dropdown_menu">
                        <a href="#">
                            <i class="fa fa-th"></i>
                            <span class="link-title menu_hide">&nbsp; Tables</span>
                            <span class="fa arrow menu_hide"></span>
                        </a>
                        <ul>
                            <li>
                                <a href="simple_tables">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Simple Tables
                                </a>
                            </li>
                            <li>
                                <a href="datatables">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Data Tables
                                </a>
                            </li>
                            <li>
                                <a href="advanced_tables">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Advanced Tables
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown_menu">
                        <a href="#">
                            <i class="fa fa-bar-chart"></i>
                            <span class="link-title menu_hide">&nbsp; Charts</span>
                            <span class="fa arrow menu_hide"></span>
                        </a>
                        <ul>
                            <li>
                                <a href="charts">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Flot Charts
                                </a>
                            </li>
                            <li>
                                <a href="advanced_charts">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Advanced Charts
                                </a>
                            </li>
                            <li>
                                <a href="chartist">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Chartist
                                </a>
                            </li>
                            <li>
                                <a href="rickshaw">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Rickshaw Charts
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown_menu">
                        <a href="#">
                            <i class="fa fa-user"></i>
                            <span class="link-title menu_hide">&nbsp; Users</span>
                            <span class="fa arrow menu_hide"></span>
                        </a>
                        <ul>
                            <li>
                                <a href="users">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; User Grid
                                </a>
                            </li>
                            <li>
                                <a href="add_user">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Add User
                                </a>
                            </li>
                            <li>
                                <a href="view_user">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; User Profile
                                </a>
                            </li>
                            <li>
                                <a href="delete_user">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Delete User
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="calendar">
                            <i class="fa fa-calendar"></i>
                            <span class="link-title menu_hide">&nbsp; Calendar</span>
                            <span class="tag tag-pill tag-primary float-xs-right calendar_tag menu_hide">7</span>
                        </a>
                    </li>
                    <li>
                        <a href="gallery">
                            <i class="fa fa-picture-o"></i>
                            <span class="link-title menu_hide"> Gallery</span>
                        </a>
                    </li>
                    <li class="dropdown_menu">
                        <a href="#">
                            <i class="fa fa-envelope-o"></i>
                            <span class="link-title menu_hide">&nbsp; Email</span>
                            <span class="fa arrow menu_hide"></span>
                        </a>
                        <ul>
                            <li>
                                <a href="mail_compose">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Compose
                                </a>
                            </li>
                            <li>
                                <a href="mail_inbox">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Inbox
                                </a>
                            </li>

                            <li>
                                <a href="mail_view">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; View
                                </a>
                            </li>
                            <li>
                                <a href="mail_sent">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Sent
                                </a>
                            </li>
                            <li>
                                <a href="mail_spam">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Spam
                                </a>
                            </li>

                            <li>
                                <a href="mail_draft">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Draft
                                </a>
                            </li>
                            <li>
                                <a href="mail_trash">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Trash
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown_menu">
                        <a href="#">
                            <i class="fa fa-map-marker"></i>
                            <span class="link-title menu_hide">&nbsp; Maps</span>
                            <span class="fa arrow menu_hide"></span>
                        </a>
                        <ul>
                            <li>
                                <a href="maps">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Google Maps
                                </a>
                            </li>
                            <li>
                                <a href="jqvmaps">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Vector Maps
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown_menu">
                        <a href="javascript:;">
                            <i class="fa fa-file"></i>
                            <span class="link-title menu_hide">&nbsp; Pages</span>
                            <span class="fa arrow menu_hide"></span>
                        </a>
                        <ul>
                            <li>
                                <a href="404">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; 404
                                </a>
                            </li>
                            <li>
                                <a href="500">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; 500
                                </a>
                            </li>
                            <li>
                                <a href="login1">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Login 1
                                </a>
                            </li>
                            <li>
                                <a href="login2">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp;<span class="link-title">&nbsp;Login 2<span class="tag tag-pill tag-success new_tag">New</span></span>
                                </a>
                            </li>
                            <li>
                                <a href="login3">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp;<span class="link-title">&nbsp;Login 3<span class="tag tag-pill tag-success new_tag">New</span></span>
                                </a>
                            </li>
                            <li>
                                <a href="register1">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Register 1
                                </a>
                            </li>
                            <li>
                                <a href="register2">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp;<span class="link-title">&nbsp;Register 2<span class="tag tag-pill tag-success new_tag">New</span></span>
                                </a>
                            </li>
                            <li>
                                <a href="register3">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp;<span class="link-title">&nbsp;Register 3<span class="tag tag-pill tag-success new_tag">New</span></span>
                                </a>
                            </li>
                            <li>
                                <a href="lockscreen">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Lock Screen 1
                                </a>
                            </li>
                            <li>
                                <a href="lockscreen2">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Lock Screen 2<span class="tag tag-pill tag-success new_tag">New</span>
                                </a>
                            </li>
                            <li>
                                <a href="lockscreen3">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Lock Screen 3<span class="tag tag-pill tag-success new_tag">New</span>
                                </a>
                            </li>
                            <li>
                                <a href="invoice">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Invoice
                                </a>
                            </li>
                            <li>
                                <a href="blank">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Blank Page
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown_menu active">
                        <a href="javascript:;">
                            <i class="fa fa-th"></i>
                            <span class="link-title menu_hide">&nbsp; Layouts</span>
                            <span class="fa arrow menu_hide"></span>
                        </a>
                        <ul>
                            <li>
                                <a href="boxed">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Boxed Layout
                                </a>
                            </li>
                            <li>
                                <a href="fixed-header-boxed">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Boxed &amp; Fixed Header
                                </a>
                            </li>
                            <li>
                                <a href="fixed-header-menu">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Fixed Header &amp; Menu
                                </a>
                            </li>
                            <li>
                                <a href="fixed-header">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Fixed Header
                                </a>
                            </li>
                            <li>
                                <a href="fixed-menu-boxed">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Boxed &amp; Fixed Menu
                                </a>
                            </li>
                            <li>
                                <a href="fixed-menu">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Fixed Menu
                                </a>
                            </li>
                            <li class="active">
                                <a href="no-header">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; No Header
                                </a>
                            </li>
                            <li>
                                <a href="no-left-sidebar">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; No Left Sidebar
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown_menu">
                        <a href="javascript:;">
                            <i class="fa fa-sitemap"></i>
                            <span class="link-title menu_hide">&nbsp; Multi Level Menu</span>
                            <span class="fa arrow menu_hide"></span>
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
                <!-- /#menu -->
            </div>
        </div>
        <!-- /#left -->
        <div id="content" class="bg-container">
            <header class="head">
                <div class="main-bar row">
                    <div class="col-lg-6 col-md-5 col-sm-4">
                        <h4 class="nav_top_align">
                            <i class="fa fa-th"></i>
                            No Header
                        </h4>
                    </div>
                    <div class="col-lg-6 col-md-7 col-sm-8">
                        <ol class="breadcrumb float-xs-right nav_breadcrumb_top_align">
                            <li class="breadcrumb-item">
                                <a href="index1">
                                    <i class="fa fa-home" aria-hidden="true"></i> Dashboard
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">Layouts</a>
                            </li>
                            <li class="breadcrumb-item active">No Header</li>
                        </ol>
                    </div>
                </div>
            </header>
            <div class="outer">
                <div class="inner bg-light lter bg-container">
                    <div class="card">
                        <div class="card-header bg-white">
                            About Admire
                        </div>
                        <div class="card-block card_block_top_align ">
                            <h5> Here Comes Admire  Admin Theme  Description. </h5>
                            <p> Admire Admin Theme is built on Bootstrap v4.0.0-alpha.5 and it is a fully responsive theme...</p>
                            <p class="text-justify">Lorem ipsum dolor sit amet, facer honestatis ut usu, eripuit docendi volumus eu mel, sea ad case
                                nusquam voluptua. An mei vidit saepe adolescens, qui in diam nostro. Regione dolores his no,
                                mea audiam vidisse dolorem et. Qui wisi nulla electram ut, his soleat virtute temporibus an,
                                primis hendrerit eu ius.
                                Vix ea audire rationibus. Tale aperiri sit ad, zril noluisse ut sit.
                                Altera euismod propriae eam ex, has aeque lobortis reprimique ad, mei cu oratio salutandi
                                maluisset. Ius te fierent inimicus dignissim. Eos an feugait rationibus. At unum etiam
                                concludaturque nam.</p>
                            <p class="text-justify">Lorem ipsum dolor sit amet, facer honestatis ut usu, eripuit docendi volumus eu mel, sea ad case
                                nusquam voluptua. An mei vidit saepe adolescens, qui in diam nostro. Regione dolores his no,
                                mea audiam vidisse dolorem et. Qui wisi nulla electram ut, his soleat virtute temporibus an,
                                primis hendrerit eu ius.
                                Vix ea audire rationibus. Tale aperiri sit ad, zril noluisse ut sit.
                                Altera euismod propriae eam ex, has aeque lobortis reprimique ad, mei cu oratio salutandi
                                maluisset. Ius te fierent inimicus dignissim. Eos an feugait rationibus. At unum etiam
                                concludaturque nam.</p>
                            <p class="text-justify">Lorem ipsum dolor sit amet, facer honestatis ut usu, eripuit docendi volumus eu mel, sea ad case
                                nusquam voluptua. An mei vidit saepe adolescens, qui in diam nostro. Regione dolores his no,
                                mea audiam vidisse dolorem et. Qui wisi nulla electram ut, his soleat virtute temporibus an,
                                primis hendrerit eu ius.
                                Vix ea audire rationibus. Tale aperiri sit ad, zril noluisse ut sit.
                                Altera euismod propriae eam ex, has aeque lobortis reprimique ad, mei cu oratio salutandi
                                maluisset. Ius te fierent inimicus dignissim. Eos an feugait rationibus. At unum etiam
                                concludaturque nam.</p>
                            <p class="text-justify">Lorem ipsum dolor sit amet, facer honestatis ut usu, eripuit docendi volumus eu mel, sea ad case
                                nusquam voluptua. An mei vidit saepe adolescens, qui in diam nostro. Regione dolores his no,
                                mea audiam vidisse dolorem et. Qui wisi nulla electram ut, his soleat virtute temporibus an,
                                primis hendrerit eu ius.
                                Vix ea audire rationibus. Tale aperiri sit ad, zril noluisse ut sit.
                                Altera euismod propriae eam ex, has aeque lobortis reprimique ad, mei cu oratio salutandi
                                maluisset. Ius te fierent inimicus dignissim. Eos an feugait rationibus. At unum etiam
                                concludaturque nam.</p>
                        </div>
                    </div>
                    <div class="card m-t-35">
                        <div class="card-header bg-white">
                            About No Header Layout
                        </div>
                        <div class="card-block card_block_top_align ">
                            <h5> Here Comes Admire  Admin Theme  Description. </h5>
                            <p> Admire Admin Theme is built on Bootstrap v4.0.0-alpha.5 and it is a fully responsive theme...</p>
                            <p class="text-justify">Lorem ipsum dolor sit amet, facer honestatis ut usu, eripuit docendi volumus eu mel, sea ad case
                                nusquam voluptua. An mei vidit saepe adolescens, qui in diam nostro. Regione dolores his no,
                                mea audiam vidisse dolorem et. Qui wisi nulla electram ut, his soleat virtute temporibus an,
                                primis hendrerit eu ius.
                                Vix ea audire rationibus. Tale aperiri sit ad, zril noluisse ut sit.
                                Altera euismod propriae eam ex, has aeque lobortis reprimique ad, mei cu oratio salutandi
                                maluisset. Ius te fierent inimicus dignissim. Eos an feugait rationibus. At unum etiam
                                concludaturque nam.</p>
                            <p class="text-justify">Lorem ipsum dolor sit amet, facer honestatis ut usu, eripuit docendi volumus eu mel, sea ad case
                                nusquam voluptua. An mei vidit saepe adolescens, qui in diam nostro. Regione dolores his no,
                                mea audiam vidisse dolorem et. Qui wisi nulla electram ut, his soleat virtute temporibus an,
                                primis hendrerit eu ius.
                                Vix ea audire rationibus. Tale aperiri sit ad, zril noluisse ut sit.
                                Altera euismod propriae eam ex, has aeque lobortis reprimique ad, mei cu oratio salutandi
                                maluisset. Ius te fierent inimicus dignissim. Eos an feugait rationibus. At unum etiam
                                concludaturque nam.</p>
                            <p class="text-justify">Lorem ipsum dolor sit amet, facer honestatis ut usu, eripuit docendi volumus eu mel, sea ad case
                                nusquam voluptua. An mei vidit saepe adolescens, qui in diam nostro. Regione dolores his no,
                                mea audiam vidisse dolorem et. Qui wisi nulla electram ut, his soleat virtute temporibus an,
                                primis hendrerit eu ius.
                                Vix ea audire rationibus. Tale aperiri sit ad, zril noluisse ut sit.
                                Altera euismod propriae eam ex, has aeque lobortis reprimique ad, mei cu oratio salutandi
                                maluisset. Ius te fierent inimicus dignissim. Eos an feugait rationibus. At unum etiam
                                concludaturque nam.</p>
                            <p class="text-justify">Lorem ipsum dolor sit amet, facer honestatis ut usu, eripuit docendi volumus eu mel, sea ad case
                                nusquam voluptua. An mei vidit saepe adolescens, qui in diam nostro. Regione dolores his no,
                                mea audiam vidisse dolorem et. Qui wisi nulla electram ut, his soleat virtute temporibus an,
                                primis hendrerit eu ius.
                                Vix ea audire rationibus. Tale aperiri sit ad, zril noluisse ut sit.
                                Altera euismod propriae eam ex, has aeque lobortis reprimique ad, mei cu oratio salutandi
                                maluisset. Ius te fierent inimicus dignissim. Eos an feugait rationibus. At unum etiam
                                concludaturque nam.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- /#content -->
    </div>
    <!--wrapper-->
    <div id="right">
        <div class="right_content">
            <div class="well-small dark m-t-15">
                <div class="row m-0">
                    <div class="col-lg-12 p-d-0">
                        <div class="skinmulti_btn" onclick="javascript:loadjscssfile('blue_black_skin.css','css')">
                            <div class="skin_blue skin_size b_t_r"></div>
                            <div class="skin_blue_border skin_shaddow skin_size b_b_r"></div>
                        </div>
                        <div class="skinmulti_btn" onclick="javascript:loadjscssfile('green_black_skin.css','css')">
                            <div class="skin_green skin_size b_t_r"></div>
                            <div class="skin_green_border skin_shaddow skin_size b_b_r"></div>
                        </div>
                        <div class="skinmulti_btn" onclick="javascript:loadjscssfile('purple_black_skin.css','css')">
                            <div class="skin_purple skin_size b_t_r"></div>
                            <div class="skin_purple_border skin_shaddow skin_size b_b_r"></div>
                        </div>
                        <div class="skinmulti_btn" onclick="javascript:loadjscssfile('orange_black_skin.css','css')">
                            <div class="skin_orange skin_size b_t_r"></div>
                            <div class="skin_orange_border skin_shaddow skin_size b_b_r"></div>
                        </div>
                        <div class="skinmulti_btn" onclick="javascript:loadjscssfile('red_black_skin.css','css')">
                            <div class="skin_red skin_size b_t_r"></div>
                            <div class="skin_red_border skin_shaddow skin_size b_b_r"></div>
                        </div>
                        <div class="skinmulti_btn" onclick="javascript:loadjscssfile('mint_black_skin.css','css')">
                            <div class="skin_mint skin_size b_t_r"></div>
                            <div class="skin_mint_border skin_shaddow skin_size b_b_r"></div>
                        </div>
                        <!--</div>-->
                        <div class="skin_btn skinsingle_btn skin_blue b_r height_40 skin_shaddow"
                             onclick="javascript:loadjscssfile('blue_skin.css','css')"></div>
                        <div class="skin_btn skinsingle_btn skin_green b_r height_40 skin_shaddow"
                             onclick="javascript:loadjscssfile('green_skin.css','css')"></div>
                        <div class="skin_btn skinsingle_btn skin_purple b_r height_40 skin_shaddow"
                             onclick="javascript:loadjscssfile('purple_skin.css','css')"></div>
                        <div class="skin_btn  skinsingle_btn skin_orange b_r height_40 skin_shaddow"
                             onclick="javascript:loadjscssfile('orange_skin.css','css')"></div>
                        <div class="skin_btn skinsingle_btn skin_red b_r height_40 skin_shaddow"
                             onclick="javascript:loadjscssfile('red_skin.css','css')"></div>
                        <div class="skin_btn skinsingle_btn skin_mint b_r height_40 skin_shaddow"
                             onclick="javascript:loadjscssfile('mint_skin.css','css')"></div>
                    </div>
                    <div class="col-lg-12 text-xs-center m-t-15">
                        <button class="btn btn-dark button-rounded"
                                onclick="javascript:loadjscssfile('black_skin.css','css')">Dark
                        </button>
                        <button class="btn btn-secondary button-rounded default_skin"
                                onclick="javascript:loadjscssfile('default_skin.css','css')">Default
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Global scripts-->
<script type="text/javascript" src="{{asset('assets/js/components.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/custom.js')}}"></script>
<!--End of global scripts-->
</body>

</html>