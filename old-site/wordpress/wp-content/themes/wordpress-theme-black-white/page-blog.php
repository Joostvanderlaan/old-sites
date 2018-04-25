<?php
/*
Template Name: Blog
*/
?>
<?php get_header(' '); ?>
<?php if(is_front_page()) { ?>
<div id="main">
<?php } ?>
<h1 style="border-bottom:1px dotted #ccc;padding-bottom:5px; margin-bottom:15px;"><?php the_title(); ?></h1>

	<div id="post-content" <?php post_class(); ?>>  

<?php
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
	query_posts('posts_per_page='.get_option('posts_per_page').' & paged=' . $paged);
	if (have_posts()) :  while (have_posts()) : the_post(); 
?>      
    <div class="post-entry clearfix">
        <?php if ( has_post_thumbnail() ) {  ?>
        	<div class="post-entry-featured-image">
				<a href="<?php the_permalink(' ') ?>" title="<?php the_title(); ?>" class="opacity"><?php the_post_thumbnail('post-image'); ?></a>
       		</div>
        	<div class="post-entry-content">
        		<h2><a href="<?php the_permalink(' ') ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
        		<div class="blog-entry-meta">
                Posted on <?php the_time('F jS, Y') ?>, in <?php the_category(' &bull; '); ?>
            	</div>
				<?php the_news_excerpt('25','Read more &raquo;','','plain','no'); ?>
        	</div>
      
   		<?php } else{ ?>
  			<h2><a href="<?php the_permalink(' ') ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
  			<div class="blog-entry-meta">
                Posted on <?php the_time('F jS, Y') ?>, in <?php the_category(' &bull; '); ?>
            </div>
			<?php the_news_excerpt('40','Read more &raquo;','','plain','no'); ?>
   		<?php } ?>
 	</div>
<?php endwhile; endif; ?>        
<?php if (function_exists("pagination")) { pagination($additional_loop->max_num_pages); } ?>

</div>
<?php get_sidebar(); ?>
<div class="clear"></div>
<?php if(is_front_page()) { ?>
</div><!-- END main -->
<?php } ?>
<?php get_footer(''); ?>