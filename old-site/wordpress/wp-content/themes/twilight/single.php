<?php get_header(); ?>

        <!--Blog style-->
                
        <section class='content_left'>
		
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
			<aside class='post_meta'>
			
				<h3>Meta</h3>
				
				<p class="meta">Posted in <?php the_category(', '); ?></p>
				<p class="meta">Posted by <?php the_author(', '); ?></p>
				<p class="meta"><?php the_date(); ?></p>
			
			</aside>
			
			<article class='post'>
			
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<?php the_content(); ?>
				
				<?php comments_template(); ?>
			
			</article>
			
			<div class='clr'></div>
			
	<!--End Post-->
			
		<?php endwhile; else: ?>
			
			<p>Sorry, no posts matched your criteria.</p>
		
		<?php endif; ?>
          
        </section>
	
	<?php get_sidebar(); ?>
        
        <!--End blog style-->
        
<?php get_footer(); ?>