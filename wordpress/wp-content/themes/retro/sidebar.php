      <div class="right">

<?php if (!dynamic_sidebar('primary-widget-area')):?>
        <h3><?php _e('Latest Works');?></h3>
        <div class="last_works-div">
        <?php echo tp_latest_works(4);?>
        </div>

        <h3><?php _e('Categories');?></h3>
        <ul class="list">
          <?php wp_list_categories(apply_filters('widget_categories_args', array('title_li'=>'', 'hierarchical'=>0)));?>
        </ul>

        <h3><?php _e('Pages');?></h3>
        <ul class="list">
          <?php wp_list_pages('title_li=&depth=-1');?>
        </ul>

        <h3><?php _e('Archives');?></h3>
        <ul class="list">
        <?php wp_get_archives();?>
        </ul>
<?php endif;?>
      </div>
      <div class="cleaner"><!--Cleaner--></div>


