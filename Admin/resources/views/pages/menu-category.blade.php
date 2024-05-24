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
                            <h4 class="p-b-5"><span class="semi-bold">New</span> Menu Category</h4>
                        </div>

                        <div class="modal-body">
                            <p class="small-text">Create a new <b>menu category</b> using this form, make sure you fill
                                them all</p>

                            <form method="post" action="{{ route('menu.category.store') }}" role="form">
                                @csrf
                                @include('shared.feedback')
                                <div class="row g-2">
                                    <div class="col-sm-12">
                                        <div class="form-group form-group-default required">
                                            <label>Category Title</label>
                                            <input name="menu_category_title" value="{{ old('menu_category_title') }}"
                                                type="text" class="form-control" placeholder="Name of the category">
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group form-group-default required">
                                            <label>Menu</label>
                                            <select class="form-control" id="input30" name="menu_item">
                                                <option selected>Choose a menu</option>
                                                @foreach ($allMenuItem as $menu)
                                                    <option value="{{ $menu->id }}">
                                                        {{ $menu->menu_title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group form-group-default">
                                            <label>Position</label>
                                            <input type="number" name="menu_category_position" min="0"
                                                step="1" id=""
                                                value="{{ old('menu_category_position') }}" class="form-control"
                                                placeholder="Position">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group form-group-default">
                                            <label for="" class="select-label">Status</label>
                                            <select name="menu_category_status" id="" class="form-control">
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
                            <li class="breadcrumb-item active">Menu Category Records</li>
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
            <div class="container-fluid" id="display-menu-category-edit"></div>
            {{-- End Show Edit Form --}}
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
                                        class="pg-icon">add</i> Add Menu Category
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
                                    <th>S/N</th>
                                    <th>Title</th>
                                    <th>Menu</th>
                                    <th>Position</th>
                                    <th>Status</th>
                                    <th style="width:20%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allMenuCategory as $key => $category)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $category->menu_cat_title }}</td>
                                        <td>{{ $category->menu_id }}</td>
                                        <td>{{ $category->menu_cat_position }}</td>
                                        <td>{{ $category->menu_cat_status == 1 ? 'Active' : 'Inactive' }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="#" class="btn btn-warning" id=""
                                                    onclick="ShowEditMenuCategoryForm('{{ $category->id }}', '{{ $category->menu_cat_title }}', '{{ $category->menu_id }}', '{{ $category->menu_cat_position }}', '{{ $category->menu_cat_status }}')">Edit</a>
                                                <a href="" class="btn btn-danger" id=""
                                                    onclick="ComfirmMenuCategoryDelete('{{ $category->id }}', '{{ $category->menu_cat_title }}')">Delete</a>
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
            
             $(document).ready(() => {
                $('#display-menu-category-edit').hide()
            });
             // show  Edit Form: function for assigning edit values
            let ShowEditMenuCategoryForm = (categoryID, categoryTitle, menuItemID, categoryPosition, categoryStatus) => {
                console.log(categoryID, categoryTitle, menuId, categoryPosition, categoryStatus);

                let FormCategory = `
                <form method="post" action="{{ route('menu.category.update') }}" role="form"  id = "edit-menu-category-form">
                                            @csrf
                                            <div id="feedback"></div>
                                            <input type="hidden" value="${categoryID}" name="menu_category_id" />
                                            <div class="row g-2">
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default required">
                                                        <label>Menu</label>
                                                        <select class="form-control" id="menu_item_for_category"
                                                            name="menu_item">
                                                            <option selected disabled>Choose a menu</option>
                                                            @foreach ($allMenuItem as $menu)
                                                                    <option value="{{ $menu->id }}" 
                                                                        ${(menu->id == menuItemID )? 'selected' : 'disabled' }}>
                                                                        ${menu->menu_title }
                                                                    </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default required">
                                                        <label>Category Title</label>
                                                        <input name="menu_category_title"
                                                            value="${categoryTitle}" type="text" 
                                                            class="form-control" placeholder="Name of the category"
                                                            id="category-title-field"
                                                            >
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group form-group-default">
                                                        <label>Position</label>
                                                        <input type="number" name="menu_category_position"
                                                            min="0" step="1"
                                                            value="${categoryPosition}"
                                                            class="form-control" placeholder="Position"
                                                            id="category-level-field"
                                                            >
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group form-group-default">
                                                        <label for="" class="select-label">Status</label>
                                                        <select name="menu_category_status" id="category-status-field"
                                                            class="form-control">
                                                            <option value="1" ${(categoryStatus == 1)?"selected":""}>Active</option>
                                                            <option value="0" ${(categoryStatus == 0)?"selected":""}>Inactive</option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>
                                            <div>
                                                <button aria-label="" type="button" class="btn btn-primary btn-cons" id="save-menu-category-btn">Save</button>
                                            </div>
                                        </form> `;
                                        
                $('#display-menu-category-edit').show(1000)
                $('#display-menu-category-edit').empty()
                $('#display-menu-category-edit').append(FormCategory)

               /** $('#save-menu-category-btn').on('click', () => {
                    // alert("hello")
                    //Pass form data to route with method.
                    let url = $('form#edit-menu-category-form').attr('action')
                    let method = $('form#edit-menu-category-form').attr('method')
                    let FormData = $('form#edit-menu-category-form').serialize();
                    console.log(url, method, FormData);

                    //Bringing feedback messages in ajax to avaoid page reload.
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

                });*/

            }

            let ComfirmMenuCategoryDelete = (categoryId, categoryTitle) => {
                console.log(categoryId, categoryTitle);
                let answer = confirm("Delete this menu category? " + categoryTitle);
                if(answer == true){
                    var route ="{{ route('menu.category.delete', ':categoryId') }}";
                    route = route.replace(':categoryId',categoryId);
                    window.location.href = route;
                   
                }
                
            }
        </script>

        @include('shared.custom-notify')
    @endsection
</x-app-layout>
