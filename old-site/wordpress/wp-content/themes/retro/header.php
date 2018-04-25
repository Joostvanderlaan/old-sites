<!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
<meta charset="<?php bloginfo('charset');?>" />
<title><?php
global $page, $paged;
wp_title('|', true, 'right');
bloginfo('name');
if ((is_home() || is_front_page())) {
  $site_description = get_bloginfo('description', 'display');
  if (!empty($site_description)) echo " | $site_description";
}
if ($paged>1 || $page>1) echo ' | ' . sprintf( __('Page %s'), max($paged, $page));
?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url');?>" />
<!--[if IE]>
<link href="<?php bloginfo('template_directory');?>/images/ie.css" rel="stylesheet" type="text/css" />
<![endif]-->

<!--[if IE 7]>
<link href="<?php bloginfo('template_directory');?>/images/ie7.css" rel="stylesheet" type="text/css" />
<![endif]-->

<!--[if IE 6]>
<link href="<?php bloginfo('template_directory');?>/images/ie6.css" rel="stylesheet" type="text/css" />
<![endif]-->

<!--[if IE 5]>
<link href="<?php bloginfo('template_directory');?>/images/ie5.css" rel="stylesheet" type="text/css" />
<![endif]-->
<link rel="pingback" href="<?php bloginfo('pingback_url');?>" />

<?php wp_head();?>
<?php wp_enqueue_script("jquery"); ?><!--VERY IMPORTANT-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory');?>/js/slider.js"></script>
</head>

<body <?php body_class();?>>
<div id="wrapper">
  <div id="header">
    <div class="title">
      <h1><?php bloginfo('name');?></h1>
      <h2><?php echo get_bloginfo('description', 'display');?></h2>
    </div>
    <ul class="menu">
    <?php tp_list_pages();?>
    </ul>
    <div class="cleaner"><!--Cleaner--></div>
  </div>
  <div id="body">
    <div class="lines"></div>
    <div id="slide-holder">
      <div id="slide-runner">
<?php echo tp_slider(7);?>
        <div id="slide-controls"><p id="slide-nav"></p></div>
      </div>
      <div class="slider_title">
        <h1><?php _e('Photography Showcase');?></h1>
        <h6><?php _e('Images are clickable');?></h6>
      </div>
    </div>


