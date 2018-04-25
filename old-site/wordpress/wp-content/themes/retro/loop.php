      <div class="content">
<?php if (!have_posts()):?>
  <div id="post-0" class="post error404 not-found">
    <h3 class="entry-title"><?php _e('Not Found');?></h3>
    <div class="entry-content">
      <p><?php _e('Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.');?></p>
      <?php get_search_form();?>
    </div>
  </div>
<?php endif;?>

<?php while (have_posts()): the_post();?>
  <div class="post">
  <h3 class="title"><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></h3>

  <?php
  if (!is_singular())  {
    echo tp_get_post_image($post->ID, 'pre_post');
    the_excerpt() . ' <a href="' . get_permalink() . '" class="more-link"></a>';
  }
  else the_content(__('Continue reading <span class="meta-nav">&rarr;</span>'));

  if (!is_page()):
  ?>
      <span class="published">
      On <?php echo get_the_date('d F Y');?>, posted in: <?php the_category(', ');?> by <?php the_author_posts_link();?>
      | <?php comments_popup_link(__('Leave a comment'), __('1 Comment'), __('% Comments'));?>
        <?php
        $tags_list = get_the_tag_list('', ', ');
        if ($tags_list):
        ?>
          <span class="tag-links">
            <?php printf(__(' | Tagged %1$s'), $tags_list);?>
          </span>
        <?php endif;?>
        <?php edit_post_link(__('Edit'), '| ', '');?>
      </span>

    <?php comments_template( '', true );?>

<?php endif;?>
  </div>

<?php endwhile;?>

<?php if ($wp_query->max_num_pages>1):?>
        <div class="pagination">
          <?php tp_pagenavi();?>
        </div>
<?php endif;?>
      </div>
      <?php get_sidebar();?>
      <div class="cleaner"><!--Cleaner--></div>
