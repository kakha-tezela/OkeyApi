<!DOCTYPE html>
<html>
<head>
    <title>Register 3 | Admire</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="shortcut icon" href="{{asset('assets/img/logo1.ico')}}"/>
    <!-- Global styles -->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/components.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />
    <!--End of Global styles -->
    <!--Plugin styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/bootstrapvalidator/css/bootstrapValidator.min.css')}}"/>
    <!--End of Plugin styles-->
    <!--Page level styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/login3.css')}}"/>
    <!--End of Page level styles-->
</head>

<body class="login_backimg">
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
<div class="container">
    <div class="row">
        <div class="col-xl-6 push-xl-3 col-lg-6 push-lg-3 col-md-8 push-md-2 col-sm-8 push-sm-2 col-xs-10 push-xs-1 login_section">
            <div class="row">
                <div class="col-lg-8 push-lg-2 col-md-10 push-md-1 col-sm-12 login_section login2_border register_section_top">
                    <div class="login_logo login_border_radius1">
                        <h3 class="text-xs-center text-white">
                            <img src="{{asset('assets/img/logow2.png')}}" alt="logo" class="admire_logo"><br/>
                            <span class="m-t-15">SIGN UP</span>
                        </h3>
                    </div>
                    <div class="m-t-15">
                        <form class="form-horizontal" id="register_valid" action="{{URL::to('register3')}}" method="post">
                            <div class="form-group row">
                                <div class="col-xs-12">
                                    <label for="username" class="form-control-label text-white">Username *</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control b_r_20" name="UserName" id="username" placeholder="Username">
                                        <span class="input-group-addon">
                                        <i class="fa fa-user text-white"></i>
                                    </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-xs-12">
                                    <label for="email" class="form-control-label text-white">Email *</label>
                                    <div class="input-group">
                                        <input type="text" placeholder="Email Address" name="email" id="email" class="form-control b_r_20">
                                        <span class="input-group-addon">
                                        <i class="fa fa-envelope text-white"></i>
                                    </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-xs-12">
                                    <label for="password" class="form-control-label text-white">Password *</label>
                                    <div class="input-group">
                                        <input type="password" placeholder="Password" id="password" name="password" class="form-control b_r_20">
                                        <span class="input-group-addon">
                                        <i class="fa fa-key text-white"></i>
                                    </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-xs-12">
                                    <label for="confirmpassword" class="form-control-label text-white">Confirm Password *</label>
                                    <div class="input-group">
                                        <input type="password" placeholder="Confirm Password" name="confirmpassword" id="confirmpassword" class="form-control b_r_20">
                                        <span class="input-group-addon">
                                        <i class="fa fa-key text-white"></i>
                                    </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-xs-12">
                                    <label class="form-control-label text-white">Gender</label>
                                </div>
                                <div class="col-xs-12">
                                    <label class="custom-control custom-radio">
                                        <input type="radio" name="radio" class="custom-control-input form-control">
                                        <span class="custom-control-indicator"></span>
                                        <a class="custom-control-description">Male</a>
                                    </label>
                                    <label class="custom-control custom-radio">
                                        <input type="radio" name="radio" class="custom-control-input form-control">
                                        <span class="custom-control-indicator"></span>
                                        <a class="custom-control-description">Female</a>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-xs-12">
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input form-control">
                                        <span class="custom-control-indicator"></span>
                                        <a class="custom-control-description">Send me latest news and updates.</a>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-xs-6">
                                    <a href="{{URL::to('login3')}}" type="submit" class="btn btn-block btn-success login_button b_r_20">Submit</a>
                                </div>
                                <div class="col-xs-6">
                                    <button type="reset" class="btn btn-block btn-danger b_r_20">Reset</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <label class="form-control-label text-white">Already have an account?</label>
                                    <a href="{{URL::to('login3')}}" class="text-primary login_hover"><b>Log In</b></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- global js -->
<script type="text/javascript" src="{{asset('assets/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/tether.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<!-- end of global js-->
<!--Plugin js-->
<script type="text/javascript" src="{{asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/jquery.backstretch/js/jquery.backstretch.js')}}"></script>
<!--End of plugin js-->
<script type="text/javascript" src="{{asset('assets/js/pages/login3.js')}}"></script>
</body>

</html>