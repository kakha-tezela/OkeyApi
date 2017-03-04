@extends('layouts.default')

{{-- Page title --}}
@section('title')
    Users
    @parent
@stop
{{-- page level styles --}}
@section('header_styles')
    <!--Plugin styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/select2/css/select2.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/dataTables.bootstrap.css')}}"/>
    <!--End of plugin styles-->
    <!--Page level styles-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/tables.css')}}"/>
    <!-- end of page level styles -->

@stop
@section('content')
    <header class="head">
        <div class="main-bar row">
            <div class="col-lg-6 col-sm-4">
                <h4 class="nav_top_align">
                    <i class="fa fa-user"></i>
                    User Grid
                </h4>
            </div>
            <div class="col-lg-6 col-sm-8 col-xs-12">
                <ol class="breadcrumb float-xs-right  nav_breadcrumb_top_align">
                    <li class="breadcrumb-item">
                        <a href="index1">
                            <i class="fa fa-home" data-pack="default" data-tags=""></i> Dashboard
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">Roles & Permissions</a>
                    </li>
                    <li class="active breadcrumb-item">Permissions</li>
                </ol>
            </div>
        </div>
    </header>
    <div class="outer">
        <div class="inner bg-container">
            <div class="card">
                <div class="card-header bg-white">
                    Permissions
                </div>
                <div class="card-block m-t-35" id="user_body">
                    <div class="table-toolbar">
                        <div class="btn-group">
                            <a href="{{action('Admin\PermissionController@create')}}" id="editable_table_new"
                               class=" btn btn-default">
                                Add Permission <i class="fa fa-plus"></i>
                            </a>
                        </div>
                        <div class="btn-group float-xs-right users_grid_tools">
                            <div class="tools"></div>
                        </div>
                    </div>
                    <div>
                        <div>
                            <table class="table  table-striped table-bordered table-hover dataTable no-footer"
                                   id="editable_table" role="grid">
                                <thead>
                                <tr role="row">
                                    <th class="sorting_asc wid-20" tabindex="0" rowspan="1" colspan="1">id</th>
                                    <th class="sorting_asc wid-20" tabindex="0" rowspan="1" colspan="1">აღწერა</th>
                                    <th class="sorting wid-25" tabindex="0" rowspan="1" colspan="1">სახელი</th>
                                    <th class="sorting wid-25" tabindex="0" rowspan="1" colspan="1">მოქმედება</th>
                                    {{--<th class="sorting wid-10" tabindex="0" rowspan="1" colspan="1">Actions</th>--}}
                                </tr>
                                </thead>

                            </table>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
        </div>
        <!-- /.inner -->
    </div>
    <!-- /.outer -->

    @include('admin.includes.deletemodal',['class'=>'Role'])
@stop
@section('footer_scripts')
    <!--Plugin scripts-->
    <script type="text/javascript" src="{{asset('assets/vendors/select2/js/select2.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/datatables/js/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript"
            src="{{asset('assets/vendors/datatables/js/dataTables.responsive.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/datatables/js/dataTables.buttons.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/datatables/js/buttons.colVis.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/datatables/js/buttons.html5.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/datatables/js/buttons.bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/datatables/js/buttons.print.min.js')}}"></script>
    <!--End of plugin scripts-->
    <!--Page level scripts-->
    <script type="text/javascript" src="{{asset('assets/js/pages/users.js')}}"></script>
    <!-- end page level scripts -->

    <script>
        $(function () {


            var tableWrapper = $("#editable_table_wrapper");
            tableWrapper.find(".dataTables_length select").select2({
                showSearchInput: false //hide search box with special css class
            }); // initialize select2 dropdown
            $("#editable_table_wrapper .dt-buttons .btn").addClass('btn-secondary').removeClass('btn-default');

            $('#editable_table').DataTable({
                initComplete: function(){
                    $('[data-id]').click(function(){
                        let itemId = $(this).attr('data-id');
                        let form = $('#modal-17').find('form');
                        let oldAction = form.attr('action');
                        let newAction = oldAction.split('/');
                        newAction.pop();
                        newAction = newAction.join('/');
                        newAction = newAction+'/'+itemId;
                        console.log(newAction);
                        form.attr('action',newAction);
                    });
                },
                dom: '<"text-xs-right"B><f>lr<"table-responsive"t>ip',
                buttons: [
                    'copy', 'csv', 'print'
                ],
                processing: true,
                serverSide: true,
                ajax: '{!! action('Admin\PermissionController@index') !!}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'description', name: 'description'},
                    {data: 'name', name: 'name'},
                    {data: 'action', name: 'action'}
                ]
            });



        });

    </script>
@stop
