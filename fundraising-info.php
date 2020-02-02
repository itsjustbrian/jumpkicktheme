  <div class="fundraising-info col">
    <h5 class="backers"><?php echo number_format(get_field('number_of_backers')); ?> backers</h5>
    <progress value="<?php echo get_field('amount_raised'); ?>" max="<?php echo get_field('funding_goal'); ?>"></progress>
    <p class="amount"><span><?php echo '$' . number_format(get_field('amount_raised')); ?> raised</span> of <?php echo '$' . number_format(get_field('funding_goal')); ?></p>
  </div>