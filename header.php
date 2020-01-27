<?php
$menuParameters = array(
  'theme_location' => 'top-menu',
  'container'       => false,
  'echo'            => false,
  'items_wrap'      => '%3$s',
  'depth'           => 1,
);
?>

<!DOCTYPE html>
<html>

<head>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <header>
    <section>
      <nav>
        <a class="icon" href="javascript:searchBox.focus()" title="Search">
          <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentcolor">
            <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path>
          </svg>
        </a>
        <?php echo strip_tags(wp_nav_menu($menuParameters), '<a>'); ?>
        <a target="_blank" href="https://twitter.com" rel="noopener" aria-label="Twitter">
          <img src="<?php echo get_template_directory_uri() ?>/images/logos/logo_twitter.svg" alt="Twitter">
        </a>
        <a target="_blank" href="https://facebook.com" rel="noopener" aria-label="Facebook">
          <img src="<?php echo get_template_directory_uri() ?>/images/logos/logo_facebook.svg" alt="Facebook">
        </a>
        <a target="_blank" href="https://instagram.com" rel="noopener" aria-label="Instagram">
          <img src="<?php echo get_template_directory_uri() ?>/images/logos/logo_instagram.svg" alt="Instagram">
        </a>
        <?php get_search_form(); ?>
      </nav>
    </section>
    <section>
      <?php the_custom_logo(); ?>
      <h3><i>No matter the cause, we still take 10%</i></h3>
    </section>
    <hr>
    <section>
      <nav>
        <?php echo strip_tags(wp_nav_menu($menuParameters), '<a>'); ?>
      </nav>
    </section>
  </header>