 <!-- START card -->
 <div class="card card-transparent">
     <div class="card-body">
         <div class="row">
             <div class="col-lg-4" style="width: 100%; height: 100%">
                 <div id="card-linear-color" class="card card-default">
                     <div class="card-header  separator">
                         <div class="card-title">
                             <h5> Add New Post </h5>
                         </div>
                         <div class="card-controls">
                             <ul>
                                 <li><a href="#" class="card-collapse" data-toggle="collapse"><i
                                             class="card-icon card-icon-collapse"></i></a>
                                 </li>
                             </ul>
                         </div>
                     </div>
                     <div class="card-body">
                         <div class="">
                             <div class="">
                                 <!-- START CONTAINER FLUID -->
                                 <div class="container-fluid container-fixed-lg">
                                     <div id="rootwizard" class="m-t-50">
                                         <!-- Nav tabs -->
                                         <ul class="nav nav-tabs nav-tabs-linetriangle nav-tabs-separator nav-stack-sm"
                                             role="tablist" data-init-reponsive-tabs="dropdownfx">
                                             <li class="nav-item">
                                                 <a class="active d-flex align-items-center" data-bs-toggle="tab"
                                                     href="#tab1" data-bs-target="#tab1" role="tab"><i
                                                         class="material-icons fs-14 tab-icon">post_add</i>
                                                     <span>New Post</span></a>
                                             </li>
                                             <li class="nav-item">
                                                 <a class="d-flex align-items-center" data-bs-toggle="tab"
                                                     href="#tab2" data-bs-target="#tab2" role="tab"><i
                                                         class="material-icons fs-14 tab-icon">category</i>
                                                     <span>Add Categories</span></a>
                                             </li>
                                             <li class="nav-item">
                                                 <a class="d-flex align-items-center" data-bs-toggle="tab"
                                                     href="#tab3" data-bs-target="#tab3" role="tab"><i
                                                         class="material-icons fs-14 tab-icon">sell</i>
                                                     <span>Add Tags</span></a>
                                             </li>
                                             <li class="nav-item">
                                                 <a class="d-flex align-items-center" data-bs-toggle="tab"
                                                     href="#tab4" data-bs-target="#tab4" role="tab"><i
                                                         class="material-icons fs-14 tab-icon">done_all</i>
                                                     <span>Summary</span></a>
                                             </li>
                                         </ul>
                                         <!-- Tab panes -->
                                         <form method="post" action="" id="form-personal" role="form"
                                             autocomplete="off">
                                             @csrf
                                             <div class="tab-content">
                                                 <div class="tab-pane padding-20 sm-no-padding active" id="tab1">
                                                     {{-- begining of post content 1 --}}
                                                     <div class="row g-3">
                                                         <div class="col-md-8">
                                                             <div class="card card-body card-default">
                                                                 {{-- post title --}}
                                                                 <div class="p-x-0">
                                                                     <div
                                                                         class="form-group form-group-default required">
                                                                         <label>Title</label>
                                                                         <input type="text" class="form-control"
                                                                             name="title" value="{{ old('title') }}"
                                                                             placeholder="" required>
                                                                     </div>
                                                                 </div>
                                                                 {{-- post title ends here --}}
                                                                 {{-- post content --}}
                                                                 <div class="required">
                                                                     <label>Content</label>
                                                                     <!-- Create the editor container -->
                                                                     <div id="standalone-container">
                                                                         <div id="toolbar-container">
                                                                             <span class="ql-formats">
                                                                                 <select class="ql-font"></select>
                                                                                 <select class="ql-size"></select>
                                                                             </span>
                                                                             <span class="ql-formats">
                                                                                 <button class="ql-bold"></button>
                                                                                 <button class="ql-italic"></button>
                                                                                 <button class="ql-underline"></button>
                                                                                 <button class="ql-strike"></button>
                                                                             </span>
                                                                             <span class="ql-formats">
                                                                                 <select class="ql-color"></select>
                                                                                 <select class="ql-background"></select>
                                                                             </span>
                                                                             <span class="ql-formats">
                                                                                 <button class="ql-script"
                                                                                     value="sub"></button>
                                                                                 <button class="ql-script"
                                                                                     value="super"></button>
                                                                             </span>
                                                                             <span class="ql-formats">
                                                                                 <button class="ql-header"
                                                                                     value="1"></button>
                                                                                 <button class="ql-header"
                                                                                     value="2"></button>
                                                                                 <button class="ql-blockquote"></button>
                                                                                 <button class="ql-code-block"></button>
                                                                             </span>
                                                                             <span class="ql-formats">
                                                                                 <button class="ql-list"
                                                                                     value="ordered"></button>
                                                                                 <button class="ql-list"
                                                                                     value="bullet"></button>
                                                                                 <button class="ql-indent"
                                                                                     value="-1"></button>
                                                                                 <button class="ql-indent"
                                                                                     value="+1"></button>
                                                                             </span>
                                                                             <span class="ql-formats">
                                                                                 <button class="ql-direction"
                                                                                     value="rtl"></button>
                                                                                 <select class="ql-align"></select>
                                                                             </span>
                                                                             <span class="ql-formats">
                                                                                 <button class="ql-link"></button>
                                                                                 <button class="ql-image"></button>
                                                                                 <button class="ql-video"></button>
                                                                                 <button class="ql-formula"></button>
                                                                             </span>
                                                                             <span class="ql-formats">
                                                                                 <button class="ql-clean"></button>
                                                                             </span>
                                                                         </div>
                                                                         <div id="editor">
                                                                             <p>Hello World!</p>
                                                                             <p>Some initial
                                                                                 <strong>bold</strong>
                                                                                 text
                                                                             </p>
                                                                             <p><br /></p>
                                                                         </div>
                                                                     </div>
                                                                     <!--End editor container -->
                                                                 </div>
                                                                 {{-- post content ends here --}}
                                                             </div>
                                                         </div>
                                                         <div class="col-md-4">
                                                            <div class="row g-0">
                                                                <div class="col-12 accordion">
                                                                    <div class="card accordion-item bg-light">
                                                                        <div class="accordion-header">
                                                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                                Category
                                                                            </button>

                                                                          <div class="tools">
                                                                          </div>
                                                                        </div>
                                                                        <div class="card-body accordion-body" id="collapseOne">
                                                                            <div class="col">
                                                                            @forelse ($getAllCategories as $key => $category)
                                                                              <div class="form-check complete">
                                                                                <input type="checkbox" id="checkColorOpt1" name="category[]" value="{{ $category->id }}">
                                                                                <label for="checkColorOpt1">
                                                                                    {{ $category->title }}
                                                                                </label>
                                                                              </div>
                                                                            @empty
                                                                              <span>No Categories found...</span>
                                                                            @endforelse
                                                                            </div>
                                                                      </div>
                                                                      </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="card card-body card-default">
                                                                        {{-- tag section --}}
                                                                        <div class="">
                                                                            <h5>
                                                                                Add Tags
                                                                            </h5>
                                                                            <select id="multi" class="full-width select2-hidden-accessible" multiple="" tabindex="-1" aria-hidden="true" name="tags[]">
                                                                            @foreach ($getAllTags as $key => $tag)
                                                                              <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                                                                            @endforeach
                                                                            </select>
        
                                                                          </div>
                                                                        {{-- tag section ends here --}}
                                                                     </div>
                                                                </div>
                                                            </div>
                                                         </div>
                                                     </div>
                                                     {{-- end of post conten<div class="row g-3">
                                                        <div class="col">
                                                            <div class="card card-body">

                                                            </div>
                                                            <div class="card card-body"></div>
                                                        </div>
                                                    </div>t 1 --}}
                                                 </div>
                                                 <div class="tab-pane padding-20 sm-no-padding" id="tab2">
                                                     <div class="row row-same-height">
                                                         <div class="col-7 m-t-5 mx-auto">
                                                             <h6 class="text-secondary">Select
                                                                 Categories:</h6>
                                                             @foreach ($getAllCategories as $key => $category)
                                                                 <div class="">
                                                                     <input type="checkbox" name="category[]"
                                                                         value="{{ $category->id }}"
                                                                         class="form-check-input" id="">
                                                                     <label for="" class="form-check-label">
                                                                         <h5>{{ $category->title }}</h5>
                                                                     </label>
                                                                 </div>
                                                             @endforeach
                                                         </div>
                                                     </div>
                                                 </div>
                                                 <div class="tab-pane slide-left padding-20 sm-no-padding"
                                                     id="tab3">
                                                     <div class="row row-same-height">
                                                         <div class="col-md-7 b-r b-dashed b-grey ">
                                                             <div class="col-7 m-t-5 mx-auto">
                                                                 <h6 class="text-secondary">Select Tags:
                                                                 </h6>
                                                                 
                                                                     <div class="">
                                                                         <input type="checkbox" name="tagArray[]"
                                                                             value=""
                                                                             class="form-check-input" id="">
                                                                         <label for=""
                                                                             class="form-check-label">
                                                                             <h5>
                                                                             </h5>
                                                                         </label>
                                                                     </div>
                                                                 
                                                             </div>
                                                         </div>
                                                         <div class="col-md-5">
                                                             <div class="padding-30 sm-padding-5">
                                                                 <!-- START card -->
                                                                 <div class="card card-default">
                                                                     <div class="card-header ">
                                                                         <div class="card-title">Add Tag List</div>
                                                                         <div class="tools"></div>
                                                                     </div>
                                                                     <div class="card-body">
                                                                         <input class="tagsinput custom-tag-input"
                                                                             type="text"
                                                                             value="Amsterdam,Washington" />
                                                                         <input class="tagsinput custom-tag-input"
                                                                             type="text"
                                                                             value="johnsmith@pages.io,janesmith@pages.io" />
                                                                         <div
                                                                             class="form-group form-group-default required ">
                                                                             <label>Tags</label>
                                                                             <input name="tag_list"
                                                                                 class="tagsinput custom-tag-input"
                                                                                 type="text"
                                                                                 value="hello World, quotes, inspiration" />
                                                                         </div>
                                                                     </div>
                                                                 </div>
                                                                 <!-- END card -->
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                                 <div class="tab-pane padding-20 sm-no-padding mx-auto"
                                                     id="tab4">
                                                     <button aria-label="" type="submit"
                                                         class="btn btn-success btn-cons ronded">Save
                                                         Post</button>
                                                 </div>
                                                 <div
                                                     class="padding-20 sm-padding-5 sm-m-b-20 sm-m-t-20 bg-white clearfix">
                                                     <ul class="pager wizard no-style">
                                                         <li class="next">
                                                             <button aria-label=""
                                                                 class="btn btn-primary btn-cons btn-animated from-left pull-right"
                                                                 type="button">
                                                                 <span>Next</span>
                                                                 <span class="hidden-block">
                                                                     <i class="material-icons fs-16">category</i>
                                                                 </span>
                                                             </button>
                                                         </li>
                                                         <li class="next finish hidden">
                                                             <button aria-label=""
                                                                 class="btn btn-primary btn-cons btn-animated from-left pull-right"
                                                                 type="button">
                                                                 <span>Finish</span>
                                                                 <span class="hidden-block">
                                                                     <i class="material-icons fs-16">sell</i>
                                                                 </span>
                                                             </button>
                                                         </li>
                                                         <li class="previous first hidden">
                                                             <button aria-label=""
                                                                 class="btn btn-default btn-cons btn-animated from-left pull-right"
                                                                 type="button">
                                                                 <span>First</span>
                                                                 <span class="hidden-block">
                                                                     <i class="material-icons fs-16">sell</i>
                                                                 </span>
                                                             </button>
                                                         </li>
                                                         <li class="previous">
                                                             <button aria-label=""
                                                                 class="btn btn-default btn-cons btn-animated from-left pull-right"
                                                                 type="button">
                                                                 <span>Previous</span>
                                                                 <span class="hidden-block">
                                                                     <i class="material-icons fs-14">category</i>
                                                                 </span>
                                                             </button>
                                                         </li>
                                                     </ul>
                                                 </div>
                                             </div>
                                         </form>
                                     </div>
                                 </div>
                                 <!-- END CONTAINER FLUID -->
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- END card -->
