<?php get_header(); ?>

<main>
  <?php if (have_posts()) : ?>
    <ol class="posts">
      <?php while (have_posts()) : the_post();
        $count++;
        $postClasses = array(
          'first-post',
          'second-post',
          'third-post'
        );
      ?>

        <li class="post <?php if ($count < 4 && $paged == 0) echo $postClasses[$count - 1]; ?>">
          <article class="col">
            <a class="post-link" href="<?php the_permalink(); ?>">
              <?php if ($count == 1 && $paged == 0) the_post_thumbnail('large');
              else the_post_thumbnail('thumbnail'); ?>
              <?php if ($count == 1 && $paged == 0) : ?>
                <h1 class="post-title"><?php the_title(); ?></h1>
              <?php else : ?>
                <h3 class="post-title"><?php the_title(); ?></h3>
              <?php endif; ?>
            </a>
            <?php get_template_part('fundraising-info'); ?>
          </article>
        </li>
        <?php if ($count == 3 && $paged == 0) : ?>
          <div class="divider desktop-only"></div>
        <?php endif; ?>

      <?php endwhile; ?>
    </ol>

    <?php echo next_posts_button('Next page'); ?>

  <?php else : ?>

    <div class="empty-page-message col">
      <h1>Nothing in the <span class="category-title"><?php single_cat_title(); ?></span> category yet!</h1>
      <?php get_template_part('home-button'); ?>
    </div>

  <?php endif; ?>
</main>

<?php get_footer(); ?>