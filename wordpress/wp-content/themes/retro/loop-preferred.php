          <h3><?php _e('Choose your category');?></h3>

          <div class="category-list">
            <?php
            global $cat, $tp_options;

            $_childs = join(',', $tp_options['preferred_cats']);
            $categories = array();
            foreach ($tp_options['preferred_cats'] as $v) {
              $categories = array_merge($categories, get_categories("child_of=$v"));
            }
            if (!empty($categories))
            foreach ($categories as $category) {
              if ($cat==$category->term_id) $class = ' class="active"';
              else $class = '';
              echo '<a' . $class . ' href="' . get_category_link($category->term_id) . '" title="' . $category->name . '">' . $category->name.'</a>';
            }
            ?>
            <div class="cleaner"><!--Cleaner--></div>
          </div>
<?php while (have_posts()): the_post();?>
          <div class="preferred">
            <div class="one_work">

              <?php echo tp_get_post_image($post->ID, 'portfolio');?>
              <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
              <?php the_excerpt();?>
            </div>
          </div>
<?php endwhile;?>
      <div class="cleaner"><!--Cleaner--></div>

<?php if ($wp_query->max_num_pages>1):?>
        <div class="pagination">
          <?php tp_pagenavi();?>
        </div>
<?php endif;?>
