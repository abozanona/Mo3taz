var content_open = true;
var lower_toggle = false;
var slideShowPlaying = true;
var header_width = jQuery("#header").width() + 65;
var open_space = jQuery(window).width() - header_width;
var floating_slideshow_nav_pos = header_width + ((open_space / 2) - ((jQuery("#floating_slideshow_nav").width()) / 2));
var window_height = jQuery(this).height();
var top_object_height = jQuery("#logo img").height() + jQuery("nav").height();
var mouseX = 0;
var mouseY = 0;
var responsive_width = 1010;
var window_width = 0;
var menu_open = false;
var menu_toggle = false;

function viewport() {
var e = window, a = 'inner';
if (!('innerWidth' in window )) {
    a = 'client';
    e = document.documentElement || document.body;
}
return { width : e[ a+'Width' ] , height : e[ a+'Height' ] };
}

jQuery(document).ready( function() 
{	
	
	window_width = jQuery(window).width();
	
	jQuery( '#post_thumbnail a img, .portfolio_img, .widget_posts_item_image a, .single_lightbox, #logo img, #social-icons ul li a' ).hover( function() 
	{
	
		jQuery( this ).stop().animate({opacity: 0.6}, 800, "easeOutExpo");
			
	}, function () 
	{
		
		jQuery( this ).stop().animate({opacity: 1}, 800, "easeOutExpo");		
			
	});
	
	jQuery( '.gallery-thumb' ).hover( function() 
	{
	
		jQuery( this ).find("img").stop().animate({opacity: 0.7}, 800, "easeOutExpo");
		jQuery( this ).find(".gallery_item_info").stop().animate({opacity: 0}, 800, "easeOutExpo");
			
	}, function () 
	{
		
		jQuery( this ).find("img").stop().animate({opacity: 1}, 800, "easeOutExpo");
		jQuery( this ).find(".gallery_item_info").stop().animate({opacity: 1}, 800, "easeOutExpo");
			
	});
	
	jQuery("nav #responsive_toggle").click(function () 
	{
		
		if (menu_open == false)
		{
			
			jQuery(this).parent().find(".menu").fadeIn();
			
			menu_open = true;
			
			jQuery(this).find("i").remove();
			
			jQuery(this).append('<i class="fa fa-angle-up"></i>');
			
		} else {
			
			jQuery(this).parent().find(".menu").slideUp().fadeOut();
			
			menu_open = false;
			
			jQuery(this).find("i").remove();
			
			jQuery(this).append('<i class="fa fa-angle-down"></i>');

		}
		
		return false;
		
	});
		
	if (jQuery("#thumbs, #thumb_mousemove, #thumbs_hide, #no_cropping").size() > 0) {
	
		var ss_delay = null;
		
	    jQuery("#thumbs, #floating_slideshow_nav, #header, #content").fadeIn(400);
	    ss_delay = setTimeout('jQuery("#thumbs, #floating_slideshow_nav, #header, #content").fadeOut(400);', 3000);
	
		jQuery(window).mousemove(function(event) 
		{
			
			clearTimeout(ss_delay);
			
			if (window_width <= responsive_width)
			{
			
			    jQuery("#floating_slideshow_nav, #content").fadeIn(400);
		
			    ss_delay = setTimeout('jQuery("#thumbs, #floating_slideshow_nav, #header, #content").fadeOut(400);', 3000);		
			    
			} else {
				
			    jQuery("#thumbs, #floating_slideshow_nav, #header, #content").fadeIn(400);
		
			    ss_delay = setTimeout('jQuery("#thumbs, #floating_slideshow_nav, #header, #content").fadeOut(400);', 3000);		
			}
		    
		});		
	
		jQuery("#thumbs ul li.play_stop_button").css("background-position", "-53px -30px");
	
		jQuery("#thumbs ul li.play_stop_button").click(function () {
		
			if (slideShowPlaying == true) {
			
				jQuery("#thumbs").stopSlideShow();	
				jQuery("#thumbs ul li.play_stop_button").css("background-position", "-53px 0px");
				
				slideShowPlaying = false;
			
			} else {
			
				jQuery("#thumbs").startSlideShow();				
				jQuery("#thumbs ul li.play_stop_button").css("background-position", "-53px -30px");
				
				slideShowPlaying = true;
			
			}	
	
		});
		
		jQuery("#thumbs ul li.forward_button").click(function () {
		
			jQuery("#thumbs").nextSlide();	
		
		});
	
		jQuery("#thumbs ul li.backward_button").click(function () {
		
			jQuery("#thumbs").prevSlide();	
		
		});	
		
		if (!jQuery("#slideshow_nav_portrait").length) {		
	
		var thumb_ypos = 0;
		
		jQuery("#thumb_vert_mousemove a").each(function (i) {
		
			jQuery(this).css("top", thumb_ypos);
			
			thumb_ypos += 62;
		
		});
		
		jQuery("#thumb_vert_mousemove").css("overflow", "hidden");
			
		jQuery("#thumb_vert_mousemove").mousemove(function(e){
			var thumb_container_height = (62 * jQuery("#thumb_vert_mousemove a").size());	
			var top = (e.pageY - jQuery(this).offset().top) * (thumb_container_height - (window_height - 140)) / (window_height - 140);
			jQuery(this).scrollTop(top);	
		});
		
		} else {
		
		var thumb_ypos = 0;
		
		jQuery("#thumb_vert_mousemove a").each(function (i) {
		
			jQuery(this).css("top", thumb_ypos);
			
			thumb_ypos += 104;
		
		});
		
		jQuery("#thumb_vert_mousemove").css("overflow", "hidden");
			
		jQuery("#thumb_vert_mousemove").mousemove(function(e){
			var thumb_container_height = (104 * jQuery("#thumb_vert_mousemove a").size());	
			var top = (e.pageY - jQuery(this).offset().top) * (thumb_container_height - (window_height - 140)) / (window_height - 140);
			jQuery(this).scrollTop(top);	
		});	
		
		}

	}

	if (jQuery("#floating_slideshow_nav").length) {
	
		lower_toggle = true;
	
		jQuery("#floating_slideshow_nav ul li.play_stop_button").css("background-position", "-53px -30px");
	
		jQuery("#floating_slideshow_nav ul li.play_stop_button").click(function () {
		
			if (slideShowPlaying == true) {
			
				jQuery("#floating_slideshow_nav").stopSlideShow();	
				jQuery("#floating_slideshow_nav ul li.play_stop_button").css("background-position", "-53px 0px");
				
				slideShowPlaying = false;
			
			} else {
			
				jQuery("#floating_slideshow_nav").startSlideShow();				
				jQuery("#floating_slideshow_nav ul li.play_stop_button").css("background-position", "-53px -30px");
				
				slideShowPlaying = true;
			
			}
		
		
		});
	
		jQuery("#floating_slideshow_nav ul li.forward_button").click(function () {
		
			jQuery("#floating_slideshow_nav").nextSlide();	
		
		});
	
		jQuery("#floating_slideshow_nav ul li.backward_button").click(function () {
		
			jQuery("#floating_slideshow_nav").prevSlide();	
		
		});
		
		if (!jQuery("#floating_slideshow_nav_portrait").length) {
		
		var thumb_xpos = 0;
		
		jQuery("#thumb_mousemove a").each(function (i) {
		
			jQuery(this).css("left", thumb_xpos);
			
			thumb_xpos += 102;
		
		});	
		
		jQuery("#thumb_mousemove").css("overflow", "hidden");
			
		jQuery("#thumb_mousemove").mousemove(function(e){
			var thumb_container_width = 102 * jQuery("#thumb_mousemove a").size();	
			var left = (e.pageX - jQuery(this).offset().left) * (thumb_container_width - 508) / 508;
			jQuery(this).scrollLeft(left);	
		});	
		
		} else {
		
		var thumb_xpos = 0;
		
		jQuery("#thumb_mousemove a").each(function (i) {
		
			jQuery(this).css("left", thumb_xpos);
			
			thumb_xpos += 82;
		
		});	
		
		jQuery("#thumb_mousemove").css("overflow", "hidden");
			
		jQuery("#thumb_mousemove").mousemove(function(e){
			var thumb_container_width = 82 * jQuery("#thumb_mousemove a").size();	
			var left = (e.pageX - jQuery(this).offset().left) * (thumb_container_width - 508) / 508;
			jQuery(this).scrollLeft(left);	
		});		
		
		}
		
	}

	// SHOW/HIDE PAGE background

	jQuery("#cross").hover(function () {
	
		jQuery(this).stop().fadeTo("slow", 1);
		
	}, function () {
	
		jQuery(this).stop().fadeTo("slow", 0.3);
	
	}).fadeTo(0, 0.3);
	
	jQuery("#cross").click(function () {
	
		jQuery("#content, #header").animate({"left": "-1010px"}, 1000, "easeInOutExpo");
		jQuery("body").css("overflow", "hidden").resize();
		jQuery.fn.superbgResize();
			
		content_open = false;		
		
	});
	
	if (jQuery("#fullscreen").length > 0 || jQuery("#fullscreen_page").length > 0) {
		jQuery("#cross").click();
	} 
	
	jQuery("#show_hide").click(function () {
	
		if (content_open == false) {
			
			
			if (responsive_width > viewport().width)
			{
			
			jQuery("#header").animate({"left": "0px"}, 1000, "easeInOutExpo");
			jQuery("#content").animate({"left": "0px"}, 1000, "easeInOutExpo");
			jQuery("body").css("overflow", "auto").resize();		
			jQuery("#floating_slideshow_nav").animate({"left": floating_slideshow_nav_pos}, 1000, "easeInOutExpo");	
			
			} else {
				
			jQuery("#header").animate({"left": "0px"}, 800, "easeInOutExpo");
			jQuery("#content").animate({"left": "255px"}, 800, "easeInOutExpo");
			jQuery("body").css("overflow", "auto").resize();		
			jQuery("#floating_slideshow_nav").animate({"left": floating_slideshow_nav_pos}, 800, "easeInOutExpo");	
			
			}
			
			content_open = true;
			
			if (jQuery("#fullscreen").length > 0) {
				jQuery("#show_hide").unbind("hover").fadeOut();
			}
		
		} else {
		
			
		
			content_open = false;		
		
		}
	
	}).hover(function () {
	
		jQuery(this).stop().fadeTo("slow", 1);
	
	}, function () {
	
		jQuery(this).stop().fadeTo("slow", 0.5);
	
	}).fadeTo(0, 0.3);
	
	jQuery(window).resize(function () {
	
	window_width = jQuery(this).width();
	window_height = jQuery(this).height();
	header_width = jQuery("#header").width() + 65;
	open_space = jQuery(window).width() - 255;
	floating_slideshow_nav_pos = 255 + ((open_space / 2) - ((jQuery("#floating_slideshow_nav").width() + 20) / 2));
	
	jQuery("nav #responsive_toggle").find("i").remove();
			
	jQuery("nav #responsive_toggle").append('<i class="fa fa-angle-down"></i>');
	
	if (lower_toggle == false) {
	
		jQuery("#show_hide").css("top", ((jQuery(window).height() / 2) - (jQuery("#show_hide").height() / 2) - 35) + "px");
	
	} else {
	
		jQuery("#show_hide").css("top", jQuery(window).height() - jQuery("#show_hide").height() - 90);	
	
	}
	
	if (viewport().width > responsive_width) {
	
		jQuery("#content").css({"left": "255px"});
		
		menu_open = true;
		menu_toggle = false;
		
		jQuery("#header,#thumbs").css({"display": "block"});
		
		jQuery("nav ul.menu").css({"display": "block"});
		
		jQuery("nav ul li ul").css({"display": "none"});
		
		jQuery("nav ul li a").attr("data-open", "false");
		
		jQuery("#container").css("width", jQuery(window).width() - (252) + 'px');
	
	} else {
	
		jQuery("#header,#thumbs").css({"display": "none"});

		jQuery("#content").css({"left": "0px"});
		
		menu_open = false;
		menu_toggle = true;
		
		jQuery("nav ul.menu").css({"display": "none"});
		
		jQuery("#container").css("width", "100%");
			
	}
			
	if (viewport().width > responsive_width)
	{
		
		jQuery("#floating_slideshow_nav").css("left", floating_slideshow_nav_pos);
		jQuery("#floating_slideshow_nav").css("bottom", "40px");	

	} else {
		
		jQuery("#floating_slideshow_nav").css("bottom", "2000px");	
		
	}
	
	jQuery("#thumb_vert_mousemove").css("height", jQuery(window).height() - 60);
		
	
	// gmaps
	
	jQuery("#map_canvas").css({"height": (window_height) + 'px'});
	
	if (content_open == false) jQuery("#content, #header").css({"left": "-1010px"});
	
		// MENU CONFIG

	}).resize();
	
	jQuery("nav ul li").hover(function () {
		
		if (menu_toggle == false)
		{
		
			if (jQuery(this).find("ul")) {
			
			jQuery(this).find("ul").css("display", "block").fadeOut(0).fadeIn(300);
			jQuery(this).find("ul li ul").hide();
			
			}
		
		}
		
	}, function () {
	
		if (menu_toggle == false)
		{		
	
			if (jQuery(this).find("ul")) jQuery(this).find("ul").fadeOut(300);
		
		}
	
	});
		
	jQuery("nav > ul > li").each(function () 
	{
		
		if (jQuery(this).find("ul").length > 0)
		{ 
			
			var toggle = '<span> +</span>';
			
			jQuery(this).find("a").append(toggle);
			
			jQuery(this).find("ul li a span").remove();
						
			jQuery(this).find("a").click(function () 
			{
			
				if (jQuery(this).find("span").length > 0) {
													
				if (jQuery(this).attr("data-open") == undefined || jQuery(this).attr("data-open") == "false") {
									
						if (menu_toggle == true)
						{
							
							jQuery(this).parent().find("ul").css("display", "block").fadeOut(0).fadeIn(300);
					
					jQuery(this).parent().find("ul li ul").css("display", "none");
					
					jQuery(this).attr("data-open", "true");	
					
					}
				
				} else {
					
								
						if (menu_toggle == true)
						{
						
					jQuery(this).parent().find("ul").slideUp().fadeOut(0);		
					
					jQuery(this).attr("data-open", "false");	
					
					}
					
				}
				
				return false;
				
				}
				
			});
											
		}
		
	});
	
	jQuery("nav > ul > li > ul > li").each(function () 
	{
		
		if (jQuery(this).find("ul").length > 0)
		{ 
			
			var toggle = '<span> +</span>';
			
			jQuery(this).find("a").append(toggle);
			
			jQuery(this).find("ul li a span").remove();
			
		}
				
	});
	
	jQuery("nav > ul > li > ul > li > ul > li").each(function () 
	{
		
		if (jQuery(this).find("ul").length > 0)
		{ 
			
			var toggle = '<span> +</span>';
			
			jQuery(this).find("a").append(toggle);
			
			jQuery(this).find("ul li a span").remove();
			
		}
		
	});
	
	jQuery("nav > ul > li > ul > li > ul > li").each(function () 
	{
		
		if (jQuery(this).find("ul").length > 0)
		{ 
			
			var toggle = '<span> +</span>';
			
			jQuery(this).find("a").append(toggle);
			
			jQuery(this).find("ul li a span").remove();
			
		}
		
	});
	
	var $container = jQuery('#container');
		
	$container.imagesLoaded( function() {
		jQuery(window).resize();
		jQuery("#container").animate({"opacity": "1"}, 700, "easeOutExpo");
		jQuery("#wall_preloader").fadeOut(700);
	});	

	jQuery(window).resize();
	
	jQuery(".item").hover(function () 
	{
		
		jQuery(this).find(".wall_item_description").stop().animate({opacity: 1}, 600, "easeOutExpo");
		
	}, function () 
	{
		
		jQuery(this).find(".wall_item_description").stop().animate({opacity: 0}, 600, "easeOutExpo");		
		
	});
		
});

