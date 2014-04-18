/* jshint browser:true, jquery:true */

var rp3 = (function($) {

	'use strict';

	var 

	/**
	 * setHomePageFrames
	 */
	setHomePageFrames = function() {
		var clientHeight = document.documentElement.clientHeight,
			$splash = $('#splash'),
			$interstitial = $('#interstitial'),
			$caseStudies = $('#case-studies');

		if ( isiPhone() ) {
			clientHeight = clientHeight + 69;
		}

		$splash.height(clientHeight);
		// $interstitial.height( clientHeight ).css( 'margin-top', clientHeight + 'px' );

		$caseStudies.css('margin-top', clientHeight + 'px');
		$caseStudies.find('article').height( clientHeight );
		// $caseStudies.find('.nscorp').css( 'margin-top', clientHeight + 'px' );
		// $caseStudies.find('two').css( 'margin-top', ( clientHeight * 3 ) + 'px' );
	},

	homePageVideo = function() {
		var clientWidth = document.documentElement.clientWidth,
			$splash = $('#splash'),
			$splashSlideshow = $splash.find('#splash-slideshow'),
			$video;

		$video = $('<div>').attr('id', 'video-wrapper').addClass('video-wrapper')
			.append( $('<video autoplay loop muted>').append( $('<source>').attr('src', 'video/background.m4v') ) );

		if ( clientWidth >= 640 ) {
			$splashSlideshow.remove();
			$splash.append( $video );
		}
	},

	homePageAccordion = function() {
		var clientWidth = document.documentElement.clientWidth;
		if ( clientWidth < 640 ) {
			$('#accordion').accordion({
				header: 'h1',
				collapsible: true,
				active: false,
				heightStyle: 'content'
			});
		}
	},

	homePageClients = function() {
		var $clientsUl = $('#clients ul');

		$clientsUl.masonry({
			columnWidth: 160
		});
	},

	showMainNav = function() {
		var $siteNavigation = $('#site-navigation');

		$siteNavigation.slideToggle();
	},
	toggleNavigation = function() {
		var $menuOpen = $("#menu-open");

		$menuOpen.on('click', function(e) {
			e.preventDefault();
			showMainNav();
		});
	},

	/**
	 * Navigation Anchor
	 */
	navigationAnchor = function() {
		var $siteNavigation = $('#site-navigation');

		var y = $siteNavigation.offset().top,
			scrollY = $(window).scrollTop();

		if ( scrollY >= y ) {
			$siteNavigation.addClass('fixed');
		} else {
			$siteNavigation.removeClass('fixed');
		}
	},

	/**
	 * Determine if we're on an iPhone/iPod Touch
	 * browser sniffing. yuck.
	 * HT http://www.ethanhackett.com/?blog=window-height-100-on-mobile-safari-coding-solution
	 */
	isiPhone = function() {
		var nAgt = navigator.userAgent,
			nPlt = navigator.platform;

		if ( nPlt.indexOf( 'iPhone' ) !== -1 || nPlt.indexOf( 'iPod' ) !== -1 ) {
			if ( ( nAgt.indexOf( 'Safari' ) ) !== -1 ) {
				return true;
			}
		}

		return false;
	},

	init = function() {
		// setHomePageFrames();
		// homePageVideo();
		// homePageAccordion();
		toggleNavigation();
		// homePageClients();
		
		$(window).on( 'scroll', function() {
			navigationAnchor();
		});
	};

	return {
		init:init
	};

}(jQuery));

(function() {
	'use strict';
	rp3.init();
}());
