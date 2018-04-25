<!--<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">



<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />



<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

    

<!-- Stylesheet & Favicon -->

<link rel="icon" type="image/png" href="favicon.ico" />

<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />

<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url') ?>/css/prettyPhoto.css" />



<!-- Google Fonts -->

<link href='http://fonts.googleapis.com/css?family=Droid+Serif:regular,bold' rel='stylesheet' type='text/css' />

<link href='http://fonts.googleapis.com/css?family=Open+Sans:regular,bold' rel='stylesheet' type='text/css' />





<!-- WP Head -->

<?php if ( is_single() || is_page() ) wp_enqueue_script( 'comment-reply' ); ?>

<?php wp_head(); ?>



<!--<script type="text/javascript">

	jQuery(function($){

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

					$i=1; 

					for($i=1;$i<=8;$i++) {

						if(of_get_option('bg'.$i)){

							$sliderImage = of_get_option('bg'.$i);

							if ($i > 1) { 

								echo ','; 

							} else { 

								echo '';

							}

							echo "{image : '".$sliderImage."'}";

						}

					}

				?>

			]

		});

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

	});

	

	

	  

</script>
-->


</head>



<body <?php body_class($class); ?>>



<div id="header">

	<div id="nav-wrapper">

		<?php if(of_get_option('menu_position')=='right') {	?>

		<div id="logo">

			<?php if(of_get_option('ff_logo')) { ?>

				<a href="<?php bloginfo('url') ?>"><img src="<?php echo of_get_option('ff_logo') ?>" alt="Professional Photo Lab" /></a>

			<?php } else { ?>

			<a href="<?php bloginfo('url') ?>"><img src="<?php bloginfo('template_url') ?>/images/logo.png" alt="Professional Photo Lab" /></a>

			<?php } ?>

		</div>

		<div id="nav-right-full" class="clearfix">

			<?php

            wp_nav_menu( array(

            	'theme_location' => 'main right',

            	'sort_column' => 'menu_order',

            	'menu_class' => 'sf-menu',
				
				'menu_id'=>'sf-menu',

            	'fallback_cb' => ''

            )); ?>

		</div>

		<?php } else { ?>

		<div id="nav-left" class="clearfix">

			<?php

            wp_nav_menu( array(

            	'theme_location' => 'main left',

            	'sort_column' => 'menu_order',

            	'menu_class' => 'sf-menu',
				'menu_id'=>'sf-menu',

            	'fallback_cb' => ''

            )); ?>

		</div>

		<div id="logo">

			<?php if(of_get_option('ff_logo')) { ?>

				<a href="<?php bloginfo('url') ?>"><img src="<?php echo of_get_option('ff_logo') ?>" alt="" /></a>

			<?php } else { ?>

			<a href="<?php bloginfo('url') ?>"><img src="<?php bloginfo('template_url') ?>/images/logo.png" alt="" /></a>

			<?php } ?>

		</div>

		<div id="nav-right" class="clearfix">

			<?php

            wp_nav_menu( array(

            	'theme_location' => 'main right',

            	'sort_column' => 'menu_order',

            	'menu_class' => 'sf-menu',
				'menu_id'=>'sf-menu',

            	'fallback_cb' => ''

            )); ?>

		</div>

		<?php } ?>

	</div>

</div>



<div class="clear"></div>

<div id="wrap">

<?php if(!is_front_page()) { ?>

<div id="main">

<?php } ?>