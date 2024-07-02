 @section('createpoststyles')
 @endsection
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
                         <form method="post" action="{{ route('post.store')}}" id="form-personal" role="form" autocomplete="off"
                             enctype="multipart/form-data">
                             @csrf
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
                                             <a class="d-flex align-items-center" data-bs-toggle="tab" href="#tab2"
                                                 data-bs-target="#tab2" role="tab"><i
                                                     class="material-icons fs-14 tab-icon">settings</i>
                                                 <span>Advanced Option</span></a>
                                         </li>
                                         <li class="nav-item">
                                             <a class="d-flex align-items-center" data-bs-toggle="tab" href="#tab3"
                                                 data-bs-target="#tab3" role="tab"><i
                                                     class="material-icons fs-14 tab-icon">query_stats</i>
                                                 <span>SEO</span></a>
                                         </li>
                                         <li class="nav-item">
                                             <a class="d-flex align-items-center" data-bs-toggle="tab" href="#tab4"
                                                 data-bs-target="#tab4" role="tab"><i
                                                     class="material-icons fs-14 tab-icon">publish</i>
                                                 <span>Publish</span></a>
                                         </li>
                                         <li class="nav-item">
                                            <button aria-label="" type="submit"
                                             class="btn btn-success btn-cons ronded">Save Post</button>
                                        </li>
                                     </ul>
                                     <!-- Tab panes-->
                                     <div class="tab-content">
                                         <div class="tab-pane padding-20 sm-no-padding active" id="tab1">
                                             {{-- begining of post content 1 --}}
                                             <div class="row g-3">
                                                 <div class="col-md-8">
                                                     <div class="card card-body card-default">
                                                         {{-- post title --}}
                                                         <div class="p-x-0">
                                                             <div class="form-group form-group-default required">
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
                                                                     <button class="accordion-button" type="button"
                                                                         data-bs-toggle="collapse"
                                                                         data-bs-target="#collapseOne"
                                                                         aria-expanded="true"
                                                                         aria-controls="collapseOne">
                                                                         Add Category
                                                                     </button>

                                                                     <div class="tools">
                                                                     </div>
                                                                 </div>
                                                                 <div class="card-body accordion-body"
                                                                     id="collapseOne">
                                                                     <div class="col">
                                                                         @forelse ($getAllCategories as $key => $category)
                                                                             <div class="complete mb-2">
                                                                                 <input type="checkbox"
                                                                                     id="checkColorOpt1"
                                                                                     name="category[]"
                                                                                     value="{{ $category->id }}">
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
                                                         <div class="col-12 accordion">
                                                             <div class="card accordion-item bg-light">
                                                                 <div class="accordion-header">
                                                                     <button class="accordion-button" type="button"
                                                                         data-bs-toggle="collapse"
                                                                         data-bs-target="#collapseTwo"
                                                                         aria-expanded="true"
                                                                         aria-controls="collapseTwo">
                                                                         Add Tags
                                                                     </button>

                                                                     <div class="tools">
                                                                     </div>
                                                                 </div>
                                                                 <div class="card-body accordion-body"
                                                                     id="collapseTwo">
                                                                     <div class="col">
                                                                         <select id="multi"
                                                                             class="full-width select2-hidden-accessible"
                                                                             multiple="" tabindex="-1"
                                                                             aria-hidden="true" name="tag[]">
                                                                             @foreach ($getAllTags as $key => $tag)
                                                                                 <option value="{{ $tag->id }}">
                                                                                     {{ $tag->title }}
                                                                                 </option>
                                                                             @endforeach
                                                                         </select>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                         <div class="col-12 accordion">
                                                             <div class="card accordion-item bg-light">
                                                                 <div class="accordion-header">
                                                                     <button class="accordion-button" type="button"
                                                                         data-bs-toggle="collapse"
                                                                         data-bs-target="#collapseThree"
                                                                         aria-expanded="true"
                                                                         aria-controls="collapseOne">
                                                                         Add Thumbnail
                                                                     </button>

                                                                     <div class="tools">
                                                                     </div>
                                                                 </div>
                                                                 <div class="card-body accordion-body"
                                                                     id="collapseThree">
                                                                     <div class="text-center">
                                                                         <fieldset class="row g-3">
                                                                             <div class="col-md-6">
                                                                                 <label class="form-label">Select
                                                                                     Image:</lable>
                                                                                     <div class="filepond"
                                                                                         style = "width: 18rem !important;">
                                                                                     </div>
                                                                             </div>
                                                                         </fieldset>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                         </div>

                                                     </div>
                                                 </div>
                                             </div>
                                             {{-- end of post conten --}}
                                         </div>
                                         <div class="tab-pane padding-20 sm-no-padding" id="tab2">
                                             <div class="row row-same-height border">
                                                 <div class="col-12 m-t-5 mx-auto">
                                                     <div class="card card-border">
                                                         <ul class="nav nav-tabs nav-tabs-simple justify-content-center"
                                                             role="tablist" data-init-reponsive-tabs="dropdownfx">
                                                             <li class="nav-item">
                                                                 <a class="active" data-bs-toggle="tab"
                                                                     role="tab" data-bs-target="#tabsettings"
                                                                     href="#">
                                                                     <i
                                                                         class="material-icons fs-14 tab-icon">settings</i>Post
                                                                     Settings</a>
                                                             </li>
                                                             <li class="nav-item">
                                                                 <a href="#" data-bs-toggle="tab"
                                                                     role="tab" data-bs-target="#tabsliderimage">
                                                                     <i
                                                                         class="material-icons fs-14 tab-icon">tune</i>Post
                                                                     Slider</a>
                                                             </li>
                                                             <li class="nav-item">
                                                                 <a class="disabled" href="#"
                                                                     data-bs-toggle="tab" role="tab"
                                                                     data-bs-target="#tabversionhistory">
                                                                     <i
                                                                         class="material-icons fs-14 tab-icon">edit_square</i>Version
                                                                     History</a>
                                                             </li>
                                                         </ul>
                                                         <div class="tab-content">
                                                             <div class="tab-pane active" id="tabsettings">
                                                                 <div class="col-lg-12">
                                                                     <div class="text-center pt-4">
                                                                         <p>
                                                                             <span class="semi-bold">POST
                                                                                 TYPE</span>&nbsp;
                                                                             <select name="post_type"
                                                                                 class="cs-select cs-skin-slide"
                                                                                 data-init-plugin="cs-select"
                                                                                 id="posttype"
                                                                                 onchange="showSlider()">
                                                                                 <option value="normal"
                                                                                     {{ old('type') == 'normal' ? 'selected' : '' }}>
                                                                                     Normal</option>
                                                                                 <option value="image"
                                                                                     {{ old('type') == 'image' ? 'selected' : '' }}>
                                                                                     Image</option>
                                                                                 <option value="video"
                                                                                     {{ old('type') == 'video' ? 'selected' : '' }}>
                                                                                     Video</option>
                                                                             </select>
                                                                         </p>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                             <div class="tab-pane" id="tabsliderimage">
                                                                 <div class="col-md-12" id="normal"
                                                                     style="display: block">
                                                                     <div class="text-center p-4">
                                                                         <h7>NO SLIDER ATTACHMENT!</h7>
                                                                     </div>
                                                                 </div>
                                                                 <div class="col-md-12" id="image"
                                                                     style="display: none">
                                                                     <div class="text-center mb-4 p-4">
                                                                         <fieldset class="row g-3">
                                                                             <div class="col-md-6">
                                                                                 <label class="form-label">Select
                                                                                     Image:</lable>
                                                                                     <div class="filepond"
                                                                                         style = "width: 18rem !important;"
                                                                                         multiple></div>
                                                                                     {{-- <input type="file" name="filepond" id=""> --}}
                                                                             </div>
                                                                         </fieldset>
                                                                     </div>
                                                                 </div>
                                                                 <div class="col-md-12" id="video"
                                                                     style="display: none">
                                                                     <div class="text-center mb-4 p-4">
                                                                         <fieldset class="row g-3">
                                                                             <div class="col-md-6">
                                                                                 <label class="form-label">Select
                                                                                     Video:</lable>
                                                                                     <video width="400"
                                                                                         height="200" controls>
                                                                                         <source src=""
                                                                                             id="video_here">
                                                                                         Your browser does not
                                                                                         support HTML5 video.
                                                                                     </video>

                                                                                     <input type="file"
                                                                                         name="file"
                                                                                         class="file_multi_video"
                                                                                         accept="video/*">
                                                                             </div>
                                                                         </fieldset>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                             <div class="tab-pane" id="tabversionhistory">
                                                                 <div class="row">
                                                                     <div class="col-lg-12">
                                                                         <p>VERSION HISTORY HERE.</p>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="tab-pane slide-left padding-20 sm-no-padding" id="tab3">
                                             <div class="row row-same-height mt-5">
                                                 <div class="col-7">
                                                     <div class="form-group form-group-default">
                                                         <label>Meta Title</label>
                                                         <input name="meta_title" value="{{ old('meta_title') }}"
                                                             type="text" class="form-control" placeholder="">
                                                     </div>
                                                     <div class="form-group form-group-default required">
                                                         <label>Slug</label>
                                                         <input name="slug" value="{{ old('slug') }}"
                                                             type="text" class="form-control" placeholder=""
                                                             required>
                                                     </div>
                                                     <div class="form-group form-group-default">
                                                         <label>Summary</label>
                                                         <textarea name="summary" class="form-control" placeholder="Summary description" rows="5"
                                                             style="resize: none"> {{ old('summary') }} </textarea>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="tab-pane padding-20 sm-no-padding mx-auto" id="tab4">
                                             <div class="row row-same-height">
                                                 <div class="col-md-6 b-r b-dashed b-primary ">
                                                     <div class="row text-center pt-4">
                                                         <div class="col-md-12">
                                                             <p>
                                                                 <span class="semi-bold">Author</span>&nbsp;
                                                                 <select name="author"
                                                                     class="cs-select cs-skin-slide"
                                                                     data-init-plugin="cs-select" id="author"
                                                                     onchange="showOtherUserAuthor()">
                                                                     <option value="self"
                                                                         {{ old('author') == 'self' ? 'selected' : '' }}>
                                                                         Self</option>
                                                                     <option value="others"
                                                                         {{ old('author') == 'others' ? 'selected' : '' }}>
                                                                         Others</option>
                                                                 </select>
                                                             </p>
                                                         </div>
                                                         <div class="col-md-12" id="otherUserAuthor"
                                                             style="display: none">
                                                             <p>
                                                                 <span class="semi-bold">Users</span>&nbsp;
                                                                 <input name='users-list-tags' class='users-list'
                                                                     value='abatisse2@nih.gov, Justinian Hattersley'>
                                                             </p>
                                                         </div>
                                                     </div>
                                                 </div>
                                                 <div class="col-md-6">
                                                     <div class="row text-center pt-4">
                                                         <div class="col-12">
                                                             <span class="semi-bold">Published</span>&nbsp;
                                                             <select name="published" class="cs-select cs-skin-slide"
                                                                 data-init-plugin="cs-select" id="published"
                                                                 onchange="showVisibilityPublishedDate()">
                                                                 <option value="disable"
                                                                     {{ old('published') == 'disable' ? 'selected' : '' }}>
                                                                     Disable</option>
                                                                 <option value="enable"
                                                                     {{ old('published') == 'enable' ? 'selected' : '' }}>
                                                                     Enable</option>
                                                             </select>
                                                         </div>
                                                     </div>
                                                     <div class="row pt-4">
                                                         <div class="col-12 text-center" id="visibility"
                                                             style="display: none">
                                                             <span class="semi-bold">Visibility</span>&nbsp;
                                                             <select name="visibility" class="cs-select cs-skin-slide"
                                                                 data-init-plugin="cs-select" id="visibility-input">
                                                                 <option value="private"
                                                                     {{ old('visibility') == 'private' ? 'selected' : '' }}>
                                                                     Private</option>
                                                                 <option value="public"
                                                                     {{ old('visibility') == 'public' ? 'selected' : '' }}>
                                                                     Public</option>
                                                             </select>
                                                         </div>
                                                     </div>
                                                     <div class="row pt-4">
                                                         <div class="col-12 text-center" id="publishedDate"
                                                             style="display: none">
                                                             <div
                                                                 class="form-group form-group-default input-group col-md-7 mx-2">
                                                                 <div class="form-input-group">
                                                                     <input type="email" class="form-control"
                                                                         placeholder="Pick a date"
                                                                         id="datepicker-component2">
                                                                 </div>
                                                                 <div class="input-group-append ">
                                                                     <span class="input-group-text"><i
                                                                             class="pg-icon">calendar</i></span>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="padding-20 sm-padding-5 sm-m-b-20 sm-m-t-20 bg-white clearfix">
                                             <ul class="pager wizard no-style">
                                                 <li class="next">
                                                     <button aria-label=""
                                                         class="btn btn-primary btn-cons btn-animated from-left pull-right"
                                                         type="button">
                                                         <span>Next</span>
                                                         <span class="hidden-block">
                                                             <i class="material-icons fs-16">settings</i>
                                                         </span>
                                                     </button>
                                                 </li>
                                                 <li class="next finish hidden">
                                                     <button aria-label=""
                                                         class="btn btn-primary btn-cons btn-animated from-left pull-right"
                                                         type="button">
                                                         <span>Finish</span>
                                                         <span class="hidden-block">
                                                             <i class="material-icons fs-16">query_stats</i>
                                                         </span>
                                                     </button>
                                                 </li>
                                                 <li class="previous first hidden">
                                                     <button aria-label=""
                                                         class="btn btn-default btn-cons btn-animated from-left pull-right"
                                                         type="button">
                                                         <span>First</span>
                                                         <span class="hidden-block">
                                                             <i class="material-icons fs-16">query_stats</i>
                                                         </span>
                                                     </button>
                                                 </li>
                                                 <li class="previous">
                                                     <button aria-label=""
                                                         class="btn btn-default btn-cons btn-animated from-left pull-right"
                                                         type="button">
                                                         <span>Previous</span>
                                                         <span class="hidden-block">
                                                             <i class="material-icons fs-14">settings</i>
                                                         </span>
                                                     </button>
                                                 </li>
                                             </ul>
                                         </div>
                                     </div>
                                 </div>
                                 <!-- END CONTAINER FLUID -->
                         </form>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- END card -->
 @section('createpostscripts')
     <script type="text/javascript">
         // event listener to show post slider 
         const postType = document.getElementById("posttype");
         postType.addEventListener("change", showSlider);

         //event listener to show other users as published author
         const publishedBy = document.getElementById("author");
         publishedBy.addEventListener("change", showOtherUserAuthor);

         // event listener to show visibility and published date
         const publish = document.getElementById("published");
         publish.addEventListener("change", showVisibilityPublishedDate);

         function showSlider(event) {
             const currentValue = event.target.value;
             //    console.log(currentValue);
             //    alert(currentValue);
             // document.getElementById('normal').style.display = "none";
             //use tenary operator to determine what style to display for each element id selector
             var id = currentValue;
             (id == "normal") ? document.getElementById('normal').style.display = "block": document.getElementById(
                 'normal').style.display = "none";
             (id == "image") ? document.getElementById('image').style.display = "block": document.getElementById(
                 'image').style.display = "none";
             (id == "video") ? document.getElementById('video').style.display = "block": document.getElementById(
                 'video').style.display = "none";
         }

         function showOtherUserAuthor(event) {
             const currentValue = event.target.value;
             //    console.log(currentValue);
             //    alert(currentValue);
             var author = currentValue;
             (author == "others") ? document.getElementById('otherUserAuthor').style.display = "block": document
                 .getElementById(
                     'otherUserAuthor').style.display = "none";
         }

         function showVisibilityPublishedDate(event) {
             const currentValue = event.target.value;
             //    console.log(currentValue);
             //    alert(currentValue);
             var publishedStatus = currentValue;
             if (publishedStatus == "enable") {
                 document.getElementById('visibility').style.display = "block";
                 document.getElementById('publishedDate').style.display = "block";
             } else {
                 document.getElementById('visibility-input').value = ""
                 document.getElementById('datepicker-component2').value = ""
                 document.getElementById('visibility').style.display = "none";
                 document.getElementById('publishedDate').style.display = "none";
             }
         }

         $(document).on("change", ".file_multi_video", function(evt) {
             var $source = $('#video_here');
             $source[0].src = URL.createObjectURL(this.files[0]);
             $source.parent()[0].load();
         });
     </script>
 @endsection
