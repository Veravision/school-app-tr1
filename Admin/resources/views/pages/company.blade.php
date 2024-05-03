<x-app-layout>
    @section('styles')
    <link href="{{asset('assets/plugins/filepond/css/filepond.css')}}" rel="stylesheet"/>
    <link  href="{{asset('assets/plugins/filepond/css/filepond-image-preview.css')}}" rel="stylesheet"/>
    @endsection
    <x-slot:slot>
        <!-- registration form start -->
        <div class="container d-flex justify-content-center col-xl-8 col-lg-6">
            <!-- START card -->
            <div class="card">
                <div class="card-header ">
                    <div class="card-title">Company Registration.
                    </div>
                </div>
                <div class="card-body">
                    <h4 class="mw-80">Get started with an account.</h4>
                    <p class="fs-16 mw-80 m-b-40">Find your people. Engage your customers. Build your brand. Do it all
                        with Page's UI Framework Platform. Already have an account? <a href="#">Log in</a></p>
                    <form method="POST" action="{{ route('company.store') }}"  role="form" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        @include('shared.feedback')
                        <fieldset class="row g-3">
                            <legend><h5>Company Basic Infomation</h5></legend>
                            
                            <!--upload School Logo-->
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body p-4">
                                <h3 class="mb-4">Upload Company Logo</h3>
                                    <fieldset class="row g-3">
                                        <div class="col-md-6">
                                            <label for="input13" class="form-label">Select image:</lable>
                                             <div class="filepond" style = "width: 18rem !important;"></div>
                                            {{-- <input type="file" name="filepond" id=""> --}}
                                        </div>
                                    </fieldset>
                            </div>
                        </div>
                    </div>

                            <div class="row clearfix">
                                <div class="col-md-9">
                                    <div class="form-group form-group-default required">
                                        <label>Company Name</label>
                                        <input name="name" value="{{old('name')}}" type="text" class="form-control" required>
                                        @error('name')
                                            <div class="text-danger"><p>{{ $message }}</p></div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group form-group-default">
                                        <label>Abbreviation</label>
                                        <input name="abbreviation" value="{{old('abbreviation')}}" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Motto</label>
                                        <input type="text" class="form-control" name="motto" value="{{old('motto')}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>C.A.C. Registration Number</label>
                                        <input type="text" class="form-control" name="cac_number" value="{{old('cac_number')}}">
                                        @error('cac_number')
                                            <div class="text-danger"><p>{{ $message }}</p></div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default required">
                                        <label class="select-label">Industry</label>
                                        <select name="industry" id="" class="form-control form-select industry-list" required>
                                            <option selected disabled>Choose...</option>
                                            <option value="first" >first</option>
                                            <option value="second" >second</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                       
                        <fieldset class="row g-3">
                            <legend><h5>Contact Information</h5></legend>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default required">
                                        <label>Address</label>
                                        <textarea  name="address" class="form-control" placeholder="company street address" rows="5" style="resize: none" required> {{old('address')}} </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group form-group-default required">
                                        <label>Country</label>
                                        <select name="country" value="{{old('country')}}" id="country-list" class="form-control form-select country-list" required>
                                            <option selected disabled>Choose...</option>
                                            <option value="country1">country1</option>
                                            <option value="country2">country2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-group-default required">
                                        <label>City</label>
                                        <input type="text" class="form-control" name="city" value="{{old('city')}}" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-group-default">
                                        <label>zipcode</label>
                                        <input type="text" class="form-control" name="zip_code" value="{{old('zip_code')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group form-group-default required">
                                        <label>Phone Number</label>
                                         <input type="tel" class="form-control" name="phone_number" value="{{old('phone_number')}}" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="col-md-4  form-group-default required">
                                        <label>Office Number</label>
                                        <input type="tel" class="form-control" name="office_number" value="{{old('office_number')}}" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-group-default">
                                        <label for="phone">WhatsApp Number</label>
                                        <input type="tel" class="form-control" name="whatsapp_number" value="{{old('whatsapp_number')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default input-group required">
                                        <label>Mailing Address</label>
                                        <input type="email" class="form-control" name="email" value="{{old('email')}}" placeholder="desmond@address.com" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default input-group">
                                        <div class="form-input-group">
                                            <label>Instagram Handle</label>
                                                <input type="text" class="form-control" name="instagram_handle" value="{{old('instagram_handle')}}">
                                        </div>
                                        <div class="input-group-append ">
                                            <span class="input-group-text">@desmond</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default input-group">
                                        <div class="form-input-group">
                                            <label>Facebook Handle</label>
                                                <input type="text" class="form-control" name="facebook_link" value="{{old('facebook_link')}}">
                                        </div>
                                        <div class="input-group-append ">
                                            <span class="input-group-text">https://www.pagelink.com</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                       
                        <fieldset class="row g-3">
                            <legend><h5>Owner's Information</h5></legend>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default required">
                                        <label>First Name</label>
                                        <input name="owner_first_name" value="{{old('owner_first_name')}}" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default required">
                                        <label>Last Name</label>
                                        <input name="owner_last_name" value="{{old('owner_last_name')}}" type="text" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default required">
                                        <label>Phone Number</label>
                                        <input type="tel" class="form-control" name="owner_phone_number" value="{{old('owner_phone_number')}}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default input-group required">
                                        <label>Mailing Address</label>
                                        <input type="email" class="form-control" name="owner_email" value="{{old('owner_email')}}" placeholder="desmond@address.com" required>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        
                        <div class="row">
                            <div class="col-md-6">
                              <div class="form-group form-group-default form-check-group d-flex align-items-center">
                                <div class="form-check switch switch-lg success full-width right m-b-0">
                                  <input type="checkbox" id="switchSample" name="status" value="{{ 'status' == '' ? '0' : '1' }}">
                                  <label for="switchSample">Activate Operation Status</label>
                                </div>
                              </div>
                            </div>
                          </div>

                        <div class="clearfix"></div>
                        <div class="row m-t-25">
                            <div class="col-xl-6 p-b-10">
                                <p class="small-text hint-text">By clicking the "Register" button, you are creating
                                    an account, and you agree to the<a href="#">Terms of Use</a> and <a
                                        href="#">Privacy Policy</a>.</p>
                            </div>
                            <div class="col-xl-6">
                                <button aria-label="" class="btn btn-primary pull-right btn-lg btn-block w-100"
                                    type="submit">Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END card -->
        </div>
        <!-- end registration -->
    </x-slot:slot>
    @section('scripts')
        <script src="{{ asset('assets/js/form_layouts.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/js/industry.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/js/country.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
        <script src="{{asset('assets/plugins/filepond/filepond.min.js')}}"></script>
        <script src="{{asset('assets/plugins/filepond/filepond.jquery.js')}}"></script>
        <script src="{{asset('assets/plugins/filepond/filepond-image-preview.js')}}"></script>
        <script src="{{asset('assets/plugins/filepond/custom-filepond.js')}}"></script>
    @endsection
</x-app-layout>
