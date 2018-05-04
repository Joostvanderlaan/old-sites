<?php
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
	<?php
		return;
	}
?>

<!-- You can start editing here. -->
<?php if ( comments_open() ) : ?>
<div id="commentsbox">
<h3 id="comments"><?php comments_number('0 Comments', '1 Comment', '% Comments' );?></h3>

<?php if ( have_comments() ) : ?>
<ol class="commentlist">
<?php wp_list_comments(
	array(
		'login_text' => 'Log in to Reply',
		'reply_text' => 'reply',
		'callback' => 'better_comments'
	));
?>
</ol>

<div class="comment-nav">
	<div class="alignleft"><?php previous_comments_link() ?></div>
	<div class="alignright"><?php next_comments_link() ?></div>
</div>
<!-- END comment-navigation -->

<?php endif; ?>
<?php else :
// comments are closed ?>
<?php endif; ?>


<?php if ( comments_open() ) : ?>

<div id="comment-form">

<div id="respond">

<div class="cancel-comment-reply">
<?php cancel_comment_reply_link(); ?>
</div>
<!-- END cancel-comment-reply -->

<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
<p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
<?php else : ?>

<?php endif;
// registration required and not logged in ?>



<?php

$fields =  array(
	'author' => '<input type="text" name="author" id="author"  value="Name*" onfocus="if(this.value==this.defaultValue)this.value=\'\';" onblur="if(this.value==\'\')this.value=this.defaultValue;" size="22" tabindex="1" />',
	'email'  => '<input type="text" name="email" id="email" value="Email*" onfocus="if(this.value==this.defaultValue)this.value=\'\';" onblur="if(this.value==\'\')this.value=this.defaultValue;" size="22" tabindex="2" />',
	'url'    => '<input type="text" name="url" id="url" value="Website" onfocus="if(this.value==this.defaultValue)this.value=\'\';" onblur="if(this.value==\'\')this.value=this.defaultValue;" size="22" tabindex="3" />',
); 

$comments_args = array(
		'fields'=>$fields,
        // change the title of send button 
        'id_submit'=>'commentSubmit',
        // remove "Text or HTML to be displayed after the set of comment fields"
       'label_submit'=>'Submit',
	    'comment_notes_after' => '',
        // redefine your own textarea (the comment body)
        'comment_field' => '<textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea><br>',
		'title_reply'=>'<h3 id="comments-respond">Leave A Reply</h3>'		
);

comment_form($comments_args);
?>
</div>
<!-- END respond -->
</div>
<!-- END comment-form -->
</div>
<!-- END comments-box -->
<?php
 else :
// comments are closed ?>
<?php endif;
// delete me and the sky will fall on your head ?>