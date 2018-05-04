<?php while (have_posts()) : the_post(); ?>      

    <div class="post-entry " <?php post_class('clearfix'); ?>>

        <?php if ( has_post_thumbnail() ) {  ?>
        
        <div class="post-entry-featured-image">
			<a href="<?php the_permalink(' ') ?>" title="<?php the_title(); ?>" class="opacity"><?php the_post_thumbnail('post-image'); ?></a>
        </div>
        <!-- END post-entry-featured-image -->
        
    <div class="post-entry-content">
        	<h2><a href="<?php the_permalink(' ') ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
        			<div class="blog-entry-meta">
                Posted on <?php the_time('F jS, Y') ?>, in <?php the_category(' &bull; '); ?>
            </div>
					<?php the_news_excerpt('25','Read more &raquo','','plain','no'); ?>
        </div><!-- END post-entry-content -->
      
   <?php } else{ ?>
   <h2><a href="<?php the_permalink(' ') ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
   			<div class="blog-entry-meta">
                Posted on <?php the_time('F jS, Y') ?>, in <?php the_category(' &bull; '); ?>
            </div>
			<?php the_news_excerpt('40','Read more &raquo','','plain','no'); ?>.
   <?php } ?>
 	</div>
	<!-- END post-entry -->

<?php endwhile; ?>
