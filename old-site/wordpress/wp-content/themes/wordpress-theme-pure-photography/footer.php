<div class="clear"></div>
<?php if(!is_front_page()) { ?>
</div><!-- END main -->
<?php } ?>
</div><!-- END wrap -->

<div id="footer-wrapper">

	<div id="footer" class="clearfix">
	
		<div class="footer-left">
		<?php if(of_get_option('copyright_text')) { ?>
			<?php echo of_get_option('copyright_text') ?>
		<?php } else { ?>
			&copy; <?php echo date('Y'); ?>  <?php bloginfo( 'name' ) ?>
		<?php } ?>
		</div>
		
		<div class="footer-right">
			<?php if(of_get_option('enable_social', "0")) { ?>
				<?php if(of_get_option('facebook_url')) { ?>
				<a target="_blank" href="<?php echo of_get_option('facebook_url'); ?>"><img src="<?php bloginfo('template_url') ?>/images/icons/facebook.png" alt="" /></a>
				<?php } ?>
				<?php if(of_get_option('twitter_url')) { ?>
				<a target="_blank" href="<?php echo of_get_option('twitter_url'); ?>"><img src="<?php bloginfo('template_url') ?>/images/icons/twitter.png" alt="" /></a>
				<?php } ?>
				<?php if(of_get_option('flickr_url')) { ?>
				<a target="_blank" href="<?php echo of_get_option('flickr_url'); ?>"><img src="<?php bloginfo('template_url') ?>/images/icons/flickr.png" alt="" /></a>
				<?php } ?>
				<?php if(of_get_option('digg_url')) { ?>
				<a target="_blank" href="<?php echo of_get_option('digg_url'); ?>"><img src="<?php bloginfo('template_url') ?>/images/icons/digg.png" alt="" /></a>
				<?php } ?>
				<?php if(of_get_option('reddit_url')) { ?>
				<a target="_blank" href="<?php echo of_get_option('reddit_url'); ?>"><img src="<?php bloginfo('template_url') ?>/images/icons/reddit.png" alt="" /></a>
				<?php } ?>
				<?php if(of_get_option('stumple_url')) { ?>
				<a target="_blank" href="<?php echo of_get_option('stumple_url'); ?>"><img src="<?php bloginfo('template_url') ?>/images/icons/stumpleupon.png" alt="" /></a>
				<?php } ?>
				<?php if(of_get_option('rss_url')) { ?>
				<a target="_blank" href="<?php echo of_get_option('rss_url'); ?>"><img src="<?php bloginfo('template_url') ?>/images/icons/rss.png" alt="" /></a>
				<?php } ?>
				 <?php if(of_get_option('youtube_url')) { ?>
				<a target="_blank" href="<?php echo of_get_option('youtube_url'); ?>"><img src="<?php echo get_template_directory_uri() ?>/images/icons/youtube.png" alt="" /></a>
				<?php } ?>
				<?php if(of_get_option('linkedin_url')) { ?>
				<a target="_blank" href="<?php echo of_get_option('linkedin_url'); ?>"><img src="<?php echo get_template_directory_uri() ?>/images/icons/linkedin.png" alt="" /></a>
				<?php } ?>
				<?php if(of_get_option('googleplus_url')) { ?>
				<a target="_blank" href="<?php echo of_get_option('googleplus_url'); ?>"><img src="<?php bloginfo('template_url') ?>/images/icons/googleplus.png" alt="" /></a>
				<?php } ?>
			<?php } ?>
		</div>
		
	</div>
</div>

<div id="credits">
	<a href="http://www.hhcolorlab.com" target="_blank"><img alt="H&amp;H Color Lab" src="<?php bloginfo('template_url')?>/images/photo-labs.png" title="Photo Lab" /></a>
</div>


<?php if(of_get_option('h_font')=="1") { ?>
	<script src="<?php bloginfo('template_url') ?>/fonts/Bebas_400.font.js" type="text/javascript"></script>
<?php } ?>

<?php if(of_get_option('h_font')=="2") { ?>
	<script src="<?php bloginfo('template_url') ?>/fonts/ChunkFive_400.font.js" type="text/javascript"></script>
<?php } ?>

<?php if(of_get_option('h_font')=="3") { ?>
	<script src="<?php bloginfo('template_url') ?>/fonts/Cicle_Gordita_700.font.js" type="text/javascript"></script>
<?php } ?>

<?php if(of_get_option('h_font')=="4") { ?>
	<script src="<?php bloginfo('template_url') ?>/fonts/Dekar_400.font.js" type="text/javascript"></script>
<?php } ?>

<?php if(of_get_option('h_font')=="5") { ?>
	<script src="<?php bloginfo('template_url') ?>/fonts/Franchise_700.font.js" type="text/javascript"></script>
<?php } ?>

<?php if(of_get_option('h_font')=="6") { ?>
	<script src="<?php bloginfo('template_url') ?>/fonts/Prociono_TT_400.font.js" type="text/javascript"></script>
<?php } ?>

<?php if(of_get_option('h_font')=="7") { ?>
	<script src="<?php bloginfo('template_url') ?>/fonts/Ripe_400.font.js" type="text/javascript"></script>
<?php } ?>

<?php if(of_get_option('h_font')=="8") { ?>
	<script src="<?php bloginfo('template_url') ?>/fonts/Scriptina_Pro_italic_300.font.js" type="text/javascript"></script>
<?php } ?>

<?php if(of_get_option('h_font')=="9") { ?>
	<script src="<?php bloginfo('template_url') ?>/fonts/Sertig_400.font.js" type="text/javascript"></script>
<?php } ?>

<script type="text/javascript">
	Cufon.replace('h1,h2,h3,h4');
</script>
<?php if(of_get_option('navigation_font')=="1") { ?>

	<script src="<?php echo get_template_directory_uri() ?>/fonts/Bebas_400.font.js" type="text/javascript"></script>

	<script type="text/javascript">

			Cufon.replace('#sf-menu a', { hover: {color: '<?php echo of_get_option('hv_color', '#000000' ) ?>'}});



		Cufon.replace('#sf-menu',{ fontFamily: 'Bebas' });

	</script>

<?php } ?>



<?php if(of_get_option('navigation_font')=="2") { ?>

	<script src="<?php echo get_template_directory_uri() ?>/fonts/ChunkFive_400.font.js" type="text/javascript"></script>

	<script type="text/javascript">

			Cufon.replace('#sf-menu a', { hover: {color: '<?php echo of_get_option('hv_color', '#000000' ) ?>'}});



		Cufon.replace('#sf-menu',{ fontFamily: 'ChunkFive' });

	</script>

<?php } ?>



<?php if(of_get_option('navigation_font')=="3") { ?>

	<script src="<?php echo get_template_directory_uri() ?>/fonts/Cicle_Gordita_700.font.js" type="text/javascript"></script>

	<script type="text/javascript">

			Cufon.replace('#sf-menu a', { hover: {color: '<?php echo of_get_option('hv_color', '#000000' ) ?>'}});



		Cufon.replace('#sf-menu',{ fontFamily: 'Cicle Gordita' });

	</script>

<?php } ?>



<?php if(of_get_option('navigation_font')=="4") { ?>

	<script src="<?php echo get_template_directory_uri() ?>/fonts/Dekar_400.font.js" type="text/javascript"></script>

	<script type="text/javascript">

			Cufon.replace('#sf-menu a', { hover: {color: '<?php echo of_get_option('hv_color', '#000000' ) ?>'}});



		Cufon.replace('#sf-menu',{ fontFamily: 'Dekar' });

	</script>

<?php } ?>



<?php if(of_get_option('navigation_font')=="5") { ?>

	<script src="<?php echo get_template_directory_uri() ?>/fonts/Franchise_700.font.js" type="text/javascript"></script>

	<script type="text/javascript">

			Cufon.replace('#sf-menu a', { hover: {color: '<?php echo of_get_option('hv_color', '#000000' ) ?>'}});



		Cufon.replace('#sf-menu',{ fontFamily: 'Franchise' });

	</script>

<?php } ?>



<?php if(of_get_option('navigation_font')=="6") { ?>

	<script src="<?php echo get_template_directory_uri() ?>/fonts/Prociono_TT_400.font.js" type="text/javascript"></script>

	<script type="text/javascript">

			Cufon.replace('#sf-menu a', { hover: {color: '<?php echo of_get_option('hv_color', '#000000' ) ?>'}});



		Cufon.replace('#sf-menu',{ fontFamily: 'Prociono TT' });

	</script>

<?php } ?>



<?php if(of_get_option('navigation_font')=="7") { ?>

	<script src="<?php echo get_template_directory_uri() ?>/fonts/Ripe_400.font.js" type="text/javascript"></script>

	<script type="text/javascript">

			Cufon.replace('#sf-menu a', { hover: {color: '<?php echo of_get_option('hv_color', '#000000' ) ?>'}});



		Cufon.replace('#sf-menu',{ fontFamily: 'Ripe' });

	</script>

<?php } ?>



<?php if(of_get_option('navigation_font')=="8") { ?>

	<script src="<?php echo get_template_directory_uri() ?>/fonts/Scriptina_Pro_italic_300.font.js" type="text/javascript"></script>

	<script type="text/javascript">

			Cufon.replace('#sf-menu a', { hover: {color: '<?php echo of_get_option('hv_color', '#000000' ) ?>'}});



		Cufon.replace('#sf-menu',{ fontFamily: 'Scriptina Pro' });

	</script>

<?php } ?>



<?php if(of_get_option('navigation_font')=="9") { ?>

	<script src="<?php echo get_template_directory_uri() ?>/fonts/Sertig_400.font.js" type="text/javascript"></script>

	<script type="text/javascript">

			Cufon.replace('#sf-menu a', { hover: {color: '<?php echo of_get_option('hv_color', '#000000' ) ?>'}});



		Cufon.replace('#sf-menu',{ fontFamily: 'Sertig' });

	</script>

<?php } ?>
<?php wp_footer(); ?>
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>