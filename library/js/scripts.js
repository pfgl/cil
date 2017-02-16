/*
 * Guybrush Scripts File
 * Author: Jack Machin
 *
 * This file should contain any js scripts you want to add to the site.
 * Instead of calling it in the header or throwing it inside wp_head()
 * this file will be called automatically in the footer so as not to
 * slow the page load.
 *
 * There are a lot of example functions and tools in here. If you don't
 * need any of it, just remove it. They are meant to be helpers and are
 * not required. It's your world baby, you can do whatever you want.
*/

/*global $, jQuery, alert*/

/*
 * Get Viewport Dimensions
 * returns object with viewport dimensions to match css in width and height properties
 * ( source: http://andylangton.co.uk/blog/development/get-viewport-size-width-and-height-javascript )
*/
function updateViewportDimensions() {
    "use strict";
	var w = window,
        d = document,
        e = d.documentElement,
        g = d.getElementsByTagName('body')[0],
        x = w.innerWidth || e.clientWidth || g.clientWidth,
        y = w.innerHeight || e.clientHeight || g.clientHeight;
	return { width: x, height: y };
}
// setting the viewport width
var viewport = updateViewportDimensions();

function selectThis(id) {
    "use strict";
    //Off to a fine start, could search the DOM Element and do a .each function on the divs inside, or just hide all of that class...
    jQuery('.ifa-details').fadeOut(500);
    // ID of Body plus whatever param we pass down,
    jQuery('#details-' + id).delay(500).fadeIn(500);
    //Remove that pesky selected from all
}

/*
 * Throttle Resize-triggered Events
 * Wrap your actions in this function to throttle the frequency of firing them off, for better performance, esp. on mobile.
 * ( source: http://stackoverflow.com/questions/2854407/javascript-jquery-window-resize-how-to-fire-after-the-resize-is-completed )
*/
var waitForFinalEvent = function () {
    "use strict";
	var timers = {};
	return function (callback, ms, uniqueId) {
		if (!uniqueId) { uniqueId = "Don't call this twice without a uniqueId"; }
		if (timers[uniqueId]) { clearTimeout(timers[uniqueId]); }
		timers[uniqueId] = setTimeout(callback, ms);
	};
};

// how long to wait before deciding the resize has stopped, in ms. Around 50-100 should work ok.
var timeToWaitForLast = 100;


/*
 * Here's an example so you can see how we're using the above function
 *
 * This is commented out so it won't work, but you can copy it and
 * remove the comments.
 *
 *
 *
 * If we want to only do it on a certain page, we can setup checks so we do it
 * as efficient as possible.
 *
 * if( typeof is_home === "undefined" ) var is_home = $('body').hasClass('home');
 *
 * This once checks to see if you're on the home page based on the body class
 * We can then use that check to perform actions on the home page only
 *
 * When the window is resized, we perform this function
 * $(window).resize(function () {
 *
 *    // if we're on the home page, we wait the set amount (in function above) then fire the function
 *    if( is_home ) { waitForFinalEvent( function() {
 *
 *      // if we're above or equal to 768 fire this off
 *      if( viewport.width >= 768 ) {
 *        console.log('On home page and window sized to 768 width or more.');
 *      } else {
 *        // otherwise, let's do this instead
 *        console.log('Not on home page, or window sized to less than 768.');
 *      }
 *
 *    }, timeToWaitForLast, "your-function-identifier-string"); }
 * });
 *
 * Pretty cool huh? You can create functions like this to conditionally load
 * content and other stuff dependent on the viewport.
 * Remember that mobile devices and javascript aren't the best of friends.
 * Keep it light and always make sure the larger viewports are doing the heavy lifting.
 *
*/


/*
 * Put all your regular jQuery in here.
*/
jQuery(document).ready(function ($) {
    "use strict";

    viewport = updateViewportDimensions();
    // if the viewport is tablet or smaller, we slide sub menus on tap
    if (viewport.width <= 768) {

        $('.menu-item-has-children').on('tap', function () {

            $('.sub-menu').slideUp(100); // slide up all open sub menus
            $('.menu-item').removeClass('tapped'); //remove the tapped class from active parent
            $(this).children('.sub-menu').delay(100).slideDown(200); // delay, then slide down the active sub menu
            $(this).addClass('tapped'); // add the tapped class to the active parent
        });

        $('.sub-menu').css({"width": viewport.width});
    }

    // if the viewport is tablet or larger, we slide sub menus on hover
    if (viewport.width >= 768) {
        $('.menu-item-has-children').hover(
            function () {
                $(this).children('.sub-menu').slideDown(200);
            },

            function () {
                $(this).children('.sub-menu').slideUp(200);
            }
        );
    }

    var visited = $.cookie("pfglcookie");


    if (visited === null) {
        $('.cookie_layer').show();
        $.cookie('pfglcookie', 'yes', { expires: 365, path: '/' });
    }
    $.cookie('pfglcookie', 'yes', { expires: 365, path: '/' });

   /* var yourFade = 1, // the amount of time in seconds that the elements will fade in fade out
        yourDelay = 2, // the amount of time in seconds that there will be a delay between the fade ins and fade outs
        fadeTime = yourFade * 1000, //convert fade seconds to milliseconds (1000)
        delayTime = yourDelay * 1000, // convert delay seconds to milliseconds (2000)
        totalTime = delayTime, //3000 milliseconds...needed for all those delays we talked about
        allElems, // find out exactly how many page elements have the 'toBeFaded' class (4)
        elemNoFade, // Will help us find the last element represent the last element (3)
        i,
        fadingElem;

    for (i = 0, allElems = $('.testimonial').length, elemNoFade = allElems - 1; i < allElems; i = 1) {
        fadingElem = "#test" + i;
        if (i === 0) {
            $(fadingElem).fadeIn(fadeTime).delay(delayTime).fadeOut(fadeTime);
        } else if (i === elemNoFade) {
            $(fadingElem).delay(totalTime * i).fadeIn(fadeTime);
        } else {
            $(fadingElem).delay(totalTime * i).fadeIn(fadeTime).delay(delayTime).fadeOut(fadeTime);
        }
    } */

    $('.bullet').hover(
        function () {
            $(this).addClass('active');
            $(this).children('.map-logo').fadeIn(200);
        },

        function () {
            $(this).removeClass('active');
            $(this).children('.map-logo').fadeOut(200);
        }
    );


	// animate banner images
	$('.banner').hover(function () {
		var thumbOver = $(this).find('img').attr('src'); // Get image url and assign it to 'thumbOver'

		//Set a background image(thumbOver) on the <a> tag - Set position to bottom
		$(this).css({'background' : 'url(' + thumbOver + ') no-repeat center bottom'});

		//Animate the image to 0 opacity (fade it out)
		$(this).find('img').stop().fadeTo('normal', 0, function () {
			$(this).hide(); //Hide the image after fade
		});
	}, function () { //on hover out...
		//Fade the image to full opacity
		$(this).find('img').stop().fadeTo('normal', 1).show();
	});

}); /* end of as page load scripts */
