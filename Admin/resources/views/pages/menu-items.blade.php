<x-app-layout>
    <x-slot:slot>
        @section('styles')
        <link href="{{asset('assets/plugins/jquery-datatable/media/css/dataTables.bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/plugins/jquery-datatable/extensions/FixedColumns/css/dataTables.fixedColumns.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/plugins/datatables-responsive/css/datatables.responsive.css')}}" rel="stylesheet" type="text/css" media="screen" />
        @endsection
                <!-- START PAGE CONTENT -->
                <div class="content ">
                    <!-- MODAL STICK UP  -->
                    <div class="modal fade stick-up" id="addNewAppModal" tabindex="-1" role="dialog" aria-labelledby="addNewAppModal" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header clearfix ">
                            <button aria-label="" type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-icon">close</i>
                            </button>
                            <h4 class="p-b-5"><span class="semi-bold">New</span> App</h4>
                          </div>
                          <div class="modal-body">
                            <p class="small-text">Create a new app using this form, make sure you fill them all</p>
                            <form role="form">
                              <div class="row">
                                <div class="col-sm-12">
                                  <div class="form-group form-group-default">
                                    <label>name</label>
                                    <input id="appName" type="text" class="form-control" placeholder="Name of your app">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-12">
                                  <div class="form-group form-group-default">
                                    <label>Description</label>
                                    <input id="appDescription" type="text" class="form-control" placeholder="Tell us more about it">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-6">
                                  <div class="form-group form-group-default">
                                    <label>Price</label>
                                    <input id="appPrice" type="text" class="form-control" placeholder="your price">
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="form-group form-group-default">
                                    <label>Notes</label>
                                    <input id="appNotes" type="text" class="form-control" placeholder="a note">
                                  </div>
                                </div>
                              </div>
                            </form>
                          </div>
                          <div class="modal-footer">
                            <button aria-label="" id="add-app" type="button" class="btn btn-primary  btn-cons">Add</button>
                            <button aria-label="" type="button" class="btn btn-cons" data-dismiss="modal">Close</button>
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
                            <li class="breadcrumb-item active">Data Tables</li>
                          </ol>
                          <!-- END BREADCRUMB -->
                          <div class="row">
                            <div class="col-xl-7 col-lg-6 ">
                              <!-- START card -->
                              <div class="full-height">
                                <div class="card-body text-center">
                                  <img class="image-responsive-height demo-mw-600" src="assets/img/demo/tables.jpg" alt="">
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
                                  <p>Sharing the same stylized design layout, these tables allow for the effective compilation and organization of data with easy access and maneuverability for users. </p>
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
                    <button aria-label="" id="show-modal" class="btn btn-primary btn-cons"><i class="pg-icon">add</i> Add row
                    </button>
                  </div>
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="card-body">
                <table class="table table-hover demo-table-dynamic table-responsive-block" id="tableWithDynamicRows">
                  <thead>
                    <tr>
                      <th>App name</th>
                      <th>Description</th>
                      <th>Price</th>
                      <th>Notes</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="v-align-middle">
                        <p>Hyperlapse</p>
                      </td>
                      <td class="v-align-middle">
                        <p>Description goes here</p>
                      </td>
                      <td class="v-align-middle">
                        <p>FREE</p>
                      </td>
                      <td class="v-align-middle">
                        <p>Notes go here</p>
                      </td>
                    </tr>
                    <tr>
                      <td class="v-align-middle">
                        <p>Facebook</p>
                      </td>
                      <td class="v-align-middle">
                        <p>Description goes here</p>
                      </td>
                      <td class="v-align-middle">
                        <p>FREE</p>
                      </td>
                      <td class="v-align-middle">
                        <p>Notes go here</p>
                      </td>
                    </tr>
                    <tr>
                      <td class="v-align-middle">
                        <p>Twitter</p>
                      </td>
                      <td class="v-align-middle">
                        <p>Description goes here</p>
                      </td>
                      <td class="v-align-middle">
                        <p>FREE</p>
                      </td>
                      <td class="v-align-middle">
                        <p>Notes go here</p>
                      </td>
                    </tr>
                    <tr>
                      <td class="v-align-middle">
                        <p>Foursquare</p>
                      </td>
                      <td class="v-align-middle">
                        <p>Description goes here</p>
                      </td>
                      <td class="v-align-middle">
                        <p>FREE</p>
                      </td>
                      <td class="v-align-middle">
                        <p>Notes go here</p>
                      </td>
                    </tr>
                    <tr>
                      <td class="v-align-middle">
                        <p>Angry Birds</p>
                      </td>
                      <td class="v-align-middle">
                        <p>Description goes here</p>
                      </td>
                      <td class="v-align-middle">
                        <p>FREE</p>
                      </td>
                      <td class="v-align-middle">
                        <p>Notes go here</p>
                      </td>
                    </tr>
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
    <script src="{{asset('assets/plugins/jquery-datatable/media/js/jquery.dataTables.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/plugins/jquery-datatable/extensions/TableTools/js/dataTables.tableTools.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/plugins/jquery-datatable/media/js/dataTables.bootstrap.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/plugins/jquery-datatable/extensions/Bootstrap/jquery-datatable-bootstrap.js')}}" type="text/javascript"></script>
    <script type="text/javascript" src="{{asset('assets/plugins/datatables-responsive/js/datatables.responsive.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/plugins/datatables-responsive/js/lodash.min.js')}}"></script>
    <!-- END VENDOR JS -->
    <!-- BEGIN PAGE LEVEL JS -->
    <script src="{{asset('assets/js/datatables.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS -->
    @endsection
</x-app-layout>