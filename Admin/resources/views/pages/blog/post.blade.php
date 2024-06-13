<x-app-layout>
    <x-slot:slot>
        @section('styles')
            <link href="{{ asset('assets/plugins/bootstrap-tag/bootstrap-tagsinput.css') }}" rel="stylesheet"
                type="text/css" />
            {{-- <link href="{{ asset('assets/plugins/dropzone/css/dropzone.css') }}" rel="stylesheet" type="text/css" /> --}}
            <link href="{{ asset('https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css') }}" rel="stylesheet" />
            <link href="{{ asset('assets/plugins/bootstrap-datepicker/css/datepicker3.css') }}" rel="stylesheet"
                type="text/css" media="screen">
            <link href="{{ asset('assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet"
                type="text/css" media="screen">
            <link href="{{ asset('assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet"
                type="text/css" media="screen">
            <link href="{{ asset('assets/plugins/jquery-datatable/media/css/dataTables.bootstrap.min.css') }}"
                rel="stylesheet" type="text/css" />
            <link
                href="{{ asset('assets/plugins/jquery-datatable/extensions/FixedColumns/css/dataTables.fixedColumns.min.css') }}"
                rel="stylesheet" type="text/css" />
            <link href="{{ asset('assets/plugins/datatables-responsive/css/datatables.responsive.css') }}" rel="stylesheet"
                type="text/css" media="screen" />
        @endsection
        @include('shared.feedback')

        <!-- START SECONDARY SIDEBAR MENU-->
        <nav class="secondary-sidebar">
            <div class=" m-b-20 m-l-30 m-r-10 d-sm-none d-md-block d-lg-block d-xl-block">
                <a href="#" class="btn btn-complete btn-block btn-primary btn-rounded"
                    onclick="displayContent('content1')">Create Post</a>
            </div>
            <p class="menu-title all-caps">Manage Post</p>
            <ul class="main-menu">
                <li class="active">
                    <a href="#" onclick="displayContent('content2')">
                        <span class="title"><i class="pg-icon">flag</i> Posts</span>
                        <span class="badge pull-right">15</span>
                    </a>
                </li>
                <li class="">
                    <a href="#" onclick="displayContent('content3')">
                        <span class="title"><i class="pg-icon">effects</i> Published</span>
                        <span class="badge pull-right">10</span>
                    </a>
                </li>
                <li>
                    <a href="#" onclick="displayContent('content4')">
                        <span class="title"><i class="pg-icon">edit</i> Draft</span>
                        <span class="badge pull-right">2</span>
                    </a>
                </li>
                <li>
                    <a href="#" onclick="displayContent('content5')">
                        <span class="title"><i class="pg-icon">email</i> Archived</span>
                        <span class="badge pull-right">10</span>
                    </a>
                </li>
                <li>
                    <a href="#" onclick="displayContent('content6')">
                        <span class="title"><i class="pg-icon">trash</i> Deleted</span>
                        <span class="badge pull-right">3</span>
                    </a>
                </li>
            </ul>
            <hr>
            <span class="title">
                <p class="menu-title m-t-20 all-caps">Manage Categories</p>
            </span>
            <div class="d-flex align-items-center justify-content-between mb-2 sub-menu no-padding">
                <div class="title-sm text-primary mb-0"><i class="pg-icon m-r-10">grid</i>Categories</div>
                <a href="#" class="btn btn-xs btn-icon btn-rounded btn-light active">
                    <span class="icon feather-icon" title="Add Category">
                        <i class="pg-icon">plus</i>
                    </span>
                </a>
            </div>
            <hr>
            <span class="title">
                <p class="menu-title m-t-20 all-caps">Manage Tags</p>
            </span>
            <div class="d-flex align-items-center justify-content-between mb-2 sub-menu no-padding">
                <div class="title-sm text-primary mb-0"><i class="pg-icon m-r-10">tag</i>Tags</div>
                <a href="#" class="btn btn-xs btn-icon btn-rounded btn-light active">
                    <span class="icon feather-icon" title="Add Tag">
                        <i class="pg-icon">plus</i>
                    </span>
                </a>
            </div>
        </nav>
        <!-- END SECONDARY SIDEBAR MENU -->
        <!-- START INNER CONTENTS -->
        <div class="inner-content full-height">
            <div id="default" class="padding-30 sm-padding-5 sm-m-t-15 m-t-50" style="display:block">
                <x-blog.display-all-post :getAllPosts='$allPosts' />
            </div>
            <div id="content1" style="display:none" class="sm-m-t-5 m-t-5">
                <x-blog.create-post :getAllCategories='$allCategories' :getAllTags='$allTags' />
            </div>
            <div id="content2" style="display:none" class="padding-30 sm-padding-5 sm-m-t-15 m-t-50">
                <h2>We Secured Your Line</h2>
                <p>Below is a sample page for your cart , Created using pages design UI Elementes</p>
                <p class="small hint-text">Below is a sample page for your cart , Created using pages design UI
                    Elementes</p>
            </div>
            <div id="content3" style="display:none" class="padding-30 sm-padding-5 sm-m-t-15 m-t-50">
                TinyMCE is the world's most customizable, and flexible, rich text editor.
            </div>
            <div id="content4" style="display:none" class="padding-30 sm-padding-5 sm-m-t-15 m-t-50">
                A featherweight download, TinyMCE can handle any challenge you throw at it.
            </div>
            <div id="content5" style="display:none" class="padding-30 sm-padding-5 sm-m-t-15 m-t-50">
                This is a full-featured editor demo. Please explore!
            </div>
            <div id="content6" style="display:none" class="padding-30 sm-padding-5 sm-m-t-15 m-t-50">
                Building an effective Dashboard User Interface Design
            </div>
        </div>
        <!-- END INNER CONTENTS -->

    </x-slot>

    @section('scripts')
        <script>
            function displayContent(contentID) {
                //alert("hello");
                document.getElementById('default').style.display = "none";
                //use tenary operator to determine what style to display for each element id selector
                var id = contentID;
                (id == "content1") ? document.getElementById('content1').style.display = "block": document.getElementById(
                    'content1').style.display = "none";
                (id == "content2") ? document.getElementById('content2').style.display = "block": document.getElementById(
                    'content2').style.display = "none";
                (id == "content3") ? document.getElementById('content3').style.display = "block": document.getElementById(
                    'content3').style.display = "none";
                (id == "content4") ? document.getElementById('content4').style.display = "block": document.getElementById(
                    'content4').style.display = "none";
                (id == "content5") ? document.getElementById('content5').style.display = "block": document.getElementById(
                    'content5').style.display = "none";
                (id == "content6") ? document.getElementById('content6').style.display = "block": document.getElementById(
                    'content6').style.display = "none";
            }
        </script>
        <!-- BEGIN PAGE LEVEL JS -->

        {{-- <script src="{{ asset('assets/plugins/jquery-menuclipper/jquery.menuclipper.js') }}"></script> --}}
        {{-- <script src="{{ asset('pages/js/pages.min.js') }}"></script> --}}
        {{-- <script src="{{ asset('pages/js/pages.email.js') }}" type="text/javascript"></script>  --}}
        <script src="{{ asset('assets/js/form_layouts.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/plugins/bootstrap-form-wizard/js/jquery.bootstrap.wizard.min.js') }}"
            type="text/javascript"></script>
        <script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
        <script src="{{ asset('assets/js/form_wizard.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/js/card.js') }}" type="text/javascript"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/dropzone/dropzone.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/bootstrap-tag/bootstrap-tagsinput.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/plugins/jquery-inputmask/jquery.inputmask.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}" type="text/javascript">
        </script>
        <script src="{{ asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
        <script src="{{ asset('assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.js') }}"></script>
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
        <script src="{{ asset('assets/js/datatables.js') }}" type="text/javascript"></script>
        {{-- <script src="{{ asset('assets/plugins/quill/quill.min.js') }}" type="text/javascript"></script> --}}
        <script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>        
        {{-- <script src="{{ asset('assets/plugins/bootstrap-typehead/typeahead.bundle.min.js') }}"></script> --}}
        {{-- <script src="{{ asset('assets/plugins/bootstrap-typehead/typeahead.jquery.min.js') }}"></script> --}}
        {{-- <script src="{{ asset('assets/plugins/handlebars/handlebars-v4.0.5.js') }}"></script> --}}
        <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
        <script>
            const quill = new Quill('#editor', {
                modules: {
                    syntax: true,
                    toolbar: '#toolbar-container',
                },
                theme: 'snow'
            });
        </script>
        <script src="{{ asset('assets/js/form_elements.js')}}" type="text/javascript"></script>
        <!-- END PAGE LEVEL JS -->
    @endsection
</x-app-layout>
