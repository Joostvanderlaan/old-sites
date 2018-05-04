<?php get_header(); ?>

	<div id="post-content" <?php post_class(); ?>>  

<?php if (have_posts()) : ?>              
<?php get_template_part( 'post' , 'entry') ?>                	
<?php endif; ?>   
            
<?php if (function_exists("pagination")) { pagination($additional_loop->max_num_pages); } ?>
</div>
<!-- END post-content -->

<?php get_sidebar(); ?>
<div class="clear"></div>
<?php get_footer(); ?>