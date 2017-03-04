<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8">
    <title>
        @section('title')
            | Admire
        @show
    </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{asset('assets/img/logo1.ico')}}"/>
    <!-- global styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/components.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/custom.css')}}"/>
    <link type="text/css" rel="stylesheet" href="#" id="skin_change"/>
    <!-- end of global styles-->
    @yield('header_styles')
</head>

<body>
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
    <div id="top">
        <!-- .navbar -->
        <nav class="navbar navbar-static-top">
            <div class="container-fluid">
                <a class="navbar-brand text-xs-center" href="index">
                    <h3><img src="{{asset('assets/img/logo1.ico')}}" class="admin_img" alt="logo"> HIPPO ADMIN</h3>
                </a>
                <div class="menu">
                    <span class="toggle-left" id="menu-toggle">
                        <i class="fa fa-bars"></i>
                    </span>
                </div>
                <div class="topnav dropdown-menu-right float-xs-right">
                    <div class="btn-group hidden-md-up small_device_search" data-toggle="modal"
                         data-target="#search_modal">
                        <i class="fa fa-search text-primary"></i>
                    </div>

                    <div class="btn-group">
                        <div class="notifications request_section no-bg">
                            <a class="btn btn-default btn-sm messages" id="request_btn"> <i
                                        class="fa fa-sliders" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    <div class="btn-group">
                        <div class="user-settings no-bg">
                            <button type="button" class="btn btn-default no-bg micheal_btn" data-toggle="dropdown">
                                <img src="{{asset('assets/img/admin.jpg')}}"
                                     class="admin_img2 img-thumbnail rounded-circle avatar-img"
                                     alt="avatar"> <strong>{{Auth::user()->name}}</strong>
                                <span class="fa fa-sort-down white_bg"></span>
                            </button>
                            <div class="dropdown-menu admire_admin">
                                <a class="dropdown-item title" href="#">
                                    Hippo Admin</a>
                                <a class="dropdown-item" href="{{action('Admin\PersonalsController@edit',Auth::user()->id)}}"><i class="fa fa-cogs"></i>
                                    პროფილი</a>
                                <a class="dropdown-item" href="/logout"><i class="fa fa-sign-out"></i>
                                    გამოსვლა</a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="top_search_box float-xs-right hidden-sm-down">
                    <form class="header_input_search float-xs-right">
                        <input type="text" placeholder="Search" name="search">
                        <button type="submit">
                            <span class="font-icon-search"></span>
                        </button>
                        <div class="overlay"></div>
                    </form>
                </div>
            </div>
            <!-- /.container-fluid -->
        </nav>
        <!-- /.navbar -->
        <!-- /.head -->
    </div>
    <!-- /#top -->
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
                                <img class="media-object img-thumbnail user-img rounded-circle admin_img3"
                                     alt="User Picture"
                                     src="{{asset('assets/img/admin.jpg')}}">
                                <p class="user-info menu_hide">@role('Admin') Admin  @endrole {{Auth::user()->name}}</p>
                            </a>
                        </div>
                    </div>
                    <hr/>
                </div>
                <ul id="menu">
                    <li {!! (Request::is('role')|| Request::is('permission') ? 'class="active"' : '') !!}>
                        <a href="#">
                            <i class="fa fa-map-marker"></i>
                            <span class="link-title menu_hide">&nbsp; Roles & Permission</span>
                            <span class="fa arrow menu_hide"></span>
                        </a>
                        <ul>
                            <li {!! (Request::is('role')? 'class="active"':"") !!}>
                                <a href="{{url('role') }} ">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; Roles
                                </a>
                            </li>
                            <li {!! (Request::is('permission')? 'class="active"':"") !!}>
                                <a href="{{ url('permission') }} ">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp;  Permissions
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li {!! (Request::is('personal') ? 'class="active"' : '') !!}>
                        <a href="#">
                            <i class="fa fa-user"></i>
                            <span class="link-title menu_hide">&nbsp; მომხმარებელები</span>
                            <span class="fa arrow menu_hide"></span>
                        </a>
                        <ul>
                            <li {!! (Request::is('personal')? 'class="active"':"") !!}>
                                <a href="{{ url('personal') }} ">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; მომხმარებელები
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li {!! (Request::is('page') ? 'class="active"' : '') !!}>
                        <a href="javascript:;">
                            <i class="fa fa-file"></i>
                            <span class="link-title menu_hide">&nbsp; Pages</span>
                            <span class="fa arrow menu_hide"></span>
                        </a>
                        <ul>
                            <li {!! (Request::is('404')? 'class="active"':"") !!}>
                                <a href="{{ URL::to('404') }} ">
                                    <i class="fa fa-angle-right"></i>
                                    &nbsp; 404
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- /#menu -->
            </div>
        </div>
        <!-- /#left -->

        <div id="content" class="bg-container">
            <!-- Content -->
        @yield('content')
        <!-- Content end -->
        </div>
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
    </div>
    <!-- /#content -->
    @include('layouts.right_sidebar')

</div>
<!-- /#wrap -->
<!-- global scripts-->
<script type="text/javascript" src="{{asset('assets/js/components.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/custom.js')}}"></script>
<!-- end of global scripts-->
<!-- page level js -->
@yield('footer_scripts')

@stack('scripts')
<!-- end page level js -->
</body>
</html>