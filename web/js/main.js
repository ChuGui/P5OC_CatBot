$(document).ready(function(){

	// SCROLL TO TOP
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
	// Remplace les placeholders par les labels
	$( "input[placeholder], textarea[placeholder], select[placeholder]" ).focus(function() {
		$(this).attr('placeholder', '');
		$(this).prev().fadeIn(500);
	});

	// Remplace les labels par les placeholders si le champ est vide
	$( "input[placeholder], textarea[placeholder], select[placeholder]" ).focusout(function() {
		floatingLabelValue = $(this).prev().text();
		if( !$(this).val().length != 0 ) {
	          $(this).prev().fadeOut(500);
	          $(this).fadeIn(500).delay(500).queue(function(next) { $(this).attr('placeholder', floatingLabelValue); next(); });
	    }	
	});

	$( "select[placeholder]" ).click(function() {
		var floatingLabelValue = $(this).prev().text();
		$(this).attr('placeholder', '');
		$(this).prev().text(floatingLabelValue).fadeIn(500);
	});



	// SVG WINGS FLAPPING
	$( ".navbar-toggler" ).click(function() {
		$( ".navbar-svg" ).toggleClass("visible-svg hidden-svg");
	});

});