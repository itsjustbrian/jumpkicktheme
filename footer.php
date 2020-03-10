<?php require_once(get_template_directory() . '/social-media-icons.php'); ?>

<footer class="col">
  <?php the_custom_logo(); ?>
  <i class="mobile-only"><?php echo get_bloginfo('description'); ?></i>
  <?php echo social_media_icons("row") ?>
</footer>

<?php wp_footer(); ?>

</body>

</html>