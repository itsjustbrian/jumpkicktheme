<?php require_once(get_template_directory() . '/social-media-icons.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1.0, user-scalable=yes">

  <title><?php $pageTitle = 'Jumpkick';
          if (is_category()) $pageTitle = single_cat_title() . ' - ' . $pageTitle;
          elseif (is_page()) $pageTitle = the_title() . ' - ' . $pageTitle;
          elseif (is_single()) $pageTitle = the_title();
          echo $pageTitle; ?></title>

  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,900&display=swap" rel="stylesheet">

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <div id="top-menu-modal" class="full-page-modal" aria-hidden="true">
    <div tabindex="-1">
      <div class="modal-container col" role="dialog" aria-modal="true">

        <header class="modal-header col">
          <button class="close-modal icon-button" title="Close" aria-label="Close modal" data-micromodal-close>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="24" width="24" fill="currentcolor">
              <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z" />
              <path d="M0 0h24v24H0z" fill="none" />
            </svg>
          </button>
        </header>

        <div id="top-menu-modal-content" class="modal-content col">
          <nav class="modal-menu menu" aria-label="Main navigation">
            <ul>
              <?php wp_nav_menu(array(
                'theme_location' => 'main-navigation',
                'container'      => false,
                'items_wrap'     => '%3$s',
                'menu_class'     => 'menu col',
                'depth'          => 1,
              )); ?>
              <?php wp_nav_menu(array(
                'theme_location'  => 'page-navigation',
                'container'       => false,
                'items_wrap'      => '%3$s',
                'menu_class'      => 'menu col',
                'depth'           => 1,
              )); ?>
            </ul>
          </nav>
          <?php echo social_media_icons("row") ?>
        </div>
      </div>
    </div>
  </div>

  <header class="main-header">
    <section class="top-section row">
      <a class="icon-button row" href="javascript:onSearchButtonClicked(event)" title="Search" aria-label="Open search input">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentcolor">
          <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path>
        </svg>
        <label class="desktop-only">Search</label>
      </a>
      <?php get_search_form(); ?>
      <div class="logo-container mobile-only">
        <?php the_custom_logo(); ?>
      </div>
      <nav aria-label="Page navigation" class="page-menu menu desktop-only">
        <?php wp_nav_menu(array(
          'theme_location'  => 'page-navigation',
          'container'       => false,
          'menu_class'      => 'row',
          'depth'           => 1,
        )); ?>
      </nav>
      <?php echo social_media_icons("desktop-only"); ?>
      <button class="icon-button mobile-only" title="Menu" data-micromodal-trigger="top-menu-modal">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentcolor">
          <path d="M0 0h24v24H0z" fill="none" />
          <path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z" />
        </svg>
      </button>
    </section>
    <section class="logo-section row desktop-only">
      <?php the_custom_logo(); ?>
      <div class="vertical-divider"></div>
      <i><?php echo get_bloginfo('description'); ?></i>
    </section>
    <section class="menu-section desktop-only row">
      <nav aria-label="Main navigation" class="menu">
        <?php wp_nav_menu(array(
          'theme_location' => 'main-navigation',
          'container'      => false,
          'menu_class'     => 'row',
          'depth'          => 1,
        )); ?>
      </nav>
    </section>
  </header>