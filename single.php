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
        <ul class="share-buttons row">
          <li>
            <a class="facebook-share" href="https://facebook.com/sharer.php?u=<?php the_permalink(); ?>?utm_source=jumpkick_facebook%26utm_medium=sharefromsite" title="Share to Facebook" target="_blank" rel="noreferrer noopener">
              <div class="icon-container">
                <svg class="icon" fill="currentcolor" aria-label="Facebook icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                  <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
                </svg>
              </div>
            </a>
          </li>
          <li>
            <a class="twitter-share" href="https://twitter.com/share?text=<?php the_title(); ?>&url=<?php the_permalink(); ?>?utm_source=jumpkick_twitter%26utm_medium=sharefromsite" title="Share to Twitter" target="_blank" rel="noreferrer noopener">
              <div class="icon-container">
                <svg class="icon" fill="currentcolor" aria-label="Twitter icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                  <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                </svg>
              </div>
            </a>
          </li>
          <li>
            <a class="email-share" href="mailto:?subject=<?php the_title(); ?>&body=<?php the_permalink(); ?>?utm_source=jumpkick_email%26utm_medium=sharefromsite" title="Share via Email" target="_blank" rel="noreferrer noopener">
              <div class="icon-container">
                <svg class="icon" fill="currentcolor" aria-label="Email icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
                  <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" />
                  <path d="M0 0h24v24H0z" fill="none" />
                </svg>
              </div>
            </a>
          </li>
        </ul>
      </aside>
      <div class="post-content">
        <?php the_content(); ?>
      </div>
      <div class="author">
          <?php echo 'Author: ' . coauthors_posts_links(null, null, null, null, false) ?>
          <?php $coauthors = get_coauthors(); 
                foreach ($coauthors as $coauthor) {
                  ?> 
                    <a href=<?php echo $coauthor->website ?? $coauthor->user_url ?>> <?php echo $coauthor->description ?> </a>
                  <?php
                }
          ?>
          
      </div>
    </article>
  </main>

<?php endwhile; ?>

<?php get_footer(); ?>