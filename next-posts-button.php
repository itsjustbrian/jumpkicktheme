<?php function next_posts_button($label = null, $max_page = 0)
{
  ob_start();

  global $paged, $wp_query;

  if (!$max_page) {
    $max_page = $wp_query->max_num_pages;
  }

  if (!$paged) {
    $paged = 1;
  }

  $nextpage = intval($paged) + 1;

  if (null === $label) {
    $label = __('Next Page &raquo;');
  }
?>

  <?php if (!is_single() && ($nextpage <= $max_page)) : ?>
    <a class="page-nav-button" href="<?php echo next_posts($max_page, false); ?>">
      <label><?php echo $label ?></label>
      <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 15 24" width="24">
        <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z" />
        <path d="M0 0h24v24H0z" fill="none" />
      </svg>
    </a>
  <?php endif; ?>

<?php return ob_get_clean();
} ?>