
// menu sticky
$(window).scroll(function() {
    if ($(this).scrollTop() > 25){  
        $('.wrap_menu').addClass("sticky");
    }
    else{
        $('.wrap_menu').removeClass("sticky");
    }
});

// menu
$(window).on('load', function () {
    var mmH = $('.wrap_menu').outerHeight(true)
    // $('body').eq(0).css('padding-top', mmH);
});

$( document ).ready(function() {
    
    $('.wrap_btn_menu').click(function(event) {
		if (!$(".mainmenu").hasClass("open")) {
            //$(this).addClass("active");
            $('.mainmenu').addClass('open');
            $("body").addClass("menuopened");
		  } else {
            $('.mainmenu').removeClass('open'); 
            //$(this).removeClass("active");
            $("body").removeClass("menuopened");
		  }
		  event.stopPropagation();
	});

   
    
     $('.close_menu').click(function(event) {
        $('.mainmenu').removeClass('open');
        $(this).removeClass("active");
        $("body").removeClass("menuopened");
    });
    
  var previousScroll = 0;
      $(window).scroll(function(event){
        var scroll = $(this).scrollTop();
        if (scroll > previousScroll){
            $('.wrap_menu').addClass('hide');
        } else {
            $('.wrap_menu').removeClass('hide');
        }
        previousScroll = scroll;
      });
      $('.wrap_menu').removeClass('hide');

     $( '.hassub' ).click(function (event) {
	  if (  $(this).children( ".submenu" ).is( ":hidden" ) ) {
		  	$('.submenu').hide();
            $(this).children('.submenu').slideDown();
	  } else {
          $('.submenu').slideUp();
	  }
	  //event.stopPropagation();
	});

//   $( '.submenu_white.submenu > ul > li' ).click(function (event) {
//     $('.submenu_white.submenu').removeClass('loading');
// 	    if (  $(this).children( "ul" ).is( ":hidden" ) ) {
// 		  	$(this).siblings('li').find('ul').hide();
           
//             $('.submenu_white.submenu > ul > li').removeClass('active');
//             $(this).addClass('active');
//             $(this).children('ul').fadeIn();
// 	  } else {
//       if (Modernizr.mq('(max-width: 991px)')) {
//         $(this).children('ul').hide();
//       }
// 	  }
// 	  event.stopPropagation();
// 	});

  if (Modernizr.mq('(max-width: 991px)')) {
    $('.mainmenu ul li > .submenu_white.submenu > ul > li').removeClass('active');
  }
    
     $( ".submenu" )
      .mouseenter(function() {
        $(this).clearQueue();
        //event.stopPropagation();
      })
      .mouseleave(function() {
        $(this).delay( 100 ).hide('fade', 300);
      });
    
      $('.submenu_white.submenu').removeClass('loading');


//padding container
var ctnoffset = $('.container').eq(0).offset().left; 
$('.bg-contentproject').css('padding-left', ctnoffset );  
$('.title-banner').css('padding-left', ctnoffset );  

// tab
$( '.tab_article_btn > div' ).click(function (event) {
    var idarticle = $(this).index();
    if( $('.tab_pdetail').eq(idarticle).is(':hidden') ) {
        $('.tab_pdetail').hide();
        $('.tab_pdetail').eq(idarticle).fadeIn();
        $('.tab_article_btn > div').removeClass('active');
        $(this).addClass('active');
    }else{
    }
    event.stopPropagation();
});

});

// owl
$(document).ready(function() {
    $('.owl-bannerslide').owlCarousel({
        loop: true,
        margin: 0,
        autoplay: true,
        autoplayTimeout: 8000,
        autoplayHoverPause: false,
        smartSpeed: 2000,
        nav: false,
        dots: true,
        navText: ['&nbsp;', '&nbsp;'],
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });
    $('.owl-recentnews').owlCarousel({
        loop: true,
        margin: 40,
        autoplay: true,
        autoplayTimeout: 8000,
        autoplayHoverPause: true,
        smartSpeed: 2000,
        nav: false,
        dots: true,
        navText: ['&nbsp;', '&nbsp;'],
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2,
                margin: 30
            },
            1200: {
                items: 3
            }
        }
    });
    $('.owl-benefit').owlCarousel({
        loop: true,
        margin: 50,
        autoplay: true,
        autoplayTimeout: 8000,
        autoplayHoverPause: true,
        smartSpeed: 2000,
        nav: true,
        dots: false,
        navText: ['&nbsp;', '&nbsp;'],
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2,
                margin: 30
            },
            1200: {
                items: 4
            }
        }
    });
    $('.owl-structure').owlCarousel({
        loop: true,
        margin: 50,
        autoplay: true,
        autoplayTimeout: 8000,
        autoplayHoverPause: true,
        smartSpeed: 2000,
        nav: true,
        dots: false,
        navText: ['&nbsp;', '&nbsp;'],
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2,
                margin: 0
            },
            1200: {
                items: 3,
                margin: 30
            },
            1400: {
                items: 3
            }
        }
    });
});

// wow
$( document ).ready(function() {

    $(function(){
        jQuery('img.svg').each(function(){
            var $img = jQuery(this);
            var imgID = $img.attr('id');
            var imgClass = $img.attr('class');
            var imgURL = $img.attr('src');

            jQuery.get(imgURL, function(data) {
                // Get the SVG tag, ignore the rest
                var $svg = jQuery(data).find('svg');

                // Add replaced image's ID to the new SVG
                if(typeof imgID !== 'undefined') {
                    $svg = $svg.attr('id', imgID);
                }
                // Add replaced image's classes to the new SVG
                if(typeof imgClass !== 'undefined') {
                    $svg = $svg.attr('class', imgClass+' replaced-svg');
                }

                // Remove any invalid XML tags as per http://validator.w3.org
                $svg = $svg.removeAttr('xmlns:a');

                // Check if the viewport is set, else we gonna set it if we can.
                if(!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
                    $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'))
                }

                // Replace image with new SVG
                $img.replaceWith($svg);

            }, 'xml');

        });
    });

    wow = new WOW(
        {
    animateClass: 'animated',
    offset: 100
        }
    );
        wow.init();    
});
  

//mousehover change pichure
$(document).ready(function(){
    $('.bg-homefac img:first-child').addClass('active');

$(".btn-menufac > a").mouseenter(function() {
    var imgno = $(this).index();
    $(this).parents('.container').siblings('.bg-homefac').find('img').removeClass('active');
    $(this).parents('.container').siblings('.bg-homefac').find('img').eq(imgno).addClass('active');
  })
  .mouseleave(function() {
    $(this).parents('.container').siblings('.bg-homefac').find('img').removeClass('active');
    $(this).parents('.container').siblings('.bg-homefac').find('img').eq(0).addClass('active');
  });
});






