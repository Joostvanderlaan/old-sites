<?php while (have_posts()) : the_post(); ?>      

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

<?php endwhile; ?>
