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
	$( "input[placeholder], textarea[placeholder], select[placeholder]" ).focus(function() {
		var floatingLabelValue = $(this).attr('placeholder');
		$(this).attr('placeholder', '');
		$(this).prev().text(floatingLabelValue).fadeIn(500);
	});

	$( "input[placeholder], textarea[placeholder], select[placeholder]" ).focusout(function() {
		floatingLabelValue = $(this).prev().text();
		if( !$(this).val().length != 0 ) {
	          $(this).prev().fadeOut(500);
	          $(this).fadeIn(500).delay(500).queue(function(next) { $(this).attr('placeholder', floatingLabelValue); next(); });
	    }

		$(this).find('.img_first').fadeOut(300, function() {
	        $(this).attr("src",$(this).attr("data-original-b")).delay(300);
		    }).fadeIn(300);
		    return false;		
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