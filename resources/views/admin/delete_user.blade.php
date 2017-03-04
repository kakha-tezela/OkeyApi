@extends('layouts/default')

    {{-- Page title --}}
    @section('title')
        Delete User
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <!-- plugin styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/bootstrapvalidator/css/bootstrapValidator.min.css')}}"/>
    <!--end of page level css-->
@stop
@section('content')
            <header class="head">
                <div class="main-bar row">
                    <div class="col-lg-6">
                        <h4 class="nav_top_align skin_txt">
                            <i class="fa fa-user"></i>
                            Delete User
                        </h4>
                    </div>
                    <div class="col-lg-6">
                        <ol class="breadcrumb float-xs-right nav_breadcrumb_top_align">
                            <li class="breadcrumb-item">
                                <a href="index1">
                                    <i class="fa fa-home" data-pack="default" data-tags=""></i>
                                    Dashboard
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">Users</a>
                            </li>
                            <li class="breadcrumb-item active">Delete User</li>
                        </ol>
                    </div>
                </div>
            </header>
            <div class="outer">
                <div class="inner bg-container">
                    <div class="card">
                        <div class="card-header bg-white">
                            <i class="fa fa-user"></i>
                            Deleted Users List
                        </div>
                        <div class="card-block m-t-35 table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th class="sorting_asc wid-20" tabindex="0" rowspan="1" colspan="1">Username</th>
                                    <th class="sorting wid-25" tabindex="0" rowspan="1" colspan="1">E-Mail</th>
                                    <th class="sorting wid-10" tabindex="0" rowspan="1" colspan="1">Gender</th>
                                    <th class="sorting wid-20" tabindex="0" rowspan="1" colspan="1">City</th>
                                    <th class="sorting wid-15" tabindex="0" rowspan="1" colspan="1">Status</th>
                                    <th class="sorting wid-10" tabindex="0" rowspan="1" colspan="1">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="even">
                                    <td class="sorting_1">Martena</td>
                                    <td>test@mail.com</td>
                                    <td>Male</td>
                                    <td class="center">New Jersy</td>
                                    <td class="center">Approved</td>
                                    <td>
                                        <a href="users" data-toggle="tooltip" data-placement="top" title="Restore">
                                            <i class="fa fa-users text-success"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr class="odd">
                                    <td class="sorting_1">Cedric</td>
                                    <td>test@mail.com</td>
                                    <td>Male</td>
                                    <td class="center">New Jersy</td>
                                    <td class="center">Approved</td>
                                    <td>
                                        <a href="users" data-toggle="tooltip" data-placement="top" title="Restore">
                                            <i class="fa fa-users text-success"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr class="even">
                                    <td class="sorting_1">Sonya</td>
                                    <td>test@mail.com</td>
                                    <td>Male</td>
                                    <td class="center">New Jersy</td>
                                    <td class="center">Approved</td>
                                    <td>
                                        <a href="users" data-toggle="tooltip" data-placement="top" title="Restore">
                                            <i class="fa fa-users text-success"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr class="odd">
                                    <td class="sorting_1">Gavin</td>
                                    <td>test@mail.com</td>
                                    <td>Male</td>
                                    <td class="center">New Jersy</td>
                                    <td class="center">Approved</td>
                                    <td>
                                        <a href="users" data-toggle="tooltip" data-placement="top" title="Restore">
                                            <i class="fa fa-users text-success"></i>
                                        </a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- /.inner -->
            </div>
@stop
@section('footer_scripts')
<!-- plugin scripts-->
<script type="text/javascript" src="{{asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/holderjs/js/holder.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/pages/validation.js')}}"></script>
<!-- end of plugin scripts-->
@stop