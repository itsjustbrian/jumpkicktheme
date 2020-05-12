<?php if (is_numeric(get_field('amount_raised')) && is_numeric(get_field('funding_goal'))): ?>
  <?php $amount_raised = get_field('amount_raised');
        $funding_goal = get_field('funding_goal');
  ?>
  <?php echo '$' . number_format($amount_raised, get_decimal_places($amount_raised)); ?>
        <span> raised of <?php echo '$' . number_format($funding_goal, get_decimal_places($funding_goal)); ?></span>
<?php endif; ?>