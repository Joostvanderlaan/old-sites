<?php 	
//add_action( 'gpp_base_apps_hook', 'gpp_category_slider_main' );
//function gpp_category_slider_main() {	
		global $wp_query, $storedcats;		
		//$categories = explode( ",", get_option( 'gpp_category_slider_cats' ) );
		//$categories = $storedcats; 
		$category = "";		
	?>
	<div id="category_slider_app" class="item clearfix">
		<div id="category_slider_postscontent">		
			<div  id="category_slider_postslider">		
				<?php foreach( $catarray as $category ) { 
						$args = array(		
							'meta_key' => '_thumbnail_id',
							'cat' => $category,
							'posts_per_page' => 5
						);			
						$temp = $wp_query;
						$wp_query = null;
						$wp_query = new WP_Query();
						$wp_query->query( $args );	
						$count = 0;			
					?>
					<div class='category_slider_postgroup'>		
					<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); $count++; ?>										
							<a href="<?php the_permalink(); ?>" class="<?php if($count%6 ==0) echo "last"; ?>" title="<?php printf( esc_attr__( 'Permalink to %s','gpp_base_lang' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><div class="category_slider_eachpost">					
							<?php the_post_thumbnail(); ?>
							<div class="postsliderdetail"><h3 class="postslidertitle"><?php the_title(); ?></h3></div>							
							</div></a>			
					<?php endwhile; $wp_query = null; $wp_query = $temp; ?>
					</div>	
				<?php } ?>
				
			</div><!-- #category_slider_postslider -->
			<div id="category_slider_nav_wrap">
				<?php if( count( $catarray ) > 1 ) { ?>
					<div id="category_slider_sliderhead"><div id="category_slider_arrowhead"></div></div>
				<?php } ?>
				<div id="category_slider_nav"></div>
			</div>
		</div><!-- #category_slider_postscontent -->		
	</div><!-- #category_slider_app -->



<?php //} ?>