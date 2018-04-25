<?php
/*
Template Name: Full Width
*/
?>
<?php get_header(); ?>
	<?php if(is_front_page()) { ?>
		<div id="main"> 	

    	<div id="full-width-wrap" <?php post_class('clearfix'); ?>>
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        		<h1 class="page-title"><?php the_title(); ?></h1>			
				<?php the_content(); ?>
				<?php endwhile; ?>
				<?php endif; ?>	  
        </div>
        </div>
      <?php } else { ?>
      	<div id="full-width-wrap" <?php post_class('clearfix'); ?>>
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        		<h1 class="page-title"><?php the_title(); ?></h1>			
				<?php the_content(); ?>
				<?php endwhile; ?>
				<?php endif; ?>	  
        </div>
      <?php } ?>
<?php get_footer(); ?>