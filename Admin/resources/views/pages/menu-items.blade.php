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
                                        <div class="form-group form-group-default required">
                                            <label>Title</label>
                                            <input name="menu_title" value="{{ old('menu_title') }}" type="text"
                                                class="form-control" placeholder="Name of the menu">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group form-group-default required">
                                            <label>Route</label>
                                            <input name="menu_route" value="{{ old('menu_route') }}" type="text"
                                                class="form-control" placeholder="Request route">
                                        </div>
                                    </div>



                                    <div class="col-sm-6">
                                        <div class="form-group form-group-default required">
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
            @include('shared.feedback')
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
            {{-- Show Edit Form --}}
            <div class="container-fluid" id="display-menu-edit"></div>
            {{-- End Show Edit Form --}}
            <!-- START CONTAINER FLUID -->
            <div class=" container-fluid   container-fixed-lg">
                <div class="col-lg-9">
                    <!-- START card -->
                    <div class="card card-transparent">
                        <div class="card-header ">
                            <div class="card-title">Available Menus
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
                                        <th style="width:50%">Title</th>
                                        <th style="width:5%">Status</th>
                                        <th style="width:5%">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allMenu as $key => $menu)
                                        <tr data-row="{{$menu}}">
                                            <td>{{ $menu->menu_title }}</td>
                                            <td>{{ $menu->menu_status == 1 ? 'Active' : 'Inactive' }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ route('menu.item',['id'=> encrypt($menu->id)]) }}"
                                                        class="btn text-primary"><i class="pg-icon">settings</i></a>
                                                    <a href="#" class="btn text-warning" id="editForm"
                                                        onclick="ShowEditMenuForm('{{ $menu->id }}', '{{ $menu->menu_title }}', '{{ $menu->menu_route }}', '{{ $menu->menu_slug }}', '{{ $menu->menu_position }}', '{{ $menu->menu_status }}')"><i class="pg-icon">edit</i></a>
                                                    <a href="" class="btn text-danger" onclick="ComfirmMenuItemDelete('{{ $menu->id }}', '{{ $menu->menu_title }}')"><i class="pg-icon">trash</i></a>
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
                            <td>Status</td>
                            <td>${d[1]}</td>
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
                        console.log(tr.find('[data-row]'));


                        $(this).parents('tbody').find('.shown').removeClass('shown');
                        $('#detailedTable tbody tr').parents('tbody').find('.row-details').remove();

                        row.child(_format(['home', 'active'])).show();
                        tr.addClass('shown');
                        tr.next().addClass('row-details');
                    });
                }

                initDetailedViewTable();
            })(window.jQuery);
        </script>
        <script>

            // function for assigning edit values
            $(document).ready(() => {
                $('#display-menu-edit').hide();
            });
            // let menuContainer = document.querySelector('#display-menu-edit')
            // menuContainer.classList.add('d-none')
            let ShowEditMenuForm = (menuID, menuTitle, menuRoute, menuSlug, menuPosition, menuStatus) => {
                console.log(menuID, menuTitle, menuRoute, menuPosition, menuSlug, menuStatus);

                let FormMenu = `
                <form 
                    method="post"
                    action="{{ route('menu.item.update') }}"
                    role="form"
                    id = "edit-menu-form"
                    >
                    @csrf
                    <div id="feedback"></div>
                    <input type="hidden" value="${menuID}" name="menu_id" />
                    <div class="row g-2">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default required">
                                <label>Title</label>
                                <input name="menu_title" value="${menuTitle}" type="text"
                                    class="form-control" placeholder="Name of the menu">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group form-group-default required">
                                <label>Route</label>
                                <input name="menu_route" value="${menuRoute}" type="text"
                                    class="form-control" placeholder="Request route">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group form-group-default required">
                                <label>Slug</label>
                                <input name="menu_slug" value="${menuSlug}" type="text"
                                    class="form-control" placeholder="url">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group form-group-default">
                                <label>Menu Position</label>
                                <input type="number" value="${menuPosition}" name="menu_position" min="0" step="1"
                                    id="" class="form-control" placeholder="Position">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group form-group-default">
                                <label for="" class="select-label">Status</label>
                                <select name="menu_status" id="" class="form-control">
                                    <option value="1" ${(menuStatus == 1)?"selected":""}>Active</option>
                                    <option value="0" ${(menuStatus == 0)?"selected":""}>Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button aria-label="" type="button" class="btn btn-primary btn-cons" id="save-menu-btn">Save</button>
                    </div>
                </form> `;
                $('#display-menu-edit').show(1000)
                $('#display-menu-edit').empty()
                $('#display-menu-edit').append(`                <div class="col-lg-6 my-2 bg-white" id="editFormContainer">
                    <div class="card card-transparent">
                        <div class="card-header d-flex justify-content-between">
                            <div class="card-title">Edit Menu</div>
                            <a class="btn btn-link text-danger px-1 pt-0" style="border-radius: 0px; cursor: pointer;" onclick="$('#editFormContainer').hide();">x</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="" id="display-menu-edit-form"></div>
                    </div>
                </div>`)
                $('#display-menu-edit-form').empty();
                $('#display-menu-edit-form').append(FormMenu);

                $('#save-menu-btn').on('click', () => {
                    // alert("hello")
                    let url = $('form#edit-menu-form').attr('action')
                    let method = $('form#edit-menu-form').attr('method')
                    let FormData = $('form#edit-menu-form').serialize();
                    console.log(url, method, FormData);

                    $.ajax({
                        url: url,
                        type: method,
                        data: FormData,
                        success: (resp) => {
                            console.log(resp);
                            if (resp.status == 200) {
                                $('#feedback').empty();
                                $('#feedback').append(`
                                <div class="alert alert-success" alert>
                                    <h4 class="text-success">Success!</h4>
                                    <p>${resp.message}</p>
                                </div>
                                `);
                            }

                            if (resp.status == 422) {
                                $('#feedback').empty();
                                $('#feedback').append(
                                    `<div class="alert alert-error" alert><h4 class="text-danger">Error!</h4><ul id= 'error'></ul></div>`
                                    );
                                $.each(resp.error, function(i, v) {
                                    console.log(v);
                                    $('#error').append(`
                                                <li>${v}</li>
                                       `);
                                });
                            }
                        }
                    });

                });

            }

            let ComfirmMenuItemDelete = (menuId, menuTitle) => {
                console.log(menuId, menuTitle);
                let answer = confirm("Delete this menu item? " + menuTitle);
                if(answer == true){
                    var route ="{{ route('menu.item.delete', ':menuId') }}";
                    route = route.replace(':menuId',menuId);
                    window.location.href=route;
                   
                }
                
            }
        </script>

        @include('shared.custom-notify')
    @endsection
</x-app-layout>
