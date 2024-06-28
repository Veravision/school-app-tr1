<x-app-layout>
    @section('styles')
        @yield('createpoststyles')
        <link href="{{ asset('assets/plugins/filepond/css/filepond.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/plugins/filepond/css/filepond-image-preview.css') }}" rel="stylesheet" />
    
        <link href="{{ asset('assets/plugins/bootstrap-tag/bootstrap-tagsinput.css') }}" rel="stylesheet"
            type="text/css" />
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

        <link rel="stylesheet" href="{{asset('assets/plugins/tagify/js/tagify.css')}}">
        <link rel="stylesheet" href="https://unpkg.com/@yaireo/dragsort/dist/dragsort.css" media="print" onload="this.media='all'">
        <style>

          /* second tagify style */
          section > .rightSide{
        position: sticky;
        top: 0;
        align-self: start;
    }

    .tagify{
        min-width:400px;
        max-width:600px;
        margin: 0 0 1em 0;
    }

    label{ cursor:pointer; }
    .disabled tags{
        max-width:none;
        min-width:0;
        border:0;
        display: none;
    }

    .disabled tags tag,
    .disabled tags div{ display:none !important; }

    .showOriginal tags + input,
    .showOriginal tags + textarea{
        position: initial !important;
        left: 0 !important;
        transform: none !important;
        width:100%; padding:6px; border:2px solid #999;
        margin-bottom: 1em;
        border-radius: 5px;
        background: #F1F1F1;
    }

    /* .tagify.readonlyMix > tag:not([readonly]) div::before{ background:#d3e2e2; } */

    .tagify__input .borderd-blue > div::before{ border:2px solid #8DAFFA; }

    header label[for="toggle__tagifyStyleSettings"]{
        margin-left: auto;
        font-size: 1.5em;
        line-height: 1;
        position: relative;
        animation: 1s settingsIconFrames 3;
    }

    header label[for="toggle__tagifyStyleSettings"]::before{
      content: '';
      position: absolute;
      z-index: -1;
      top: -2px;
      left: 0;
      width: 100%;
      height: 120%;
      border-radius: 50%;
      pointer-events: none;
      animation: 1s settingsIconShockwavesFrames 3;
    }

    @keyframes settingsIconFrames {
      30%{ transform: scale(1.2);  }
    }

    @keyframes settingsIconShockwavesFrames {
      0%{ transform: scale(.6); box-shadow: 0 0 10px 2px red; }
      90%{ transform: scale(10); box-shadow: 0 0 40px 2px yellow; }
      100%{ transform: scale(12); opacity:0; }
    }
    /*
    header label[for="toggle__tagifyStyleSettings"]::before{
      content: "☝";
      position: absolute;
      font-size: 3rem;
      left: -15px;
      top: .5em;
      pointer-events: none;
    }
    */
    #toggle__tagifyStyleSettings:checked + .tagifyStyleSettings{
        transform: none;
    }

    .tagifyStyleSettings > label[for="toggle__tagifyStyleSettings"]{
        float: right;
    }

    .tagifyStyleSettings{
        position: fixed;
        z-index: 999;
        top: 0;
        right: 0;
        background: black;
        padding: 1em;
        color: white;
        border-bottom-left-radius: 6px;
        transform: translatex(100.5%);
        transition: .45s cubic-bezier(.65,0,.35,1);
    }

    .tagifyStyleSettings > div{
        display: flex;
        align-items: center;
        margin: 5px 0;
    }

    .tagifyStyleSettings > div > span{
        flex: 1;
        margin-right:1em;
    }

    @media only screen and (max-device-width: 600px){
        body{
            font-size: 12px;
        }

        body > header {
            position: relative;
            top: 0;
            margin-bottom: 3em;
        }

        section{
            flex-flow: column-reverse;
        }

        section > .leftSide{
            padding: 1.5rem;
            width: auto;
        }

        .leftSide > header{
            padding-top: 0;
        }

        section > .rightSide{
            width: 100%;
            padding: 1.5em;
            background: white;
            border-bottom: 1px solid #CDE6FF;
        }

        .tagify{
            min-width: auto;
            width: 100%;
        }

        .rightSide > .demoLink {
            display: none;
        }

    }
          /* second tagify style */
        </style>
                    <style contenteditable>/* Suggestions items */
                        :root {
                            --tagify-dd-item-pad: .5em .7em;
                        }
                        
                        .tagify__dropdown.users-list .tagify__dropdown__item {
                            display: grid;
                            grid-template-columns: auto 1fr;
                            gap: 0 1em;
                            grid-template-areas: "avatar name"
                                "avatar email";
                        }
                        
                        .tagify__dropdown.users-list header.tagify__dropdown__item {
                            grid-template-areas: "add remove-tags"
                                "remaning .";
                        }
                        
                        .tagify__dropdown.users-list .tagify__dropdown__item:hover .tagify__dropdown__item__avatar-wrap {
                            transform: scale(1.2);
                        }
                        
                        .tagify__dropdown.users-list .tagify__dropdown__item__avatar-wrap {
                            grid-area: avatar;
                            width: 36px;
                            height: 36px;
                            border-radius: 50%;
                            overflow: hidden;
                            background: #EEE;
                            transition: .1s ease-out;
                        }
                        
                        .tagify__dropdown.users-list img {
                            width: 100%;
                            vertical-align: top;
                        }
                        
                        .tagify__dropdown.users-list header.tagify__dropdown__item>div,
                        .tagify__dropdown.users-list .tagify__dropdown__item strong {
                            grid-area: name;
                            width: 100%;
                            align-self: center;
                        }
                        
                        .tagify__dropdown.users-list span {
                            grid-area: email;
                            width: 100%;
                            font-size: .9em;
                            opacity: .6;
                        }
                        
                        .tagify__dropdown.users-list .tagify__dropdown__item__addAll {
                            border-bottom: 1px solid #DDD;
                            gap: 0;
                        }
                        
                        .tagify__dropdown.users-list .remove-all-tags {
                            grid-area: remove-tags;
                            justify-self: self-end;
                            font-size: .8em;
                            padding: .2em .3em;
                            border-radius: 3px;
                            user-select: none;
                        }
                        
                        .tagify__dropdown.users-list .remove-all-tags:hover {
                            color: white;
                            background: salmon;
                        }
                        
                        
                        /* Tags items */
                        .users-list .tagify__tag {
                            white-space: nowrap;
                        }
                        
                        .users-list .tagify__tag img {
                            width: 100%;
                            vertical-align: top;
                            pointer-events: none;
                        }
                        
                        
                        .users-list .tagify__tag:hover .tagify__tag__avatar-wrap {
                            transform: scale(1.6) translateX(-10%);
                        }
                        
                        .users-list .tagify__tag .tagify__tag__avatar-wrap {
                            width: 16px;
                            height: 16px;
                            white-space: normal;
                            border-radius: 50%;
                            background: silver;
                            margin-right: 5px;
                            transition: .12s ease-out;
                        }
                        
                        .users-list .tagify__dropdown__itemsGroup:empty {
                            display: none;
                        }
                        
                        .users-list .tagify__dropdown__itemsGroup::before {
                            content: attr(data-title);
                            display: inline-block;
                            font-size: .9em;
                            padding: 4px 6px;
                            margin: var(--tagify-dd-item-pad);
                            font-style: italic;
                            border-radius: 4px;
                            background: #00ce8d;
                            color: white;
                            font-weight: 600;
                        }
                        
                        .users-list .tagify__dropdown__itemsGroup:not(:first-of-type) {
                            border-top: 1px solid #DDD;
                        }</style>
        <script>
            // if IE, add IE tagify's polyfills
            !function( d ) {
                if( !d.currentScript ){
                    var s = d.createElement( 'script' );
                    s.src = '{{asset("assets/plugins/tagify/js/tagify.polyfills.min.js")}}';
                    d.head.appendChild( s );
                }
            }(document)
        </script>
        <script src="{{asset('assets/plugins/tagify/js/tagify.js')}}"></script>
        <script src="https://unpkg.com/@yaireo/dragsort"></script>
    @endsection
    <x-slot:slot>
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
                    <span class="icon feather-icon" title="Create Category">
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
                    <span class="icon feather-icon" title="Create Tag">
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
                <x-blog.create-post :getAllCategories='$allCategories' :getAllTags='$allTags' :getAllUsers='$allUsers' />
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
        <script src="{{ asset('assets/plugins/filepond/filepond.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/filepond/filepond.jquery.js') }}"></script>
        <script src="{{ asset('assets/plugins/filepond/filepond-image-preview.js') }}"></script>
        <script src="{{ asset('assets/plugins/filepond/custom-filepond.js') }}"></script>

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

<script>
    (function(){
    var inputElm = document.querySelector('input[name=users-list-tags]');

function tagTemplate(tagData) {
return `
    <tag title="${tagData.email}"
            contenteditable='false'
            spellcheck='false'
            tabIndex="-1"
            class="tagify__tag ${tagData.class ? tagData.class : ""}"
            ${this.getAttributes(tagData)}>
        <x title='' class='tagify__tag__removeBtn' role='button' aria-label='remove tag'></x>
        <div>
            <div class='tagify__tag__avatar-wrap'>
                <img onerror="this.style.visibility='hidden'" src="${tagData.avatar}">
            </div>
            <span class='tagify__tag-text'>${tagData.name}</span>
        </div>
    </tag>
`
}

function suggestionItemTemplate(tagData) {
return `
    <div ${this.getAttributes(tagData)}
        class='tagify__dropdown__item ${tagData.class ? tagData.class : ""}'
        tabindex="0"
        role="option">
        ${tagData.avatar ? `
            <div class='tagify__dropdown__item__avatar-wrap'>
                <img onerror="this.style.visibility='hidden'" src="${tagData.avatar}">
            </div>` : ''
    }
        <strong>${tagData.name}</strong>
        <span>${tagData.email}</span>
    </div>
`
}

function dropdownHeaderTemplate(suggestions) {
return `
    <header data-selector='tagify-suggestions-header' class="${this.settings.classNames.dropdownItem} ${this.settings.classNames.dropdownItem}__addAll">
        <strong style='grid-area: add'>${this.value.length ? `Add Remaning` : 'Add All'}</strong>
        <span style='grid-area: remaning'>${suggestions.length} members</span>
        <a class='remove-all-tags'>Remove all</a>
    </header>
`
}

// initialize Tagify on the above input node reference
var tagify = new Tagify(inputElm, {
tagTextProp: 'name', // very important since a custom template is used with this property as text
// enforceWhitelist: true,
skipInvalid: true, // do not remporarily add invalid tags
dropdown: {
    closeOnSelect: false,
    enabled: 0,
    classname: 'users-list',
    searchKeys: ['name', 'email']  // very important to set by which keys to search for suggesttions when typing
},
templates: {
    tag: tagTemplate,
    dropdownItem: suggestionItemTemplate,
    dropdownHeader: dropdownHeaderTemplate
},
whitelist: [
    {
        "value": 1,
        "name": "Justinian Hattersley",
        "avatar": "https://i.pravatar.cc/80?img=1",
        "email": "jhattersley0@ucsd.edu",
        "team": "A"
    },
    {
        "value": 2,
        "name": "Antons Esson",
        "avatar": "https://i.pravatar.cc/80?img=2",
        "email": "aesson1@ning.com",
        "team": "B"

    },
    {
        "value": 3,
        "name": "Ardeen Batisse",
        "avatar": "https://i.pravatar.cc/80?img=3",
        "email": "abatisse2@nih.gov",
        "team": "A"
    },
    {
        "value": 4,
        "name": "Graeme Yellowley",
        "avatar": "https://i.pravatar.cc/80?img=4",
        "email": "gyellowley3@behance.net",
        "team": "C"
    },
    {
        "value": 5,
        "name": "Dido Wilford",
        "avatar": "https://i.pravatar.cc/80?img=5",
        "email": "dwilford4@jugem.jp",
        "team": "A"
    },
    {
        "value": 6,
        "name": "Celesta Orwin",
        "avatar": "https://i.pravatar.cc/80?img=6",
        "email": "corwin5@meetup.com",
        "team": "C"
    },
    {
        "value": 7,
        "name": "Sally Main",
        "avatar": "https://i.pravatar.cc/80?img=7",
        "email": "smain6@techcrunch.com",
        "team": "A"
    },
    {
        "value": 8,
        "name": "Grethel Haysman",
        "avatar": "https://i.pravatar.cc/80?img=8",
        "email": "ghaysman7@mashable.com",
        "team": "B"
    },
    {
        "value": 9,
        "name": "Marvin Mandrake",
        "avatar": "https://i.pravatar.cc/80?img=9",
        "email": "mmandrake8@sourceforge.net",
        "team": "B"
    },
    {
        "value": 10,
        "name": "Corrie Tidey",
        "avatar": "https://i.pravatar.cc/80?img=10",
        "email": "ctidey9@youtube.com",
        "team": "A"
    },
    {
        "value": 11,
        "name": "foo",
        "avatar": "https://i.pravatar.cc/80?img=11",
        "email": "foo@bar.com",
        "team": "B"
    },
    {
        "value": 12,
        "name": "foo",
        "avatar": "https://i.pravatar.cc/80?img=12",
        "email": "foo.aaa@foo.com",
        "team": "A"
    },
],

transformTag: (tagData, originalData) => {
    var { name, email } = parseFullValue(tagData.name)
    tagData.name = name
    tagData.email = email || tagData.email
},

validate({ name, email }) {
    // when editing a tag, there will only be the "name" property which contains name + email (see 'transformTag' above)
    if (!email && name) {
        var parsed = parseFullValue(name)
        name = parsed.name
        email = parsed.email
    }

    if (!name) return "Missing name"
    if (!validateEmail(email)) return "Invalid email"

    return true
}
})

// The below code is printed as escaped, so please copy this function from:
// https://github.com/yairEO/tagify/blob/master/src/parts/helpers.js#L89-L97
function escapeHTML(s) {
return typeof s == 'string' ? s
    .replace(/&/g, "&amp;")
    .replace(/</g, "&lt;")
    .replace(/>/g, "&gt;")
    .replace(/"/g, "&quot;")
    .replace(/`|'/g, "&#039;")
    : s;
}

// The below part is only if you want to split the users into groups, when rendering the suggestions list dropdown:
// (since each user also has a 'team' property)
tagify.dropdown.createListHTML = sugegstionsList => {
const teamsOfUsers = sugegstionsList.reduce((acc, suggestion) => {
    const team = suggestion.team || 'Not Assigned';

    if (!acc[team])
        acc[team] = [suggestion]
    else
        acc[team].push(suggestion)

    return acc
}, {})

const getUsersSuggestionsHTML = teamUsers => teamUsers.map((suggestion, idx) => {
    if (typeof suggestion == 'string' || typeof suggestion == 'number')
        suggestion = { value: suggestion }

    var value = tagify.dropdown.getMappedValue.call(tagify, suggestion)

    suggestion.value = value && typeof value == 'string' ? escapeHTML(value) : value

    return tagify.settings.templates.dropdownItem.apply(tagify, [suggestion]);
}).join("")


// assign the user to a group
return Object.entries(teamsOfUsers).map(([team, teamUsers]) => {
    return `<div class="tagify__dropdown__itemsGroup" data-title="Team ${team}:">${getUsersSuggestionsHTML(teamUsers)}</div>`
}).join("")
}

// attach events listeners
tagify.on('dropdown:select', onSelectSuggestion) // allows selecting all the suggested (whitelist) items
  .on('edit:start', onEditStart)  // show custom text in the tag while in edit-mode

function onSelectSuggestion(e) {
if (e.detail.event.target.matches('.remove-all-tags')) {
    tagify.removeAllTags()
}

// custom class from "dropdownHeaderTemplate"
else if (e.detail.elm.classList.contains(`${tagify.settings.classNames.dropdownItem}__addAll`))
    tagify.dropdown.selectAll();
}

function onEditStart({ detail: { tag, data } }) {
tagify.setTagTextNode(tag, `${data.name} <${data.email}>`)
}

// https://stackoverflow.com/a/9204568/104380
function validateEmail(email) {
return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)
}

function parseFullValue(value) {
// https://stackoverflow.com/a/11592042/104380
var parts = value.split(/<(.*?)>/g),
    name = parts[0].trim(),
    email = parts[1]?.replace(/<(.*?)>/g, '').trim();

return { name, email }
}
    })()
</script>
        @yield('createpostscripts')
    @endsection
</x-app-layout>
