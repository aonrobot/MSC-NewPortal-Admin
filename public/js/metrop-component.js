		jQuery(document).ready(function($){
	var tabs = $('.cd-tabs');

	tabs.each(function(){
		var tab = $(this),
			tabItems = tab.find('ul.cd-tabs-navigation'),
			tabContentWrapper = tab.children('ul.cd-tabs-content'),
			tabNavigation = tab.find('nav');

		tabItems.on('click', 'a', function(event){
			event.preventDefault();
			var selectedItem = $(this);
			if( !selectedItem.hasClass('selected') ) {
				var selectedTab = selectedItem.data('content'),
					selectedContent = tabContentWrapper.find('li[data-content="'+selectedTab+'"]'),
					slectedContentHeight = selectedContent.innerHeight();

				tabItems.find('a.selected').removeClass('selected');
				selectedItem.addClass('selected');
				selectedContent.addClass('selected').siblings('li').removeClass('selected');
				//animate tabContentWrapper height when content changes
				tabContentWrapper.animate({
					'height': slectedContentHeight
				}, 200);
			}
		});

		//hide the .cd-tabs::after element when tabbed navigation has scrolled to the end (mobile version)
		checkScrolling(tabNavigation);
		tabNavigation.on('scroll', function(){
			checkScrolling($(this));
		});
	});

	$(window).on('resize', function(){
		tabs.each(function(){
			var tab = $(this);
			checkScrolling(tab.find('nav'));
			tab.find('.cd-tabs-content').css('height', 'auto');
		});
	});

	function checkScrolling(tabs){
		var totalTabWidth = parseInt(tabs.children('.cd-tabs-navigation').width()),
		 	tabsViewport = parseInt(tabs.width());
		if( tabs.scrollLeft() >= totalTabWidth - tabsViewport) {
			tabs.parent('.cd-tabs').addClass('is-ended');
		} else {
			tabs.parent('.cd-tabs').removeClass('is-ended');
		}
	}
});

/*****		Nav JS		****/
/////////////////////////////////////////////////////////////////////
jQuery(document).ready(function($){
	//if you change this breakpoint in the style.css file (or _layout.scss if you use SASS), don't forget to update this value as well
	var MqL = 1170;
	//move nav element position according to window width
	moveNavigation();
	$(window).on('resize', function(){
		(!window.requestAnimationFrame) ? setTimeout(moveNavigation, 300) : window.requestAnimationFrame(moveNavigation);
	});

	//mobile - open lateral menu clicking on the menu icon
	$('.cd-nav-trigger').on('click', function(event){
		event.preventDefault();
		if( $('.cd-main-content').hasClass('nav-is-visible') ) {
			closeNav();
			$('.cd-overlay').removeClass('is-visible');
		} else {
			$(this).addClass('nav-is-visible');
			$('.cd-primary-nav').addClass('nav-is-visible');
			$('.metrop-nav').addClass('nav-is-visible');
			$('.cd-main-content').addClass('nav-is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
				$('body').addClass('overflow-hidden');
			});
			toggleSearch('close');
			$('.cd-overlay').addClass('is-visible');

		}
	});

	//open search form
	$('.cd-search-trigger').on('click', function(event){
		event.preventDefault();
		toggleSearch();
		closeNav();
	});

	//close lateral menu on mobile 
	$('.cd-overlay').on('swiperight', function(){
		if($('.cd-primary-nav').hasClass('nav-is-visible')) {
			closeNav();
			$('.cd-overlay').removeClass('is-visible');
		}
	});
	$('.nav-on-left .cd-overlay').on('swipeleft', function(){
		if($('.cd-primary-nav').hasClass('nav-is-visible')) {
			closeNav();
			$('.cd-overlay').removeClass('is-visible');
		}
	});
	$('.cd-overlay').on('click', function(){
		closeNav();
		toggleSearch('close')
		$('.cd-overlay').removeClass('is-visible');
	});


	//prevent default clicking on direct children of .cd-primary-nav 
	$('.cd-primary-nav').children('.has-children').children('a').on('click', function(event){
		event.preventDefault();
	});
	//open submenu
	$('.has-children').children('a').on('click', function(event){
		if( !checkWindowWidth() ) event.preventDefault();
		var selected = $(this);
		if( selected.next('ul').hasClass('is-hidden') ) {
			//desktop version only
			selected.addClass('selected').next('ul').removeClass('is-hidden').end().parent('.has-children').parent('ul').addClass('moves-out');
			selected.parent('.has-children').siblings('.has-children').children('ul').addClass('is-hidden').end().children('a').removeClass('selected');
			$('.cd-overlay').addClass('is-visible');
		} else {
			selected.removeClass('selected').next('ul').addClass('is-hidden').end().parent('.has-children').parent('ul').removeClass('moves-out');
			$('.cd-overlay').removeClass('is-visible');
		}
		toggleSearch('close');
	});

	//submenu items - go back link
	$('.go-back').on('click', function(){
		$(this).parent('ul').addClass('is-hidden').parent('.has-children').parent('ul').removeClass('moves-out');
	});

	function closeNav() {
		$('.cd-nav-trigger').removeClass('nav-is-visible');
		$('.metrop-nav').removeClass('nav-is-visible');
		$('.cd-primary-nav').removeClass('nav-is-visible');
		$('.has-children ul').addClass('is-hidden');
		$('.has-children a').removeClass('selected');
		$('.moves-out').removeClass('moves-out');
		$('.cd-main-content').removeClass('nav-is-visible').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
			$('body').removeClass('overflow-hidden');
		});
	}

	function toggleSearch(type) {
		if(type=="close") {
			//close serach 
			$('.cd-search').removeClass('is-visible');
			$('.cd-search-trigger').removeClass('search-is-visible');
			$('.cd-overlay').removeClass('search-is-visible');
		} else {
			//toggle search visibility
			$('.cd-search').toggleClass('is-visible');
			$('.cd-search-trigger').toggleClass('search-is-visible');
			$('.cd-overlay').toggleClass('search-is-visible');
			if($(window).width() > MqL && $('.cd-search').hasClass('is-visible')) $('.cd-search').find('input[type="search"]').focus();
			($('.cd-search').hasClass('is-visible')) ? $('.cd-overlay').addClass('is-visible') : $('.cd-overlay').removeClass('is-visible') ;
		}
	}

	function checkWindowWidth() {
		//check window width (scrollbar included)
		var e = window, 
            a = 'inner';
        if (!('innerWidth' in window )) {
            a = 'client';
            e = document.documentElement || document.body;
        }
        if ( e[ a+'Width' ] >= MqL ) {
			return true;
		} else {
			return false;
		}
	}

	function moveNavigation(){
		var navigation = $('.cd-nav');
  		var desktop = checkWindowWidth();
        if ( desktop ) {
			navigation.detach();
			navigation.insertBefore('.cd-header-buttons');
		} else {
			navigation.detach();
			navigation.insertAfter('.cd-main-content');
		}
	}
});
/*jQuery(document).ready(function($){
	//move nav element position according to window width
	moveNavigation();
	$(window).on('resize', function(){
		(!window.requestAnimationFrame) ? setTimeout(moveNavigation, 300) : window.requestAnimationFrame(moveNavigation);
	});

	//mobile version - open/close navigation
	$('.cd-nav-trigger').on('click', function(event){
		event.preventDefault();
		if($('.metrop-nav').hasClass('nav-is-visible')) $('.moves-out').removeClass('moves-out');
		$('.metrop-nav').toggleClass('nav-is-visible');
		$('.intro-header').toggleClass('nav-is-visible');
		$('.cd-main-nav').toggleClass('nav-is-visible');
		$('.cd-main-content').toggleClass('nav-is-visible');
		$( "#search-content" ).removeClass( "open");
		$( ".cd-search-btn" ).removeClass( "active");
		$( ".fa" ).removeClass( "fa-times");
	});

	//mobile version - go back to main navigation
	$('.go-back').on('click', function(event){
		event.preventDefault();
		$('.cd-main-nav').removeClass('moves-out');
	});

	//open sub-navigation
	$('.cd-subnav-trigger').on('click', function(event){
		event.preventDefault();
		$('.cd-main-nav').toggleClass('moves-out');
		$('#collapseApp').collapse('hide');
	});

	function moveNavigation(){
		var navigation = $('.cd-main-nav-wrapper');
  		var screenSize = checkWindowWidth();
        if ( screenSize ) {
        	//desktop screen - insert navigation inside header element
			navigation.detach();
			navigation.insertBefore('.cd-nav-trigger');
		} else {
			//mobile screen - insert navigation after .cd-main-content element
			navigation.detach();
			navigation.insertAfter('.cd-main-content');
		}
	}

	function checkWindowWidth() {
		var mq = window.getComputedStyle(document.querySelector('.metrop-nav'), '::before').getPropertyValue('content').replace(/"/g, '').replace(/'/g, "");
		return ( mq == 'mobile' ) ? false : true;
	}
});*/


/**
 * main.js
 * http://www.codrops.com
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 *
 * Copyright 2015, Codrops
 * http://www.codrops.com
 */

;(function(window) {

	'use strict';

	var support = { transitions: Modernizr.csstransitions },
		// transition end event name
		transEndEventNames = { 'WebkitTransition': 'webkitTransitionEnd', 'MozTransition': 'transitionend', 'OTransition': 'oTransitionEnd', 'msTransition': 'MSTransitionEnd', 'transition': 'transitionend' },
		transEndEventName = transEndEventNames[ Modernizr.prefixed( 'transition' ) ],
		onEndTransition = function( el, callback ) {
			var onEndCallbackFn = function( ev ) {
				if( support.transitions ) {
					if( ev.target != this ) return;
					this.removeEventListener( transEndEventName, onEndCallbackFn );
				}
				if( callback && typeof callback === 'function' ) { callback.call(this); }
			};
			if( support.transitions ) {
				el.addEventListener( transEndEventName, onEndCallbackFn );
			}
			else {
				onEndCallbackFn();
			}
		};

	/**
	 * some helper functions
	 */

	function throttle(fn, delay) {
		var allowSample = true;

		return function(e) {
			if (allowSample) {
				allowSample = false;
				setTimeout(function() { allowSample = true; }, delay);
				fn(e);
			}
		};
	}

	function nextSibling(el) {
		var nextSibling = el.nextSibling;
		while(nextSibling && nextSibling.nodeType != 1) {
			nextSibling = nextSibling.nextSibling
		}
		return nextSibling;
	}

	function extend( a, b ) {
		for( var key in b ) {
			if( b.hasOwnProperty( key ) ) {
				a[key] = b[key];
			}
		}
		return a;
	}

	/**
	 * GridFx obj
	 */
	function GridFx(el, options) {
		this.gridEl = el;
		this.options = extend( {}, this.options );
		extend( this.options, options );

		this.items = [].slice.call(this.gridEl.querySelectorAll('.grid__item'));
		this.previewEl = nextSibling(this.gridEl);
		this.isExpanded = false;
		this.isAnimating = false;
		this.closeCtrl = this.previewEl.querySelector('button.action--close');
		this.previewDescriptionEl = this.previewEl.querySelector('.description--preview');

		this._init();
	}

	/**
	 * options
	 */
	GridFx.prototype.options = {
		pagemargin : 0,
		// x and y can have values from 0 to 1 (percentage). If negative then it means the alignment is left and/or top rather than right and/or bottom
		// so, as an example, if we want our large image to be positioned vertically on 25% of the screen and centered horizontally the values would be x:1,y:-0.25
		imgPosition : { x : 1, y : 1 },
		onInit : function(instance) { return false; },
		onResize : function(instance) { return false; },
		onOpenItem : function(instance, item) { return false; },
		onCloseItem : function(instance, item) { return false; },
		onExpand : function() { return false; }
	}

	GridFx.prototype._init = function() {
		// callback
		this.options.onInit(this);

		var self = this;
		// init masonry after all images are loaded
		imagesLoaded( this.gridEl, function() {
			// initialize masonry
			new Masonry(self.gridEl, {
				itemSelector: '.grid__item',
				isFitWidth : true
			});
			// show grid after all images (thumbs) are loaded
			classie.add(self.gridEl, 'grid--loaded');
			// init/bind events
			self._initEvents();
			// create the large image and append it to the DOM
			self._setOriginal();
			// create the clone image and append it to the DOM
			self._setClone();
		});
	};

	/**
	 * initialize/bind events
	 */
	GridFx.prototype._initEvents = function () {
		var self = this,
			clickEvent = (document.ontouchstart!==null ? 'click' : 'touchstart');

		this.items.forEach(function(item) {
			var touchend = function(ev) {
					ev.preventDefault();
					self._openItem(ev, item);
					item.removeEventListener('touchend', touchend);
				},
				touchmove = function(ev) {
					item.removeEventListener('touchend', touchend);
				},
				manageTouch = function() {
					item.addEventListener('touchend', touchend);
					item.addEventListener('touchmove', touchmove);
				};

			item.addEventListener(clickEvent, function(ev) {
				if(clickEvent === 'click') {
					ev.preventDefault();
					self._openItem(ev, item);
				}
				else {
					manageTouch();
				}
			});
		});

		// close expanded image
		this.closeCtrl.addEventListener('click', function() {
			self._closeItem();
		});

		window.addEventListener('resize', throttle(function(ev) {
			// callback
			self.options.onResize(self);
		}, 10));
	}

	/**
	 * open a grid item
	 */
	GridFx.prototype._openItem = function(ev, item) {
		if( this.isAnimating || this.isExpanded ) return;
		this.isAnimating = true;
		this.isExpanded = true;

		// item's image
		var gridImg = item.querySelector('img'),
			gridImgOffset = gridImg.getBoundingClientRect();

		// index of current item
		this.current = this.items.indexOf(item);

		// set the src of the original image element (large image)
		this._setOriginal(item.querySelector('a').getAttribute('href'));

		// callback
		this.options.onOpenItem(this, item);

		// set the clone image
		this._setClone(gridImg.src, {
			width : gridImg.offsetWidth,
			height : gridImg.offsetHeight,
			left : gridImgOffset.left,
			top : gridImgOffset.top
		});

		// hide original grid item
		classie.add(item, 'grid__item--current');

		// calculate the transform value for the clone to animate to the full image view
		var win = this._getWinSize(),
			originalSizeArr = item.getAttribute('data-size').split('x'),
			originalSize = {width: originalSizeArr[0], height: originalSizeArr[1]},
			dx = ((this.options.imgPosition.x > 0 ? 1-Math.abs(this.options.imgPosition.x) : Math.abs(this.options.imgPosition.x)) * win.width + this.options.imgPosition.x * win.width/2) - gridImgOffset.left - 0.5 * gridImg.offsetWidth,
			dy = ((this.options.imgPosition.y > 0 ? 1-Math.abs(this.options.imgPosition.y) : Math.abs(this.options.imgPosition.y)) * win.height + this.options.imgPosition.y * win.height/2) - gridImgOffset.top - 0.5 * gridImg.offsetHeight,
			z = Math.min( Math.min(win.width*Math.abs(this.options.imgPosition.x) - this.options.pagemargin, originalSize.width - this.options.pagemargin)/gridImg.offsetWidth, Math.min(win.height*Math.abs(this.options.imgPosition.y) - this.options.pagemargin, originalSize.height - this.options.pagemargin)/gridImg.offsetHeight );

		// apply transform to the clone
		this.cloneImg.style.WebkitTransform = 'translate3d(' + dx + 'px, ' + dy + 'px, 0) scale3d(' + z + ', ' + z + ', 1)';
		this.cloneImg.style.transform = 'translate3d(' + dx + 'px, ' + dy + 'px, 0) scale3d(' + z + ', ' + z + ', 1)';

		// add the description if any
		var descriptionEl = item.querySelector('.description');
		if( descriptionEl ) {
			this.previewDescriptionEl.innerHTML = descriptionEl.innerHTML;
		}

		var self = this;
		setTimeout(function() {
			// controls the elements inside the expanded view
			classie.add(self.previewEl, 'preview--open');
			// callback
			self.options.onExpand();
		}, 0);

		// after the clone animates..
		onEndTransition(this.cloneImg, function() {
			// when the original/large image is loaded..
			imagesLoaded(self.originalImg, function() {
				// close button just gets shown after the large image gets loaded
				classie.add(self.previewEl, 'preview--image-loaded');
				// animate the opacity to 1
				self.originalImg.style.opacity = 1;
				// and once that's done..
				onEndTransition(self.originalImg, function() {
					// reset cloneImg
					self.cloneImg.style.opacity = 0;
					self.cloneImg.style.WebkitTransform = 'translate3d(0,0,0) scale3d(1,1,1)';
					self.cloneImg.style.transform = 'translate3d(0,0,0) scale3d(1,1,1)';

					self.isAnimating = false;
				});

			});
		});
	};

	/**
	 * create/set the original/large image element
	 */
	GridFx.prototype._setOriginal = function(src) {
		if( !src ) {
			this.originalImg = document.createElement('img');
			this.originalImg.className = 'original';
			this.originalImg.style.opacity = 0;
			this.originalImg.style.maxWidth = 'calc(' + parseInt(Math.abs(this.options.imgPosition.x)*100) + 'vw - ' + this.options.pagemargin + 'px)';
			this.originalImg.style.maxHeight = 'calc(' + parseInt(Math.abs(this.options.imgPosition.y)*100) + 'vh - ' + this.options.pagemargin + 'px)';
			// need it because of firefox
			this.originalImg.style.WebkitTransform = 'translate3d(0,0,0) scale3d(1,1,1)';
			this.originalImg.style.transform = 'translate3d(0,0,0) scale3d(1,1,1)';
			src = '';
			this.previewEl.appendChild(this.originalImg);
		}

		this.originalImg.setAttribute('src', src);
	};

	/**
	 * create/set the clone image element
	 */
	GridFx.prototype._setClone = function(src, settings) {
		if( !src ) {
			this.cloneImg = document.createElement('img');
			this.cloneImg.className = 'clone';
			src = '';
			this.cloneImg.style.opacity = 0;
			this.previewEl.appendChild(this.cloneImg);
		}
		else {
			this.cloneImg.style.opacity = 1;
			// set top/left/width/height of grid item's image to the clone
			this.cloneImg.style.width = settings.width  + 'px';
			this.cloneImg.style.height = settings.height  + 'px';
			this.cloneImg.style.top = settings.top  + 'px';
			this.cloneImg.style.left = settings.left  + 'px';
		}

		this.cloneImg.setAttribute('src', src);
	};

	/**
	 * closes the original/large image view
	 */
	GridFx.prototype._closeItem = function() {
		if( !this.isExpanded || this.isAnimating ) return;
		this.isExpanded = false;
		this.isAnimating = true;

		// the grid item's image and its offset
		var gridItem = this.items[this.current],
			gridImg = gridItem.querySelector('img'),
			gridImgOffset = gridImg.getBoundingClientRect(),
			self = this;

		classie.remove(this.previewEl, 'preview--open');
		classie.remove(this.previewEl, 'preview--image-loaded');

		// callback
		this.options.onCloseItem(this, gridItem);

		// large image will animate back to the position of its grid's item
		classie.add(this.originalImg, 'animate');

		// set the transform to the original/large image
		var win = this._getWinSize(),
			dx = gridImgOffset.left + gridImg.offsetWidth/2 - ((this.options.imgPosition.x > 0 ? 1-Math.abs(this.options.imgPosition.x) : Math.abs(this.options.imgPosition.x)) * win.width + this.options.imgPosition.x * win.width/2),
			dy = gridImgOffset.top + gridImg.offsetHeight/2 - ((this.options.imgPosition.y > 0 ? 1-Math.abs(this.options.imgPosition.y) : Math.abs(this.options.imgPosition.y)) * win.height + this.options.imgPosition.y * win.height/2),
			z = gridImg.offsetWidth/this.originalImg.offsetWidth;

		this.originalImg.style.WebkitTransform = 'translate3d(' + dx + 'px, ' + dy + 'px, 0) scale3d(' + z + ', ' + z + ', 1)';
		this.originalImg.style.transform = 'translate3d(' + dx + 'px, ' + dy + 'px, 0) scale3d(' + z + ', ' + z + ', 1)';

		// once that's done..
		onEndTransition(this.originalImg, function() {
			// clear description
			self.previewDescriptionEl.innerHTML = '';

			// show original grid item
			classie.remove(gridItem, 'grid__item--current');

			// fade out the original image
			setTimeout(function() { self.originalImg.style.opacity = 0;	}, 60);

			// and after that
			onEndTransition(self.originalImg, function() {
				// reset original/large image
				classie.remove(self.originalImg, 'animate');
				self.originalImg.style.WebkitTransform = 'translate3d(0,0,0) scale3d(1,1,1)';
				self.originalImg.style.transform = 'translate3d(0,0,0) scale3d(1,1,1)';

				self.isAnimating = false;
			});
		});
	};

	/**
	 * gets the window sizes
	 */
	GridFx.prototype._getWinSize = function() {
		return {
			width: document.documentElement.clientWidth,
			height: window.innerHeight
		};
	};

	window.GridFx = GridFx;

})(window);



/**
/* search *
**/
$(function() {
    $( "#search-btn" ).click(function() {
    $( "#search-content" ).toggleClass( "open");
			setTimeout(function(){$(".search-input").focus();},200);
	  $("#search-icon").toggleClass("fa-times-circle");
	  $(".cd-search-btn").toggleClass("active");
	  $('#collapseApp').collapse('hide');
	  $('.metrop-nav').removeClass('nav-is-visible');
	  $('.intro-header').removeClass('nav-is-visible');
	  $('.cd-main-nav').removeClass('nav-is-visible');
	  $('.cd-main-content').removeClass('nav-is-visible');
    });
    $("#collapse-toggle").click(function(){
      	$( "#search-content" ).removeClass( "open");
		$( ".cd-search-btn" ).removeClass( "active");
		$( ".fa" ).removeClass( "fa-times-circle");
    });
	  $(".search-input-clear").hide();
		$(".search-input").on('input',function(e){
	     var text = $(".search-input").val();
			 if(text == ''){
				 $(".search-input-clear").hide();
			 }else{
				 $(".search-input-clear").show();
			 }

    });
	$(".search-input-clear").click(function(){

		$(".search-input-clear").hide();
		setTimeout(function(){$(".search-input").focus();},200);
	});

  });

