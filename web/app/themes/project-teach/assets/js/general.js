var $ = jQuery.noConflict();

$(document).ready(function () {

	// $('.match-height').matchHeight();

	//  headerOuterHeight_ = $(".header-main").outerHeight();
    // var Obj_ = $("<div>", {
    //     class: "blankDiv"
    // }).height(headerOuterHeight_).hide().insertAfter($(".header-main"));

    // stickyHeader();

    try{
        $(".ethos-slider").slick({ 
            adaptiveHeight: true, 
            dots: true, 
            infinite: false,
            slidesToShow: 2.5,
            slidesToScroll: 1,
            prevArrow: "<button type='button' class='slick-prev ethos-slider-prev'>Previous</button>",
            nextArrow: "<button type='button' class='slick-next ethos-slider-next'>Next</button>",
            appendDots: '.ethos-slider-nav',
            appendArrows: '.ethos-slider-nav',
            responsive: [{
              breakpoint: 1080,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 1
              }
            }, {
              breakpoint: 768,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 1
              }
            }, {
              breakpoint: 634,
              settings: {
                slidesToShow: 1.5,
                slidesToScroll: 1
              }
            }, {
              breakpoint: 535,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            }]
        });     
    } catch(error) {
        
    }
    $('.ethos-slider').css('display', 'block');
    $('[data-dismiss]').click(function(event) {
        var dataDismiss = $(this).attr("data-dismiss");
        $('#' + dataDismiss).hide();
        Cookies.set(dataDismiss, 'off', { sameSite: 'strict' });

    });
    //Initial Cookies
    var siteNotices = document.querySelectorAll('[id^="notice-"]');
    for (var i = 0; i < siteNotices.length; i++) {
        if(!Cookies.get(siteNotices[i].id)){
            Cookies.set(siteNotices[i].id, 'on', { sameSite: 'strict' });
        }

        if(Cookies.get(siteNotices[i].id) != 'on'){
            siteNotices[i].remove();
        }
    }

    var topMenu = jQuery("header"),
        topMenuHeight = topMenu.outerHeight(),
        // All list items
        menuItems = topMenu.find('a[href*="#"]'),
        // Anchors corresponding to menu items
        scrollItems = menuItems.map(function () {
            var href = jQuery(this).attr("href"),
                    id = href.substring(href.indexOf('#')),
                    item = jQuery(id);
            //console.log(item)
            if (item.length) {
                return item;
            }
        });


    // Bind to scroll
    jQuery(window).scroll(function () {
        // Get container scroll position
        var fromTop = jQuery(this).scrollTop() + topMenuHeight + 2;

        // Get id of current scroll item
        var cur = scrollItems.map(function () {
            if (jQuery(this).offset().top < fromTop)
                return this;
        });

        // Get the id of the current element
        cur = cur[cur.length - 1];
        var id = cur && cur.length ? cur[0].id : "";

        menuItems.parent().removeClass("active");
        if (id) {
            menuItems.parent().end().filter("[href*='#" + id + "']").parent().addClass("active");
        }

    });


    $('.slider-event').owlCarousel({
        margin: 40,
        loop: true,
        items: 3,
        autoWidth: true,
        stagePadding: 100,
        nav: true,
        responsive: {
            0: {
                items: 1,
                stagePadding: 0,
            },

            768: {
                items: 1,
            },
            990: {
                items: 1,
            },
            1200: {
                items: 2,
            },
            1600: {
                items: 3,
            },
            1920: {
                items: 3,
            },
        },
    });

    /**** equalHeight starts ****/
    // $(".consulations").equalHeight();
    // $(".primary-txt figcaption").equalHeight();
    // $(".box-height").equalHeight();
    // $(".box-height1").equalHeight();
    // $(".overview-info p").equalHeight();
    /**** equalHeight end ****/

    /**** Init Modal ****/
    $('#welcome-modal').modal('show');
    
});

;(function($){
    $.fn.equalHeight = function (option) {
        var $this = this
        var get_height = function(){
            var maxheight=0;
            $this.css("height","")
            $this.each(function(){
                maxheight = $(this).height() > maxheight ? $(this).height() : maxheight;
            })
            $this.height(maxheight)
        }
        var init =function(){
            get_height()
            $(window).bind("resize",get_height)
        }
        $this.destroy = function(){
            $this.css("height","")
            $(window).unbind("resize",get_height)
        }
        init();
        return this
    }
})(jQuery);

// $(document).ready(function() {
//     $('a[href^=#]').bind('click', jump);

//     if (location.hash) {
//         setTimeout(function() {
//             $('html, body')
//                 .scrollTop(0)
//                 .show();
//             jump();
//         }, 0);
//     } else {
//         $('html, body').show();
//     }
// });

$(function () {
    $('a[href*="#"]:not([href="#"], [data-toggle=collapse])').click(function () {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if ($(".menu-icon").is(":visible") && $(".menu-icon").hasClass("active")) {
                $(".menu-icon").trigger("click");
            }
            if (target.length) {
                $('.enumenu_ul li').removeClass("active");
                $(this).parent().addClass("active");
                $('html, body').stop().animate({
                    scrollTop: target.offset().top - $("header").outerHeight(true)
                }, 1000, function () {
                    var t = target.offset().top
                    if (t != $(window).scrollTop()) {
                        $('html, body').stop().animate({
                            scrollTop: target.offset().top - $("header").outerHeight(true)
                        }, 100);
                    }
                });
                return false;
            }
        }
    });
});

/****** svg fxn ******/

$(function () {
    jQuery('img.svg').each(function () {
        var $img = jQuery(this);
        var imgID = $img.attr('id');
        var imgClass = $img.attr('class');
        var imgURL = $img.attr('src');

        jQuery.get(imgURL, function (data) {
            // Get the SVG tag, ignore the rest
            var $svg = jQuery(data).find('svg');

            // Add replaced image's ID to the new SVG
            if (typeof imgID !== 'undefined') {
                $svg = $svg.attr('id', imgID);
            }
            // Add replaced image's classes to the new SVG
            if (typeof imgClass !== 'undefined') {
                $svg = $svg.attr('class', imgClass + ' replaced-svg');
            }

            // Remove any invalid XML tags as per http://validator.w3.org
            $svg = $svg.removeAttr('xmlns:a');


            $img.replaceWith($svg);

        }, 'xml');

    });
});
$('.tribe-bar-views-inner').change(function (e) {
    console.log("hit");
    window.location.href = $(".tribe-bar-views-inner option:selected").attr('value');
});

$(document).ready(function() {
    $('.modal').each(function() {
        var src = $(this)
            .find('iframe')
            .attr('src');

        $(this).on('click', function() {
            $(this)
                // .find('iframe')
                .stopVideo();
            $(this)
                .find('iframe')
                .attr('src', src);
        });
    });
});