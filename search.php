<?php require_once(get_template_directory() . '/next-posts-button.php'); ?>

<?php get_header(); ?>

<main>
  <h1 class="search-title post-title"><?php echo $wp_query->found_posts ?> results for "<?php echo get_search_query(); ?>"</h1>
  <?php if (have_posts()) : ?>
    <ol class="posts">
      <?php while (have_posts()) : the_post(); ?>

        <li class="post">
          <article class="col">
            <a class="post-link" href="<?php the_permalink(); ?>">
              <?php the_post_thumbnail('thumbnail'); ?>
              <h3 class="post-title"><?php the_title(); ?></h3>
            </a>
            <?php get_template_part('fundraising-info'); ?>
          </article>
        </li>

      <?php endwhile; ?>
    </ol>

    <?php echo next_posts_button('Next page'); ?>

  <?php else : ?>

    <div class="empty-page-message col">
      <h2 class="empty-page-message">Your search did not return any results</h2>
      <?php get_template_part('home-button'); ?>
    </div>

  <?php endif; ?>
</main>

<?php get_footer(); ?>