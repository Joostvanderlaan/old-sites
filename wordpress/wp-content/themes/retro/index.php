<?php get_header();?>

    <div id="content">
  <?php
  global $tp_options;
  if (!empty($tp_options['preferred_cats']) && tp_has_parent($tp_options['preferred_cats'])):
  ?>
        <?php get_template_part('loop', 'preferred');?>

  <?php else:?>
        <?php get_template_part('loop', 'index');?>
  <?php endif;?>
    </div>

<?php get_footer();?>
