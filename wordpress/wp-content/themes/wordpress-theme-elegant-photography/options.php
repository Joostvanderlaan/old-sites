<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 * 
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = get_theme_data(STYLESHEETPATH . '/style.css');
	$themename = $themename['Name'];
	$themename = preg_replace("/\W/", "", strtolower($themename) );
	
	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);
	
	// echo $themename;
}

function optionsframework_options() {
	$effect_array = array("1" => "Fade","2" => "Slide Top","3" => "Slide Right","4" => "Slide Bottom","5" => "Slide Left", "6" => "Carousel right", "7" => "Carousel left");
	
	$animation_speed = array("slow" => "Slow","normal" => "Normal","fast" => "Fast");
	
	$pp_theme = array("pp_default" => "Pretty Photo", "light_rounded" => "Light Rounded", "dark_rounded" => "Dark Rounded", "light_square" => "Light Square", "dark_square" => "Dark Square", "facebook" => "Facebook style");
	
	$pp_autoplay = array("true" => "Yes", "false" => "No" );
	$enable_slider = array("true" => "On", "false" => "Off", "home" => "Homepage only" );
	
	//$heading_font = array(""=>"Default","1" => "Bebas", "2" => "Chunk", "3" => "Cicle", "4" => "Dekar", "5" => "Franchise", "6" => "Prociono", "7" => "Ripe", "8" => "Scriptina", "9" => "Sertig");
		
		$heading_font = array(""=>get_template_directory_uri()."/images/fonts/default.png","1" => get_template_directory_uri()."/images/fonts/bebas.png", "2" => get_template_directory_uri()."/images/fonts/chunkfive.png", "3" =>  get_template_directory_uri()."/images/fonts/cicle_gordita.png", "4" => get_template_directory_uri()."/images/fonts/dekar.png", "5" => get_template_directory_uri()."/images/fonts/franchise.png", "6" =>  get_template_directory_uri()."/images/fonts/prociono_tt.png", "7" => get_template_directory_uri()."/images/fonts/ripe.png", "8" => get_template_directory_uri()."/images/fonts/scriptina_pro.png", "9" => get_template_directory_uri()."/images/fonts/sertig.png");

	
	$options = array();
		
	$options[] = array( "name" => "Basic settings",
						"type" => "heading");
						
	$options[] = array( "name" => "Logo",
						"desc" => "Upload your logo here. Maximum dimensions for a best placement should be 260px wide and 95px height.",
						"id" => "ff_logo",
						"type" => "upload");
						
	$options[] = array( "name" => "Search bar",
						"desc" => "Display search box below logo",
						"id" => "search_check",
						"std" => "1",
						"type" => "checkbox");
						
	$options[] = array( "name" => "Navigation Font",
						"desc" => "Please choose your font to use for headings",
						"id" => "navigation_font",
						"std" => "",
						"type" => "images",
						"options" => $heading_font);
						
	$options[] = array( "name" => "Heading Font",
						"desc" => "Please choose your font to use for headings",
						"id" => "h_font",
						"std" => "",
						"type" => "images",
						"options" => $heading_font);
						

	$options[] = array( "name" => "Heading Font Size",
						"desc" => "Select your font size in pixel for the headings",
						"id" => "heading_fontsize",
						"std" => "22px",
						"type" => "select",
						"options"=>array("12px"=>"12px","13px"=>"13px","14px"=>"14px","15px"=>"15px","16px"=>"16px","17px"=>"17px","18px"=>"18px","19px"=>"19px","20px"=>"20px","21px"=>"21px","22px"=>"22px","23px"=>"23px","24px"=>"24px","25px"=>"25px","26px"=>"26px","27px"=>"27px","28px"=>"28px","29px"=>"29px","30px"=>"30px","31px"=>"31px","32px"=>"32px","33px"=>"33px","34px"=>"34px","35px"=>"35px","36px"=>"36px"));			
						
	$options[] = array( "name" => "Sidebar background",
						"desc" => "Select your color for the sidebar background",
						"id" => "sidebar_bgcolor",
						"std" => "#000000",
						"type" => "color");
						
		$options[] = array( "name" => "Menu Font Size",
						"desc" => "Select your font size in pixel for the navigatiom menu",
						"id" => "menu_fontsize",
						"std" => "12px",
						"type" => "select",
						"options"=>array("12px"=>"12px","13px"=>"13px","14px"=>"14px","15px"=>"15px","16px"=>"16px","17px"=>"17px","18px"=>"18px","19px"=>"19px","20px"=>"20px","21px"=>"21px","22px"=>"22px"));					
						
	$options[] = array( "name" => "Link color",
						"desc" => "Select your color for the links",
						"id" => "a_color",
						"std" => "#2E70B1",
						"type" => "color");
						
	$options[] = array( "name" => "Heading color",
						"desc" => "Select your color for the headings",
						"id" => "h_color",
						"std" => "#000000",
						"type" => "color");

	$options[] = array( "name" => "Navigation color",
						"desc" => "Select your color for the navigation menu",
						"id" => "nav_color",
						"std" => "#ffffff",
						"type" => "color");
	
	$options[] = array( "name" => "Hover/Visited link color",
						"desc" => "Select your color for the hover/visited link color",
						"id" => "hv_color",
						"std" => "#ffffff",
						"type" => "color");							
						
							
	$options[] = array( "name" => "Copyright",
						"desc" => "Your copyright text to display in footer..",
						"id" => "copyright_text",
						"std" => "",
						"type" => "text");
						
	$options[] = array( "name" => "Gallery Settings",
						"type" => "heading");
						
	$options[] = array( "name" => "Gallery",
						"desc" => "These options will change the galleries you embed on your website's pages.",
						"type" => "info");
	
	$options[] = array( "name" => "Disable Gallery",
						"desc" => "Checking the box will disable the gallery, allowing you to install a different gallery plugin",
						"id" => "enable_gallery",
						"type" => "checkbox");
											
	$options[] = array( "name" => "Animation speed between images",
						"desc" => "Default is nomal.",
						"id" => "animation_speed",
						"std" => "normal",
						"type" => "radio",
						"options" => $animation_speed);
						
	$options[] = array( "name" => "Gallery theme",
						"desc" => "Choose the style to display your website's galleries.",
						"id" => "pp_theme",
						"std" => "dark_square",
						"type" => "radio",
						"options" => $pp_theme);
						
	$options[] = array( "name" => "Auto-play",
						"desc" => "Auto-play slideshow images?",
						"id" => "pp_autoplay",
						"std" => "false",
						"type" => "radio",
						"options" => $pp_autoplay);
						
	$options[] = array( "name" => "Auto-play interval",
						"desc" => "Auto-play interval time in ms.",
						"id" => "auto_interval",
						"std" => "5000",
						"class" => "mini",
						"type" => "text");
	
	$options[] = array( "name" => "Background slider",
						"type" => "heading");
						
	$options[] = array( "name" => "Slide interval",
						"desc" => "Slide interval time in ms.",
						"id" => "slide_interval",
						"std" => "5000",
						"class" => "mini",
						"type" => "text");
	
	$options[] = array( "name" => "Enable Background Slider",
						"desc" => "Background Slider setting",
						"id" => "background_slider",
						"std" => "true",
						"type" => "radio",
						"options" => $enable_slider);
											
	$options[] = array( "name" => "Transition speed",
						"desc" => "How quickly your site transitions between slides",
						"id" => "slide_speed",
						"std" => "500",
						"class" => "mini",
						"type" => "text");
						
	$options[] = array( "name" => "Choose your preferred slider effect.",
						"desc" => "Default is fade.",
						"id" => "slider_effect",
						"std" => "1",
						"type" => "radio",
						"options" => $effect_array);
						
	$options[] = array( "name" => "Background slider",
						"desc" => "You can add up to 8 images, be mindful of file size because it will impact load times.",
						"type" => "info");
	
	$options[] = array( "name" => "Background slider 1",
						"desc" => "Recommended Size: 1920x1080px",
						"id" => "bg1",
						"type" => "upload");
	$options[] = array( "name" => "Background slider 2",
						"desc" => "Recommended Size: 1920x1080px",
						"id" => "bg2",
						"type" => "upload");
	$options[] = array( "name" => "Background slider 3",
						"desc" => "Recommended Size: 1920x1080px",
						"id" => "bg3",
						"type" => "upload");
	$options[] = array( "name" => "Background slider 4",
						"desc" => "Recommended Size: 1920x1080px",
						"id" => "bg4",
						"type" => "upload");
	$options[] = array( "name" => "Background slider 5",
						"desc" => "Recommended Size: 1920x1080px",
						"id" => "bg5",
						"type" => "upload");
	$options[] = array( "name" => "Background slider 6",
						"desc" => "Recommended Size: 1920x1080px",
						"id" => "bg6",
						"type" => "upload");
	$options[] = array( "name" => "Background slider 7",
						"desc" => "Recommended Size: 1920x1080px",
						"id" => "bg7",
						"type" => "upload");
	$options[] = array( "name" => "Background slider 8",
						"desc" => "Recommended Size: 1920x1080px",
						"id" => "bg8",
						"type" => "upload");			
						
	$options[] = array( "name" => "Social Links",
						"type" => "heading");
						
	$options[] = array( "name" => "Social sharing for blog posts",
						"desc" => "Enable the social sharing buttons in the blog posts. Uncheck to disable.",
						"id" => "single_social",
						"std" => "1",
						"type" => "checkbox");
							
	$options[] = array( "name" => "Social Icons in Footer",
						"desc" => "Enable the social media icons in the footer",
						"id" => "enable_social",
						"std" => "1",
						"type" => "checkbox");
								
	$options[] = array( "name" => "Facebook",
						"desc" => "Insert the complete facebook URL",
						"id" => "facebook_url",
						"std" => "",
						"type" => "text");
						
	$options[] = array( "name" => "Twitter",
						"desc" => "Insert the complete twitter URL",
						"id" => "twitter_url",
						"std" => "",
						"type" => "text");
						
	$options[] = array( "name" => "Flickr",
						"desc" => "Insert the complete flickr URL",
						"id" => "flickr_url",
						"std" => "",
						"type" => "text");
						
	$options[] = array( "name" => "Digg",
						"desc" => "Insert the complete digg URL",
						"id" => "digg_url",
						"std" => "",
						"type" => "text");
						
	$options[] = array( "name" => "Reddit",
						"desc" => "Insert the complete reddit URL",
						"id" => "reddit_url",
						"std" => "",
						"type" => "text");
						
	$options[] = array( "name" => "Stumple Upon",
						"desc" => "Insert the complete stumpleupon URL",
						"id" => "stumple_url",
						"std" => "",
						"type" => "text");
						
	$options[] = array( "name" => "Rss",
						"desc" => "Insert the complete feedburner URL or any other RSS url",
						"id" => "rss_url",
						"std" => "",
						"type" => "text");
	$options[] = array( "name" => "YouTube",
						"desc" => "Insert the complete YouTube URL",
						"id" => "youtube_url",
						"std" => "",
						"type" => "text");
											
						
	$options[] = array( "name" => "LinkedIn",
						"desc" => "Insert the complete LinkedIn URL",
						"id" => "linkedin_url",
						"std" => "",
						"type" => "text");
						
	$options[] = array( "name" => "Google Plus",
						"desc" => "Insert the complete google plus URL",
						"id" => "googleplus_url",
						"std" => "",
						"type" => "text");											
	return $options;
}