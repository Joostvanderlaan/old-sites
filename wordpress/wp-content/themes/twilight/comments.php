<?php // Do not delete these lines
if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) die ('Please do not load this page directly. Thanks!');
if (!empty($post->post_password)) { // if there's a password
	if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
?>

<h2><?php _e('Password Protected'); ?></h2>
<p><?php _e('Enter the password to view comments.'); ?></p>

<?php return;
	}
}
// You can start editing here

// This variable is for alternating comment background

	$oddcomment = 'alt';

// If this is the "Contact" page, then don't show comments
// You can add multiple pages by doing something like this:
	// if (is_page('Contact') || is_page('About')) {

if (is_page('Contact')) {
	echo '';
	}

// If not the "Contact" page
else {
	if ($comments) : ?>
	
	<div class='divide'></div>
		
		<h3 id="comments"><?php comments_number('No Responses', 'One Response', '% Responses' );?> to &#8220;<?php the_title(); ?>&#8221;</h3>
		
		<?php foreach ($comments as $comment) : ?>
		
		<p><?php comment_author_link() ?> said:</p>
		
		<div class="comment-text"><?php comment_text() ?></div>

		<p><a href="#comment-<?php comment_ID() ?>" title=""><?php comment_date('M jS, Y') ?> <?php _e(' at '); comment_time() ?></a><?php edit_comment_link('Edit',' | ',''); ?></p>
			
 			<?php if ($comment->comment_approved == '0') : ?>
			
				<?php _e('Your comment is awaiting moderation.'); ?>
			
 			<?php endif; ?>
	
		<?php endforeach; // end for each comment  ?>
		
	<?php else : // this is displayed if there are no comments so far
	
		if ('open' == $post->comment_status) :
		
		// If comments are open, but there are no comments
		else : // comments are closed ?>

		<!-- If comments are closed. -->
		<p class="nocomments">Comments are closed.</p>

		<?php endif;
	endif;

} // end of if no "Contact" page
?>

<?php if ('open' == $post->comment_status) : ?>

<h3 id="respond">Leave a Reply</h3>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logged in</a> to post a comment.</p>

<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
<?php if ( $user_ID ) : ?>

<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Logout &raquo;</a></p>

<?php else : ?>

<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="40" tabindex="1" />
<label for="author">Name <?php if ($req) echo "(required)"; ?></label></p>

<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="40" tabindex="2" />
<label for="email">Email (not published) <?php if ($req) echo "(required)"; ?></label></p>

<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="40" tabindex="3" />
<label for="url">Website</label></p>

<?php endif; ?>

<p><textarea name="comment" id="comment" cols="60" rows="10" tabindex="4"></textarea></p>
<p><input type="submit" value="Submit comment">
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
<?php do_action('comment_form', $post->ID); ?>
</p>

</form>

<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>
