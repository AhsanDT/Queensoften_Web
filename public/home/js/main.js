// page init
jQuery(function(){
    initMobileNav();
    initScrollTop();
});




jQuery(document).ready(function($){
    $('.row').each(function(){
        var highestBox = 0;
        $('.sameheight', this).each(function(){
            if($(this).height() > highestBox) {
                highestBox = $(this).height();
            }
        });
        $('.sameheight',this).height(highestBox);
    });
});

document.addEventListener('DOMContentLoaded', function () {
    var toggleButton = document.querySelector('#shop-toggler');
    var closeButton = document.querySelector('#close');
    var elementToToggle = document.querySelector('#shop-section');

    function toggleElement() {
        elementToToggle.classList.toggle('active');
    }
    toggleButton.addEventListener('click', toggleElement);
    closeButton.addEventListener('click', toggleElement);
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
    });;
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

//   tab
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// select
const selectInput = document.getElementById('selectInput');
const options = document.getElementById('options');

options.addEventListener('change', function() {
    selectInput.value = options.value;
});


// shop operner




