<x-app-layout>
    <x-slot:slot>
        @section('styles')
            <link href="{{ asset('assets/plugins/jquery-datatable/media/css/dataTables.bootstrap.min.css') }}"
                rel="stylesheet" type="text/css" />
            <link
                href="{{ asset('assets/plugins/jquery-datatable/extensions/FixedColumns/css/dataTables.fixedColumns.min.css') }}"
                rel="stylesheet" type="text/css" />
            <link href="{{ asset('assets/plugins/datatables-responsive/css/datatables.responsive.css') }}" rel="stylesheet"
                type="text/css" media="screen" />
        @endsection
        <!-- START PAGE CONTENT -->
        <div class="content ">
            <!-- MODAL STICK UP  -->
            <div class="modal fade stick-up" id="addNewAppModal" tabindex="-1" role="dialog"
                aria-labelledby="addNewAppModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header clearfix ">
                            <button aria-label="" type="button" class="close"
                                onclick="$('#addNewAppModal').modal('hide')" aria-hidden="true"><i
                                    class="pg-icon">close</i>
                            </button>
                            <h4 class="p-b-5"><span class="semi-bold">New</span> Sub Menu</h4>
                        </div>

                        <div class="modal-body">
                            <p class="small-text">Create a new <b>sub menu</b> using this form, make sure you fill them all</p>

                            <form method="post" action="{{ route('sub.menu.store') }}" role="form">
                                @csrf
                                @include('shared.feedback')
                                <div class="row g-2">
                                    <div class="col-sm-12">
                                        <div class="form-group form-group-default required">
                                            <label>Sub Menu Title</label>
                                            <input name="sub_menu_title" value="{{ old('sub_menu_title') }}" type="text"
                                                class="form-control" placeholder="Name of the sub menu">
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group form-group-default required">
                                            <label>Menu</label>
                                            <select class="form-control" id="input30" name="menu_item">
                                                <option selected>Choose a menu</option>
                                                @foreach($allMenuItem as $menu)
                                                <option value="{{$menu->id}}">
                                                    {{$menu->menu_title}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{-- categories are shown based on the the menu selected since each category are created under a particular mnenu--}}
                                    <div class="col-sm-12">
                                       <div class="form-group form-group-default">
                                            <label>Menu Category</label>
                                            <select class="form-control" id="input30" name="menu_category">
                                                <option selected>Choose a category</option>
                                                {{-- @foreach($allMenuCategory as $category) --}}
                                                {{-- <option value="{{$category->id}}"> --}}
                                                    {{-- {{$category->menu_cat_title}} --}}
                                                {{-- </option> --}}
                                                {{-- @endforeach --}}
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group form-group-default required">
                                            <label>Route</label>
                                            <input type="text" name="sub_menu__route" step="1" id="" value="{{ old('sub_menu__route') }}"
                                                class="form-control" placeholder="Route">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group form-group-default required">
                                            <label>Slug</label>
                                            <input type="text" name="sub_menu__slug"  id="" value="{{ old('sub_menu__slug') }}"
                                                class="form-control" placeholder="Slug">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group form-group-default">
                                            <label>Position</label>
                                            <input type="number" name="sub_menu__position" step="1" id="" value="{{ old('sub_menu__position') }}"
                                                class="form-control" placeholder="Position">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group form-group-default">
                                            <label for="" class="select-label">Status</label>
                                            <select name="sub_menu__status" id="" class="form-control">
                                                <option value="1">Active</option>
                                                <option value="0" selected>Inactive</option>
                                            </select>

                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button aria-label="" type="submit" class="btn btn-primary  btn-cons">Add</button>
                                    <button type="button" class="btn btn-cons"
                                        onclick="$('#addNewAppModal').modal('hide')">Close</button>
                                </div>
                            </form>

                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- START JUMBOTRON -->
            <div class="jumbotron" data-pages="parallax">
                <div class=" container-fluid   container-fixed-lg sm-p-l-0 sm-p-r-0">
                    <div class="inner">
                        <!-- START BREADCRUMB -->
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Sub Menu Records</li>
                        </ol>
                        <!-- END BREADCRUMB -->
                        <div class="row">
                            <div class="col-xl-7 col-lg-6 ">
                                <!-- START card -->
                                <div class="full-height">
                                    <div class="card-body text-center">
                                        <img class="image-responsive-height demo-mw-600"
                                            src="assets/img/demo/tables.jpg" alt="">
                                    </div>
                                </div>
                                <!-- END card -->
                            </div>
                            <div class="col-xl-5 col-lg-6 ">
                                <!-- START card -->
                                <div class="card card-transparent">
                                    <div class="card-header ">
                                        <div class="card-title">Getting started
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h3>Easier than finding a needle in the haystack.</h3>
                                        <p>Sharing the same stylized design layout, these tables allow for the effective
                                            compilation and organization of data with easy access and maneuverability
                                            for users. </p>
                                        <br>
                                        <button aria-label="" class="btn btn-primary btn-cons">More</button>
                                    </div>
                                </div>
                                <!-- END card -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END JUMBOTRON -->
            <!-- START CONTAINER FLUID -->
            <div class=" container-fluid   container-fixed-lg">
                <!-- START card -->
                <div class="card card-transparent">
                    <div class="card-header ">
                        <div class="card-title">Table with Dynamic Rows
                        </div>
                        <div class="pull-right">
                            <div class="col-xs-12">
                                <button aria-label="" id="show-modal" class="btn btn-primary btn-cons"><i
                                        class="pg-icon">add</i> Add sub menu
                                </button>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover demo-table-dynamic table-responsive-block"
                            id="tableWithDynamicRows">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Menu</th>
                                    <th>Menu Category</th>
                                    <th>Route</th>
                                    <th>Slug</th>
                                    <th>Position</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allSubMenu as $key => $subMenu)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $subMenu->sub_menu_title }}</td>
                                        <td>{{ $subMenu->menu_id }}</td>
                                        <td>{{ $subMenu->menu_category_id }}</td>
                                        <td>{{ $subMenu->sub_menu_route }}</td>
                                        <td>{{ $subMenu->sub_menu_slug }}</td>
                                        <td>{{ $subMenu->sub_menu_position }}</td>
                                        <td>{{ $subMenu->menu_cat_status == 1 ? 'Active' : 'Inactive' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END card -->
            </div>
            <!-- END CONTAINER FLUID -->
        </div>
    </x-slot>
    @section('scripts')
        <script src="{{ asset('assets/plugins/jquery-datatable/media/js/jquery.dataTables.min.js') }}" type="text/javascript">
        </script>
        <script src="{{ asset('assets/plugins/jquery-datatable/extensions/TableTools/js/dataTables.tableTools.min.js') }}"
            type="text/javascript"></script>
        <script src="{{ asset('assets/plugins/jquery-datatable/media/js/dataTables.bootstrap.js') }}" type="text/javascript">
        </script>
        <script src="{{ asset('assets/plugins/jquery-datatable/extensions/Bootstrap/jquery-datatable-bootstrap.js') }}"
            type="text/javascript"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/datatables-responsive/js/datatables.responsive.js') }}">
        </script>
        <script type="text/javascript" src="{{ asset('assets/plugins/datatables-responsive/js/lodash.min.js') }}"></script>
        <!-- END VENDOR JS -->
        <!-- BEGIN PAGE LEVEL JS -->
        <script src="{{ asset('assets/js/datatables.js') }}" type="text/javascript"></script>
        <!-- END PAGE LEVEL JS -->

        @include('shared.custom-notify')

    @endsection
</x-app-layout>
