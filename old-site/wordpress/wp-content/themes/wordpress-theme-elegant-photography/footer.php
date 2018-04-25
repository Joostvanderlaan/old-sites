<div class="clear"></div>
<?php if(!is_front_page()) { ?>
</div><!-- END main -->
<?php } ?>

<div id="credits">
	<a href="http://www.hhcolorlab.com" target="_blank"><img title="Wordpress Theme by H&amp;H Color Lab" src="<?php echo get_template_directory_uri()?>/images/photo-labs.png" alt="H&amp;H Color Lab" /></a>
</div>

</div><!-- END wrap -->


<?php if(of_get_option('h_font')=="1") { ?>
	<script src="<?php echo get_template_directory_uri() ?>/fonts/Bebas_400.font.js" type="text/javascript"></script>
	<script type="text/javascript">
		Cufon.replace('h1,h2,h3,h4',{ fontFamily: 'Bebas' });
	</script>
<?php } ?>

<?php if(of_get_option('h_font')=="2") { ?>
	<script src="<?php echo get_template_directory_uri() ?>/fonts/ChunkFive_400.font.js" type="text/javascript"></script>
	<script type="text/javascript">
		Cufon.replace('h1,h2,h3,h4',{ fontFamily: 'ChunkFive' });
	</script>
<?php } ?>

<?php if(of_get_option('h_font')=="3") { ?>
	<script src="<?php echo get_template_directory_uri() ?>/fonts/Cicle_Gordita_700.font.js" type="text/javascript"></script>
	<script type="text/javascript">
		Cufon.replace('h1,h2,h3,h4',{ fontFamily: 'Cicle Gordita' });
	</script>
<?php } ?>

<?php if(of_get_option('h_font')=="4") { ?>
	<script src="<?php echo get_template_directory_uri() ?>/fonts/Dekar_400.font.js" type="text/javascript"></script>
	<script type="text/javascript">
		Cufon.replace('h1,h2,h3,h4',{ fontFamily: 'Dekar' });
	</script>
<?php } ?>

<?php if(of_get_option('h_font')=="5") { ?>
	<script src="<?php echo get_template_directory_uri() ?>/fonts/Franchise_700.font.js" type="text/javascript"></script>
	<script type="text/javascript">
		Cufon.replace('h1,h2,h3,h4',{ fontFamily: 'Franchise' });
	</script>
<?php } ?>

<?php if(of_get_option('h_font')=="6") { ?>
	<script src="<?php echo get_template_directory_uri() ?>/fonts/Prociono_TT_400.font.js" type="text/javascript"></script>
	<script type="text/javascript">
		Cufon.replace('h1,h2,h3,h4',{ fontFamily: 'Prociono TT' });
	</script>
<?php } ?>

<?php if(of_get_option('h_font')=="7") { ?>
	<script src="<?php echo get_template_directory_uri() ?>/fonts/Ripe_400.font.js" type="text/javascript"></script>
	<script type="text/javascript">
		Cufon.replace('h1,h2,h3,h4',{ fontFamily: 'Ripe' });
	</script>
<?php } ?>

<?php if(of_get_option('h_font')=="8") { ?>
	<script src="<?php echo get_template_directory_uri() ?>/fonts/Scriptina_Pro_italic_300.font.js" type="text/javascript"></script>
	<script type="text/javascript">
		Cufon.replace('h1,h2,h3,h4',{ fontFamily: 'Scriptina Pro' });
	</script>
<?php } ?>

<?php if(of_get_option('h_font')=="9") { ?>
	<script src="<?php echo get_template_directory_uri() ?>/fonts/Sertig_400.font.js" type="text/javascript"></script>
	<script type="text/javascript">
		Cufon.replace('h1,h2,h3,h4',{ fontFamily: 'Sertig' });
	</script>
<?php } ?>

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