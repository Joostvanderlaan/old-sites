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
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() ?>/css/prettyPhoto.css" />

<!-- Google Fonts -->
<link href='http://fonts.googleapis.com/css?family=Droid+Serif:regular,bold' rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:regular,bold' rel='stylesheet' type='text/css' />



<!-- WP Head -->
<?php if ( is_single() || is_page() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
</head>

<body <?php body_class($class); ?>>

<div id="wrap" class="clearfix">
<div id="header">
	<div id="logo">
		<?php if(of_get_option('ff_logo')) { ?>
			<a href="<?php echo home_url() ?>"><img src="<?php echo of_get_option('ff_logo') ?>" alt="Photo Lab" /></a>
		<?php } else { ?>
			<a href="<?php echo home_url() ?>"><img src="<?php echo get_template_directory_uri() ?>/images/logo.png" alt="Photo Lab" /></a>
		<?php } ?>
	</div>
	<?php if(of_get_option('search_check', "0")) { ?>
		<div id="searchform">
    		<?php get_search_form();?>
    	</div>
    <?php } ?>
    <div id="sf-menu" class="jqueryslidemenu">
		<?php if ( has_nav_menu( 'main' ) ) { ?>
        	<?php wp_nav_menu( array( 'theme_location' => 'main', 'menu_class' => 'sf-menu', 'container' => 'ul' ) ); ?>
        <?php } else { ?>
		<ul id="menu-navigation" class="sf-menu">
        	<li><a href="<?php echo home_url(); ?>">Home</a></li>
			<?php wp_list_pages( array('title_li' => '')); ?>
		</ul>
		<?php } ?>
	</div>
	
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

<?php if(!is_front_page()) { ?>
<div id="main">
<?php } ?>