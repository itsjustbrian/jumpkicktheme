<?php

function get_decimal_places($number_str) {
  $decimal_pos = strpos($number_str, '.');
  if ($decimal_pos !== FALSE) {
    return strlen($number_str) - $decimal_pos - 1;
  }
  return 0;
}

function load_stylesheets() {
  wp_register_style('default_styles', get_template_directory_uri() . '/style.css', array(), false, 'all');
  wp_register_style('archive_styles', get_template_directory_uri() . '/css/archive.css', array(), false, 'all');
  wp_register_style('single_styles', get_template_directory_uri() . '/css/single.css', array(), false, 'all');
  wp_register_style('search_styles', get_template_directory_uri() . '/css/search.css', array(), false, 'all');
  wp_register_style('page_styles', get_template_directory_uri() . '/css/page.css', array(), false, 'all');
  wp_register_style('admin_styles', get_template_directory_uri() . '/css/admin.css', array(), false, 'all');
  wp_enqueue_style('default_styles');

  if (is_home() || is_category() || is_tag()) wp_enqueue_style('archive_styles');
  if (is_single()) wp_enqueue_style('single_styles');
  if (is_search()) wp_enqueue_style('search_styles');
  if (is_page()) wp_enqueue_style('page_styles');
  //if (is_user_logged_in()) wp_enqueue_style('admin_styles');
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
    'social-media' => __('Social Media', 'theme'),
    'donate-button' => __('Donate Button', 'theme')
  )
);

add_theme_support('post-thumbnails');
add_theme_support('custom-logo');

function init_image_sizes() {
  // Nuke em'
  foreach (get_intermediate_image_sizes() as $size) {
    if (!in_array($size, array('thumbnail', 'medium', 'medium_large', 'large'))) {
      remove_image_size($size);
    }
  }

  // Make mine
  add_image_size('medium', get_option('medium_size_w'), get_option('medium_size_h'), true);
  add_image_size('large', get_option('large_size_w'), get_option('large_size_h'), true);
  add_image_size('medium_large', 1200, 675, true);
  add_image_size('very_small', 480, 270, true);
  add_image_size('ultra_small', 229, 129, true);
}
add_action('init', 'init_image_sizes');

function post_thumbnail_sizes_attr($attr, $attachment, $size) {
  if (is_single()) {
    $attr['sizes'] = '(min-width: 1155px) 702px, (min-width: 960px) calc(64vw - 64px), (min-width: 800px) 799px, 100vw';
  } else {
    if ($size == 'thumbnail')
      $attr['sizes'] = '(min-width: 1155px) 358px, (min-width: 800px) 33.3333vw, (min-width: 510px) 50vw, 100vw';
    if ($size == 'medium')
      $attr['sizes'] = '(min-width: 1155px) 741px, (min-width: 800px) 66.6666vw, 100vw';
  }

  return $attr;
}
add_filter('wp_get_attachment_image_attributes', 'post_thumbnail_sizes_attr', 10, 3);

function rocket_lazyload_exclude_class($attributes) {
  array_push($attributes, 'class="custom-logo"', 'class="icon"');
  return $attributes;
}
add_filter('rocket_lazyload_excluded_attributes', 'rocket_lazyload_exclude_class');

function get_menu_items_by_registered_slug($menu_slug) {
  $menu_items = array();
  if (($locations = get_nav_menu_locations()) && isset($locations[$menu_slug])) {
    $menu = get_term($locations[$menu_slug]);
    $menu_items = wp_get_nav_menu_items($menu->term_id);
  }
  
  return $menu_items;
}

//Exclude pages from WordPress Search
if (!is_admin()) {
  function wpb_search_filter($query) {
    if ($query->is_search) {
      $query->set('post_type', 'post');
    }
    return $query;
  }
  add_filter('pre_get_posts', 'wpb_search_filter');
}

// Don't need to load it on pages it's not used
function wpassist_remove_block_library_css() {
  if (!is_page() && !is_single()) {
    wp_dequeue_style('wp-block-library');
  }
}
add_action('wp_enqueue_scripts', 'wpassist_remove_block_library_css');

add_theme_support('title-tag');