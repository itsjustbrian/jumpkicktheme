<?php

function load_stylesheets() {
  wp_register_style('default_styles', get_template_directory_uri() . '/style.css', array(), false, 'all');
  wp_register_style('archive_styles', get_template_directory_uri() . '/css/archive.css', array(), false, 'all');
  wp_register_style('single_styles', get_template_directory_uri() . '/css/single.css', array(), false, 'all');
  wp_register_style('search_styles', get_template_directory_uri() . '/css/search.css', array(), false, 'all');
  wp_register_style('page_styles', get_template_directory_uri() . '/css/page.css', array(), false, 'all');
  wp_enqueue_style('default_styles');

  if (is_home() || is_category()) wp_enqueue_style('archive_styles');
  if (is_single()) wp_enqueue_style('single_styles');
  if (is_search()) wp_enqueue_style('search_styles');
  if (is_page()) wp_enqueue_style('page_styles');
}
add_action('wp_enqueue_scripts', 'load_stylesheets');

function loadjs() {
  wp_register_script('default_scripts', get_template_directory_uri() . '/js/main.js', '', false, true);
  wp_enqueue_script('default_scripts');
}
add_action('wp_enqueue_scripts', 'loadjs');

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

add_theme_support('menus');

register_nav_menus(
  array(
    'page-navigation' => __('Page Navigation', 'theme'),
    'main-navigation' => __('Main Navigation', 'theme'),
    'social-media' => __('Social Media', 'theme')
  )
);

add_theme_support('post-thumbnails');
add_theme_support('custom-logo');

add_image_size('very-small', 480, 270, true);
add_image_size('super-small', 320, 180, true);
add_image_size('ultra-small', 229, 129, true);
add_image_size('semi-full', 1200, 675, true);

function remove_thumbnail_width_height($html, $post_id, $post_thumbnail_id, $size, $attr) {
  $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
  return $html;
}
//add_filter('post_thumbnail_html', 'remove_thumbnail_width_height', 10, 5);

function content_image_sizes_attr($sizes, $size) {
  $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 62vw, 840px';
  return $sizes;
}
//add_filter('wp_calculate_image_sizes', 'content_image_sizes_attr', 10, 2);

function post_thumbnail_sizes_attr($attr, $attachment, $size) {
  if (is_archive()) {
    if ($size == 'thumbnail')
      $attr['sizes'] = '(min-width: 1055px) 328px, (min-width: 800px) 33.3vw, (min-width: 510px) 50vw, 100vw';
    if ($size == 'large')
      $attr['sizes'] = '(min-width: 1055px) 676px, (min-width: 800px) 66.6vw, 100vw';
  }

  if (is_single()) {
    $attr['sizes'] = '(min-width: 1055px) 638px, (min-width: 960px) calc(64vw - 64px), (min-width: 800px) 799px, 100vw';
  }

  return $attr;
}
add_filter('wp_get_attachment_image_attributes', 'post_thumbnail_sizes_attr', 10, 3);

include "social-media-icons.php";
include "next-posts-button.php";