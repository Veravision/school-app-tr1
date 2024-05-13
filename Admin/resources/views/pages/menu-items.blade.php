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
                            <h4 class="p-b-5"><span class="semi-bold">New</span> Menu</h4>
                        </div>

                        <div class="modal-body">
                            <p class="small-text">Create a new <b>menu</b> using this form, make sure you fill them all
                            </p>

                            <form method="post" action="{{ route('menu.item.store') }}" role="form"
                                enctype="multipart/form-data">
                                @csrf
                                @include('shared.feedback')
                                <div class="row g-2">
                                    <div class="col-sm-12">
                                        <div class="form-group form-group-default">
                                            <label>Title</label>
                                            <input name="menu_title" value="{{ old('menu_title') }}" type="text"
                                                class="form-control" placeholder="Name of the menu">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group form-group-default">
                                            <label>Route</label>
                                            <input name="menu_route" value="{{ old('menu_route') }}" type="text"
                                                class="form-control" placeholder="Request route">
                                        </div>
                                    </div>



                                    <div class="col-sm-6">
                                        <div class="form-group form-group-default">
                                            <label>Slug</label>
                                            <input name="menu_slug" value="{{ old('menu_slug') }}" type="text"
                                                class="form-control" placeholder="url">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group form-group-default">
                                            <label>Menu Position</label>
                                            <input type="number" name="menu_position" min="0" step="1"
                                                id="" class="form-control" placeholder="Position">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group form-group-default">
                                            <label for="" class="select-label">Status</label>
                                            <select name="menu_status" id="" class="form-control">
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
                            <li class="breadcrumb-item active">Menu Records</li>
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
                <div class="col-lg-9">
                    <!-- START card -->
                    <div class="card card-transparent">
                        <div class="card-header ">
                            <div class="card-title">Table with Dynamic Rows
                            </div>
                            <div class="pull-right">
                                <div class="col-xs-12">
                                    <button aria-label="" id="show-modal" class="btn btn-primary btn-cons"><i
                                            class="pg-icon">add</i> Add menu
                                    </button>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="card-body">
                            <table
                                class="table table-hover demo-table-dynamic table-responsive-block  table-condensed table-detailed"
                                id="detailedTable">
                                <thead>
                                    <tr>
                                        {{-- <th  style="width:1%" class="text-center">S/N</th> --}}
                                        <th style="width:20%">Title</th>
                                        {{-- <th style="width:15%">Route</th> --}}
                                        {{-- <th style="width:15%">Slug</th> --}}
                                        {{-- <th style="width:2%" class="text-center">Position</th> --}}
                                        <th style="width:15%">Status</th>
                                        <th style="width:20%">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allMenu as $key => $menu)
                                        <tr>
                                            <td>{{ $menu->menu_title }}</td>
                                            {{-- <td>{{ $menu->menu_route }}</td> --}}
                                            {{-- <td>{{ $menu->menu_slug }}</td> --}}
                                            {{-- <td>{{ $menu->menu_position }}</td> --}}
                                            <td>{{ $menu->menu_status == 1 ? 'Active' : 'Inactive' }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{route('sub.menu')}}" class="btn btn-link text-primary">Setup Sub-menu</a>
                                                    {!! $menu->menu_status == 1 ? '<a href="" class="btn btn-danger">De-activate</a>' : '<a href="" class="btn btn-success">Activate</a>' !!}
                                                    <a href="" class="btn btn-warning">Edit</a>
                                                    <a href="" class="btn btn-danger">Trash</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END card -->
                </div>
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
        <script>
            (function($) {
                // Initialize a dataTable with collapsible rows to show more details
                var initDetailedViewTable = function() {

                    var _format = function(d) {
                        // `d` is the original data object for the row
                        console.log(d);
                        return `<table class="table table-inline">
                            <tr>
                            <td>Menu Name:</td> 
                            <td>${d[0]}</td>
                            </tr>
                            <tr> 
                            <td>PSDs included</td>
                            <td>USD 3000</td>
                            </tr>
                            <tr> 
                            <td>Extra info</td> 
                            <td>USD 2400</td>
                            </tr>
                            </table>`;
                    }


                    var table = $('#detailedTable');

                    table.DataTable({
                        "sDom": "t",
                        "scrollCollapse": true,
                        "paging": false,
                        "bSort": false
                    });

                    // Add event listener for opening and closing details
                    $('#detailedTable tbody').on('click', 'td:first-child', function() {
                        //var row = $(this).parent()
                        if ($(this).hasClass('shown') && $(this).next().hasClass('row-details')) {
                            $(this).removeClass('shown');
                            $(this).next().remove();
                            return;
                        }
                        var tr = $(this).closest('tr');
                        var row = table.DataTable().row(tr);

                        $(this).parents('tbody').find('.shown').removeClass('shown');
                        $('#detailedTable tbody tr').parents('tbody').find('.row-details').remove();

                        row.child(_format(row.data())).show();
                        tr.addClass('shown');
                        tr.next().addClass('row-details');
                    });
                }

                initDetailedViewTable();
            })(window.jQuery);
        </script>
        @include('shared.custom-notify')
    @endsection
</x-app-layout>
