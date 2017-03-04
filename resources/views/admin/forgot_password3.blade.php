<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password 3 | Admire</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="shortcut icon" href="img/logo1.ico"/>
    <!--Global styles -->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/components.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/custom.css')}}" />
    <!--End of Global styles -->
    <!--Plugin styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/bootstrapvalidator/css/bootstrapValidator.min.css')}}"/>
    <!--End of Plugin styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/login3.css')}}"/>
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
        <div class="col-xl-4 push-xl-4 col-lg-6 push-lg-3 col-md-8 push-md-2 col-sm-8 push-sm-2 col-xs-10 push-xs-1 login_section">
            <div class="row">
                <div class="col-lg-10 push-lg-1 col-md-10 push-md-1 col-sm-12 login2_border forgot_section_top">
                    <div class="login_logo login_border_radius1">
                        <h3 class="text-xs-center text-white">
                            <img src="{{asset('assets/img/logow2.png')}}" alt="logo" class="admire_logo"><br/>
                            <span class="m-t-15">FORGOT PASSWORD</span>
                        </h3>
                    </div>
                    <div class="m-t-15">
                        <form action="{{URL::to('forgot_password3')}}" id="login_validator1" method="post" class="form-group  login_validator bv-form" novalidate="novalidate">
                            <div class="login_content login_border_radius">
                                <div class="form-group">
                                    <label for="email_modal" class="text-white">Please enter your email</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control email_forgot b_r_20" id="email_modal" name="email_modal" placeholder="E-mail">
                                        <span class="input-group-addon">
                                        <i class="fa fa-envelope text-white"></i>
                                    </span>
                                    </div>
                                </div>
                                <div class="form-group text-xs-center">
                                    <a type="submit" href="{{URL::to('login3')}}" class="btn btn-success submit_email b_r_20 login_button m-t-10">Submit
                                    </a>
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