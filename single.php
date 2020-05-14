<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>

  <main>
    <article>
      <h1 class="post-title"><?php the_title(); ?></h1>
      <?php the_post_thumbnail('medium'); ?>
      <aside class="col">
        <div class="fundraising-info col">
          <h5 class="fundraising-backers">
            <?php get_template_part('fundraising-backers'); ?>
          </h5>
          <?php get_template_part('fundraising-progress'); ?>
          <h2 class="fundraising-amount">
            <?php get_template_part('fundraising-amount'); ?>
          </h2>
        </div>
        <?php
        $menu_items = get_menu_items_by_registered_slug('donate-button');
        if ($menu_items && count($menu_items)) : ?>
          <?php $menu_item = $menu_items[0]; ?>
          <a class="theme-button" href="<?php echo $menu_item->url ?>">Donate now</a>
        <?php endif; ?>
        <?php get_template_part('socials'); ?>
        <h1> Rewards </h1>
        <?php get_template_part('rewards'); ?>
      </aside>
      <div class="post-content">
        <?php the_content(); ?>
        <div class="author">
          <?php 
            if (function_exists('coauthors_posts_links')) {
              echo 'Author: ' . coauthors_posts_links(null, null, null, null, false);
            } else {
              echo 'Author: ' . get_the_author_posts_link();
            } ?>
          <br>
          <?php if (function_exists('get_coauthors')) {
                  $coauthors = get_coauthors(); 
                  foreach ($coauthors as $coauthor) {
                    ?> 
                      <a href=<?php echo $coauthor->website ?? $coauthor->user_url ?>> <?php echo $coauthor->description ?> </a>
                    <?php
                  }
                }
          ?>
        </div>
      </div>

    </article>
  </main>

<?php endwhile; ?>

<?php get_footer(); ?>