<?php if (is_numeric(get_field('amount_raised')) && is_numeric(get_field('funding_goal'))): ?>
  <?php $amount_raised = get_field('amount_raised');
        $funding_goal = get_field('funding_goal');
        $funding_units = get_field('funding_currency');
  ?>
  <?php if($funding_units == ''): ?>
  <?php echo '$' . number_format($amount_raised, get_decimal_places($amount_raised)); ?>
        <span> raised of <?php echo '$' . number_format($funding_goal, get_decimal_places($funding_goal)); ?></span>
  <?php else: ?>
      <?php echo number_format($amount_raised, get_decimal_places($amount_raised)); ?>
            <span> out of <?php echo number_format($funding_goal, get_decimal_places($funding_goal)) . ' ' . $funding_units ?> raised </span>
  <?php endif; ?>
<?php endif; ?>