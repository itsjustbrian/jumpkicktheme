<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>

  <main>
    <article class="col">
      <h1 class="post-title"><?php the_title(); ?></h1>
      <?php the_post_thumbnail('large'); ?>
      <div class="page-content">
        <?php the_content(); ?>
      </div>
    </article>
  </main>

<?php endwhile; ?>

<?php get_footer(); ?>