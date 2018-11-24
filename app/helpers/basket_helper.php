<?php 

function getTotalPrice() {
  if (isset($_SESSION['basket'])) {
    $total = 0;
    foreach($_SESSION['basket'] as $item) {
      $total += $item['prix'] * $item['quantity'];
    }
    return $total;
  }
  return 0 ;
}