<?php if (is_numeric(get_field('amount_raised')) && is_numeric(get_field('funding_goal'))): ?>
  <?php echo '$' . number_format(get_field('amount_raised')); ?><span> raised of <?php echo '$' . number_format(get_field('funding_goal')); ?></span>
<?php endif; ?>