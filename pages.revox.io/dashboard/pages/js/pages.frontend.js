(function($) {

    'use strict';

    var Pages = function() {
        this.VERSION = "1.1.1";
        this.AUTHOR = "Revox";
        this.SUPPORT = "support@revox.io";

        this.pageScrollElement = 'html, body';
        this.$body = $('body');

        this.setUserOS();
        this.setUserAgent();
    }

    // Set environment vars
    Pages.prototype.setUserOS = function() {
        var OSName = "";
        if (navigator.appVersion.indexOf("Win") != -1) OSName = "windows";
        if (navigator.appVersion.indexOf("Mac") != -1) OSName = "mac";
        if (navigator.appVersion.indexOf("X11") != -1) OSName = "unix";
        if (navigator.appVersion.indexOf("Linux") != -1) OSName = "linux";

        this.$body.addClass(OSName);
    }

    Pages.prototype.setUserAgent = function() {
        if (navigator.userAgent.match(/Android|BlackBerry|iPhone|iPad|iPod|Opera Mini|IEMobile/i)) {
            this.$body.addClass('mobile');
        } else {
            this.$body.addClass('desktop');
            if (navigator.userAgent.match(/MSIE 9.0/)) {
                this.$body.addClass('ie9');
            }
        }
    }

    // Pages util functions
    Pages.prototype.isVisibleXs = function() {
        (!$('#pg-visible-xs').length) && this.$body.append('<div id="pg-visible-xs" class="visible-xs" />');
        return $('#pg-visible-xs').is(':visible');
    }

    Pages.prototype.isVisibleSm = function() {
        (!$('#pg-visible-sm').length) && this.$body.append('<div id="pg-visible-sm" class="visible-sm" />');
        return $('#pg-visible-sm').is(':visible');
    }

    Pages.prototype.isVisibleMd = function() {
        (!$('#pg-visible-md').length) && this.$body.append('<div id="pg-visible-md" class="visible-md" />');
        return $('#pg-visible-md').is(':visible');
    }

    Pages.prototype.isVisibleLg = function() {
        (!$('#pg-visible-lg').length) && this.$body.append('<div id="pg-visible-lg" class="visible-lg" />');
        return $('#pg-visible-lg').is(':visible');
    }

    Pages.prototype.getUserAgent = function() {
        return $('body').hasClass('mobile') ? "mobile" : "desktop";
    }

    Pages.prototype.setFullScreen = function(element) {
        // Supports most browsers and their versions.
        var requestMethod = element.requestFullScreen || element.webkitRequestFullScreen || element.mozRequestFullScreen || element.msRequestFullscreen;

        if (requestMethod) { // Native full screen.
            requestMethod.call(element);
        } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
            var wscript = new ActiveXObject("WScript.Shell");
            if (wscript !== null) {
                wscript.SendKeys("{F11}");
            }
        }
    }

    Pages.prototype.getColor = function(color, opacity) {
        opacity = parseFloat(opacity) || 1;

        var elem = $('.pg-colors').length ? $('.pg-colors') : $('<div class="pg-colors"></div>').appendTo('body');

        var colorElem = elem.find('[data-color="' + color + '"]').length ? elem.find('[data-color="' + color + '"]') : $('<div class="bg-' + color + '" data-color="' + color + '"></div>').appendTo(elem);

        var color = colorElem.css('background-color');

        var rgb = color.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
        var rgba = "rgba(" + rgb[1] + ", " + rgb[2] + ", " + rgb[3] + ', ' + opacity + ')';

        return rgba;
    }

    Pages.prototype.setBackgroundImage = function() {
        $('[data-pages-bg-image]').each(function() {
            var _elem = $(this)
            var defaults = {
                pagesBgImage: "",
                lazyLoad: 'true',
                progressType: '',
                progressColor:'',
                bgOverlay:'',
                bgOverlayClass:'',
                overlayOpacity:0,
            }
            var data = _elem.data();
            $.extend( defaults, data );
            var url = defaults.pagesBgImage;
            var color = defaults.bgOverlay;
            var opacity = defaults.overlayOpacity;

            var overlay = $('<div class="bg-overlay"></div>');
            overlay.addClass(defaults.bgOverlayClass);
            overlay.css({
                'background-color': color,
                'opacity': 1
            });
            _elem.append(overlay);

            var img = new Image();
            img.src = url;
            img.onload = function(){
                _elem.css({
                    'background-image': 'url(' + url + ')'
                });
                _elem.children('.bg-overlay').css({'opacity': opacity});
            }

        })
    }
    Pages.prototype.initRevealFooter = function() {
        var _elem = $('[data-pages="reveal-footer"]');
        setHeight();
        function setHeight(){
                var h = _elem.outerHeight();
                _elem.prev().css({
                     'margin-bottom':h
                })
        }
        $(window).resize(function(){
            setHeight();
        })
    }
    Pages.prototype.initFormGroupDefault = function() {
        $('.form-group.form-group-default').click(function() {
            $(this).find('input').focus();
        });
        $('body').on('focus', '.form-group.form-group-default :input', function() {
            $('.form-group.form-group-default').removeClass('focused');
            $(this).parents('.form-group').addClass('focused');
        });

        $('body').on('blur', '.form-group.form-group-default :input', function() {
            $(this).parents('.form-group').removeClass('focused');
            if ($(this).val()) {
                $(this).closest('.form-group').find('.control-label').addClass('fade');
            } else {
                $(this).closest('.form-group').find('.control-label').removeClass('fade');
            }
        });

        $('.form-group.form-group-default .checkbox, .form-group.form-group-default .radio').hover(function() {
            $(this).parents('.form-group').addClass('focused');
        }, function() {
            $(this).parents('.form-group').removeClass('focused');
        });
    }
    Pages.prototype.initTextRotator = function() {
        var defaults = {
            animation:"flipUp",
            separator:",",
            speed: 2000
        }
         $('[data-pages-init="text-rotate"]').each(function() {
            defaults = $(this).data();
            if (!$.fn.textrotator) return;
            $(this).textrotator(defaults);
         });
    }
    Pages.prototype.initAnimatables = function() {
        if (!$.fn.appear) return;
        $('[data-pages-animate="number"]').appear();
        $('[data-pages-animate="progressbar"]').appear();
        $('[data-pages-animate="number"]').on('appear', function() {
            $(this).animateNumbers($(this).attr("data-value"), true, parseInt($(this).attr("data-animation-duration")));
        });
        $('[data-pages-animate="progressbar"]').on('appear', function() {
            $(this).css('width', $(this).attr("data-percentage"));
        });
    }

    Pages.prototype.initAutoImageScroller = function() {
        //Scrolling Device Image : Showcase
        $('[data-pages="auto-scroll"]').each(function() {
            var y = 0; 
            var interval;
            var Screen = $(this).find('.iphone-border');
            var img = Screen.find('img');
            var endOfImage = false;
            var scroll = function() {
                var screenHeight = Screen.height();
                var swipeDistance = screenHeight / 2;

                if(y - swipeDistance <= -img.height() + screenHeight){
                    y = -img.height() + screenHeight;
                    endOfImage = true;
                } else {
                    y -= swipeDistance;
                }
                img.css({
                    'transform': 'translateY(' + y + 'px)'
                });
                if (endOfImage) {
                    y = 0;
                    clearInterval(interval);
                    setTimeout(function() {
                        img.css({
                            'transform': 'translateY(' + y + 'px)'
                        });
                        endOfImage = false;
                        interval = setInterval(scroll, 1000);
                    }, 2000);
                }
            }
            interval = setInterval(scroll, 1000);
        })
    }

    Pages.prototype.initUnveilPlugin = function() {
        // lazy load retina images
        $.fn.unveil && $("img").unveil();
    }

    // Call initializers
    Pages.prototype.init = function() {
        this.setBackgroundImage();
        this.initFormGroupDefault();
        this.initUnveilPlugin();
        this.initAnimatables();
        this.initAutoImageScroller();
        this.initTextRotator();
        this.initRevealFooter();
    }

    $.Pages = new Pages();
    $.Pages.Constructor = Pages;

})(window.jQuery);
/* ============================================================
 * Pages Header Plugin
 * ============================================================ */

(function($) {
    'use strict';

    var Header = function(element, options) {
        this.$body = $('body');
        this.$element = $(element);
        this.options = $.extend(true, {}, $.fn.header.defaults, options);
        if (this.$element.attr('data-pages-header') == "autoresize")
            this.options.autoresize = true

        if (this.$element.attr('data-pages-header') != null)
            this.options.minimizedClass = this.options.minimizedClass + ' ' + this.$element.attr('data-pages-resize-class');

        this.initAffix();
    }
    Header.prototype.initAffix = function() {
        if (this.$element.attr('data-pages-autofixed') == "true") {
            this.$element.affix({
                offset: {
                    top: this.$element.offset().top,
                }
            });
        }
    };
    Header.prototype.updateAffix = function() {
        if (this.$element.attr('data-pages-autofixed') == "true") {
            this.$element.removeData('affix').removeClass('affix affix-top affix-bottom');
            this.$element.affix({
                offset: this.$element.offset().top
            })
        }
    };
    Header.prototype.addMinimized = function() {
        if (this.options.autoresize && !this.$element.hasClass('affix-top'))
            if (!this.$element.hasClass(this.options.minimizedClass))
                this.$element.addClass(this.options.minimizedClass);
    };
    Header.prototype.removeMinized = function() {
        if (this.options.autoresize || this.$element.hasClass('affix-top'))
            this.$element.removeClass(this.options.minimizedClass);
    };

    function Plugin(option) {
        return this.each(function() {
            var $this = $(this);
            var data = $this.data('pg.header');
            var options = typeof option == 'object' && option;

            if (!data) $this.data('pg.header', (data = new Header(this, options)));
            if (typeof option == 'string') data[option]();
        })
    }

    var old = $.fn.header

    $.fn.header = Plugin
    $.fn.header.Constructor = Header


    $.fn.header.defaults = {
        duration: 350,
        autoresize: false,
        minimizedClass: 'minimized'
    }

    // HEADER NO CONFLICT
    // ====================

    $.fn.header.noConflict = function() {
        $.fn.header = old;
        return this;
    }

    // HEADER DATA API
    //===================
    $(document).ready(function() {
        $('.menu > li > a').each(function(){
            if($(this).attr("data-toggle") =="click"){
                $(this).on('click', function(e) {                    
                    openMenu($(this));
                });

                $(document).on("click", function(e){
                    if($('.menu').has(e.target).length == 0){
                        $('.menu > li').removeClass('open');   
                    }
                });
            }
            else{
                 $(this).on('mouseenter', function(e) {                    
                    openMenu($(this));
                });
                $('.desktop .menu > li > nav').on('mouseleave', function(e) {
                     $('.menu > li').removeClass('open');
                });
            }
        })
        function openMenu(el){
            if ($(el).parent().hasClass('mega')) {
                if ($(el).parent().hasClass('open')) {
                    $(el).parents('.container').removeClass('clip-mega-menu');
                } else {
                    $(el).parents('.container').addClass('clip-mega-menu');
                }

            } else {
                $(el).parents('.container').removeClass('clip-mega-menu');


            }
            $(el).parent().toggleClass('open').siblings().removeClass('open');
        }
    })

    $(window).on('load', function() {
        $('[data-pages="header"]').each(function() {
            var $header = $(this)
            $header.header($header.data())
        })
    });

    $('[data-pages="header-toggle"]').on('click touchstart', function(e) {
        e.preventDefault();
        var el = $(this)

        var header = el.attr('data-pages-element');
        $('body').toggleClass('menu-opened');
        $('[data-pages="header-toggle"]').toggleClass('on');

    });
    $(window).on("resize", function() {
        $('[data-pages="header"]').header('updateAffix');
    })
    $(window).on("scroll", function() {
        var ScrollTop = parseInt($(window).scrollTop());
        if (ScrollTop > 1) {
            $('[data-pages="header"]').header('addMinimized');
        } else {
            if (ScrollTop < 10) {
                $('[data-pages="header"]').header('removeMinized');
            }
        }
    });

})(window.jQuery);

/* ============================================================
 * Pages Parallax Plugin
 * ============================================================ */

(function($) {
    'use strict';
    // PARALLAX CLASS DEFINITION
    // ======================

    var Parallax = function(element, options) {
        this.$element = $(element);
        this.$body = $('body');
        this.options = $.extend(true, {}, $.fn.parallax.defaults, options);
        this.$coverPhoto = this.$element.find('.cover-photo');
        // TODO: rename .inner to .page-cover-content
        this.$content = this.$element.find('.inner');

        // if cover photo img is found make it a background-image
        if (this.$coverPhoto.find('> img').length) {
            var img = this.$coverPhoto.find('> img');
            this.$coverPhoto.css('background-image', 'url(' + img.attr('src') + ')');
            img.remove();
        }
        this.translateBgImage();
    }
    Parallax.VERSION = "1.0.0";

    Parallax.prototype.animate = function(translate) {

        var scrollPos;
        var pagecoverHeight = this.$element.height();
        //opactiy to text starts at 50% scroll length
        var opacityKeyFrame = pagecoverHeight * 50 / 100;
        var direction = 'translateX';

        scrollPos = $(window).scrollTop();
        if (this.$body.hasClass('mobile')) {
            scrollPos = -(translate);
        }
        direction = 'translateY';

        this.$coverPhoto.css({
            'transform': direction + '(' + scrollPos * this.options.speed.coverPhoto + 'px)'
        });

        this.$content.css({
            'transform': direction + '(' + scrollPos * this.options.speed.content + 'px)',
        });


        this.translateBgImage();


    }

    Parallax.prototype.translateBgImage = function() {
            var scrollPos = $(window).scrollTop();
            var pagecoverHeight = this.$element.height();
            if (this.$element.attr('data-pages-bg-image')) {
                var relativePos = this.$element.offset().top - scrollPos;

                // if element is in visible window's frame
                if (relativePos > -pagecoverHeight && relativePos <= $(window).height()) {
                    var displacePerc = 100 - ($(window).height() - relativePos) / ($(window).height() + pagecoverHeight) * 100;
                    this.$element.css({
                        'background-position': 'center ' + displacePerc + '%'
                    });
                }
            }
        }
        // PARALLAX PLUGIN DEFINITION
        // =======================
    function Plugin(option) {
        return this.each(function() {
            var $this = $(this);
            var data = $this.data('pg.parallax');
            var options = typeof option == 'object' && option;

            if (!data) $this.data('pg.parallax', (data = new Parallax(this, options)));
            if (typeof option == 'string') data[option]();
        })
    }

    var old = $.fn.parallax

    $.fn.parallax = Plugin
    $.fn.parallax.Constructor = Parallax


    $.fn.parallax.defaults = {
        speed: {
            coverPhoto: 0.3,
            content: 0.17
        }
    }

    // PARALLAX NO CONFLICT
    // ====================

    $.fn.parallax.noConflict = function() {
        $.fn.parallax = old;
        return this;
    }

    // PARALLAX DATA API
    //===================

    $(window).on('load', function() {

        $('[data-pages="parallax"]').each(function() {
            var $parallax = $(this)
            $parallax.parallax($parallax.data())
        })
    });

    $(window).on('scroll', function() {
        // Disable parallax for Touch devices

        $('[data-pages="parallax"]').parallax('animate');
    });

})(window.jQuery);
/* ============================================================
 * Pages Portlet
 * ============================================================ */

(function($) {
    'use strict';
    // PORTLET CLASS DEFINITION
    // ======================

    var Portlet = function(element, options) {
        this.$element = $(element);
        this.options = $.extend(true, {}, $.fn.portlet.defaults, options);
        this.$loader = null;
        this.$body = this.$element.find('.panel-body');
    }
    Portlet.VERSION = "1.0.0";
    // Button actions
    Portlet.prototype.collapse = function() {
        var icon = this.$element.find(this.options.collapseButton + ' > i');
        var heading = this.$element.find('.panel-heading');

        this.$body.stop().slideToggle("fast");

        if (this.$element.hasClass('panel-collapsed')) {
            this.$element.removeClass('panel-collapsed');
            icon.removeClass().addClass('pg-arrow_maximize');
            $.isFunction(this.options.onExpand) && this.options.onExpand();
            return
        }
        this.$element.addClass('panel-collapsed');
        icon.removeClass().addClass('pg-arrow_minimize');
        $.isFunction(this.options.onCollapse) && this.options.onCollapse();
    }

    Portlet.prototype.close = function() {
        this.$element.remove();
        $.isFunction(this.options.onClose) && this.options.onClose();
    }

    Portlet.prototype.maximize = function() {
        var icon = this.$element.find(this.options.maximizeButton + ' > i');

        if (this.$element.hasClass('panel-maximized')) {
            this.$element.removeClass('panel-maximized');
            icon.removeClass('pg-fullscreen_restore').addClass('pg-fullscreen');
            $.isFunction(this.options.onRestore) && this.options.onRestore();
        } else {
            this.$element.addClass('panel-maximized');
            icon.removeClass('pg-fullscreen').addClass('pg-fullscreen_restore');
            $.isFunction(this.options.onMaximize) && this.options.onMaximize();
        }
    }

    // Options
    Portlet.prototype.refresh = function(refresh) {
        var toggle = this.$element.find(this.options.refreshButton);

        if (refresh) {
            if (this.$loader && this.$loader.is(':visible')) return;
            if (!$.isFunction(this.options.onRefresh)) return; // onRefresh() not set
            this.$loader = $('<div class="portlet-progress"></div>');
            this.$loader.css({
                'background-color': 'rgba(' + this.options.overlayColor + ',' + this.options.overlayOpacity + ')'

            });

            var elem = '';
            if (this.options.progress == 'circle') {
                elem += '<div class="progress-circle-indeterminate progress-circle-' + this.options.progressColor + '"></div>';
            } else if (this.options.progress == 'bar') {

                elem += '<div class="progress progress-small">';
                elem += '    <div class="progress-bar-indeterminate progress-bar-' + this.options.progressColor + '"></div>';
                elem += '</div>';
            } else if (this.options.progress == 'circle-lg') {
                toggle.addClass('refreshing');
                var iconOld = toggle.find('> i').first();
                var iconNew;
                if (!toggle.find('[class$="-animated"]').length) {
                    iconNew = $('<i/>');
                    iconNew.css({
                        'position': 'absolute',
                        'top': iconOld.position().top,
                        'left': iconOld.position().left
                    });
                    iconNew.addClass('portlet-icon-refresh-lg-' + this.options.progressColor + '-animated');
                    toggle.append(iconNew);
                } else {
                    iconNew = toggle.find('[class$="-animated"]');
                }

                iconOld.addClass('fade');
                iconNew.addClass('active');


            } else {
                elem += '<div class="progress progress-small">';
                elem += '    <div class="progress-bar-indeterminate progress-bar-' + this.options.progressColor + '"></div>';
                elem += '</div>';
            }

            this.$loader.append(elem);
            this.$element.append(this.$loader);

            // Start Fix for FF: pre-loading animated to SVGs
            var _loader = this.$loader;
            setTimeout(function() {
                this.$loader.remove();
                this.$element.append(_loader);
            }.bind(this), 300);
            // End fix
            this.$loader.fadeIn();

            $.isFunction(this.options.onRefresh) && this.options.onRefresh();

        } else {
            var _this = this;
            this.$loader.fadeOut(function() {
                $(this).remove();
                if (_this.options.progress == 'circle-lg') {
                    var iconNew = toggle.find('.active');
                    var iconOld = toggle.find('.fade');
                    iconNew.removeClass('active');
                    iconOld.removeClass('fade');
                    toggle.removeClass('refreshing');

                }
                _this.options.refresh = false;
            });
        }
    }

    Portlet.prototype.error = function(error) {
        if (error) {
            var _this = this;
            this.$element.pgNotification({
                style: 'bar',
                message: error,
                position: 'top',
                timeout: 0,
                type: 'danger',
                onShown: function() {
                    _this.$loader.find('> div').fadeOut()
                },
                onClosed: function() {
                    _this.refresh(false)
                }
            }).show();
        }
    }

    // PORTLET PLUGIN DEFINITION
    // =======================

    function Plugin(option) {
        return this.each(function() {
            var $this = $(this);
            var data = $this.data('pg.portlet');
            var options = typeof option == 'object' && option;

            if (!data) $this.data('pg.portlet', (data = new Portlet(this, options)));
            if (typeof option == 'string') data[option]();
            else if (options.hasOwnProperty('refresh')) data.refresh(options.refresh);
            else if (options.hasOwnProperty('error')) data.error(options.error);
        })
    }

    var old = $.fn.portlet

    $.fn.portlet = Plugin
    $.fn.portlet.Constructor = Portlet


    $.fn.portlet.defaults = {
        progress: 'circle',
        progressColor: 'master',
        refresh: false,
        error: null,
        overlayColor: '255,255,255',
        overlayOpacity: 0.8,
        refreshButton: '[data-toggle="refresh"]',
        maximizeButton: '[data-toggle="maximize"]',
        collapseButton: '[data-toggle="collapse"]',
        closeButton: '[data-toggle="close"]'

        // onRefresh: function() {},
        // onCollapse: function() {},
        // onExpand: function() {},
        // onMaximize: function() {},
        // onRestore: function() {},
        // onClose: function() {}
    }

    // PORTLET NO CONFLICT
    // ====================

    $.fn.portlet.noConflict = function() {
        $.fn.portlet = old;
        return this;
    }

    // PORTLET DATA API
    //===================

    $(document).on('click.pg.portlet.data-api', '[data-toggle="collapse"]', function(e) {
        var $this = $(this);
        var $target = $this.closest('.panel');
        if ($this.is('a')) e.preventDefault();
        $target.data('pg.portlet') && $target.portlet('collapse');
    })

    $(document).on('click.pg.portlet.data-api', '[data-toggle="close"]', function(e) {
        var $this = $(this);
        var $target = $this.closest('.panel');
        if ($this.is('a')) e.preventDefault();
        $target.data('pg.portlet') && $target.portlet('close');
    })

    $(document).on('click.pg.portlet.data-api', '[data-toggle="refresh"]', function(e) {
        var $this = $(this);
        var $target = $this.closest('.panel');
        if ($this.is('a')) e.preventDefault();
        $target.data('pg.portlet') && $target.portlet({
            refresh: true
        })
    })

    $(document).on('click.pg.portlet.data-api', '[data-toggle="maximize"]', function(e) {
        var $this = $(this);
        var $target = $this.closest('.panel');
        if ($this.is('a')) e.preventDefault();
        $target.data('pg.portlet') && $target.portlet('maximize');
    })

    $(window).on('load', function() {
        $('[data-pages="portlet"]').each(function() {
            var $portlet = $(this)
            $portlet.portlet($portlet.data())
        })
    })

})(window.jQuery);
/* ============================================================
 * Pages Cards
 * ============================================================ */

(function($) {
    'use strict';
    // CARDS CLASS DEFINITION
    // ======================

    var Card = function(element, options) {
        this.$element = $(element);
        this.options = $.extend(true, {}, $.fn.card.defaults, options);
        this.$loader = null;
        this.$body = this.$element.find('.card-block');
    }
    Card.VERSION = "1.0.0";
    // Button actions
    Card.prototype.collapse = function() {
        var icon = this.$element.find(this.options.collapseButton + ' > i');
        var heading = this.$element.find('.card-header');

        this.$body.stop().slideToggle("fast");

        if (this.$element.hasClass('card-collapsed')) {
            this.$element.removeClass('card-collapsed');
            icon.removeClass().addClass('pg-arrow_maximize');
            $.isFunction(this.options.onExpand) && this.options.onExpand(this);
            return
        }
        this.$element.addClass('card-collapsed');
        icon.removeClass().addClass('pg-arrow_minimize');
        $.isFunction(this.options.onCollapse) && this.options.onCollapse(this);
    }

    Card.prototype.close = function() {
        this.$element.remove();
        $.isFunction(this.options.onClose) && this.options.onClose(this);
    }

    Card.prototype.maximize = function() {
        var icon = this.$element.find(this.options.maximizeButton + ' > i');

        if (this.$element.hasClass('card-maximized')) {
            this.$element.removeClass('card-maximized');
            this.$element.attr('style','');
            icon.removeClass('pg-fullscreen_restore').addClass('pg-fullscreen');
            $.isFunction(this.options.onRestore) && this.options.onRestore(this);
        } else {
            var sidebar = $('[data-pages="sidebar"]');
            var header = $('.header');
            var sidebarWidth = 0;
            if(sidebar){
              sidebarWidth = sidebar.position().left + sidebar.width();
            }
            var headerHeight = header.height();

            this.$element.addClass('card-maximized');
            this.$element.css('left', sidebarWidth);
            this.$element.css('top', headerHeight);

            icon.removeClass('pg-fullscreen').addClass('pg-fullscreen_restore');
            $.isFunction(this.options.onMaximize) && this.options.onMaximize(this);
        }
    }

    // Options
    Card.prototype.refresh = function(refresh) {
        var toggle = this.$element.find(this.options.refreshButton);

        if (refresh) {
            if (this.$loader && this.$loader.is(':visible')) return;
            if (!$.isFunction(this.options.onRefresh)) return; // onRefresh() not set
            this.$loader = $('<div class="card-progress"></div>');
            this.$loader.css({
                'background-color': 'rgba(' + this.options.overlayColor + ',' + this.options.overlayOpacity + ')'

            });

            var elem = '';
            if (this.options.progress == 'circle') {
                elem += '<div class="progress-circle-indeterminate progress-circle-' + this.options.progressColor + '"></div>';
            } else if (this.options.progress == 'bar') {

                elem += '<div class="progress progress-small">';
                elem += '    <div class="progress-bar-indeterminate progress-bar-' + this.options.progressColor + '"></div>';
                elem += '</div>';
            } else if (this.options.progress == 'circle-lg') {
                toggle.addClass('refreshing');
                var iconOld = toggle.find('> i').first();
                var iconNew;
                if (!toggle.find('[class$="-animated"]').length) {
                    iconNew = $('<i/>');
                    iconNew.css({
                        'position': 'absolute',
                        'top': iconOld.position().top,
                        'left': iconOld.position().left
                    });
                    iconNew.addClass('card-icon-refresh-lg-' + this.options.progressColor + '-animated');
                    toggle.append(iconNew);
                } else {
                    iconNew = toggle.find('[class$="-animated"]');
                }

                iconOld.addClass('fade');
                iconNew.addClass('active');


            } else {
                elem += '<div class="progress progress-small">';
                elem += '    <div class="progress-bar-indeterminate progress-bar-' + this.options.progressColor + '"></div>';
                elem += '</div>';
            }

            this.$loader.append(elem);
            this.$element.append(this.$loader);

            // Start Fix for FF: pre-loading animated to SVGs
            var _loader = this.$loader;
            setTimeout(function() {
                this.$loader.remove();
                this.$element.append(_loader);
            }.bind(this), 300);
            // End fix
            this.$loader.fadeIn();

            $.isFunction(this.options.onRefresh) && this.options.onRefresh(this);

        } else {
            var _this = this;
            this.$loader.fadeOut(function() {
                $(this).remove();
                if (_this.options.progress == 'circle-lg') {
                    var iconNew = toggle.find('.active');
                    var iconOld = toggle.find('.fade');
                    iconNew.removeClass('active');
                    iconOld.removeClass('fade');
                    toggle.removeClass('refreshing');

                }
                _this.options.refresh = false;
            });
        }
    }

    Card.prototype.error = function(error) {
        if (error) {
            var _this = this;
            this.$element.pgNotification({
                style: 'bar',
                message: error,
                position: 'top',
                timeout: 0,
                type: 'danger',
                onShown: function() {
                    _this.$loader.find('> div').fadeOut()
                },
                onClosed: function() {
                    _this.refresh(false)
                }
            }).show();
        }
    }

    // CARD PLUGIN DEFINITION
    // =======================

    function Plugin(option) {
        return this.each(function() {
            var $this = $(this);
            var data = $this.data('pg.card');
            var options = typeof option == 'object' && option;

            if (!data) $this.data('pg.card', (data = new Card(this, options)));
            if (typeof option == 'string') data[option]();
            else if (options.hasOwnProperty('refresh')) data.refresh(options.refresh);
            else if (options.hasOwnProperty('error')) data.error(options.error);
        })
    }

    var old = $.fn.card

    $.fn.card = Plugin
    $.fn.card.Constructor = Card


    $.fn.card.defaults = {
        progress: 'circle',
        progressColor: 'master',
        refresh: false,
        error: null,
        overlayColor: '255,255,255',
        overlayOpacity: 0.8,
        refreshButton: '[data-toggle="refresh"]',
        maximizeButton: '[data-toggle="maximize"]',
        collapseButton: '[data-toggle="collapse"]',
        closeButton: '[data-toggle="close"]'

        // onRefresh: function(portlet) {},
        // onCollapse: function(portlet) {},
        // onExpand: function(portlet) {},
        // onMaximize: function(portlet) {},
        // onRestore: function(portlet) {},
        // onClose: function(portlet) {}
    }

    // CARD NO CONFLICT
    // ====================

    $.fn.card.noConflict = function() {
        $.fn.card = old;
        return this;
    }

    // CARD DATA API
    //===================

    $(document).on('click.pg.card.data-api', '[data-toggle="collapse"]', function(e) {
        var $this = $(this);
        var $target = $this.closest('.card');
        if ($this.is('a')) e.preventDefault();
        $target.data('pg.card') && $target.card('collapse');
    })

    $(document).on('click.pg.card.data-api', '[data-toggle="close"]', function(e) {
        var $this = $(this);
        var $target = $this.closest('.card');
        if ($this.is('a')) e.preventDefault();
        $target.data('pg.card') && $target.card('close');
    })

    $(document).on('click.pg.card.data-api', '[data-toggle="refresh"]', function(e) {
        var $this = $(this);
        var $target = $this.closest('.card');
        if ($this.is('a')) e.preventDefault();
        $target.data('pg.card') && $target.card({
            refresh: true
        })
    })

    $(document).on('click.pg.card.data-api', '[data-toggle="maximize"]', function(e) {
        var $this = $(this);
        var $target = $this.closest('.card');
        if ($this.is('a')) e.preventDefault();
        $target.data('pg.card') && $target.card('maximize');
    })

    $(window).on('load', function() {
        $('[data-pages="card"]').each(function() {
            var $card = $(this)
            $card.card($card.data())
        })
    })

})(window.jQuery);

/* ============================================================
 * Pages Search overlay
 * ============================================================ */

(function($) {

    'use strict';

    // SEARCH CLASS DEFINITION
    // ======================

    var Search = function(element, options) {
        this.$element = $(element);
        this.options = $.extend(true, {}, $.fn.search.defaults, options);
        this.init();
    }
    Search.VERSION = "1.0.0";

    Search.prototype.init = function() {
        var _this = this;
        this.pressedKeys = [];
        this.ignoredKeys = [];

        //Cache elements
        this.$searchField = this.$element.find(this.options.searchField);
        this.$closeButton = this.$element.find(this.options.closeButton);
        this.$suggestions = this.$element.find(this.options.suggestions);
        this.$brand = this.$element.find(this.options.brand);

        this.$searchField.on('keyup', function(e) {
            _this.$suggestions && _this.$suggestions.html($(this).val());
        });

        this.$searchField.on('keyup', function(e) {
            _this.options.onKeyEnter && _this.options.onKeyEnter(_this.$searchField.val());
            if (e.keyCode == 13) { //Enter pressed
                e.preventDefault();
                _this.options.onSearchSubmit && _this.options.onSearchSubmit(_this.$searchField.val());
            }
            if ($('body').hasClass('overlay-disabled')) {
                return 0;
            }

        });

        this.$closeButton.on('click', function() {
            _this.toggleOverlay('hide');
        });

        this.$element.on('click', function(e) {
            if ($(e.target).data('pages') == 'search') {
                _this.toggleOverlay('hide');
            }
        });

        $(document).on('keypress.pg.search', function(e) {
            _this.keypress(e);
        });

        $(document).on('keyup', function(e) {
            // Dismiss overlay on ESC is pressed
            if (_this.$element.is(':visible') && e.keyCode == 27) {
                _this.toggleOverlay('hide');
            }
        });

    }


    Search.prototype.keypress = function(e) {

        e = e || event; // to deal with IE
        var nodeName = e.target.nodeName;
        if ($('body').hasClass('overlay-disabled') ||
            $(e.target).hasClass('js-input') ||
            nodeName == 'INPUT' ||
            nodeName == 'TEXTAREA') {
            return;
        }

        if (e.which !== 0 && e.charCode !== 0 && !e.ctrlKey && !e.metaKey && !e.altKey && e.keyCode != 27) {
            this.toggleOverlay('show', String.fromCharCode(e.keyCode | e.charCode));
        }
    }


    Search.prototype.toggleOverlay = function(action, key) {
        var _this = this;
        if (action == 'show') {
            this.$element.removeClass("hide");
            this.$element.fadeIn("fast");
            if (!this.$searchField.is(':focus')) {
                this.$searchField.val(key);
                setTimeout(function() {
                    this.$searchField.focus();
                    var tmpStr = this.$searchField.val();
                    this.$searchField.val('');
                    this.$searchField.val(tmpStr);
                }.bind(this), 100);
            }

            this.$element.removeClass("closed");
            this.$brand.toggleClass('invisible');
            $(document).off('keypress.pg.search');
        } else {
            this.$element.fadeOut("fast").addClass("closed");
            this.$searchField.val('').blur();
            setTimeout(function() {
                if ((this.$element).is(':visible')) {
                    this.$brand.toggleClass('invisible');
                }
                $(document).on('keypress.pg.search', function(e) {
                    _this.keypress(e);
                });
            }.bind(this), 100);
        }
    };

    // SEARCH PLUGIN DEFINITION
    // =======================


    function Plugin(option) {
        return this.each(function() {
            var $this = $(this);
            var data = $this.data('pg.search');
            var options = typeof option == 'object' && option;

            if (!data) {
                $this.data('pg.search', (data = new Search(this, options)));

            }
            if (typeof option == 'string') data[option]();
        })
    }

    var old = $.fn.search

    $.fn.search = Plugin
    $.fn.search.Constructor = Search

    $.fn.search.defaults = {
        searchField: '[data-search="searchField"]',
        closeButton: '[data-search="closeButton"]',
        suggestions: '[data-search="suggestions"]',
        brand: '[data-search="brand"]'
    }

    // SEARCH NO CONFLICT
    // ====================

    $.fn.search.noConflict = function() {
        $.fn.search = old;
        return this;
    }

    $(document).on('click.pg.search.data-api', '[data-toggle="search"]', function(e) {
        var $this = $(this);
        var $target = $('[data-pages="search"]');
        if ($this.is('a')) e.preventDefault();
        $target.data('pg.search').toggleOverlay('show');
    })


})(window.jQuery);

/* ============================================================
 * Pages Notifications
 * ============================================================ */

(function($) {

    'use strict';

    var Notification = function(container, options) {

        var self = this;

        // Element collection
        self.container = $(container); // 'body' recommended
        self.notification = $('<div class="pgn push-on-sidebar-open"></div>');
        self.options = $.extend(true, {}, $.fn.pgNotification.defaults, options);

        if (!self.container.find('.pgn-wrapper[data-position=' + this.options.position + ']').length) {
            self.wrapper = $('<div class="pgn-wrapper" data-position="' + this.options.position + '"></div>');
            self.container.append(self.wrapper);
        } else {
            self.wrapper = $('.pgn-wrapper[data-position=' + this.options.position + ']');
        }

        self.alert = $('<div class="alert"></div>');
        self.alert.addClass('alert-' + self.options.type);

        if (self.options.style == 'bar') {
            new BarNotification();
        } else if (self.options.style == 'flip') {
            new FlipNotification();
        } else if (self.options.style == 'circle') {
            new CircleNotification();
        } else if (self.options.style == 'simple') {
            new SimpleNotification();
        } else { // default = 'simple'
            new SimpleNotification();
        }

        // Notification styles
        function SimpleNotification() {

            self.notification.addClass('pgn-simple');

            self.alert.append(self.options.message);
            if (self.options.showClose) {
                var close = $('<button type="button" class="close" data-dismiss="alert"></button>')
                    .append('<span aria-hidden="true">&times;</span>')
                    .append('<span class="sr-only">Close</span>');

                self.alert.prepend(close);
            }

        }

        function BarNotification() {

            self.notification.addClass('pgn-bar');
            self.alert.addClass('alert-' + self.options.type);

            var container = $('<div class="container"/>');

            container.append('<span>' + self.options.message + '</span>');

            if (self.options.showClose) {
                var close = $('<button type="button" class="close" data-dismiss="alert"></button>')
                    .append('<span aria-hidden="true">&times;</span>')
                    .append('<span class="sr-only">Close</span>');
                container.append(close)
            }
            self.alert.append(container);

        }

        function CircleNotification() {

            self.notification.addClass('pgn-circle');

            var table = '<div>';
            if (self.options.thumbnail) {
                table += '<div class="pgn-thumbnail"><div>' + self.options.thumbnail + '</div></div>';
            }

            table += '<div class="pgn-message"><div>';

            if (self.options.title) {
                table += '<p class="bold">' + self.options.title + '</p>';
            }
            table += '<p>' + self.options.message + '</p></div></div>';
            table += '</div>';

            if (self.options.showClose) {
                table += '<button type="button" class="close" data-dismiss="alert">';
                table += '<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>';
                table += '</button>';
            }


            self.alert.append(table);
            self.alert.after('<div class="clearfix"></div>');

        }

        function FlipNotification() {

            self.notification.addClass('pgn-flip');
            self.alert.append("<span>" + self.options.message + "</span>");
            if (self.options.showClose) {
                var close = $('<button type="button" class="close" data-dismiss="alert"></button>')
                    .append('<span aria-hidden="true">&times;</span>')
                    .append('<span class="sr-only">Close</span>');

                self.alert.prepend(close);
            }

        }

        self.notification.append(self.alert);

        function alignWrapperToContainer(){
          var containerPosition = self.container.position();
          var containerHeight = self.container.height();
          var containerWidth = self.container.width();

          var containerTop = containerPosition.top
          var containerBottom = self.container.parent().height() - (containerTop + containerHeight)
          var containerLeft = containerPosition.left
          var containerRight = self.container.parent().width() - (containerLeft + containerWidth)

          if(/top/.test(self.options.position)){
            self.wrapper.css('top', containerTop)
          }
          if(/bottom/.test(self.options.position)){
            self.wrapper.css('bottom', containerBottom)
          }
          if(/left/.test(self.options.position)){
            self.wrapper.css('left', containerLeft)
          }
          if(/right/.test(self.options.position)){
            self.wrapper.css('right', containerRight)
          }
        }
        if($('body').hasClass('horizontal-menu')){
          alignWrapperToContainer()
          $(window).on('resize', alignWrapperToContainer)
        }

        // bind to Bootstrap closed event for alerts
        self.alert.on('closed.bs.alert', function() {
            self.notification.remove();
            self.options.onClosed();
            // refresh layout after removal
        });

        return this; // enable chaining
    };

    Notification.VERSION = "1.0.0";

    Notification.prototype.show = function() {

        // TODO: add fadeOut animation on show as option
        this.wrapper.prepend(this.notification);

        this.options.onShown();

        if (this.options.timeout != 0) {
            var _this = this;
            // settimeout removes scope. use .bind(this)
            setTimeout(function() {
                this.notification.fadeOut("slow", function() {
                    $(this).remove();
                    _this.options.onClosed();
                });
            }.bind(this), this.options.timeout);
        }

    };

    $.fn.pgNotification = function(options) {
        return new Notification(this, options);
    };

    $.fn.pgNotification.defaults = {
        style: 'simple',
        message: null,
        position: 'top-right',
        type: 'info',
        showClose: true,
        timeout: 4000,
        onShown: function() {},
        onClosed: function() {}
    }
})(window.jQuery);
/* ============================================================
 * Pages Float Plugin
 * ============================================================ */

(function($) {
    'use strict';
    // FLOAT CLASS DEFINITION
    // ======================

    var Float = function(element, options) {
        this.$element = $(element);
        this.options = $.extend(true, {}, $.fn.pgFloat.defaults, options);

        var _this = this;
        var _prevY;

        function update() {
            var element = _this.$element;
            var w = $(window).scrollTop();
            var translateY = (w - element.offset().top) * _this.options.speed;
            var delay = _this.options.delay / 1000; //in seconds
            var curve = _this.options.curve;
            var maxTopTranslate = _this.options.maxTopTranslate;
            var maxBottomTranslate = _this.options.maxBottomTranslate;

            if (maxTopTranslate == 0) {
                if (element.offset().top + element.outerHeight() < w) return;
            }

            if (maxBottomTranslate == 0) {
                if (element.offset().top > w + $(window).height()) return;
            }

            if (_prevY < translateY) { // scroll down, element will hide from top
                if (maxTopTranslate != 0 && Math.abs(translateY) > maxTopTranslate) return;
            } else {
                if (maxBottomTranslate != 0 && Math.abs(translateY) > maxBottomTranslate) return;
            }


            element.css({
                'transition': 'transform ' + delay + 's ' + curve,
                'transform': 'translateY(' + translateY + 'px)',
            });

            _prevY = translateY;
        }

        $(window).bind('scroll', function() {
            update()
        });
        $(window).bind('load', function() {
            update()
        });
    }
    Float.VERSION = "1.0.0";



    // FLOAT PLUGIN DEFINITION
    // =======================
    function Plugin(option) {
        return this.each(function() {
            var $this = $(this);
            var data = $this.data('pgFloat');
            var options = typeof option == 'object' && option;

            if (!data) $this.data('pgFloat', (data = new Float(this, options)));
            if (typeof option == 'string') data[option]();
        })
    }

    var old = $.fn.pgFloat;

    $.fn.pgFloat = Plugin;
    $.fn.pgFloat.Constructor = Float;


    $.fn.pgFloat.defaults = {
        topMargin: 0,
        bottomMargin: 0,
        speed: 0.1,
        delay: 1000,
        curve: 'ease'
    }

    // FLOAT NO CONFLICT
    // ====================

    $.fn.pgFloat.noConflict = function() {
        $.fn.pgFloat = old;
        return this;
    }

    // FLOAT DATA API
    //===================

    $(window).on('load', function() {

        $('[data-pages="float"]').each(function() {
            var $pgFloat = $(this)
            $pgFloat.pgFloat($pgFloat.data())
        })
    });

})(window.jQuery);
(function($) {
    'use strict';
    // Initialize layouts and plugins
    (typeof angular === 'undefined') && $.Pages.init();
})(window.jQuery);