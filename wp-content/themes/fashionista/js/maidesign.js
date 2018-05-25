jQuery(function($){
    "use strict";	

	// Search
	
	$('#top-search a').on('click', function ( e ) {
		e.preventDefault();
    	$(".show-search").toggle("ease");

        if($("#top-social").css("opacity") == 1) // show share button?
            $("#top-social").css({ opacity: 0 });  // hide 
        else
            $("#top-social").css({ opacity: 1 }); // show
    });
	
	// Menu
	$('#navigation-wrapper .menu').slicknav({
		prependTo:'.menu-mobile',
		label:''
	});
	
	// Bxslider
	$('.bxslider').bxSlider({
	  adaptiveHeight: true,
	  mode: 'fade',
	  pager: false,
	  captions: true
	});           
    
	// Fitvids
	$(document).ready(function(){
		// Target your .container, .wrapper, .post, etc.
		$(".container").fitVids();
	});
	
	// Scroll to top
	
	$('.to-top').click(function(){
		$('html, body').animate({scrollTop : 0},800);
		return false;
	});
    
    if ($(".widget .list_cat_with_img li").length){  
        $(".widget .list_cat_with_img li").click(function() {
          window.location = $(this).find("a").attr("href"); 
          return false;
        });
    }
    if ($(window).width() < 1280) {
       $(".owl-carousel .item").click(function() {
          window.location = $(this).find("a.intro_title").attr("href"); 
          return false;
        });
    }
    
    $('.owl-carousel').owlCarousel({
        loop:true,
        autoplay: true,
        margin:0,
        nav:false,
        responsiveClass:true,
        responsive:{
            0: {
                items: 1
            },
            480:{
                items:2
            },
            768:{
                items:3
            },
            1680:{
                items:4
            }
        }
    });

    $('.btnPinIt').click(function() {
        var url = $(this).attr('href');
        var media = $(this).attr('data-image');
        var desc = $(this).attr('data-desc');
        window.open("//www.pinterest.com/pin/create/button/"+
        "?url="+url+
        "&media="+media+
        "&description="+desc,"_blank");
        return false;
    });

});


