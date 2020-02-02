<?php function social_media_icons($classStr) { ob_start(); ?>

  <ul class="social-media-icons <?php echo $classStr ?>">
    <li>
      <a class="icon-button" target="_blank" href="https://twitter.com" rel="noopener" aria-label="Twitter">
        <img src="<?php echo get_template_directory_uri() ?>/images/logos/logo_twitter.svg" alt="Twitter">
      </a>
    </li>
    <li>
      <a class="icon-button" target="_blank" href="https://facebook.com" rel="noopener" aria-label="Facebook">
        <img src="<?php echo get_template_directory_uri() ?>/images/logos/logo_facebook.svg" alt="Facebook">
      </a>
    </li>
    <li>
      <a class="icon-button" target="_blank" href="https://instagram.com" rel="noopener" aria-label="Instagram">
        <img src="<?php echo get_template_directory_uri() ?>/images/logos/logo_instagram.svg" alt="Instagram">
      </a>
    </li>
  </ul>
  
<?php return ob_get_clean(); } ?>

