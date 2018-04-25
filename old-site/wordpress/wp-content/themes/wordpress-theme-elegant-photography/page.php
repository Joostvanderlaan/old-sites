<?php get_header(); ?>

<?php if(is_front_page()) { ?>
	<div id="main">
	<div id="post-content"  <?php post_class('clearfix'); ?>>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <h1 class="page-title"><?php the_title(); ?></h1>			
		<?php the_content(); ?>
		<?php endwhile; endif; ?>
     </div>
	<?php get_sidebar(); ?>
	<div class="clear"></div>
	</div>
<?php } else { ?>

	<div id="post-content" class="clearfix">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <h1 class="page-title"><?php the_title(); ?></h1>			
		<?php the_content(); ?>
		<?php endwhile; endif; ?>
     </div>
	<?php get_sidebar(); ?>

<?php } ?>

<?php get_footer(); ?>