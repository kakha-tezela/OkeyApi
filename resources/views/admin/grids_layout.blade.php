@extends('layouts/default')

{{-- Page title --}}
@section('title')
    Grid View
    @parent
@stop
{{-- page level styles --}}
@section('header_styles')
@stop
@section('content')
            <header class="head">
                <div class="main-bar row">
                    <div class="col-lg-6 col-md-4 col-sm-4">
                        <h4 class="nav_top_align">
                            <i class="fa fa-anchor"></i>
                            Grid View
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
                            <li class="breadcrumb-item active">Grid View</li>
                        </ol>
                    </div>
                </div>
            </header>
            <div class="outer">
                <div class="inner bg-light lter bg-container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header bg-white">
                                    Grid System
                                </div>
                                <div class="card-block">
                                    <div class="row">
                                        <div class="col-xs-12 m-t-35">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th>Bootstrap Grid</th>
                                                        <th>Extra small
                                                            <small>(&lt;544px)</small>
                                                        </th>
                                                        <th>Small
                                                            <small>(≥544px)</small>
                                                        </th>
                                                        <th>Medium
                                                            <small>(≥768px)</small>
                                                        </th>
                                                        <th>Large
                                                            <small>(≥992px)</small>
                                                        </th>
                                                        <th>Extra large
                                                            <small>(≥1200px)</small>
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <th class="text-nowrap" scope="row">Grid behavior</th>
                                                        <td>Horizontal at all times</td>
                                                        <td colspan="4">Collapsed to start, horizontal above
                                                            breakpoints
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-nowrap" scope="row">Container width</th>
                                                        <td>None (auto)</td>
                                                        <td>34rem</td>
                                                        <td>45rem</td>
                                                        <td>60rem</td>
                                                        <td>72.25rem</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-nowrap" scope="row">Class prefix</th>
                                                        <td><code>.col-xs-</code></td>
                                                        <td><code>.col-sm-</code></td>
                                                        <td><code>.col-md-</code></td>
                                                        <td><code>.col-lg-</code></td>
                                                        <td><code>.col-xl-</code></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-nowrap" scope="row"># of columns</th>
                                                        <td colspan="5">12</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-nowrap" scope="row">Gutter width</th>
                                                        <td colspan="5">30px (15px on each side of a column)</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-nowrap" scope="row">Nestable</th>
                                                        <td colspan="5">Yes</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-nowrap" scope="row">Offsets</th>
                                                        <td colspan="5">Yes</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-nowrap" scope="row">Column ordering</th>
                                                        <td colspan="5">Yes</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--<section class="content">-->
                    <!--main content-->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card m-t-35">
                                <div class="card-header bg-white">
                                    Grid Examples
                                </div>
                                <div class="card-block">
                                    <form>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-12 form_div m-t-35">
                                                    <h5>XS Grid</h5>
                                                    <div class="col-xs-4 text-center bg-primary">
                                                        <div>.col-xs-4</div>
                                                    </div>
                                                    <div class="col-xs-4 text-center bg-warning">
                                                        <div>.col-xs-4</div>
                                                    </div>
                                                    <div class="col-xs-4 text-center bg-mint">
                                                        <div>.col-xs-4</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-12 form_div m-t-20">
                                                    <h5>SM Grid</h5>
                                                    <div class="col-sm-3 text-center bg-warning">
                                                        <div>.col-sm-3</div>
                                                    </div>
                                                    <div class="col-sm-4 text-center bg-success">
                                                        <div>.col-sm-4</div>
                                                    </div>
                                                    <div class="col-sm-5 text-center bg-primary">
                                                        <div>.col-sm-5</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-12 form_div m-t-20">
                                                    <h5>MD Grid</h5>
                                                    <div class="col-md-5 text-center bg-success">
                                                        <div>.col-md-5</div>
                                                    </div>
                                                    <div class="col-md-3 text-center bg-primary">
                                                        <div>.col-md-3</div>
                                                    </div>
                                                    <div class="col-md-4 text-center bg-warning">
                                                        <div>.col-md-4</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-12 form_div m-t-20">
                                                    <h5>LG Grid</h5>
                                                    <div class="col-lg-4 text-center bg-warning">
                                                        <div>.col-lg-4</div>
                                                    </div>
                                                    <div class="col-lg-4 text-center bg-primary">
                                                        <div>.col-lg-4</div>
                                                    </div>
                                                    <div class="col-lg-4 text-center bg-success">
                                                        <div>.col-lg-4</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-12 form_div m-t-20">
                                                    <h5>XL Grid</h5>
                                                    <div class="col-xl-6 text-center bg-primary">
                                                        <div>.col-xl-6</div>
                                                    </div>
                                                    <div class="col-xl-6 text-center bg-success">
                                                        <div>.col-xl-6</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end row -->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--main content ends-->
                    <!--</section>-->
                    <div class="row">
                        <div class="col-lg-12 ">
                            <div class="card m-t-35">
                                <div class="card-header bg-white">
                                    Responsive Utilities
                                </div>
                                <div class="card-block">
                                    <div class="row m-t-35">
                                        <div class="col-xs-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th>Class</th>
                                                        <th class="table_responsive">Extra small devices <br/>
                                                            <small>Portrait phones (&lt;544px)</small>
                                                        </th>
                                                        <th class="table_responsive">Small devices <br/>
                                                            <small>Landscape phones (≥544px)</small>
                                                        </th>
                                                        <th class="table_responsive">Medium devices <br/>
                                                            <small>Tablets (≥768px)</small>
                                                        </th>
                                                        <th class="table_responsive">Large devices <br/>
                                                            <small>Desktops (≥992px)</small>
                                                        </th>
                                                        <th class="table_responsive">Extra large devices <br/>
                                                            <small>Desktops (≥1200px)</small>
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <th scope="row"><code>.hidden-xs-down</code></th>
                                                        <td class="is-hidden">Hidden</td>
                                                        <td class="is-visible">Visible</td>
                                                        <td class="is-visible">Visible</td>
                                                        <td class="is-visible">Visible</td>
                                                        <td class="is-visible">Visible</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"><code>.hidden-sm-down</code></th>
                                                        <td class="is-hidden">Hidden</td>
                                                        <td class="is-hidden">Hidden</td>
                                                        <td class="is-visible">Visible</td>
                                                        <td class="is-visible">Visible</td>
                                                        <td class="is-visible">Visible</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"><code>.hidden-md-down</code></th>
                                                        <td class="is-hidden">Hidden</td>
                                                        <td class="is-hidden">Hidden</td>
                                                        <td class="is-hidden">Hidden</td>
                                                        <td class="is-visible">Visible</td>
                                                        <td class="is-visible">Visible</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"><code>.hidden-lg-down</code></th>
                                                        <td class="is-hidden">Hidden</td>
                                                        <td class="is-hidden">Hidden</td>
                                                        <td class="is-hidden">Hidden</td>
                                                        <td class="is-hidden">Hidden</td>
                                                        <td class="is-visible">Visible</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"><code>.hidden-xl-down</code></th>
                                                        <td class="is-hidden">Hidden</td>
                                                        <td class="is-hidden">Hidden</td>
                                                        <td class="is-hidden">Hidden</td>
                                                        <td class="is-hidden">Hidden</td>
                                                        <td class="is-hidden">Hidden</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"><code>.hidden-xs-up</code></th>
                                                        <td class="is-hidden">Hidden</td>
                                                        <td class="is-hidden">Hidden</td>
                                                        <td class="is-hidden">Hidden</td>
                                                        <td class="is-hidden">Hidden</td>
                                                        <td class="is-hidden">Hidden</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"><code>.hidden-sm-up</code></th>
                                                        <td class="is-visible">Visible</td>
                                                        <td class="is-hidden">Hidden</td>
                                                        <td class="is-hidden">Hidden</td>
                                                        <td class="is-hidden">Hidden</td>
                                                        <td class="is-hidden">Hidden</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"><code>.hidden-md-up</code></th>
                                                        <td class="is-visible">Visible</td>
                                                        <td class="is-visible">Visible</td>
                                                        <td class="is-hidden">Hidden</td>
                                                        <td class="is-hidden">Hidden</td>
                                                        <td class="is-hidden">Hidden</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"><code>.hidden-lg-up</code></th>
                                                        <td class="is-visible">Visible</td>
                                                        <td class="is-visible">Visible</td>
                                                        <td class="is-visible">Visible</td>
                                                        <td class="is-hidden">Hidden</td>
                                                        <td class="is-hidden">Hidden</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"><code>.hidden-xl-up</code></th>
                                                        <td class="is-visible">Visible</td>
                                                        <td class="is-visible">Visible</td>
                                                        <td class="is-visible">Visible</td>
                                                        <td class="is-visible">Visible</td>
                                                        <td class="is-hidden">Hidden</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.outer -->
            <!-- Modal -->
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
@stop
@section('footer_scripts')
@stop