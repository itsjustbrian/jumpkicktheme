<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>

  <main>
    <article>
      <h1><?php the_title(); ?></h1>
      <?php the_post_thumbnail('large'); ?>
      <aside>
        <?php get_template_part('fundraising-info'); ?>
      </aside>
      <div class="post-content">
        <?php the_content(); ?>
      </div>
    </article>
  </main>

<?php endwhile; ?>

<?php get_footer(); ?>