<?php get_header();?>

<h1>Search Results for: <?php echo get_search_query();?></h1>

<?php if (have_posts()) : while(have_posts()) : the_post();?>

  <h3><?php the_title();?></h3>
  <?php the_excerpt();?>
  <a href="<?php the_permalink();?>">Read more</a>

<?php endwhile;?>
<?php else:?>

  <h3>Your search did not return any results</h3>

<?php endif;?>

<?php get_footer();?>