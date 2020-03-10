
<?php
  function getPlatform($menu_item) {
    $socialPlatformNames = array(
      'twitter',
      'facebook',
      'instagram',
      'youtube',
      'medium',
      'linkedin'
    );

    foreach ($socialPlatformNames as $name) {
      $pos = strpos($menu_item->url, $name);
      if ($pos === false) continue;
      return $name;
    }
  }
?>

<?php function social_media_icons($classStr) { 
  ob_start();
  $menu_items = wp_get_nav_menu_items('social-media'); ?>
  
  <nav aria-label="Social media navigation" class="social-media-icons menu <?php echo $classStr; ?>">
    <ul class="row">
      <?php foreach ($menu_items as $menu_item): ?>
        <?php $platform = getPlatform($menu_item); ?>
        <li>
          <a class="icon-button" target="_blank" href="<?php echo $menu_item->url; ?>" rel="noopener" aria-label="<?php echo $platform; ?>">
            <img width="24" height="24" class="icon" src="<?php echo get_template_directory_uri() ?>/images/logos/logo_<?php echo $platform; ?>.svg" alt="<?php echo $platform; ?>">
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  </nav>
  
<?php return ob_get_clean(); } ?>

