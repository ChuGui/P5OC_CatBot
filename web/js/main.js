$(document).ready(function(){
	$(window).scroll(function(){
		if ($(this).scrollTop() > 100) {
			$('.scrollToTop').fadeIn();
		} else {
			$('.scrollToTop').fadeOut();
		}
	});

	$('.scrollToTop').click(function(){
		$('html, body').animate({scrollTop : 0},800);
		return false;
	});


	// FLOATING LABELS
	$( "input[placeholder], textarea[placeholder]" ).focus(function() {
		var floatingLabelValue = $(this).attr('placeholder');
		$(this).removeAttr('placeholder');
		$(this).prev().text(floatingLabelValue).fadeIn(500);
	});

	$( "input[placeholder], textarea[placeholder]" ).focusout(function() {
		floatingLabelValue = $(this).prev().text();
		$(this).prev().fadeOut(500);
		$(this).attr('placeholder', floatingLabelValue);
	});


	// SVG WINGS FLAPPING
	$( ".navbar-toggler" ).click(function() {
		$( ".navbar-svg" ).toggleClass("visible-svg hidden-svg");
	});

});