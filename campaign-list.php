<?php function campaign_list($sizes)
{
  ob_start(); ?>

  <?php
  $count = 0;

  $postClasses = array(
    'first-post',
    'second-post',
    'third-post'
  );

  $headingSizes = array(
    'thumbnail' => 'h4',
    'medium' => 'h2',
    'large' => 'h1'
  );
  ?>

  <ol class="posts">
    <?php while (have_posts()) : the_post();
      $count++; ?>
      <?php
      if ($count < count($sizes)) $size = $sizes[$count - 1];
      else $size = $sizes[count($sizes) - 1];
      ?>

      <li class="post <?php if ($count < 4) echo $postClasses[$count - 1]; ?>">
        <article class="col">
          <a href="<?php the_permalink(); ?>">
            <?php
            the_post_thumbnail($size);
            ?>
          </a>
          <a href="<?php the_permalink(); ?>">
            <<?php echo $headingSizes[$size] ?> class="post-title"><?php the_title(); ?></<?php echo $headingSizes[$size] ?>>
          </a>
          <?php get_template_part('fundraising-info'); ?>
        </article>
      </li>

    <?php endwhile; ?>
  </ol>

<?php return ob_get_clean();
} ?>