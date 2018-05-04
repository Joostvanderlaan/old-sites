jQuery(function($){
	$(document).ready(function(){
		$('.opacity').css('opacity',1).hover(
		function() {
			$(this).fadeTo(250,0.5);},
		function() {
			$(this).fadeTo(600,1);
		} );
	// superFish
	$('ul.sf-menu').supersubs({
		minWidth:    14,
		maxWidth:    40,
		extraWidth:  1
     })
    .superfish();
	});
});