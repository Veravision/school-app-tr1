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
            @include('shared.feedback')
        <div class="mt-md-2">
            <!-- START JUMBOTRON -->
            <div class="jumbotron">
                <div class=" container-fluid   container-fixed-lg sm-p-l-0 sm-p-r-0">
                    <div class="inner">
                        <!-- START BREADCRUMB -->
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Menu</a></li>
                            <li class="breadcrumb-item active">Setup</li>
                        </ol>
                        <!-- END BREADCRUMB -->
                        <div class="row">
                            <div class="col-lg-6 ">
                                <!-- START card -->
                                <div class="full-height">
                                    <div class="card-body">
                                        {{-- cat creation --}}
                                        <p class="small-text" id="category-form-header"><b>Create a new menu category</b> using this form, make
                                            sure you fill them all</p>

                                        <form method="post" action="{{ route('menu.category.store') }}" role="form" id="category-form">
                                            @csrf

                                            <div class="hidden-field"></div>

                                            <div class="row g-2">
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default required">
                                                        <label>Menu</label>
                                                        <select class="form-control" id="menu_item_for_category"
                                                            name="menu_item">
                                                            <option selected disabled>Choose a menu</option>
                                                            @foreach ($allMenu as $menu)
                                                                @isset($menuItem)
                                                                    <option value="{{ $menu->id }}"
                                                                        {{ $menu->id == $menuItem->id ? 'selected' : 'disabled' }}>
                                                                        {{ $menu->menu_title }}
                                                                    </option>
                                                                @else
                                                                    <option value="{{ $menu->id }}">
                                                                        {{ $menu->menu_title }}
                                                                    </option>
                                                                @endisset
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default required">
                                                        <label>Category Title</label>
                                                        <input name="menu_category_title"
                                                            value="{{ old('menu_category_title') }}" type="text"
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
                                                            value="{{ old('menu_category_position') }}"
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
                                                            <option value="1">Active</option>
                                                            <option value="0" selected>Inactive</option>
                                                        </select>

                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <p id="create-category"></p>
                                                <button aria-label="" type="submit" class="btn btn-primary  btn-cons" id="btn-category">Add Category</button>
                                                <button type="reset" class="btn btn-cons">Reset</button>
                                            </div>
                                        </form>
                                        {{-- end cat --}}
                                    </div>
                                </div>
                                <!-- END card -->
                            </div>
                            <div class="col-xl-5 col-lg-6 ">
                                <!-- START card -->
                                <div class="card card-transparent">
                                    <div class="card-header ">
                                        <div class="card-title">Menu Category
                                        </div>
                                    </div>
                                    <div class="card-body"
                                        style="display: flex; flex-wrap: wrap; height: 250px; overflow:auto;">
                                        <div class="table-responsive">
                                            <table class="table table-striped" id="stripedTable">
                                                <thead class="">
                                                    <tr>
                                                        <!-- NOTE * : Inline Style Width For Table Cell is Required as it may differ from user to user
                                                                  Comman Practice Followed
                                                                  -->
                                                        <th style="width:10%">Category</th>
                                                        <th style="width:50%">Status</th>
                                                        {{-- <th style="width:40%">Level</th> --}}
                                                        <th style="width:40%">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="display-category"></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- END card -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END JUMBOTRON -->

            {{-- start sub menu menu --}}
            <section class="mt-2">
                <div class="jumbotron">
                    <div class="container-fluid">
                        <div class="inner">
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="fullheight">
                                        <div class="card">
                                            <div class="card-body">
                                                <p class="small-text">Create a new <b>sub menu</b> using this form, make
                                                    sure
                                                    you fill them all</p>

                                                <form method="post" action="{{ route('sub.menu.store') }}"
                                                    role="form">
                                                    @csrf

                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default required">
                                                            <label>Menu</label>
                                                            <select class="form-control" id="menu_item_for_category_2"
                                                                name="menu_item">
                                                                <option selected disabled>Choose a menu</option>
                                                                @foreach ($allMenu as $menu)
                                                                    @isset($menuItem)
                                                                        <option value="{{ $menu->id }}"
                                                                            {{ $menu->id == $menuItem->id ? 'selected' : 'disabled' }}>
                                                                            {{ $menu->menu_title }}
                                                                        </option>
                                                                    @else
                                                                        <option value="{{ $menu->id }}">
                                                                            {{ $menu->menu_title }}
                                                                        </option>
                                                                    @endisset
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    {{-- categories are shown based on the the menu selected since each category are created under a particular mnenu --}}
                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Menu Category</label>
                                                            <select class="form-control" id="input30"
                                                                name="menu_category">
                                                                <option selected>Choose a category</option>
                                                                <optgroup id="display-category-2" label="Category">
                                                                </optgroup>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row g-2">
                                                        <div class="col-sm-12">
                                                            <div class="form-group form-group-default required">
                                                                <label>Sub Menu Title</label>
                                                                <input name="sub_menu_title"
                                                                    value="{{ old('sub_menu_title') }}"
                                                                    type="text" class="form-control"
                                                                    placeholder="Name of the sub menu">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group form-group-default required">
                                                                <label>Route</label>
                                                                <input type="text" name="sub_menu_route"
                                                                    step="1" id=""
                                                                    value="{{ old('sub_menu_route') }}"
                                                                    class="form-control" placeholder="Route">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group form-group-default required">
                                                                <label>Slug</label>
                                                                <input type="text" name="sub_menu_slug"
                                                                    id=""
                                                                    value="{{ old('sub_menu_slug') }}"
                                                                    class="form-control" placeholder="Slug">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="form-group form-group-default">
                                                                <label>Position</label>
                                                                <input type="number" name="sub_menu_position"
                                                                    min="0" step="1"
                                                                    value="{{ old('sub_menu_position') }}"
                                                                    class="form-control" placeholder="Position">
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="form-group form-group-default">
                                                                <label for=""
                                                                    class="select-label">Status</label>
                                                                <select name="sub_menu_status" id=""
                                                                    class="form-control">
                                                                    <option value="1">Active</option>
                                                                    <option value="0" selected>Inactive</option>
                                                                </select>

                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button aria-label="" type="submit"
                                                            class="btn btn-primary  btn-cons">Add Sub Menu</button>
                                                        <button type="Reset" class="btn btn-cons">Reset</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            {{-- start sub menu --}}
            <!-- START CONTAINER FLUID -->
            <div class=" container-fluid   container-fixed-lg">
                <!-- START card -->
                <div class="card card-transparent">
                    <div class="card-header ">
                        <div class="card-title">Available Sub Menus
                        </div>
                        <div class="pull-right">
                            <div class="col-xs-12">
                                <input type="text" name="search-sub_menu"  value="" class="form-control" style="text-align:center" placeholder="Search here">
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover demo-table-dynamic table-responsive-block"
                            id="tableWithDynamicRows">
                            <thead>
                                <tr>
                                    <th style="width:5%">S/N</th>
                                    <th>Title</th>
                                    <th>Menu</th>
                                    <th>Menu Category</th>
                                    <th>Route</th>
                                    <th>Slug</th>
                                    <th>Position</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allSubMenu as $key => $subMenu)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $subMenu->sub_menu_title }}</td>
                                        <td>{{ $subMenu->menu_title }}</td>
                                        <td>{{ $subMenu->menu_cat_title }}</td>
                                        <td>{{ $subMenu->sub_menu_route }}</td>
                                        <td>{{ $subMenu->sub_menu_slug }}</td>
                                        <td>{{ $subMenu->sub_menu_position }}</td>
                                        <td>{{ $subMenu->sub_menu_status == 1 ? 'Active' : 'Inactive' }}</td>
                                        <td>
                                            <div class="">
                                                <a href="#" class="btn text-warning" id=""
                                                    onclick=""><i class="pg-icon">edit</i></a>
                                                <a href="" class="btn text-danger" id=""
                                                    onclick=""><i class="pg-icon">trash</i></a>
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
            let menu_item_for_category = document.querySelector("#menu_item_for_category")
            var get_category_tbody = document.querySelector("#display-category");
            
            let get_category = (value, uri) => {
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN" : $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: uri,
                    method: "post",
                    data: { menu_id: value},
                    success: (resp) => {
                        console.log("--resp--", resp);
                        if (resp.status == 200) {
                            display_category(resp.data);
                        }
                    }
                })
            }

            let display_category = async (data) => {
                if (data && data.length == 0) {
                        get_category_tbody.innerHTML = `<tr> <td colspan ="4" class="text-center"> No items found. </td> </tr>`;
                    }else{
                        get_category_tbody.innerHTML = "";
                        $.each(data, (i, v) => {
                            console.log("--RESP--", v);
        // <td>${(v.menu_cat_position == null)? "": v.menu_cat_position}</td>
                                get_category_tbody.innerHTML+= `<tr>
                                    <td>${v.menu_cat_title}</td>
                                    <td>${(v.menu_cat_status == 0)? "<span class='badge badge-warning'>Inactive</span>": "<span class='badge badge-success'>active</span>"}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a class="btn text-info" href="#"><i class="pg-icon">eye</i></a>
                                            <a class="btn text-warning" href="#" onclick = 'repopulate_category("${v.id}", "${v.menu_id}", "${v.menu_cat_title}", "${v.menu_cat_position}", "${v.menu_cat_status}")'><i class="pg-icon">pencil</i></a>
                                            <a class="btn text-danger" href="#" onclick='ComfirmMenuCategoryDelete("${v.id}", "${v.menu_cat_title}")'><i class="pg-icon">trash</i></a>
                                        </div>
                                    </td>
                                    </tr>`
                        });
                    }
            }

            // load event
            if (Number.isInteger(parseInt(menu_item_for_category.value))) {
                // alert(menu_item_for_category.value)
                let category = get_category(menu_item_for_category.value, "{{ route('fetch.category') }}")
            }
            // change event
            menu_item_for_category.addEventListener('change', () => {
                // alert(menu_item_for_category.value)
                let category = get_category(menu_item_for_category.value, "{{ route('fetch.category') }}")
            })

            // category dropdown for submenu form
            let menu_item_for_category2 = document.querySelector("#menu_item_for_category_2")
            var get_category_optgrp = document.querySelector("#display-category-2");
            
            let get_category_2 = (value, uri) => {
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN" : $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: uri,
                    method: "post",
                    data: { menu_id: value},
                    success: (resp) => {
                        console.log("--resp--", resp);
                        if (resp.status == 200) {
                            display_category_2(resp.data);
                        }
                    }
                })
            }

            let display_category_2 = async (data) => {
                if (data && data.length == 0) {
                        get_category_optgrp.innerHTML = `<option> No items found. </option>`;
                    }else{
                        get_category_optgrp.innerHTML = "";
                        $.each(data, (i, v) => {
                            console.log("--RESP--", v);
                            get_category_optgrp.innerHTML+= `<option value="${v.id}">${v.menu_cat_title}</option>`
                        });
                    }
            }

            // load event
            if (Number.isInteger(parseInt(menu_item_for_category2.value))) {
                // alert(menu_item_for_category.value)
                let category2 = get_category_2(menu_item_for_category2.value, "{{ route('fetch.category.submenu') }}")
            }
            // change event
            menu_item_for_category2.addEventListener('change', () => {
                // alert(menu_item_for_category.value)
                let category2 = get_category_2(menu_item_for_category2.value, "{{ route('fetch.category.submenu') }}")
            });

            // edit category form
            let repopulate_category = (id, menuID, categoryTitle, level, status) => {
                // prompt("hello");
                let CatForm = document.querySelector('#category-form .hidden-field')
                let category_title_field = document.querySelector('#category-title-field')
                let category_level_field = document.querySelector('#category-level-field')
                let category_status_field = document.querySelector('#category-status-field')
                let menu_item_for_category = document.querySelector('#menu_item_for_category')
                // console.log(category_status_field);
                let content = `
                <input type = "hidden" value="${id}" name="menu_category_id" />
                `;
                CatForm.innerHTML = content;
                category_title_field.value = categoryTitle
                category_level_field.value = level
                for (let index = 0; index < category_status_field.length; index++) {
                    let element = category_status_field[index];
                    if(element.value == status){
                        element.selected = true
                    }
                }

                for (let index = 0; index < menu_item_for_category.length; index++) {
                    let element = menu_item_for_category[index];
                    if(element.value == menuID){
                        element.selected = true;
                    }else{
                        element.disabled = true
                    }
                }

                document.querySelector('#btn-category').textContent = "Edit Category"
                document.querySelector('#category-form-header').innerHTML = "<b>Edit menu category</b> using this form, make sure you fill them all"
                document.getElementById('category-form').action="{{ route('menu.category.update') }}"
                document.querySelector('#create-category').innerHTML = "<a href='#' id='create-category-btn' onClick='set_category_form()'>Create Category &nbsp;</a>";
            }

            let set_category_form = () => {
                // alert("hello")
                empty_category_form();
                document.querySelector('#btn-category').textContent = "Add Category"
                document.querySelector('#category-form-header').innerHTML = "<b>Create a new menu category</b> using this form, make sure you fill them all"
                document.getElementById('category-form').action="{{ route('menu.category.store') }}"
                let menu_item_for_category = document.querySelector('#menu_item_for_category')
                $('#create-category-btn').remove();
                console.log("{{Route::currentRouteName()}}");

                if ("{{Route::currentRouteName() == 'sub.menu'}}") {
                    console.log("hello")
                    for (let index = 0; index < menu_item_for_category.length; index++) {
                        let element = menu_item_for_category[index];
                        element.disabled = false
                    }
                }
            }

            let empty_category_form = () => {
                let category_title_field = document.querySelector('#category-title-field')
                let category_level_field = document.querySelector('#category-level-field')
                let category_status_field = document.querySelector('#category-status-field')
                let menu_item_for_category = document.querySelector('#menu_item_for_category')

                category_title_field.value = "";
                category_level_field.value = "";
                for (let index = 0; index < category_status_field.length; index++) {
                    let element = category_status_field[index];
                    if(element.value == "0"){
                        element.selected = true
                    }
                }


            }

            let ComfirmMenuCategoryDelete = (categoryId, categoryTitle) => {
                console.log(categoryId, categoryTitle);
                let answer = confirm("Delete this menu category? " + categoryTitle);
                if(answer == true){
                    // alert('hello')
                    var route ="{{ route('menu.category.delete', ':categoryId') }}";
                    route = route.replace(':categoryId',categoryId);
                    window.location.href = route;
                }
                
            }
        </script>
        @include('shared.custom-notify')
    @endsection
</x-app-layout>
