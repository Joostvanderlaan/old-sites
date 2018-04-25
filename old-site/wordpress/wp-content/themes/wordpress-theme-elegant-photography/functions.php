<?php
include('functions/better-excerpts.php');
include('functions/better-comments.php');

// get scripts
add_action('wp_enqueue_scripts','my_theme_scripts_function');
add_theme_support( 'automatic-feed-links' );

add_editor_style('style.css');
// gets included in the site header
function header_style() {
    ?>
	<?php
}
// gets included in the admin header
function admin_header_style() {
    ?>
	<?php
}

add_custom_image_header('header_style','admin_header_style');


if ( ! isset( $content_width ) ) $content_width = 900;

function my_theme_scripts_function() {
	
	wp_deregister_script('jquery'); 
	wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"), false, '1.6.2'); 
	wp_enqueue_script('jquery');
   
	wp_enqueue_script('supersized', get_stylesheet_directory_uri() . '/js/supersized.3.1.3.min.js');
	wp_enqueue_script('jmenu', get_stylesheet_directory_uri() . '/js/jquerymenu.js');
	$enable_gallery=of_get_option('enable_gallery');
	 	
		if(!$enable_gallery) { 
		wp_enqueue_script('prettyphoto', get_stylesheet_directory_uri() . '/js/jquery.prettyPhoto.js');
	 
	  }
	wp_enqueue_script('fotofolio', get_stylesheet_directory_uri() . '/js/fotofolio.js');
	wp_enqueue_script('cufon', get_stylesheet_directory_uri() . '/js/cufon-yui.js');
}

//Add Pagination Support
include('functions/pagination.php');

add_filter( 'wp_get_attachment_link', 'sant_prettyadd');
function sant_prettyadd ($content) {
	$content = preg_replace("/<a/","<a rel=\"prettyPhoto[slides]\"",$content,1);
	return $content;
}

// Limit Post Word Count
function new_excerpt_length($length) {
	return 50;
}
add_filter('excerpt_length', 'new_excerpt_length');

//Replace Excerpt Link
function new_excerpt_more($more) {
       global $post;
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

//Activate post-image functionality (WP 2.9+)
if ( function_exists( 'add_theme_support' ) )
add_theme_support( 'post-thumbnails' );

// featured image sizes
if ( function_exists( 'add_image_size' ) ) {
add_image_size( 'full-size',  9999, 9999, false );
add_image_size( 'post-image',  100, 100, true );
add_image_size( '2column',  300, 225, true );
add_image_size( '3column',  210, 210, true );
add_image_size( '4column',  150, 150, true );

}

// Enable Custom Background
add_custom_background();

// register navigation menus
register_nav_menus(
	array(
	'main'=>__('Main')
	)
);
/// add home link to menu
function home_page_menu_args( $args ) {
$args['show_home'] = true;
return $args;
}
add_filter( 'wp_page_menu_args', 'home_page_menu_args' );

//Register Sidebars
if ( function_exists('register_sidebar') )
register_sidebar(array(
'name' => 'Sidebar',
'description' => 'Widgets in this area will be shown in the sidebar.',
'before_widget' => '<div class="sidebar-box clearfix">',
'after_widget' => '</div>',
'before_title' => '<h4>',
'after_title' => '</h4>',
));

if ( !function_exists( 'optionsframework_init' ) ) {

if ( STYLESHEETPATH == TEMPLATEPATH ) {
	define('OPTIONS_FRAMEWORK_URL', TEMPLATEPATH . '/admin/');
	define('OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/admin/');
} else {
	define('OPTIONS_FRAMEWORK_URL', STYLESHEETPATH . '/admin/');
	define('OPTIONS_FRAMEWORK_DIRECTORY', get_stylesheet_directory_uri() . '/admin/');
}

require_once (OPTIONS_FRAMEWORK_URL . 'options-framework.php');

}

// functions run on activation --> important flush to clear rewrites
if ( is_admin() && isset($_GET['activated'] ) && $pagenow == 'themes.php' ) {
	$wp_rewrite->flush_rules();
}

function apply_settings()
{
	?>
<style type="text/css">


a{color:<?php echo of_get_option('a_color', '#2E70B1' ) ?>;}

h1, h2, h3, h4{color:<?php echo of_get_option('h_color', '#000' ) ?>; font-size: <?php echo of_get_option('heading_fontsize', '22px' ); ?> !important;}

#header{background: <?php echo of_get_option('sidebar_bgcolor', '#000' ) ?> ;}
#sf-menu ul li ul{background: <?php echo of_get_option('sidebar_bgcolor', '#000' ) ?> ;}

#sf-menu a{ color:<?php echo of_get_option('nav_color', '#ffffff' ) ?> !important; font-size:<?php echo of_get_option('menu_fontsize', '12px' ) ?> !important;}

#sf-menu a:hover{ color:<?php echo of_get_option('hv_color', '#ffffff' ) ?> !important;}

/*
#sidebar a{ color:<?php echo of_get_option('nav_color', '#ffffff' ) ?> !important; }

#post-content h2 a{ color:<?php echo of_get_option('nav_color', '#000000' ) ?> !important; }


#sidebar a:hover{ color:<?php echo of_get_option('hv_color', '#000000' ) ?> !important;}
*/

#post-content h2 a{ color:<?php echo of_get_option('a_color', '#2E70B1' ) ?> !important; }

</style>

<?php
}

function apply_slider(){
  $sliderImage = array();
  for($i=1;$i<=8;$i++) 
  {
    if(of_get_option('bg'.$i))
    $sliderImage[] = of_get_option('bg'.$i);
	$enable_slider=  of_get_option('background_slider');
  $is_home_page=is_front_page();
  }
  ?>
  <script type="text/javascript">
    jQuery(function($){
	  <?php 
	   if(!empty($sliderImage) && ($enable_slider=='true' or ($is_home_page && $enable_slider=='home')))
       {
	  ?>
		$.supersized({
			slide_interval: <?php echo of_get_option('slide_interval', 'no entry') ?>,
			transition: <?php echo of_get_option('slider_effect', 'no entry' ); ?>,
			transition_speed: <?php echo of_get_option('slide_speed', 'no entry') ?>,
			keyboard_nav: 0,
			performance: 1,
			image_path:	'img/',
			vertical_center: 1,
			horizontal_center: 1,
			fit_portrait: 1,
			fit_landscape: 0,
			navigation: 0,
			slide_counter: 0,
			slide_captions: 0,
			slides: [
				<?php
					
					for($i=0;$i<count($sliderImage);$i++) {
							if($i > 0) { 
								echo ','; 
							} else { 
								echo '';
							}
							echo "{image : '".$sliderImage[$i]."'}";
						}
					
				?>
			]
		 });
		 <?php 
		 }else{ 
		    echo 'jQuery("#supersized-loader").hide();';
		 } 	
		 echo "\n";
		 ?>
		 <?php $enable_gallery=of_get_option('enable_gallery');
		 if(!$enable_gallery) { ?>
		  $("a[href$='.jpg'], a[href$='.jpeg'], a[href$='.gif'], a[href$='.png'], .gallery a").prettyPhoto({
		  animationSpeed: '<?php echo of_get_option('animation_speed', 'normal' ); ?>',
		  theme:'<?php echo of_get_option('pp_theme', 'dark_square' ); ?>',
		  slideshow: <?php echo of_get_option('auto_interval', '5000' ); ?>,
		  autoplay_slideshow: <?php echo of_get_option('pp_autoplay', 'false' ); ?>,
		  padding: 40,
		  opacity: 0.35,
		  show_title: false,
		  social_tools:false,			
		  });
		  <?php  } ?>  
		});
	  </script>	
  <?php 
   }
  ?>
<?php
add_action('wp_head','apply_settings');
add_action('wp_head','apply_slider');
?>
