<!DOCTYPE html>
<html lang="en">
	
	<!--HTML5 Twilight Wordpress Theme by Theme Inspire. www.Owainlewis.com -->

<head>

                <title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
                
                <!--Meta-->
                
                <meta http-equiv="content-type" content="text/html;charset=utf-8" />
                <link rel="Shortcut Icon" type="image/ico" href="<?php bloginfo('template_url'); ?>/images/favicon.png">
                <meta name="keywords" content="" />
                <meta name="description" content="" />
                
                <!--CSS-->
                <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
                <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/style.css" type="text/css" />
                <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/reset.css" type="text/css" media="screen" />
                <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/type.css" type="text/css" media="screen" />
                <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/stylesheet.css" type="text/css" media="screen" />
                
                <!--[if lt IE 7]><link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/ie6.css" type="text/css" media="screen" /><![endif]-->
                <!--[if lt IE 7]><script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/unitpngfix.js"></script><![endif]-->
                
                <!--Jquery and Javascripts-->
                
                <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/html5.js"></script>
                <script src="<?php bloginfo('template_url'); ?>/js/jquery-1.3.2.js"></script>
                <script src="<?php bloginfo('template_url'); ?>/js/jquery.cycle.all.min.js"></script>
                <script src="<?php bloginfo('template_url'); ?>/js/jquery.scrollTo-1.4.2-min.js"></script>	
                <script src="<?php bloginfo('template_url'); ?>/js/init.js"></script>
                
                <script>
		
		$(document).ready(function() {
		    $('.slideshow').cycle({ 
                                fx:     'scrollRight', 
                                delay:  12000,
                                speed:500,
                                next:   '#next2', 
                                prev:   '#prev2' 
                            }); 
		});
		
		</script>

</head>

<body>
                
<div id='anchor'></div>
  
  <div id='top'><a id="goto-1" href="#anchor"><img src='<?php bloginfo('template_url'); ?>/images/up1.png' /></a></div>
  
  <section id='header_top'>
    
    <nav class='wrap'>
    
      <ul class='top_menu'>
        
        <li><a href='<?php bloginfo('wpurl'); ?>'>Home</a></li>
        <?php wp_list_pages('title_li'); ?>
         
      </ul>
      
      <div class="search">
                                
                                <form method="get" id="searchform" action="">
                                        
                                        <fieldset>
                        
                                        <input type="text" class="field" name="s" id="s"  value="Search..." onfocus="if (this.value == 'Search...') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Search...';}" />
                                        <input type="image" class="submit" name="submit" src="<?php bloginfo('template_url'); ?>/images/search.png" />
                                        
                                        </fieldset>
                        
                                </form>        
                        
        </div><!-- /.search -->    
    
    </nav>
    
  </section>

<div id="container">
  
  <header id='head'>
    
    <h1 class='logo'><?php bloginfo('name'); ?></h1>
  
  </header>
  
  <div id='slider'>
    
    <div id="slide">
	
		<div class="slideshow">
		
			<img src="<?php bloginfo('template_url'); ?>/images/3.jpg" width="940" height="280" alt='' />
			<img src="<?php bloginfo('template_url'); ?>/images/1.jpg" width="940" height="280" alt='' />	
			
		</div>
                
                <div id='slider_nav'>
                
                <a id="prev2" class='left' href="#"><img src="<?php bloginfo('template_url'); ?>/images/arrow_left.png" width="40" height="40" alt='arrow icon' /></a>
                <a id="next2" class='right' href="#"><img src="<?php bloginfo('template_url'); ?>/images/arrow_right.png" width="40" height="40" alt='arrow icon' /></a>
                
                </div>
	
	</div>
    
  </div>