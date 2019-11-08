/* $ global, var, alert */

$(document).ready(function () {
    
    'use strict';
    
    $(window).scroll(function () {
		if ($(this).scrollTop() >= 159) {
			$(".header .header-bottom").addClass('fixed-header');
			$(".header").addClass('header_height');
		} else {
			$(".header .header-bottom").removeClass('fixed-header');
            $(".header").removeClass('header_height');
        }
	});

    /************************************
    Start Header Category Big Screen 
    ************************************/
    $(".header .header-bottom .links-navbar .categories p").on('click', function () {
        $(".header .header-bottom .links-navbar .categories").toggleClass('catOpen');
        $(".header .header-bottom .links-navbar .categories .links-category").slideToggle(400);
    });

    $(window).on('click', function () {
        $(".header .header-bottom .links-navbar .categories").removeClass('catOpen');
        $(".header .header-bottom .links-navbar .categories .links-category").slideUp(400);
        $(".links-category-mobile").addClass("hidden-links-category");
    });
    
    $('.header .header-bottom .links-navbar .categories, .category-mobile i, .links-category-mobile ').click(function (event) {
        event.stopPropagation();
    });
    /************************************
    End Header Category Big Screen 
    ************************************/

    /************************************
    Start Links Menu Mobile
    ************************************/
    $(".links-mobile i").on('click', function () {
        $(".links-menu-mobile").addClass("show-menu-mobile");
    });

    $(".links-menu-mobile h3 span").on('click', function () {
        $(".links-menu-mobile").removeClass("show-menu-mobile");
    });
    /************************************
    End Links Menu Mobile
    ************************************/

    /************************************
    Start Slider
    ************************************/
    $("#slider").responsiveSlides({
        auto: true,
        pager: false,
        nav: true,
        speed: 500,
        namespace: "callbacks",
        before: function () {
          $('.events').append("<li>before event fired.</li>");
        },
        after: function () {
          $('.events').append("<li>after event fired.</li>");
        }
      });
    /************************************
    End Slider
    ************************************/


    $('.confirm').click(function () {
        return confirm('Are You Sure Delete Item?');
    });


    $('.confirm_cancel').click(function () {
        return confirm('Are You Sure Cancel Order?');
    });

        
});
    
    