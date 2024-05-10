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
            <!-- START JUMBOTRON -->
            <div class="jumbotron">
                <div class=" container-fluid   container-fixed-lg sm-p-l-0 sm-p-r-0">
                    <div class="inner">
                        <!-- START BREADCRUMB -->
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Menu</a></li>
                            <li class="breadcrumb-item active">Sub Menu Setup</li>
                        </ol>
                        <!-- END BREADCRUMB -->
                        <div class="row">
                            <div class="col-lg-6 ">
                                <!-- START card -->
                                <div class="full-height">
                                    <div class="card-body">
                                        {{-- cat creation --}}
                                        <p class="small-text">Create a new <b>menu category</b> using this form, make
                                            sure you fill them all</p>

                                        <form method="post" action="{{ route('menu.category.store') }}" role="form">
                                            @csrf
                                            @include('shared.feedback')
                                            <div class="row g-2">
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

                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default required">
                                                        <label>Category Title</label>
                                                        <input name="menu_category_title"
                                                            value="{{ old('menu_category_title') }}" type="text"
                                                            class="form-control" placeholder="Name of the category">
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group form-group-default">
                                                        <label>Position</label>
                                                        <input type="number" name="menu_category_position"
                                                            step="1" id=""
                                                            value="{{ old('menu_category_position') }}"
                                                            class="form-control" placeholder="Position">
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group form-group-default">
                                                        <label for="" class="select-label">Status</label>
                                                        <select name="menu_category_status" id=""
                                                            class="form-control">
                                                            <option value="1">Active</option>
                                                            <option value="0" selected>Inactive</option>
                                                        </select>

                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button aria-label="" type="submit"
                                                    class="btn btn-primary  btn-cons">Add</button>
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
                                                        <th style="width:40%">Level</th>
                                                        <th style="width:40%">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {{-- <tr>
                                                  <td class="v-align-middle semi-bold">
                                                    <p>First Tour</p>
                                                  </td>
                                                  <td class="v-align-middle"><a href="#" class="btn">United States</a><a href="#" class="btn">India</a>
                                                  </td>
                                                  <td class="v-align-middle">
                                                    <p>it is more then ONE nation/nationality as its...</p>
                                                  </td>
                                                  <td></td>
                                                </tr> --}}
                                                </tbody>
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

            <!-- START SUB MENU -->
            <div class="jumbotron mt-2">
                <div class=" container-fluid   container-fixed-lg sm-p-l-0 sm-p-r-0">
                    <div class="inner">
                        <div class="row">
                            <div class="col-lg-6 ">
                                <!-- START card -->
                                <div class="full-height">
                                    <div class="card-body">
                                        {{-- cat creation --}}
                                        <p class="small-text">Create a new <b>sub menu</b> using this form, make
                                            sure
                                            you fill them all</p>
                                            <form method="post" action="{{ route('sub.menu.store') }}" role="form">
                                                @csrf
                                                @include('shared.feedback')
                                                <div class="row g-2">
                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default required">
                                                            <label>Sub Menu Title</label>
                                                            <input name="sub_menu_title"
                                                                value="{{ old('sub_menu_title') }}" type="text"
                                                                class="form-control" placeholder="Name of the sub menu">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default required">
                                                            <label>Menu</label>
                                                            <select class="form-control" id="input30"
                                                                name="menu_item">
                                                                <option selected>Choose a menu</option>
                                                                @foreach ($allMenuItem as $menu)
                                                                    <option value="{{ $menu->id }}">
                                                                        {{ $menu->menu_title }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    {{-- categories are shown based on the the menu selected since each category are created under a particular mnenu --}}
                                                    <div class="col-sm-12 hidden">
                                                        <div class="form-group form-group-default">
                                                            <label>Menu Category</label>
                                                            <select class="form-control" id="input30"
                                                                name="menu_category">
                                                                <option selected>Choose a category</option>
                                                                {{-- @foreach ($allMenuCategory as $category)
                                                        <option value="{{$category->id}}">
                                                            {{$category->menu_cat_title}}
                                                        </option>
                                                        @endforeach --}}
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="form-group form-group-default requires">
                                                            <label>Route</label>
                                                            <input type="text" name="sub_menu__route"
                                                                step="1" id=""
                                                                value="{{ old('sub_menu__route') }}"
                                                                class="form-control" placeholder="Route">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group form-group-default required">
                                                            <label>Slug</label>
                                                            <input type="text" name="sub_menu__slug"
                                                                id="" value="{{ old('sub_menu__slug') }}"
                                                                class="form-control" placeholder="Slug">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="form-group form-group-default">
                                                            <label>Position</label>
                                                            <input type="number" name="sub_menu__position"
                                                                step="1" id=""
                                                                value="{{ old('sub_menu__position') }}"
                                                                class="form-control" placeholder="Position">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="form-group form-group-default">
                                                            <label for="" class="select-label">Status</label>
                                                            <select name="sub_menu__status" id=""
                                                                class="form-control">
                                                                <option value="1">Active</option>
                                                                <option value="0" selected>Inactive</option>
                                                            </select>

                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button aria-label="" type="submit"
                                                        class="btn btn-primary  btn-cons">Add</button>
                                                    <button type="reset" class="btn btn-cons">Reset</button>
                                                </div>
                                            </form>
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
                                                        <th style="width:40%">Level</th>
                                                        <th style="width:40%">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {{-- <tr>
                                                  <td class="v-align-middle semi-bold">
                                                    <p>First Tour</p>
                                                  </td>
                                                  <td class="v-align-middle"><a href="#" class="btn">United States</a><a href="#" class="btn">India</a>
                                                  </td>
                                                  <td class="v-align-middle">
                                                    <p>it is more then ONE nation/nationality as its...</p>
                                                  </td>
                                                  <td></td>
                                                </tr> --}}
                                                </tbody>
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
            <!-- END SUB MENU -->


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
