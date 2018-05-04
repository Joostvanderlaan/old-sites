jQuery(document).ready(function() {
	
/* Navigation */
	jQuery('#submenu ul.sfmenu').superfish({ 
		delay:       500,								// 0.1 second delay on mouseout 
		animation:   { opacity:'show',height:'show'},	// fade-in and slide-down animation 
		dropShadows: true								// disable drop shadows 
	});	


/* Banner class */

	jQuery('.squarebanner ul li:nth-child(even)').addClass('rbanner');


/* Responsive Menu */

	jQuery('#web2feel').mobileMenu();
	
	
/* Toggle comment */
	
	jQuery(".commentlist").hide(); 
	
	jQuery(".comments-title").toggle(function(){
		jQuery(this).addClass("active");
		}, function () {
		jQuery(this).removeClass("active");
	});
	
	jQuery(".comments-title").click(function(){
		jQuery(this).next(".commentlist").slideToggle();
	});
			
		
	
/* Responsive slides */


	jQuery('.flexslider').flexslider({
		controlNav: true,               //Boolean: Create navigation for paging control of each clide? Note: Leave true for manualControls usage
		directionNav: false 
	});	


/* Fancybox */

	jQuery(".fancybox").fancybox({
          helpers: {
              title : {
                  type : 'float'
              }
          }
  });



});