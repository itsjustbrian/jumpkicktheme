<?php
  $numBackers = get_field('number_of_backers');
  if (is_numeric($numBackers)) {
    echo number_format($numBackers);
    echo $numBackers != 1 ? ' backers' : ' backer';
  }
?>