// Adjust header when scrolled

// Author: Bill Erickson

// URL: http://www.billerickson.net/code/adjust-header-scrolled/



jQuery(document).ready(function($){

    $(".site-header").after('<div class="bumper"></div>');

    $(window).scroll(function () {

	  if ($(document).scrollTop() > 5 ) {

	    $('.site-header').addClass('shrink');

	  } else {

	    $('.site-header').removeClass('shrink');

	  }

	});

    $(".backtotop");

    $(window).scroll(function () {

	  if ($(document).scrollTop() > 200 ) {

	    $('.backtotop').addClass('visible');

	  } else {

	    $('.backtotop').removeClass('visible');

	  }

	});

});


jQuery(function($){

	// Mobile Menu
	$('.menu-toggle').click(function(){
		$('.search-toggle, .header-search').removeClass('active');
		$('.menu-toggle, .nav-menu').toggleClass('active');
	});
	$('.menu-item-has-children > .submenu-expand').click(function(e){
		$(this).toggleClass('expanded');
		e.preventDefault();
	});

	// Search toggle
	$('.search-toggle').click(function(){
		$('.menu-toggle, .nav-menu').removeClass('active');
		$('.search-toggle, .header-search').toggleClass('active');
		$('.site-header .search-field').focus();
	});

	// Info Toggle
	$('.info-toggle').click(function(){
		// $('.search-toggle, .header-search').removeClass('active');
		$('.info-toggle, .info-hidden-box').toggleClass('active');
	});
	$('.info-toggle-close').click(function(){
		$('.info-hidden-box').removeClass('active');
	});

});