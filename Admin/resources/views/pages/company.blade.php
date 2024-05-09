<x-app-layout>
    @section('styles')
        <link href="{{ asset('assets/plugins/filepond/css/filepond.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/plugins/filepond/css/filepond-image-preview.css') }}" rel="stylesheet" />
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
                    <form method="POST" action="{{ route('company.store') }}" role="form" autocomplete="off"
                        enctype="multipart/form-data">
                        @csrf
                        @include('shared.feedback')
                        <fieldset class="row g-3">
                            <legend>
                                <h5>Company Basic Infomation</h5>
                            </legend>

                            <!--upload School Logo-->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body p-4">
                                        <h7 class="mb-4 card-title"> Company Logo</h7>
                                        <fieldset class="row g-3">
                                            <div class="col-md-6">
                                                <label class="form-label">Select image:</lable>
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
                                        <input name="name"
                                            value="{{ empty(old('name')) ? $companyRecord->name : old('name') }}"
                                            type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group form-group-default">
                                        <label>Abbreviation</label>
                                        <input name="abbreviation"
                                            value="{{ empty(old('abbreviation')) ? $companyRecord->abbreviation : old('abbreviation') }}"
                                            type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Motto</label>
                                        <input type="text" class="form-control" name="motto"
                                            value="{{ empty(old('motto')) ? $companyRecord->motto : old('motto') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>C.A.C. Registration Number</label>
                                        <input type="text" class="form-control" name="cac_number"
                                            value="{{ empty(old('cac_number')) ? $companyRecord->cac_number : old('cac_number') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default required">
                                        <label class="select-label">Industry</label>
                                        <select name="industry" id=""
                                            class="form-control form-select industry-list" required>
                                            <option selected disabled>Choose...</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="row g-3">
                            <legend>
                                <h5>Contact Information</h5>
                            </legend>
                            <div class="row" id="animateLineContent-4">
                                <div class="col-md-4">
                                    <div class="form-group required">
                                        <label for="phone">Phone Number<span class="text-danger">*</span></label>
                                        {{-- <input type="tel" class="form-control" name="phone_number" value="{{old('phone_number')}}" required> --}}
                                        <div class="input-group mb-3">
                                            <select name="phone_number_code"
                                                value="{{ empty(old('phone_number_code')) ? $companyRecord->phone_number_code : old('phone_number_code') }}"
                                                style="appearance: none;" class="input-group-text phone-code"
                                                id="basic-addon1">

                                            </select>
                                            <input type="text" class="form-control ph-number" name="phone_number"
                                                id="company-ph-number" placeholder=""
                                                value="{{ empty(old('phone_number')) ? $companyRecord->phone_number : old('phone_number') }}"
                                                aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group required">
                                        <label for="phone">Office Number<span class="text-danger">*</span></label>
                                        {{-- <input type="tel" class="form-control" name="phone_number" value="{{old('phone_number')}}" required> --}}
                                        <div class="input-group mb-3">
                                            <select name="office_number_code"
                                                value="{{ empty(old('office_number_code')) ? $companyRecord->office_number_code : old('office_number_code') }}"
                                                style="appearance: none;" class="input-group-text phone-code"
                                                id="basic-addon1">

                                            </select>
                                            <input type="text" class="form-control ph-number" name="office_number"
                                                value="{{ empty(old('office_number')) ? $companyRecord->office_number : old('office_number') }}"
                                                id="company-ph-number" placeholder="" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="phone">Whatsapp Number</label>
                                        {{-- <input type="tel" class="form-control" name="phone_number" value="{{old('phone_number')}}" required> --}}
                                        <div class="input-group mb-3">
                                            <select name="whatsapp_number_code"
                                                value="{{ empty(old('whatsapp_number_code')) ? $companyRecord->whatsapp_number_code : old('whatsapp_number_code') }}"
                                                style="appearance: none;" class="input-group-text phone-code"
                                                id="basic-addon1">

                                            </select>
                                            <input type="text" class="form-control ph-number"
                                                name="whatsapp_number"
                                                value="{{ empty(old('whatsapp_number')) ? $companyRecord->whatsapp_number : old('whatsapp_number') }}"
                                                id="company-ph-number" placeholder=""
                                                aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default required">
                                        <label>Address</label>
                                        <textarea name="address" class="form-control" placeholder="company street address" rows="5"
                                            style="resize: none" required> {{ empty(old('address')) ? $companyRecord->address : old('address') }} </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group form-group-default required">
                                        <label>Country</label>
                                        <select name="country" value="{{ old('country') }}" id="country-list"
                                            class="form-control form-select country-list" required>
                                            <option selected disabled>Choose...</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-group-default required">
                                        <label>City</label>
                                        <input type="text" class="form-control" name="city"
                                            value="{{ empty(old('city')) ? $companyRecord->city : old('city') }}"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-group-default">
                                        <label>zipcode</label>
                                        <input type="text" class="form-control" name="zip_code"
                                            value="{{ empty(old('zip_code')) ? $companyRecord->zip_code : old('zip_code') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group form-group-default input-group required">
                                        <label>Mailing Address</label>
                                        <input type="email" class="form-control" name="email"
                                            value="{{ empty(old('email')) ? $companyRecord->email : old('email') }}"
                                            placeholder="desmond@address.com" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default input-group">
                                        <div class="form-input-group">
                                            <label>Instagram Handle</label>
                                            <input type="text" class="form-control" name="instagram_handle"
                                                value="{{ empty(old('instagram_handle')) ? $companyRecord->instagram_handle : old('instagram_handle') }}">
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
                                            <input type="text" class="form-control" name="facebook_link"
                                                value="{{ empty(old('facebook_link')) ? $companyRecord->facebook_page : old('facebook_link') }}">
                                        </div>
                                        <div class="input-group-append ">
                                            <span class="input-group-text">https://www.pagelink.com</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="row g-3">
                            <legend>
                                <h5>Owner's Information</h5>
                            </legend>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default required">
                                        <label>First Name</label>
                                        <input name="owner_first_name"
                                            value="{{ empty(old('owner_first_name')) ? $companyRecord->owner_first_name : old('owner_first_name') }}"
                                            type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default required">
                                        <label>Last Name</label>
                                        <input name="owner_last_name"
                                            value="{{ empty(old('owner_last_name')) ? $companyRecord->owner_last_name : old('owner_last_name') }}"
                                            type="text" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default input-group required">
                                        <label>Mailing Address</label>
                                        <input type="email" class="form-control" name="owner_email"
                                            value="{{ empty(old('owner_email')) ? $companyRecord->owner_email : old('owner_email') }}"
                                            placeholder="desmond@address.com" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group required">
                                        <label for="phone">Phone Number<span class="text-danger">*</span></label>
                                        {{-- <input type="tel" class="form-control" name="phone_number" value="{{old('phone_number')}}" required> --}}
                                        <div class="input-group mb-3">
                                            <select name="owner_phone_number_code"
                                                value="{{ empty(old('owner_phone_number_code')) ? $companyRecord->owner_phone_number_code : old('owner_phone_number_code') }}"
                                                style="appearance: none;" class="input-group-text phone-code"
                                                id="basic-addon1">

                                            </select>
                                            <input type="text" class="form-control ph-number"
                                                name="owner_phone_number" id="company-ph-number" placeholder=""
                                                value="{{ empty(old('owner_phone_number')) ? $companyRecord->owner_phone_number : old('owner_phone_number') }}"
                                                aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-group-default form-check-group d-flex align-items-center">
                                    <div class="form-check switch switch-lg success full-width right m-b-0">
                                        <input type="checkbox" id="switchSample" name="status" value="1"
                                            {{ $companyRecord->status == 1 ? 'checked' : '' }}>
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
        <script src="{{ asset('assets/js/country-code.js') }}" type="text/javascript"></script>
        <script src="{{ asset('assets/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript">
        </script>
        <script src="{{ asset('assets/plugins/filepond/filepond.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/filepond/filepond.jquery.js') }}"></script>
        <script src="{{ asset('assets/plugins/filepond/filepond-image-preview.js') }}"></script>
        <script src="{{ asset('assets/plugins/filepond/custom-filepond.js') }}"></script>
        <script>
            let industry = $('.industry-list')
            // count=elmnt.length

            for (let index = 0; index < industry.length; index++) {
                let element = industry[index];
                console.log(element);
                $.each(industryArray, (i, v) => {
                    element.innerHTML +=
                        `<option ${v == "{!! $companyRecord->industry !!}"? 'selected':"" }  value="${v}">${v}</option>`
                });

            }
        </script>
        <script>
            $(document).ready(function(){
                            // console.log(countryList);
            let elmnt = $('.country-list')
            // count=elmnt.length
            for (let index = 0; index < elmnt.length; index++) {
                let element = elmnt[index];
                console.log(element);

                $.each(countryList, (i, v) => {
                    // console.log(h);
                    let selected = ""
                    
                    selected = "selected"
                    if ('{!! $companyRecord->country !!}' == v.name) {
                        element.innerHTML += `<option value="${v.name}"  ${selected}>${v.name}</option>`
                    }else if(v.code == "NG" && '{!! $companyRecord->country !!}' == ""){
                        element.innerHTML += `<option value="${v.name}" ${selected}>${v.name}</option>`
                    }else{
                        element.innerHTML += `<option value="${v.name}" >${v.name}</option>`
                    }
                    
                    
                });
            }
            })
        </script>
    @endsection
</x-app-layout>
