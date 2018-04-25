<?php
/*
Plugin Name: GPP Category Slider	
Description: Category slider slides the different category in the apps hook section
Version: 1.0
License: GPL
Author: Graph Paper Press
Author URI: http://graphpaperpress.com
*/


// Get Wordpress Categories
		$cats_array = get_categories();		
		$multicheckcats = array();
		foreach ( $cats_array as $cats ) {			
			$multicheckcats[$cats->cat_ID] = $cats->cat_name;	
		}

/**
 * Add function to widgets_init that'll load our widget.
 * @since 0.1
 */
add_action( 'widgets_init', 'gpp_category_slider_widgets' );

/**
 * Register our widget.
 * 'GPP_Category_Slider_Widget' is the widget class used below.
 *
 * @since 0.1
 */
function gpp_category_slider_widgets() {
	register_widget( 'GPP_Category_Slider_Widget' );
}

/**
 * Example Widget class.
 * This class handles everything that needs to be handled with the widget:
 * the settings, form, display, and update.  Nice!
 *
 * @since 0.1
 */
class GPP_Category_Slider_Widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function GPP_Category_Slider_Widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'Category Slider', 'description' => __('Use this widget to display different categories in slider form', 'gpp_category_slider') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'gpp-category-slider' );

		/* Create the widget. */
		$this->WP_Widget( 'gpp-category-slider', __('Category Slider', 'gpp_category_slider'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		global $multicheckcats;
		extract( $args );
		$catarray = array();

		/* Our variables from the widget settings. */		
		foreach( $multicheckcats as $key => $value ){			
			if($instance['category_id_'.$key]){
				$catarray[$instance['category_id_'.$key]] = $instance['category_id_'.$key];
			}
		} 
		
		/* load scripts for slider effect */	
		require_once( 'inc/core-js.php' );
		
		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget */	
			require( 'inc/slider.php' );
		
		/* After widget (defined by themes). */
		echo $after_widget;
	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		global $multicheckcats;
		$instance = $old_instance;		
		/* save all the inputs in their respective variables */
		foreach( $multicheckcats as $key => $value ){
			$instance['category_id_'.$key] = $new_instance['category_id_'.$key];
		}
		
		return $instance;
	}

	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	function form( $instance ) {
		global $multicheckcats;
		$defaults = array();
		/* Set up some default widget settings. */
		foreach( $multicheckcats as $key => $value ){
			$defaults['category_id_'.$key]= true;
		}
				
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>			
		
		<p>
			<label for="<?php echo $this->get_field_id( 'category_id' ); ?>"><?php _e('Choose Category:'); ?></label><br />
			<?php foreach( $multicheckcats as $key => $value ) { ?>
				<input type="checkbox" <?php checked( (bool) $instance['category_id_'.$key], true ); ?> id="<?php echo $this->get_field_id( 'category_id_'.$key ); ?>" name="<?php echo $this->get_field_name( 'category_id_'.$key ); ?>" value="<?php echo $key; ?>" style="width:10%;" />
				<label for="<?php echo $this->get_field_id( 'category_id_'.$key ); ?>"><?php echo $value; ?></label><br />
			<?php } ?>
		</p>

	<?php
	}
}




/**
 * Set plugin constants
 */

define ( 'GPP_CATEGORY_SLIDER_PLUGIN_URL', WP_PLUGIN_URL . '/' . dirname( plugin_basename( __FILE__ ) ) . '/' );
define ( 'GPP_CATEGORY_SLIDER_PLUGIN_DIR', WP_PLUGIN_DIR . '/' . dirname( plugin_basename( __FILE__ ) ) . '/' );

/*
* Load jquery cycle plugin after the jquery has loaded
* Load css for the front end 
*/

if ( !is_admin() ) add_action( 'wp_enqueue_scripts', 'load_gpp_category_slider_js' );
function  load_gpp_category_slider_js() {
		global $themename, $shortname;
		$gpp = get_option( $shortname. '_options' );
		$usedcssarray = array();
		if( isset($gpp) && $gpp['gpp_base_alt_css'] != "" ) {			
			$usedcss = $gpp['gpp_base_alt_css'];
			$usedcssarray = explode("-",substr_replace( $usedcss, "", -4 ));
		}
		wp_enqueue_script( 'gpp_category_slider_js', GPP_CATEGORY_SLIDER_PLUGIN_URL . 'js/jquery.cycle.all.min.js', array( 'jquery' ) );
		wp_enqueue_style( 'gpp_category_slider_css', GPP_CATEGORY_SLIDER_PLUGIN_URL . 'gpp-category-slider.css' );
		if( in_array("dark", $usedcssarray) ) {
			wp_enqueue_style( 'gpp_category_slider_css_dark', GPP_CATEGORY_SLIDER_PLUGIN_URL . 'css/dark.css' );
		} else {
			wp_enqueue_style( 'gpp_category_slider_css_default', GPP_CATEGORY_SLIDER_PLUGIN_URL . 'css/default.css' );
		}
} 

/**
 * Lets update this plugin from our own downloads server.
 */
/* $ExampleUpdateChecker = new PluginUpdateChecker(
	'http://downloads.graphpaperpress.com/gpp-category-slider-plugin/info.json', 
	__FILE__
); */