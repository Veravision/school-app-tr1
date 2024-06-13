<x-app-layout>
    <x-slot:slot>
        @section('styles')
            
        @endsection
        @include('shared.feedback')
        <!-- START CONTAINER FLUID -->
        <div class=" container-fluid   container-fixed-lg">
            <!-- START BREADCRUMB -->
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Blog</a></li>
                <li class="breadcrumb-item active">Tag</li>
            </ol>
            <!-- END BREADCRUMB -->
            <div class="row">
                <div class="col-xl-6 col-lg-6 ">
                    <div class="card card-transparent">
                        <div class="card-header">
                            <div class="card-title">
                                Validation
                            </div>
                        </div>
                        <div class="card-body">
                            <h3>Showcase and guide users with a<br>
                                better User Interface &amp; Experience.</h3>
                            <p>Forms are one of the most important components
                                <br> when it comes to a dashboard. Recognizing that fact, users are
                                <br> able work in a maximum content width.
                            </p>
                            <br>
                            <p class="small hint-text m-t-5">VIA senior product manager
                                <br> for UI/UX at REVOX
                            </p>
                            <button class="btn btn-primary btn-cons">More</button>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 ">
                    <!-- START card -->
                    <div class="card">
                        <div class="card-header ">
                            <div class="card-title">Create Tag.
                            </div>
                        </div>
                        <div class="card-body">
                            <h2 class="mw-80">Get started with tags.</h2>
                            <p class="fs-16 mw-80 m-b-40">Find your people. Engage your customers. Build your blog. Do
                                it all with tags.</p>
                            <form method="post" action="{{ route('post.tag.store') }}" id="form-personal"
                                role="form" autocomplete="off">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default required">
                                            <label>Title</label>
                                            <input type="text" class="form-control" name="title"
                                                value="{{ old('title') }}" placeholder="" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default required">
                                            <label>Meta Title</label>
                                            <input type="text" class="form-control" name="meta_title"
                                                value="{{ old('meta_title') }}" placeholder="" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default input-group required">
                                            <div class="form-input-group">
                                                <label>Slug</label>
                                                <input type="text" class="form-control" name="slug"
                                                    value="{{ old('slug') }}" placeholder="" required>
                                            </div>
                                            <div class="input-group-append ">
                                                <span class="input-group-text"> </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Content</label>
                                            <textarea name="content" class="form-control" rows="10" style="resize:none" placeholder="Add descritions" required>{{ old('content') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div
                                            class="form-group form-group-default form-check-group d-flex align-items-center">
                                            <div class="form-check switch switch-lg success full-width right m-b-0">
                                                <input type="checkbox" id="switchSample" name="status" value="1"
                                                    {{ old('status') == 1 ? 'checked' : '' }} selected>
                                                <label for="switchSample">Enable</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="row m-t-25">
                                    <div class="col-xl-6 p-b-10">
                                        <p class="small-text hint-text">By clicking the "Create!" button, you are
                                            creating a Tag, and you agree to Tags's <a href="#">Terms of Use</a>
                                            and <a href="#">Privacy Policy</a>.</p>
                                    </div>
                                    <div class="col-xl-4">
                                        <button aria-label="" class="btn btn-primary pull-right btn-lg btn-block w-100"
                                            type="submit">Create</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- END card -->
                </div>
            </div>
        </div>
        <!-- END CONTAINER FLUID -->

    </x-slot>
    @section('scripts')
        <!-- BEGIN PAGE LEVEL JS -->
        <script src="{{ asset('assets/js/form_layouts.js') }}" type="text/javascript"></script>
        {{-- <script src="{{ asset('assets/js/card.js') }}" type="text/javascript"></script> --}}
        <!-- END PAGE LEVEL JS -->
    @endsection
</x-app-layout>
