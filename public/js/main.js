// page init
jQuery(function(){
    initMobileNav();
    initScrollTop();
    initTabs();
});

// content tabs init
function initTabs() {
    jQuery('ul.tabset').contentTabs({
        addToParent: true,
        // animSpeed: 400,
        //effect: 'slide',
        tabLinks: 'a'
    });
}


function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload").change(function() {
    readURL(this);
});
$('#addTutorial').on('hidden.bs.modal', function () {
    $('#imgCoverPhoto').val('');
    $('.removeBtn').click();
    $('.ajax-form :input').val('');
});
$('#selectWinner').on('hidden.bs.modal', function () {
    $('.ajax-form :input').val('');
    $('input[name="suit"]').prop('checked', false);
});
$('#updateTutorial').on('hidden.bs.modal', function () {
    $('#editImgCoverPhoto').val('');
    $('.removeBtn').click();
    $('.edit-ajax-form :input').val('');
});
$('#addJokerValuePopup').on('hidden.bs.modal', function () {
    $('#jokerImgCoverPhoto').val('');
    $('.removeBtn').click();
    $('.ajax-form :input').val('');
});
$('#addValuePopup').on('hidden.bs.modal', function () {
    $('#imgCoverPhoto').val('');
    $('.removeBtn').click();
    $('.ajax-form :input').val('');
});
$('#addSuitsValuePopup').on('hidden.bs.modal', function () {
    $('#imgCoverPhoto').val('');
    $('.removeBtn').click();
    $('.ajax-form :input').val('');
});
$('#addSkinValuePopup').on('hidden.bs.modal', function () {
    $('#skinImgCoverPhoto').val('');
    $('.removeBtn').click();
    $('.ajax-form :input').val('');
});

jQuery(document).ready(function($){

    $(document).ready(function() {
        // When a file is selected
        $('.imageInput').change(function(e, src = '') {
            var reader = new FileReader();
            var $imgPreview = $(this).closest('.imgUpload').find('.imgPreview');

            if (src !== '') {
                $imgPreview.show();
                $imgPreview.find('.previewImage').attr('src', src);
            } else {
                var file = e.target.files[0];
                reader.onload = function(e) {
                    $imgPreview.show();
                    $imgPreview.find('.previewImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(file);
            }
        });


        // Remove the selected image
        $('.removeBtn').click(function() {
            var $imgUpload = $(this).closest('.imgUpload');
            var $input = $imgUpload.find('.imageInput');
            var $imgPreview = $imgUpload.find('.imgPreview');

            $input.val('');
            $imgPreview.hide();
        });
    });


    $(".editButton").click(function(){
        $(".profileDetail").hide();
    });
    $(".backBtn").click(function(){
        $(".profileDetail").show();
    });

    var table  = $('.datatable').DataTable({
        processing: true,
        //serverSide: true,
        //"searching": true,
        "paging": true,
        //'bSortable': false,
        //"bInfo": true,
        //"bSort" : false,
        iDisplayLength: 10,
        "lengthChange": true,
        //"autoWidth": false,
        //"bDestroy": true,
        //"scrollX":true,
        dom: '<"topFooter">rt<"bottomFooter"lip>',
    })
    $('.datatable-checkbox').DataTable( {
        /* "scrollY":        100,
         "scrollX":        true,
         "scrollCollapse": true,
         "fixedHeader":    true,
         "bInfo" :         false,
         scrollResize:     true,
         lengthChange:     false,
         searching:        false,
         paging:           false,*/
        columnDefs: [ {
            orderable: false,
            className: 'select-checkbox',
            targets:   0
        } ],
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
        order: [[ 1, 'asc' ]]
    });

    $('.row').each(function(){
        var highestBox = 0;
        $('.sameheight', this).each(function(){
            if($(this).height() > highestBox) {
                highestBox = $(this).height();
            }
        });
        $('.sameheight',this).height(highestBox);
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imageUpload").change(function() {
        readURL(this);
    });


});


function initScrollTop() {
    var win = jQuery(window);
    var headerClass = 'header-fixed';
    var scrollHeight = 0;
    var header = jQuery('#wrapper');

    // add class to header
    function addClass(){
        var scrollTop = win.scrollTop();
        if (scrollTop > scrollHeight){
            header.addClass(headerClass);
        } else {
            header.removeClass(headerClass);
        }
    }

    win.on('scroll', addClass);

}


function initMobileNav() {
    jQuery('#wrapper').mobileNav({
        hideOnClickOutside: true,
        menuActiveClass: 'nav-active',
        menuOpener: '.nav-opener',
        menuDrop: '#nav'
    });
    jQuery('#wrapper').mobileNav({
        hideOnClickOutside: true,
        menuActiveClass: 'userSidebar-active',
        menuOpener: '.userSidebarOpener',
        menuDrop: '.userSidebar'
    });
    $('.support-block').mobileNav({
        hideOnClickOutside: true,
        menuActiveClass: 'widget-active',
        menuOpener: '.widget-opener',
        menuDrop: '.messageListSidebar'
    });
    $('#wrapper').mobileNav({
        hideOnClickOutside: true,
        menuActiveClass: 'notifyActive',
        menuOpener: '.notify-btn',
        menuDrop: '.dropdown'
    });
}

/*
 * Simple Mobile Navigation
 */
;(function($) {
    function MobileNav(options) {
        this.options = $.extend({
            container: null,
            hideOnClickOutside: false,
            menuActiveClass: 'nav-active',
            menuOpener: '.nav-opener',
            menuDrop: '.nav-drop',
            toggleEvent: 'click',
            outsideClickEvent: 'click touchstart pointerdown MSPointerDown'
        }, options);
        this.initStructure();
        this.attachEvents();
    }
    MobileNav.prototype = {
        initStructure: function() {
            this.page = $('html');
            this.container = $(this.options.container);
            this.opener = this.container.find(this.options.menuOpener);
            this.drop = this.container.find(this.options.menuDrop);
        },
        attachEvents: function() {
            var self = this;

            if(activateResizeHandler) {
                activateResizeHandler();
                activateResizeHandler = null;
            }

            this.outsideClickHandler = function(e) {
                if(self.isOpened()) {
                    var target = $(e.target);
                    if(!target.closest(self.opener).length && !target.closest(self.drop).length) {
                        self.hide();
                    }
                }
            };

            this.openerClickHandler = function(e) {
                e.preventDefault();
                self.toggle();
            };

            this.opener.on(this.options.toggleEvent, this.openerClickHandler);
        },
        isOpened: function() {
            return this.container.hasClass(this.options.menuActiveClass);
        },
        show: function() {
            this.container.addClass(this.options.menuActiveClass);
            if(this.options.hideOnClickOutside) {
                this.page.on(this.options.outsideClickEvent, this.outsideClickHandler);
            }
        },
        hide: function() {
            this.container.removeClass(this.options.menuActiveClass);
            if(this.options.hideOnClickOutside) {
                this.page.off(this.options.outsideClickEvent, this.outsideClickHandler);
            }
        },
        toggle: function() {
            if(this.isOpened()) {
                this.hide();
            } else {
                this.show();
            }
        },
        destroy: function() {
            this.container.removeClass(this.options.menuActiveClass);
            this.opener.off(this.options.toggleEvent, this.clickHandler);
            this.page.off(this.options.outsideClickEvent, this.outsideClickHandler);
        }
    };

    var activateResizeHandler = function() {
        var win = $(window),
            doc = $('html'),
            resizeClass = 'resize-active',
            flag, timer;
        var removeClassHandler = function() {
            flag = false;
            doc.removeClass(resizeClass);
        };
        var resizeHandler = function() {
            if(!flag) {
                flag = true;
                doc.addClass(resizeClass);
            }
            clearTimeout(timer);
            timer = setTimeout(removeClassHandler, 500);
        };
        win.on('resize orientationchange', resizeHandler);
    };

    $.fn.mobileNav = function(options) {
        return this.each(function() {
            var params = $.extend({}, options, {container: this}),
                instance = new MobileNav(params);
            $.data(this, 'MobileNav', instance);
        });
    };
}(jQuery));





/*
 * jQuery Tabs plugin
 */
;(function($){
    $.fn.contentTabs = function(o){
        // default options
        var options = $.extend({
            activeClass:'active',
            addToParent:false,
            autoHeight:false,
            autoRotate:false,
            checkHash:false,
            animSpeed:400,
            switchTime:3000,
            effect: 'none', // "fade", "slide"
            tabLinks:'a',
            attrib:'href',
            event:'click'
        },o);

        return this.each(function(){
            var tabset = $(this), tabs = $();
            var tabLinks = tabset.find(options.tabLinks);
            var tabLinksParents = tabLinks.parent();
            var prevActiveLink = tabLinks.eq(0), currentTab, animating;
            var tabHolder;

            // handle location hash
            if(options.checkHash && tabLinks.filter('[' + options.attrib + '="' + location.hash + '"]').length) {
                (options.addToParent ? tabLinksParents : tabLinks).removeClass(options.activeClass);
                setTimeout(function() {
                    window.scrollTo(0,0);
                },1);
            }

            // init tabLinks
            tabLinks.each(function(){
                var link = $(this);
                var href = link.attr(options.attrib);
                var parent = link.parent();
                href = href.substr(href.lastIndexOf('#'));

                // get elements
                var tab = $(href).hide().addClass(tabHiddenClass);
                tabs = tabs.add(tab);
                link.data('cparent', parent);
                link.data('ctab', tab);

                // find tab holder
                if(!tabHolder && tab.length) {
                    tabHolder = tab.parent();
                }

                // show only active tab
                var classOwner = options.addToParent ? parent : link;
                if(classOwner.hasClass(options.activeClass) || (options.checkHash && location.hash === href)) {
                    classOwner.addClass(options.activeClass);
                    prevActiveLink = link; currentTab = tab;
                    tab.removeClass(tabHiddenClass).width('');
                    contentTabsEffect[options.effect].show({tab:tab, fast:true});
                } else {
                    var tabWidth = tab.width();
                    if(tabWidth) {
                        tab.width(tabWidth);
                    }
                    tab.addClass(tabHiddenClass);
                }

                // event handler
                link.bind(options.event, function(e){
                    if(link != prevActiveLink && !animating) {
                        switchTab(prevActiveLink, link);
                        prevActiveLink = link;
                    }
                });
                if(options.attrib === 'href') {
                    link.bind('click', function(e){
                        e.preventDefault();
                    });
                }
            });

            // tab switch function
            function switchTab(oldLink, newLink) {
                animating = true;
                var oldTab = oldLink.data('ctab');
                var newTab = newLink.data('ctab');
                prevActiveLink = newLink;
                currentTab = newTab;

                // refresh pagination links
                (options.addToParent ? tabLinksParents : tabLinks).removeClass(options.activeClass);
                (options.addToParent ? newLink.data('cparent') : newLink).addClass(options.activeClass);

                // hide old tab
                resizeHolder(oldTab, true);
                contentTabsEffect[options.effect].hide({
                    speed: options.animSpeed,
                    tab:oldTab,
                    complete: function() {
                        // show current tab
                        resizeHolder(newTab.removeClass(tabHiddenClass).width(''));
                        contentTabsEffect[options.effect].show({
                            speed: options.animSpeed,
                            tab:newTab,
                            complete: function() {
                                if(!oldTab.is(newTab)) {
                                    oldTab.width(oldTab.width()).addClass(tabHiddenClass);
                                }
                                animating = false;
                                resizeHolder(newTab, false);

                                // Check if the activated tab contains the datatable
                                // if (newTab.find('.datatable').length) {
                                //     initializeDatatable();
                                // }

                                autoRotate();
                                $(window).trigger('resize');
                            }
                        });
                    }
                });
            }

            // holder auto height
            function resizeHolder(block, state) {
                var curBlock = block && block.length ? block : currentTab;
                if(options.autoHeight && curBlock) {
                    tabHolder.stop();
                    if(state === false) {
                        tabHolder.css({height:''});
                    } else {
                        var origStyles = curBlock.attr('style');
                        curBlock.show().css({width:curBlock.width()});
                        var tabHeight = curBlock.outerHeight(true);
                        if(!origStyles) curBlock.removeAttr('style'); else curBlock.attr('style', origStyles);
                        if(state === true) {
                            tabHolder.css({height: tabHeight});
                        } else {
                            tabHolder.animate({height: tabHeight}, {duration: options.animSpeed});
                        }
                    }
                }
            }
            if(options.autoHeight) {
                $(window).bind('resize orientationchange', function(){
                    tabs.not(currentTab).removeClass(tabHiddenClass).show().each(function(){
                        var tab = jQuery(this), tabWidth = tab.css({width:''}).width();
                        if(tabWidth) {
                            tab.width(tabWidth);
                        }
                    }).hide().addClass(tabHiddenClass);

                    resizeHolder(currentTab, false);
                });
            }

            // autorotation handling
            var rotationTimer;
            function nextTab() {
                var activeItem = (options.addToParent ? tabLinksParents : tabLinks).filter('.' + options.activeClass);
                var activeIndex = (options.addToParent ? tabLinksParents : tabLinks).index(activeItem);
                var newLink = tabLinks.eq(activeIndex < tabLinks.length - 1 ? activeIndex + 1 : 0);
                prevActiveLink = tabLinks.eq(activeIndex);
                switchTab(prevActiveLink, newLink);
            }
            function autoRotate() {
                if(options.autoRotate && tabLinks.length > 1) {
                    clearTimeout(rotationTimer);
                    rotationTimer = setTimeout(function() {
                        if(!animating) {
                            nextTab();
                        } else {
                            autoRotate();
                        }
                    }, options.switchTime);
                }
            }
            autoRotate();
        });
    };

    // add stylesheet for tabs on DOMReady
    var tabHiddenClass = 'js-tab-hidden';
    (function() {
        var tabStyleSheet = $('<style type="text/css">')[0];
        var tabStyleRule = '.'+tabHiddenClass;
        tabStyleRule += '{position:absolute !important;left:-9999px !important;top:-9999px !important;display:block !important}';
        if (tabStyleSheet.styleSheet) {
            tabStyleSheet.styleSheet.cssText = tabStyleRule;
        } else {
            tabStyleSheet.appendChild(document.createTextNode(tabStyleRule));
        }
        $('head').append(tabStyleSheet);
    }());

    // tab switch effects
    var contentTabsEffect = {
        none: {
            show: function(o) {
                o.tab.css({display:'block'});
                if(o.complete) o.complete();
            },
            hide: function(o) {
                o.tab.css({display:'none'});
                if(o.complete) o.complete();
            }
        },
        fade: {
            show: function(o) {
                if(o.fast) o.speed = 1;
                o.tab.fadeIn(o.speed);
                if(o.complete) setTimeout(o.complete, o.speed);
            },
            hide: function(o) {
                if(o.fast) o.speed = 1;
                o.tab.fadeOut(o.speed);
                if(o.complete) setTimeout(o.complete, o.speed);
            }
        },
        slide: {
            show: function(o) {
                var tabHeight = o.tab.show().css({width:o.tab.width()}).outerHeight(true);
                var tmpWrap = $('<div class="effect-div">').insertBefore(o.tab).append(o.tab);
                tmpWrap.css({width:'100%', overflow:'hidden', position:'relative'}); o.tab.css({marginTop:-tabHeight,display:'block'});
                if(o.fast) o.speed = 1;
                o.tab.animate({marginTop: 0}, {duration: o.speed, complete: function(){
                        o.tab.css({marginTop: '', width: ''}).insertBefore(tmpWrap);
                        tmpWrap.remove();
                        if(o.complete) o.complete();
                    }});
            },
            hide: function(o) {
                var tabHeight = o.tab.show().css({width:o.tab.width()}).outerHeight(true);
                var tmpWrap = $('<div class="effect-div">').insertBefore(o.tab).append(o.tab);
                tmpWrap.css({width:'100%', overflow:'hidden', position:'relative'});

                if(o.fast) o.speed = 1;
                o.tab.animate({marginTop: -tabHeight}, {duration: o.speed, complete: function(){
                        o.tab.css({display:'none', marginTop:'', width:''}).insertBefore(tmpWrap);
                        tmpWrap.remove();
                        if(o.complete) o.complete();
                    }});
            }
        }
    };
}(jQuery));





$('.custom-select').each(function () {
    var $this = $(this);
    if (!$this.attr('multiple')){
        var numberOfOptions = $(this).children('option').length;
        $this.addClass('s-hidden');
        $this.wrap('<div class="select-box"></div>');

        var selectbox   =   $this.parents('div.select-box');
        $this.after('<div class="styledSelect"></div>');

        var $styledSelect = $this.next('div.styledSelect');
        $styledSelect.text($this.children('option').eq(0).text());

        var $list = $('<div class="options-dropdown"><ul class="options" /></div>').insertAfter($styledSelect);
        var ListItems = '';
        for (var i = 0; i < numberOfOptions; i++) {
            ListItems += `<li rel="${$this.children('option').eq(i).val()}">${$this.children('option').eq(i).text()}</li>`;
        }
        selectbox.find('div.options-dropdown').find('ul.options').html(ListItems);

        var $listItems = $list.find('ul.options').children('li');

        $styledSelect.on('click',function (e) {
            e.stopPropagation();
            const elem      =   $(this);
            elem.parents('div.select-box').toggleClass('select-active');
        });
        $listItems.on('click',function (e) {
            e.stopPropagation();
            $styledSelect.text($(this).text());
            $this.val($(this).attr('rel'));
            $this.trigger('change');
            selectbox.removeClass('select-active');
        });
        $(document).on('click',function () {
            selectbox.removeClass('select-active');
        });
    }
});
