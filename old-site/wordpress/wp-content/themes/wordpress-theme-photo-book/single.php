<?php get_header(); ?>
	<div id="post-content" <?php post_class(); ?>>  
    <div class="single-entry clearfix">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        
        <h1><?php the_title(); ?></h1>
        
			<div class="post-entry-meta">
                Posted on <?php the_time('F jS, Y') ?>, in <?php the_category(' &bull; '); ?>. <?php comments_popup_link('0 Comments', '1 Comment', '% Comments'); ?>
            </div>
            
		<?php the_content(); ?>
        <div class="clear"></div>
		<?php endwhile; ?>
		<?php endif; ?>	
        
        <?php wp_link_pages('before=<div id="post-page-navigation">&after=</div>'); ?>
       
		
        <div class="post-entry-bottom">
        	<?php the_tags('<div class="post-tags">',' ','</div>'); ?>
        </div>
        
        </div>
        
<?php if(of_get_option('single_social', "0")) { ?>
<div class="addthis_toolbox addthis_default_style ">
<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
<a class="addthis_button_tweet"></a>
<a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
<a class="addthis_counter addthis_pill_style"></a>
</div>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4ec4ccd549bd47b3"></script>
<?php } ?>
               
	<?php comments_template(); ?>  
                
	</div>
	<!-- END post-content -->
<div class="clear"></div>
<?php get_footer(); ?>