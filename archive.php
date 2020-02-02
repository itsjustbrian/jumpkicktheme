<?php get_header(); ?>

<main>
  <?php if (have_posts()) : ?>

    <?php echo campaign_list(array('large', 'thumbnail')) ?>

  <?php else : ?>

    <h1>Nothin' here yet!</h1>

  <?php endif; ?>
</main>

<?php get_footer(); ?>