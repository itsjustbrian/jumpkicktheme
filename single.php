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
        <?php if(check_rewards_exist()): ?>
        <div class="rewards-aside"> 
          <h1> Rewards </h1>
          <?php get_template_part('rewards'); ?>
        </div>
        <?php endif; ?>
      </aside>
      <div class="post-content">
        <!-- tabs only show on mobile if rewards present-->
        <?php if(check_rewards_exist()): ?>
        <div class="mobile-content-tabs">
          <div class="mobile-content-tab selected" onclick='onMobileContentTabClicked(event)' show="content-main-wrapper">
            Campaign
          </div>
          <div class="mobile-content-tab"  onclick='onMobileContentTabClicked(event)' show="rewards-main-wrapper">
            Rewards
          </div>
        </div>
        <?php endif; ?>
        <div id="content-main-wrapper" >
          <?php the_content(); ?>
        </div>
        <div id="rewards-main-wrapper" hidden>
          <?php get_template_part('rewards'); ?>
        </div>
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