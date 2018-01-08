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


	/*// FLOATING LABELS
	$( "input" ).focus(function() {
		$( "input[placeholder], textarea[placeholder]" ).fadeOut();
		$( "label" ).fadeIn(1000);
	});*/
});