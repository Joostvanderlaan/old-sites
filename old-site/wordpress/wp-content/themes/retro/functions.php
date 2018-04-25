<?php
if (isset($_GET['activated']) && $pagenow == "themes.php") {
  wp_redirect('themes.php?page=theme_options');
  die;
}

add_action('after_setup_theme', 'tp_after_setup_theme');
function tp_after_setup_theme() {
  if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(650, 185, true);
    add_image_size('pre_post', 650, 185, true);
    add_image_size('last_works', 125, 125, true);
    add_image_size('slider', 970, 320, true);
    add_image_size('authors', 200, 265, true);
    add_image_size('portfolio', 290, 160, true);
  }

  add_action('admin_init', 'tp_options_init');
  add_action('admin_menu', 'tp_options_add_page');

  add_action('wp_head', 'tp_head');
  add_action('wp_footer', 'tp_footer');

  add_filter('the_content', 'tp_content');
  add_filter('pre_get_posts', 'tp_pre_get_posts');
  add_filter('widget_categories_args', 'tp_widget_cats');

  add_action('widgets_init', 'tp_widgets_init');
  add_action('widgets_init', 'tp_register_widgets', 1);
}


global $tp_options;
$tp_options = get_option('tp_options');
if (!isset($tp_options['preferred_cats'])) $tp_options['preferred_cats'] = array();


//=options
function tp_options_init() {
  register_setting('tp_options_group', 'tp_options', 'tp_options_validate');
}

function tp_options_add_page() {
  add_theme_page(__('Theme Options'), __('Theme Options'), 'edit_theme_options', 'theme_options', 'tp_options_do_page');
}

function tp_options_do_page() {
  if (!isset($_REQUEST['updated'])) $_REQUEST['updated'] = false;
  ?>
  <div class="wrap">
    <?php screen_icon(); echo "<h2>" . get_current_theme() . __(' Theme Options') . "</h2>";?>

    <?php if (false!==$_REQUEST['updated']):?>
    <div class="updated fade"><p><strong><?php _e('Options saved');?></strong></p></div>
    <?php endif;?>

    <form method="post" action="options.php" enctype="multipart/form-data">
      <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
      <?php
      settings_fields('tp_options_group');
      $options = get_option('tp_options');
      if (!isset($options['preferred_cats'])) $options['preferred_cats'] = array();
      if (!isset($options['favicon'])) $options['favicon'] = '';
      ?>

      <table class="form-table">
        <tr valign="top">
          <th scope="row"><?php _e('Favicon');?></th>
          <td>
            <input name="tp_options[favicon]" id="tp_options[favicon]" class="large-text" type="text" value="<?php esc_attr_e($options['favicon']);?>" />
          </td>
        </tr>

        <tr valign="top">
          <th scope="row"><?php _e('Upload Favicon');?></th>
          <td>
            <input type="file" name="tp_favicon" />
          </td>
        </tr>

        <tr valign="top">
          <th scope="row"><?php _e('Portfolio Categories');?></th>
          <td>
            <div id="linkcategorydiv">
            <ul id="categorychecklist" class="list:category categorychecklist form-no-clear">
              <?php wp_terms_checklist(0, array('taxonomy'=>'category', 'selected_cats'=>$options['preferred_cats'], 'checked_ontop'=>false));?>
            </ul>
            </div>
          </td>
        </tr>

        <tr valign="top">
          <th scope="row"><?php _e('Header Code');?></th>
          <td>
           <textarea name="tp_options[header_code]" id="tp_options[header_code]" class="large-text"><?php esc_attr_e($options['header_code']);?></textarea>
          </td>
        </tr>

        <tr valign="top">
          <th scope="row"><?php _e('Footer Code');?></th>
          <td>
           <textarea name="tp_options[footer_code]" id="tp_options[footer_code]" class="large-text"><?php esc_attr_e($options['footer_code']);?></textarea>
          </td>
        </tr>

      </table>

      <p class="submit">
        <input type="submit" class="button-primary" value="<?php _e('Save Options');?>" />
      </p>
    </form>
  </div>
  <?php
}

function tp_options_validate($input) {
  $input['preferred_cats'] = array();
  $options = get_option('tp_options');
  if (isset($_REQUEST['post_category']) && !empty($_REQUEST['post_category'])) {
    $input['preferred_cats'] = $_REQUEST['post_category'];

    $categories = array();
    foreach ($input['preferred_cats'] as $v) {
      $categories = array_merge($categories, get_categories("child_of=$v"));
    }
    if (!empty($categories)) {
      $arr = array();
      foreach ($categories as $category) {
        $arr[] = $category->term_id;
      }
      $input['preferred_cats'] = array_merge($input['preferred_cats'], $arr);
    }
  }

  if (isset($_FILES['tp_favicon']) && is_uploaded_file($_FILES['tp_favicon']['tmp_name']) && $_FILES['tp_favicon']['tmp_name']==UPLOAD_ERR_OK) {
    $uploads = wp_upload_dir();
    $dir = $uploads['basedir'] . '/favicon/';
    if (!file_exists($dir)) $created = wp_mkdir_p($dir);
    else $created = true;

    if ($created) {
      copy($_FILES['tp_favicon']['tmp_name'], $dir . $_FILES['tp_favicon']['name']);
      chmod($dir . $_FILES['tp_favicon']['name'], 0666);
    }
    $input['favicon'] = $uploads['baseurl'] . '/favicon/' . $_FILES['tp_favicon']['name'];
  }
  elseif (isset($options['favicon'])) $input['favicon'] = $options['favicon'];
  return $input;
}

//=!options

function tp_head() {
  global $tp_options;
  if (isset($tp_options['favicon'])) echo '<link rel="shortcut icon" href="'.$tp_options['favicon'].'" />' . "\n";
  else echo '<link rel="shortcut icon" type="image/x-icon" href="'.get_bloginfo('stylesheet_directory').'/images/favicon.ico" />' . "\n";

  if (isset($tp_options['header_code'])) echo $tp_options['header_code'] . "\n";
}

function tp_footer() {
  global $tp_options;

  if (isset($tp_options['footer_code'])) echo $tp_options['footer_code'] . "\n";
}

function tp_content($content) {
  $content = preg_replace('#(<img\s[^>]*)width=[\'"][^\'"]+[\'"]#is', '$1', $content);
  $content = preg_replace('#(<img\s[^>]*)height=[\'"][^\'"]+[\'"]#is', '$1', $content);
  preg_match_all('#<img\s[^>]*src=[\'"]([^\'"]+)[\'"]#is', $content, $m);
  if (!empty($m[1])) {
    $arr = array();
    foreach ($m[1] as $k=>$v) {
      if (in_array($m[0][$k], $arr)) continue;
      $arr[] = $m[0][$k];
      $size = getimagesize($v);
      $repl = preg_quote($m[0][$k], '#');
      if ($size[0]>650) $content = preg_replace("#$repl#", $m[0][$k] . ' width="650"', $content);
    }
  }
  return $content;
}

function tp_pre_get_posts($query) {
  if ($query->is_home) {
    global $tp_options;
    if (!empty($tp_options['preferred_cats'])) {
      $query->set('category__not_in', $tp_options['preferred_cats']);
    }
  }
  return $query;
}

function tp_widget_cats($args) {
  global $tp_options;
  if (!empty($tp_options['preferred_cats'])) {
    $args['exclude'] = $tp_options['preferred_cats'];
  }
  return $args;
}

function tp_groupby_parent($str) {
  global $wpdb;
  return $str . $wpdb->posts.'.`post_parent`';
}

function tp_where_parent($str) {
  global $wpdb, $tp_options;
  $cats = join(',', $tp_options['preferred_cats']);

  return $str . " AND `$wpdb->term_taxonomy`.`taxonomy`='category'  AND `$wpdb->term_taxonomy`.`term_id` IN ($cats)";
}

function tp_join_cats($str) {
  global $wpdb;
  return $str . " INNER JOIN `$wpdb->term_relationships` ON (`$wpdb->posts`.`post_parent`=`$wpdb->term_relationships`.`object_id`) INNER JOIN `$wpdb->term_taxonomy` ON (`$wpdb->term_relationships`.`term_taxonomy_id`=`$wpdb->term_taxonomy`.`term_taxonomy_id`) ";;
}

function tp_get_the_image($args=array()) {
  global $post;

  $defaults = array(
    'post_id'=>$post->ID,
    'attachment'=>true,
    'default_size'=>'thumbnail',
    'link_to_post'=>false,
    'image_class'=>false,
    'width'=>false,
    'height'=>false,
    'format'=>'img',
    'echo'=>true,
  );

  $args = apply_filters('tp_get_the_image_args', $args);
  $args = wp_parse_args($args, $defaults);
  extract($args);

  if ($image) $image = tp_display_the_image($args, $image);

  $image = apply_filters('tp_get_the_image', $image);

  if ($echo && 'array'!==$format) echo $image;
  else return $image;
}

function tp_display_the_image($args=array(), $image=false) {
  if (empty($image['url'])) return false;

  extract($args);

  if ($width) $width = ' width="' . $width . '"';
  if ($height) $height = ' height="' . $height . '"';
  if ($img_id) $img_id = ' id="' . $img_id . '"';

  if (is_array($custom_key)) {
    foreach ($custom_key as $key)
      $classes[] = str_replace(' ', '-', strtolower($key));
  }

  $classes[] = $default_size;
  $classes[] = $image_class;
  $class = join(' ', $classes);

  $html = '<img'.$img_id.' src="' . $image['url'] . '" alt="' . esc_attr(strip_tags(get_post_field('post_title', $post_id))) . '" class="' . $class . '"' . $width . $height . ' />';

  return $html;
}

function tp_get_thumb($id, $size, $img_id='') {
  global $_wp_additional_image_sizes;
  require_once(ABSPATH . 'wp-admin/includes/image.php');

  $image = wp_get_attachment_image_src($id, $size);
  $_size = getimagesize($image[0]);
  $fullsizepath = get_attached_file($id);

  if ($_size[0]>$_wp_additional_image_sizes[$size]['width'] || $_size[1]>$_wp_additional_image_sizes[$size]['height']) {
    $metadata = wp_generate_attachment_metadata($id, $fullsizepath);
    if (!empty($metadata)) {
      wp_update_attachment_metadata($id, $metadata);
      $image = wp_get_attachment_image_src($id, $size);
    }
    else $img = wp_get_attachment_image($id, $size);
  }

  if (empty($img)) {
    $image = array('url'=>$image[0]);
    $img = tp_get_the_image(array('image'=>$image, 'default_size'=>$size, 'image_class'=>'', 'echo'=>false, 'img_id'=>$img_id));
  }

  return $img;
}

function tp_slider($num) {
  global $post;

  $res = '';
  add_filter('posts_groupby', 'tp_groupby_parent');

  global $tp_options;
  $q_arr = array('showposts'=>$num+4, 'post_status'=>'inherit', 'post_type'=>'attachment', 'post_mime_type'=>'image', 'orderby'=>'parent');
  if (!empty($tp_options['preferred_cats'])) {
    add_filter('posts_where_paged', 'tp_where_parent', 10, $tp_options['preferred_cats']);
    add_filter('posts_join_paged', 'tp_join_cats');
  }
  $r = new WP_Query($q_arr);
  if ($r->have_posts()):
  $sdata = array();
  $d = $r->post_count - 7;
  if ($r->post_count<=7) $d = 0;

  for ($i=$d+1; $i<=$r->post_count; $i++) $sdata[] = '{"id":"slide-img-'.$i.'","client":"","desc":""}';
  $i = 0;

  $res .= '<script type="text/javascript">
  if(!window.slider) var slider={};
  slider.data=['.join(',', $sdata).'];</script>';

  while ($r->have_posts()): $r->the_post();
  $i++;
  if ($i<=$d) continue;
  $size = apply_filters('post_thumbnail_size', 'slider');

  $img = tp_get_thumb($post->ID, $size, 'slide-img-'.$i);

  $res .= '<a href="'.get_permalink($post->post_parent).'" title="'.get_the_title($post->post_parent).'">'.$img.'</a>';
  endwhile;
  wp_reset_postdata();

  endif;
  return $res;
}


function tp_latest_works($num) {
  global $post;

  $res = '';
  add_filter('posts_groupby', 'tp_groupby_parent');

  global $tp_options;

  $q_arr = array('showposts'=>$num, 'post_status'=>'inherit', 'post_type'=>'attachment', 'post_mime_type'=>'image', 'orderby'=>'parent');
  if (!empty($tp_options['preferred_cats'])) {
    add_filter('posts_where_paged', 'tp_where_parent', 10, $tp_options['preferred_cats']);
    add_filter('posts_join_paged', 'tp_join_cats');
  }

  $r = new WP_Query($q_arr);
  if ($r->have_posts()):

  while ($r->have_posts()): $r->the_post();
  $img = '';
  $size = apply_filters('post_thumbnail_size', 'last_works');
  $img = tp_get_thumb($post->ID, $size);

  $res .= '<a href="'.get_permalink($post->post_parent).'" title="'.get_the_title($post->post_parent).'">'.$img.'</a>';
  endwhile;
  wp_reset_postdata();

  endif;
  return $res;
}

function tp_get_post_image($id, $size) {
  $thumbargs = array(
    'post_type'=>'attachment',
    'numberposts'=>1,
    'post_status'=>null,
    'post_parent'=>$id,
    'order'=>'ASC',
  );
  $thumb = get_posts($thumbargs);
  if ($thumb) {
    $size = apply_filters('post_thumbnail_size', $size);
    $img = tp_get_thumb($thumb[0]->ID, $size);

    return '<a href="'.get_permalink($post->post_parent).'" title="'.get_the_title($post->post_parent).'">'.$img.'</a>';
  }
}

function tp_copyrightDate() {
  global $wpdb;
  $first_year = $wpdb->get_var("SELECT YEAR(min(`post_date`)) FROM `$wpdb->posts`");
  $last_year = date('Y');
  if ($first_year!=$last_year) return "$first_year &mdash; $last_year";
  return $first_year;
}

function tp_list_pages() {
  if (is_front_page() && !is_paged()) $class = ' class="current_page_item"';
  else $class = '';
  $r = '<li' . $class . '><a href="' . home_url('/') . '" title="' . get_bloginfo('name') . '">' . __('Home') . '</a></li>';

  global $tp_options;
  if (!empty($tp_options['preferred_cats'])) {
    if (tp_has_parent($tp_options['preferred_cats'], true)) $class = ' class="current_page_item"';
    else $class = '';
    $cats = get_categories(array('hide_empty'=>false, 'include'=>$tp_options['preferred_cats']));
    $cat = 0; $cat2 = 0;
    foreach ($cats as $v) {
      if ($cat2>$v->term_id || 0==$cat2) $cat2 = $v->term_id;
      if (0==$v->parent && ($cat>$v->term_id || 0==$cat)) $cat = $v->term_id;
    }
    if (0==$cat) $cat = $cat2;
    $r .= '<li' . $class . '><a href="' . get_category_link($cat) . '" title="' . __('Portfolio') . '">' . __('Portfolio') . '</a></li>';
  }

  $r .= wp_list_pages('title_li=&depth=1&echo=0');
  echo $r;
}

function tp_pagenavi() {
  global $wp_query;
  $tp_title = wp_title('|', false, 'right');
  $_paged = get_query_var('paged');

  $pagenavi_out = '';
  $max_page = $wp_query->max_num_pages;
  if ($max_page>1) {
    if (intval($_paged)<1) $_paged = 1;
    $delta = 2;

    $start_page = $_paged - $delta;
    if ($start_page<=0) $start_page = 1;

    $end_page = $_paged + $delta;
    if (($end_page - $start_page)!=($delta*2)) $end_page = $start_page + $delta*2;

    if ($end_page>$max_page) {
      $start_page = $max_page - $delta*2;
      $end_page = $max_page;
    }

    if ($start_page<=0) $start_page = 1;

    $pagenavi_out .= '';
    if ($start_page>1) {
      $prev_page = $_paged - 1;
      if ($prev_page>1) $_title = $tp_title . ' Page '.$prev_page;
      else $_title = $tp_title;
      $pagenavi_out .= '<a class="prev" title="'.$_title.'" href="' . esc_url(get_pagenum_link($prev_page)) . "\"></a>";
      $pagenavi_out .= '...';
    }
    for ($i=$start_page; $i<=$end_page; $i++) {
      if ($i>1) $_title = $tp_title . ' Page '.$i;
      else $_title = $tp_title;
      if ($i==$_paged) $pagenavi_out .= "<span>$i</span>";
      else $pagenavi_out .= '<a title="'.$_title.'" href="' . esc_url(get_pagenum_link($i)) . "\">$i</a>";

    }
    if ($end_page<$max_page) {
      $pagenavi_out .= '...';
      $next_page = $_paged + 1;
      if ($next_page<$max_page) $_title = $tp_title . ' Page '.$next_page;
      else $_title = $tp_title;
      $pagenavi_out .= '<a class="next" title="'.$_title.'" href="' . esc_url(get_pagenum_link($next_page)) . "\"></a>";
    }
  }

  echo $pagenavi_out;
}

function tp_comments($comment, $args, $depth) {
$GLOBALS['comment'] = $comment;
$GLOBALS['comment_depth'] = $depth;
global $ct_depth1;

if ($depth==1) {
  if (!isset($ct_depth1)) $ct_depth1 = 0;
  $ct_depth1++;
  $class = ($ct_depth1%2==0)?'even':'odd';
  $class = ' class="'.$class.'"';
}
else $class = '';

?>
<li id="comment-<?php comment_ID();?>">
  <div class="avatar">
<?php echo get_avatar(get_comment_author_email(), 48);?>
  </div>

  <div class="comment_content">
    <?php comment_text();?>
    <?php comment_reply_link(array_merge($args, array('depth' => $depth)));?>
  </div>
  <div class="baloon"></div>
  <div class="cleaner"><!--Cleaner--></div>
<?php
}

function tp_widgets_init() {
  // Area 1, located at the top of the sidebar.
  register_sidebar(array(
    'name'=>__('Primary Widget Area'),
    'id'=>'primary-widget-area',
    'description'=>__('The primary widget area'),
    'before_widget'=>'',
    'after_widget'=>'',
    'before_title'=>'<h3 class="widget-title">',
    'after_title'=>'</h3>',
  ));
}

//=twitter
define('MAGPIE_CACHE_ON', 1);
define('MAGPIE_CACHE_AGE', 180);
define('MAGPIE_INPUT_ENCODING', 'UTF-8');
define('MAGPIE_OUTPUT_ENCODING', 'UTF-8');

function tp_twitter_messages($username='', $num=1, $list=false, $update=true, $linked='#', $hyperlinks=true, $twitter_users=true, $encode_utf8=false) {
  include_once(ABSPATH . WPINC . '/rss.php');

  $messages = fetch_rss('http://twitter.com/statuses/user_timeline/'.$username.'.rss');

  if ($list) echo '<ul class="twitter-list">';

  if (''==$username) {
    if ($list) echo '<li>';
    echo __('RSS not configured');
    if ($list) echo '</li>';
  }
  else {
    if (empty($messages->items)) {
      if ($list) echo '<li>';
      echo __('No Twitter messages');
      if ($list) echo '</li>';
    }
    else {
      $i = 0;
      foreach ($messages->items as $message) {
        $msg = " ".substr(strstr($message['description'],': '), 2, strlen($message['description']))." ";
        if ($encode_utf8) $msg = utf8_encode($msg);
        $link = $message['link'];

        if ($list) echo '<li class="twitter-item">';
        elseif (1!=$num) echo '<p class="twitter-message">';

        if ($hyperlinks) $msg = tp_hyperlinks($msg);
        if ($twitter_users) $msg = tp_twitter_users($msg);

        if (''!=$linked || false!=$linked) {
          if('all'==$linked) {
            $msg = '<a href="'.$link.'" class="twitter-link">'.$msg.'</a>';
          }
          elseif ($linked) {
            $msg = $msg . '<a href="'.$link.'" class="twitter-link">'.$linked.'</a>';
          }
        }

        echo $msg;


        if ($update) {
          $time = strtotime($message['pubdate']);

          if ((abs(time()-$time))<86400) $h_time = sprintf(__('%s ago'), human_time_diff($time));
          else $h_time = date(__('Y/m/d'), $time);

          echo sprintf(__('%s', 'twitter-for-wordpress'),' <em class="twitter-timestamp">' . $h_time . '</em>');
        }

        if ($list) echo '</li>';
        elseif (1!=$num) echo '</p>';

        $i++;
        if ($i>=$num) break;
      }
    }
  }
  if ($list) echo '</ul>';
}

function tp_hyperlinks($text) {
  $text = preg_replace('/\b([a-zA-Z]+:\/\/[\w_.\-]+\.[a-zA-Z]{2,6}[\/\w\-~.?=&%#+$*!]*)\b/i',"<a href=\"$1\" class=\"twitter-link\">$1</a>", $text);
  $text = preg_replace('/\b(?<!:\/\/)(www\.[\w_.\-]+\.[a-zA-Z]{2,6}[\/\w\-~.?=&%#+$*!]*)\b/i',"<a href=\"http://$1\" class=\"twitter-link\">$1</a>", $text);
  $text = preg_replace("/\b([a-zA-Z][a-zA-Z0-9\_\.\-]*[a-zA-Z]*\@[a-zA-Z][a-zA-Z0-9\_\.\-]*[a-zA-Z]{2,6})\b/i","<a href=\"mailto://$1\" class=\"twitter-link\">$1</a>", $text);
  $text = preg_replace('/([\.|\,|\:|\°|\ø|\>|\{|\(]?)#{1}(\w*)([\.|\,|\:|\!|\?|\>|\}|\)]?)\s/i', "$1<a href=\"http://twitter.com/#search?q=$2\" class=\"twitter-link\">#$2</a>$3 ", $text);
  return $text;
}

function tp_twitter_users($text) {
  $text = preg_replace('/([\.|\,|\:|\°|\ø|\>|\{|\(]?)@{1}(\w*)([\.|\,|\:|\!|\?|\>|\}|\)]?)\s/i', "$1<a href=\"http://twitter.com/$2\" class=\"twitter-user\">@$2</a>$3 ", $text);
  return $text;
}

class ThemePalsTwitter extends WP_Widget {

  function ThemePalsTwitter() {
    $widget_ops = array('classname'=>'twitter', 'description'=>__('A list of latest tweets'));

    $control_ops = array('id_base'=>'tp-twitter');

    $this->WP_Widget('tp-twitter', 'ThemePalsTwitter', $widget_ops, $control_ops);
  }

  function widget($args, $instance) {
    extract($args);

    $title = apply_filters('widget_title', $instance['title']);
    $username = $instance['username'];
    $show_count = $instance['show_count'];
    $hide_timestamp = isset($instance['hide_timestamp']) ? $instance['hide_timestamp'] : false;
    $linked = $instance['hide_url'] ? false : '#';
    $show_follow = isset($instance['show_follow']) ? $instance['show_follow'] : false;

    echo '<div class="tweet">' . $before_widget;

    if ($title) echo $before_title . $title . $after_title;

    tp_twitter_messages($username, $show_count, true, !$hide_timestamp, $linked);

    if ($show_follow) echo '<div class="follow-user"><a href="http://twitter.com/' . $username . '">' . $instance['follow_text'] . '</a></div>';

    echo $after_widget . '</div>';
  }

  function update($new_instance, $old_instance) {
    $instance = $old_instance;

    $instance['title'] = strip_tags($new_instance['title']);
    $instance['username'] = $new_instance['username'];
    $instance['show_count'] = $new_instance['show_count'];
    $instance['hide_timestamp'] = $new_instance['hide_timestamp'];
    $instance['hide_url'] = $new_instance['hide_url'];
    $instance['show_follow'] = $new_instance['show_follow'];
    $instance['follow_text'] = $new_instance['follow_text'];

    return $instance;
  }

  function form( $instance ) {
    $defaults = array('title'=>__('Latest Tweets'), 'username'=>'', 'show_count'=>10, 'hide_timestamp'=>false, 'hide_url'=>false, 'show_follow'=>true, 'follow_text'=>__('Follow me'));
    $instance = wp_parse_args((array)$instance, $defaults);
?>

    <p>
      <label for="<?php echo $this->get_field_id('title');?>"><?php _e('Title');?>:</label><br />
      <input id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title');?>" value="<?php echo $instance['title'];?>" width="100%" />
    </p>

    <p>
      <label for="<?php echo $this->get_field_id('username');?>"><?php _e('Twitter ID');?>:</label>
      <input id="<?php echo $this->get_field_id('username');?>" name="<?php echo $this->get_field_name('username');?>" value="<?php echo $instance['username'];?>" />
    </p>

    <p>
      <label for="<?php echo $this->get_field_id('show_count');?>"><?php _e('Show');?>:</label>
      <input id="<?php echo $this->get_field_id('show_count');?>" name="<?php echo $this->get_field_name('show_count');?>" value="<?php echo $instance['show_count'];?>" size="3" /> <?php _e('tweets');?>
    </p>

    <p>
      <input class="checkbox" type="checkbox" <?php checked($instance['hide_timestamp'], 'on');?> id="<?php echo $this->get_field_id('hide_timestamp');?>" name="<?php echo $this->get_field_name('hide_timestamp');?>" />
      <label for="<?php echo $this->get_field_id('hide_timestamp');?>"><?php _e('Hide timestamp');?></label>
    </p>

    <p>
      <input class="checkbox" type="checkbox" <?php checked($instance['hide_url'], 'on');?> id="<?php echo $this->get_field_id('hide_url');?>" name="<?php echo $this->get_field_name('hide_url');?>" />
      <label for="<?php echo $this->get_field_id('hide_url');?>"><?php _e('Hide tweet URL');?></label>
    </p>
<?php /*
    <p>
      <input class="checkbox" type="checkbox" <?php checked($instance['show_follow'], 'on');?> id="<?php echo $this->get_field_id('show_follow');?>" name="<?php echo $this->get_field_name('show_follow');?>" />
      <label for="<?php echo $this->get_field_id('show_follow');?>"><?php _e('Display follow me button');?></label>
    </p>

    <p>
      <label for="<?php echo $this->get_field_id('follow_text');?>"><?php _e('Follow me text');?>:</label>
      <input id="<?php echo $this->get_field_id('follow_text');?>" name="<?php echo $this->get_field_name('follow_text');?>" value="<?php echo $instance['follow_text'];?>" />
    </p>
*/ ?>


<?php
  }

}


class ThemePalsLatestWorks extends WP_Widget {

  function ThemePalsLatestWorks() {
    $widget_ops = array('classname'=>'last_works', 'description'=>__('A list of latest works'));

    $control_ops = array('id_base'=>'tp-latestworks');

    $this->WP_Widget('tp-latestworks', 'ThemePalsLatestWorks', $widget_ops, $control_ops);
  }

  function widget($args, $instance) {
    extract($args);

    $title = apply_filters('widget_title', $instance['title']);

    echo $before_widget;
    if ($title) echo $before_title . $title . $after_title;
    echo '<div class="last_works-div">' . tp_latest_works(4) . '</div>';
    echo $after_widget;
  }

  function update($new_instance, $old_instance) {
    $instance = $old_instance;
    $instance['title'] = strip_tags($new_instance['title']);
    return $instance;
  }

  function form($instance) {
    $defaults = array('title'=>__('Latest Works'));
    $instance = wp_parse_args((array)$instance, $defaults);
?>

    <p>
      <label for="<?php echo $this->get_field_id('title');?>"><?php _e('Title');?>:</label><br />
      <input id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title');?>" value="<?php echo $instance['title'];?>" width="100%" />
    </p>

<?php
  }

}

function tp_register_widgets() {
  register_widget('ThemePalsTwitter');
  register_widget('ThemePalsLatestWorks');
}


function tp_has_parent($cat_id, $post=false) {
  if (!is_array($cat_id)) $cat_id = array($cat_id);
  $_cats = array();
  if ($post && is_single()) {
    $cats = get_the_category();

    if (!empty($cats)) {
      foreach ($cats as $v) {
        $_cats[] = $v->cat_ID;
        if ($v->parent) {
          $_cats = array_merge($_cats, tp_get_category_parents($v->parent));
        }
      }
    }

  }
  elseif (is_category()) {
    global $cat;
    $_cats = tp_get_category_parents($cat);
  }

  $ai = array_intersect($cat_id, $_cats);

  if (!empty($ai)) return true;
  return false;
}

function tp_get_category_parents($id) {
  $chain = array();
  $parent = &get_category($id);
  if (is_wp_error($parent)) return $chain;
  $chain[] = $parent->cat_ID;

  if ($parent->parent && ($parent->parent!=$parent->term_id)) {
    $chain = array_merge($chain, tp_get_category_parents($parent->parent));
  }

  return $chain;
}

?>