<?php
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php'==basename($_SERVER['SCRIPT_FILENAME']))
  die ('Please do not load this page directly. Thanks!');
?>


<?php
if (post_password_required()) {?>
  <p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.');?></p>
<?php
  return;
}
?>

<?php if (have_comments()):?>
<div class="comments">
  <div class="comments_title">
    <h1><?php printf(_n('One Comment', '%1$s Comments', get_comments_number()), number_format_i18n(get_comments_number()));?></h1>
  </div>

  <div class="navigation">
    <div class="alignleft"><?php previous_comments_link();?></div>
    <div class="alignright"><?php next_comments_link();?></div>
  </div>

  <ul class="commentslist">
  <?php wp_list_comments('callback=tp_comments');?>
  </ul>

  <div class="navigation">
    <div class="alignleft"><?php previous_comments_link();?></div>
    <div class="alignright"><?php next_comments_link();?></div>
  </div>
</div>
<?php else:?>

  <?php if (comments_open()):?>
  <?php else:?>
    <p class="nocomments"><?php _e('Comments are closed.');?></p>

  <?php endif; ?>
<?php endif; ?>


<?php if (comments_open()):?>

<div id="respond" class="respond_form">

<h1><?php comment_form_title(__('Leave a Reply'), __('Leave a Reply to %s'));?></h1>

<div id="cancel-comment-reply">
  <small><?php cancel_comment_reply_link();?></small>
</div>

<?php if (get_option('comment_registration') && !is_user_logged_in()):?>
<p><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.'), wp_login_url(get_permalink()));?></p>
<?php else:?>

<form action="<?php echo get_option('siteurl');?>/wp-comments-post.php" method="post" id="comment-form">

<?php if (is_user_logged_in()):?>

<p><?php printf(__('Logged in as <a href="%1$s">%2$s</a>.'), get_option('siteurl') . '/wp-admin/profile.php', $user_identity);?> <a href="<?php echo wp_logout_url(get_permalink());?>" title="<?php _e('Log out of this account');?>"><?php _e('Log out &raquo;');?></a></p>

<?php else:?>
<p><label for="author"><?php _e('Name');?></label><input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author);?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'";?> /></p>
<p><label for="email"><?php _e('Email');?></label><input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email);?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'";?> /></p>
<p><label for="url"><?php _e('Website');?></label><input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url);?>" size="22" tabindex="3" /></p>
<?php endif;?>
<p><label for="comment" class="message"><?php _e('Comment');?></label><textarea name="comment" id="comment" cols="77" rows="10" tabindex="4"></textarea></p>
<input name="submit" type="submit" class="submit" tabindex="5" value="" />

<p>
<?php comment_id_fields();?>
</p>
<?php do_action('comment_form', $post->ID);?>

</form>

<?php endif;?>

<div class="cleaner"><!--Cleaner--></div>
</div>

<?php endif;?>
