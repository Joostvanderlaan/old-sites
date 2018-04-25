function menu() {
	jQuery('ul.sf-menu li a').hover(function() {
		jQuery(this).stop().animate({ paddingLeft: '15px'}, {queue: false, duration: 200 })
	}, function() {
		jQuery(this).stop().animate({ paddingLeft: '0'})
	});
}
$(document).ready(function() {
	menu();
});