(function($) {

	jQuery.fn.superbgimage = function(loadingoptions) {

		// plugin-options
		var options = $.extend($.fn.superbgimage.defaults, $.fn.superbgimage.options, loadingoptions);

		$.superbg_inAnimation = false;
		$.superbg_slideshowActive = false;
		$.superbg_imgIndex = 1;
		$.superbg_imgActual = 1;
		$.superbg_imgLast = -1;
		$.superbg_imgSlide = 0;
		$.superbg_interval = 0;
		$.superbg_preload = 0;
		$.superbg_direction = 0;
		$.superbg_max_randomtrans = 7;
		$.superbg_lasttrans = -1;
		$.superbg_isIE6 = false;
		$.superbg_firstLoaded = false;
		
		// save the id of the thumbnails/links
		$.superbg_saveId = $(this).attr('id'); 
 
		// set required css options
		$('#' + options.id).css('display', 'none').css('z-index', options.z_index);

		// hide all images, set position absolute
		$('#' + options.id + ' img').hide().css('position', 'absolute'); 
	
		// add rel-attribute with index to all existing images
		$('#' + options.id).children('img').each(function() {
			$(this).attr('rel', $.superbg_imgIndex++);
		});

		// add rel-attribute with index to all links
		$(this).children('a').each(function() {
			// add click-event to links, add class for preload
			$(this).attr('rel', $.superbg_imgIndex++).click(function() {
				$(this).superbgShowImage();
				return false;
			}).addClass('preload');
		});
		// fix total counter
		$.superbg_imgIndex--; 

		// bind load-event to show 1st image on document load
		$(window).bind('load', function() {
    		$(this).superbgLoad();
		});

		// bind resize-event to resize actual image
		$(window).bind('resize', function() {
    		$(this).superbgResize();
		});

		
		return this;
		
	};

	// fix for IE6, handle scrolling-event
	jQuery.fn.superbgScrollIE6 = function() {
	
		var options = $.extend($.fn.superbgimage.defaults, $.fn.superbgimage.options);

		// set top of the container
		$('#' + options.id).css('top', document.documentElement.scrollTop + 'px');
		
	};
		
	// handle load-event, show 1st image
	jQuery.fn.superbgLoad = function() {

		var options = $.extend($.fn.superbgimage.defaults, $.fn.superbgimage.options);

		// show container only if images/links exist
		if (($('#' + options.id).children('img').length > 0) || ($('#' + $.superbg_saveId).children('a').length > 0)) {
			$('#' + options.id).show();
		}
		
		// 1st image to display set in options?
		if ((typeof options.showimage != 'undefined') && (options.showimage >= 0)) {
			$.superbg_imgActual = options.showimage;
		}

		
		// display 1st image
		$(this).superbgShowImage($.superbg_imgActual);

	};

	// timer-function for preloading images
	jQuery.fn.superbgimagePreload = function() {	

		var options = $.extend($.fn.superbgimage.defaults, $.fn.superbgimage.options);

		// clear timer
		clearInterval($.superbg_preload);

		// preload only if first image is loaded and linked images exist
		if (!$.superbg_firstLoaded && ($('#' + $.superbg_saveId).children('a').length > 0)) {
			$.superbg_preload = setInterval("jQuery(this).superbgimagePreload()", 111);
			return;
		}
	
		// get first image that is not loaded
		$('#' + $.superbg_saveId).children('a.preload:first').each(function() {

			// get image index and title
			var imgrel = $(this).attr('rel');
			var imgtitle = $(this).attr('title');

			// preload image, set rel and title, prepend image to container, remove preload class
			var img = new Image();
			$(img).load(function() {
				$(this).css('position', 'absolute').hide();
				if ($('#' + options.id).children('img' + "[rel='" + imgrel + "']").length === 0) {
					$(this).attr('rel', imgrel);
					$('#' + options.id).prepend(this);
				}					
				img.onload=function(){};
			}).error(function() {
				img.onerror=function(){};
			}).attr('src', $(this).attr('href'));
			
			// set timer to preload next image
			$.superbg_preload = setInterval("jQuery(this).superbgimagePreload()", 111);

		}).removeClass('preload');
		
	};

	// start slideshow
	jQuery.fn.startSlideShow = function() {	

		var options = $.extend($.fn.superbgimage.defaults, $.fn.superbgimage.options);

		// save active image
		$.superbg_imgSlide = $.superbg_imgActual;

		// clear previous timer
		if ($.superbg_interval !== 0) {
			clearInterval($.superbg_interval);
		}

		// set timer and switch
		$.superbg_interval = setInterval("jQuery(this).nextSlide()", options.slide_interval);
		$.superbg_slideshowActive = true;
		
		return false;
		
	};

	// stop slideshow
	jQuery.fn.stopSlideShow = function() {	

		var options = $.extend($.fn.superbgimage.defaults, $.fn.superbgimage.options);

		// clear timer, set switch
		clearInterval($.superbg_interval);
		$.superbg_slideshowActive = false;

		return false;
		
	};
	
	// next slide
	jQuery.fn.nextSlide = function() {	

		var options = $.extend($.fn.superbgimage.defaults, $.fn.superbgimage.options);
		
		// animation is running?
		if ($.superbg_inAnimation) return false;

		// clear timer when slideshow is active
		if ($.superbg_slideshowActive) {
			clearInterval($.superbg_preload);
		}

		// direction for transition 90+91
		$.superbg_direction = 0;
	
		// index to next slide
		$.superbg_imgSlide++;
		if ($.superbg_imgSlide > $.superbg_imgIndex) {
			$.superbg_imgSlide = 1;
		}

		
		// set actual index
		$.superbg_imgActual = $.superbg_imgSlide;
		
		// show image
		return $(this).superbgShowImage($.superbg_imgActual);

	};

	// previous slide
	jQuery.fn.prevSlide = function() {	

		var options = $.extend($.fn.superbgimage.defaults, $.fn.superbgimage.options);

		// animation is running?
		if ($.superbg_inAnimation) return false;

		// direction for transition 90+91
		$.superbg_direction = 1;
		
		// index to previous slide
		$.superbg_imgSlide--;
		if ($.superbg_imgSlide < 1) {
			$.superbg_imgSlide = $.superbg_imgIndex;
		}
		
		
		// set actual index
		$.superbg_imgActual = $.superbg_imgSlide;
		
		// show image
		return $(this).superbgShowImage($.superbg_imgActual);

	};
	
	// handle resize-event, resize active image
	jQuery.fn.superbgResize = function() {	

		var options = $.extend($.fn.superbgimage.defaults, $.fn.superbgimage.options);
	
		// get active image
		var thisimg = $('#' + options.id + ' img.activeslide');

		// calculate size and position
		var dimensions = $(this).superbgCalcSize($(thisimg).width(), $(thisimg).height());
		var newwidth = dimensions[0];
		var newheight = dimensions[1];
		var newleft = dimensions[2];
		var newtop = dimensions[3];

		// set new width/height
		$(thisimg).css('width', newwidth + 'px');
		$(thisimg).css('height', newheight + 'px');
	
		
		// set new left position
		$(thisimg).css('left', '0px');

		// set new top 0
			$(thisimg).css('top', '0px');
			
	};	

	// calculate image size, top and left position
	jQuery.fn.superbgCalcSize = function(imgw, imgh) {		

		var options = $.extend($.fn.superbgimage.defaults, $.fn.superbgimage.options);

		//لسا في خطأ في الحساب والاختيار
		// browserwidth = $('#' + options.id).width();
		// browserheight = $('#' + options.id).height();
		browserwidth = 1366;
		browserheight = 768;
		

		// calculate new size
		var newheight = imgh; var newwidth = imgw;
		if (browserheight < imgh) {
			newheight = browserheight;
			newwidth = Math.round(imgw * browserheight / imgh);
		}
		if (browserwidth < imgw) {
			newwidth = browserwidth;
			newheight = Math.round(imgh * browserwidth / imgw);
		}
		
		// calculate new left and top position
		var newleft = Math.round((browserwidth - newwidth) / 2);
		var newtop = Math.round((browserheight - newheight) / 2);
		
		var rcarr = [newwidth, newheight, newleft, newtop];
		return rcarr;
		
	};

	// show image, call callback onHide
	jQuery.fn.superbgShowImage = function(img) {	
		var options = $.extend($.fn.superbgimage.defaults, $.fn.superbgimage.options);
		
		// get image-index from rel-attribute of the link
		$.superbg_imgActual = $(this).attr('rel');
		if (typeof img !== 'undefined') {
			$.superbg_imgActual = img;
		}

		// exit when already active image 
		if ($('#' + options.id + ' img.activeslide').attr('rel') === $.superbg_imgActual) {
			return false;
		}

		// exit when animation is running, otherwise set switch
		if ($.superbg_inAnimation) { 
			return false; 
		} else { 
			$.superbg_inAnimation = true; 
		}

		// get source and title from image
		var imgobj = $('#' + options.id).children('img' + "[rel='" + $.superbg_imgActual + "']");
		var imgsrc = imgobj.attr('src');
		$('#d-imgsize').text (imgobj.width()+'X'+imgobj.height());
		$('#d-imgtype').text (imgsrc.split('.').pop());

		// callback function onHide
		if ((typeof options.onHide === 'function') && (options.onHide !== null) && ($.superbg_imgLast >= 0)) {
			options.onHide($.superbg_imgLast);
		}

		// load the image, do selected transition
		$('#' + options.id + ' img.activeslide').superbgLoadImage(imgsrc);
		
		// set class activeslide for the actual link
		$('#' + $.superbg_saveId + ' a').removeClass('activeslide');
		$('#' + $.superbg_saveId).children('a' + "[rel='" + $.superbg_imgActual + "']").addClass('activeslide');

		// save image-index
		$.superbg_imgSlide = $.superbg_imgActual;
		$.superbg_imgLast = $.superbg_imgActual;
		
		return false;

	};		

	// load image, show the image and perform the transition
	jQuery.fn.superbgLoadImage = function(imgsrc) {

		var options = $.extend($.fn.superbgimage.defaults, $.fn.superbgimage.options);

		// load image, add image to container
		if ($('#' + options.id).children('img' + "[rel='" + $.superbg_imgActual + "']").length === 0) {
			var img = new Image();
			$(img).load(function() {
				$(this).css('position', 'absolute').hide();
				if ($('#' + options.id).children('img' + "[rel='" + $.superbg_imgActual + "']").length === 0) {
					$(this).attr('rel', $.superbg_imgActual);
					$('#' + options.id).prepend(this);
				}					
				var thisimg = $('#' + options.id).children('img' + "[rel='" + $.superbg_imgActual + "']");
				var dimensions = $(this).superbgCalcSize(img.width, img.height);
				// perform the transition
				$(this).superbgTransition(thisimg, dimensions);
				// first image loaded?	
				if (!$.superbg_firstLoaded) {
					// starting slideshow
					$(this).startSlideShow();
					// preload files when images are linked
					if ((options.preload === 1) && ($('#' + $.superbg_saveId).children('a').length > 0)) {
						$.superbg_preload = setInterval("jQuery(this).superbgimagePreload()", 250);
					}
				}
				$.superbg_firstLoaded = true;
				img.onload=function(){};
			}).error(function() {
				$.superbg_inAnimation = false;
				img.onerror=function(){};
			}).attr('src', imgsrc);
		// image already loaded	
		} else {
			var thisimg = $('#' + options.id).children('img' + "[rel='" + $.superbg_imgActual + "']");
			var dimensions = $(this).superbgCalcSize($(thisimg).width(), $(thisimg).height());
			// perform the transition
			$(this).superbgTransition(thisimg, dimensions);
			if (!$.superbg_firstLoaded) {
				// starting slideshow
				$(this).startSlideShow();
				// preload files when images are linked
				if ((options.preload === 1) && ($('#' + $.superbg_saveId).children('a').length > 0)) {
					$.superbg_preload = setInterval("jQuery(this).superbgimagePreload()", 250);
				}
				$.superbg_firstLoaded = true;
			}	
		}	

	};

	// perform the transition
	jQuery.fn.superbgTransition = function(thisimg, dimensions) {

		var options = $.extend($.fn.superbgimage.defaults, $.fn.superbgimage.options);

		var newwidth = dimensions[0];
		var newheight = dimensions[1];
		var newleft = dimensions[2];
		var newtop = dimensions[3];

		// set new width, height and left position		
		$(thisimg).css('width', newwidth + 'px').css('height', newheight + 'px').css('left', newleft + 'px');

		// callbacks onClick, onMouseenter, onMouseleave, onMousemove
		if ((typeof options.onClick === 'function') && (options.onClick !== null)) {
			$(thisimg).unbind('click').click(function() { options.onClick($.superbg_imgActual); });
		}
		if ((typeof options.onMouseenter === 'function') && (options.onMouseenter !== null)) {
			$(thisimg).unbind('mouseenter').mouseenter(function() { options.onMouseenter($.superbg_imgActual); });
		}
		if ((typeof options.onMouseleave === 'function') && (options.onMouseleave !== null)) {
			$(thisimg).unbind('mouseleave').mouseleave(function() { options.onMouseleave($.superbg_imgActual); });
		}
		if ((typeof options.onMousemove === 'function') && (options.onMousemove !== null)) {
			$(thisimg).unbind('mousemove').mousemove(function(e) { options.onMousemove($.superbg_imgActual, e); });
		}
				
		// set new top to 0
			$(thisimg).css('top', '0px');
		
		// prepare last active slide for transition out/hide
		$('#' + options.id + ' img.activeslide').removeClass('activeslide').addClass('lastslide').css('z-index', 0);
		
		// set z-index on new active image
		$(thisimg).css('z-index', 1);

		// be sure transition is numeric
		options.transition = parseInt(options.transition, 10);
		$.superbg_lasttrans = options.transition;
		
		// no transition
		var theEffect = ''; var theDir = '';
		
			$(thisimg).fadeIn(options.speed, function() {
				if ((typeof options.onShow === 'function') && (options.onShow !== null)) options.onShow($.superbg_imgActual);
				$('#' + options.id + ' img.lastslideno').hide(1, null).removeClass('lastslideno');
				$.superbg_inAnimation = false;
				if ($.superbg_slideshowActive) {
					$('#' + options.id).startSlideShow();
				}
			}).addClass('activeslide');
		// other transitions slide and blind
		
		
			// add some time to out speed
			var outspeed = options.speed;
			if (options.speed == 'slow') {
				outspeed = 600 + 200;
			} else if (options.speed == 'normal') {
				outspeed = 400 + 200;
			} else if (options.speed == 'fast') {
				outspeed = 400 + 200;
			} else {
				outspeed = options.speed + 200;
			}


			// transition fadeIn
			$('#' + options.id + ' img.lastslide').fadeOut(outspeed).removeClass('lastslide');

		
	};

	// default options
	jQuery.fn.superbgimage.defaults = {
		id: 'superbgimage', // id for the containter
		z_index: 0, // z-index for the container
		showimage: 1, // number of first image to display
		slide_interval: 4000, // interval for the slideshow
		speed: 'slow', // animation speed
		preload: 1, // 0-none, 1-preload images
		onShow: null, // function-callback show image
		onClick: null, // function-callback click image
		onHide: null, // function-callback hide image
		onMouseenter: null, // function-callback mouseenter
		onMouseleave: null, // function-callback mouseleave
		onMousemove: null // function-callback mousemove
	};

})(jQuery);