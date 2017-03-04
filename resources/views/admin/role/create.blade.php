@extends('layouts/default')

{{-- Page title --}}
@section('title')
    Form Layouts
    @parent
@stop
{{-- page level styles --}}
@section('header_styles')
    <!--plugin styles-->
    <link rel="stylesheet" href="{{asset('assets/vendors/intl-tel-input/css/intlTelInput.css')}}">
    <link type="text/css" rel="stylesheet"
          href="{{asset('assets/vendors/bootstrapvalidator/css/bootstrapValidator.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/sweetalert/css/sweetalert2.min.css')}}"/>
    <!--End of plugin styles-->
    <!--Page level styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/sweet_alert.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/form_layouts.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/radio_checkbox.css')}}"/>
    <!-- end of page level styles -->
@stop
@section('content')
    <header class="head">
        <div class="main-bar row">
            <div class="col-sm-5 col-lg-6 skin_txt">
                <h4 class="nav_top_align">
                    <i class="fa fa-add"></i>
                    Add Role
                </h4>
            </div>
            <div class="col-sm-7 col-lg-6">
                <ol class="breadcrumb float-xs-right nav_breadcrumb_top_align">
                    <li class="breadcrumb-item">
                        <a href="index1">
                            <i class="fa fa-home" data-pack="default" data-tags=""></i> Dashboard
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">Roles</a>
                    </li>
                    <li class="active breadcrumb-item">Add Role</li>
                </ol>
            </div>
        </div>
    </header>
    <div class="outer">
        <div class="inner bg-container">
            <div class="row">
                <!-- two column sign up form-->
                <div class="col-xs-12">
                    <div class="card m-t-35">

                        <div class="card-block m-t-10">
                            <div class="row">

                                    <form class="form-horizontal" method="post"
                                          action="{{action('Admin\RoleController@store')}}">
                                        {{csrf_field()}}
                                        <div class="col-xl-6">

                                        <div class="form-group row">
                                            <div class="col-lg-3 text-lg-right">
                                                <label for="email6" class="form-control-label">სახელი</label>
                                            </div>
                                            <div class="col-lg-8">
                                                @if ($errors->has('name'))
                                                    <div class="alert alert-danger fade in ">
                                                        <a href="#" class="close" data-dismiss="alert">×</a>
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </div>
                                                @endif
                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                            <i class="fa fa-file-text"></i>
                                                        </span>
                                                    <input type="text" id="email6" class="form-control" value="{{old('name')}}" name="name"
                                                           placeholder="სახელი">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-3 text-lg-right">
                                                <label for="subject2" class="form-control-label">აღწერა</label>
                                            </div>
                                            <div class="col-lg-8">
                                                @if ($errors->has('description'))
                                                    <div class="alert alert-danger fade in ">
                                                        <a href="#" class="close" data-dismiss="alert">×</a>
                                                        <strong>{{ $errors->first('description') }}</strong>
                                                    </div>
                                                @endif
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-text-width"
                                                                                       aria-hidden="true"></i></span>
                                                    <input type="text" name="description" id="subject2"
                                                           class="form-control" value="{{old('description')}}" placeholder="აღწერა">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-12 push-lg-3">
                                                <input type="submit"
                                                       class="btn btn-responsive  btn-primary"
                                                       value="შენახვა">
                                            </div>
                                        </div>

                                    </div>
                                        <div class="col-xl-6">
                                        <div class="card-header radio_card_bg">
                                            Permissions
                                        </div>
                                        <div class="card-block m-t-10">
                                            <div class="row">
                                                <div class="col-xs-12 col-md-6 m-t-20">

                                                    <div class="left_align">
                                                        @foreach($permissions as $permission)
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" name="permissions[]" value="{{$permission->id}}">
                                                                    <span class="cr"><i
                                                                                class="cr-icon fa fa-check"></i></span>
                                                                    {{$permission->name}}
                                                                </label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        </div>

                                    </form>



                            </div>
                        </div>
                    </div>
                </div>
                <!-- Basic Query Layout-->
                <!-- Horizontal Query layout-->
            </div>
        </div>
        <!-- /.inner -->
    </div>
    <!-- /.outer -->
@stop
@section('footer_scripts')
    <!--Plugin scripts-->
    <script type="text/javascript" src="{{asset('assets/vendors/intl-tel-input/js/intlTelInput.js')}}"></script>
    <script type="text/javascript"
            src="{{asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/sweetalert/js/sweetalert2.min.js')}}"></script>
    <!--End of Plugin scripts-->
    <!--Page level scripts-->
    <script type="text/javascript" src="{{asset('assets/vendors/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/switchery/js/switchery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/pages/radio_checkbox.js')}}"></script>
    {{--<script type="text/javascript" src="{{asset('assets/js/pages/form_layouts.js')}}"></script>--}}
    <!-- end of page level js -->
@stop
