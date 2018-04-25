<?php

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'before_widget' => "<div class='box'>",
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	));
}
// to prevent  WP < 2.9 breaking
if (function_exists('add_theme_support')) {
add_theme_support( 'post-thumbnails' );
}


function string_limit_words($string, $word_limit)
{
  $words = explode(' ', $string, ($word_limit + 1));
  if(count($words) > $word_limit)
  array_pop($words);
  return implode(' ', $words);
}

?>