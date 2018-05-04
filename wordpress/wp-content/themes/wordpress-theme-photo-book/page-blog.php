<?php
/*
Template Name: Blog
*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
    
<!-- Stylesheet & Favicon -->
<link rel="icon" type="image/png" href="favicon.ico" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() ?>/css/prettyPhoto.css" />

<!-- Google Fonts -->
<link href='http://fonts.googleapis.com/css?family=Droid+Serif:regular,bold' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:regular,bold' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Baumans' rel='stylesheet' type='text/css'>

<style>
a{color:<?php echo of_get_option('a_color', '#2E70B1' ) ?>;}
h1, h2, h3, h4{color:<?php echo of_get_option('h_color', '#000' ) ?>;}
</style>

<!-- WP Head -->
<?php if ( is_single() || is_page() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>

<script type="text/javascript">
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

</head>

<body <?php body_class($class); ?>>

<div id="wrap" class="clearfix">
<div id="header">
	<div id="logo">
		<?php if(of_get_option('ff_logo')) { ?>
			<a href="<?php echo home_url() ?>"><img src="<?php echo of_get_option('ff_logo') ?>" alt="" /></a>
		<?php } else { ?>
			<a href="<?php echo home_url() ?>"><img src="<?php echo get_template_directory_uri() ?>/images/logo.png" alt="" /></a>
		<?php } ?>
	</div>
	<div class="clear"></div>
    <div id="sf-menu">
		<?php if ( has_nav_menu( 'main' ) ) { ?>
        	<?php wp_nav_menu( array( 'theme_location' => 'main', 'menu_class' => 'sf-menu', 'container' => 'ul' ) ); ?>
        <?php } else { ?>
		<ul id="menu-navigation" class="sf-menu">
        	<li><a href="<?php echo home_url(); ?>">Home</a></li>
			<?php wp_list_pages( array('title_li' => '')); ?>
		</ul>
		<?php } ?>
	</div>
	<div class="clear"></div>
	<?php if(!is_front_page()) { 
		 get_sidebar(); 
	} ?>
	
	<div class="clear"></div>
	<div id="footer">
	
		<div id="social-buttons">
		<?php if(of_get_option('enable_social', "0")) { ?>
			<?php if(of_get_option('facebook_url')) { ?>
				<a target="_blank" href="<?php echo of_get_option('facebook_url'); ?>"><img src="<?php echo get_template_directory_uri() ?>/images/icons/facebook.png" alt="" /></a>
			<?php } ?>
			<?php if(of_get_option('twitter_url')) { ?>
				<a target="_blank" href="<?php echo of_get_option('twitter_url'); ?>"><img src="<?php echo get_template_directory_uri() ?>/images/icons/twitter.png" alt="" /></a>
			<?php } ?>
			<?php if(of_get_option('flickr_url')) { ?>
				<a target="_blank" href="<?php echo of_get_option('flickr_url'); ?>"><img src="<?php echo get_template_directory_uri() ?>/images/icons/flickr.png" alt="" /></a>
			<?php } ?>
			<?php if(of_get_option('digg_url')) { ?>
				<a target="_blank" href="<?php echo of_get_option('digg_url'); ?>"><img src="<?php echo get_template_directory_uri() ?>/images/icons/digg.png" alt="" /></a>
			<?php } ?>
			<?php if(of_get_option('reddit_url')) { ?>
				<a target="_blank" href="<?php echo of_get_option('reddit_url'); ?>"><img src="<?php echo get_template_directory_uri() ?>/images/icons/reddit.png" alt="" /></a>
			<?php } ?>
			<?php if(of_get_option('stumple_url')) { ?>
				<a target="_blank" href="<?php echo of_get_option('stumple_url'); ?>"><img src="<?php echo get_template_directory_uri() ?>/images/icons/stumpleupon.png" alt="" /></a>
			<?php } ?>
			<?php if(of_get_option('rss_url')) { ?>
				<a target="_blank" href="<?php echo of_get_option('rss_url'); ?>"><img src="<?php echo get_template_directory_uri() ?>/images/icons/rss.png" alt="" /></a>
			<?php } ?>
			 <?php if(of_get_option('youtube_url')) { ?>
				<a target="_blank" href="<?php echo of_get_option('youtube_url'); ?>"><img src="<?php echo get_template_directory_uri() ?>/images/icons/youtube.png" alt="" /></a>
				<?php } ?>
				<?php if(of_get_option('linkedin_url')) { ?>
				<a target="_blank" href="<?php echo of_get_option('linkedin_url'); ?>"><img src="<?php echo get_template_directory_uri() ?>/images/icons/linkedin.png" alt="" /></a>
				<?php } ?>
               <?php if(of_get_option('googleplus_url')) { ?>
				<a target="_blank" href="<?php echo of_get_option('googleplus_url'); ?>"><img src="<?php echo get_template_directory_uri() ?>/images/icons/googleplus.png" alt="" /></a>
				<?php } ?>  
		<?php } ?>
	</div>
	
		<?php if(of_get_option('copyright_text')) { ?>
			<?php echo of_get_option('copyright_text') ?>
		<?php } else { ?>
			&copy; <?php echo date('Y'); ?>  <?php bloginfo( 'name' ) ?>
		<?php } ?>
	</div>
	
</div>

<div id="main-blog">

<?php
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
	query_posts('posts_per_page='.get_option('posts_per_page').' & paged=' . $paged);
	if (have_posts()) :  while (have_posts()) : the_post(); 
?>      
    <div class="hh-blog">
    	<div class="htitle"><a href="<?php the_permalink(' ') ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></div>
    	<?php if ( has_post_thumbnail() ) {  ?>
       	<div class="himage">
			<a href="<?php the_permalink(' ') ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('post-image'); ?></a>
       	</div>
       	<?php } ?>
        <div class="hcontent">
			<?php the_news_excerpt('25','','','plain','no'); ?>
        </div>
        <div class="hmeta">
        	Posted on <?php the_time('F jS, Y') ?>, in <?php the_category(' &bull; '); ?>
        </div>
 	</div>
<?php endwhile; endif; ?> 
<div class="fix"></div>       
<?php if (function_exists("pagination")) { pagination($additional_loop->max_num_pages); } ?>

<div class="clear"></div>
<?php if(is_front_page()) { ?>
</div><!-- END main -->
<?php } ?>
<?php get_footer(' '); ?>