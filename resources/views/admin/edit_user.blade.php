@extends('layouts/default')

{{-- Page title --}}
@section('title')
    Edit User
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <!-- plugin styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/bootstrapvalidator/css/bootstrapValidator.min.css')}}" />
    <!--end of page level css-->
@stop
@section('content')
                <header class="head">
                    <div class="main-bar row">
                        <div class="col-lg-6">
                            <h4 class="nav_top_align skin_txt">
                            <i class="fa fa-pencil"></i>
                            Edit User
                        </h4>
                        </div>
                        <div class="col-lg-6">
                            <ol class="breadcrumb float-xs-right nav_breadcrumb_top_align">
                                <li class="breadcrumb-item">
                                    <a href="index1">
                                        <i class="fa fa-home" data-pack="default" data-tags=""></i> Dashboard
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="#">Users</a>
                                </li>
                                <li class="breadcrumb-item active">Edit User</li>
                            </ol>
                        </div>
                    </div>
                </header>
                <div class="outer">
                    <div class="inner bg-container">
                        <div class="card">
                            <div class="card-block m-t-25">
                                <div>
                                    <h4>Personal Information</h4>
                                </div>
                                <form class="form-horizontal login_validator" id="tryitForm" action="users" method="post">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="form-group row m-t-15">
                                                <div class="col-xs-12 col-lg-3 text-xs-center text-lg-right">
                                                    <label class="form-control-label">Profile Pic</label>
                                                </div>
                                                <div class="col-xs-12 col-lg-6 text-xs-center text-lg-left">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new img-thumbnail text-xs-center">
                                                            <img src="{{asset('assets/img/admin.jpg')}}" data-src="img/admin.jpg" alt="not found"></div>
                                                        <div class="fileinput-preview fileinput-exists img-thumbnail"></div>
                                                        <div class="m-t-20 text-xs-center">
                                                            <span class="btn btn-primary btn-file">
                                                            <span class="fileinput-new">Select image</span>
                                                            <span class="fileinput-exists">Change</span>
                                                            <input type="file" name="...">
                                                            </span>
                                                            <a href="#" class="btn btn-warning fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row m-t-25">
                                                <div class="col-xs-12 col-lg-3 text-lg-right">
                                                    <label for="u-name" class="form-control-label">User Name *</label>
                                                </div>
                                                <div class="col-xs-12 col-xl-6 col-lg-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"> <i class="fa fa-user text-primary"></i>
                                    </span>
                                                        <input type="text" value="Micheal" name="firstName" id="u-name" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-xs-12 col-lg-3 text-lg-right">
                                                    <label for="email" class="form-control-label">Email *
                                                    </label>
                                                </div>
                                                <div class="col-xs-12 col-xl-6 col-lg-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-envelope text-primary"></i></span>
                                                        <input type="text" value="gankunding@hotmail.com" id="email" name="email" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-xs-12 col-lg-3 text-lg-right">
                                                    <label for="pwd" class="form-control-label">Password *</label>
                                                </div>
                                                <div class="col-xs-12 col-xl-6 col-lg-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-lock text-primary"></i></span>
                                                        <input type="password" value="" name="password" id="pwd" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-xs-12 col-lg-3 text-lg-right">
                                                    <label for="cpwd" class="form-control-label">Confirm Password *</label>
                                                </div>
                                                <div class="col-xs-12 col-xl-6 col-lg-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-lock text-primary"></i></span>
                                                        <input type="password" name="confirmpassword" value="" id="cpwd" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-xs-12 col-lg-3 text-lg-right">
                                                    <label for="phone" class="form-control-label">Phone *</label>
                                                </div>
                                                <div class="col-xs-12 col-xl-6 col-lg-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-phone text-primary"></i></span>
                                                        <input type="text" id="phone" name="cell" class="form-control" value="9999999999">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group gender_message row">
                                                <div class="col-xs-12 col-lg-3 text-lg-right">
                                                    <label class="form-control-label">Gender *</label>
                                                </div>
                                                <div class="col-xs-12 col-xl-6 col-lg-8">
                                                    <div class="custom-controls-stacked">
                                                        <label class="custom-control custom-radio">
                                                            <input id="radio1" type="radio" name="gender" class="custom-control-input" checked>
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">Male</span>
                                                        </label>
                                                        <label class="custom-control custom-radio">
                                                            <input id="radio2" type="radio" name="gender" class="custom-control-input">
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">Female</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-xs-12 col-lg-3 text-lg-right">
                                                    <label for="address" class="form-control-label">Address *
                                                    </label>
                                                </div>
                                                <div class="col-xs-12 col-xl-6 col-lg-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-plus text-primary"></i></span>
                                                        <input type="text" value="Australia" id="address" name="address1" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-xs-12 col-lg-3 text-lg-right">
                                                    <label for="city" class="form-control-label">City *</label>
                                                </div>
                                                <div class="col-xs-12 col-xl-6 col-lg-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-plus text-primary"></i></span>
                                                        <input type="text" value="Nakia" name="city" id="city" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-xs-12 col-lg-3 text-lg-right">
                                                    <label for="pincode" class="form-control-label">Pincode *
                                                    </label>
                                                </div>
                                                <div class="col-xs-12 col-xl-6 col-lg-8">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-plus text-primary"></i></span>
                                                        <input type="text" value="522522" name="pincode" id=pincode class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-xs-12 col-lg-3 text-lg-right">
                                                    <label for="checkbox1" class="form-control-label">Status *</label>
                                                </div>
                                                <div class="col-xs-12 col-xl-6 col-lg-8">
                                                    <div>
                                                        <label class="custom-control custom-checkbox">
                                                            <input id="checkbox1" type="checkbox" name="activate" class="custom-control-input" checked>
                                                            <span class="custom-control-indicator"></span>
                                                            <span class="custom-control-description">Activate your account</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-xs-12 col-lg-9 push-lg-3">
                                                    <button class="btn btn-primary" id="submit2" type="submit">
                                                        Save
                                                    </button>
                                                    <input type="reset" class="btn btn-warning" value='Reset' id="clear" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.inner -->
                </div>
                <!-- /.outer -->
@stop
@section('footer_scripts')
    <!-- plugin scripts-->
    <script type="text/javascript" src="{{asset('assets/js/pluginjs/jasny-bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/holderjs/js/holder.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js')}}"></script>
    <!-- end of plugin scripts-->
    <script type="text/javascript" src="{{asset('assets/js/pages/validation.js')}}"></script>
@stop
