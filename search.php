<?php get_header(); ?>

<main>
  <h1>Search Results for: <?php echo get_search_query(); ?></h1>

  <?php if (have_posts()) : ?>

    <?php echo campaign_list(array('thumbnail')); ?>

  <?php else : ?>

    <h2>Your search did not return any results</h2>

  <?php endif; ?>
</main>

<?php get_footer(); ?>