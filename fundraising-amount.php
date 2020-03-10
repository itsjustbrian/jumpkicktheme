<?php 
  if (is_numeric(get_field('amount_raised'))) echo '$' . number_format(get_field('amount_raised')); 
?> raised <span>of <?php 
  if (is_numeric(get_field('funding_goal'))) echo '$' . number_format(get_field('funding_goal')); 
?></span>