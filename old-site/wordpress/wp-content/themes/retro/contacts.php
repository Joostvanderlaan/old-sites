<?php
/*
Template Name: Contacts
*/

$vname = '';
$vemail = '';
$vmess = '';
$msg = '';

if (isset($_REQUEST['csend']) && 1==$_REQUEST['csend']) {
  $cname = isset($_REQUEST['cname']) ? trim($_REQUEST['cname']) : '';
  $cemail = isset($_REQUEST['cemail']) ? sanitize_email($_REQUEST['cemail']) : '';
  $cmess = isset($_REQUEST['cmessage']) ? trim($_REQUEST['cmessage']) : '';

  $admin_email = get_option('admin_email');
  $blogname = wp_specialchars_decode(get_option('blogname'), ENT_QUOTES);
  $subject = "[$blogname] Contacts";
  if (!empty($cemail) && !empty($cmess)) {
  $notify_message = <<<mess

From: $cname <$cemail>

Message:
$cmess

mess;
  @wp_mail($admin_email, $subject, $notify_message);
  $msg = '<div class="success">Your message was sent! We will respond as soon as possible.</div>';
  $cclass = '';
  }
  else {
    $vemail = $cemail;
    if (empty($cemail)) {
      $msg = '<div class="error">'.__('Please enter Your e-mail').'</div>';
      $vemail = '';
    }
    if (empty($cmess)) $msg .= '<div class="error">'.__('Please enter Your message').'</div>';
    $vname = $cname;
    $vmess = $cmess;
  }
}
?>

<?php get_header();?>

    <div id="content">
      <div class="content">
            <h1><?php _e('Do You need to get in touch?');?></h1>
            <h3><?php _e('Use this form below');?></h3>

            <?php if (!empty($msg)) echo "$msg";?>

            <div class="contact_form">
              <form method="post" action="">
                <input type="hidden" value="1" name="csend" />
                <p><label for="cname"><?php _e('Name');?></label><input id="cname" name="cname" type="text" value="<?php echo esc_attr($vname);?>" /></p>
                <p><label for="cemail"><?php _e('Email');?></label><input id="cemail" name="cemail" type="text" value="<?php echo esc_attr($vemail);?>" /></p>
                <p><label for="cmessage" class="message"><?php _e('Message');?></label><textarea id="cmessage" name="cmessage" rows="10" cols="77"><?php echo $vmess;?></textarea></p>

                <input class="send" type="submit" value="" />
              </form>
              <div class="cleaner"><!--Cleaner--></div>
            </div>

      </div>
        <?php get_sidebar();?>
    </div>

<?php get_footer();?>
